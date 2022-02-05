<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model  extends CI_Model {

    public function upload_image($img_name,$img_path,$old_img)
    {       
        $filename2      = $_FILES[$img_name]['name'];                
        $filename2      = explode(".", $filename2); 
                $new_filename2  = $img_name."_".date('Ymd').time().".".end($filename2);
        $thumb2 = $new_filename2;
        $_FILES['imag']['name']         = $new_filename2;
        $_FILES['imag']['type']         = $_FILES[$img_name]['type'];
        $_FILES['imag']['tmp_name']    = $_FILES[$img_name]['tmp_name'];
        $_FILES['imag']['error'] = $_FILES [$img_name]['error'];
        $_FILES['imag']['size']  = $_FILES [$img_name]['size'];

        $config = array();
        $config['upload_path'] = './assets/uploads/'.$img_path;
        $config['allowed_types'] = 'docx|doc|txt|pdf|jpg|jpeg|png';
        $config['max_size']      = '0';             
        $config['overwrite']     = FALSE;

        $this->upload->initialize($config);
         

        if($this->upload->do_upload ('imag')){                    
            $imagedata2 = $this -> upload -> data();
            $newimagename2 = $imagedata2["file_name"];
            $newimagename2 = str_replace (" ", "", $newimagename2);
            $this -> load -> library("image_lib");
            $config['image_library'] = 'gd2';
            $config['source_image'] = $imagedata2["full_path"];
            $config['create_thumb'] = false;
            $config['maintain_ratio'] = TRUE;
            $config['new_image'] = './assets/uploads/'.$img_path;
            $config['width']  = 180;
            $config['height'] = 200;
            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize();
             
        }    
        
        if($old_img!="")
        {
            $filename='assets/uploads/'.$img_path.'/'.$old_img;
            
            if (file_exists($filename)) 
            {
            unlink('assets/uploads/'.$img_path.'/'.$old_img);
            unlink('assets/uploads/'.$img_path.'/100X100/'.$old_img); 
        }
        }
        //echo $new_filename2;die;        
        return $new_filename2;  

    }
    public function record_list($tbl_name,$where1=null)
    {
        if($where1!=null)
        {
            $this->db->where($where1);
        }
        
        $details=$this->db->get($tbl_name)->result();
        if($details)
        {
            return $details;
        } 
        return false;           
    }
    public function delete_image($img_path,$old_img)
    {
        if($old_img!="")
        {   
            $filename='assets/uploads/'.$img_path.'/'.$old_img;
            
            if (file_exists($filename)) 
            {
                
                unlink('assets/uploads/'.$img_path.'/'.$old_img);
                unlink('assets/uploads/'.$img_path.'/'.$old_img); 
            }
        }
    }
    public function records_delete($tbl_name,$where1)
    {
        $this->db->where($where1);
        $details=$this->db->delete($tbl_name);
            
        if($details)
        {
            return $details;
        } 
        return false;           
    }
    public function get_subCategories()
    {
        $this->db->select('sc.*, c.category_title');
        $this->db->from('tbl_sub_category sc, tbl_category c');
        $this->db->where('sc.sub_cat_id = c.category_id');
        $this->db->order_by("sub_category_id","desc");
        return $this->db->get()->result();


      /* $this->db->select('*');
        $this->db->from('tbl_category_subcategory sc');
        $this->db->join('tbl_category cat','cat.category_id= sc.category_id');
        $this->db->join('tbl_sub_category tsc','tsc.sub_category_id= sc.subcategory_id');
        return $this->db->get()->result();*/

         


   
        /*$this->db->select('*');
        $this->db->from('tbl_category_subcategory sc');
        $this->db->join('tbl_category cat','cat.category_id= sc.category_id');
        $this->db->join('tbl_sub_category tsc','tsc.sub_category_id= sc.subcategory_id');
       // $this->db->where('catsubcat_stauts','ACTIVE');
        return $this->db->get()->result();*/
    }
      public function get_menu() // menu in front
    {
        /*$this->db->select('sc.*, c.category_title');
        $this->db->group_by('category_title'); 
        $this->db->from('tbl_sub_category sc, tbl_category c');
        $this->db->where('sc.sub_cat_id = c.category_id');
        return $this->db->get()->result();*/
        $this->db->select('category_id,category_title,category_pic');
       // $this->db->group_by('category_title'); 
        $this->db->from('tbl_category');
        $this->db->where('category_status','ACTIVE');

        //$this->db->where('sc.sub_cat_id = c.category_id');
        return $this->db->get()->result();
    }
     public function get_submenu($cat_id) // submenu in front changes 27 Dec 18
    {
        
        $this->db->select('tsub.sub_category_title,sub_category_pic,subcategory_id');
        $this->db->from('tbl_category_subcategory tcs');
        $this->db->join('tbl_sub_category tsub','tsub.sub_category_id = tcs.subcategory_id');
        $this->db->where('tcs.catsubcat_stauts','ACTIVE');
        $this->db->where('tsub.sub_category_status','ACTIVE');
        $this->db->where('tcs.category_id',$cat_id);
        return $this->db->get()->result();
    }
    public function get_Categories()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by("category_id","desc");
        return $this->db->get()->result();
    }

      public function get_CategoryName($sub_category_id)
    {
        $this->db->select('tc.*');
        $this->db->from('tbl_category tc');
        $this->db->join('tbl_category_subcategory tcs','tcs.category_id = tc.category_id');
        $this->db->where('tcs.subcategory_id',$sub_category_id);
        return $this->db->get()->result();
    }
    public function get_Brands()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->order_by("brand_id","desc");
        return $this->db->get()->result();
    }
    public function record_insert($table, $data)
    {
        $this->db->insert($table, $data);
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
	 public function get_types()
    {
        $this->db->select('t.*, sc.sub_category_title');
        $this->db->from('tbl_type t, tbl_sub_category sc');
        $this->db->where('t.type_subcategory = sc.sub_category_id');
        $this->db->order_by("type_id","desc");
        return $this->db->get()->result();
    }
    public function get_Subtypes()
    {
        $this->db->select('st.*, sc.sub_category_title, t.type_name');
        $this->db->from('tbl_subtype st, tbl_type t, tbl_sub_category sc');
        $this->db->where('st.subtype_type = t.type_id');
        $this->db->where('st.subcategory = sc.sub_category_id');
        $this->db->order_by("subtype_id","desc");
        return $this->db->get()->result();
    }
    public function getBrands($sub_category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory_brand tsb');
        $this->db->join('tbl_brand tb','tb.brand_id=tsb.brand_id');
        $this->db->where("tsb.subcat_id",$sub_category_id);
        return $this->db->get()->result();

    }
}
