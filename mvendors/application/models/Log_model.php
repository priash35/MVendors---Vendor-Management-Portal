<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Log_model  extends CI_Model {

    public function __construct()
    {
      parent ::__construct();
    }
  function select()
     {
      $this->db->order_by('bis_det_id', 'DESC');
      $query = $this->db->get('tbl_vbusiness_details');
      return $query;
     }

    function getLogDetails()
    {
       //$this->db->order_by('log_id', 'DESC');
        $this->db->select('tbl.*,tba.alname,afname');
        $this->db->from('tbl_log tbl');
        $this->db->join('tbl_admin tba', 'tba.admin_id=tbl.log_userid');
        return $this->db->get()->result();
      //$query = $this->db->get()result('tbl_log');
     // return $query;
    }
    public function get_update_fields($key,$cus_id,$data,$table){   
    $this->db->select('*');
    $this->db->from($table);  
    $this->db->where($key,$cus_id);   
    $query1= $this->db->get();
    $old_data = array();
    $old_data = $query1->result_array();    
    $diff = array_diff_assoc($data, $old_data[0]);
    return $diff;

  }
  public function insert_audit_record($user,$table,$diff,$key_name,$key_value){
    
    $record = array();
    $all_records = array();
    foreach ($diff as $key => $value) {
      $record['table_name'] = $table;
      $record['key_name'] = $key_name;
      $record['key_value'] = $key_value;
      $record['column_name'] = $key;
      $record['updated_value'] = $value;
      $record['updated_by'] = $user;
      array_push($all_records, $record);
    }
    $this->db->insert_batch('tbl_log',$all_records);
    return true;
  }


}
