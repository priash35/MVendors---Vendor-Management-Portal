<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Media_model');
		$this->load->model('Madmin_model');
		$this->load->model('Configuration_model');
		$this->load->model('Advertise_model');
		$this->load->model('User_model');
		$this->load->model('Category_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
	}
	
	public function index()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$data['result'] = $this->Configuration_model->get_Configdata();	
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$data['title']='Configuration';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/config/config_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function update_config()
	{
		if(isset($_POST['update_config']))
		{	
			$where1= array(
		        'config_id'=>$this->input->post('config_id')
				);
			$data=array(
    			'config_name'=>$this->input->post('config_name'),
    			'config_value'=>$this->input->post('config_value')
    			);

			$details=$this->Category_model->records_update('tbl_config',$data,$where1);
			$this->session->set_flashdata('event_success','Configuration Successfully Update.');
			redirect(base_url().'Configuration/index');	
		}
		$where=array(         			
		'config_id'=>$this->uri->segment('3')
		  );
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['config']=$this->Category_model->record_list('tbl_config',$where);
		$title['title']= 'Configuration / Update';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/config/update_config',$data);	
		$this->load->view('admin/master/footer');
	}
	
}
