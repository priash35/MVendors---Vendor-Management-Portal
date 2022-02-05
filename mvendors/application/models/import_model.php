<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class import_model  extends CI_Model {

  function select()
     {
      $this->db->order_by('bis_det_id', 'DESC');
      $query = $this->db->get('tbl_vbusiness_details');
      return $query;
     }

 function insert($data)
     {
      $this->db->insert_batch('tbl_vbusiness_details', $data);
     }
 function insertBrand($data)
     {
        $this->db->insert_batch('tbl_brand', $data);
     }

 function selectBrand()
     {
        $this->db->order_by('brand_id', 'DESC');
        $query = $this->db->get('tbl_brand');
        return $query;
     }
function selectCategory()
     {
        $this->db->order_by('category_id', 'DESC');
        $query = $this->db->get('tbl_category');
        return $query;
     }

 function selectSubcategory()
     {
        $this->db->order_by('sub_category_id', 'DESC');
        $query = $this->db->get('tbl_sub_category');
        return $query;
     }

}
