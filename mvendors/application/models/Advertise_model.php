<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertise_model  extends CI_Model {

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
     public function slide_upload_image($img_name,$img_path,$old_img)
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
            $config['width']  = 850;
            $config['height'] = 320;
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
    public function getActiveInactive($tbl_name,$data,$where)
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
    public function get_Advertise()
    {
        $this->db->select('*');
        $this->db->from('tbl_advertise');
        return $this->db->get()->result();
    }
    public function get_Listbanner()
    {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        return $this->db->get()->result();
    }
    public function get_Productbanner()
    {
        $this->db->select('*');
        $this->db->from('tbl_product_banner');
        return $this->db->get()->result();
    }
    public function get_Ad_Banner()
    {
        $this->db->select('*');
        $this->db->from('tbl_ad_banner');
        return $this->db->get()->result();
    }
    public function get_Slider()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        return $this->db->get()->result();
    }
    
}
