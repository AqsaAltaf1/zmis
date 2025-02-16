<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_MA_mustahiq_reg extends CI_Controller 
{

function __construct()
{
parent::__construct();
$this->load->model('Dist_MA_mustahiq_reg_model');
$this->load->model('General_model');
}



public function index()
{

$userid = $this->session->userdata('id');
$data['get_all_lzcs'] = $this->Dist_MA_mustahiq_reg_model->get_all_lzcs($userid);
$data['getCategory'] = $this->General_model->get_master_fields("otherCategory");
$this->load->view('district/dist_ma_mustahiq_reg',$data);
}




function manage_ma_mustahiq_payment()
{

$LZC_id  = $this->input->post("lzc_id");
$get_lzcname = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
$LZCActualName = $get_lzcname->row('lzc_name');

$userid = $this->session->userdata('id');
$formArray = array();
$formArray['district_id'] = $userid;
$formArray['District_Name'] = $this->session->userdata('district_name');
$formArray['MustahiqType'] = "Marriage Assistance";
$formArray['LZCActualName']  = $LZCActualName;	
$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
$formArray['mustahiq_cnic']  = str_replace("-", "", $this->input->post("cnic"));
$formArray['dob']  = $this->input->post("dob");
$formArray['age']  = $this->input->post("age");
$formArray['ma_unmarriedSisters']  = $this->input->post("unmarriedSisters");
$formArray['contact_number']  = $this->input->post("cell_no");
$formArray['father_name']  = $this->input->post("f_name");
$formArray['ma_fatherOccupation']  = $this->input->post("fatherOccupation");
$formArray['ma_fatherIncome']  = $this->input->post("fatherIncome");
$formArray['LZC_id']  = $this->input->post("lzc_id");
$formArray['nikah_date']  = $this->input->post("nikah_date");
$formArray['ma_rukhsatiDate']  = $this->input->post("rukhsatiDate");
$formArray['category']  = $this->input->post("category");
$formArray['permanent_address']  = $this->input->post("address");
$formArray['ma_bridegroomName']  = $this->input->post("bridegroomName");
$formArray['ma_bridegroomCnic']  = str_replace("-", "", $this->input->post("bridegroomCnic"));
$formArray['year']  = $this->input->post("year");
$formArray['installment']  = $this->input->post("installment");
$formArray['addedby'] = $this->session->userdata('district_name');
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;
$formArray['Device'] = "Computer";

$allowed_image_extension = array("gif","jpg","png","jpeg","JPEG","JPG","PNG","GIF");
$brideCNIC  = str_replace("-", "", $this->input->post("cnic"));
/* picture code*/

if($_FILES["brideCnicFront"]["tmp_name"])
{
$path = $_FILES['brideCnicFront']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["brideCnicFront"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Bride CNIC Front /////////////


$brideCnicFront['upload_path'] = 'assets/marriageforms/'; 
$brideCnicFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
$brideCnicFront['file_name'] = $brideCNIC."_brideCnicFront".$_FILES["brideCnicFront"][''];
$this->load->library('upload', $brideCnicFront); 
$this->upload->initialize($brideCnicFront);
$this->upload->do_upload('brideCnicFront');
$brideFrontName = $this->upload->data();
$formArray['ma_brideCnicFront']  = $brideFrontName['file_name'];

}

}


//Bride CNIC Back

if($_FILES["brideCnicBack"]["tmp_name"])
{
$path = $_FILES['brideCnicBack']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["brideCnicBack"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Bride CNIC Back /////////////


$brideCnicBack['upload_path'] = 'assets/marriageforms/'; 
$brideCnicBack['allowed_types'] = 'jpg|jpeg|png|gif'; 
$brideCnicBack['file_name'] = $brideCNIC."_brideCnicBack".$_FILES["brideCnicBack"][''];
$this->load->library('upload', $brideCnicBack); 
$this->upload->initialize($brideCnicBack);
$this->upload->do_upload('brideCnicBack');
$brideBackName = $this->upload->data();
$formArray['ma_brideCnicBack']  = $brideBackName['file_name'];

}

}

//Father/Guardian CNIC Front 

if($_FILES["fatherCnicFront"]["tmp_name"])
{
$path = $_FILES['fatherCnicFront']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["fatherCnicFront"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Bride CNIC Back /////////////


$fatherCnicFront['upload_path'] = 'assets/marriageforms/'; 
$fatherCnicFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
$fatherCnicFront['file_name'] = $brideCNIC."_fatherCnicFront".$_FILES["fatherCnicFront"][''];
$this->load->library('upload', $fatherCnicFront); 
$this->upload->initialize($fatherCnicFront);
$this->upload->do_upload('fatherCnicFront');
$fatherFrontName = $this->upload->data();
$formArray['ma_fatherCnicFront']  = $fatherFrontName['file_name'];

}

}




//Father/Guardian CNIC Back

if($_FILES["fatherCnicBack"]["tmp_name"])
{
$path = $_FILES['fatherCnicBack']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["fatherCnicBack"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Father/Guardian CNIC Back /////////////


$fatherCnicBack['upload_path'] = 'assets/marriageforms/'; 
$fatherCnicBack['allowed_types'] = 'jpg|jpeg|png|gif'; 
$fatherCnicBack['file_name'] = $brideCNIC."_fatherCnicBack".$_FILES["fatherCnicBack"][''];
$this->load->library('upload', $fatherCnicBack); 
$this->upload->initialize($fatherCnicBack);
$this->upload->do_upload('fatherCnicBack');
$fatherBackName = $this->upload->data();
$formArray['ma_fatherCnicBack']  = $fatherBackName['file_name'];

}

}


//Nikahnama Front 

if($_FILES["nikahnamFront"]["tmp_name"])
{
$path = $_FILES['nikahnamFront']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["nikahnamFront"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Bride CNIC Back /////////////


$nikahnamFront['upload_path'] = 'assets/marriageforms/'; 
$nikahnamFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
$nikahnamFront['file_name'] = $brideCNIC."_nikahnamFront".$_FILES["nikahnamFront"][''];
$this->load->library('upload', $nikahnamFront); 
$this->upload->initialize($nikahnamFront);
$this->upload->do_upload('nikahnamFront');
$nikahnamFrontName = $this->upload->data();
$formArray['ma_nikahnamFront']  = $nikahnamFrontName['file_name'];

}

}

//Nikahnama Front 

if($_FILES["nikahnamBack"]["tmp_name"])
{
$path = $_FILES['nikahnamBack']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$this->session->set_flashdata('error','Invalid Face Image Format');
redirect(base_url('Dist_MA_lz_19'));		
}
else if(($_FILES["nikahnamBack"]["size"] > 409600))
{
$this->session->set_flashdata('error','Face Image Size Exceeded then 400KB');
redirect(base_url('Dist_MA_lz_19'));	
}
else
{
/////////////// Bride CNIC Back /////////////


$nikahnamBack['upload_path'] = 'assets/marriageforms/'; 
$nikahnamBack['allowed_types'] = 'jpg|jpeg|png|gif'; 
$nikahnamBack['file_name'] = $brideCNIC."_nikahnamBack".$_FILES["nikahnamBack"][''];
$this->load->library('upload', $nikahnamBack); 
$this->upload->initialize($nikahnamBack);
$this->upload->do_upload('nikahnamBack');
$nikahnamBackName = $this->upload->data();
$formArray['ma_nikahnamBack']  = $nikahnamBackName['file_name'];

}

}

$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",$brideCNIC);
$this->db->where("MustahiqType","Guzara Allowance");
$this->db->where("payment_status",1);
$GAquery=$this->db->get();

$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",$brideCNIC);
$this->db->where("MustahiqType","Deeni Madaris");
$this->db->where("payment_status",1);
$DMquery=$this->db->get();

$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",$brideCNIC);
$this->db->where("MustahiqType","Educational Stipend (A)");
$this->db->where("payment_status",1);
$ESquery=$this->db->get();

$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("mustahiq_cnic",$brideCNIC);
$this->db->where("MustahiqType","Marriage Assistance");
//$this->db->where("payment_status",1);
$MAquery=$this->db->get();

//echo $this->db->last_query();

if($GAquery->num_rows() > 0)
{
$this->session->set_flashdata('error','CNIC already Exists and received amount in <strong>Guzara Allowance</strong> Head');
redirect(base_url('Dist_MA_lz_19'));
exit;
}
else if ($DMquery->num_rows() > 0)
{
$this->session->set_flashdata('error','CNIC already Exists and received amount in <strong>Deeni Madaris</strong> Head');
redirect(base_url('Dist_MA_lz_19'));
exit;
}
else if($ESquery->num_rows() > 0)
{
$this->session->set_flashdata('error','CNIC already Exists and received amount in <strong>Educational Stipend</strong> Head');
redirect(base_url('Dist_MA_lz_19'));
exit;
}

else if($MAquery->num_rows() > 0)
{
$this->session->set_flashdata('error','CNIC already Exists  in <strong>Marriage Assistance</strong> Head');
redirect(base_url('Dist_MA_lz_19'));
exit;
}

else
{


// Userlog entry
$result = $this->db->affected_rows();	
$userLog = array();
$userLog['PersonName'] = $this->session->userdata('district_name');	
$userLog['UserName'] = $this->session->userdata('district_name');	
$userLog['Activity']  = "Marriage Assistance Mustahiq registration";
$userLog['Description']  = "Marriage Assistance Mustahiq Registered successfully.";
$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
$userLog['Day'] = date("d");
$userLog['Month'] = date("m");
$userLog['Year'] = date("Y");
$this->General_model->user_log($userLog); // Access Method


$this->Dist_MA_mustahiq_reg_model->manage_ma_mustahiq_payment($formArray);	
$this->session->set_flashdata('success','Record Added Successfully..!');
redirect(base_url('Dist_MA_lz_19'));
}
}









}
