<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('Mvendor_model');
		$this->load->model('Media_model');
		$this->load->model('Madmin_model');
		$this->load->model('Package_model');
		$this->load->model('Category_model');
		$this->load->model('Advertise_model');
		$this->load->model('User_model');
		$this->load->model('Inquiry_model');
		$this->load->model('Vendor_model');

		$this->load->helper('string');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library("session");

       /* if(!$this->session->userdata('user_id'))
		{
			redirect(base_url().'User/login');
		}*/
        
	}
	
	public function index()
	{


		/*$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);
		$data['package'] = $this->Package_model->get_Package();
		$data['title']='Package';*/
		if (isset($_POST['btnlogin']))  
		{

			$where= array(
				'uemail' => $this->input->post('unum'),
				'u_password' =>md5($this->input->post('upass')),
				'uis_mobile_verify' =>'1'
			);
		$details=$this->User_model->record_list('tbl_user',$where);
		$wherecondition= array(
			'uemail' => $this->input->post('unum'),
			'u_password' =>md5($this->input->post('upass')),
		);
		$details1=$this->User_model->record_list('tbl_user',$wherecondition);

		//print_r($details1);
		//die();
			if($details!="")
			{	

			    $this->session->set_userdata('user_id',$details['0']->user_id);	
				$this->session->set_userdata('uemail',$details['0']->uemail);
				$this->session->set_userdata('umobile',$details['0']->umobile);
				$this->session->set_userdata('ufname',$details['0']->ufname);
				$this->session->set_userdata('uis_email_verify',$details['0']->uis_email_verify);
		    	$this->session->set_flashdata('success_contact','Login Successfully.');
		    	//redirect(base_url().'home');
		    	$_SESSION['user_logged'] = TRUE;
				$_SESSION['userid'] = $details['0']->user_id;
		    	redirect(base_url().'User/user_profile');

			}
			elseif($details1!="")
			{
				$this->session->set_flashdata('event_success','Credentials Incorrect');
				redirect(base_url().'User/login');
				
			}
			else
			{
				$this->session->set_flashdata('event_success','Credentials Incorrect');
				redirect(base_url().'User/login');
			}
		}
		
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
	
		}
		$data['sldier'] = $this->User_model->get_Slider();
		$data['menu'] = $this->Category_model->get_menu();
		$title['title']='Index';
		//$data['sldier'] = $this->Advertise_model->get_Slider();
		$this->load->view('users/master/header',$title);
		$this->load->view('users/master/left',$data);
		$this->load->view('users/index',$data);	
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
	            			'umobile'=>$this->input->post('umobile')
		        		  );
		
			
			$verify_email=$this->User_model->record_count('tbl_user',$where);

			$whereemail=array( 
	            			'uemail'=>$this->input->post('uemail')
		        		  );
		
			$verify_email_id=$this->User_model->record_count('tbl_user',$whereemail);

			$where1=array(  
	            			'umobile'=>$this->input->post('umobile'),
	            			 'uis_mobile_verify'=>'0'
		        		  );      


			$valid_number1=$this->User_model->record_list('tbl_user',$where1);

			
	
				
				if (!$verify_email AND !$verify_email_id)//if (!$verify_email || $valid_number1 || !$verify_email_id)
				{

					//$ran_nub=random_string('numeric', 6);

					$ran_nub= 1234;

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
						
						$this->session->set_userdata('umobile',$valid_number1['0']->mobile_no);
						$this->session->set_userdata('user_id',$valid_number1['0']->user_id);
						$this->session->set_userdata('uemail',$valid_number1['0']->name);
						
						$this->session->set_flashdata('event_success','Mobile no Registered Successfully');
						redirect(base_url()."User/set_password");	
					}
					else{
					// echo "bye";die;

					date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
					$now = date('y-m-d H:i:s');
/*
					$ufname=$this->input->post('uname');
					$umobile=$this->input->post('umobile');*/
					//$return_value = refralCode($ufname, $umobile);
					//echo $return_value;
					//echo refralCode($ufname, $umobile);
					//die();
					//refralCode($ufname,$umobile);
					/*$test= $this->input->post('uname');
					$mystr= strtoupper($test);
				 	$str = substr($mystr, 0, 3);
				   echo $str.$umobile;*/
				   //die();
					$data1= array(                               
			            			'ufname'=>$this->input->post('uname'),
			            			'umobile'=>$this->input->post('umobile'),
			            			'uemail'=>$this->input->post('uemail'),
			            			'ucountry'=>'101',//$this->input->post('ucountry'),
			            			'ustate'=>'22',//$this->input->post('ustate'),
			            			'ucity'=> '2763',//$this->input->post('ucity'),
			            			'ureference'=>$this->input->post('ref'),
			            			//'uorganization'=>$this->input->post('uorganization'),
			            			'uotp'=>$ran_nub,
			            			'uis_mobile_verify'=>'0'			            			
				        		  );
					
				    $this->db->set('ucreated_date', $now);    		  
			        $registered=$this->User_model->record_insert('tbl_user',$data1);
			       		
			        if($registered)
					{							
						$uemail= $this->input->post('uemail');				
						$mob=$this->input->post('mobile_no');
							 
						
							$msg = "Use ".$ran_nub." as OTP to verify your mobile no. This verification is important for safety of your account.";
							//echo $msg;die;
							$url = "http://www.sms123.in/QuickSend.aspx?";
							$this->User_model->send_message($url,$mob,$msg);
						$this->send_email($uemail,$msg);
						
						$this->session->set_userdata('umobile',$this->input->post('umobile'));
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
					$this->session->set_flashdata('event_error','Already Registered');
					redirect(base_url()."User/Create_user");
				}	
						
			}
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['menu'] = $this->Category_model->get_menu();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/register');	
		$this->load->view('users/master/footer');
	}

	public function set_password()
	{
		
		if(isset($_POST['btn_verify']) )
       { 	
       		
	    	$where2= array(
							//'user_id'=>$this->session->userdata('user_id'),
							
							'uotp'=>$this->input->post('uopt')
					   	);	

				$valid=$this->User_model->record_list('tbl_user',$where2);
					
				if($valid){ 

	                $where  = array(
	                               		//'user_id'=>$this->session->userdata('user_id'),
	                               		
	                               		'uotp'=>$this->input->post('uopt')
	                            	);
	                $data= array(      
	                				'uis_mobile_verify'=>'1',
	                            	'u_password'=>md5($this->input->post('upass'))
	                            );
	               
	                $this->User_model->records_update('tbl_user',$data,$where);
	                
	                $this->session->set_flashdata('event_success','Password Set Successfully');
	               	redirect(base_url().'User');
	            }
	            else
	            {
	            	$this->session->set_flashdata('event_error','Incorrect OTP');
	            }
        } 


		$this->load->view('users/master/header');
		$this->load->view('users/otp');	
		$this->load->view('users/master/footer');
	}

	function test()
	{
		$data = array(
		$name = $this->input->post('cat_id'),
		$pass = $this->input->post('user_id')
		);
		$result = $this->User_model->login($name,$pass);
		if ($result=='') {
		   echo "User Name & Password Incorrect";
		} else {
		   
		    echo "string";
		}
	}

	public function search() 
	{
		
		$search_data = $_POST['search_data'];
		$query = $this->User_model->get_live_items($search_data);
		
		if ($query =='') {
			echo "pass";
		}
		else
		{
			  echo json_encode ($query);
		}
		
	}

	public function category()
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
	
		}
		$vindor_id =  $this->uri->segment(3);
		$data['vbusines'] = $this->User_model->get_vbusiness($vindor_id);
		$data['menu'] = $this->Category_model->get_menu();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/vendors_business_list',$data);	
		$this->load->view('users/master/footer');

	
	}
	public function Login()
	{
	
		$data['menu'] = $this->Category_model->get_menu();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/login');	
		$this->load->view('users/master/footer');
	}
	public function business()
	{
		$vindor_id = $this->uri->segment(3);
		$data['vbusines'] = $this->User_model->get_vbusiness($vindor_id);
		$data['menu'] = $this->Category_model->get_menu();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/vendors_business_list');	
		$this->load->view('users/master/footer');
	}
	public function vendor_busines_detils()
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
	
		}
		$vin_id = $this->uri->segment(3);
		$data['menu'] = $this->Category_model->get_menu();
		//$data['vbusdetails'] = $this->User_model->Single_Vdetails($slug);
		$data['vbusdetails'] = $this->User_model->get_vbusdetails($vin_id);
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/vendors_business_details',$data);	
		$this->load->view('users/master/footer');
	}

	public function busines_detils($slug = NULL)
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
	
		}
		$subcatid = $this->uri->segment(4);
		$data['menu'] = $this->Category_model->get_menu();
		$data['vbusdetails'] = $this->User_model->Single_Vdetails($slug,$subcatid);

		/*print_r($data1);
		die();*/
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		//$data['vbusdetails'] = $this->User_model->get_vbusdetails($vin_id);
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/vendors_business_details',$data);	
		$this->load->view('users/master/footer');
	}
	public function sub_category()
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid );
		}
		
		$sub_cat_id = $this->uri->segment(3);
		$data['menu'] = $this->Category_model->get_menu();
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		//$data['cur_states'] =$this->Mvendor_model->record_list('tbl_states',$where);
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');
		//$data['cur_city'] = $this->Mvendor_model->record_list('tbl_city',$where1);
		$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
		/*print_r($data1);
		die();*/
		$data['banner'] = $this->User_model->get_Banner_list();
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/vendors_subcategory_list',$data);	
		$this->load->view('users/master/footer');
	}
	public function user_Dashboard()
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid );
			$data['userinq'] = $this->User_model->get_UserInquiry($uid);
			$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/dashboard',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
		
		
	}

	public function vendors_response()				//updated on 10 Dec 2018
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$enq_id = $this->uri->segment(3);
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$data['vend_list'] = $this->User_model->get_vendors_list($enq_id);
			//$data['userinq'] = $this->User_model->get_UserInquiry($uid);
			//$data['vend_response'] = $this->User_model->get_VendorResponse_count($uid);
			/*print_r($data1);
			die();*/
			
			$data['menu'] = $this->Category_model->get_menu();
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/enq_vendor_list',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
		
		
	}

	public function view_quots(){					//updated on 12 Dec 2018

		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$enq_id = $this->uri->segment(3);
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$data['quot_list'] = $this->User_model->get_quot_list($enq_id,$uid);
			//$data['userinq'] = $this->User_model->get_UserInquiry($uid);
			//$data['vend_response'] = $this->User_model->get_VendorResponse_count($uid);
			/*print_r($data1);
			die();*/
			
			$data['menu'] = $this->Category_model->get_menu();
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/enq_quots',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
	}

	public function send_po_view(){					//updated on 15 Dec 2018
													//updated on 8 Jan 2019
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$quot_id = $this->uri->segment(3);
			
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$data['enq_ved_details'] = $this->User_model->get_VendInquiry_details($quot_id);

			$data['po_data'] = $this->User_model->get_po_details($uid,$quot_id);

			/*print_r($data1);
			die();*/
			//$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/send_po',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
	}

	public function get_Po_details()					//19,27 Dec 2018
	{
		$quot_id= $this->input->post('quot_id');
		$user = $_SESSION['userid'];
		//echo $quot_id;
		$data=$this->User_model->getPoDetails($quot_id,$user);
		echo json_encode($data);
	}

	public function conf_enq()				//21 Dec 2018
	{
		if(isset($_SESSION['userid']))
		{
			

			$uid = $_SESSION['userid'];
			//$quot_id = $this->uri->segment(3);
			
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$data['enq_details'] = $this->User_model->get_ConfInquiry_details($uid);
			/*print_r($data1);
			die();*/
			//$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/confirmed_enqlist',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
	}


	/*public function upload_po()					//updated on 19 dec 2018
	{
		$this->load->library('upload');

		if(isset($_POST['po_upload'])){
			if($_FILES['po']['tmp_name']!="")
						{
							$file_nm = $_FILES['po']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['po']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/user/enquiry/po/".$file_name;
							$po="assets/uploads/user/enquiry/po/".$file_name;
							
							$po_url=base_url().$po;

							move_uploaded_file($file_tmp, $dest1);
					
						}

				$enq_id = $_POST['enqId'];
				$vend_id = $_POST['vendId'];
				$quot = $_POST['quot'];
				$qty = $_POST['po_qty'];
				$d_time = $_POST['po_dtime'];
				$rate = $_POST['po_rate'];
				$q_msg = $_POST['po_msg'];
				$terms = $_POST['po_terms'];

				$userid = $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

				$po_count= $this->Inquiry_model->get_PoCount($enq_id,$vend_id,$userid,$quot);
				
				$sql= "SELECT config_value FROM tbl_config WHERE config_name ='po_num'";
		        $query= $this->db->query($sql);
		        $value= $query->result();

		       	$tot_po = $value['0']->config_value;
		      
				if($po_count<$tot_po){
					if($po_count==0)
					{
						$cnt = 1;
					}
					else
					{
						$cnt = $po_count+1;
					}
				
					$data= array(

						'po_vend_id' => $vend_id,
						'po_enq_id' => $enq_id,
						'po_user_id' => $userid,
						'po_quot_id' => $quot,
						'po_qty' => $qty,
						'po_deli_time' => $d_time,
						'po_rate' => $rate,
						'po_msg' => $q_msg,
						'po_terms_cond' => $terms,
						'po_name' => $po_url,
						'po_count' => $cnt,
						'po_created' => $today,
						'po_updated' => $today
					);

					$res= $this->Inquiry_model->insert_po($data);
				}
				
				$this->session->set_flashdata('event_success','PO send Sucessfully.');
				redirect("User/user_Dashboard","refresh");
			}
		
			else{
				$this->session->set_flashdata('event_error','Already sent Maximum PO, can not send more.');
				redirect("User/user_Dashboard","refresh");
			}
			
	}*/

	public function upload_po()					//updated on 19,25 dec 2018
	{
		$this->load->library('upload');

		if(isset($_POST['po_upload'])){
			if($_FILES['po']['tmp_name']!="")
						{
							$file_nm = $_FILES['po']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['po']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/user/enquiry/po/".$file_name;
							$po="assets/uploads/user/enquiry/po/".$file_name;
							
							$po_url=base_url().$po;

							//$slug = str_replace(' ','-',$str);
							
							move_uploaded_file($file_tmp, $dest1);
					
						}
						else{
							$po_url = '';
						}

				$enq_id = $_POST['enqId'];
				$vend_id = $_POST['vendId'];
				$quot = $_POST['quot'];
				$qty = $_POST['po_qty'];
				$d_time = $_POST['po_dtime'];
				$rate = $_POST['po_rate'];
				$q_msg = $_POST['po_msg'];
				$terms = $_POST['po_terms'];

				$userid = $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

				$po_count= $this->Inquiry_model->get_PoCount($enq_id,$vend_id,$userid,$quot);
				
				$sql= "SELECT config_value FROM tbl_config WHERE config_name ='po_num'";
		        $query= $this->db->query($sql);
		        $value= $query->result();

		       	$tot_po = $value['0']->config_value;
		       
				if($po_count<$tot_po){
					if($po_count==0)
					{
						$cnt = 1;
					}
					else
					{
						$cnt = $po_count+1;
					}
				
					$data= array(

						'po_vend_id' => $vend_id,
						'po_enq_id' => $enq_id,
						'po_user_id' => $userid,
						'po_quot_id' => $quot,
						'po_qty' => $qty,
						'po_deli_time' => $d_time,
						'po_rate' => $rate,
						'po_msg' => $q_msg,
						'po_terms_cond' => $terms,
						'po_name' => $po_url,
						'po_count' => $cnt,
						'po_created' => $today,
						'po_updated' => $today
					);

					$res= $this->Inquiry_model->insert_po($data);
					
					//for email on 25 Dec 2018
					
					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vend_id);

					/*$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has accepted your PO and final a deal for the enquiry of ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);*/

					$vemail = $enqDetails['0']->vemail;
					$msg1 = "User sent a PO against your quotation for the enquiry of ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($vemail,$msg1);

				}
				
				$this->session->set_flashdata('event_success','PO send Sucessfully.');
				redirect("User/user_Dashboard","refresh");
			}
			
			else{
				$this->session->set_flashdata('event_error','Already sent Maximum PO, can not send more.');
				redirect("User/user_Dashboard","refresh");
			}
			
	}

	public function user_profile()
	{
	
		$uid = $_SESSION['userid'];
		if ($uid =='') {
			redirect(base_url().'User/login');	
		} else
		{
			$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			
			$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		
			$data['states'] = $this->Mvendor_model->record_list('tbl_states');
			$data['city'] = $this->Mvendor_model->record_list('tbl_city');
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/user_profile',$data);	
			$this->load->view('users/master/footer');
		}	
	}

	public function update_user_profile() // Change 09_jan_19 Ganesh
	{
		if(isset($_POST['btnupdate']) )
       { 
       
       		if($_FILES['user_pic']['name']!= ""){
			$img_name='user_pic';
			$img_path='user';
			$old_img=$this->input->post('old_user_image');
    		$user_pic=$this->Category_model->upload_image($img_name,$img_path,$old_img);
		   }else{
		        $user_pic=$this->input->post('old_user_image');
		      }
				$where= array(
		        'user_id'=>$this->input->post('user_id')
							);

				$data=array(
        		'ufname'=>$this->input->post('ufname'),
        		'ulname'=>$this->input->post('ulname'),
        		'uemail'=>$this->input->post('uemail'),
        		'umobile'=>$this->input->post('umobile'),
        		'uanumber'=>$this->input->post('uanumber'),
        		'uaddress'=>$this->input->post('uaddress'),
        		'ubaddress'=>$this->input->post('ubaddress'),
        		'ugender'=>$this->input->post('ugender'),
        		'ucountry'=>$this->input->post('con'),
        		'ustate'=>$this->input->post('sta'),
        		'ucity'=>$this->input->post('cty'),
        		'udob'=>$this->input->post('udob'),
        		'ugst'=>$this->input->post('ugst'),
        		'uorganization'=>$this->input->post('uorganization'),
        		'uprof_pic'=>$user_pic
        			);

			
			$details=$this->Category_model->records_update('tbl_user',$data,$where);	
			$this->session->set_flashdata('event_success','Profile Successfully Update.');
			redirect(base_url().'User/user_profile');		
       }
	}
	public function update_user_password()
	{
		if(isset($_POST['btnupdate']) )
       { 
       		$id = $_SESSION['userid'];
       		$where= array(
		        'user_id'=>$id
			);
       		$data=array(
        		'u_password'=>md5($this->input->post('nupass')),
        	);
       		$details=$this->Category_model->records_update('tbl_user',$data,$where);	
       		print_r($details);
       		
			$this->session->set_flashdata('event_success','User Password Successfully Update.');
			redirect(base_url().'User/update_user_password');	
       }
		$uid = $_SESSION['userid'];
		if ($uid =='') {
			redirect(base_url().'User/login');	
		} else
		{
			$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			$data['userpro'] = $this->User_model->get_UserProfile($uid );
			$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/update_user_password',$data);	
			$this->load->view('users/master/footer');
		}
	}

	public function my_orders()
	{

	}
	public function logout()
	{
		$this->session->unset_userdata('userid');
		session_destroy();
		redirect("User/index","refresh");
	}
	public function ajexUserLogin()
	{
		
			$name = $this->input->post('unum');
			$pass = md5($this->input->post('upass'));
			//'u_password' =>md5($this->input->post('upass')),
		$details = $this->User_model->login($name,$pass);
		if(!empty($details)==''){
				echo "0";
				//print_r($result);
		} else {
				echo "1";
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['userid'] = $details['0']->user_id;
				$this->session->set_userdata('user_id',$details['0']->user_id);
		}
	}
	public function refralCode($ufname,$umobile) // reference code genrator
	{ 
		$mystr= strtoupper($ufname);
	 	$str = substr($mystr, 0, 3);
	 	return $str.$umobile;
	   	//echo $str.$umobile;
	}
	public function send_email($email,$text)
	{											
		$this->load->library('email');
				
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not 
		$this->email->initialize($config);
		
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	
		//$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n"."Content-Transfer-Encoding: 7bit\n\n" . $row->message. "\n\n";
		$this->email->from('punegravity@gmail.com','punegravity');
		$this->email->to($email); 
		$this->email->subject('MVENDORS Response');
		$this->email->message($text);
		$this->email->send();
		
		

		 return 1;
	}
	public function category_list() // 27 Dec 18 Changes on server
	{
		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
	
		}

		$cat_id =  $this->uri->segment(3);
		$data['menu'] = $this->Category_model->get_menu();
		$data['submenu'] = $this->Category_model->get_submenu($cat_id);
		$this->load->view('users/master/header');
		$this->load->view('users/master/left',$data);
		$this->load->view('users/subcategory_list',$data);	
		$this->load->view('users/master/footer');
	}

	public function forgot_pass()
	{
		 if(isset($_POST['btn_forgot']))
		 {
			$this->form_validation->set_rules('mobile_no', 'Mobile No.', 'required');
			if ($this->form_validation->run())
			{
				 $whereuser =array( 	  
				'umobile' => $this->input->post('mobile_no')
		    		);              
					$details=$this->User_model->record_list('tbl_user',$whereuser);
					$this->session->set_userdata('mobile_no',$details['0']->umobile);
					$this->session->set_userdata('mobile_no',$details['0']->umobile);
				
				if($details)
			{
				$min=6;
  				$max=6;
  				$randomstring = mt_rand(1000, 9999);

				//$randomstring =  $this->admin->randomNumber($min);
				$whereforgot= array(                               
					'umobile'=>$details[0]->umobile
		 		);
		 		$data= array(
		 			'uotp'=>$randomstring		      
	 			);	
				$registered = $this->User_model->records_update('tbl_user',$data,$whereforgot);
				$this->session->set_flashdata('event_success','Verify Successfully');
				//'mobile_no'=$details[0]->mobile_no

				$mob=$this->input->post('mobile_no');
							 
				
							//$msg = "Use ".$randomstring." as OTP to verify your mobile no. This verification is important for safety of your account.";
							//echo $msg;die;
							//$url = "http://www.sms123.in/QuickSend.aspx?";
							//$this->admin->send_message($url,$mob,$msg);
				$this->session->set_flashdata('event_success','OTP sent Successfully');
				//'user_id'=> $registered
				redirect(base_url()."User/set_password");
			}
			else
			{
				$this->session->set_flashdata('event_success','Incorrect mobile no.');
			}
		 }
		}

	
			//$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			//$data['userpro'] = $this->User_model->get_UserProfile($uid );
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/password_recovery',$data);	
			$this->load->view('users/master/footer');

	}
public function get_quot_details()					//21 Dec 2018
	{
		$enq_id= $this->input->post('enq_Id');
		$user = $_SESSION['userid'];
		//echo $enq_id;
		$data=$this->User_model->get_quot_list($enq_id,$user);
		echo json_encode($data);
	}

	public function completd_enq()				//22 Dec 2018
	{
		if(isset($_SESSION['userid']))
		{
			
			$uid = $_SESSION['userid'];
			//$quot_id = $this->uri->segment(3);
			
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			//$data['enq_details'] = $this->User_model->get_ConfInquiry_details($uid);
			$data['enq_details'] = $this->User_model->get_CompletedEnq_details($uid);
			/*print_r($data1);
			die();*/
			//$sub_cat_id = $this->uri->segment(3);
			$data['menu'] = $this->Category_model->get_menu();
			//$data['sublist'] = $this->User_model->get_sub_cat_detials($sub_cat_id);
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/completed_enqlist',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
	}
/*	public function completd_enq()				//22 Dec 2018
	{
		if(isset($_SESSION['userid']))
		{
			
			$uid = $_SESSION['userid'];
			$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$data['enq_details'] = $this->User_model->get_CompletedEnq_details($uid);
			$data['menu'] = $this->Category_model->get_menu();
			$this->load->view('users/master/header');
			$this->load->view('users/master/left',$data);
			$this->load->view('users/completed_enqlist',$data);	
			$this->load->view('users/master/footer');
		}
		else
		{
			redirect("User/index","refresh");
		}
	}*/

public function final_enq_Status()					//22 Dec 2018 	//14 Jan 2019
	{
		/*$enq_id =  $this->uri->segment(3);*/

		$enq_id =$_REQUEST['id'];
		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$this->User_model->change_Enq_status($enq_id,$today);

		$this->session->set_flashdata('event_success','Enquiry Completed Successfully.');
		redirect("User/completd_enq","refresh");

	}
	
	public function Select_enq()				//27 Dec 2018
	{
		$q_id = $this->input->post('id');
		//echo $q_id;
		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$res=$this->User_model->select_quot($q_id,$today);
		if($res)
		{
			echo '1';
		}
	}

	public function DeSelect_enq()				//27 Dec 2018
	{
		$q_id = $this->input->post('id');
		//echo $q_id;
		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$res=$this->User_model->Deselect_quot($q_id,$today);
		if($res)
		{
			echo '1';
		}
	}

	public function get_POdetails()						//21 Dec 2018
	{
		$enq_id= $this->input->post('enq_Id');
		$vid= $this->input->post('vid');
		$user_Id= $this->input->post('user_Id');	

		//$user = $_SESSION['userid'];
		//echo $enq_id;
		$data=$this->User_model->getaccepted_PoDetails($enq_id,$user_Id,$vid);
		echo json_encode($data);
	}
	
	/*-------------search--------------*/					//3 Jan 2019
	public function search_cat() 
	{
		
		//$search_data = $_POST['search_data'];
		$search_data = $this->input->post('search_data');
		
		$query = $this->User_model->get_live_items_list($search_data);
		/*rint_r($query);
		die();*/
		
			foreach ($query as $row):
			
			 //echo "<li class='autoSuggestionsList'><a href='sub_category/".$row->sub_category_id."' style='text-decoration:none;'>".$row->sub_category_title."</a></li>";
 			$url =  base_url().'User/sub_category'; 
			 echo "<li class='autoSuggestionsList'><a href='".$url."/".$row->sub_category_id."' style='text-decoration:none;'>".$row->sub_category_title."</a></li>";


			endforeach;
		
	}
	public function addUnote()
	{
			if(isset($_POST['btn_vnote'])) {
			
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$vid = $this->input->post('usid');
			$vmsg = $this->input->post('us_msg');
			
			$data=array(	
				'user_id' =>$vid,
				'note_msg' =>$vmsg, 
				'note_cdate' => $now
			);		
			$details=$this->Category_model->record_insert('tbl_user_note',$data);
	        $this->session->set_flashdata('event_success','Note Added Successfully.');
	        redirect(base_url().'madmin/endusers');
		}
	}
	public function updateUnote()
	{
		if(isset($_POST['btn_up'])) {
			
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$vid = $this->input->post('usrid');
			$vmsg = $this->input->post('u_msg');
			
			$where = array(
				'user_id' =>$vid
			);
			$data=array(
				'note_msg' =>$vmsg, 
				'note_udate' => $now
			);	
			$details=$this->Category_model->records_update('tbl_user_note',$data, $where);
	          $this->session->set_flashdata('event_success','Note Update Successfully.');
	         redirect(base_url().'madmin/endusers');
		}
	}
	public function getUnoteData()
	{
		$vid = $this->input->post('id');
		if ($vid != '') {
			$data['remark'] = $this->Vendor_model->get_Unote_Data($vid);
			echo json_encode($data);

		}else{
			
		}
	}

	public function close_enqForall()				//updated 10, 11 Jan 2019
	{

		if(isset($_SESSION['userid']))
		{
			$uid = $_SESSION['userid'];
			
			$enq_id= $_REQUEST['id'];

			$feedback= $_REQUEST['feedback'];
			
			date_default_timezone_set('Asia/Kolkata');
			$today = date('d-m-Y H:i:s', time());

			$data = array(
				'feed_user_id' => $uid,
				'feed_enq_id' => $enq_id,
				'feed_msg' => $feedback,
				'feed_created' => $today
			);

			//$data['userpro'] = $this->User_model->get_UserProfile($uid);
			$result = $this->User_model->add_feedback($data);

			if($result){
			
				$res= $this->User_model->close_inq($enq_id,$uid,$today);
				if($res){
					$this->session->set_flashdata('event_success','You successfully closed this enquiry.');
					redirect('User/user_Dashboard');
				}
			}
		}
		else
		{
			redirect("User/index","refresh");
		}
	}
	
	
	public function get_enqbill_details()					//14 Jan 2019
	{
		$enq_id= $this->input->post('enq_Id');
		$user_id= $_SESSION['userid'];
		$v_id= $this->input->post('v_Id');

		//echo $enq_id;
		$data=$this->Inquiry_model->getEnqBillDetails($enq_id,$v_id,$user_id);
		echo json_encode($data);
	}	

public function add_feed_remark()					//14 Jan 2019
	{
		$enq_id= $this->input->post('e_id');
		$user_id= $_SESSION['userid'];
		$feed= $this->input->post('feed');
		$remark= $this->input->post('remark');
		$v_id= $this->input->post('v_id');
		
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-M-d H:i:s', time());

	
		$data =array(
			'ufeed_user_id' => $user_id,
			'ufeed_vend_id' => $v_id,
			'ufeed_enq_id' => $enq_id,
			'ufeed_feedback' => $feed,
			'ufeed_remark' => $remark,
			'ufeed_created' => $today
		);
		//echo $enq_id;
		$result=$this->User_model->add_feed_remark($data);
		
	
		if(empty($result))
		{
		    echo 'fail';
		}else{
		echo json_encode($result);
		
		}
	}
	
	
	// Notification functions
	public function add_user_notification($userid,$msg)				//15 Jan 2019
	{
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-M-d H:i:s', time());

		$data= array(
			'notification_user_id' => $userid,
			'notification_title' => $msg,
			'notification_c_date' => $today
		);
		$result=$this->User_model->add_user_notifications($data);

	}

	public function add_vend_notification($vid,$msg)				//15 Jan 2019
	{
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-M-d H:i:s', time());

		$data= array(
			'notification_vend_id' => $vid,
			'notification_title' => $msg,
			'notification_c_date' => $today
		);
		$result=$this->User_model->add_notifications($data);

	}

	public function get_user_notifications()					//15 Jan 2019
	{
		$userid = $this->input->post('user_id');
		//echo $userid;
		$data=$this->User_model->getnotifications($userid);
		echo json_encode($data);
	}

	public function remove_noti()								//16 Jan 2019
	{
		$noti_id =  $this->input->post('id'); ;

		$res=$this->User_model->delete_user_notifications($noti_id);
		echo json_encode($res);
	}
	public function add_reating() // 19 Jan 18
	{
		$uid = $this->input->post('uid');
		$rat = $this->input->post('rat');
		$bis = $this->input->post('bis');
		$data = array('user_id' => $uid, 
		'venb_id' => $bis,); 
		$this->db->select('*');
		$this->db->from('tbl_rating');
		$this->db->where($data);
		//$this->db->where('venb_id',$uid);
		$res = $this->db->get()->result();
		date_default_timezone_set('Asia/Kolkata');
		$timestamp = date("Y-m-d H:i:s");
		if (empty($res)) {
			$data = array( 
			'user_id' => $uid,
			'venb_id' => $bis,
			'star_rating' => $rat,
			'rating_cdate' => $timestamp,
			 );

		$this->db->insert('tbl_rating',$data);
		}else{
			$data = array('star_rating' => $rat,
			'rating_udate' => $timestamp );
			$where = array('venb_id' => $bis,
			'user_id' => $uid );
			$this->db->set($data);
			$this->db->where($where);
			$this->db->update('tbl_rating');
		}
		
	}
	public function getUserProfile()					//17 Jan 2019
	{
		$id =  $this->input->post('id'); ;

		$res=$this->User_model->get_user_details($id);
		//echo $id;
		//print_r($res);
		if(($res[0]->ulname!='') && ($res[0]->uaddress!='') && ($res[0]->ucountry!='') &&($res[0]->ustate!='') &&($res[0]->ucity!='')){
			echo '1';
		}
		else
		{
			echo "0";
		}

		//echo json_encode($res);
	}
	
	
}
