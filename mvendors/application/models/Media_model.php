<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model  extends CI_Model {

    public function get_videos()
    {
        $this->db->select('*');
        $this->db->from('tbl_video');
        $this->db->order_by("video_id","desc");
        return $this->db->get()->result();
    }
    public function get_articles()
    {
    	$this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->order_by("blog_id","desc");
        return $this->db->get()->result();
    }
    public function records_update($tbl_name,$data,$where1)
    {
            $this->db->where($where1);
            $details=$this->db->update($tbl_name,$data);
            //$this->db->last_query();die;
                
            if($details)
            {
                return $details;
            } 
            return false;           
    }

    public function getActive($tbl_name,$data,$aid)
    {
        $this->db->set($data);
        $this->db->where($where1, $aid);        
        $res = $this->db->update($tbl_name);
       
        if($res)
            {
                return $res;
            } 
            return false;
    }
    public function subadminInactive($data,$aid)
    {
        $this->db->set($data);
        $this->db->where('admin_id', $aid);
        $res = $this->db->update('tbl_admin');
        if($res)
            {
                return $res;
            } 
            return false;
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
}
