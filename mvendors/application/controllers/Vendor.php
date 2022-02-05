<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Vendor_model');
		$this->load->model('Category_model');
		$this->load->model('Madmin_model');
		$this->load->model('Mvendor_model');
		$this->load->model('Advertise_model');
		$this->load->model('User_model');
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
		$data['vendors'] = $this->Vendor_model->get_vendors();
		$data['title']='Vendors';

		/*print_r($data15);
		die();*/
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/vendors/vendors_list',$data);	
		$this->load->view('admin/master/footer');
	}

	public function delete_vendor()
	{

		$where=array(
				'vendor_id'=>$this->uri->segment(3)
			);
		
		$vendor=$this->Category_model->record_list('tbl_vendor',$where);
		if(!$vendor)
		{
		 	$this->session->set_flashdata('event_failed','Vendor not Found...');
        	redirect(base_url().'Vendor/index');
		}
			
        $delete_id=$this->Category_model->records_delete('tbl_vendor',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Vendor Deleted Successfully...');
        	redirect(base_url().'Vendor/index');
    	}  
	}
	
	Public function Business_Details()
	{
		$uid = $_SESSION['userid'];
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		$data['category'] = $this->Mvendor_model->record_list('tbl_category');
		//$data['vcategory'] = $this->Vendor_model->get_vcategory($uid);
		//$data['subcategory'] = $this->Mvendor_model->record_list('tbl_sub_category');
		//$data['vsubcategory'] = $this->Vendor_model->get_vsubcategory($uid);
		//$data['brand'] = $this->Mvendor_model->record_list('tbl_brand');

		$data['vbrand'] = $this->Vendor_model->get_vbrand($uid);
		$data['package'] = $this->Mvendor_model->get_package_list('tbl_package');
		$data['type'] = $this->Mvendor_model->record_list('tbl_type');
		$data['subtype'] = $this->Mvendor_model->record_list('tbl_subtype');
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['salcat'] = $this->Mvendor_model->get_salcat($vendor);
		$data['catsubcat'] = $this->Mvendor_model->get_catSubcat($vendor);
			
		//print_r($data1);
		$res = $this->Mvendor_model->get_catSubcat($vendor);
		
		foreach ($res as $key ) {
			$cat_id = $key->category_id;
			$data11['all_subCat']=$this->Mvendor_model->get_subcat($cat_id);

			//print_r($data1);
			//print_r($data11);
			
		}
		//die();
		foreach ($res as $key) {
			$subcat_id[]= $key->subcat_id;
			$data['all_brand']=$this->Mvendor_model->get_brands($subcat_id);
		}

		
	
		//die();

		//echo ($cat_subcat['category_id']);
		//print_r($data11);
		//die();
		$data['brand'] = $this->Mvendor_model->get_catSubcat($vendor);
		$data['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);

		
		$result = $this->Madmin_model->get_rights($uid);
		//$title['right'] = $result->arights;
		//$data['vendors'] = $this->Vendor_model->get_vendors();
		$data['title']='Business Details';
		$data['vendor'] = $vendor;
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/business',$data);	
		$this->load->view('vendor/master/footer');
	}
	public function makeVenInactive()
	{
		$where= array(
		   'vendor_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'vstatus' => 'INACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_vendor',$data,$where);
		$this->session->set_flashdata('event_success','Vendor INACTIVE Successfully...');
		redirect(base_url().'Vendor/index');	
	}
	public function makeVenActive()
	{
		$where= array(
		   'vendor_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'vstatus' => 'ACTIVE'								
		);

		$insert_id=$this->Advertise_model->getActiveInactive('tbl_vendor',$data,$where);
		$this->session->set_flashdata('event_success','Vendor ACTIVE Successfully...');
		redirect(base_url().'Vendor/index');	
	}

	public function getAllVendoerDetails()
	{
		$id = $this->input->post('id');
		$title= $this->Vendor_model->getAll_Vendoer_Details($id); 
		echo json_encode($title);
	
	}

	public function getAllUserDetials()
	{
		$id = $this->input->post('id');
		$title= $this->Vendor_model->getAll_UserDetials($id); 
		echo json_encode($title);
	}
	public function addVnote() // Change 9 Jan 18 Ganesh
	{
		if(isset($_POST['btn_vnote'])) {
			
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$vid = $this->input->post('vid');
			$vmsg = $this->input->post('v_msg');
			
			$data=array(	
				'vvan_id' =>$vid,
				'vnote' =>$vmsg, 
				'v_cdate' => $now
			);		
			$details=$this->Category_model->record_insert('tbl_vendor_note',$data);
	        $this->session->set_flashdata('event_success','Note Added Successfully.');
	        redirect(base_url().'vendor');
		}
	}

	public function updateVnote() // Change 9 Jan 18 Ganesh
	{
		if(isset($_POST['btn_up'])) {
			
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$vid = $this->input->post('uid');
			$vmsg = $this->input->post('v_msg');
			
			$where = array(
				'vvan_id' =>$vid
			);
			$data=array(
				'vnote' =>$vmsg, 
				'v_udate' => $now
			);	
		
			$details=$this->Category_model->records_update('tbl_vendor_note',$data, $where);
	          $this->session->set_flashdata('event_success','Note Update Successfully.');
	         redirect(base_url().'vendor');
		}
	}
	public function getVnoteData()
	{
		$vid = $this->input->post('id');
		if ($vid != '') {
			$data['remark'] = $this->Vendor_model->get_Vnote_Data($vid);
			echo json_encode($data);

		}else{
			
		}
	}
	
	
	public function getAllVendoerData()
	{
		$where = $this->uri->segment(3);
		$data['actinq'] = $this->Vendor_model->get_Act_Inq($where);
		$data['acceinq'] = $this->Vendor_model->get_Acce_Inq($where);
		$data['confinq'] = $this->Vendor_model->get_Conf_Inq($where);
		$data['competeinq'] = $this->Vendor_model->get_Compete_Inq($where);
		$data['veninfo'] = $this->Vendor_model->get_Ven_Inq($where);
		$data['venbuss'] = $this->Vendor_model->get_Buss_Inq($where);
		/*print_r($data1);
		die();*/
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$data['vendors'] = $this->Vendor_model->get_vendors();
		$data['title']='Vendors Data';
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/vendors/all_vendors_data',$data);	
		$this->load->view('admin/master/footer');
	}

	public function updateVinfo()
	{
		if (isset($_POST['btn_update'])) {
			
				$str =  $_POST['bis_name'];
				$slug = str_replace(' ','-',$str);
				$where = array(
				'bis_det_id' => $_POST['v_id']
				);
				$data = array(
					'bis_name' => $_POST['bis_name'],
					'bis_slug' => $slug,
					'bis_email' => $_POST['bis_email'], 
					'bis_pincode' => $_POST['bis_pincode'], 
					'bis_gst' => $_POST['bis_gst'], 
					'bis_address' => $_POST['bis_address'], 
					'bis_aaddress' => $_POST['bis_aaddress'], 
					'bis_mnumber' => $_POST['bis_mnumber'], 
					'bis_manumber' => $_POST['bis_manumber'], 
					'bis_city' => $_POST['bus_city'], 
					'bis_country' => $_POST['bus_coun'], 
					'bis_state' => $_POST['bus_state'],  
					'bis_established_date' => $_POST['bis_edate'], 
					'bis_description' => $_POST['bis_desc'], 
				);

				$this->Mvendor_model->records_update('tbl_vbusiness_details', $data,$where);
				$this->session->set_flashdata('event_success','Vendor Business Details Update Successfully.');
				redirect('vendor');
		}
	}

	public function vendorInfo()
	{
		if (isset($_POST['btn_update'])) {
			
			$where = array(
				'vendor_id' => $_POST['vid']
				);
			$data = array(
					'vfname' => $_POST['vfname'],
					'vlname' => $_POST['vlname'], 
					'vemail' => $_POST['vemail'], 
					'vmobile' => $_POST['vmobile'], 
					'vanumber' => $_POST['vanumber'], 
					'vaddress' => $_POST['vaddress'], 
					'vbaddress' => $_POST['vbaddress'], 
				);

				$this->Mvendor_model->records_update('tbl_vendor', $data,$where);
				$this->session->set_flashdata('event_success','Vendor Details Update Successfully.');
				redirect('vendor');
		}
	}

	public function UpdateUserInfo()
	{
		if (isset($_POST['btn_update'])) {
			
			$where = array(
				'user_id' => $_POST['uid']
				);
			$data = array(
					'ufname' => $_POST['ufname'],
					'ulname' => $_POST['ulname'], 
					'uemail' => $_POST['uemail'], 
					'umobile' => $_POST['umobile'], 
					'uanumber' => $_POST['uanumber'], 
					'uaddress' => $_POST['uaddress'], 
					'ubaddress' => $_POST['ubaddress'], 
				);

				$this->Mvendor_model->records_update('tbl_user', $data,$where);
				$this->session->set_flashdata('event_success','Vendor Details Update Successfully.');
				redirect('madmin/endusers');
		}
	}
	
	 public function getVEmail() // New Changes 23 Jan 2018
	{
		$id = $this->input->post('id');
		if ($id != '') {
			$data['email'] = $this->Vendor_model->get_VEmail($id);
			echo json_encode($data);
			
		}else{
			
		}
	}
	public function sendEmail() // New Changes 23 Jan 2018
	{
		$email = $this->input->post('email');
		$text = $this->input->post('enmsg');
		$mob = $this->input->post('email');

		$data = array(
			'name'=> $this->input->post('name'),
			'email' => $this->input->post('email'),
			'sub' => $this->input->post('sub'),
			'enmsg' => $this->input->post('enmsg')
		);

		$this->send_email($email,$text);
		$url = "http://www.sms123.in/QuickSend.aspx?";
		$this->User_model->send_message($url,$mob,$text);
		$this->session->set_flashdata('event_success','Email Send Successfully.');
		redirect(base_url().'Inquiry/vendor_accpted_enquirylist');
		
	}
	public function send_email($email,$text) // New Changes 23 Jan 2018
	{											
		$this->load->library('email');
				
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not 
		$this->email->initialize($config);
		
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	
		//$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n"."Content-Transfer-Encoding: 7bit\n\n" . $row->message. "\n\n";
		$this->email->from('punegravity@gmail.com','punegravity');
		$this->email->to($email); 
		$this->email->subject('MVENDORS Response');
		$this->email->message($text);
		$this->email->send();
		
		

		 return 1;
	}
}
