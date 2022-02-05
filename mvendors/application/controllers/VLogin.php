<?php

class VLogin extends CI_Controller
{
	function __construct() {
        parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('User_model');
		$this->load->model('Mvendor_model');
		
		
		
	}

	public function index()
	{
		
		if (isset($_POST['login'])){ 
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if ($this->form_validation->run()== TRUE) 
		{			
			$username = $_POST['username'];
			$password = $_POST['password'];

			//check data in database
			$this->db->select('*');
			$this->db->from('tbl_vendor');
			$this->db->where(array('vemail' => $username, 'v_password' => $password));
			$query = $this->db->get();

			$user = $query->result();
			
			if(!empty($user))
			{			
				foreach($user as $row)
				{				
					$uname= $row->vfname;
					$uid = $row->vendor_id;
					//$rights = $row->vrights;
				}
				/*echo $rights;
				die();*/
				$this->session->set_flashdata("success","You Login successfully");
				//set session variables 
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['username'] = $uname;
				$_SESSION['userid'] = $uid;
				//$_SESSION['rights'] = $rights;
				//redirect to dashboard page				
				redirect("Mvendor/index","refresh");						
			
			}//empty if end
			else
			{
				$this->session->set_flashdata("error","Invalid user");
				redirect("VLogin/index","refresh");
			}
			}
		}
		$this->load->view('vendor/login');
	}

	public function register()
	{	
		date_default_timezone_set("Asia/Kolkata");
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);

		if(isset($_POST['register']))
		{


			$where=array( 
	           'vmobile'=>$this->input->post('mobile')
		       );
			$verify_email=$this->User_model->record_count('tbl_vendor',$where);

			$whereemail=array( 
	           'vemail'=>$this->input->post('email')
		       );
		
			$verify_email_id=$this->User_model->record_count('tbl_vendor',$whereemail);
			if (!$verify_email_id) {
					if (!$verify_email) {
					$data= array(
					'vfname' => $_POST['fname'],
					'vlname' => $_POST['lname'],
					'vemail' => $_POST['email'],
					'vreference' => $_POST['vreference'],
					'v_password' => $_POST['pass'],
					'vmobile' => $_POST['mobile'],
					'vcreated_date' => $created_date,
					'vupdated_date' => $created_date
					);
					$this->session->set_flashdata("success","Vendor Register Successfully");
					$this->Login_model->register_data($data);
				}else
				{
					$this->session->set_flashdata("error","mobile Number All Ready Register");
				}
			}else
			{
				$this->session->set_flashdata("error","Email All Ready Register");
			}
			
			
		}
		redirect("VLogin/index","refresh");
	}
	public function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('user_logged');
		session_destroy();
		redirect("User/index","refresh");
	}
		public function get_state()
	{
		$cid = $this->input->post('id');
		$where = array(
			'country_id' => $cid
		);
		$data = $this->Mvendor_model->record_list('tbl_states', $where);

		$output = '';
		//$output = '<option>Select State</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->id.'">'.$row->state_name.'</option>';
		}
		echo $output;
	}
	public function get_city()
	{
		$cid = $this->input->post('id');
		$where = array(
			'state_id' => $cid
		);
		$data = $this->Mvendor_model->record_list('tbl_city', $where);
		
		$output = '';
		//$output = '<option>Select City</option>';
		foreach($data as $row){
			$output.= '<option value="'.$row->id.'">'.$row->city_name.'</option>';
		}
		echo $output;
	}
}

?>