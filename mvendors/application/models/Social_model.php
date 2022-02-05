<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Social_model  extends CI_Model {

    public function __construct()
    {
      parent ::__construct();
    }
    
    public function getSocialData()
    {
        $this->db->select('*');
        $this->db->from('tbl_social');
        return $this->db->get()->result();
    }
   
}
