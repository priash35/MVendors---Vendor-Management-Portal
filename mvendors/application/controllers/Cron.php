<?php

class Cron extends CI_Controller 
{
	public function Inactive_Enq()						//Updated 24,25,26 Dec 2018
	{
		$this->load->model('Inquiry_model');
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
				//echo $result;
			}
			/*else{
				echo "greater";
			}*/
		
		}
	}

	public function send_payment_email()					//28 Dec 2018
	{
		//$userid = $_SESSION['userid'];
		$this->load->model('User_model');
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-m-d', time());
		//echo $today;
		$result = $this->User_model->get_details();
		//print_r($result);
		if(!empty($result)){

		foreach ($result as $value) {
			if($value->po_id !='' && $value->res_enq_status =='Deal')
			{
				$po= $value->po_id;
				echo $po_updated = (date('Y-m-d',strtotime($value->po_updated)));
				$d_time = $value->po_deli_time;

				$r_date =date('Y-m-d', strtotime($po_updated . '+ ' . $d_time . ' days'));
				
				if($r_date <= $today)
				{
					
					$email = $value->uemail;

					$msg = "This is a Payment Reminder, that you have payment due for the enquiry of ".$value->sub_category_title." to the vendor ".$value->bis_name;

					$this->send_email($email,$msg);
				}

				else{
				echo "greater";
			}
			}
		}
	}
	/*else{
		echo "no data";
	}*/
	}
	
	//Notification
	
	public function payment_reminder()					//15 Jan 2019 		//updated 16 Jan 2019
	{
		//$userid = $_SESSION['userid'];
		$this->load->model('User_model');
		$this->load->model('Inquiry_model');
		date_default_timezone_set('Asia/Kolkata');
		$today = date('Y-m-d', time());
		//echo $today;
		$result = $this->User_model->get_bill_details();
		//print_r($result);
		//die();
		if(!empty($result)){

		foreach ($result as $value) {
			if($value->bill_id !='' && ($value->res_enq_status =='Deal' || $value->res_enq_status =='Completed'))
			{
				$bill= $value->bill_id;
				$bill_created = (date('Y-m-d',strtotime($value->bill_created)));
				$cr_time = $value->bill_credit_time;

				$r_date =date('Y-m-d', strtotime($bill_created . '+ ' . $cr_time . ' days'));
				


				if($r_date <= $today)
				{
					$msg1 = "This is a Payment Reminder, that you have to collect payment for the enquiry of ".$value->sub_category_title." from the user ".$value->ufname." ".$value->ulname;	
					/*echo $msg1;
					die();*/
					$email = $value->uemail;
					$vid = $value->bill_vend_id;
					$uid = $value->bill_user_id;

					$msg = "This is a Payment Reminder, that you have payment due for the enquiry of ".$value->sub_category_title." to the vendor ".$value->bis_name;

					$this->send_email($email,$msg);

					$this->add_user_notification($uid,$msg);

					$this->add_vend_notification($vid,$msg1);

				}

				
			}
		}
	}
	
}
//Screen Notifications on 16 Jan 2019
public function add_vend_notification($vid,$msg)				//16 Jan 2019
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

	public function add_user_notification($userid,$msg)				//16 Jan 2019
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

	
	
	
	//Send Email Function

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
		$this->email->from('punegravity@gmail.com','Mvendors');
		$this->email->to($email); 
		$this->email->subject('Payment Reminder');
		$this->email->message($text);
		$this->email->send();
		
		

		 return 1;
	}		
}