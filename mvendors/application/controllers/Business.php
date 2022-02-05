<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller {
	
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


		/*$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);
		$data['package'] = $this->Package_model->get_Package();
		$data['title']='Package';
		if (isset($_POST['btnlogin']))  
		{
			
			$where= array(
				'umobile' => $this->input->post('unum'),
				'u_password' =>md5($this->input->post('upass')),
				'uis_mobile_verify' =>'1'
			);
		$details=$this->User_model->record_list('tbl_user',$where);
		$wherecondition= array(
			'u_password' => $this->input->post('unum'),
			'u_password' =>md5($this->input->post('upass')),
		);

		$details1=$this->User_model->record_list('tbl_user',$wherecondition);


			if($details!="")
			{	
			    $this->session->set_userdata('user_id',$details['0']->user_id);	
				$this->session->set_userdata('uemail',$details['0']->uemail);
				$this->session->set_userdata('umobile',$details['0']->umobile);
				$this->session->set_userdata('ufname',$details['0']->ufname);
				$this->session->set_userdata('uis_email_verify',$details['0']->uis_email_verify);
		    	$this->session->set_flashdata('success_contact','Login Successfully.');
		    	redirect(base_url().'home');

			}
			elseif($details1!="")
			{
					
			}
			else
			{
				$this->session->set_flashdata('event_success','Credentials Incorrect');
				redirect(base_url().'User');	
			}
		}*/
	//	$data['sldier'] = $this->User_model->get_Slider();
		$data['sldier'] = $this->Advertise_model->get_Slider();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left');
		$this->load->view('users/business');	
		$this->load->view('users/master/footer');
	}

	public function Package_list()
	{
		$uid = $_SESSION['userid'];
		
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['package'] = $this->Package_model->get_allPages();
		$title['title']='Packages / Package List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/package/package_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function PackageActive()
	{
		$where= array(
		        'package_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'package_status' => 'ACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_package',$data,$where);
		
		redirect(base_url().'Package/Package_list');	
	}

	public function PackageInactive()
	{
		$where= array(
		    'package_id'=>$this->uri->segment(3),
		);
    	$data=array(            		
			'package_status' => 'INACTIVE'								
		);

		$insert_id=$this->Madmin_model->getActive('tbl_package',$data,$where);
		
		redirect(base_url().'Package/Package_list');	
	}
	public function add_package()
	{
		if(isset($_POST['add_package']))
		{	
			$data=array( 
				'package_name'=>$this->input->post('package_name'),
				'package_category'=>$this->input->post('package_category'),
				'package_video'=>$this->input->post('package_video'),
				'package_images'=>$this->input->post('package_images'),
				'package_keywords'=>$this->input->post('package_keywords'),
				'package_duration'=>$this->input->post('package_duration'),
				'package_price'=>$this->input->post('package_price'),
				'package_status' => 'ACTIVE'			
				);

			
			$details=$this->Category_model->record_insert('tbl_package',$data);
			$this->session->set_flashdata('event_success','Package Successfully Added.');
			redirect(base_url().'Package/index');
		}
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']= 'Package / Add Package';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/package/add_package');	
		$this->load->view('admin/master/footer');
	}
	public function Create_user()
	{
			
		if (isset($_POST['add_user'])){ 
			
			$where=array( 
	            			'umobile'=>$this->input->post('unumber')
		        		  );
		
			$verify_email=$this->User_model->record_count('tbl_user',$where);
			$whereemail=array( 
	            			'uemail'=>$this->input->post('uemail')
		        		  );
		
			$verify_email_id=$this->User_model->record_count('tbl_user',$whereemail);
			$where1=array(  
	            			'umobile'=>$this->input->post('unumber'),
	            			 'uis_mobile_verify'=>'0'
		        		  );            
			$valid_number1=$this->User_model->record_list('tbl_user',$where1);

			
			
	
				
				if (!$verify_email || $valid_number1 || !$verify_email_id)
				{

					$ran_nub=random_string('numeric', 6);

					

					if($valid_number1)
					{	
						// echo "hi";die;
						$where2= array(
										'umobile' =>  $valid_number1['0']->umobile
								   	);
			        	$data= array( 
			        			 'ufname'=>$this->input->post('uname'),
			        			 'uemail'=>$this->input->post('uemail'),                              
		                         'uotp'=>$ran_nub
		                            );

						$this->User_model->records_update('tbl_user',$data,$where2);

						$mob=$this->input->post('unumber');
							 
				
							$msg = "Use ".$ran_nub." as OTP to verify your mobile no. This verification is important for safety of your account.";
							//echo $msg;die;
							$url = "http://www.sms123.in/QuickSend.aspx?";
							$this->User_model->send_message($url,$mob,$msg);
						
						$this->session->set_userdata('end_user_mobile_no',$valid_number1['0']->mobile_no);
						$this->session->set_userdata('end_user_id',$valid_number1['0']->user_id);
						$this->session->set_userdata('end_user_user_name',$valid_number1['0']->name);
						
						$this->session->set_flashdata('event_success','Mobile no Registered Successfully');
						redirect(base_url()."User/set_password");	
					}
					else{
					// echo "bye";die;

					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					$now = date('Y-m-d H:i:s');
					$data1= array(                               
			            			'ufname'=>$this->input->post('uname'),
			            			'umobile'=>$this->input->post('unumber'),
			            			'uemail'=>$this->input->post('uemail'),
			            			'uotp'=>$ran_nub,
			            			'uis_mobile_verify'=>'0'			            			
				        		  );
				   			
				     $this->db->set('ucreated_date', $now);    		  
			        $registered=$this->User_model->record_insert('tbl_user',$data1);
			       		
			        if($registered)
					{							
											
						$mob=$this->input->post('mobile_no');
							 
				
							$msg = "Use ".$ran_nub." as OTP to verify your mobile no. This verification is important for safety of your account.";
							//echo $msg;die;
							$url = "http://www.sms123.in/QuickSend.aspx?";
							$this->User_model->send_message($url,$mob,$msg);
						
						
						$this->session->set_userdata('umobile',$this->input->post('unumber'));
						$this->session->set_userdata('user_id',$this->db->insert_id());
						$this->session->set_userdata('end_user_user_name',$this->input->post('uname'));
						
						$this->session->set_flashdata('event_success','Mobile no Registered Successfully');
						redirect(base_url()."User/set_password");
						//redirect($this->session->userdata('goto_url'));							
					}
					}			
				}
				else 
				{
					$this->session->set_flashdata('event_success','Already Registered');
					redirect(base_url());
				}	
						
			}
		//$this->load->view('frontend/registration');
	}

	public function set_password()
	{
		
		if(isset($_POST['btn_verify']) )
       { 	
       		
	    	$where2= array(
							'user_id'=>$this->session->userdata('user_id'),
							
							'uotp'=>$this->input->post('uopt')
					   	);	

				$valid=$this->User_model->record_list('tbl_user',$where2);
					
				if($valid){ 

	                $where  = array(
	                               		'user_id'=>$this->session->userdata('user_id'),
	                               		
	                               		'uotp'=>$this->input->post('uopt')
	                            	);
	                $data= array(      
	                				'uis_mobile_verify'=>'1',
	                            	'u_password'=>md5($this->input->post('upassword'))
	                            );
	               
	                $this->User_model->records_update('tbl_user',$data,$where);
	                
	                $this->session->set_flashdata('event_failed','Password Set Successfully');
	               	redirect(base_url().'User');
	            }
	            else
	            {
	            	$this->session->set_flashdata('event_success','Incorrect OTP');
	            }
        } 


		$this->load->view('users/master/header');
		$this->load->view('users/otp');	
		$this->load->view('users/master/footer');
	}
}
