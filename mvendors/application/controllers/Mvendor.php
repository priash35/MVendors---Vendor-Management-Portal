<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mvendor extends CI_Controller {
	

	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Inquiry_model');
		$this->load->model('Madmin_model');
		$this->load->model('Vendor_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
         if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'VLogin');
		}
	}
	
	public function index()
	{		
	$vendor = $_SESSION['userid'];
		$title['res'] = $this->Mvendor_model->check_vendor($vendor);
		//print_r($title);
		//echo $vendor;
		//die();
		$where = array(
			'country_id' => 101
		);

		$where1 = array(
			'state_id' => 22
		);

		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['title']='Dashboard';	
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data1['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data1['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data1['cur_states'] = $this->Mvendor_model->record_list('tbl_states',$where);
		$data1['city'] = $this->Mvendor_model->record_list('tbl_city');
		$data1['cur_city'] = $this->Mvendor_model->record_list('tbl_city',$where1);
		$data1['category'] = $this->Mvendor_model->record_list('tbl_category');
		$data1['subcategory'] = $this->Mvendor_model->record_list('tbl_sub_category');
		$data1['brand'] = $this->Mvendor_model->record_list('tbl_brand');
		$data1['package'] = $this->Mvendor_model->record_list('tbl_package');
		$data1['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
		$data1['type'] = $this->Mvendor_model->record_list('tbl_type');
		$data1['vendor'] = $vendor; 	
		$data1['action'] = 'add'; 
		$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

		$data['userenq'] = $this->Inquiry_model->get_user_enqlist($vendor);

		//---------------------------------------------------updated on 29 Dec 2018
			$data2= $this->Mvendor_model->get_AllCatSubcat_new($vendor);
			
			$out_array=array();
			foreach ($data2 as $value) {
			$out_array[$value->category_id] = array();			
			}
			foreach ($data2 as $value) {
			
			array_push($out_array[$value->category_id],array("category_title"=>$value->category_title,"sub_category_title"=>$value->sub_category_title,"sub_category_id"=>$value->sub_category_id,"sel"=>$value->sel));
			}
		
		$data1['allcatsubc']=array();
		$data1['allcatsubc']=$out_array;

		//----------------------------------------------------


		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left', $data);
		if($data['result'][0]->vemail == ''){
			$this->load->view('vendor/vendor_details', $data);	
		}else 
		{ 	if($title['res'] != 'true')
			{			
				$this->load->view('vendor/business', $data1);
			} 
			else
			{
				$this->load->view('vendor/index',$data);
			}
		}
		$this->load->view('vendor/master/footer');
	}
	public function vendor_business()
	{
		$vendor = $_SESSION['userid'];
		$data['title']='Business Details';
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);				
		$data1['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data1['category'] = $this->Mvendor_model->record_list('tbl_category');
		$data1['brand'] = $this->Mvendor_model->record_list('tbl_brand');
		$data1['package'] = $this->Mvendor_model->record_list('tbl_package');
		$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);	

		$data1['vendor'] = $vendor;
		$data1['action'] = 'update'; 	
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left', $data);
		$this->load->view('vendor/business', $data1);
		$this->load->view('vendor/master/footer');
	}
	public function update_vprofile()
	{
		if(isset($_POST['update_profile']))
		{
			
			$vid = $_POST['vid'];
			if($_FILES['profile']['name']!= ""){
		    			$img_name='profile';
		    			$img_path='vendor';
		    			$old_img=$this->input->post('old_user_pic');
			    		$vendor_image=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_image=$this->input->post('old_user_pic');;
		            } 

			$where = array(
				'vendor_id' => $vid
			);
					    
			$data = array(
				'vfname' => $_POST['vfname'],
				'vlname' => $_POST['vlname'],
				'vemail' => $_POST['vemail'],
				'vmobile' => $_POST['vmobile'],
				'vanumber' => $_POST['vanumber'],
				'vgender' => $_POST['vgender'],
				'vdob' => $_POST['vdob'],
				'vprof_pic' => $vendor_image,
				'vaddress' => $_POST['vbaddress'],
				'vsaddress' => $_POST['vsaddress']
			);

			
			$this->Mvendor_model->records_update('tbl_vendor', $data, $where);
			$this->session->set_flashdata('event_success','Profile Successfully Created.');
			redirect('Mvendor/venoders_profile');
		}
	}
	
	public function get_state()
	{
		$cid = $this->input->post('id');
		$where = array(
			'country_id' => $cid
		);
		$data = $this->Mvendor_model->record_list('tbl_states', $where);

		$output = '';
		$output = '<option value="">Select State</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->id.'">'.$row->state_name.'</option>';
		}
		echo $output;
	}
	public function get_city()
	{
		$cid = $this->input->post('id');
		$where = array(
			'state_id' => $cid
		);
		$data = $this->Mvendor_model->record_list('tbl_city', $where);

		$output = '';
		$output = '<option value="">Select City</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->id.'">'.$row->city_name.'</option>';
		}
		echo $output;
	}
	public function get_sub_cat()
	{
		
		$cid= $this->input->post('id');
		//$cid = 1;
		$this->db->from('tbl_category_subcategory tcs');
        $this->db->join('tbl_sub_category tc','tc.sub_category_id = tcs.subcategory_id');
        $this->db->join('tbl_category tac','tac.category_id = tcs.category_id');  
        $this->db->where_in('tcs.category_id', $cid); 
        $query =$this->db->get();
        $result = $query->result();
		/*foreach ($cid as $key) {
			$where = array(
			'sub_cat_id' => $key
			);
		}
		
		$where = array(
			'sub_cat_id' => '3'
			);
		$id = array('1', '2');*/


		/*$this->db->select('*');
        $this->db->from('tbl_sub_category t');
        $this->db->join('tbl_category tc','tc.category_id = t.sub_cat_id'); 
        $this->db->where_in('sub_cat_id', $cid); 
        $query =$this->db->get();
        $result = $query->result();*/

     
		/*$data = $this->Mvendor_model->record_list('tbl_sub_category', $where);
*/
		$output = '';
		//$output = '<option value="">Select Sub Category</option>';
		foreach($result as $row){
			$output.= '<option value="'.$row->category_id.','.$row->sub_category_id.'"> ('.$row->category_title.') '.$row->sub_category_title.'</option>';
		}


		//print_r($result);
		echo $output;
	}
	public function get_type()
	{
		$cid = $this->input->post('id');
	/*	$where = array(
			'type_subcategory' => $cid
		);

		$where = array(
			'subcat_id' => $cid
		);
*/		//$cid = array('94', '15', '22', '46', '86');

		$this->db->select('*');
		$this->db->from('tbl_subcategory_brand tsubbr');
		$this->db->join('tbl_brand tbr','tbr.brand_id= tsubbr.brand_id');
		$this->db->where_in('subcat_id',$cid);
		$data = $this->db->get()->result();
		/*print_r($output);
		die();*/
		//$data = $this->Mvendor_model->record_list('tbl_type', $where);

		$output = '';
		//$output = '<option value="">Select Type</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->brand_id.'">'.$row->brand_title.'</option>';
		}
		echo $output;
	}
	public function get_sub_type()
	{
		$cid = $this->input->post('id');
		$where1 = array(
			'type_subcategory' => $cid
		);
		$data= $this->Mvendor_model->record_list('tbl_type', $where1);
		
		$output = '';
		$output = '<option value="">Select Type</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->type_id.'">'.$row->type_name.'</option>';
		}
		echo $output;
	}
	public function get_bdata()
	{
		
		/*$vid = $_POST['v_id'];
		$details= $this->Mvendor_model->check_business_details_exist($vid);
		if ($details !== '') {
			echo "pass";
		}
		else
		{
			echo "Fail";
		}
		die();*/
		if(isset($_POST['save']))
		{
			//$subcategory = implode(',', $_POST['sub_category']);
			//$category = implode(',', $_POST['category']);
			//$bis_brand = implode(',',$_POST['brand']);
			$str =  $_POST['shop_name'];
			$slug = str_replace(' ','-',$str);

			$vid = $_POST['v_id'];
			if($_FILES['shop_pic']['name']!= ""){
		    			$img_name='shop_pic';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_image=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_image=$this->input->post('old_prof_pic');;
		            } 
		    if($_FILES['shop_logo']['name']!= ""){
		    			$img_name='shop_logo';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_logo=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_logo=$this->input->post('old_bis_logo');;
		            }

	 //for multiple imag upload on 21 Nov 2018

		            // If file upload form submitted
		        if(!empty($_FILES['shop_imgs']['name'])){
		        
		            $filesCount = count($_FILES['shop_imgs']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['shop_imgs']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['shop_imgs']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['shop_imgs']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['shop_imgs']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['shop_imgs']['size'][$i];
		                
		                // File upload configuration
		                $img_path='vbusiness';
		                $uploadPath = './assets/uploads/'.$img_path;
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();

		                    //print_r( $fileData);
		                   
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                 //$images[] = $_FILES['file']['name'];
		                $images[] = $fileData['file_name'];
		               //  print_r( $images);
		                  
		            }
				        $fileName = implode(',',$images);
				        
				 }
			        
			
			$where = array(
				'bis_det_id' => $_POST['v_id']
			);

			/*$data2 = array(
				'vaccount_hname' => $_POST['b_holder_name'],
				'vaccount_num' => $_POST['acc_num'],
				'vbank_name' => $_POST['bank_name'],
				'vgst' => $_POST['bis_gst'],
				'vifsc_code' => $_POST['ifsc_code']
			);*/
			//$cat=$this->input->post('category');	
			$subcat=$this->input->post('sid');	
			
					foreach ($subcat as $subcat_id) {
						$sub_values=explode(',', $subcat_id);

						$this->db->select('ven_cat_subcat_id');
						$this->db->from('tbl_vendors_cat_subcat');
						$this->db->where('vend_id',$vid);
						$this->db->where('cat_id', $sub_values[0]);
						$this->db->where('subcat_id', $sub_values[1]);
						$result =  $this->db->get();
						
					
					if ($result->num_rows() > 0) {
							$id=$result->row()->ven_cat_subcat_id;

							$data1 = array(								
								'ven_stauts' =>'ACTIVE'	
							);
							$this->db->where('ven_cat_subcat_id', $id);
 							$this->db->update('tbl_vendors_cat_subcat', $data1);

					}
					else{
							$data3 = array(
								'vend_id' => $vid,
								'cat_id' => $sub_values[0],
								'subcat_id' => $sub_values[1], 
							);
							$this->Mvendor_model->record_insert('tbl_vendors_cat_subcat', $data3);

						
					}
				}
						
			
			/*foreach ($cat as $key) {

				foreach ($subcat as $subcat_id) {
					$this->db->select('sub_cat_id');
					$this->db->from('tbl_sub_category');
					$this->db->where('sub_category_id', $subcat_id);
					$test =  $this->db->get()->row();
					$id = $test->sub_cat_id;
				
				if ($id == $key) {
						$data3 = array(
							'vend_id' => $vid,
							'cat_id' => $key,
							'subcat_id' => $subcat_id, 
						);
					$this->Mvendor_model->record_insert('tbl_vendors_cat_subcat', $data3);

					
					}
				
				}
				
			}
			$bis_brand = $this->input->post('brand');
					foreach ($bis_brand as $brn) {
						$data4 = array(
							'vendor_id' => $vid,
							'brand_id' => $brn, 
							'subcat_id' => $subcat_id,
						);
						$this->Mvendor_model->record_insert('tbl_vendors_subcat_brand', $data4);
					}
				*/


			
			$data = array(
				'bis_vendor_id' => $_POST['v_id'],
				'bis_name' => $_POST['shop_name'],
				'bis_slug' => $slug,
				//'bis_vtype' => $_POST['buss_type'],
				'bis_email' => $_POST['email'],
				'bis_mnumber' => $_POST['mobile'],
				'bis_manumber' => $_POST['alt_mobile'],
				'bis_address' => $_POST['address'],
				'bis_aaddress' => $_POST['aaddress'],
				//'bis_category' => $_POST['category'],
				/*'bis_category' => $category,
				'bis_sub_category' => $subcategory,*/
				'bis_gst' => $_POST['bis_gst'],
				//'bis_type' => $_POST['type'],
				//'bis_sub_type' => $_POST['sub_type'],
				/*'bis_type' => "test",
				'bis_sub_type' => "test",*/
				/*'bis_brand' => $key,*/
				'bis_established_date' => $_POST['edate'],
				'bis_op_time' => $_POST['op_time'],
				'bis_cls_time' => $_POST['cl_time'],
				/*'bis_package' => $_POST['package'],*/
				'bis_pic' =>  $vendor_image,
				'bis_logo' =>  $vendor_logo,
				'bis_description' => $_POST['description'],
				'bis_cont_person' => $_POST['cont_person'],
				'bis_pincode' => $_POST['pincode'],
				'bis_country' => $_POST['country'],
				'bis_state' => $_POST['state'],
				'bis_city' => $_POST['city'],
				'bis_shop_imgs' => $fileName
			);

			
			//$this->Mvendor_model->records_update('tbl_vendor', $data2, $where);
			$this->Mvendor_model->record_insert('tbl_vbusiness_details', $data);
			$this->session->set_flashdata('success','Business Profile Successfully Created.');
			redirect('Mvendor/index');
		}


		//echo $vid = $this->uri->segment(3);

	

		

		if(isset($_POST['update'])) // Update Business Details
		{

				// INACTIVE All Account 
	   			$vid = $_POST['v_id'];
				$arrayName = array('ven_stauts' => 'INACTIVE', );
				$this->db->where('vend_id', $vid);
 				$this->db->update('tbl_vendors_cat_subcat', $arrayName);

 				
 				$subcat=$this->input->post('sub_category');

					foreach ($subcat as $subcat_id) {
						$sub_values=explode(',', $subcat_id);

						$this->db->select('ven_cat_subcat_id');
						$this->db->from('tbl_vendors_cat_subcat');
						$this->db->where('vend_id',$vid);
						$this->db->where('cat_id', $sub_values[0]);
						$this->db->where('subcat_id', $sub_values[1]);
						$result =  $this->db->get();
						
					
					if ($result->num_rows() > 0) {
							$id=$result->row()->ven_cat_subcat_id;

							$data1 = array(								
								'ven_stauts' =>'ACTIVE'	
							);
							$this->db->where('ven_cat_subcat_id', $id);
 							$this->db->update('tbl_vendors_cat_subcat', $data1);

					}
					else{
							$data3 = array(
								'vend_id' => $vid,
								'cat_id' => $sub_values[0],
								'subcat_id' => $sub_values[1], 
							);
							$this->Mvendor_model->record_insert('tbl_vendors_cat_subcat', $data3);

						
					}
				}
						
      		
      	

      		$str =  $_POST['shop_name'];
			$slug = str_replace(' ','-',$str);
      		
			if($_FILES['shop_pic']['name']!= ""){
		    			$img_name='shop_pic';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_image=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_image=$this->input->post('old_prof_pic');;
		            } 
		    if($_FILES['shop_logo']['name']!= ""){
		    			$img_name='shop_logo';
		    			$img_path='vendor_businesssiness';
		    			$old_img='';
			    		$vendor_logo=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_logo=$this->input->post('old_bis_logo');;
		            }
			$where = array(
				'vendor_id' => $vid
			);


			 // If file upload form submitted
		        //if(!empty($_FILES['shop_imgs']['name'])){
				//if($_FILES['shop_imgs']['name']!= ""){
			if ($_FILES['shop_imgs']['size'] == 0 && $_FILES['shop_imgs']['error'] == 0)
			{
					//echo "in files";
		        
		            $filesCount = count($_FILES['shop_imgs']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['shop_imgs']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['shop_imgs']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['shop_imgs']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['shop_imgs']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['shop_imgs']['size'][$i];
		                
		                // File upload configuration
		                $img_path='vbusiness';
		                $uploadPath = './assets/uploads/'.$img_path;
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();

		                    //print_r( $fileData);
		                   
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                 //$images[] = $_FILES['file']['name'];
		                $images[] = $fileData['file_name'];
		               //  print_r( $images);
		                  
		            }
				        $fileName = implode(',',$images);
				        /*echo $fileName;
				        die();*/
				 }
				 else
				 {
				 	$fileName= $_POST['shopimgs'];
				 }

			/*$data = array(
				'vaccount_hname' => $_POST['b_holder_name'],
				'vaccount_num' => $_POST['acc_num'],
				'vbank_name' => $_POST['bank_name'],
				'vgst' => $_POST['bis_gst'],
				'vifsc_code' => $_POST['ifsc_code']
			);	*/
			/*$cat=$this->input->post('category');	
			$subcat=$this->input->post('sub_category');	

			foreach ($cat as $key) {

				foreach ($subcat as $subcat_id) {
					$this->db->select('sub_cat_id');
					$this->db->from('tbl_sub_category');
					$this->db->where('sub_category_id', $subcat_id);
					$test =  $this->db->get()->row();
					$id = $test->sub_cat_id;
				
				if ($id == $key) {
						$data3 = array(
							'vend_id' => $vid,
							'cat_id' => $key,
							'subcat_id' => $subcat_id, 
						);
					$this->Mvendor_model->record_insert('tbl_vendors_cat_subcat', $data3);

					
					}
					
				}
				
			}*/
			
		$where1 = array(
				'bis_vendor_id' => $_POST['v_id']
			);
			
			$data1 = array(
				'bis_vendor_id' => $_POST['v_id'],
				'bis_name' => $_POST['shop_name'],
				'bis_slug' => $slug,
				//'bis_vtype' => $_POST['buss_type'],
				'bis_email' => $_POST['email'],
				'bis_mnumber' => $_POST['mobile'],
				'bis_manumber' => $_POST['alt_mobile'],
				'bis_address' => $_POST['address'],
				'bis_aaddress' => $_POST['aaddress'],	
				//'bis_category' => $_POST['category'],
				'bis_category' => 'test',
				'bis_sub_category' => 'test',
				'bis_gst' => $_POST['bis_gst'],
				//'bis_type' => $_POST['type'],
				//'bis_sub_type' => $_POST['sub_type'],
				/*'bis_type' => "test",
				'bis_sub_type' => "test",*/
				'bis_brand' => 'test',
				'bis_established_date' => $_POST['edate'],
				'bis_op_time' => $_POST['op_time'],
				'bis_cls_time' => $_POST['cl_time'],
				/*'bis_package' => $_POST['package'],*/
				'bis_pic' =>  $vendor_image,
				'bis_logo' =>  $vendor_logo,
				'bis_description' => $_POST['description'],
				'bis_cont_person' => $_POST['cont_person'],
				'bis_pincode' => $_POST['pincode'],
				'bis_country' => $_POST['country'],
				'bis_state' => $_POST['state'],
				'bis_city' => $_POST['city']
			);

				
			
			$this->Mvendor_model->records_update('tbl_vbusiness_details', $data1,$where1);
			$this->session->set_flashdata('success','Update Business Successfully Created.');
			redirect('Mvendor/index');
		}
			$data['ip']  = $_SERVER['REMOTE_ADDR'];
			$vendor = $_SESSION['userid'];
			$data['title']='Business Details';
			$data['country'] = $this->Mvendor_model->record_list('tbl_country');
			$data['states'] = $this->Mvendor_model->record_list('tbl_states');
			$data['city'] = $this->Mvendor_model->record_list('tbl_city');
			$data['category'] = $this->Mvendor_model->record_list('tbl_category');
			$data['subcategory'] = $this->Mvendor_model->record_list('tbl_sub_category');
			$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');
			$data['package'] = $this->Mvendor_model->get_package_list('tbl_package');
			$data['type'] = $this->Mvendor_model->record_list('tbl_type');
			$data['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
			$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
			$data['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

			$data1['vendor'] = $vendor;
			$data1['action'] = 'update'; 	
			$this->load->view('vendor/master/header');
			$this->load->view('vendor/master/left', $data);
			$this->load->view('vendor/business', $data);
			$this->load->view('vendor/master/footer');
	}

	public function update_bdata()
	{
		
		$vid = $this->uri->segment(3);
		if(isset($_POST['update']))
		{
			$vid = $this->input->post('id');
			$this->db->where('vend_id', $vid);
      		$this->db->delete('tbl_vendors_cat_subcat'); 

      		$this->db->where('vendor_id', $vid);
      		$this->db->delete('tbl_vendors_subcat_brand'); 
   
			if($_FILES['shop_pic']['name']!= ""){
		    			$img_name='shop_pic';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_image=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_image=$this->input->post('old_prof_pic');;
		            } 
		    if($_FILES['shop_logo']['name']!= ""){
		    			$img_name='shop_logo';
		    			$img_path='vendor_businesssiness';
		    			$old_img='';
			    		$vendor_logo=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_logo=$this->input->post('old_bis_logo');;
		            }
			$where = array(
				'vendor_id' => $vid
			);

		/*	$data = array(
				'vaccount_hname' => $_POST['b_holder_name'],
				'vaccount_num' => $_POST['acc_num'],
				'vbank_name' => $_POST['bank_name'],
				'vgst' => $_POST['bis_gst'],
				'vifsc_code' => $_POST['ifsc_code']
			);	*/

			$data1 = array(
				'bis_vendor_id' => $vid,
				'bis_name' => $_POST['shop_name'],
				//'bis_vtype' => $_POST['buss_type'],
				'bis_email' => $_POST['email'],
				'bis_mnumber' => $_POST['mobile'],
				'bis_manumber' => $_POST['alt_mobile'],
				'bis_address' => $_POST['address'],
				'bis_category' => $_POST['category'],
				'bis_sub_category' => $_POST['sub_category'],
				'bis_gst' => $_POST['bis_gst'],
				//'bis_type' => $_POST['type'],
				//'bis_sub_type' => $_POST['sub_type'],
				'bis_type' => "test",
				'bis_sub_type' => "test",
				'bis_brand' => $_POST['brand'],
				'bis_established_date' => $_POST['edate'],
				'bis_op_time' => $_POST['op_time'],
				'bis_cls_time' => $_POST['cl_time'],
				'bis_package' => $_POST['package'],
				'bis_pic' =>  $vendor_image,
				'bis_logo' =>  $vendor_logo,
				'bis_description' => $_POST['description'],
				'bis_cont_person' => $_POST['cont_person'],
				'bis_pincode' => $_POST['pincode'],
				'bis_country' => $_POST['country'],
				'bis_state' => $_POST['state'],
				'bis_city' => $_POST['city'],
				'bis_shop_imgs' => $fileName
			);
				
			$this->Mvendor_model->records_update('tbl_vendor', $data, $where);
			$this->Mvendor_model->records_update('tbl_vbusiness_details', $data1);
			$this->session->set_flashdata('success','Update Business Successfully Created.');
			redirect('Mvendor/index');
		}
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$vendor = $_SESSION['userid'];
		$data['title']='Business Details';
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		$data['category'] = $this->Mvendor_model->record_list('tbl_category');
		$data['subcategory'] = $this->Mvendor_model->record_list('tbl_sub_category');
		$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');
		$data['package'] = $this->Mvendor_model->get_package_list('tbl_package');
		$data['type'] = $this->Mvendor_model->record_list('tbl_type');
		$data['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

		$data1['vendor'] = $vendor;
		$data1['action'] = 'update'; 	
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left', $data);
		$this->load->view('vendor/business', $data1);
		$this->load->view('vendor/master/footer');
	}

	public function venoders_profile()
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['title']='Vendor Profile'; 
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left', $data);
		$this->load->view('vendor/vendor_details',$data);
		$this->load->view('vendor/master/footer');
	}
	public function check_Vendor_Inquery()
	{
		$vid = $this->input->post('id');
		$this->db->select('*');
	    $this->db->from('tbl_inquiry tin');
	    $this->db->join('tbl_vendors_cat_subcat tvcs','tvcs.vend_id=tin.inq_vbus_id');
	    $this->db->join('tbl_category tcat','tcat.category_id = tvcs.cat_id');
	    $this->db->join('tbl_sub_category tsubcat','tsubcat.sub_category_id = tvcs.subcat_id');
	    $this->db->where('inq_vbus_id', $vid);
	    $test = $this->db->get()->result();

	    if(empty($test)) 
	    {
	    	echo '1';
	    }else
	    {
	    	echo '0';
	    }
	    
	}
	public function checkCagegoryInTable()
	{

		
		$t1 = $this->input->post('id'); // category id


		$subcategory_id = $this->input->post('Cid'); // subcateogry id
		$this->db->select('category_id');
	    $this->db->from('tbl_category_subcategory');
	    $this->db->where_in('subcategory_id', $subcategory_id);
	    $t2= $this->db->get()->result();
	  
	    foreach ($t2 as $key) {
	    	$category_id[]= $key->category_id;
	    }
	    
	    		$d = array_diff($t1, $category_id);
	    		$this->db->select('category_title');
			    $this->db->from('tbl_category');
			    $this->db->where_in('category_id', $d);
			    $cat= $this->db->get()->result();
			    if (!empty($cat)) {
			    	 $output = '';
				    foreach($cat as $row){
						$output.= '<span><b>'.$row->category_title.'</b></span>, ';
					}
				    echo $output;
			    }
			   
	}
	public function change_password()
	{
			
	if(isset($_POST['btn_submit'])) {

			$where= array(
				'vendor_id' => $_POST['vid']
			);

			$data= array(
				'v_password' => $_POST['newpass']
			);
		
			$this->Mvendor_model->records_update('tbl_vendor', $data, $where );

			$this->session->set_flashdata('event_success','Vendor Password Change Successfully');
			redirect('Mvendor/venoders_profile');
		}
	}

	public function update_business_details()
	{
	
		 $vid = $_SESSION['userid'];
		 
		if(isset($_POST['update'])) // Update Business Details
		{	
			
      		$str =  $_POST['shop_name'];
			$slug = str_replace(' ','-',$str);
      		
			if($_FILES['shop_pic']['name']!= ""){
		    			$img_name='shop_pic';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_image=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_image=$this->input->post('old_prof_pic');;
		            } 
		    if($_FILES['shop_logo']['name']!= ""){
		    			$img_name='shop_logo';
		    			$img_path='vbusiness';
		    			$old_img='';
			    		$vendor_logo=$this->Mvendor_model->upload_image($img_name,$img_path,$old_img);
		            }else{
		            	$vendor_logo=$this->input->post('old_bis_logo');;
		            }
				$where = array(
					'vendor_id' => $vid
				);


			if ($_FILES['shop_imgs']['size'] == 0 && $_FILES['shop_imgs']['error'] == 0)
			{
		        
		            $filesCount = count($_FILES['shop_imgs']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['shop_imgs']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['shop_imgs']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['shop_imgs']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['shop_imgs']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['shop_imgs']['size'][$i];
		                
		                // File upload configuration
		                $img_path='vbusiness';
		                $uploadPath = './assets/uploads/'.$img_path;
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();

		                    //print_r( $fileData);
		                   
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                 //$images[] = $_FILES['file']['name'];
		                $images[] = $fileData['file_name'];
		               //  print_r( $images);
		                  
		            }
				        $fileName = implode(',',$images);
				     
				 }
				 else
				 {
				 	$fileName= $_POST['shopimgs'];
				 }
			
		$where1 = array(
				'bis_vendor_id' => $vid
			);
			
			$data1 = array(
				//'bis_vendor_id' => $_POST['v_id'],
				'bis_name' => $_POST['shop_name'],
				'bis_slug' => $slug,
				//'bis_vtype' => $_POST['buss_type'],
				'bis_email' => $_POST['email'],
				'bis_mnumber' => $_POST['mobile'],
				'bis_manumber' => $_POST['alt_mobile'],
				'bis_address' => $_POST['address'],
				'bis_aaddress' => $_POST['aaddress'],	
				//'bis_category' => $_POST['category'],
				'bis_category' => 'test',
				'bis_sub_category' => 'test',
				'bis_gst' => $_POST['bis_gst'],
				'bis_brand' => 'test',
				'bis_established_date' => $_POST['edate'],
				'bis_op_time' => $_POST['op_time'],
				'bis_cls_time' => $_POST['cl_time'],
				/*'bis_package' => $_POST['package'],*/
				'bis_pic' =>  $vendor_image,
				'bis_logo' =>  $vendor_logo,
				'bis_shop_imgs' => $fileName,
				'bis_description' => $_POST['description'],
				'bis_cont_person' => $_POST['cont_person'],
				'bis_pincode' => $_POST['pincode'],
				'bis_country' => $_POST['country'],
				'bis_state' => $_POST['state'],
				'bis_city' => $_POST['city']
			);

				
			
			$this->Mvendor_model->records_update('tbl_vbusiness_details', $data1,$where1);
			$this->session->set_flashdata('success','Update Business Successfully Created.');
			redirect('Mvendor/index');
		}
			$data['ip']  = $_SERVER['REMOTE_ADDR'];
			$vendor = $_SESSION['userid'];
			$data['title']='Business Details';
			$data['country'] = $this->Mvendor_model->record_list('tbl_country');
			$data['states'] = $this->Mvendor_model->record_list('tbl_states');
			$data['city'] = $this->Mvendor_model->record_list('tbl_city');
			$data['category'] = $this->Mvendor_model->record_list('tbl_category');
			$data['subcategory'] = $this->Mvendor_model->record_list('tbl_sub_category');
			$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');
			$data['package'] = $this->Mvendor_model->get_package_list('tbl_package');
			$data['type'] = $this->Mvendor_model->record_list('tbl_type');
			$data['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
			$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
			$data['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

			$data1['vendor'] = $vendor;
			$data1['action'] = 'update'; 	
			$this->load->view('vendor/master/header');
			$this->load->view('vendor/master/left', $data);
			$this->load->view('vendor/update-business-details', $data);
			$this->load->view('vendor/master/footer');
	}



public function update_business_category()							//updated 28,29 Dec 2018
	{
		if(isset($_POST['update'])) // Update Business Details
		{

				// INACTIVE All Account 
			/*print_r($_POST);
			die();*/
	   			$vid = $_POST['v_id'];
				$arrayName = array('ven_stauts' => 'INACTIVE', );
				$this->db->where('vend_id', $vid);
 				$this->db->update('tbl_vendors_cat_subcat', $arrayName);

 
 				$subcat=$this->input->post('sid');
 			
					foreach ($subcat as $subcat_id) {
						$sub_values=explode(',', $subcat_id);
						print_r($sub_values);
						$this->db->select('ven_cat_subcat_id');
						$this->db->from('tbl_vendors_cat_subcat');
						$this->db->where('vend_id',$vid);
						$this->db->where('cat_id', $sub_values[0]);
						$this->db->where('subcat_id', $sub_values[1]);
						$result =  $this->db->get();
						
							
					if ($result->num_rows() > 0) {
							$id=$result->row()->ven_cat_subcat_id;

							$data1 = array(								
								'ven_stauts' =>'ACTIVE'	
							);
							$this->db->where('ven_cat_subcat_id', $id);
 							$this->db->update('tbl_vendors_cat_subcat', $data1);

					}
					else{
						
							$data3 = array(
								'vend_id' => $vid,
								'cat_id' => $sub_values[0],
								'subcat_id' => $sub_values[1], 
							);
							$this->Mvendor_model->record_insert('tbl_vendors_cat_subcat', $data3);

					}
				}
			
							
			$this->session->set_flashdata('success','Update Business Successfully Created.');
			redirect('Mvendor/index');
		}
		$uid = $_SESSION['userid'];
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		$data['category'] = $this->Mvendor_model->record_list('tbl_category');
		$data['vbrand'] = $this->Vendor_model->get_vbrand($uid);
		$data['package'] = $this->Mvendor_model->get_package_list('tbl_package');
		$data['type'] = $this->Mvendor_model->record_list('tbl_type');
		$data['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		
		$data['catsubcat'] = $this->Mvendor_model->get_catSubcat($vendor);	

		//$data1= $this->Mvendor_model->get_AllCatSubcat();
		$data1= $this->Mvendor_model->get_AllCatSubcat_new($vendor);
		
		$out_array=array();
		foreach ($data1 as $value) {
			$out_array[$value->category_id] = array();			
		}
		foreach ($data1 as $value) {
			
			array_push($out_array[$value->category_id],array("category_title"=>$value->category_title,"sub_category_title"=>$value->sub_category_title,"sub_category_id"=>$value->sub_category_id,"sel"=>$value->sel));
		}
		
		$data['allcatsubc']=array();
		$data['allcatsubc']=$out_array;
		
		$res = $this->Mvendor_model->get_catSubcat($vendor);
		
		foreach ($res as $key ) {
			$cat_id = $key->category_id;
			$data['all_subCat']=$this->Mvendor_model->get_subcat($cat_id);	
		}

		foreach ($res as $key) {
			$subcat_id[]= $key->subcat_id;
			$data['all_brand']=$this->Mvendor_model->get_brands($subcat_id);
		}
	
		$data['brand'] = $this->Mvendor_model->get_catSubcat($vendor);
		$data['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

		
		$result = $this->Madmin_model->get_rights($uid);
		$data['title']='Business Details';
		$data['vendor'] = $vendor;
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/update_business_category',$data);	
		$this->load->view('vendor/master/footer');

	}
}
