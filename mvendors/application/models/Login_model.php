<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model  extends CI_Model {

    public function __construct()
    {
        parent ::__construct();
    }
    public function register_data($data)
    {
        $result= $this->db->insert('tbl_vendor', $data);
        return $result;
    }
}

?>