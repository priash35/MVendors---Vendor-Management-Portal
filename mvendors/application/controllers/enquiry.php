<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enquiry extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Package_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}
	
	public function index()
	{
		$vendor = $_SESSION['userid'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		//$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);
		$data['package'] = $this->Package_model->get_Package();
		//$data['ip']= $hostname;
		$data['title']= 'Enquiry';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/index');	
		$this->load->view('vendor/master/footer');
	}
	public function user_enquiry()
	{
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/user_enquirylist');	
		$this->load->view('admin/master/footer');
	}
	public function purchaseorder()
	{
		$title['title']='Purchase Order';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function askme()
	{
		$title['title']='Ask Me';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function contact()
	{
		$title['title']='Contact';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function refer_enquiry()
	{
		$title['title']='Refer Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');

	}
}
