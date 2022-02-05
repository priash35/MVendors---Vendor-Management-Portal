<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Media_model');
		$this->load->model('Category_model');
		$this->load->model('User_model');
		$this->load->model('Madmin_model');
		$this->load->model('Log_model');
	}
	
	public function index()
	{
		$title['title']='Review';
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['article'] = $this->Media_model->get_articles();
		$title['profile'] = $this->User_model->get_AdminProfile($uid);
		$data['log'] = $this->Log_model->getLogDetails();
		/*print_r($data);
		die();*/
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/log/log_list',$data);	
		$this->load->view('admin/master/footer');
	}

	//public function add_log($data,$key,$key_value,$table,$user_id)
	public function add_log($data,$table,$user_id)
	{		

		print_r($data);
		die();
		$this->load->model("Log_model");		
		/*$key = 'id';
		$cus_id = 1;
		$data=array("first_name"=>"Chetan", "middle_name"=>"Chetan", "last_name"=>"ABCD");
		$table = 'Customers';*/
		$diff = array();
		$diff = $this->Log_model->get_update_fields($key,$key_value,$data,$table);
		//$diff = $this->Log_model->get_update_fields($key,$key_value,$data,$table);
		
		$this->Log_model->insert_audit_record($user_id,$table,$diff,$key,$key_value);
		//$this->Log_model->insert_audit_record($user_id,$table,$diff,$key,$key_value);
	}
}
