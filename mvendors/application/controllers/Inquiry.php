<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('Inquiry_model');
		$this->load->model('Mvendor_model');
		$this->load->model('Madmin_model');
		$this->load->model('User_model');
		$this->load->model('Package_model');
		$this->load->model('Advertise_model');
		$this->load->model('Category_model');
		$this->load->model('Vendor_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');	
        $vendor = $_SESSION['userid'];
        if ($vendor =='') {
        	redirect("Login");
        }

        
	}
	
	public function index()
	{
		$vendor = $_SESSION['userid'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		//$data1['business'] = $this->Mvendor_model->get_business_details('tbl_vbusiness_details', $vendor);
		$data['package'] = $this->Package_model->get_Package();
		//$data['ip']= $hostname;
		$data['title']= 'Enquiry';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/index');	
		$this->load->view('vendor/master/footer');
	}
	public function user_enquiry()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_AllUserInquiry(); 
		/*print_r($data);
		die();*/
		//$data['rmark'] = $this->Inquiry_model->getSingleRemark();
	
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/user_enquirylist',$data);	
		$this->load->view('admin/master/footer');
	}
	public function getInqueryCount() // 28 Dec 2018
	{
		$enq_id = $this->input->post('id');
		if ($enq_id != '') {
			$act = $this->Inquiry_model->get_Inquery_Count($enq_id);
			$acc = $this->Inquiry_model->get_Inquery_Accepted($enq_id);
		
			$data['actgetcount'] = $act;
			$data['getcount'] = $acc;
			echo json_encode($data);
			//print_r($data);
		}else{
			
		}
	}

	public function getUserEmail()
	{
		$id = $this->input->post('id');
		if ($id != '') {
			$newid = explode(',',$id);
			$enq_user_id =$newid[0];
			$enq_id =$newid[1];
			$data['email'] = $this->Inquiry_model->getUserInfo($enq_user_id);

			echo json_encode($data);
			//print_r($data);
		}else{
			
		}
	}
	public function sendEmail()
	{
		$email = $this->input->post('email');
		$text = $this->input->post('enmsg');
		$mob = $this->input->post('email');

		$data = array(
			'name'=> $this->input->post('name'),
			'email' => $this->input->post('email'),
			'sub' => $this->input->post('sub'),
			'enmsg' => $this->input->post('enmsg')
		);

		$this->send_email($email,$text);
		$url = "http://www.sms123.in/QuickSend.aspx?";
		$this->User_model->send_message($url,$mob,$text);
		$this->session->set_flashdata('event_success','Email Send Successfully.');
		redirect(base_url().'inquiry/user_enquiry');
		
	}

	public function get_remarks()
	{
		$id = $this->input->post('id');
		if ($id != '') {
			$newid = explode(',',$id);
			$enq_user_id =$newid[0];
			$enq_id =$newid[1];
			$data['remark'] = $this->Inquiry_model->getAllRemark($enq_user_id,$enq_id);

			echo json_encode($data);
			//print_r($data);
		}else{
			
		}

	}
	public function user_remark()
	{
		if(isset($_POST['btn_rem'])) {
			
			$where=array(
				'enquiry_id'=>$this->input->post('enquiry_id')
			);
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$id = $this->input->post('enq_user_id');
			$newid = explode(',',$id);
			$enq_user_id =$newid[0];
			$enq_id =$newid[1];
		

			$data=array(
				'user_id' =>$enq_user_id, 
				'enq_id' =>$enq_id,
				'remark_msg' =>$this->input->post('re_msg'), 
				'remark_cdate' => $now
			);		
			//$this->db->set('mail_send_time', $now); 
			$details=$this->Category_model->record_insert('tbl_remark',$data);

			/*die();
			 $insert_id=$this->admin->records_update('tbl_enquiry',$data,$where); 
			 $id=$this->input->post('enquiry_id');
	         $subject=$this->input->post('mail_subject');
	          $findemail = $this->Senduserenquirymail($id,$subject); */
	        $this->session->set_flashdata('event_success','Remark Added Successfully.');
	        redirect(base_url().'inquiry/user_enquiry');
		}
		
	}
	public function update_user_remark()
	{
		if(isset($_POST['btn_up'])) {
			
			
			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$id = $this->input->post('enid');
			$newid = explode(',',$id);
			$enq_user_id =$newid[0];
			$enq_id =$newid[1];
		
			$where = array(
				'enq_id' =>$enq_id
			);
			$data=array(
				'user_id' =>$enq_user_id, 
				'enq_id' =>$enq_id,
				'remark_msg' =>$this->input->post('enmsg'), 
				'remark_cdate' => $now
			);	
		
			//$this->db->set('mail_send_time', $now); 
			$details=$this->Category_model->records_update('tbl_remark',$data, $where);

			/*die();
			 $insert_id=$this->admin->records_update('tbl_enquiry',$data,$where); 
			 $id=$this->input->post('enquiry_id');
	         $subject=$this->input->post('mail_subject');
	          $findemail = $this->Senduserenquirymail($id,$subject); */
	          $this->session->set_flashdata('event_success','Remark Update Successfully.');
	         redirect(base_url().'inquiry/user_enquiry');
		}
	}
	
	public function update_user_enquiry() //Update User Inquiry 19_Dec_18
	{
		if(isset($_POST['update_inq']))
		{	
				$where= array(
		        'enq_id'=>$this->input->post('enq_id')
						);
				$status= $this->input->post('enq_status');

				if ($status == 'Fake') {
					
		        	$where=$this->input->post('enq_id');
					$this->db->select('*');
					$this->db->from('tbl_vendor_commission_deduction');
					$this->db->where('com_ded_enqId',$where);
					$result = $this->db->get()->result();
					foreach ($result as $key) {
						$points = $key->com_ded_pts;
						$vid = $key->com_ded_vendorId;
						$this->db->set('bis_vendor_pts','bis_vendor_pts+'.$points, FALSE);
						$this->db->where('bis_vendor_id', $vid );
						$this->db->update('tbl_vbusiness_details');
					}
					date_default_timezone_set('Asia/Kolkata');
					$timestamp = date("d-m-Y H:i:s");
					foreach ($result as $value) {
						$points = 0;
						//$id = $key->com_ded_vendorId;
						$inqid = $key->com_ded_enqId;
						$data = array('com_ded_pts' => $points, 'com_deu_date' => $timestamp);
						$this->db->set($data);
						//$this->db->set('com_ded_pts', $points);
						$this->db->where_in('com_ded_enqId', $inqid );
						$this->db->update('tbl_vendor_commission_deduction');
						
					}
						
				} else if ($status == 'Verified') {
						$where= array(
				        'enq_id'=>$this->input->post('enq_id')
								);
						$where1= array(
				       				 'enq_id'=>$this->input->post('enq_id')
								);
						$data1=array(
				    		'enq_qty'=>$this->input->post('enq_qty'),
				    		'enq_unit'=>$this->input->post('enq_unit'),
				    		'enq_crdt_time'=>$this->input->post('enq_crdt_time'),
				    		'enq_oder_req_time'=>$this->input->post('enq_oder_req_time'),
				    		'enq_status'=>$this->input->post('enq_status')
			    		);
			    		
						$enq_id=$this->input->post('enq_id');
						$enqDetails= $this->Inquiry_model->get_update_enq($enq_id);
						//$oldqty= $enqDetails['0']->enq_qty;
						//$newqty =$this->input->post('enq_qty');
						//NEW CHANGES 22 JAN
						$oldcomm= $enqDetails['0']->enq_commission;
						$newcomm =$this->input->post('enq_commission');
						
						//if ($newqty >= $oldqty) {
						if ($newcomm >= $oldcomm) {
							
							$details=$this->Advertise_model->records_update('tbl_enq_master',$data1,$where1);

						}else
						{
							$details=$this->Advertise_model->records_update('tbl_enq_master',$data1,$where1);
								/*$product_rate= $enqDetails['0']->sub_category_price;
								$commision= $enqDetails['0']->sub_category_commission;
				        		$qty=$this->input->post('enq_qty');
				        		$deduction= ($product_rate * $qty)*$commision;*/
                                $deduction=$this->input->post('enq_commission');
								$where= array(
						        'enq_id'=>$this->input->post('enq_id')
										);
								$Fake= $this->input->post('enq_status');

							//if ($Fake == 'Fake') {
								
					        	$where=$this->input->post('enq_id');
								$this->db->select('*');
								$this->db->from('tbl_vendor_commission_deduction');
								$this->db->where('com_ded_enqId',$where);
								$result = $this->db->get()->result();

								date_default_timezone_set('Asia/Kolkata');
								$timestamp = date("d-m-Y H:i:s");
								foreach ($result as $key) {
									$points = $key->com_ded_pts;
									$vid = $key->com_ded_vendorId;
									$new_pts = $points- $deduction;

									$this->db->set('bis_vendor_pts','bis_vendor_pts+'.$new_pts, FALSE);
									$this->db->where('bis_vendor_id', $vid );
									$this->db->update('tbl_vbusiness_details');

									$data = array('com_ded_pts' => $deduction, 'com_deu_date' => $timestamp);
									$this->db->set($data);
									//$this->db->set('com_ded_pts', $points);
									$this->db->where_in('com_ded_enqId', $inqid );
									$this->db->update('tbl_vendor_commission_deduction');

								}
						}
					
				}
				else{
				$data=array(
	        			'enq_qty'=>$this->input->post('enq_qty'),
	        			'enq_status'=>$this->input->post('enq_status'),
	        			'enq_oder_req_time'=>$this->input->post('enq_oder_req_time'),
	        			'enq_crdt_time'=>$this->input->post('enq_crdt_time'),
	        			'enq_exptd_date'=>$this->input->post('enq_exptd_date')
        			);
				$details=$this->Advertise_model->records_update('tbl_enq_master',$data,$where);	
				}
			$this->session->set_flashdata('Inquiry','Successfully Updated.');
			redirect(base_url().'Inquiry/user_enquiry');		
				
		}

		$where=array(         			
		'enq_id'=>$this->uri->segment('3')
		  );
		$data['ediinq']=$details=$this->Advertise_model->record_list('tbl_enq_master',$where);
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->getAllActiveInquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/update_user_enquiry',$data);	
		$this->load->view('admin/master/footer');
	}
	public function update_verified_inquiry() // Update Varified Inquiry 19_Dec_18
	{
		if(isset($_POST['update_inq']))
		{	

			$status=$this->input->post('enq_status');

			if ($status == 'Completed') {
				$where2= array(
		       				 'enq_id'=>$this->input->post('enq_id')
						);
				$data2=array(
		    		'enq_status'=>$this->input->post('enq_status')
	    		);
	    		$details=$this->Advertise_model->records_update('tbl_enq_master',$data2,$where2);
			}
			else{

			$where= array(
	        'enq_id'=>$this->input->post('enq_id')
					);
			$where1= array(
	       				 'enq_id'=>$this->input->post('enq_id')
					);
			$data1=array(
	    		'enq_qty'=>$this->input->post('enq_qty'),
	    		'enq_unit'=>$this->input->post('enq_unit'),
	    		'enq_crdt_time'=>$this->input->post('enq_crdt_time'),
	    		'enq_oder_req_time'=>$this->input->post('enq_oder_req_time'),
	    		'enq_status'=>$this->input->post('enq_status')
    		);
    		
			$enq_id=$this->input->post('enq_id');
			$enqDetails= $this->Inquiry_model->get_update_enq($enq_id);
			$oldqty= $enqDetails['0']->enq_qty;
			$newqty =$this->input->post('enq_qty');
			
			if ($newqty >= $oldqty) {
				
				$details=$this->Advertise_model->records_update('tbl_enq_master',$data1,$where1);

			}else
			{
				$details=$this->Advertise_model->records_update('tbl_enq_master',$data1,$where1);
					$product_rate= $enqDetails['0']->sub_category_price;
					$commision= $enqDetails['0']->sub_category_commission;

	        		$qty=$this->input->post('enq_qty');
	        		
	        		$deduction= ($product_rate * $qty)*$commision;

					$where= array(
			        'enq_id'=>$this->input->post('enq_id')
							);
					$Fake= $this->input->post('enq_status');

				//if ($Fake == 'Fake') {
					
		        	$where=$this->input->post('enq_id');
					$this->db->select('*');
					$this->db->from('tbl_vendor_commission_deduction');
					$this->db->where('com_ded_enqId',$where);
					$result = $this->db->get()->result();

					date_default_timezone_set('Asia/Kolkata');
					$timestamp = date("d-m-Y H:i:s");
					foreach ($result as $key) {
						$points = $key->com_ded_pts;
						$vid = $key->com_ded_vendorId;
						$new_pts = $points- $deduction;

						$this->db->set('bis_vendor_pts','bis_vendor_pts+'.$new_pts, FALSE);
						$this->db->where('bis_vendor_id', $vid );
						$this->db->update('tbl_vbusiness_details');

						$data = array('com_ded_pts' => $deduction, 'com_deu_date' => $timestamp);
						$this->db->set($data);
						//$this->db->set('com_ded_pts', $points);
						$this->db->where_in('com_ded_enqId', $inqid );
						$this->db->update('tbl_vendor_commission_deduction');

					}
			}
					
		}			
			/*		foreach ($result as $value) {
						$points = 0;
						//$id = $key->com_ded_vendorId;
						$inqid = $key->com_ded_enqId;
						$data = array('com_ded_pts' => $points, 'com_deu_date' => $timestamp);
						$this->db->set($data);
						//$this->db->set('com_ded_pts', $points);
						$this->db->where_in('com_ded_enqId', $inqid );
						$this->db->update('tbl_vendor_commission_deduction');
						
					}
						$where1= array(
		       				 'enq_id'=>$this->input->post('enq_id')
						);
						$data1=array(
		        		'enq_qty'=>$this->input->post('enq_qty'),
		        		'enq_unit'=>$this->input->post('enq_unit'),
		        		'enq_crdt_time'=>$this->input->post('enq_crdt_time'),
		        		'enq_oder_req_time'=>$this->input->post('enq_oder_req_time'),
		        		'enq_status'=>$this->input->post('enq_status')
		     
		        			);*/

						
					/*$details=$this->Advertise_model->records_update('tbl_enq_master',$data1,$where1);	
						*/
			/*	}else{
				$data=array(
        		'enq_qty'=>$this->input->post('enq_qty'),
        		'enq_unit'=>$this->input->post('enq_unit'),
        		'enq_crdt_time'=>$this->input->post('enq_crdt_time'),
        		'enq_oder_req_time'=>$this->input->post('enq_oder_req_time'),
        		'enq_status'=>$this->input->post('enq_status')
     
        			);
			$details=$this->Advertise_model->records_update('tbl_enq_master',$data,$where);	
				}*/
			$this->session->set_flashdata('Inquiry','Successfully Updated.');
			redirect(base_url().'Inquiry/verified_inquiry');		
				
		}
		$where=array(         			
				'enq_id'=>$this->uri->segment('3')
	    		  );
		$data['uinquiry']=$details=$this->Advertise_model->record_list('tbl_enq_master',$where);
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		//$data['uinquiry'] = $this->Inquiry_model->get_AllUserInquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/update_verified_inquiry',$data);	
		$this->load->view('admin/master/footer');
	}
	public function single_user_enquirylist()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_single_user_enquirylist();
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/single_user_enquirylist',$data);	
		$this->load->view('admin/master/footer');
	}
	public function verified_inquiry()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_Allverified_inquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/verified_inquiry',$data);	
		$this->load->view('admin/master/footer');
	}

	public function non_verified_inquiry()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_Allnon_verified_inquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='Fake Inquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/non_verified_inquiry',$data);	
		$this->load->view('admin/master/footer');
	}

	public function completed_inquiry()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_Allcompleted_inquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='Fake Inquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/completed_inquiry',$data);	
		$this->load->view('admin/master/footer');
	}
	public function purchaseorder()
	{
		$title['title']='Purchase Order';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function askme()
	{
		$title['title']='Ask Me';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function contact()
	{
		$title['title']='Contact';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');
	}
	public function refer_enquiry()
	{
		$title['title']='Refer Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/products/admin_productlist');	
		$this->load->view('admin/master/footer');

	}

	public function getInquiry()   			//updated on 7,17 dec 2018		//19 Jan 2019
	{
			/*print_r($_POST);
			print_r($_FILES);
			die();*/
		
			$user_id = $this->input->post('user_id');
         	//$uname = $this->input->post('uname');
         	//$unumber = $this->input->post('unumber');
         	//$uemail = $this->input->post('uemail');
         	//$uadd = $this->input->post('uadd');
          	//$org_name = $this->input->post('org_name');
          	$ref_id = $this->input->post('ref_id');
          	$msg = $this->input->post('msg');
          //	$attach = $this->input->post('attach');
          	$pro_ser = $this->input->post('pro_ser');
          	$enq_type=$this->input->post('enq_type');
          	$vendor= $this->input->post('vendor');
          	$address = $this->input->post('add');
          	$country = $this->input->post('country');
          	$state = $this->input->post('state');
          	$city = $this->input->post('city');
          	$org_name = $this->input->post('org_name');
          	$ship_add = $this->input->post('enq_ship_add');

          //FOR PRODUCT
	         $pro_scat_id = $this->input->post('pro_scat_id');
	         $qty = $this->input->post('qty');
	         $unit = $this->input->post('unit');
	         $cr_time = $this->input->post('cr_time');
	         $o_time = $this->input->post('o_time');
             //For commission
	         $this->db->select('sub_category_commission,sub_category_price');
	         $this->db->from('tbl_sub_category');
	         $this->db->where('sub_category_id',$pro_scat_id);
	         $comval= $this->db->get()->result();
	         $commission = $comval[0]->sub_category_commission;
	         $product_rate= $comval[0]->sub_category_price;
			 $comm_rate= ($product_rate * $qty )*$commission;
			 
          //FOR SERVICE

	         $ser_cat_id = $this->input->post('ser_cat_id');
	         $ser_subcat_id = $this->input->post('ser_subcat_id');
	         $exp_time = $this->input->post('exp_time');
		
			date_default_timezone_set('Asia/Kolkata');
			$today = date('d-m-Y H:i:s', time());
			//echo $today;
			$sql= 'SELECT config_value FROM tbl_config WHERE config_name ="enquiry_validity"';
	        $query= $this->db->query($sql);
	        $val= $query->result();
	          
	        $validate = $val[0]->config_value;
         
			$date = strtotime("+ ".$validate." day.", time());
			$end_date= date('d-m-Y H:i:s', $date);

			$data = array(
				'enq_user_id'=> $user_id,
				'enq_uorg_name' => $org_name,
				'enq_add' => $address,
				'enq_ship_add' => $ship_add,
				'enq_country' => $country,
				'enq_state' => $state,
				'enq_city' => $city,
				'enq_refer_id' => $ref_id,
				'enq_type'=> $enq_type,
				'enq_ser_cat_id'=> $ser_cat_id,
				'enq_ser_subcat_id'=>$ser_subcat_id,
				'enq_pro_subcat_id'=> $pro_scat_id,
				'enq_pro_ser'=> $pro_ser,
				'enq_msg'=> $msg,
				'enq_qty'=> $qty,
				'enq_commission' => $comm_rate,
				'enq_unit'=> $unit,
				'enq_crdt_time'=> $cr_time,
				'enq_oder_req_time'=> $o_time,
				'enq_exptd_date'=> $exp_time,
				'enq_status'=> "Active",
				'enq_created'=> $today,
				'enq_endDate'=> $end_date
			);
		

		$enqID = $this->Inquiry_model->get_Inquiry($data);

		if($enq_type =='Multiple'){

			if($pro_scat_id!=''){
				$subid= $pro_scat_id;
			}
			else{
				$subid= $ser_subcat_id;
			}

			$res = $this->Inquiry_model->get_all_vendors($subid);

			/*print_r($res);
			die();
*/
			foreach ($res as $key) {
				$data1 =array(
					'res_enq_id'=> $enqID,
					'res_vend_id'=> $key->vend_id,
					'res_enq_status'=> "Active",
					'res_enq_created'=> $today,
					'res_enq_updated'=> $today
				);
				//print_r($data1);

				$result = $this->Inquiry_model->sendTo_vendors($data1);

				$msg = "You have recieved a new enquiry.";
				$this->add_vend_notification($key->vend_id,$msg);

			}
		}

		if($enq_type =='Single'){
				$data1 =array(
					'res_enq_id'=> $enqID,
					'res_vend_id'=> $vendor,
					'res_enq_status'=> "Accepted",
					'res_enq_created'=> $today,
					'res_enq_updated'=> $today
				);
			$result = $this->Inquiry_model->sendTo_vendors($data1);
			$msg = "You have recieved a new enquiry.";
				$this->add_vend_notification($vendor,$msg);
		}

		/*for file upload on 17 dec 2018*/

		if(!empty($_FILES)){		//if file is uploaded 
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			/*$_FILES['userFile']['name'] = $_POST['cust_id']."_".$_POST['group_id']."_seccheq_".$created_date."_".time().".".$ext;//$_FILES['file']['name'];*/
			$_FILES['userFile']['name'] = $_FILES['file']['name'];
		    $_FILES['userFile']['type'] = $_FILES['file']['type'];
		    $_FILES['userFile']['tmp_name'] = $_FILES['file']['tmp_name'];
		    $_FILES['userFile']['error'] = $_FILES['file']['error'];
		    $_FILES['userFile']['size'] = $_FILES['file']['size'];
		    //echo "files".$_FILES['userFile']['name'];
		    
		    $uploadPath = 'assets/uploads/user/enquiry/';
		    $config['upload_path'] = $uploadPath;
	        //$config['allowed_types'] = 'pdf|csv|jpg|png|';
	        $config['allowed_types'] = '*';
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('userFile')){
	        	
	        	$fileData = $this->upload->data();

	        	$file_url = base_url().$uploadPath.$fileData['file_name'];
	        	//print_r($file_url);
	        		
						$data2=array(
							'atch_enq_id' => $enqID,
							'atch_user_id' => $user_id,
							'atch_name' => $file_url,
							'atch_created' => $today
						);
						//print_r($data2);
					
				$details=$this->Category_model->record_insert('tbl_enq_atchmnt',$data2);
					//die();
				}else{
	        		echo "error".$this->upload->display_errors();
	       		}
       }
      /* else
       {
       	 echo "file not found";
       }*/	
       

		//echo $enqID;
		/*print_r($result);
		die();*/
		if ($result=='') {
		  
		   echo "0";
		   
		} else {
		   
		    echo "1";
		}
	}

	function vendor_enquirylist()			//updated 10 Dec 2018
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['userenq'] = $this->Inquiry_model->get_user_enqlist($vendor);
		$data['title']='User Enquiry List';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/vendor_enquirylist',$data);	
		$this->load->view('vendor/master/footer');
	}

	function vendor_accpted_enquirylist()			//updated 18 Dec 2018 		//updated on 15 Jan 2019
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['userenq'] = $this->Inquiry_model->get_user_accepted_enqlist($vendor);
		//$data['assigned'] = $this->Inquiry_model->get_user_assigned_enqlist($vendor)
		/*print_r($data1);
		die();*/
		$data['title']='User Enquiry List';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/vendor_accepted_enqlist',$data);	
		$this->load->view('vendor/master/footer');
	}
	
	function vendor_deal_enquirylist()			//updated 20 Dec 2018
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['userenq'] = $this->Inquiry_model->get_user_deal_enqlist($vendor);
		$data['title']='User Enquiry List';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/vendor_deal_enqlist',$data);	
		$this->load->view('vendor/master/footer');
	}

	/*function accept_enquiry()				//updated 11 Dec 2018
	{
		$enq_id= $_REQUEST['id'];
		$vendor = $_SESSION['userid'];

		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);
		
		if($enqDetails['0']->enq_pro_ser =="PRODUCT"){
			$product_rate= $enqDetails['0']->sub_category_price;
			
			$qty= $enqDetails['0']->enq_qty;
			$commision= $enqDetails['0']->sub_category_commission;

			$deduction= ($product_rate * $qty)*$commision;

			$v_points= $enqDetails['0']->bis_vendor_pts;

			$resId = $enqDetails['0']->res_id;

			if($deduction <= $v_points)
			{
				
				$new_pts= $v_points-$deduction;
				$res= $this->Inquiry_model->update_vendor_points($vendor,$new_pts);
				
				if($res){

					$data=array(
						'com_ded_vendorId' => $vendor,
						'com_ded_enqId' => $enq_id,
						'com_ded_pts' => $deduction,
						'com_ded_date' => $today
					);

					$this->Inquiry_model->insert_trans($data);

					$res1=$this->Inquiry_model->update_enq_status($resId,$today);
					echo $res1;
				}
			}

			else
			{
				$this->session->set_flashdata('event_error','You dont have sufficient points to accept this enquiry.');
				redirect('Inquiry/vendor_enquirylist');
			}
		}
		
		$this->session->set_flashdata('event_success','Enquiry accepted Sucessfully.');
		redirect('Inquiry/vendor_enquirylist');
	}*/

	public function accept_enquiry()				//updated 11,25,26 Dec 2018
	{
		
		$enq_id= $_POST['id'];
		$vendor = $_SESSION['userid'];

		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);
		/*print_r($enqDetails);
		die();*/
		if($enqDetails['0']->enq_pro_ser =="PRODUCT"){

		/*	$product_rate= $enqDetails['0']->sub_category_price;
			
			$qty= $enqDetails['0']->enq_qty;
			$commision= $enqDetails['0']->sub_category_commission;

			$deduction= ($product_rate * $qty)*$commision;*/ //changes 22 Jan
            $deduction= $enqDetails['0']->enq_commission;
			$v_points= $enqDetails['0']->bis_vendor_pts;

			/*echo $v_points;
			die();*/
			$resId = $enqDetails['0']->res_id;

			if($deduction <= $v_points)
			{
				/*echo "scucess";
				die();*/
				$new_pts= $v_points-$deduction;
				$res= $this->Inquiry_model->update_vendor_points($vendor,$new_pts);
				//echo $res;
				if($res){

					$data=array(
						'com_ded_vendorId' => $vendor,
						'com_ded_enqId' => $enq_id,
						'com_ded_pts' => $deduction,
						'com_ded_date' => $today
					);

					$this->Inquiry_model->insert_trans($data);

					$res1=$this->Inquiry_model->update_enq_status($resId,$today);

					echo "1";

					//for email
					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has accepted your enquiry for ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);

					$vemail = $enqDetails['0']->vemail;
					$msg1 = "Your ".$deduction."points has been deducted for accepting the enquiry for ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($vemail,$msg1);


				}
			}

			else
			{
				echo "0";

				/*$this->session->set_flashdata('event_error','You dont have sufficient points to accept this enquiry.');
				redirect('Inquiry/vendor_enquirylist');*/
			}
		}
		//print_r($res);
		//$deduction= ($product_rate * $qty)/0.01;
		//echo $enq_id;

		//$this->session->set_flashdata('event_success','Enquiry accepted Sucessfully.');
		//redirect('Inquiry/vendor_accpted_enquirylist');
		/*if ($res1) {

			echo "1";

		   
		} else {
		   
		    echo "0";
		}*/
		//echo json_encode($data);
		
	}

	public function get_details()								// updated 10 Jan 2019
	{
		$enq_id= $this->input->post('enq_Id');
		$v_id= $this->input->post('vid');
		$user_id= $this->input->post('user_Id');

		//echo $enq_id;
		$enq = $this->Inquiry_model->getEnqDetails($enq_id,$v_id,$user_id);
		$quot = $this->Inquiry_model->getQuot($enq_id,$v_id,$user_id);

		$data= array(
			'enq' => $enq,
			'quot' => $quot
		);

		echo json_encode($data);
	}
	
	public function get_quot_details()					//18 Dec 2018
	{
		$enq_id= $this->input->post('enq_Id');
		$vendor = $_SESSION['userid'];
		//echo $enq_id;
		$data=$this->Inquiry_model->getQuotDetails($enq_id,$vendor);
		echo json_encode($data);
	}

/*	public function upload_quot()					//updated on 18,19 dec 2018

	{
		$this->load->library('upload');
		if(isset($_POST['quot_upload'])){
			if($_FILES['quot']['tmp_name']!="")
						{
							$file_nm = $_FILES['quot']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['quot']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/quots/".$file_name;
							$quot="assets/uploads/vbusiness/quots/".$file_name;
							
							$quot_url=base_url().$quot;
							
							move_uploaded_file($file_tmp, $dest1);
					
						}
				$enq_id = $_POST['enqId'];
				$userid = $_POST['userId'];
				$qty = $_POST['qty'];
				$d_time = $_POST['d_time'];
				$rate = $_POST['rate'];
				$q_msg = $_POST['q_msg'];
				$terms = $_POST['terms'];
				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

				$quot_count= $this->Inquiry_model->get_quotCount($enq_id,$vendor);

				$sql= "SELECT config_value FROM tbl_config WHERE config_name ='quotation_num'";
		        $query= $this->db->query($sql);
		        $value= $query->result();

		       	$tot_quot = $value['0']->config_value;
		       
				if($quot_count<$tot_quot){
					if($quot_count==0)
					{
						$cnt = 1;
					}
					else
					{
						$cnt = $quot_count+1;
					}
				
					$data= array(
						'quot_vend_id' => $vendor,
						'quot_enq_id' => $enq_id,
						'quot_user_id' => $userid,
						'quot_qty' => $qty,
						'quot_deli_time' => $d_time,
						'quot_rate' => $rate,
						'quot_msg' => $q_msg,
						'quot_terms_cond' => $terms,
						'quot_name' => $quot_url,
						'quot_count' => $cnt,
						'quot_created' => $today,
						'quot_updated' => $today
					);

					$res= $this->Inquiry_model->insert_quot($data);
				}
			}
			else{
				$this->session->set_flashdata('event_error','Already sent 10 quotations, can not send more.');
				redirect('Inquiry/vendor_accpted_enquirylist');
			}
			$this->session->set_flashdata('event_success','Quotation send Sucessfully.');
			redirect('Inquiry/vendor_accpted_enquirylist');
	}*/

	public function upload_quot()					//updated on 18,19,25 dec 2018
													//updated on 9 Jan 2019
	{	
		$this->load->library('upload');
		if(isset($_POST['quot_upload'])){
			if($_FILES['quot']['tmp_name']!="")
						{
							$file_nm = $_FILES['quot']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['quot']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/quots/".$file_name;
							$quot="assets/uploads/vbusiness/quots/".$file_name;
							
							$quot_url=base_url().$quot;

							//$slug = str_replace(' ','-',$str);
							
							move_uploaded_file($file_tmp, $dest1);
					
						}
						else
						{
							$quot_url = '';
						}
				$enq_id = $_POST['enqId'];
				$userid = $_POST['userId'];
				//$quot_id= $_POST['quot_id'];
				$qty = $_POST['qty'];
				$d_time = $_POST['d_time'];
				$rate = $_POST['rate'];
				$gst = $_POST['gst'];
				$tot_rate= $_POST['ftot'];
				$trans_rate= $_POST['t_rate'];
				$q_msg = $_POST['q_msg'];
				$terms = $_POST['terms'];

				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

				$quot_count= $this->Inquiry_model->get_quotCount($enq_id,$vendor);

				$sql= "SELECT config_value FROM tbl_config WHERE config_name ='quotation_num'";
		        $query= $this->db->query($sql);
		        $value= $query->result();

		       	$tot_quot = $value['0']->config_value;
		       // die();

				/*echo $quot_count;
				die();*/
				if($quot_count<$tot_quot){
					if($quot_count==0)
					{
						$cnt = 1;
					}
					else
					{
						$cnt = $quot_count+1;
					}
				

					$data= array(
						'quot_vend_id' => $vendor,
						'quot_enq_id' => $enq_id,
						'quot_user_id' => $userid,
						'quot_qty' => $qty,
						'quot_deli_time' => $d_time,
						'quot_rate' => $rate,
						'quot_gst' => $gst,
						'quot_tot_rate' => $tot_rate,
						'quot_trans_rate' => $trans_rate,
						'quot_msg' => $q_msg,
						'quot_terms_cond' => $terms,
						'quot_name' => $quot_url,
						'quot_count' => $cnt,
						'quot_created' => $today,
						'quot_updated' => $today
					);

					$res= $this->Inquiry_model->insert_quot($data);

					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has sent a quotation for the enquiry of  ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);

				}
			}
			else{
				$this->session->set_flashdata('event_error','Already sent 10 quotations, can not send more.');
				redirect('Inquiry/vendor_accpted_enquirylist');
			}
			$this->session->set_flashdata('event_success','Quotation send Sucessfully.');
			redirect('Inquiry/vendor_accpted_enquirylist');
	}


	
	public function decline_enquiry()				//13 dec 2018 		//9 Jan 2019
	{
		$res_id= $_REQUEST['id'];
		$res= $this->Inquiry_model->notinterested_inq($res_id);
		if($res){
			$this->session->set_flashdata('event_success','This enquiry is closed for you.');
			redirect('Inquiry/vendor_enquirylist');
		}
	}

	public function get_po_details()					//19 Dec 2018
	{
		$enq_id= $this->input->post('enq_Id');
		$vendor = $_SESSION['userid'];
		//echo $enq_id;
		$data=$this->Inquiry_model->getPoDetails($enq_id,$vendor);
		echo json_encode($data);
	}

	public function getAccepted_po_details()					//20 Dec 2018
	{
		$enq_id= $this->input->post('enq_Id');
		$vendor = $_SESSION['userid'];
		//echo $enq_id;
		$data=$this->Inquiry_model->getaccepted_PoDetails($enq_id,$vendor);
		echo json_encode($data);
	}

/*	public function accept_PO()				//20 Dec 2018
	{
		$po_id= $_REQUEST['id'];
		$enq_id= $_REQUEST['enq_id'];
		
		$vendor = $_SESSION['userid'];

		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$res = $this->Inquiry_model->update_PO($po_id,$today);
		if($res){
			$res1 = $this->Inquiry_model->update_enq($enq_id,$today);
			$res2 = $this->Inquiry_model->update_vend($vendor,$enq_id,$today);
			if($res1)
			{
				$res3 = $this->Inquiry_model->close_Dealenq($enq_id,$vendor,$today);
				
				$this->session->set_flashdata('event_success','PO Accepted Sucessfully.');
				redirect('Inquiry/vendor_accpted_enquirylist');
			}
			else
			{
				$this->session->set_flashdata('event_error','Some error occurred.');
				redirect('Inquiry/vendor_accpted_enquirylist');
			}
		}
		else{
		
			$this->session->set_flashdata('event_error','Some error occurred.');
			redirect('Inquiry/vendor_accpted_enquirylist');
		}
		
	}*/

	public function accept_PO()				//updated 20,25 Dec 2018
	{
		$po_id= $_REQUEST['id'];
		$enq_id= $_REQUEST['enq_id'];
		
		$vendor = $_SESSION['userid'];

		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$res = $this->Inquiry_model->update_PO($po_id,$today);
		if($res){
			$res1 = $this->Inquiry_model->update_enq($enq_id,$today);
			$res2 = $this->Inquiry_model->update_vend($vendor,$enq_id,$today);
			if($res1)
			{
				$res3 = $this->Inquiry_model->close_Dealenq($enq_id,$vendor,$today);
				
					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has accepted your PO for the enquiry of  ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);
				
				$this->session->set_flashdata('event_success','PO Accepted Sucessfully.');
				redirect('Inquiry/vendor_deal_enquirylist');
			}
			else
			{
				$this->session->set_flashdata('event_error','Some error occurred.');
				redirect('Inquiry/vendor_accpted_enquirylist');
			}

		}
		else{
		
			$this->session->set_flashdata('event_error','Some error occurred.');
			redirect('Inquiry/vendor_accpted_enquirylist');
		}
		
	}

	/*public function upload_bill()					//20 dec 2018
	{
		$this->load->library('upload');
		if(isset($_POST['bill_upload'])){
			if($_FILES['bill']['tmp_name']!="")
						{
							$file_nm = $_FILES['bill']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['bill']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/bill/".$file_name;
							$bill="assets/uploads/vbusiness/bill/".$file_name;
							
							$bill_url=base_url().$bill;

							//$slug = str_replace(' ','-',$str);
							
							move_uploaded_file($file_tmp, $dest1);
					
						}

				$enq_id = $_POST['enq_id'];
				$userid = $_POST['user_id'];
				
				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

					$data= array(
						'bill_vendor_id' => $vendor,
						'bill_enq_id' => $enq_id,
						'bill_user_id' => $userid,
						'bill_name' => $bill_url,
						'bill_created' => $today,
						'bill_updated' => $today
					);

					$res= $this->Inquiry_model->insert_bill($data);
				}
			
			else{
				$this->session->set_flashdata('event_error','Error occurred while sending Bill');
				redirect('Inquiry/vendor_deal_enquirylist');
			}
			$this->session->set_flashdata('event_success','Bill send Sucessfully.');
			redirect('Inquiry/vendor_deal_enquirylist');
	}*/

	public function upload_bill()					//Updated 20,25 dec 2018
	{
		$this->load->library('upload');
		if(isset($_POST['bill_upload'])){
			if($_FILES['bill']['tmp_name']!="")
						{
							$file_nm = $_FILES['bill']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['bill']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/bill/".$file_name;
							$bill="assets/uploads/vbusiness/bill/".$file_name;
							
							$bill_url=base_url().$bill;

							//$slug = str_replace(' ','-',$str);
							
							move_uploaded_file($file_tmp, $dest1);
					
						}

				$enq_id = $_POST['enq_id'];
				$userid = $_POST['user_id'];
				
				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('d-m-Y H:i:s', time());

					$data= array(
						'bill_vendor_id' => $vendor,
						'bill_enq_id' => $enq_id,
						'bill_user_id' => $userid,
						'bill_name' => $bill_url,
						'bill_created' => $today,
						'bill_updated' => $today
					);

					$res= $this->Inquiry_model->insert_bill($data);

					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has sent an E-Way Bill for the enquiry of  ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);
				}
			
			else{
				$this->session->set_flashdata('event_error','Error occurred while sending Bill');
				redirect('Inquiry/vendor_deal_enquirylist');
			}
			$this->session->set_flashdata('event_success','Bill send Sucessfully.');
			redirect('Inquiry/vendor_deal_enquirylist');
	}

	public function get_bill_details()
	{
		$enq_id= $this->input->post('enq_Id');
		$v_id= $_SESSION['userid'];
		$user_id= $this->input->post('user_Id');

		//echo $enq_id;
		$data=$this->Inquiry_model->getBillDetails($enq_id,$v_id,$user_id);
		echo json_encode($data);
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
	public function assign_orderlist()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['uinquiry'] = $this->Inquiry_model->get_AllUserInquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/assign_orderlist',$data);	
		$this->load->view('admin/master/footer');
	}
	public function assign_orderlist_vendors()
	{
		$inqid = $this->uri->segment(3);
		$data['gallidata'] = $this->Inquiry_model->getAllInquiryData($inqid); 
		//$data['cstatus'] = $this->Inquiry_model->checkStautsActive(); 
		
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		//$data['uinquiry'] = $this->Inquiry_model->get_AllUserInquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='User Enquiry';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/assign_orderlist_vendors',$data);	
		$this->load->view('admin/master/footer');
	}
	public function assign_Inqueryto_Vendoer()
	{
		$id = $this->input->post('id');
		if ($id != '') {

			date_default_timezone_set('Asia/Kolkata'); # add your city to set local time zone
			$now = date('d-m-y H:i:s'); 
			$id = $this->input->post('id');
			$newid = explode(',',$id);
			$enq_id =$newid[0];
			$ven_id =$newid[1];
		
			$where = array(
				'res_enq_id' =>$enq_id , 
				'res_vend_id' =>$ven_id,
			);
			$data=array(
				
				'res_enq_status' => 'Accepted', 
				'res_enq_updated' => $now
			);	
		
			//$this->db->set('mail_send_time', $now); 
			$details=$this->Category_model->records_update('tbl_enq_vendor_response',$data, $where);
			$this->session->set_flashdata('event_success','Enquiry Completed Successfully.');
			echo json_encode($data);
			//print_r($data);
		}else{
			
		}
	}

	function vendor_Completed_enqlist()			//24 Dec 2018 
	{
		$vendor = $_SESSION['userid'];
		$data['ip']  = $_SERVER['REMOTE_ADDR'];
		$data['result'] = $this->Mvendor_model->get_vendor_details($vendor);
		$data['userenq'] = $this->Inquiry_model->get_user_comp_enqlist($vendor);
		$data['title']='User Enquiry List';
		$this->load->view('vendor/master/header');
		$this->load->view('vendor/master/left',$data);
		$this->load->view('vendor/vendor_completed_enqlist',$data);	
		$this->load->view('vendor/master/footer');
	}

	public function final_enq_Status()					//24,25 Dec 2018
														//14 Jan 2019
	{
		//$enq_id =  $this->uri->segment(3);
		$enq_id =  $_REQUEST['id'];
		$v_id = $_SESSION['userid'];
		
		date_default_timezone_set('Asia/Kolkata');
		$today = date('d-m-Y H:i:s', time());

		$this->Inquiry_model->change_Enq_status($enq_id,$v_id,$today);

				$enqDetails= $this->Inquiry_model->get_enq($enq_id,$v_id);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor".$enqDetails['0']->bis_name." has completed your enquiry for  ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);

		$this->session->set_flashdata('event_success','Enquiry Completed Successfully.');
		redirect("Inquiry/vendor_Completed_enqlist","refresh");

	}

	public function Inactive_Enq()						//Updated 24,25,26 Dec 2018
	{
		$res=$this->Inquiry_model->inactive_Enq();
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-m-d H:i:s', time());

		foreach ($res as $key) {

			if ((date('Y-m-d H:i:s',strtotime($key->enq_endDate))) <= $today) 
			{ 
				$enq_id=$key->enq_id;
				//echo 'small';
				//die();
				$result=$this->Inquiry_model->update_EndEnq($enq_id,$key->enq_endDate,$today);
				echo $result;
			}
		
		}
	}

	/*public function send_email($email,$text)			//25 Dec 2018
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
		$this->email->subject('MVENDOR RESPONSE');
		$this->email->message($text);
		$this->email->send();
		
		return 1;
	}*/
	
	public function get_enqbill_details()					//11 Jan 2019
	{
		$enq_id= $this->input->post('enq_Id');
		$v_id= $_SESSION['userid'];
		$user_id= $this->input->post('user_Id');

		//echo $enq_id;
		$data=$this->Inquiry_model->getEnqBillDetails($enq_id,$v_id,$user_id);
		echo json_encode($data);
	}
	
	public function add_feed_remark()					//14 Jan 2019
	{
		$enq_id= $this->input->post('e_id');
		$v_id= $_SESSION['userid'];
		$feed= $this->input->post('feed');
		$remark= $this->input->post('remark');
		$user_id= $this->input->post('u_id');
		
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-M-d H:i:s', time());

		$data =array(
			'fr_vend_id' => $v_id,
			'fr_user_id' => $user_id,
			'fr_enq_id' => $enq_id,
			'fr_feed_msg' => $feed,
			'fr_rem_msg' => $remark,
			'fr_created' => $today
		);
		//echo $enq_id;
		$data=$this->Inquiry_model->add_feed_remark($data);
		echo json_encode($data);
	}
	
	public function upload_chalan()						//11 Jan 2019
	{
		$this->load->library('upload');
		if(isset($_POST['chalan_upload'])){
			if($_FILES['chalan']['tmp_name']!="")
						{
							$file_nm = $_FILES['chalan']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['chalan']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/chalan/".$file_name;
							$chalan="assets/uploads/vbusiness/chalan/".$file_name;
							
							$chalan_url=base_url().$chalan;

							move_uploaded_file($file_tmp, $dest1);
					
						}

				$enq_id = $_POST['enq_id'];
				$userid = $_POST['user_id'];
				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('Y-m-d H:i:s', time());

					$data= array(
						'chalan_vend_id' => $vendor,
						'chalan_enq_id' => $enq_id,
						'chalan_user_id' => $userid,
						'chalan_name' => $chalan_url,
						'chalan_created' => $today
					);

					$res= $this->Inquiry_model->insert_chalan($data);

					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					$msg = "Vendor ".$enqDetails['0']->bis_name." has sent a Chalan for the enquiry of  ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);
				}
			
			else{
				$this->session->set_flashdata('event_error','Error occurred while sending Chalan');
				redirect('Inquiry/vendor_deal_enquirylist');
			}
			$this->session->set_flashdata('event_success','Chalan send Sucessfully.');
			redirect('Inquiry/vendor_deal_enquirylist');
	}
	
	public function get_chalan_details()				//11 Jan 2019
	{
		$enq_id= $this->input->post('enq_Id');
		$v_id= $_SESSION['userid'];
		$user_id= $this->input->post('user_Id');

		//echo $enq_id;
		$data=$this->Inquiry_model->getChalanDetails($enq_id,$v_id,$user_id);
		echo json_encode($data);
	}

	public function insert_bill()					
													//11 Jan 2019		//15 Jan 2019
	{	
		
		/*print_r($_POST);
		print_r($_FILES);
			die();*/
			$this->load->library('upload');
			if(isset($_POST['enq_bill_upload'])){

			if($_FILES['enq_bill']['tmp_name']!="")
						{
							$file_nm = $_FILES['enq_bill']['name'];
							$file_name = str_replace(' ','-',$file_nm);
										 
							$f_tmp =$_FILES['enq_bill']['tmp_name'];
							$file_tmp = str_replace(' ','-',$f_tmp);

							$dest1= "./assets/uploads/vbusiness/enq_bill/".$file_name;
							$enq_bill="assets/uploads/vbusiness/enq_bill/".$file_name;
							
							$enq_bill_url=base_url().$enq_bill;

							move_uploaded_file($file_tmp, $dest1);
					
						}
						else
						{
							$quot_url = '';
						}
				$enq_id = $_POST['enqId'];
				$userid = $_POST['userId'];
				$quot_id = $_POST['quotId'];
				$po_id = $_POST['poId'];
				//$quot_id= $_POST['quot_id'];
				$qty = $_POST['qty'];
				$unit = $_POST['unit'];
				$d_time = $_POST['d_time'];
				$rate = $_POST['rate'];
				$gst = $_POST['gst'];
				$tot_rate= $_POST['tot'];
				$trans_rate= $_POST['t_rate'];
				$cr_time = $_POST['cr_time'];
				$vendor= $_SESSION['userid'];
				
				date_default_timezone_set('Asia/Kolkata');
				$today = date('Y-M-d H:i:s', time());

					$data= array(
						'bill_vend_id' => $vendor,
						'bill_user_id' => $userid,
						'bill_enq_id' => $enq_id,
						'bill_quot_id' => $quot_id,
						'bill_po_id' => $po_id,
						'bill_qty' => $qty,
						'bill_deli_time' => $d_time,
						'bill_credit_time' => $cr_time,
						'bill_rate' => $rate,
						'bill_gst' => $gst,
						'bill_tot_rate' => $tot_rate,
						'bill_trans_rate' => $trans_rate,
						'bill_name' => $enq_bill_url,
						'bill_created' => $today
					);

					$res= $this->Inquiry_model->insert_enq_Bill($data);

					$enqDetails= $this->Inquiry_model->get_enq($enq_id,$vendor);

					$email = $enqDetails['0']->uemail;

					//$userid = $enqDetails['0']->user_id;

					$msg = "Vendor ".$enqDetails['0']->bis_name." has sent a Bill for the enquiry of ".$enqDetails['0']->sub_category_title.".";

					$this->send_email($email,$msg);

					$this->add_user_notification($userid,$msg);	

					$this->session->set_flashdata('event_success','Enquiry Bill Sent Successfully.');
					

					redirect("Inquiry/vendor_deal_enquirylist","refresh");


				}
			}
		// Notification functions
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

	public function add_user_notification($userid,$msg)				//15 Jan 2019
	{
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-M-d H:i:s', time());

		$data= array(
			'notification_user_id' => $userid,
			'notification_title' => $msg,
			'notification_c_date' => $today
		);
		$result=$this->User_model->add_notifications($data);

	}

	public function get_vendor_notifications()					//15 Jan 2019
	{
		$vid = $this->input->post('v_id');
		//echo $userid;
		$data=$this->Inquiry_model->getnotifications($vid);
		echo json_encode($data);
	}
	public function enquiry_count($enq_id) //24 jan 19
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['getAct'] = $this->Inquiry_model->get_Inq_Accepted($enq_id);
		$data['getUnAct'] = $this->Inquiry_model->get_Inq_UnAct($enq_id); 
		$data['getInAct'] = $this->Inquiry_model->get_InAct($enq_id); 
		$data['ActCout'] = $this->Inquiry_model->get_Inquery_Count($enq_id);
		$data['UnActCout'] = $this->Inquiry_model->get_Inquery_UnAccepted($enq_id);
		$data['AccpetCout'] = $this->Inquiry_model->get_Inquery_Accepted($enq_id);
		$data['uinquiry'] = $this->Inquiry_model->get_AllUserInquiry(); 
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Dashboard';	
		$title['title']='Inquiry Count';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/enquiry/enquiry_count',$data);	
		$this->load->view('admin/master/footer');
	}
		

}
