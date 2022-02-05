<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class configuration_model  extends CI_Model {

    public function get_Configdata()
    {
    	$this->db->select('*');
        $this->db->from('tbl_config');
        return $this->db->get()->result();
    }
 
}
