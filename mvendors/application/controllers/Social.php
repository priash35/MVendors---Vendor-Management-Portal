<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Madmin_model');
		$this->load->model('Category_model');
		$this->load->model('Media_model');
		$this->load->model('User_model');
		$this->load->model('Inquiry_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('csvimport');
        $this->load->model('Social_model');

        if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'Login');
		}
       
	}

	public function index()
	{
		$uid = $_SESSION['userid'];
		$title['title']='Order Booking';
		$title['profile'] = $this->User_model->get_AdminProfile($uid);
		$data['social'] = $this->Social_model->getSocialData(); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/social/social_link_list',$data);	
		$this->load->view('admin/master/footer');
	}

     public function makeSocialInactive()
    {
       	$where= array(
		        'social_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'social_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_social',$data,$where);
		
		redirect(base_url().'Social/index');	
    }
    
    public function makeSociaActive()
    {
        $where=array(
				'social_id'=>$this->uri->segment(3)
			);
			$data=array(            		
			'social_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_social',$data,$where);
		redirect(base_url().'Social/index');
    }
    public function EditSocial()
    {
        if(isset($_POST['btn_update'])){
         $where=array(
				'social_id'=>$this->input->post('social_id')
			);
		$data = array(
		     'social_link'=>$this->input->post('social_link')
		    );
		 
		$this->Category_model->records_update('tbl_social',$data,$where);
		redirect(base_url().'Social/index');
        }
         $social_id=array(
				'social_id'=>$this->uri->segment(3)
			);
		$data['social']=$this->Category_model->record_list('tbl_social',$social_id);
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		//$data['category']=$details=$this->Category_model->record_list('tbl_category',$where);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']= 'Products / Update Category';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/social/update_social_link_list',$data);	
		$this->load->view('admin/master/footer');
    }
    
}
