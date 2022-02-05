<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Madmin_model');
		$this->load->model('Media_model');
		$this->load->model('User_model');
		$this->load->model('Inquiry_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('csvimport');

        if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'Login');
		}
       
	}

	public function index()
	{
		$uid = $_SESSION['userid'];
		$title['title']='Order Booking';
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}

	public function order_history()
	{
		$uid = $_SESSION['userid'];
		$title['title']='Order History';
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}

	public function user_enquiry()
	{
		$uid = $_SESSION['userid'];
		$data['title']='User Equiry';
		$data['uinquiry'] = $this->Inquiry_model->get_InquiryDetails($uid);
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/enquiry/user_enquirylist',$data);	
		$this->load->view('admin/master/footer');
	}
}
