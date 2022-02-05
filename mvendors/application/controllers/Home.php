<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Media_model');
		$this->load->model('Madmin_model');
		$this->load->model('Package_model');
		$this->load->model('Category_model');
		$this->load->model('Advertise_model');
		$this->load->model('User_model');
		$this->load->helper('string');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
	}
	public function index()
	{
		$data['menu'] = $this->Category_model->get_menu();
		$title['title']='Contact';
		$this->load->view('users/master/header',$data);
		$this->load->view('users/master/left',$title);
		$this->load->view('users/pages/contact');	
		$this->load->view('users/master/footer');
	}
	public function About()
	{
		$data['menu'] = $this->Category_model->get_menu();
		$title['title']='About';
		$this->load->view('users/master/header',$data);
		$this->load->view('users/master/left',$title);
		$this->load->view('users/pages/about');	
		$this->load->view('users/master/footer');
	}
	public function Article()
	{
		$data['menu'] = $this->Category_model->get_menu();
		$title['title']='Article';
		$this->load->view('users/master/header',$data);
		$this->load->view('users/master/left',$title);
		$this->load->view('users/pages/article');	
		$this->load->view('users/master/footer');
	}

}
