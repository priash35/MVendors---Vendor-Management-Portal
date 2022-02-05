<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reports extends CI_Controller {

	
	public function index()
	{
		$title['title']='Order Booking';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}

	public function order_history()
	{
		$title['title']='Order History';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
}
