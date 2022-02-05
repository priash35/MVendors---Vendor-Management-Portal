<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Media_model');
		$this->load->model('Category_model');
		$this->load->model('import_model');
		$this->load->library('csvimport');;
		$this->load->model('Madmin_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$uid = $_SESSION['userid'];
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$result = $this->Madmin_model->get_rights($uid);
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Import / Import List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/import/import',$data);	
		$this->load->view('admin/master/footer');
	}
	public function category_type()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Import / Products Services';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/import/category_type',$data);	
		$this->load->view('admin/master/footer');
	}
	public function subcategory_type()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Import / Subtype Products Services List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/import/subcategory_type',$data);	
		$this->load->view('admin/master/footer');
	}
	public function brands_type()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Import / Brand List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/import/brands_type',$data);	
		$this->load->view('admin/master/footer');
	}

	public function import_vendors()
	{
		$uid = $_SESSION['userid'];
		$result = $this->Madmin_model->get_rights($uid);
		$title['profile'] = $this->User_model->get_AdminProfile($uid); 
		$title['right'] = $result->arights;
		$data['videos'] = $this->Media_model->get_videos();
		$title['title']='Import / Import List';
		$this->load->view('admin/master/header');
		$this->load->view('admin/master/left',$title);
		$this->load->view('admin/import/import_vendors',$data);	
		$this->load->view('admin/master/footer');
	}
	function load_data()
 {
	  $result = $this->import_model->select();
	  $output = '
	   <h3 align="center">Imported Vendors Details from CSV File</h3>
	        <div class="table-responsive">
	         <table class="table table-bordered table-striped">
	          <tr>
	           <th>Sr. No</th>
	           <th>First Name</th>
	           <th>Last Name</th>
	           <th>Phone</th>
	           <th>Email Address</th>
	          </tr>
	  ';
	  $count = 0;
	  if($result->num_rows() > 0)
	  {
	   foreach($result->result() as $row)
	   {
	    $count = $count + 1;
	    $output .= '
	    <tr>
	     <td>'.$count.'</td>
	     <td>'.$row->bis_name.'</td>
	     <td>'.$row->bis_description.'</td>
	     <td>'.$row->bis_email.'</td>
	     <td>'.$row->bis_mnumber.'</td>
	    </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '
	   <tr>
	       <td colspan="5" align="center">Data not Available</td>
	      </tr>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
 }

 function imports()
 {
	  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	  foreach($file_data as $row)
	  {
	  	$str =  $row["bis_slug"];
		$string = str_replace(' ','-',$str);
		$slug =preg_replace('/[^A-Za-z0-9\-]/', '', $string);
	   $data[] = array(
	    'bis_vendor_id' => $row["bis_vendor_id"],
	    'bis_name' => $row["bis_name"],
	    'bis_slug' => $slug,
	    'bis_vtype' => $row["bis_vtype"],
	    'bis_description' => $row["bis_description"],
	    'bis_email' => $row["bis_email"],
	    'bis_mnumber' => $row["bis_mnumber"],
	    'bis_package' => $row["bis_package"],
	    'bis_address' => $row["bis_address"],
	   	'bis_country' => $row["bis_country"],
	   	'bis_state' => $row["bis_state"],
	   	'bis_city' => $row["bis_city"],
	   	'bis_pincode' => $row["bis_pincode"],
	   	'bis_category' => $row["bis_category"],
	   	'bis_sub_category' => $row["bis_sub_category"],
	   	'bis_brand' => $row["bis_brand"],
	   	'bis_type' => $row["bis_type"],
	   	'bis_sub_type' => $row["bis_sub_type"],
	   	'bis_established_date' => $row["bis_established_date"],

	  
	   );
	  }
	  $this->import_model->insert($data);
 }

 		function load_categorydata()
 {
	  $result = $this->import_model->selectCategory();
	  $output = '
	   <h3 align="center">Imported Category Details from CSV File</h3>
	        <div class="table-responsive">
	         <table class="table table-bordered table-striped">
	          <tr>
	           <th>Sr. No</th>
	           <th>Category Name</th>
	          </tr>
	  ';
	  $count = 0;
	  if($result->num_rows() > 0)
	  {
	   foreach($result->result() as $row)
	   {
	    $count = $count + 1;
	    $output .= '
	    <tr>
	     <td>'.$count.'</td>
	     <td>'.$row->category_title.'</td>
	    </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '
	   <tr>
	       <td colspan="5" align="center">Data not Available</td>
	      </tr>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
 }
 	 function imports_category()
 	 {

 	 $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	  foreach($file_data as $row)
	  {
	   $data[] = array(
	    'category_title' => $row["category_title"],
	    'category_status' => $row["category_status"],
	   );
	  }
	   $this->db->insert_batch('tbl_category', $data);
 	 }

function load_subcategory_type()
 {
	  $result = $this->import_model->selectSubcategory();
	  $output = '
	   <h3 align="center">Imported SubCategory Details from CSV File</h3>
	        <div class="table-responsive">
	         <table class="table table-bordered table-striped">
	          <tr>
	           <th>Sr. No</th>
	           <th>Category Name</th>
	          </tr>
	  ';
	  $count = 0;
	  if($result->num_rows() > 0)
	  {
	   foreach($result->result() as $row)
	   {
	    $count = $count + 1;
	    $output .= '
	    <tr>
	     <td>'.$count.'</td>
	     <td>'.$row->sub_category_title.'</td>
	    </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '
	   <tr>
	       <td colspan="5" align="center">Data not Available</td>
	      </tr>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
 }

 	  function imports_subcategory_type()
 	 {
 	 	
 	 $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	  foreach($file_data as $row)
	  {
	   $data[] = array(
	    'sub_cat_id' => $row["sub_cat_id"],
	    'sub_category_title' => $row["sub_category_title"],
	   );
	  }
	   $this->db->insert_batch('tbl_sub_category', $data);
 	 }
 	 function imports_brands_type()
 	 {
 	 	
 	 $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	  foreach($file_data as $row)
	  {
	   $data[] = array(
	    'brand_title' => $row["brand_title"],
	   );
	  }
	  $this->import_model->insertBrand($data);
 	 }

function load_brands_type()
 {
	  $result = $this->import_model->selectBrand();
	  $output = '
	   <h3 align="center">Imported Brands Details from CSV File</h3>
	        <div class="table-responsive">
	         <table class="table table-bordered table-striped">
	          <tr>
	           <th>Sr. No</th>
	           <th>First Name</th>
	           <th>Last Name</th>
	           <th>Phone</th>
	           <th>Email Address</th>
	          </tr>
	  ';
	  $count = 0;
	  if($result->num_rows() > 0)
	  {
	   foreach($result->result() as $row)
	   {
	    $count = $count + 1;
	    $output .= '
	    <tr>
	     <td>'.$count.'</td>
	     <td>'.$row->brand_title.'</td>
	    </tr>
	    ';
	   }
	  }
	  else
	  {
	   $output .= '
	   <tr>
	       <td colspan="5" align="center">Data not Available</td>
	      </tr>
	   ';
	  }
	  $output .= '</table></div>';
	  echo $output;
 }
	
}
