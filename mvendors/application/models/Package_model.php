<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_model  extends CI_Model {

    public function get_Package() // Get packags data form venodrs
    {
        $where = array(
          'package_status' => 'ACTIVE',
        );
        $this->db->select('*');
        $this->db->from('tbl_package');
        $this->db->where($where);
        $this->db->order_by('package_id','DESC');                
        return $this->db->get()->result();
    }
    public function get_allPages() // Get all the packags pages from admin panel
    {
        $this->db->select('*');
        $this->db->from('tbl_package');    
        return $this->db->get()->result();
    }
    public function get_articles()
    {
    	$this->db->select('*');
        $this->db->from('tbl_blog');
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
    public function getInActive($tbl_name,$data,$aid)
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
}
