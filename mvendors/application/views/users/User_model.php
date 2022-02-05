<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model  extends CI_Model {

	public function get_UserInquiry($uid)		//updated on 10 Dec 2018
	{
		/*$this->db->select('*');
        $this->db->from('tbl_inquiry');
        $this->db->where('inq_user_id',$uid);
        return $this->db->get()->result();*/

        $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        //$this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id','left');

        $this->db->where('t1.enq_user_id',$uid);
        $this->db->order_by('t1.enq_id','DESC');
       // $this->db->where('t1.enq_status','Active');
        return $this->db->get()->result();
	}

	public function get_vendors_list($enq_id) 		//updated on 10,31 Dec 2018
	{
		$this->db->select('*');
        $this->db->from('tbl_enq_vendor_response t1');
       	$this->db->join('tbl_vbusiness_details t2','t2.bis_vendor_id = t1.res_vend_id');
       	$this->db->join('tbl_enq_master t3','t3.enq_id=t1.res_enq_id');
       	$this->db->join('tbl_sub_category t4','t4.sub_category_id = t3.enq_pro_subcat_id OR t4.sub_category_id = t3.enq_ser_subcat_id','left');
        $this->db->where('t1.res_enq_id',$enq_id);
        $this->db->group_start();
        $this->db->where('t1.res_enq_status','Accepted');
        $this->db->or_where('t1.res_enq_status','Deal');
        $this->db->or_where('t1.res_enq_status','Completed');
        $this->db->group_end();
        $this->db->order_by('res_enq_updated','DESC');

        return $this->db->get()->result();
	}

	function get_quot_list($enq_id,$uid)		//updated on 12,27 Dec 2018
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_quot t1');
		$this->db->join('tbl_vbusiness_details t2', 't2.bis_vendor_id = t1.quot_vend_id');
		
		$this->db->join('tbl_enq_master t5', 't5.enq_id = t1.quot_enq_id');
		$this->db->join('tbl_sub_category t3', 't3.sub_category_id = t5.enq_pro_subcat_id OR t3.sub_category_id = t5.enq_ser_subcat_id','left');
		//$this->db->join('tbl_category t4', 't4.category_id = t5.cat_id');

		$this->db->where('t1.quot_enq_id',$enq_id);
		$this->db->where('t1.quot_user_id',$uid);
		//$this->db->order_by("t1.quot_id", "desc");
		$this->db->order_by('t1.quot_status','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_UserProfile($uid)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id',$uid);
        return $this->db->get()->result();
    }
	 public function get_AdminProfile($uid)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$uid);
        return $this->db->get()->result();
    }
    public function get_vendors()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        return $this->db->get()->result();
    }


    public function get_Slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('slider_status','ACTIVE');
        return $this->db->get()->result();
    }
    

    public function record_insert($tbl_name,$data_array)
	{
		$insert_id=$this->db->insert($tbl_name,$data_array);
		if($insert_id)
		{
			return $insert_id;
		}
		return false;
	}

    public function record_count($tbl_name,$where1=null)
	{		
		if($where1!=null)
		{
			$this->db->where($where1);
		}
		
		$count=$this->db->get($tbl_name)->num_rows();
		if($count)
		{
			return $count;
		} 
		return false;	
		
	}

	public function record_list($tbl_name,$where1=null)
	{
		if($where1!=null)
		{
			$this->db->where($where1);
		}
		
		$details=$this->db->get($tbl_name)->result();

		if($details)
		{
			return $details;
		} 
		return false;			
	}

	public function records_update($tbl_name,$data,$where1)
	{
			$this->db->where($where1);
			$details=$this->db->update($tbl_name,$data);
				
			if($details)
			{
				return $details;
			} 
			return false;			
	}


	public function send_message($web_url,$mob,$msg)
	{
	 		
	 	$url = $web_url.http_build_query(
		array(
					'username'=> "CONSTRO",'password' => "CONSTRO",
					'mob' => $mob,'msg' => $msg,'sender' => "MVNDRS"
				));	
	 	 echo  $url;
		$ch = curl_init();					

		if($ch)
		{					
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			$result = curl_exec($ch );
		
			curl_close( $ch );
			return true;
		}
		else
		{
			return true;
		}
	}
	public function login($name,$pass) {
		$where = array('uemail' => $name, 'u_password' => $pass);
		//$data = array('uemail' => 'rutuja@gmail.com', 'u_password' => 'raj');
		$this->db->select('*');
		$this->db->FROM('tbl_user');
		$this->db->where($where);
		//$this->db->limit(1);
		//$this->db->where('uemail',$name);
		$query = $this->db->get();
		return $query->result();
		/*if ($query='') {
		return true;
		} else {
		return false;
		}*/
	}
	function get_live_items($search_data) {
 
		$this->db->group_start();
		$this->db->like('category_title', $search_data);
		//$this->db->or_like('trip_desc', $search_data);
		//$this->db->or_like('category_title', $search_data);
		$this->db->group_end();
		$this->db->limit(10);
		$this->db->order_by("category_id", 'desc');
		$query = $this->db->get('tbl_category');
		//print_r($query)
		return $query->result();
	}
	function get_vbusiness($vindor_id)
	{

	//$query = $this->db->query('select * from tbl_vbusiness_details where find_in_set('.$vindor_id.',bis_category)		');

		/*$this->db->select('*');
		$this->db->from('tbl_vbusiness_details');
		$this->db->where('bis_category',$vindor_id);
		$query = $this->db->get();*/
		//return $query->result();
$query = $this->db->query('SELECT * FROM tbl_vbusiness_details INNER JOIN tbl_category ON tbl_vbusiness_details.bis_category=tbl_category.category_id WHERE find_in_set('.$vindor_id.',bis_category)');
return $query->result();


		
	}

	function get_vbusdetails($vin_id)
	{
		$where = array('bis_det_id' => $vin_id);
		$this->db->select('*');
		$this->db->from('tbl_vbusiness_details');
		$this->db->join('tbl_category', 'tbl_category.category_id = tbl_vbusiness_details.bis_category');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result();
	}
	function Single_Vdetails($slug = FALSE,$subcatid)						//updated 12 Dec 2018		
	{
		if ($slug === FALSE)
        {			
			$this->db->select('*');
			$this->db->from('tbl_vbusiness_details tvd');
			$this->db->join('tbl_vendors_cat_subcat tvcs', 'tvcs.vend_id = tvd.bis_vendor_id ', 'left');
			$this->db->join('tbl_sub_category tsc', 'tsc.sub_category_id = tvcs.subcat_id', 'left');
			$this->db->join('tbl_category tc', 'tc.category_id = tvcs.cat_id','left' );
			$this->db->group_by('tvd.bis_vendor_id'); 
			//$this->db->join('tbl_category', 'tbl_category.category_id = tbl_vbusiness_details.bis_category');
			//$this->db->join('tbl_sub_category', 'tbl_sub_category.sub_category_id = tbl_vbusiness_details.bis_sub_category');

			
			$this->db->where('bis_slug', $slug);
			$this->db->where('tsc.sub_category_id', $subcatid);
			$this->db->where('ven_stauts','ACTIVE');
			$query = $this->db->get();
			return $query->result();
		}
			$this->db->select('*');
			$this->db->from('tbl_vbusiness_details tvd');
			$this->db->join('tbl_vendors_cat_subcat tvcs', 'tvcs.vend_id = tvd.bis_vendor_id ','left');
			$this->db->join('tbl_sub_category tsc', 'tsc.sub_category_id = tvcs.subcat_id','left');
			$this->db->join('tbl_category tc', 'tc.category_id = tvcs.cat_id','left' );
			$this->db->group_by('tvd.bis_vendor_id'); 

			//$this->db->join('tbl_category', 'tbl_category.category_id = tbl_vbusiness_details.bis_category');
			//$this->db->join('tbl_sub_category', 'tbl_sub_category.sub_category_id = tbl_vbusiness_details.bis_sub_category');

			$this->db->where('bis_slug', $slug);
			$this->db->where('tsc.sub_category_id', $subcatid);
			$this->db->where('ven_stauts','ACTIVE');

			$query = $this->db->get();
			return $query->result();
	}

	/*function get_sub_cat_detials($sub_cat_id)
	{
		//$where = array('bis_sub_category' => $sub_cat_id);
		$this->db->select('*');
		$this->db->from('tbl_vbusiness_details');
		$this->db->join('tbl_sub_category', 'tbl_sub_category.sub_category_id = tbl_vbusiness_details.bis_sub_category');
		$this->db->join('tbl_category', 'tbl_category.category_id = tbl_vbusiness_details.bis_category');
		$this->db->where('bis_sub_category',$sub_cat_id);
		$query = $this->db->get();
		return $query->result();
	}*/
	function get_sub_cat_detials($sub_cat_id)	//updated on 6 dec 2018	//update 27 on dec
	{
		//$where = array('bis_sub_category' => $sub_cat_id);
		$this->db->select('*');
		$this->db->from('tbl_vendors_cat_subcat t1');
		$this->db->join('tbl_vbusiness_details t2', 't2.bis_vendor_id = t1.vend_id');
		$this->db->join('tbl_sub_category t3', 't3.sub_category_id = t1.subcat_id');
		$this->db->join('tbl_category t4', 't4.category_id = t1.cat_id');
		$this->db->where('t1.subcat_id',$sub_cat_id);
		$this->db->where('t1.ven_stauts','ACTIVE');
		$query = $this->db->get();
		return $query->result();
	}
	function get_allcategorylist($cat_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendors_cat_subcat t1');
		$this->db->join('tbl_vbusiness_details t2', 't2.bis_vendor_id = t1.vend_id');
		//$this->db->join('tbl_sub_category t3', 't3.sub_category_id = t1.subcat_id');
		$this->db->join('tbl_category t4', 't4.category_id = t1.cat_id');
		$this->db->where('t1.cat_id',$cat_id);
		$this->db->group_by('t2.bis_vendor_id');
		$query = $this->db->get();
		return $query->result();
	}

	function get_Banner_list()
	{
		$this->db->select('*');
		$this->db->from('tbl_banner');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_VendInquiry_details($quot_id) 			//updated 19 dec 2018
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor_quot t1');
		$this->db->join('tbl_enq_master t2','t2.enq_id=t1.quot_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
		$this->db->where('t1.quot_id',$quot_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getPoDetails($quot_id,$user)    //19 ,27 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_user_po t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.po_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.po_quot_id',$quot_id);
        $this->db->where('t1.po_user_id',$user);
        $this->db->order_by('t1.po_count','DESC');
        return $this->db->get()->result();
     }

    public function get_ConfInquiry_details($uid)			//21,24,27,31 Dec 2018
     {
     	$this->db->select('*');
     	$this->db->from('tbl_enq_master t1');
     	$this->db->join('tbl_sub_category t2','t2.sub_category_id = t1.enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
     	//$this->db->join('tbl_enq_vendor_response t3','t3.res_enq_id = t1.enq_id AND t3.res_enq_status = "Deal"');
     	$this->db->join('tbl_enq_vendor_response t3','t3.res_enq_id = t1.enq_id');
     	$this->db->join('tbl_vendor_quot t4','t4.quot_enq_id = t1.enq_id AND t4.quot_user_id = t1.enq_user_id');
     	$this->db->join('tbl_user_po t5','t5.po_enq_id = t1.enq_id AND t5.po_user_id = t1.enq_user_id AND t5.po_quot_status = "Accepted"');
     	$this->db->join('tbl_vbusiness_details t6','t6.bis_vendor_id = t3.res_vend_id');
     	$this->db->join('tbl_eway_bill t7','t7.bill_vendor_id= t3.res_vend_id AND t7.bill_user_id = t1.enq_user_id AND t7.bill_enq_id = t1.enq_id','left');

     	
     	$this->db->where('t1.enq_user_id',$uid);
     	$this->db->where('t1.enq_status','Deal');
     	$this->db->group_start();
     	$this->db->where('t3.res_enq_status','Deal');
     	$this->db->or_where('t3.res_enq_status','Completed');
     	$this->db->group_end();
     	$this->db->group_by('t1.enq_id');
        $this->db->order_by('t1.enq_created','DESC');
        
        return $this->db->get()->result();
     }


     public function getaccepted_PoDetails($enq_id,$user_Id,$vid)    //21 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_user_po t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.po_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.po_enq_id',$enq_id);
        //$this->db->where('t1.po_vend_id',$v_id);
        $this->db->where('t1.po_user_id',$user_Id);

        $this->db->where('t1.po_quot_status','Accepted');
        $this->db->order_by('t1.po_count','DESC');
        return $this->db->get()->result();
     }

     public function get_CompletedEnq_details($uid)			//22,27,31 Dec 2018
     {
     	$this->db->select('*');
     	$this->db->from('tbl_enq_master t1');
     	$this->db->join('tbl_sub_category t2','t2.sub_category_id = t1.enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id');
     	$this->db->join('tbl_enq_vendor_response t3','t3.res_enq_id = t1.enq_id');
     	$this->db->join('tbl_vendor_quot t4','t4.quot_enq_id = t1.enq_id AND t4.quot_user_id = t1.enq_user_id');
     	$this->db->join('tbl_user_po t5','t5.po_enq_id = t1.enq_id AND t5.po_user_id = t1.enq_user_id');
     	$this->db->join('tbl_vbusiness_details t6','t6.bis_vendor_id = t3.res_vend_id');
     	$this->db->join('tbl_eway_bill t7','t7.bill_vendor_id= t3.res_vend_id AND t7.bill_user_id = t1.enq_user_id AND t7.bill_enq_id = t1.enq_id','left');

     	
     	$this->db->where('t1.enq_user_id',$uid);
     	$this->db->where('t1.enq_status','Completed');
     	$this->db->group_start();
     	$this->db->where('t3.res_enq_status','Deal');
     	$this->db->or_where('t3.res_enq_status','Completed');
     	$this->db->group_end();
     	$this->db->where('t5.po_quot_status','Accepted');
     	
     	
        $this->db->order_by('t1.enq_created','DESC');
        
        return $this->db->get()->result();
     }

     public function change_Enq_status($enq_id,$today)			//24 Dec 2018
     {
     	$this->db->set('enq_status','Completed');
        $this->db->set('enq_udated',$today);
        $this->db->where('enq_id',$enq_id);
        return $res = $this->db->update('tbl_enq_master');
     }
     
     public function select_quot($quot_id,$today)			//27 Dec 2018
     {
     	$this->db->set('quot_status','Selected');
        $this->db->set('quot_updated',$today);
        $this->db->where('quot_id',$quot_id);
        return $res = $this->db->update('tbl_vendor_quot');
     }

     public function Deselect_quot($quot_id,$today)			//27 Dec 2018
     {
     	$this->db->set('quot_status','Active');
        $this->db->set('quot_updated',$today);
        $this->db->where('quot_id',$quot_id);
        return $res = $this->db->update('tbl_vendor_quot');
     }
     
     public function get_details()			//28 Dec 2018
     {
     	
     	$this->db->select('*');
     	$this->db->from('tbl_enq_vendor_response t1');
     	$this->db->join('tbl_enq_master t2','t2.enq_id= t1.res_enq_id');
     	$this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id');
     	$this->db->join('tbl_user t4','t4.user_id = t2.enq_user_id');
     	$this->db->join('tbl_vbusiness_details t5','t5.bis_vendor_id = t1.res_vend_id');
     	$this->db->join('tbl_user_po t6','t6.po_enq_id= t2.enq_id AND t6.po_user_id = t4.user_id AND t6.po_vend_id = t1.res_vend_id ','left');

     	$this->db->where('t1.res_enq_status','Deal');
     	return $this->db->get()->result();

     }

}
