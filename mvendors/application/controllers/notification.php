<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notification extends CI_Controller {
	public function index()
	{
		$title['title']='Size';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/subcategory/subtype_list');	
		$this->load->view('admin/master/footer');
	}

	public function products_history()
	{
		$title['title']='Vendors Products History';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/subcategory/subtype_list');	
		$this->load->view('admin/master/footer');
	}
	public function admin_products_history()
	{
		$title['title']='Admin Products History';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/subcategory/subtype_list');	
		$this->load->view('admin/master/footer');
	}
	public function order_history()
	{
		$title['title']='Order History';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/subcategory/subtype_list');	
		$this->load->view('admin/master/footer');
	}
}
