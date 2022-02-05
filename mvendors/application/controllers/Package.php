<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Media_model');
		$this->load->model('Madmin_model');
		$this->load->model('Package_model');
		$this->load->model('User_model');
		$this->load->model('Category_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'Login');
		}
	}
	
	public function index()
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['profile'] = $this->User_model->get_AdminProfile($vendor); 
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		//$result = $this->Madmin_model->get_rights($vendor);
		//$data['right'] = $result->arights;
		//$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);
		$data['package'] = $this->Package_model->get_Package();
		$data['title']='Package';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/package_details',$data);	
		$this->load->view('vendor/master/footer');
	}

	public function Package_list()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$data['package'] = $this->Package_model->get_allPages();
		$title['title']='Packages / Package List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/package/package_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function PackageActive()
	{
		$where= array(
		        'package_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'package_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_package',$data,$where);
		
		redirect(base_url().'Package/Package_list');	
	}

	public function PackageInactive()
	{
		$where= array(
		    'package_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'package_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_package',$data,$where);
		
		redirect(base_url().'Package/Package_list');	
	}
	public function add_package()
	{
		if(isset($_POST['add_package']))
		{	
			$data=array( 
				'package_name'=>$this->input->post('package_name'),
				'package_category'=>$this->input->post('package_category'),
				'package_video'=>$this->input->post('package_video'),
				'package_images'=>$this->input->post('package_images'),
				'package_keywords'=>$this->input->post('package_keywords'),
				'package_duration'=>$this->input->post('package_duration'),
				'package_price'=>$this->input->post('package_price'),
				'package_status' => 'ACTIVE'			
				);

			
			$details=$this->Category_model->record_insert('tbl_package',$data);
			$this->session->set_flashdata('event_success','Package Successfully Added.');
			redirect(base_url().'Package/Package_list');
		}
		
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']= 'Package / Add Package';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/package/add_package');	
		$this->load->view('admin/master/footer');
	}
}
