<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reviews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Media_model');
		$this->load->model('Category_model');
		$this->load->model('User_model');
		$this->load->model('Madmin_model');
	}
	
	public function index()
	{
		$title['title']='Review';
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['article'] = $this->Media_model->get_articles();
		$title['profile'] = $this->User_model->get_AdminProfile($uid);
 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
}
