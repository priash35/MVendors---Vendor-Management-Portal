<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertise extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('Advertise_model');
		$this->load->model('User_model');
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
		$title['right'] = $result->arights;
		$data['result'] = $this->Advertise_model->get_Advertise();	
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Advertise';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/advertise_list', $data);	
		$this->load->view('admin/master/footer');
	}
	public function add_advertise()
	{	
		if(isset($_POST['add_advertise']))
		{	
			
			if($_FILES['advertise_pic']['name']!= ""){
	    			$img_name='advertise_pic';
	    			$img_path='advertise';
	    			$old_img='';
		    		$advertise_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
	            }else{
	            	$advertise_image="";
	            } 
	           
			$data=array( 
				 
    			'advertise_title'=>$this->input->post('advertise_name'),
    			'advertise_pic'=>$advertise_image
    			);

			$details=$this->Advertise_model->record_insert('tbl_advertise',$data);
			$this->session->set_flashdata('event_success','Advertise Successfully Created.');
			redirect(base_url().'Advertise/index');
		}
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$title['title']='Advertise / Add Advertise';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/addadvertise');	
		$this->load->view('admin/master/footer');
	}
	public function update_advertise()
	{
		if(isset($_POST['update_advertise']))
		{	

			if($_FILES['advertise_pic']['name']!= ""){
			$img_name='advertise_pic';
			$img_path='advertise';
			$old_img=$this->input->post('old_advertise_image');
    		$advertise_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $advertise_image=$this->input->post('old_advertise_image');
		      }
				$where= array(
		        'advertise_id'=>$this->input->post('advertise_id')
							);
				$data=array(
        		'advertise_title'=>$this->input->post('advertise_name'),
        		'advertise_pic'=>$advertise_image
        			);
			$details=$this->Advertise_model->records_update('tbl_advertise',$data,$where);	
			$this->session->set_flashdata('event_success','Advertise Successfully Updated.');
			redirect(base_url().'Advertise/index');		
				
		}
		$where=array(         			
				'advertise_id'=>$this->uri->segment('3')
	    		  );
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['advertise']=$details=$this->Advertise_model->record_list('tbl_advertise',$where);
		$title['title']= 'Advertise / Update Advertise';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/updateadvertise',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_advertise()
	{	
			$where=array(
				'advertise_id'=>$this->uri->segment(3)
			);
		
		$advertise=$this->Advertise_model->record_list('tbl_advertise',$where);

		if(!$advertise)
		{
		 	$this->session->set_flashdata('event_failed','Advertise not Found...');
        	redirect(base_url().'Avertise/index');
		}
			if($advertise[0]->advertise_pic!="")
        {      
            $img_path='advertise';
            $old_img=$advertise[0]->advertise_pic;
            $image_name=$this->Advertise_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Advertise_model->records_delete('tbl_advertise',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Advertise Deleted Successfully...');
        	redirect(base_url().'Advertise/index');
    	}  
	}
	public function MakeAdvertiseActive()
	{		
		$where= array(
		        'advertise_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'advertise_status' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_advertise',$data,$where);
		$this->session->set_flashdata('event_success','Advertise INACTIVE Successfully...');
		redirect(base_url().'Advertise/index');	
	}
	public function MakeAdvertiseInactive()
	{		
		$where= array(
		        'advertise_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'advertise_status' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_advertise',$data,$where);
		$this->session->set_flashdata('event_success','Advertise ACTIVE Successfully...');
		redirect(base_url().'Advertise/index');	
	}
	public function listbanner()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Advertise_model->get_Listbanner();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Advertise / Listing Page Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/listbanner', $data);	
		$this->load->view('admin/master/footer');
	}
	public function add_banner()
	{	
		if(isset($_POST['add_banner']))
		{	
			
				if($_FILES['banner_pic']['name']!= ""){
		    			$img_name='banner_pic';
		    			$img_path='banner';
		    			$old_img='';
			    		$banner_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$banner_image="";
		            } 
		           
				$data=array( 
					 
        			'banner_title'=>$this->input->post('banner_name'),
        			'banner_pic'=>$banner_image
        			);

				$details=$this->Advertise_model->record_insert('tbl_banner',$data);
				$this->session->set_flashdata('event_success','Banner Successfully Created.');
				redirect(base_url().'Advertise/listbanner');
		}
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$title['title']='Banner / Add Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/addbanner');	
		$this->load->view('admin/master/footer');
	}
	public function update_banner()
	{
		if(isset($_POST['update_banner']))
		{	

			if($_FILES['banner_pic']['name']!= ""){
			$img_name='banner_pic';
			$img_path='banner';
			$old_img=$this->input->post('old_banner_image');
    		$banner_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $banner_image=$this->input->post('old_banner_image');
		      }
				$where= array(
		        'banner_id'=>$this->input->post('banner_id')
							);
				$data=array(
        		'banner_title'=>$this->input->post('banner_name'),
        		'banner_pic'=>$banner_image
        			);
			$details=$this->Advertise_model->records_update('tbl_banner',$data,$where);	
			$this->session->set_flashdata('event_success','Banner Successfully Updated.');
			redirect(base_url().'Advertise/listbanner');		
				
		}
		$where=array(         			
				'banner_id'=>$this->uri->segment('3')
	    		  );
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['banner']=$details=$this->Advertise_model->record_list('tbl_banner',$where);
		$title['title']= 'Banner / Update Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/updatebanner',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_banner()
	{	
			$where=array(
				'banner_id'=>$this->uri->segment(3)
			);
		
		$banner=$this->Advertise_model->record_list('tbl_banner',$where);

		if(!$banner)
		{
		 	$this->session->set_flashdata('event_failed','Banner not Found...');
        	redirect(base_url().'Avertise/listbanner');
		}
			if($banner[0]->banner_pic!="")
        {      
            $img_path='banner';
            $old_img=$banner[0]->banner_pic;
            $image_name=$this->Advertise_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Advertise_model->records_delete('tbl_banner',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Banner Deleted Successfully...');
        	redirect(base_url().'Advertise/listbanner');
    	}  
	}
	public function MakeBannerActive()
	{		
		$where= array(
		        'banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'banner_status' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_banner',$data,$where);
		$this->session->set_flashdata('event_success','Banner INACTIVE Successfully...');
		redirect(base_url().'Advertise/listbanner');	
	}
	public function MakeBannerInactive()
	{		
		$where= array(
		        'banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'banner_status' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_banner',$data,$where);
		$this->session->set_flashdata('event_success','Banner ACTIVE Successfully...');
		redirect(base_url().'Advertise/listbanner');	
	}
	public function productbanner()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Advertise_model->get_Productbanner();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Advertise / Product Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/prodbannerlist', $data);	
		$this->load->view('admin/master/footer');
	}
public function add_productbanner()
	{	
		if(isset($_POST['add_p_banner']))
		{	
			
				if($_FILES['p_banner_pic']['name']!= ""){
		    			$img_name='p_banner_pic';
		    			$img_path='product_banner';
		    			$old_img='';
			    		$banner_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$banner_image="";
		            } 
		           
				$data=array( 
					 
        			'product_banner_title'=>$this->input->post('p_banner_name'),
        			'product_banner_pic'=>$banner_image
        			);

				$details=$this->Advertise_model->record_insert('tbl_product_banner',$data);
				$this->session->set_flashdata('event_success','Product Banner Successfully Created.');
				redirect(base_url().'Advertise/productbanner');
		}
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$title['title']='Product Banner / Add Product Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/add_prod_banner');	
		$this->load->view('admin/master/footer');
	}
	public function update_productbanner()
	{
		if(isset($_POST['update_p_banner']))
		{	

			if($_FILES['p_banner_pic']['name']!= ""){
			$img_name='p_banner_pic';
			$img_path='product_banner';
			$old_img=$this->input->post('old_banner_image');
    		$banner_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $banner_image=$this->input->post('old_banner_image');
		      }
				$where= array(
		        'product_banner_id'=>$this->input->post('p_banner_id')
							);
				$data=array(
        		'product_banner_title'=>$this->input->post('p_banner_name'),
        		'product_banner_pic'=>$banner_image
        			);
			$details=$this->Advertise_model->records_update('tbl_product_banner',$data,$where);	
			$this->session->set_flashdata('event_success','Product Banner Successfully Updated.');
			redirect(base_url().'Advertise/productbanner');		
				
		}
		$where=array(         			
				'product_banner_id'=>$this->uri->segment('3')
	    		  );
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['banner']=$details=$this->Advertise_model->record_list('tbl_product_banner',$where);
		$title['title']= 'Banner / Update Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/update_prod_banner',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_p_banner()
	{	
			$where=array(
				'product_banner_id'=>$this->uri->segment(3)
			);
		
		$banner=$this->Advertise_model->record_list('tbl_product_banner',$where);

		if(!$banner)
		{
		 	$this->session->set_flashdata('event_failed','Banner not Found...');
        	redirect(base_url().'Avertise/productbanner');
		}
			if($banner[0]->product_banner_pic!="")
        {      
            $img_path='product_banner';
            $old_img=$banner[0]->product_banner_pic;
            $image_name=$this->Advertise_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Advertise_model->records_delete('tbl_product_banner',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Product Banner Deleted Successfully...');
        	redirect(base_url().'Advertise/productbanner');
    	}  
	}
	public function MakeProdBannerActive()
	{		
		$where= array(
		        'product_banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'product_banner_status' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_product_banner',$data,$where);
		
		redirect(base_url().'Advertise/productbanner');	
	}
	public function MakeProdBannerInactive()
	{		
		$where= array(
		        'product_banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'product_banner_status' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_product_banner',$data,$where);
		
		redirect(base_url().'Advertise/productbanner');	
	}	
	public function advertise_banner()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['result'] = $this->Advertise_model->get_Ad_Banner();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Advertise / Advertise Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/advertise_banner_list', $data);	
		$this->load->view('admin/master/footer');
	}
	public function add_ad_banner()
	{	
		if(isset($_POST['add_ad_banner']))
		{	
			
				if($_FILES['ad_banner_pic']['name']!= ""){
		    			$img_name='ad_banner_pic';
		    			$img_path='advertise_banner';
		    			$old_img='';
			    		$advertise_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$advertise_image="";
		            } 
		           
				$data=array( 
					 
        			'ad_banner_title'=>$this->input->post('ad_banner_name'),
        			'ad_banner_pic'=>$advertise_image
        			);

				$details=$this->Advertise_model->record_insert('tbl_ad_banner',$data);
				$this->session->set_flashdata('event_success','Advertise Banner Successfully Created.');
				redirect(base_url().'Advertise/advertise_banner');
		}
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 		
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$title['title']='Advertise Banner / Add Advertise Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/add_advertise_banner');	
		$this->load->view('admin/master/footer');
	}
	public function update_ad_banner()
	{
		if(isset($_POST['update_ad_banner']))
		{	

			if($_FILES['ad_banner_pic']['name']!= ""){
			$img_name='ad_banner_pic';
			$img_path='advertise_banner';
			$old_img=$this->input->post('old_ad_banner_image');
    		$advertise_image=$this->Advertise_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $advertise_image=$this->input->post('old_ad_banner_image');
		      }
				$where= array(
		        'ad_banner_id'=>$this->input->post('ad_banner_id')
							);
				$data=array(
        		'ad_banner_title'=>$this->input->post('ad_banner_name'),
        		'ad_banner_pic'=>$advertise_image
        			);
			$details=$this->Advertise_model->records_update('tbl_ad_banner',$data,$where);	
			$this->session->set_flashdata('event_success','Advertise Banner Successfully Updated.');
			redirect(base_url().'Advertise/advertise_banner');		
				
		}
		$where=array(         			
				'ad_banner_id'=>$this->uri->segment('3')
	    		  );
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['advertise']=$details=$this->Advertise_model->record_list('tbl_ad_banner',$where);
		$title['title']= 'Advertise Banner / Update Advertise Banner';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/update_ad_banner',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_ad_banner()
	{	
			$where=array(
				'ad_banner_id'=>$this->uri->segment(3)
			);
		
		$advertise=$this->Advertise_model->record_list('tbl_ad_banner',$where);

		if(!$advertise)
		{
		 	$this->session->set_flashdata('event_failed','Advertise Banner not Found...');
        	redirect(base_url().'Avertise/advertise_banner');
		}
			if($advertise[0]->ad_banner_pic!="")
        {      
            $img_path='advertise_banner';
            $old_img=$advertise[0]->ad_banner_pic;
            $image_name=$this->Advertise_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Advertise_model->records_delete('tbl_ad_banner',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Advertise Banner Deleted Successfully...');
        	redirect(base_url().'Advertise/advertise_banner');
    	}  
	}
	public function MakeAdBannerActive()
	{		
		$where= array(
		        'ad_banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'ad_banner_status' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_ad_banner',$data,$where);
		$this->session->set_flashdata('event_success','Advertise Banner ACTIVE Successfully...');
		redirect(base_url().'Advertise/advertise_banner');	
	}
	public function MakeAdBannerInactive()
	{		


		$where= array(
		        'ad_banner_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'ad_banner_status' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_ad_banner',$data,$where);
		$this->session->set_flashdata('event_success','Advertise Banner INACTIVE Successfully...');

		redirect(base_url().'Advertise/advertise_banner');	
	}

	public function add_slider()
	{
		if(isset($_POST['add_slider']))
		{	
			
				if($_FILES['sliimg']['name']!= ""){
		    			$img_name='sliimg';
		    			$img_path='slider';
		    			$old_img='';
			    		$advertise_image=$this->Advertise_model->slide_upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$advertise_image="";
		            } 
		        date_default_timezone_set('Asia/Kolkata');
				$date = date("Y-m-d");
				$data=array( 
					 
        			'slider_title'=>$this->input->post('slidtitle'),
        			'slider_subtitle'=>$this->input->post('slisubtitle'),
        			'slider_pic'=>$advertise_image,
        			'slider_c_date'=>$date
        			);
				$details=$this->Advertise_model->record_insert('tbl_slider',$data);
				$this->session->set_flashdata('event_success','Slider Successfully Created.');
				redirect(base_url().'Advertise/slider_list');
		}
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;		
		$title['title']='Advertise / Add Slider';
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/add_slider');	
		$this->load->view('admin/master/footer');
	}
	public function update_slider()
	{
		if(isset($_POST['update_slid']))
		{	

			if($_FILES['sliimg']['name']!= ""){
			$img_name='sliimg';
			$img_path='slider';
			$old_img=$this->input->post('old_slide');
    		$advertise_image=$this->Advertise_model->slide_upload_image($img_name,$img_path,$old_img);
		   }else{
		        $advertise_image=$this->input->post('old_slide');
		      }
				$where= array(
		        'slider_id'=>$this->input->post('sli_id')
							);
				date_default_timezone_set('Asia/Kolkata');
				$date =   date("Y-m-d H:i:s");
				$data=array(
        		'slider_title'=>$this->input->post('slidtitle'),
        		'slider_subtitle'=>$this->input->post('slisubtitle'),
        		'slider_pic'=>$advertise_image,
        		'slider_up_date'=>$date
        			);
			$details=$this->Advertise_model->records_update('tbl_slider',$data,$where);	
			$this->session->set_flashdata('event_success','Slider Successfully Updated.');
			redirect(base_url().'Advertise/slider_list');		
				
		}
		$where=array(         			
				'slider_id'=>$this->uri->segment('3')
	    		  );
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['advertise']=$details=$this->Advertise_model->record_list('tbl_slider	',$where);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Advertise Banner / Update Slider';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/update_slide',$data);	
		$this->load->view('admin/master/footer');
	}
	public function slider_list()
	{
		$uid = $_SESSION['userid'];
		$data['result'] = $this->Advertise_model->get_Slider();
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;		
		$title['title']='Advertise / Add List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/advertise/slider_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_slider()
	{	
			$where=array(
				'slider_id'=>$this->uri->segment(3)
			);
		
		$advertise=$this->Advertise_model->record_list('tbl_slider',$where);

		if(!$advertise)
		{
		 	$this->session->set_flashdata('event_failed','Slider not Found...');
        	redirect(base_url().'Avertise/slider_list');
		}
			if($advertise[0]->slider_pic!="")
        {      
            $img_path='slider';
            $old_img=$advertise[0]->slider_pic;
            $image_name=$this->Advertise_model->delete_image($img_path,$old_img);
        }

        $delete_id=$this->Advertise_model->records_delete('tbl_slider',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Slider Deleted Successfully...');
        	redirect(base_url().'Advertise/slider_list');
    	}  
	}
	public function makeSliderActive()
	{
		$where= array(
		        'slider_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'slider_status' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_slider',$data,$where);
		$this->session->set_flashdata('event_success','Slider INACTIVE Successfully...');

		redirect(base_url().'Advertise/slider_list');	
	}
	public function makeSliderInactive()
	{
		$where= array(
		        'slider_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'slider_status' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_slider',$data,$where);
		$this->session->set_flashdata('event_success','Slider INACTIVE Successfully...');

		redirect(base_url().'Advertise/slider_list');	
	}
}
