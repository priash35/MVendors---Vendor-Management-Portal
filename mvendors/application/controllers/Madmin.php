<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Controller {
	


	function __construct() {
        parent::__construct();
		$this->load->model('Madmin_model');
		$this->load->model('Media_model');
		$this->load->model('Category_model');
		$this->load->model('Mvendor_model');
		$this->load->model('User_model');
		$this->load->model('Vendor_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
          $this->load->library('csvimport');

        if(!$this->session->userdata('userid'))
		{
			redirect(base_url().'Login');
		}
       
	}
	
	public function index()
	{
		$uid = $_SESSION['userid'];
		$data['vencount'] = $this->Madmin_model->countRow(); 
		$data['inqcount'] = $this->Madmin_model->countInquery(); 
		$data['usecount'] = $this->Madmin_model->countUsers();
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		//$result['ainfo']= $this->Madmin_model->GetAdminData($uid);
		$data['right'] = $result->arights;
		$data['title']='Dashboard';		
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left', $data);
		//$this->load->view('admin/subadmin/add_subadmin');
		$this->load->view('admin/index',$data);	
		$this->load->view('admin/master/footer');
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
	public function add_subadmin()
	{
		if(isset($_POST['btnsubmit']))
		{
			$data =  array
			(
				'afname'=>$_POST['afname'],
				'alname'=>$_POST['alname'],
				'aemail'=>$_POST['aemail'],
				'amobile'=>$_POST['amobile'],
				'apassword'=>$_POST['apassword']
			);
			$details=$this->Category_model->record_insert('tbl_admin',$data);
			$this->session->set_flashdata('event_success','Package Successfully Added.');
			
			//$this->Madmin_model->AddSubadmin($data);
			redirect(base_url().'Madmin/subadmin');
		}
	

			$data['title']='Sub Admin';
			$uid = $_SESSION['userid'];
			$result = $this->Madmin_model->get_rights($uid);
			$data['profile'] = $this->User_model->get_AdminProfile($uid); 
			$data['right'] = $result->arights;
			$this->load->view('admin/master/header');
			$this->load->view('admin/master/left',$data);
			$this->load->view('admin/subadmin/add_subadmin');	
			$this->load->view('admin/master/footer');
	}

	public function subadmin()
	{
		$data['subadmin']=$this->Madmin_model->SubAdmin();
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$title['title']='Users / Sub Admin';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/subadmin/subadmin_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function endusers()
	{
		$data['subadmin']=$this->Madmin_model->SubAdmin();
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$data['enduser']=$this->Madmin_model->endUser();
		$title['right'] = $result->arights;
		$title['title']='Users / End Users';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/users/enduser_list',$data);	
		$this->load->view('admin/master/footer');
	}
	public function makeUserInactive()
	{
		$id = $this->uri->segment(3);
		$where = array(
			'user_id' => $id, 
		);
    	$data=array(            		
			'ustatus' => 'INACTIVE'								
		);	 
		$insert_id=$this->Madmin_model->getActive('tbl_user',$data,$where);
		
		redirect(base_url().'Madmin/endusers');	
	}
	public function makeUserActive()
	{
		$id = $this->uri->segment(3);
		$where = array(
			'user_id' => $id, 
		);
    	$data=array(            		
			'ustatus' => 'ACTIVE'								
		);	 
		$insert_id=$this->Madmin_model->getInactive('tbl_user',$data,$where);
		
		redirect(base_url().'Madmin/endusers');
	}
	public function accessrights()
	{
		if (isset($_POST['btn_submit'])) 
		{
			$access_right=implode(',', $this->input->post('checkbox'));
			//print_r($access_right);
			//$all_pages =$this->Madmin_model->getParentPage($access_right);
			$admin_id= $_POST['admin_id'];
			
			$data=array(            							
				'arights' => $access_right							
			);
			
            $insert_id=$this->Madmin_model->assign_rights($data,$admin_id); 
            $details=$this->Madmin_model->Get_SubAdmin($admin_id); 
 
            if($insert_id){
            	$this->session->set_flashdata('message_success','Rights Allocated to '.$details[0]->first_name.' Successfully');
            	redirect(base_url().'madmin/subadmin');
        	}    	
		    	              
    	}
		$id = $this->uri->segment(3);
		$data['subadmin']=$this->Madmin_model->Get_SubAdmin($id);
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$title['title']='Sub Admin / Access Rights';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left', $title);
		$this->load->view('admin/accessrights', $data);	
		$this->load->view('admin/master/footer');
	}
	public function subadmin_publish()
	{
		$aid = $this->uri->segment(3);
		
    	$data=array(            		
			'astatus' => '0'								
		);	 

		$insert_id=$this->Madmin_model->subadminPublish($data,$aid);
		if($insert_id){
			    		
			$inserid=$this->Madmin_model->Get_SubAdmin($id);
			
			if($inserid){

				$to =  $inserid[0]->email_id;
				$subject = " Regarding Subadmin.";
				$message = "<html>
			 					<head>
			 						<title> Alert Mail </title>
		 						</head>
			 					<body>
		 							<b><p>Hi,</p></b>
			 							<p>You are Successfully Added For Subadmin</p><br>
			 					</body>
							</html>";
				// // Always set content-type when sending HTML email
							//$header = "From:M Vendors <info@mvendors.com> \r\n";
							$header = "From:M Vendors <prkadam2@gmail.com> \r\n";
           					//$header .= "Cc:info@mvendors.com \r\n";
					        $header .= "MIME-Version: 1.0\r\n";
					        $header .= "Content-type: text/html\r\n";
								
				$this->session->set_flashdata('message_success',' Successfully');
				redirect(base_url().'Madmin/subadmin');	

				
			}
			else
			{
				$this->session->set_flashdata('message_success',' Not send');
				redirect(base_url().'Madmin/subadmin');
			}
		}    
			
	}
	public function subadmin_makeinactive()
	{
		$aid = $this->uri->segment(3);
		
    	$data=array(            		
			'astatus' => '1'								
		);	 
		$insert_id=$this->Madmin_model->subadminInactive($data,$aid);
		
		redirect(base_url().'Madmin/subadmin');	
	}
	public function profile()
	{

		$uid = $_SESSION['userid'];
		
		$result = $this->Madmin_model->get_rights($uid);
		$data['profile'] = $this->User_model->get_AdminProfile($uid);
		$data['right'] = $result->arights;
		$data['title']='Profile';		
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left', $data);
		$this->load->view('admin/profile',$data);	
		$this->load->view('admin/master/footer');
	
	}
	public function email_recover()
	{
		$user_email = $this->input->get('user_email');
		$user_code = $this->input->get('user_code');

		$data=$this->Madmin_model->email_recover_verif($user_email,$user_code);

	   if($data)
	    {
	        $data['message'] = 'Success.';
	    }
	    else
	    {
	        $data['message'] = 'Not Valid User.';
	    }
	    $this->load->template('verify', $data);
	}

	function load_data()
 {
	  $result = $this->Media_model->select();
	  $output = '
	   <h3 align="center">Imported User Details from CSV File</h3>
	        <div class="table-responsive">
	         <table class="table table-bordered table-striped">
	          <tr>
	           <th>Sr. No</th>
	           <th>First Name</th>
	           <th>Last Name</th>
	           <th>Phone</th>
	           <th>Email Address</th>
	          </tr>
	  ';
	  $count = 0;
	  if($result->num_rows() > 0)
	  {
	   foreach($result->result() as $row)
	   {
	    $count = $count + 1;
	    $output .= '
	    <tr>
	     <td>'.$count.'</td>
	     <td>'.$row->vfname.'</td>
	     <td>'.$row->vemail.'</td>
	     <td>'.$row->vmobile.'</td>
	     <td>'.$row->vaddress.'</td>
	    </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '
	   <tr>
	       <td colspan="5" align="center">Data not Available</td>
	      </tr>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
 }

 function import()
 {
	  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	  foreach($file_data as $row)
	  {
	   $data[] = array(
	    'vfname' => $row["vfname"],
	    'vemail' => $row["vemail"],
	    'v_password' => $row["v_password"],
	    'vmobile' => $row["vmobile"],
	    'vgender' => $row["vgender"],
	    'vdob' => $row["vdob"],
	    'vaddress' => $row["vaddress"],
	  
	   );
	  }
	  $this->Media_model->insert($data);
 }

 public function changeOldAdminPass()
 {
 	if (isset($_POST['btn_submit'])) 
 	{
 		$admin_id = $_SESSION['userid'];
 		$oldpass = $this->input->post('oldpass');
 		$newpass = $this->input->get('newpass');
 		//$oldpass = $this->input->get('conpass');
 		$where1= array(
		        'admin_id'=> $admin_id,
				);
 		$data = array(
 			'apassword'=>$this->input->post('newpass'),
 		);
 		$res = $this->Madmin_model->change_OldAdmin_Pass('tbl_admin',$data,$where1);
 		$this->session->set_flashdata('event_success','Password Change Successfully .');
 	}
 }
 public function chekcOldAdminPass($oldpass)
 {

 }

 public function updateAdminPro()
 {
 	if (isset($_POST['btn_update'])) 
 	{

 		if($_FILES['admin_image']['name']!= ""){
    			$img_name='admin_image';
    			$img_path='admin';
    			$old_img = $this->input->post('old_admin_image');
	    		$admin_image=$this->Category_model->upload_image($img_name,$img_path,$old_img);
            }else{
            	$admin_image= $this->input->post('old_admin_image');
            } 

 		$where1= array(
		        'admin_id'=>$this->input->post('adid'),
				);

 		$data = array(

 			'afname'=>$this->input->post('fname'),
 			'apro_pic'=>$admin_image,
 			'adob'=>$this->input->post('dob'),
 			'agender'=>$this->input->post('gen'),
 			'aaddress'=>$this->input->post('add'),
 			'alname'=>$this->input->post('lname'),
 			'aemail'=>$this->input->post('email'),
 			'amobile'=>$this->input->post('mnumber'),

 		);

 		$res = $this->User_model->records_update('tbl_admin',$data,$where1);
 		$this->session->set_flashdata('event_success','Profile Update Successfully.');
 		redirect(base_url().'Madmin/profile');	

 	}

 }
 public function getUserEmail()
	{
		$id = $this->input->post('id');
		if ($id != '') {
			$data['email'] = $this->Madmin_model->getUserInfo($id);
			echo json_encode($data);
			
		}else{
			
		}
	}
	 public function getVendorEmail() // New Changes 11 Jan 2018
	{
		$id = $this->input->post('id');
		if ($id != '') {
			$data['email'] = $this->Madmin_model->get_Vendor_Email($id);
			echo json_encode($data);
			
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
		redirect(base_url().'madmin/endusers');
		
	}
	public function sendVemail() // new change 11 Jan 18
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
		redirect(base_url().'vendor');
		
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
	
		public function allUserData() // 14 Jan 18 Gs
	{
		$where =$this->uri->segment(3);
		$data['uinq'] = $this->User_model->get_User_Inq($where);
		//$data['acceinq'] = $this->User_model->get_Acce_Inq($where);
		$data['uconfinq'] = $this->User_model->get_User_Conf_Inq($where);
		$data['ucompeteinq'] = $this->User_model->get_User_Compete_Inq($where);
		$data['uinfo'] = $this->User_model->get_User_Info($where);

		
		/*$data['venbuss'] = $this->User_model->get_Buss_Inq($where);*/
		
		$data['country'] = $this->Mvendor_model->record_list('tbl_country');
		$data['states'] = $this->Mvendor_model->record_list('tbl_states');
		$data['city'] = $this->Mvendor_model->record_list('tbl_city');

		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$data['right'] = $result->arights;
		$data['vendors'] = $this->Vendor_model->get_vendors();
		$data['title']='Vendors Data';
		$data['profile'] = $this->User_model->get_AdminProfile($uid); 
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$data);
		$this->load->view('admin/users/all_user_list',$data);	
		$this->load->view('admin/master/footer');
	}

}
