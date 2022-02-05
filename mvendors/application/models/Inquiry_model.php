<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry_model  extends CI_Model {

    public function get_videos()
    {
        $this->db->select('*');
        $this->db->from('tbl_video');
        return $this->db->get()->result();
    }
   
    public function get_Inquiry($data)        //7 dec 2018
    {
    	 $details = $this->db->insert('tbl_enq_master', $data);
        $enqID= $this->db->insert_id(); 
         //if($details)
          if($enqID)
            {
                return $enqID;
            } 
            return false;    
    }
   
    public function get_InquiryDetails()        //8 dec 2018
    {
      $this->db->select('*');
      $this->db->from('tbl_inquiry');
      $this->db->order_by("inquiry_id","desc"); 
      return $this->db->get()->result();
    }
     public function get_user_enqlist($vendor)      //updated 10,25 Dec 2018
    {
      $this->db->select('*');
      $this->db->from('tbl_enq_master t1');
      $this->db->join('tbl_enq_vendor_response t2', 't2.res_enq_id = t1.enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t1. enq_pro_subcat_id OR t3.sub_category_id = t1.enq_ser_subcat_id','left');
      $this->db->join('tbl_user t4','t4.user_id= t1.enq_user_id');
      //$this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
      $this->db->where('t2.res_vend_id',$vendor);
      $this->db->group_start();
      $this->db->where('t2.res_enq_status','Active');

      //$this->db->or_where('t2.res_enq_status','Accepted');
      $this->db->group_end();
      $this->db->order_by('t1.enq_id','DESC');

      return $this->db->get()->result();
    }

    public function get_user_accepted_enqlist($vendor)      //updated 18 Dec 2018     //15 Jan 2019
    {
      $this->db->select('*');
      $this->db->from('tbl_enq_master t1');
      $this->db->join('tbl_enq_vendor_response t2', 't2.res_enq_id = t1.enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t1. enq_pro_subcat_id OR t3.sub_category_id = t1.enq_ser_subcat_id','left');
      $this->db->join('tbl_user t4','t4.user_id= t1.enq_user_id','left');
      $this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
      $this->db->join('tbl_city t6','t6.id=t1.enq_city','left');
      $this->db->group_by('t1.enq_id');
      $this->db->where('t2.res_vend_id',$vendor);
      $this->db->group_start();
      //$this->db->where('t2.res_enq_assigned','NotAssigned');
      $this->db->or_where('t2.res_enq_status','Accepted');
      $this->db->group_end();
      $this->db->order_by('t2.res_enq_assigned','ASC');
      return $this->db->get()->result();
    }

    public function get_user_assigned_enqlist($vendor)          //15 Jan 2019
    {
      $this->db->select('*');
      $this->db->from('tbl_enq_master t1');
      $this->db->join('tbl_enq_vendor_response t2', 't2.res_enq_id = t1.enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t1. enq_pro_subcat_id OR t3.sub_category_id = t1.enq_ser_subcat_id','left');
      $this->db->join('tbl_user t4','t4.user_id= t1.enq_user_id','left');
      $this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
      $this->db->join('tbl_city t6','t6.id=t1.enq_city','left');
      $this->db->group_by('t1.enq_id');
      $this->db->where('t2.res_vend_id',$vendor);
      $this->db->group_start();
      $this->db->where('t2.res_enq_assigned','Assigned');
      $this->db->or_where('t2.res_enq_status','Accepted');
      $this->db->group_end();
      //$this->db->order_by('t2.res_enq_assigned','ASC');
      return $this->db->get()->result();
    }
     public function insert_po($data)                     //19 Dec 2018
     {
       $this->db->insert('tbl_user_po',$data);
     }

   public function get_user_deal_enqlist($vendor)      //20 Dec 2018     //updated 11, 16 Jan 2019
    {
      $this->db->select('*');
      $this->db->from('tbl_enq_master t1');
      $this->db->join('tbl_enq_vendor_response t2', 't2.res_enq_id = t1.enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t1. enq_pro_subcat_id OR t3.sub_category_id = t1.enq_ser_subcat_id','left');
      $this->db->join('tbl_user t4','t4.user_id= t1.enq_user_id');
      $this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
      $this->db->join('tbl_city t6','t6.id=t1.enq_city');

      $this->db->join('tbl_user_po t7','t7.po_enq_id=t1.enq_id AND t7.po_user_id=t1.enq_user_id AND t7.po_vend_id=t2.res_vend_id AND t7.po_quot_status="Accepted"','left');

      $this->db->join('tbl_vendor_quot t8','t8.quot_enq_id = t7.po_enq_id AND t8.quot_user_id = t7.po_user_id AND t8.quot_vend_id = t7.po_vend_id','left');

      $this->db->group_by('t1.enq_id');
      $this->db->where('t2.res_vend_id',$vendor);
      $this->db->group_start();
      //$this->db->where('t2.res_enq_status','Active');
      $this->db->or_where('t2.res_enq_status','Deal');
      $this->db->group_end();
      $this->db->order_by('t1.enq_id','DESC');
      return $this->db->get()->result();
    }


    function select()
     {
      $this->db->order_by('vendor_id', 'DESC');
      $query = $this->db->get('tbl_vendor');
      return $query;
     }

     function insert($data)
     {
      $this->db->insert_batch('tbl_vendor', $data);
     }

     public function get_all_vendors($id)     //8 dec 2018
     {
       $this->db->select('vend_id');
       $this->db->from('tbl_vendors_cat_subcat');
       $this->db->where('subcat_id',$id);
       $query = $this->db->get()->result();
       return $query;
     }

     public function sendTo_vendors($data)     //8 dec 2018
     {
       $dt=$this->db->insert('tbl_enq_vendor_response',$data);
       if($dt)
            {
                return $dt;
            } 
            return false; 
     }

     public function get_enq($enq_id,$vendor)       //11,26 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        $this->db->join('tbl_vbusiness_details t3','t3.bis_vendor_id ='.$vendor);
        $this->db->join('tbl_enq_vendor_response t4','t4.res_vend_id = t3.bis_vendor_id AND t4.res_enq_id= t1.enq_id');
        $this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
        $this->db->join('tbl_city t6','t6.id=t1.enq_city');

        $this->db->join('tbl_user t7','t7.user_id = t1.enq_user_id');
        $this->db->join('tbl_vendor t8','t8.vendor_id = t3.bis_vendor_id');

        $this->db->where('t1.enq_id',$enq_id);
       // $this->db->where('t1.enq_status','Active');
        return $this->db->get()->result();
     }
     
       public function getQuot($enq_id,$v_id,$user_id)     //9 Jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_vendor_quot');

        $this->db->where('quot_user_id',$user_id);
        $this->db->where('quot_vend_id',$v_id);
        $this->db->where('quot_enq_id',$enq_id);
        $this->db->limit(1);
        $this->db->order_by('quot_created','DESC');
        return $count = $this->db->get()->result();
     }

     public function update_vendor_points($vendor,$new_pts)   //11 Dec 2018
     {
        $this->db->set('bis_vendor_pts',$new_pts);
        $this->db->where('bis_vendor_id',$vendor);
        return $res=$this->db->update('tbl_vbusiness_details');
     }

     public function update_enq_status($resId,$today)    //11 Dec 2018
     {
        $this->db->set('res_enq_status','Accepted');
        $this->db->set('res_enq_updated',$today);
        $this->db->where('res_id',$resId);
        return $res=$this->db->update('tbl_enq_vendor_response');
     }

     public function insert_trans($data)     //11 Dec 2018
     {
       $this->db->insert('tbl_vendor_commission_deduction',$data);
     }

     public function getEnqDetails($enq_id,$v_id,$user_id)    //11 Dec 2018 //9 Jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        $this->db->join('tbl_vbusiness_details t3','t3.bis_vendor_id ='.$v_id);
        $this->db->join('tbl_enq_vendor_response t4','t4.res_vend_id = t3.bis_vendor_id AND t4.res_enq_id= t1.enq_id');
        $this->db->join('tbl_user t5','t5.user_id='.$user_id);
       $this->db->join('tbl_enq_atchmnt t6','t6.atch_enq_id= t1.enq_id AND t6.atch_user_id=t1.enq_user_id','left');
       $this->db->join('tbl_city t7','t7.id=t1.enq_city');
       $this->db->join('tbl_states t8','t8.id=t1.enq_state');
       $this->db->join('tbl_country t9','t9.id=t1.enq_country');

        $this->db->where('t1.enq_id',$enq_id);
        // $this->db->where('t1.enq_status','Active');
        return $this->db->get()->result();
     }

     public function getQuotDetails($enq_id,$v_id)    //18 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_vendor_quot t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.quot_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.quot_enq_id',$enq_id);
        $this->db->where('t1.quot_vend_id',$v_id);
        $this->db->order_by('t1.quot_count','DESC');
        return $this->db->get()->result();
     }

    public function insert_quot($data)                     //12 Dec 2018
     {
       $this->db->insert('tbl_vendor_quot',$data);
     }
 
    public function get_quotCount($enq_id,$vendor)         //12 Dec 2018
    {     
      $this->db->select('*');
      $this->db->from('tbl_vendor_quot');
      $this->db->where('quot_enq_id',$enq_id);
      $this->db->where('quot_vend_id',$vendor);
      $query=$this->db->get();
      return $res= $query->num_rows();
    }

  function notinterested_inq($res_id)            //13 dec 2018       //9 Jan 2019
  {
    $this->db->set('res_enq_status','Not_Interested');
    $this->db->where('res_id',$res_id);
    return $res = $this->db->update('tbl_enq_vendor_response');
  }
  public function get_AllUserInquiry()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id');
      //$this->db->join('tbl_remark tre','tre.enq_id = tem.enq_id');
      //$this->db->order_by("tempnam(dir, prefix) enq_id,desc");
      $data = array('tem.enq_status' => 'Active', 'tem.enq_type' => 'Multiple');
      $this->db->where($data);
     // $this->db->order_by("enq_id","desc");

      return $query=$this->db->get()->result();
  }

  public function getAllActiveInquiry()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id');
      //$this->db->join('tbl_remark tre','tre.enq_id = tem.enq_id');
      //$this->db->order_by("tempnam(dir, prefix) enq_id,desc");
      $data = array('tem.enq_status' => 'Active', 'tem.enq_type' => 'Multiple');
      $this->db->where($data);
     // $this->db->order_by("enq_id","desc");

      return $query=$this->db->get()->result();
  }
    /*public function getSingleRemark()
    {
         $this->db->select('*');
        $this->db->from('tbl_remark');

        return $query=$this->db->get()->result();
    }*/

    public function getUserInfo($enq_user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $data = array('user_id' => $enq_user_id);
        $this->db->where($data);
        return $query=$this->db->get()->result();
    }
    public function getAllRemark($enq_user_id,$enq_id)
    {
      $this->db->select('*');
      $this->db->from('tbl_remark');
      $data = array('user_id' => $enq_user_id, 'enq_id' => $enq_id);
      $this->db->where($data);
      return $query=$this->db->get()->result();

    }
   public function get_single_user_enquirylist()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id','left');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id','left');
      //$this->db->order_by("tempnam(dir, prefix) enq_id,desc");
      $data = array('tem.enq_status' => 'Active', 'tem.enq_type' => 'Single');
      $this->db->where( $data);
     // $this->db->where('tem.enq_status','Active', 'tem.enq_type','Single');
      $this->db->order_by("enq_id","desc");

      return $query=$this->db->get()->result();
  }
  public function get_PoCount($enq_id,$vend_id,$userid,$quot)         //19 Dec 2018
    {     
      $this->db->select('*');
      $this->db->from('tbl_user_po');
      $this->db->where('po_enq_id',$enq_id);
      $this->db->where('po_vend_id',$vend_id);
      $this->db->where('po_user_id',$userid);
      $this->db->where('po_quot_id',$quot);

      $query=$this->db->get();
      return $res= $query->num_rows();
    }
   public function get_Allverified_inquiry()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id','left');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id','left');
      $this->db->where('tem.enq_status','Verified');
      return $query=$this->db->get()->result();
  }
  public function get_Allnon_verified_inquiry()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id','left');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id','left');
      $this->db->where('tem.enq_status','Fake');
      return $query=$this->db->get()->result();
  }
   public function get_Allcompleted_inquiry()
  {
      $this->db->select('*');
      $this->db->from('tbl_enq_master tem');
      $this->db->join('tbl_user tu','tu.user_id = tem.enq_user_id','left');
      $this->db->join('tbl_sub_category tsc','tsc.sub_category_id = tem.enq_pro_subcat_id','left');
      $this->db->where('tem.enq_status','Completed');
      return $query=$this->db->get()->result();
  }

  public function get_update_enq($enq_id)       //11 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        //$this->db->join('tbl_vbusiness_details t3','t3.bis_vendor_id ='.$vendor);
        //$this->db->join('tbl_enq_vendor_response t4','t4.res_vend_id = t3.bis_vendor_id AND t4.res_enq_id= t1.enq_id');

        $this->db->where('t1.enq_id',$enq_id);
       // $this->db->where('t1.enq_status','Active');
        return $this->db->get()->result();
     }
  public function getPoDetails($enq_id,$v_id)    //18 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_user_po t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.po_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.po_enq_id',$enq_id);
        $this->db->where('t1.po_vend_id',$v_id);
        $this->db->order_by('t1.po_count','DESC');
        return $this->db->get()->result();
     }

 /* public function getPoDetails($enq_id,$v_id)    //18 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_user_po t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.po_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.po_enq_id',$enq_id);
        $this->db->where('t1.po_vend_id',$v_id);
        $this->db->order_by('t1.po_count','DESC');
        return $this->db->get()->result();
     }*/


	   public function getaccepted_PoDetails($enq_id,$v_id)    //20 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_user_po t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id=t1.po_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2.enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
       
        $this->db->where('t1.po_enq_id',$enq_id);
        $this->db->where('t1.po_vend_id',$v_id);
        $this->db->where('t1.po_quot_status','Accepted');
        $this->db->order_by('t1.po_count','DESC');
        return $this->db->get()->result();
     }

     public function update_PO($po_id,$today)                  //20 Dec 2018
     {
        $this->db->set('po_quot_status','Accepted');
        $this->db->set('po_updated',$today);
        $this->db->where('po_id',$po_id);
        return $res = $this->db->update('tbl_user_po');
     }

     public function update_vend($vend_id,$enq_id,$today)             //20 Dec 2018
     {
        $this->db->set('res_enq_status','Deal');
        $this->db->set('res_enq_updated',$today);
        $this->db->where('res_vend_id',$vend_id);
        $this->db->where('res_enq_id',$enq_id);
        return $res = $this->db->update('tbl_enq_vendor_response');
     }

      public function update_enq($enq_id,$today)               //20 Dec 2018
     {
        $this->db->set('enq_status','Deal');
        $this->db->set('enq_udated',$today);
        $this->db->where('enq_id',$enq_id);
        return $res = $this->db->update('tbl_enq_master');
     }


      public function close_Dealenq($enq_id,$vend_id,$today)     //20 Dec 2018
     {
        $this->db->set('res_enq_status','Closed');
        $this->db->set('res_enq_updated',$today);
        $this->db->where_not_in('res_vend_id',$vend_id);
        $this->db->where('res_enq_id',$enq_id);
        return $res = $this->db->update('tbl_enq_vendor_response');
     }

     public function insert_bill($data)                     //20 Dec 2018
     {
       $this->db->insert('tbl_eway_bill',$data);
     }

     public function getBillDetails($enq_id,$v_id,$user_id)    //20 Dec 2018
     {
       /* $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        $this->db->join('tbl_vbusiness_details t3','t3.bis_vendor_id ='.$v_id);
        $this->db->join('tbl_enq_vendor_response t4','t4.res_vend_id = t3.bis_vendor_id AND t4.res_enq_id= t1.enq_id');
        $this->db->join('tbl_user t5','t5.user_id='.$user_id);
       $this->db->join('tbl_eway_bill t6','t6.bill_enq_id= t1.enq_id AND t6.bill_user_id=t1.enq_user_id AND t6.bill_vendor_id='.$v_id);


        $this->db->where('t1.enq_id',$enq_id);
        
        return $this->db->get()->result();*/


        $this->db->select('*');
        $this->db->from('tbl_eway_bill t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id = t1.bill_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
        $this->db->join('tbl_user t4','t4.user_id=t1.bill_user_id');
        
        $this->db->where('t1.bill_vendor_id',$v_id);
        $this->db->where('t1.bill_enq_id',$enq_id);
        $this->db->where('t1.bill_user_id',$user_id);
        return $this->db->get()->result();
     }

     function getAllInquiryData($enq_id) /*25 Dec 2018*/
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_master t1');
        $this->db->join('tbl_sub_category t2','t2.sub_category_id = t1. enq_pro_subcat_id OR t2.sub_category_id = t1.enq_ser_subcat_id','left');
        $this->db->join('tbl_vendors_cat_subcat t4','t4.subcat_id = t1. enq_pro_subcat_id OR t4.subcat_id = t1.enq_ser_subcat_id ','left');
        $this->db->join('tbl_vbusiness_details t5','t5.bis_vendor_id = t4.vend_id');
        $this->db->join('tbl_vendor t6','t6.vendor_id = t4.vend_id');
        $data = array('t1.enq_id' => $enq_id);
        $this->db->where($data);
        return $query=$this->db->get()->result();

     }
     function checkStautsActive()
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response');
        return $query=$this->db->get()->result();
     }

     public function get_user_comp_enqlist($vendor)      //24 Dec 2018      //14 Jan 2019
    {
      $this->db->select('*');
      $this->db->from('tbl_enq_master t1');
      $this->db->join('tbl_enq_vendor_response t2', 't2.res_enq_id = t1.enq_id');
      $this->db->join('tbl_sub_category t3','t3.sub_category_id = t1. enq_pro_subcat_id OR t3.sub_category_id = t1.enq_ser_subcat_id','left');
      $this->db->join('tbl_user t4','t4.user_id= t1.enq_user_id');
      $this->db->join('tbl_enq_atchmnt t5','t5.atch_enq_id= t1.enq_id AND t5.atch_user_id=t1.enq_user_id','left');
      $this->db->join('tbl_city t7','t7.id=t1.enq_city');

       $this->db->join('tbl_user_po t8','t8.po_enq_id=t1.enq_id AND t8.po_user_id=t1.enq_user_id AND t8.po_vend_id=t2.res_vend_id AND t8.po_quot_status="Accepted"','left');

      $this->db->join('tbl_vendor_quot t9','t9.quot_enq_id = t8.po_enq_id AND t9.quot_user_id = t8.po_user_id AND t9.quot_vend_id = t8.po_vend_id','left');

      $this->db->join('tbl_vend_feed_remark t10','t10.fr_vend_id = t2.res_vend_id AND t10.fr_enq_id = t1.enq_id AND t10.fr_user_id = t1.enq_user_id');

      $this->db->group_by('t1.enq_id');
      $this->db->where('t2.res_vend_id',$vendor);
      $this->db->group_start();
      //$this->db->where('t2.res_enq_status','Active');
      $this->db->or_where('t2.res_enq_status','Completed');
      $this->db->group_end();
      $this->db->order_by('t1.enq_id','DESC');
      return $this->db->get()->result();
    }

    public function change_Enq_status($enq_id,$v_id,$today)        //24 Dec 2018
     {
        $this->db->set('res_enq_status','Completed');
        $this->db->set('res_enq_updated',$today);
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_vend_id',$v_id);

        return $res = $this->db->update('tbl_enq_vendor_response');
     }

     public function inactive_Enq()        //24,25 Dec 2018
   
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_master');
        return $this->db->get()->result();
        
     }

    function update_EndEnq($enq_id,$date,$today)             // 26 Dec 2018      //14 Jan 2019
     {
        $this->db->set('enq_status','Inactive');
        $this->db->set('enq_udated',$today);
        $this->db->where('enq_endDate',$date);
        $this->db->where('enq_status','Active');
        
        $res = $this->db->update('tbl_enq_master');

        if($res)
        {

          $this->db->set('res_enq_status','Closed');
          $this->db->set('res_enq_updated',$today);
          //$this->db->join('tbl_enq_master','tbl_enq_master.enq_id = tbl_enq_vendor_response.res_enq_id');
          $this->db->where('res_enq_id',$enq_id);
          return $res1 = $this->db->update('tbl_enq_vendor_response');
        }

     }
      public function get_Inquery_Count($enq_id) // 28 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Active');
        return $this->db->get()->num_rows();
     }
      public function get_Inquery_Accepted($enq_id) // 28 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Accepted');
        return $this->db->get()->num_rows();
     }
     
     public function insert_chalan($data)                     //11 Jan 2019
     {
       $this->db->insert('tbl_chalan',$data);
     }

     public function getChalanDetails($enq_id,$v_id,$user_id)    //11 Jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_chalan t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id = t1.chalan_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
        $this->db->join('tbl_user t4','t4.user_id=t1.chalan_user_id');
        
        $this->db->where('t1.chalan_vend_id',$v_id);
        $this->db->where('t1.chalan_enq_id',$enq_id);
        $this->db->where('t1.chalan_user_id',$user_id);
        return $this->db->get()->result();
     }
     
     public function insert_enq_Bill($data)                     //11 Jan 2019
     {
       $this->db->insert('tbl_enq_bill',$data);
     }

     public function getEnqBillDetails($enq_id,$v_id,$user_id)    //11 Jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_bill t1');
        $this->db->join('tbl_enq_master t2','t2.enq_id = t1.bill_enq_id');
        $this->db->join('tbl_sub_category t3','t3.sub_category_id = t2. enq_pro_subcat_id OR t3.sub_category_id = t2.enq_ser_subcat_id','left');
        $this->db->join('tbl_user t4','t4.user_id=t1.bill_user_id');
        
        $this->db->where('t1.bill_vend_id',$v_id);
        $this->db->where('t1.bill_enq_id',$enq_id);
        $this->db->where('t1.bill_user_id',$user_id);
        return $this->db->get()->result();
      }

      public function add_feed_remark($data)                     //14 Jan 2019
     {
       $res = $this->db->insert('tbl_vend_feed_remark',$data);
      
        return $res;
     
     }

	public function getnotifications($vid)          //15 Jan 2019
     {
      $this->db->select('*');
      $this->db->from('tbl_notification');
      $this->db->where('notification_vend_id',$vid);
      $this->db->order_by('notification_c_date','DESC');
      $query=$this->db->get()->result();

      $data = array(
        'notification_status' => 'READ',       
    );
      $this->db->where('notification_vend_id', $vid);
      $this->db->where('notification_status', 'UNREAD');
      $this->db->update('tbl_notification',$data); 

      return $query;
     }
          public function get_Inq_Accepted($enq_id) // 23 jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response tevr');
        $this->db->join('tbl_vendor tvn','tvn.vendor_id = tevr.res_vend_id');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Accepted');
        return $this->db->get()->result();
     }

     public function get_Inq_UnAct($enq_id) // 23 jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response tevr');
        $this->db->join('tbl_vendor tvn','tvn.vendor_id = tevr.res_vend_id');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Not_Interested');
        return $this->db->get()->result();
     }
     public function get_InAct($enq_id) // 23 jan 2019
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response tevr');
        $this->db->join('tbl_vendor tvn','tvn.vendor_id = tevr.res_vend_id');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Active');
        return $this->db->get()->result();
     }
      public function get_Inquery_UnAccepted($enq_id) // 28 Dec 2018
     {
        $this->db->select('*');
        $this->db->from('tbl_enq_vendor_response');
        $this->db->where('res_enq_id',$enq_id);
        $this->db->where('res_enq_status','Not_Interested');
        return $this->db->get()->num_rows();
     }
     
     

}
