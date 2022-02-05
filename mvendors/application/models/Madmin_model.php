<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Madmin_model  extends CI_Model {

    public function change_OldAdmin_Pass($tbl_name,$data,$where1)
    {
       $this->db->where($where1);
        $details=$this->db->update($tbl_name,$data);
            
        if($details)
        {
            return $details;
        } 
        return false;       
    }

	 public function get_rights($uid)
    {
        $this->db->select('arights');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $uid);
       return $this->db->get()->row();
       // return $query->result();
    }
    public function AddSubadmin($data)
    {
        $this->db->insert('tbl_admin', $data);
    }
    public function SubAdmin()
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $query = $this->db->get();
        return $query->result();
    }

    public function endUser()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }
    public function Get_SubAdmin($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function assign_rights($data,$admin_id)
    {
        $this->db->set($data);
        $this->db->where('admin_id', $admin_id);
        $res = $this->db->update('tbl_admin');
        if($res)
			{
				return $res;
			} 
			return false;
    }
    public function subadminPublish($data,$aid)
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

    public function getActive($tbl_name,$data,$where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $res = $this->db->update($tbl_name);
        if($res)
            {
                return $res;
            } 
            return false;
    }
    public function getInactive($tbl_name,$data,$where)
    {
        $this->db->set($data);
        $this->db->where($where);
        $res = $this->db->update($tbl_name);
        if($res)
            {
                return $res;
            } 
            return false;
    }
    public function GetAdminData($uid)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id', $uid);
        $query = $this->db->get();
        return $query->result();

    }

    public function countRow() // Total number count of vendors
    {
        $query = $this->db->query('SELECT * FROM tbl_vendor');
        return $query->num_rows();

    }

    public function countInquery() // Total number count of Inquery
    {
        $query = $this->db->query('SELECT * FROM tbl_enq_master');
        return $query->num_rows();

    }

    public function countUsers() // Total number count of Users
    {
        $query = $this->db->query('SELECT * FROM tbl_user');
        return $query->num_rows();

    }
    public function email_recover_verif($user_email,$user_code)
    {
        $this->db->select('aemail');
        $this->db->where('aemail',$user_email);
      //  $this->db->where('user_code',$user_code);
        $query = $this->db->get('tbl_admin');
        if($query->row_array() > 0)
        {
            //$data['user_isactive'] = true;

            $this->db->where('aemail',$user_email);
            $this->db->update('tbl_admin',$data);
            return $query->row_array();
        }
        return false;
        }
        
     public function getUserInfo($enq_user_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $data = array('user_id' => $enq_user_id);
        $this->db->where($data);
        return $query=$this->db->get()->result();
    }
    public function get_Vendor_Email($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $data = array('vendor_id' => $id);
        $this->db->where($data);
        return $query=$this->db->get()->result();
    }
    
}
