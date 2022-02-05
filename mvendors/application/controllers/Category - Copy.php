<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('upload');

	}

	public function index()
	{
		 $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        $this->load->view('formsuccess');
						$this->load->view('admin/master/header');
						$this->load->view('admin/master/left');
						//$this->load->view('admin/index');	
						$this->load->view('admin/subadmin/add_subadmin');	
						$this->load->view('admin/master/footer');
                }
		

	}
	public function SubAdmin()
	{
	
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('myform');
                }
                else
                {
                        $this->load->view('formsuccess');
                }
	}
	public function Blog()
	{
		if(isset($_POST['btnsubmit'])) {
	      	  $t = $_POST['id'];
	          $FName = $_POST['t'];
	       echo $FName;
	       echo $t;
  		  }
	}
}
