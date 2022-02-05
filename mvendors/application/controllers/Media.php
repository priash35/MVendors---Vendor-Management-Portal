<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
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
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Media / Video List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/video_list',$data);	
		$this->load->view('admin/master/footer');
	}

	public function compair_list()
	{
		//$data['videos'] = $this->Media_model->get_vendors();

		$title['title']='Media / Compare List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/compair_list');	
		$this->load->view('admin/master/footer');
	}
	public function article_list()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['article'] = $this->Media_model->get_articles();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['title']='Media / Article List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/article_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_article()
	{
		$where=array(
				'blog_id'=>$this->uri->segment(3)
			);
		
		$article=$this->Category_model->record_list('tbl_blog',$where);
		if(!$article)
		{
		 	$this->session->set_flashdata('event_failed','Article not Found...');
        	redirect(base_url().'Media/article_list');
		}
			
        $delete_id=$this->Category_model->records_delete('tbl_blog',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Article Deleted Successfully...');
        	redirect(base_url().'Media/article_list');
    	}  
	}
	public function add_article()
	{
		if(isset($_POST['add_article']))
		{	
			if($_FILES['blog_image']['name']!= ""){
    			$img_name='blog_image';
    			$img_path='category';
    			$old_img='';
	    		$blog_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
	    		
            }else{
            	$blog_image="";
            } 

			$data=array( 
				'blog_title'=>$this->input->post('blog_title'),
    			'blog_image'=>$blog_image,
    			'blog_content'=>$this->input->post('blog_content')
				);
			$details=$this->Category_model->record_insert('tbl_blog',$data);
			$this->session->set_flashdata('event_success','Article Successfully Added.');
			redirect(base_url().'Media/article_list');
		}
		$uid = $_SESSION['userid'];
			$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']= 'Media / Add Article';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/add_article');	
		$this->load->view('admin/master/footer');
	}
	public function update_article()
	{
		if(isset($_POST['update_article']))
		{	
			if($_FILES['blog_image']['name']!= ""){
    			$img_name='blog_image';
    			$img_path='category';
    			$old_img='';
	    		$blog_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
            }else{
            	$blog_image="";
            } 

			$where1= array(
		        'blog_id'=>$this->input->post('blog_id')
				);
			$data=array(
    			'blog_title'=>$this->input->post('blog_title'),
    			'blog_image'=>$blog_image,
    			'blog_content'=>$this->input->post('blog_content')
    			);

			$details=$this->Category_model->records_update('tbl_blog',$data,$where1);
			$this->session->set_flashdata('event_success','Article Successfully Update.');
			redirect(base_url().'Media/article_list');	
		}
		$where=array(         			
		'blog_id'=>$this->uri->segment('3')
		  );
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
			$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['article']=$details=$this->Category_model->record_list('tbl_blog',$where);
		$title['title']= 'Media / Update Article';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/update_article',$data);	
		$this->load->view('admin/master/footer');
	}
	public function delete_video()
	{
		$where=array(
				'video_id'=>$this->uri->segment(3)
			);
		
		$video=$this->Category_model->record_list('tbl_video',$where);
		if(!$video)
		{
		 	$this->session->set_flashdata('event_failed','Video not Found...');
        	redirect(base_url().'Media/index');
		}
			
        $delete_id=$this->Category_model->records_delete('tbl_video',$where);        
       
        if($delete_id){
        	
        	$this->session->set_flashdata('event_success','Video Deleted Successfully...');
        	redirect(base_url().'Media/index');
    	}  
	}

	public function update_video()
	{
		if(isset($_POST['update_video']))
		{	
			
			$where1= array(
		        'video_id'=>$this->input->post('video_id')
				);
			$data=array(
    			'video_name'=>$this->input->post('video_title'),
    			'video_link'=>$this->input->post('video_url')
    			);

			$details=$this->Category_model->records_update('tbl_video',$data,$where1);
			$this->session->set_flashdata('event_success','Video Successfully Update.');
			redirect(base_url().'Media/index');	
		}
		$where=array(         			
		'video_id'=>$this->uri->segment('3')
		  );
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos']=$details=$this->Category_model->record_list('tbl_video',$where);
		$title['title']= 'Media / Update Video';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/update_video',$data);	
		$this->load->view('admin/master/footer');
	}
	public function add_video()
	{
		if(isset($_POST['add_video']))
		{	
			$data=array( 
				'video_name'=>$this->input->post('video_title'),
				'video_link'=>$this->input->post('video_url')
				);

			
			$details=$this->Category_model->record_insert('tbl_video',$data);
			$this->session->set_flashdata('event_success','Video Successfully Added.');
			redirect(base_url().'Media/index');
		}
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']= 'Media / Add Video';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/Media/add_video');	
		$this->load->view('admin/master/footer');
	}
	public function makeBloginactive()
	{
		//$aid = $this->uri->segment(3);
		
		$where= array(
		        'blog_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'blog_status' => '0'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_blog',$data,$where);
		$this->session->set_flashdata('event_success','Article ACTIVE Successfully.');
		redirect(base_url().'Media/article_list');	
	}
	public function makeBlogiInactive()
	{		
		$where= array(
		        'blog_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'blog_status' => '1'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_blog',$data,$where);
		$this->session->set_flashdata('event_success','Article INACTIVE Successfully.');
		redirect(base_url().'Media/article_list');	
	}
	public function makevideoInactive()
	{		
		$where= array(
		        'video_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'video_stauts' => '0'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_video',$data,$where);
		$this->session->set_flashdata('event_success','Video INACTIVE Successfully.');
		redirect(base_url().'Media/index');	
	}
	public function makevideoiInactive()
	{		
		$where= array(
		        'video_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'video_stauts' => '1'								
		);

		$insert_id=$this->Madmin_model->getInactive('tbl_video',$data,$where);
		$this->session->set_flashdata('event_success','Video ACTIVE Added.');
		redirect(base_url().'Media/index');	
	}
	
}
