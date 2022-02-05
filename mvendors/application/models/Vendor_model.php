<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_model  extends CI_Model {

    public function get_vendors()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor t1');
        //$this->db->join('tbl_vbusiness_details t2','t2.bis_vendor_id = t1.vendor_id');
        $this->db->order_by('t1.vendor_id','desc');
        return $this->db->get()->result();
    }
    public function get_vcategory($uid)
    {
    	$this->db->select('bis_category');
        $this->db->from('tbl_vbusiness_details');
        //$this->db->jion('tbl_category', 'tbl_category.category_id = tbl_vbusiness_details.bis_category' );
        $this->db->where("bis_vendor_id",$uid);
       // return $this->db->get()->result();
        $variable = $this->db->get()->result();
     
     //return $id= explode(" ",$variable); 

		//$array =  explode(',', $variable);

		foreach($variable as $key => $value) {
			$array =  explode(',', $value->bis_category);
		  	$this->db->select('*');
	        $this->db->from('tbl_category');
	        $this->db->where_in('category_id', $array);
	        return $this->db->get()->result();
		}
        

       // return $id = array('1', '2', '3');

        	/*$this->db->select('*');
	        $this->db->from('tbl_category');
	        $this->db->where_in('category_id', $id); */
	         //$this->db->where_in('t.sub_cat_id', $cid); 
	        //return $this->db->get()->result();


    }
    public function get_vsubcategory($uid)
    {
    	$this->db->select('bis_sub_category');
        $this->db->from('tbl_vbusiness_details');
        $this->db->where("bis_vendor_id",$uid);
        $vsub = $this->db->get()->result();
        foreach($vsub as $key => $value) {
			$array =  explode(',', $value->bis_sub_category);
		  	$this->db->select('*');
	        $this->db->from('tbl_sub_category');
	        $this->db->where_in('sub_category_id', $array);
	        return $this->db->get()->result();
		}
   }

   public function get_vbrand($uid)
   {
   		/*$this->db->select('bis_brand');
        $this->db->from('tbl_vbusiness_details');
        $this->db->where("bis_vendor_id",$uid);
	   	$vband = $this->db->get()->result();

        foreach($vband as $key => $value) {
			 $array =  explode(',', $value->bis_brand);
		  	$this->db->select('*');
	        $this->db->from('tbl_brand');
	        $this->db->where_in('brand_id', $array);
	        return $this->db->get()->result();
		    }*/

        $this->db->select('*');
        $this->db->from('tbl_vendors_subcat_brand tvsb');
        $this->db->join('tbl_brand tbr','tbr.brand_id = tvsb.brand_id');
        $this->db->where("tvsb.vendor_id",$uid);
        return $this->db->get()->result();
   }

   public function getAll_Vendoer_Details($id) // Get All Vendor List 27_dec_18
   {
        $this->db->select('*');
        $this->db->from('tbl_vendor tve');
        $this->db->join('tbl_vbusiness_details tvbd','tvbd.bis_vendor_id = tve.vendor_id');
        $this->db->where("tve.vendor_id",$id);
        return $this->db->get()->row();
   }

    public function getAll_UserDetials($id) // Get All User List 27_dec_18
   {
        $this->db->select('*');
        $this->db->from('tbl_user tve');
        //$this->db->join('tbl_vbusiness_details tvbd','tvbd.bis_vendor_id = tve.vendor_id');
        $this->db->where("tve.user_id",$id);
        return $this->db->get()->row();
   }
     public function get_Vnote_Data($vid)
   {
      $this->db->select('*');
      $this->db->from('tbl_vendor_note');
      $data = array('vvan_id' => $vid);
      $this->db->where($data);
      return $query=$this->db->get()->result();
    }
    public function get_Unote_Data($id)
    {
      $this->db->select('*');
      $this->db->from('tbl_user_note');
      $data = array('user_id' => $id);
      $this->db->where($data);
      return $query=$this->db->get()->result();
    }
      public function get_Act_Inq($id)
    {
      $this->db->select('*'); 
      $this->db->from('tbl_enq_vendor_response t1');
      $this->db->join('tbl_enq_master t2', 't2.enq_id = t1.res_enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
      //$data = array('tevr.res_vend_id' => $id,'tevr.res_enq_status' => 'Active');
      $this->db->where('t1.res_enq_status','Active');
     $this->db->where('t1.res_vend_id',$id);
   
      //$this->db->where($data);
      return $query=$this->db->get()->result();
    }

     public function get_Acce_Inq($id)
    {
       $this->db->select('*'); 
      $this->db->from('tbl_enq_vendor_response t1');
      $this->db->join('tbl_enq_master t2', 't2.enq_id = t1.res_enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
      $this->db->where('t1.res_enq_status','Accepted');
     $this->db->where('t1.res_vend_id',$id);
      return $query=$this->db->get()->result();
    }
     public function get_Conf_Inq($id)
    {
       $this->db->select('*'); 
      $this->db->from('tbl_enq_vendor_response t1');
      $this->db->join('tbl_enq_master t2', 't2.enq_id = t1.res_enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
      $this->db->where('t1.res_enq_status','Deal');
     $this->db->where('t1.res_vend_id',$id);
      return $query=$this->db->get()->result();
    }
     public function get_Compete_Inq($id)
    {
       $this->db->select('*'); 
      $this->db->from('tbl_enq_vendor_response t1');
      $this->db->join('tbl_enq_master t2', 't2.enq_id = t1.res_enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
      $this->db->where('t1.res_enq_status','Completed');
     $this->db->where('t1.res_vend_id',$id);
      return $query=$this->db->get()->result();
    }
    public function get_Ven_Inq($id)
    {
      $this->db->select('*'); 
      $this->db->from('tbl_vendor');
      $this->db->where('vendor_id',$id);
      return $query=$this->db->get()->result();
    }

    public function get_Buss_Inq($id)
    {
      $this->db->select('*'); 
      $this->db->from('tbl_vbusiness_details t1');
      $this->db->join('tbl_country t2', 't2.id= t1.bis_country');
      $this->db->join('tbl_states t3','t3.id= t1.bis_state');
      $this->db->join('tbl_city t4','t4.id= t1.bis_city');
      $this->db->where('t1.bis_vendor_id',$id);
      return $query=$this->db->get()->result();
    }
    
     public function get_VEmail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_enq_master tem');
        $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id');
        $data = array('enq_id' => $id);
        $this->db->where($data);
        return $query=$this->db->get()->result();
    }

}
