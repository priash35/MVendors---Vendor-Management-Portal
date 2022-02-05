<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {

	
	public function index()
	{
		$title['title']='Products';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
}
