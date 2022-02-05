<?php

class Login extends CI_Controller
{
	function __construct() {
        parent::__construct();
		$this->load->model('Login_model');
		
	}

	public function index()
	{
		$this->load->view('admin/login');
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run()== TRUE) 
		{			
			$username = $_POST['username'];
			$password = $_POST['password'];

			//check data in database
			$this->db->select('*');
			$this->db->from('tbl_admin');
			$this->db->where(array('aemail' => $username, 'apassword' => $password));
			$query = $this->db->get();

			$user = $query->result();
			
			if(!empty($user))
			{			
				foreach($user as $row)
				{				
					$uname= $row->afname;
					$uid = $row->admin_id;
					$rights = $row->arights;
				}
				/*echo $rights;
				die();*/
				$this->session->set_flashdata("success","You Login successfully");
				//set session variables 
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['username'] = $uname;
				$_SESSION['userid'] = $uid;
				$_SESSION['rights'] = $rights;
				//redirect to dashboard page				
				redirect("Madmin/index","refresh");						
			
			}//empty if end
			else
			{
				$this->session->set_flashdata("error","Invaled User Please Register");
				redirect("Login/index","refresh");
			}
		}	
	}

	public function register()
	{	
		date_default_timezone_set("Asia/Kolkata");
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);

		if(isset($_POST['register']))
		{
			$data= array(
				'afname' => $_POST['fname'],
				'alname' => $_POST['lname'],
				'aemail' => $_POST['email'],
				'apassword' => $_POST['pass'],
				'amobile' => $_POST['mobile'],
				'acreated_date' => $created_date,
				'aupdated_date' => $created_date
			);

			$this->Login_model->register_admin($data);
		}
		redirect("Login/index","refresh");
	}
	public function logout()
	{
		$this->session->unset_userdata('user_logged');
		session_destroy();
		redirect("Login/index","refresh");
	}
}

?>