<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
	public function index()
	{
		$title['title']='Size';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/vendor/vendors_list');	
		$this->load->view('admin/master/footer');
		
	}
}
