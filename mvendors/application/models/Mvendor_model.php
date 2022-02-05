<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mvendor_model  extends CI_Model {


	public function check_vendor($vendor)
	{
		$this->db->select('*');
		$this->db->from('tbl_vbusiness_details');
		$this->db->where('bis_vendor_id', $vendor);
		$res = $this->db->get();
		if($res->num_rows()>0)
		{
			return "true";
		}
		else
		{
			return "false";
		}
	}
    public function get_package_list()
    {
         $where = array(
        'package_status' => 'ACTIVE'
       );
        $this->db->select('*');
        $this->db->from('tbl_package');
        $this->db->where($where);
        return $this->db->get()->result();
    }
	public function get_vendor_details($vendor)
	{
      	$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->where('vendor_id', $vendor);
		return $this->db->get()->result();
	}
	public function get_business_details($table, $id)
	{
		$this->db->select('vb.*,');
		$this->db->from('tbl_vbusiness_details vb');
		$this->db->join('tbl_vendor v', 'vb.bis_vendor_id = v.vendor_id');
       // $this->db->join('tbl_package pck', 'vb.bis_package = pck.package_id');
		$this->db->where('bis_vendor_id', $id);
		return $this->db->get()->result();


       /* $this->db->select('vb.*, v.vaccount_hname, v.vaccount_num, v.vbank_name, v.vifsc_code, pck.package_name,cat.*,scat.*');
        $this->db->from('tbl_vbusiness_details vb');
        $this->db->join('tbl_vendors_cat_subcat vcs','vcs.vend_id=vb.bis_vendor_id');
        $this->db->join('tbl_category cat', 'cat.category_id = vcs.cat_id');
        $this->db->join('tbl_sub_category scat', 'scat.sub_category_id = vcs.subcat_id');
        $this->db->join('tbl_vendor v', 'vb.bis_vendor_id = v.vendor_id');
        $this->db->join('tbl_package pck', 'vb.bis_package = pck.package_id');
        $this->db->where('vb.bis_vendor_id', $id);
        return $this->db->get()->result();*/


	}
    public function get_catSubcat($vendor)
    {
        $arrayName = array(
            'ven_stauts' => 'ACTIVE',
            'vend_id' => $vendor,
         );
       // $this->db->distinct('cat.category_id');
        $this->db->select('*');
        $this->db->from('tbl_vendors_cat_subcat vcs');
       // $this->db->join('tbl_vendors_subcat_brand tvsb', 'tvsb.subcat_id= vcs.subcat_id', 'left');
        $this->db->join('tbl_category cat', 'cat.category_id = vcs.cat_id', 'left');
        $this->db->join('tbl_sub_category scat', 'scat.sub_category_id = vcs.subcat_id', 'left');
       // $this->db->join('tbl_brand br','br.brand_id=tvsb.brand_id');
       // $this->db->join('tbl_vendors_subcat_brand tvsb', 'tvsb.brand_id = bran.subcat_id');
       // $this->db->where('vend_id',$vendor);
        $this->db->where($arrayName);
        //$this->db->group_by('cat.category_title');
        return $this->db->get()->result();



       /* $this->db->select('vb.*,cat.*,scat.*,vcsub.*');
        //$this->db->select('pck.*,p.package_name');
        $this->db->from('tbl_vbusiness_details vb');
        $this->db->join('tbl_vendors_cat_subcat vcs','vcs.vend_id=vb.bis_vendor_id');
       
        $this->db->join('tbl_category cat', 'cat.category_id = vcs.cat_id');
        $this->db->join('tbl_sub_category scat', 'scat.sub_category_id = vcs.subcat_id');
        $this->db->join('tbl_vendors_subcat_brand vcsub', 'vcsub.subcat_id =scat.sub_category_id ');

        $this->db->join('tbl_vendors_subcat_brand vsb','vsb.subcat_id = vcs.subcat_id');
        $this->db->join('tbl_brand br','br.brand_id=vsb.brand_id');
       // $this->db->join('tbl_brand bra', 'bra.brand_id = vcsub.brand_id');
        $this->db->where('vb.bis_vendor_id', $id);
        return $this->db->get()->result();*/

        /*$this->db->select('*');
        $this->db->from('tbl_vendors_cat_subcat vcs');
        $this->db->join('tbl_category cat', 'cat.category_id = vcs.cat_id');
        $this->db->join('tbl_sub_category scat', 'scat.sub_category_id = vcs.subcat_id');
        $this->db->join('tbl_vendors_subcat_brand vsb','vsb.subcat_id = vcs.subcat_id');
        $this->db->join('tbl_brand br','br.brand_id=vsb.brand_id');

        $this->db->where('vcs.vend_id', $id);
        return $this->db->get()->result();*/


    }

     public function get_salcat($vendor)
    {
        $arrayName = array(
            'ven_stauts' => 'ACTIVE',
            'vend_id' => $vendor,
         );
        $this->db->select('*');
        $this->db->from('tbl_vendors_cat_subcat vcs');
        $this->db->join('tbl_category cat', 'cat.category_id = vcs.cat_id', 'left');
        $this->db->join('tbl_sub_category scat', 'scat.sub_category_id = vcs.subcat_id', 'left');
        $this->db->where($arrayName);
        $this->db->group_by('cat.category_title');
        return $this->db->get()->result();
    }
   
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
     public function check_business_details_exist($vid)
    {
         if($vid!=null)
        {
            $this->db->select('bis_vendor_id');
            $this->db->from('tbl_vbusiness_details');
            $this->db->where('bis_vendor_id',$vid);
            $details=$this->db->get();
         }
       // $details=$this->db->get($tbl_name)->result();
        if($details)
        {
            return $details;
        } 
        return false;      
    }

    function get_subcat($cat_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category t');
        $this->db->join('tbl_category tc','tc.category_id = t.sub_cat_id'); 
        $this->db->where_in('sub_cat_id', $cat_id); 
         //$this->db->where_in('t.sub_cat_id', $cid); 
        $query =$this->db->get();
       return $result = $query->result();

    }
    public function get_brands($subcat_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subcategory_brand tsb');
        $this->db->join('tbl_brand tb','tb.brand_id = tsb.brand_id'); 
        $this->db->where_in('subcat_id',$subcat_id);
        return $this->db->get()->result();
    }
             public function get_AllCatSubcat_new($vend_id)
    {
       $sql=$this->db->query('SELECT if (ISNULL(v.ven_cat_subcat_id),0,1)as sel,tab1.category_id,tab1.category_title,tab1.sub_category_title,tab1.sub_category_id from (select tc.category_id,category_title,sub_category_title,sub_category_id from tbl_category tc, tbl_category_subcategory tsc, tbl_sub_category tsc1  where  tsc.category_id = tc.category_id and tsc1.sub_category_id = tsc.subcategory_id) as tab1 left join tbl_vendors_cat_subcat as v on tab1.category_id=v.cat_id and tab1.sub_category_id = v.subcat_id and v.ven_stauts="ACTIVE" and v.vend_id = '.$vend_id);

        return $sql->result();
    }
}

?>