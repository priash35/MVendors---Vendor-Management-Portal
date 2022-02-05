<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('User_model');
		$this->load->model('Category_model');
		$this->load->model('Mvendor_model');
		$this->load->model('Madmin_model');
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'Login');
		}
		
	}

	public function index()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
        $data['result'] = $this->Category_model->get_Categories();
		$data['title']='Products / Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/products/category_list', $data);	
		$this->load->view('admin/master/footer');
	}
	public function addcategory()
	{	
		if(isset($_POST['add_category']))
		{	
		    
		    $id = $_SESSION['userid'];
			$where=array(  
			'category_title'=>$this->input->post('category'),      			
			);
			
			
			$verify_category=$this->User_model->record_count('tbl_category',$where);
			
			if($verify_category == ''){
			if($_FILES['category_pic']['name']!= ""){
	    			$img_name='category_pic';
	    			$img_path='category';
	    			$old_img='';
		    		$subcategory_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$subcategory_image="";
		            } 
		        date_default_timezone_set('Asia/Calcutta'); 
		        $dt = date("y-m-d H:i:s");
		         $catt=$this->input->post('category');
			$data=array( 
				 
			'category_title'=>$this->input->post('category'),
			'category_pic'=>$subcategory_image,
			'category_c_date'=>$dt ,
			
			);
			$this->createLog($id,$img_path, $catt);
			$details=$this->Category_model->record_insert('tbl_category',$data);
			$this->session->set_flashdata('event_success','Products Services Successfully Created.');
			redirect(base_url().'Category/addcategory');
			}
			else
			{
				$this->session->set_flashdata('error','Category Category Already Exists.');
			}
		}
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Products / Category / Add Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/addcategory');	
		$this->load->view('admin/master/footer');
	}
	public function updatecategory()
	{
		
		if(isset($_POST['update_category']))
		{	
			$where1=array(  
			'category_title'=>$this->input->post('category'),      			
			);
			$verify_category=$this->User_model->record_count('tbl_category',$where1);
			
			
			if($_FILES['category_pic']['name']!= ""){
			$img_name='category_pic';
			$img_path='category';
			$old_img=$this->input->post('old_category_image');
    			$category_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $category_image=$this->input->post('old_category_image');
		      }
		     //    $bran = $this->input->post('brand_id[]');
		    	// $bran = implode(', ', $bran);
				$where= array(
		        'category_id'=>$this->input->post('category_id')
							);
				 date_default_timezone_set('Asia/Calcutta'); 
				$data=array(
        		'category_title'=>$this->input->post('category'),
        		'category_u_date'=>$timestamp = date("Y-m-d H:i:s"),
        		'category_pic'=>$category_image

        			);
			if($verify_category == ''){
			$details=$this->Category_model->records_update('tbl_category',$data,$where);	
			$this->session->set_flashdata('event_success','Category  Successfully Update.');
			redirect(base_url().'Category/index');		
			}else
			{
			
				$where= array(
		       		 'category_id'=>$this->input->post('category_id')
				);
				 date_default_timezone_set('Asia/Calcutta'); 
				$data=array(
	        		'category_u_date'=>$timestamp = date("Y-m-d H:i:s"),
	        		'category_pic'=>$category_image

        			);

				$details=$this->Category_model->records_update('tbl_category',$data,$where);
				$this->session->set_flashdata('error','Category All  Already Exists.');
				redirect(base_url().'Category/index');
			}
		}
		$where=array(         			
				'category_id'=>$this->uri->segment('3')
	    		  );
				  
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['category']=$details=$this->Category_model->record_list('tbl_category',$where);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Products / Update Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/updatecategory',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_category()
	{	
			$where=array(
				'category_id'=>$this->uri->segment(3)
			);
		
		$category=$this->Category_model->record_list('tbl_category',$where);

		if(!$category)
		{
		 	$this->session->set_flashdata('event_failed','Products Services not Found...');
        	redirect(base_url().'Category/index');
		}
			if($category[0]->category_pic!="")
        {      
            $img_path='category';
            $old_img=$category[0]->category_pic;
            $image_name=$this->Category_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Category_model->records_delete('tbl_category',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Products Services Deleted Successfully...');
        	redirect(base_url().'Category/index');
    	}  
	}
	public function makeCategoryInactive()
	{		
		$where= array(
		        'category_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'category_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_category',$data,$where);
		
		redirect(base_url().'Category/index');	
	}
	public function makeCategoryActive()
	{		
		$where= array(
		        'category_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'category_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_category',$data,$where);
		
		redirect(base_url().'Category/index');	
	}
	public function subCategory()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Category_model->get_subCategories();

		/*print_r($data);
		die();*/
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Products / Sub Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/subcategory_list', $data);	
		$this->load->view('admin/master/footer');
	}
	
	public function select_brandlist()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Category_model->get_subCategories();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Products / category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/select_brandlist', $data);	
		$this->load->view('admin/master/footer');
	}

	public function addmultiplebrand()
	{
		if(isset($_POST['add_mulbrand']))
		{	

				$mulbrand=$this->input->post('category');	

				foreach ($mulbrand as $key) {
					$data=array( 
					'sub_cat_id'=>$key,
        			'sub_category_title'=>$this->input->post('subcategory'),
        			'sub_category_pro_serv'=>$this->input->post('subprosub'),
        			'sub_category_pro_serv'=>$this->input->post('subcatcomm'),
        			'sub_category_price'=>$this->input->post('subcatprice'),
        			'sub_category_pic'=>$subcategory_image
        			);

					$details=$this->Category_model->record_insert('tbl_sub_category',$data);
				}


				$this->session->set_flashdata('event_success','Multipla Brand Successfully Created.');
				redirect(base_url().'Category/select_brandlist');
		}
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');
		$data['category'] = $this->Category_model->get_Categories();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Sub Category / Add Subtype Products Services';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/addsubcategory',$data);	
		$this->load->view('admin/master/footer');
	}
	public function addsubcategory()
	{
		if(isset($_POST['add_subcategory']))
		{	
			$where=array(  
			'sub_category_title'=>$this->input->post('subcategory'),      			
			);
			
			
			$verify_sub_category=$this->User_model->record_count('tbl_sub_category',$where);
			
			if($verify_sub_category == ''){
				if($_FILES['subcategory_pic']['name']!= ""){
		    			$img_name='subcategory_pic';
		    			$img_path='subcategory';
		    			$old_img='';
			    		$subcategory_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$subcategory_image="";
		            } 

				$variable=$this->input->post('category');	
				foreach ($variable as $key) {

				}
				date_default_timezone_set('Asia/Kolkata');
				$arrayName = array(
					'sub_cat_id'=>$key,
					'sub_category_title'=>$this->input->post('subcategory'),
        			'sub_category_pro_serv'=>$this->input->post('subprosub'),
        			'sub_category_commission'=>$this->input->post('subcatcomm'),
        			'sub_category_price'=>$this->input->post('subcatprice'),
        			'sub_category_c_date'=>$sub_category_c_date =  date('d-m-Y H:i:s'),
        			'sub_category_pic'=>$subcategory_image
				);
				$this->db->insert('tbl_sub_category', $arrayName);
  				$insert_id = $this->db->insert_id();
				$variable=$this->input->post('category');	

				$brand=$this->input->post('brand');	

				foreach ($brand as $bkey) {
					$bdata=array( 
						'subcat_id'=>$insert_id,
	        			'brand_id'=>$bkey
	        			);
					$this->db->insert('tbl_subcategory_brand', $bdata);
					
				}

				foreach ($variable as $key) {
					$data=array( 
					'category_id'=>$key,
        			'subcategory_id'=>$insert_id
        			);

					$details=$this->Category_model->record_insert('tbl_category_subcategory',$data);
				}
				
				//$details=$this->Category_model->record_insert('tbl_sub_category',$data);
			
				$this->session->set_flashdata('event_success','Sub Products Services Successfully Created.');
				redirect(base_url().'Category/subCategory');
			}else
			{
				$this->session->set_flashdata('error','Sub Category Category Already Exists.');
			}
		}
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');	
		$data['category'] = $this->Category_model->get_Categories();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Sub Category / Add Subtype Products Services';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/addsubcategory',$data);	
		$this->load->view('admin/master/footer');
	}
	public function updatesubcategory()
	{
		if(isset($_POST['update_subcategory']))
		{	
			$where=array(  
			'sub_category_title'=>$this->input->post('subcategory'),      			
			);
			
			
			$verify_sub_category=$this->User_model->record_count('tbl_sub_category',$where);
			
			if($_FILES['subcategory_pic']['name']!= ""){
			$img_name='subcategory_pic';
			$img_path='subcategory';
			$old_img=$this->input->post('old_subcategory_image');
    			$subcategory_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $subcategory_image=$this->input->post('old_subcategory_image');
		      }
		     //    $bran = $this->input->post('brand_id[]');
		    	// $bran = implode(', ', $bran);
				$where= array(
		        'sub_category_id'=>$this->input->post('sub_category_id')
							);

				date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

				$data=array( 	  
	        		'sub_cat_id'=>$this->input->post('category_id'),
	        		'sub_category_pro_serv'=>$this->input->post('subprosub'),
	        		'sub_category_price'=>$this->input->post('subcatprice'),
	        		'sub_category_title'=>$this->input->post('subcategory'),
	        		'sub_category_commission'=>$this->input->post('ratcomm'),
	        		'sub_category_u_date'=> $date = date('d-m-Y H:i:s'),
	        		'sub_category_pic'=>$subcategory_image
        			);
					
				
				foreach ($brand as $bkey) {
					$bdata=array( 
					'subcat_id'=>$insert_id,
	        			'brand_id'=>$bkey
	        			);
					$this->db->insert('tbl_subcategory_brand', $bdata);
					
				}
			if($verify_sub_category == ''){
				/*print_r($verify_sub_category);
				die();*/
				$details=$this->Category_model->records_update('tbl_sub_category',$data,$where);	
				$this->session->set_flashdata('event_success','Sub Products Services Successfully Update.');
				redirect(base_url().'Category/subCategory');		
			}else
			{
				date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

				$data=array( 	
	        		'sub_category_u_date'=> $date = date('d-m-Y H:i:s'),
	        		'sub_category_pic'=>$subcategory_image
        			);
					
				
				foreach ($brand as $bkey) {
					$bdata=array( 
						'subcat_id'=>$insert_id,
	        			'brand_id'=>$bkey
	        			);
					$this->db->insert('tbl_subcategory_brand', $bdata);
					
				}
				$details=$this->Category_model->records_update('tbl_sub_category',$data,$where);
				$this->session->set_flashdata('error','Sub Category Already Exist');
				redirect(base_url().'Category/subCategory');	
			}
		}
		$where=array(         			
				'sub_category_id'=>$this->uri->segment('3')
	    		  );
		$sub_category_id= $this->uri->segment('3');
		$data['categoryName'] = $this->Category_model->get_CategoryName($sub_category_id);

		$data['subcategory']=$details=$this->Category_model->record_list('tbl_sub_category',$where);

		$title['brand'] = $this->Category_model->getBrands($sub_category_id);
		$data['category'] = $this->Category_model->get_Categories();
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['brands'] = $this->Mvendor_model->record_list('tbl_brand');	
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']= 'Sub Category / Update Sub Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/updatesubcategory',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_subcategory()
	{	
			$where=array(
				'sub_category_id'=>$this->uri->segment(3)
			);
		
		$subcategory=$this->Category_model->record_list('tbl_sub_category',$where);

		if(!$subcategory)
		{
		 	$this->session->set_flashdata('event_failed','Sub Products Services not Found...');
        	redirect(base_url().'Category/subCategory');
		}
			if($subcategory[0]->subcategory_pic!="")
        {      
            $img_path='subcategory';
            $old_img=$subcategory[0]->subcategory_pic;
            $image_name=$this->Category_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Category_model->records_delete('tbl_sub_category',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Sub Products Services Deleted Successfully...');
        	redirect(base_url().'Category/subCategory');
    	}  
	}
	public function makeSubcatInactive()
	{		
		$where= array(
		        'sub_category_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'sub_category_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_sub_category',$data,$where);
		$this->session->set_flashdata('event_success','Type INACTIVE Successfully...');
		redirect(base_url().'Category/subCategory');	
	}
	public function makeSubcatActive()
	{		
		$where= array(
		        'sub_category_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'sub_category_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_sub_category',$data,$where);
		$this->session->set_flashdata('event_success','Type ACTIVE Successfully...');
		redirect(base_url().'Category/subCategory');	
	}
	public function type()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Category_model->get_types();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Type';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/type_list', $data);	
		$this->load->view('admin/master/footer');
	}
	public function addtype()
	{
		if(isset($_POST['add_type']))
		{	
			
				if($_FILES['type_pic']['name']!= ""){
		    			$img_name='type_pic';
		    			$img_path='type';
		    			$old_img='';
			    		$type_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$type_image="";
		            } 
		           
				$data=array( 
					'type_subcategory' => $this->input->post('subcategory'),
        			'type_name'=>$this->input->post('type_name'),
        			'type_pic'=>$type_image
        			);

				$details=$this->Category_model->record_insert('tbl_type',$data);
				$this->session->set_flashdata('event_success','Type Successfully Created.');
				redirect(base_url().'Category/type');
		}	
		$data['subcategory'] = $this->Category_model->get_subCategories();
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']= 'Type / Add Type';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/addtype', $data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_type()
	{
		$where=array(
				'type_id'=>$this->uri->segment(3)
			);
		
		$subcategory=$this->Category_model->record_list('tbl_type',$where);

		if(!$subcategory)
		{
		 	$this->session->set_flashdata('event_failed','Type Services not Found...');
        	redirect(base_url().'Category/type');
		}
			if($subcategory[0]->subcategory_pic!="")
        {      
            $img_path='subcategory';
            $old_img=$subcategory[0]->subcategory_pic;
            $image_name=$this->Category_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Category_model->records_delete('tbl_type',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Type Services Deleted Successfully...');
        	redirect(base_url().'Category/type');
    	}  
	}
	public function updatetype()
	{
		if(isset($_POST['update_type']))
		{	

			if($_FILES['type_pic']['name']!= ""){
			$img_name='type_pic';
			$img_path='type';
			$old_img=$this->input->post('old_type_image');
    		$type_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $type_image=$this->input->post('old_type_image');
		      }
		  
				$where= array(
		        'type_id'=>$this->input->post('type_id')
							);
				$data=array( 	  
        		'type_subcategory'=>$this->input->post('subcategory'),
        		'type_name'=>$this->input->post('type_name'),
        		'type_pic'=>$type_image
        			);
			$details=$this->Category_model->records_update('tbl_type',$data,$where);	
			$this->session->set_flashdata('event_success','Type Successfully Update.');
			redirect(base_url().'Category/type');		
				
		}
		$where=array(         			
				'type_id'=>$this->uri->segment('3')
	    		  );
		$this->db->select('tbl_type.*,tbl_sub_category.sub_category_title');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id = tbl_type.type_subcategory');
		$data['type']=$details=$this->Category_model->record_list('tbl_type',$where);
		$data['subcategory'] = $this->Category_model->get_subCategories();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']= 'Type / Update Type';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/updatetype',$data);	
		$this->load->view('admin/master/footer');
	}
	public function MakeTypeInactive()
	{		
		$where= array(
		        'type_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'type_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_type',$data,$where);
		$this->session->set_flashdata('event_success','INACTIVE Successfully Update.');
		redirect(base_url().'Category/type');	
	}
	public function MakeTypeActive()
	{		
		$where= array(
		        'type_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'type_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_type',$data,$where);
		$this->session->set_flashdata('event_success','ACTIVE Successfully Update.');
		redirect(base_url().'Category/type');	
	}
	public function subtype()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$data['result'] = $this->Category_model->get_Subtypes();
		$title['title']='Brand';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/subtype_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function addsubtype()
	{
		if(isset($_POST['add_subtype']))
		{	
			
			if($_FILES['subtype_pic']['name']!= ""){
					$img_name='subtype_pic';
					$img_path='subtype';
					$old_img='';
					$subtype_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
				}else{
					$subtype_image="";
				} 
			$data=array( 
				'subcategory' => $this->input->post('subcategory'),
				'subtype_type'=>$this->input->post('type_id'),
				'subtype_name'=>$this->input->post('subtype_name'),
				'subtype_pic'=>$subtype_image
				);
			$details=$this->Category_model->record_insert('tbl_subtype',$data);
			$this->session->set_flashdata('event_success','Sub Type Successfully Created.');
			redirect(base_url().'Category/subtype');
		}
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$data['subcategory'] = $this->Category_model->get_subCategories();

		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Sub Type / Add Sub Type';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/add_subtype', $data);	
		$this->load->view('admin/master/footer');
	}
	public function updatesubtype()
	{
		if(isset($_POST['update_subtype']))
		{	

			if($_FILES['subtype_pic']['name']!= ""){
			$img_name='subtype_pic';
			$img_path='subtype';
			$old_img=$this->input->post('old_subtype_image');
    		$subtype_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $subtype_image=$this->input->post('old_subtype_image');
		      }
		  
				$where= array(
		        'subtype_id'=>$this->input->post('subtype_id')
							);
				$data=array( 	  
        		'subcategory'=>$this->input->post('subcategory'),
        		'subtype_type'=>$this->input->post('type_id'),
        		'subtype_name'=>$this->input->post('subtype_name'),
        		'subtype_pic'=>$subtype_image
        			);
					
			$details=$this->Category_model->records_update('tbl_subtype',$data,$where);	
			$this->session->set_flashdata('event_success','Sub Type Successfully Update.');
			redirect(base_url().'Category/subtype');		
				
		}
		$where=array(         			
				'subtype_id'=>$this->uri->segment('3')
	    		  );
		$this->db->select('tbl_subtype.*,tbl_type.type_name,tbl_sub_category.sub_category_title');
		$this->db->join('tbl_sub_category','tbl_sub_category.sub_category_id = tbl_subtype.subcategory');
		$this->db->join('tbl_type','tbl_subtype.subtype_type = tbl_type.type_id');
		$data['subtype']=$details=$this->Category_model->record_list('tbl_subtype',$where);
		$data['subcategory'] = $this->Category_model->get_subCategories();
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']= 'Type / Update Type';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/update_subtype',$data);	
		$this->load->view('admin/master/footer');
	}
	public function MakeSubTypeActive()
	{		
		$where= array(
		        'subtype_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'subtype_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_subtype',$data,$where);
		$this->session->set_flashdata('event_success','INACTIVE Successfully Update.');
		
		redirect(base_url().'Category/subtype');	
	}
	public function MakeSubTypeInactive()
	{		
		$where= array(
		        'subtype_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'subtype_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_subtype',$data,$where);
		$this->session->set_flashdata('event_success','ACTIVE Successfully Update.');
		redirect(base_url().'Category/subtype');	
	}
	public function brand()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Category_model->get_Brands();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Brand';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/brandlist', $data);	
		$this->load->view('admin/master/footer');
	}
	public function addbrand()
	{	
		if(isset($_POST['add_brand']))
		{	
			$where=array(  
			'brand_title'=>$this->input->post('brand'),      			
			);
			
			
			$brand=$this->User_model->record_count('tbl_brand',$where);
			if($brand == ''){
			
				if($_FILES['brand_pic']['name']!= ""){
		    			$img_name='brand_pic';
		    			$img_path='brand';
		    			$old_img='';
			    		$brand_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$brand_image="";
		            } 
		         	date_default_timezone_set('Asia/Kolkata');
				$data=array( 
					 
        			'brand_title'=>$this->input->post('brand'),
        			'brand_c_date' => $timestamp = date("Y-m-d H:i:s"),
        			'brand_pic'=>$brand_image
        			);

				$details=$this->Category_model->record_insert('tbl_brand',$data);
				$this->session->set_flashdata('event_success','brand Successfully Created.');
				redirect(base_url().'Category/brand');
				}else
				{
					$this->session->set_flashdata('error','brand All Ready Created.');
					redirect(base_url().'Category/brand');
				}
			
		}
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;		
		$title['title']='Brand / Add Brand';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/addbrand');	
		$this->load->view('admin/master/footer');
	}
	public function update_brand()
	{
		if(isset($_POST['update_brand']))
		{	
		
			$where=array(  
			'brand_title'=>$this->input->post('brand'),      			
			);
			
			
			$brand=$this->User_model->record_count('tbl_brand',$where);
			
			if($_FILES['brand_pic']['name']!= ""){
			$img_name='brand_pic';
			$img_path='brand';
			$old_img=$this->input->post('old_brand_image');
    			$category_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		  	 }else{
		        $category_image=$this->input->post('old_brand_image');
		      }
		     //    $bran = $this->input->post('brand_id[]');
		    	// $bran = implode(', ', $bran);
				$where= array(
		        	'brand_id'=>$this->input->post('brand_id')
							);
				 date_default_timezone_set('Asia/Kolkata');
				$data=array(
        		'brand_title'=>$this->input->post('brand'),
        		'brand_u_date' => $timestamp = date("Y-m-d H:i:s"),
        		'brand_pic'=>$category_image
        			);
        		if($brand == ''){
			$details=$this->Category_model->records_update('tbl_brand',$data,$where);	
			$this->session->set_flashdata('event_success','Brand Successfully Update.');
			redirect(base_url().'Category/brand');
			}else
			{
				$where= array(
		        	'brand_id'=>$this->input->post('brand_id')
					);
				 date_default_timezone_set('Asia/Kolkata');
				$data=array(
 
	        		'brand_u_date' => $timestamp = date("Y-m-d H:i:s"),
	        		'brand_pic'=>$category_image
        			);
			$details=$this->Category_model->records_update('tbl_brand',$data,$where);
				$this->session->set_flashdata('error','brand All Ready Created.');
				redirect(base_url().'Category/brand');
			}		
				
		}
		$where=array(         			
				'brand_id'=>$this->uri->segment('3')
	    		  );
				  
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['brand']=$details=$this->Category_model->record_list('tbl_brand',$where);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Brand / Update Brand';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/updatebrand',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_brand()
	{	
			$where=array(
				'brand_id'=>$this->uri->segment(3)
			);
		
		$brand=$this->Category_model->record_list('tbl_brand',$where);

		if(!$brand)
		{
		 	$this->session->set_flashdata('event_failed','Brand not Found...');
        	redirect(base_url().'Category/brand');
		}
			if($brand->brand_pic!="")
        {      
            $img_path='brand';
            $old_img=$brand->brand_pic;
            $image_name=$this->Category_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Category_model->records_delete('tbl_brand',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Brand Deleted Successfully...');
        	redirect(base_url().'Category/brand');
    	}  
	}
	public function makeBrandInactive()
	{		
		$where= array(
		        'brand_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'brand_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_brand',$data,$where);
		
		redirect(base_url().'Category/brand');	
	}
	public function makeBrandAactive()
	{		
		$where= array(
		        'brand_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'brand_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_brand',$data,$where);
		
		redirect(base_url().'Category/brand');	
	}
	public function createLog($id,$img_path, $catt) // 24 Jan 19
	{	
		date_default_timezone_set('Asia/Calcutta'); 
		$dt = date("y-m-d H:i:s");
		$mst =  'Added New Category  '.$catt.' '.$img_path.'  Successfully';
		$data=array( 
			'log_userid'=>$id,
			'log_msg'=>$mst,
			'log_cdate'=>$dt
			);
		$this->Category_model->record_insert('tbl_log',$data);
	}

	public function updateLog($id,$img_path, $catt,$res) // 24 jan 19
	{	
		date_default_timezone_set('Asia/Calcutta'); 
		$dt = date("y-m-d H:i:s");
		//$mst =  'Category '.$catt.' '.$img_path.' Update Successfully';
		$test = '';
		foreach ($res as $key) {
			$test = $key;
			$mst =  'Category '.$catt.' '.$img_path.' '.$test.' Update Successfully';
			$data=array( 
			'log_userid'=>$id,
			'log_msg'=>$mst,
			'log_cdate'=>$dt
			);
			$this->Category_model->record_insert('tbl_log',$data);
		}
		
		
	}
}
