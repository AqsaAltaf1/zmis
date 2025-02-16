<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_employees extends CI_Controller {



function __construct()
{
parent::__construct();
$this->load->model('Dist_employee_model');
//$this->load->model('Dist_admin_expense_model');
}



public function index()
{

$userid = $this->session->userdata('id');

$data['get_all_districts'] = $this->Dist_employee_model->get_all_districts();

$data['get_all_lzcs'] = $this->Dist_employee_model->get_all_lzcs($userid);

$data['get_zakat_staff'] = $this->Dist_employee_model->get_zakat_staff();


$data['get_zakat_staff_listing'] = $this->Dist_employee_model->get_zakat_staff_listing($userid);

$this->load->view('district/dist_employees',$data);
}



function manage_dist_employees()
{


$lzcArrays = array();
$usersArray = array();
$formArray = array();

$formArray['district_id'] = $this->session->userdata('id');	
$formArray['name']  = $this->input->post("name");
$formArray['f_name']  = $this->input->post("f_name");
$formArray['designation_id']  = $this->input->post("designation");

$formArray['cnic']  = str_replace("-", "", $this->input->post("cnic"));


//$formArray['password']  = $this->input->post("password");

$formArray['dob']  = $this->input->post("dob");
$formArray['domicile']  = $this->input->post("domiciles");
$formArray['marital_status']  = $this->input->post("marital_status");
$formArray['contact_no']  = $this->input->post("contact_no");
$formArray['qualification']  = $this->input->post("qualification");
$formArray['address']  = $this->input->post("address");
$formArray['appointment_date']  = $this->input->post("appointment_date");
$formArray['job_description']  = $this->input->post("job_description");

$config['upload_path'] = 'assets/uploads/'; 
$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config['file_name'] = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
$get_albumimg = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];


$this->load->library('upload', $config); 

$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;
$formArray['picture']  = $get_albumimg;





$this->db->select("*");
$this->db->from("zakat_paid_staff_list");
$this->db->where("cnic",$this->input->post("cnic"));
$get_cnic_count = $this->db->get()->num_rows();

if($get_cnic_count > 0)
{
$this->session->set_flashdata('error','CNIC Already Exists.!');	
redirect(base_url('Dist_employees'));
exit;
}



if($this->upload->do_upload('emp_img'))
{
$getlastid = $this->Dist_employee_model->manage_dist_employees($formArray);	


$designation_id  = $this->input->post("designation");
if($designation_id == 1)
{

$getlzc_list  = $this->input->post("getlzc_list");	
foreach($getlzc_list as $getlzc_listvalue)
{

$lzcArrays['gs_name'] = $this->input->post("name");
$lzcArrays['gs_username'] = str_replace("-", "", $this->input->post("cnic"));
$lzcArrays['gs_id'] = $getlastid;

$userid = $this->input->post("userid");

$usersArray['entity_name']  = $this->input->post("name");
$usersArray['user_name']  = str_replace("-", "", $this->input->post("cnic"));
$usersArray['password']  = $this->input->post("password");
$usersArray['role']  = "gs";
$usersArray['district_id']  = $this->session->userdata('id');
$usersArray['zakat_paid_staff_id'] = $getlastid;


$this->Dist_employee_model->update_lzcs_gs($lzcArrays,$getlzc_listvalue);


//echo $getlzc_listvalue;
}
$this->Dist_employee_model->manage_users_info($usersArray);	

}


$this->session->set_flashdata('success','Record Added Successfully..!');

if($designation_id == 2)
{
$usersArray['entity_name']  = $this->input->post("name");
$usersArray['user_name']  = str_replace("-", "", $this->input->post("cnic"));
$usersArray['password']  = $this->input->post("password");
$usersArray['role']  = "audit";
$usersArray['district_id']  = $this->session->userdata('id');
$usersArray['zakat_paid_staff_id'] = $getlastid;


$this->Dist_employee_model->update_lzcs_audit($usersArray);
}





} 
else
{
	$this->session->set_flashdata('error','Picture not in proper format or not uploaded successfully.!');	
redirect(base_url('Dist_employees'));
exit;
}
redirect(base_url('Dist_employees'));	
}




function manage_dist_editemployees()
{

$formArray = array();
$formArray_users = array();
$formArray_lzcs = array();

$formArray['district_id'] = $this->session->userdata('id');	
$formArray['name']  = $this->input->post("name");
$formArray['f_name']  = $this->input->post("f_name");
$formArray['designation_id']  = $this->input->post("designation");
$formArray['cnic']  = str_replace("-", "", $this->input->post("cnic"));
$formArray['dob']  = $this->input->post("dob");
$formArray['domicile']  = $this->input->post("domiciles");
$formArray['marital_status']  = $this->input->post("marital_status");
$formArray['contact_no']  = $this->input->post("contact_no");
$formArray['qualification']  = $this->input->post("qualification");
$formArray['address']  = $this->input->post("address");
$formArray['appointment_date']  = $this->input->post("appointment_date");
$formArray['job_description']  = $this->input->post("job_description");

$getcnic = str_replace("-", "", $this->input->post("cnic"));
$get_name = $this->input->post("name");
$get_emp_id  = $this->input->post("get_emp_id");

$get_dist_name = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$get_emp_id)->get();
$get_db_cnic = $get_dist_name->row('cnic');
$get_db_name = $get_dist_name->row('name');

$this->Dist_employee_model->updateuser_emp($get_emp_id,$formArray);	

if($get_db_cnic != $getcnic)
{
	$formArray_users['user_name']  = $getcnic;
	$this->Dist_employee_model->updateuser_emp_userstable($get_emp_id,$formArray_users);
	
	$formArray_lzcs['gs_username']  = $getcnic;
	$this->Dist_employee_model->updateuser_emp_lzctable($get_emp_id,$formArray_lzcs);
			
}

if($get_db_name != $get_name)
{
	$formArray_users['entity_name']  = $get_name;
	$this->Dist_employee_model->updateuser_emp_userstable($get_emp_id,$formArray_users);
	
	$formArray_lzcs['gs_name']  = $get_name;
	$this->Dist_employee_model->updateuser_emp_lzctable($get_emp_id,$formArray_lzcs);
			
}


$getimage = $_FILES['emp_img']['tmp_name'];

if(!empty($getimage))
{

$config['upload_path'] = 'assets/uploads/'; 
$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config['file_name'] = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
$get_albumimg = date('ymdghsi').'-'.$_FILES["emp_img"]['name'];
$this->load->library('upload', $config); 
$formArrayimg['picture']  = $get_albumimg;

if($this->upload->do_upload('emp_img'))
{
$this->Dist_employee_model->updateuser_emp_img($get_emp_id,$formArrayimg);
}
}

$this->session->set_flashdata('success','Record Updated Successfully..!');
redirect(base_url('Dist_employees'));	

}


function manage_delete_dist_employees()
{
$get_emp_id = $this->uri->segment(3); // 1stsegment
$this->Dist_employee_model->delete_dist_employees($get_emp_id);
$this->session->set_flashdata('success','Record Deleted Successfully..!');
redirect(base_url('Dist_employees'));

}


function dist_zakatpaid_user()
{
$get_emp_id = $this->uri->segment(3); // 1stsegment
$this->load->view('district/dist_zakatpaid_user_profile',$get_emp_id);

}




function dist_zakatpaid_user_lzcs()
{
	
$get_emp_id = $this->uri->segment(3); // 1stsegment	
$userid = $this->session->userdata('id');

$data['get_emp_id'] = $get_emp_id;

$data['gs_selected_lzcs'] = $this->Dist_employee_model->gs_selected_lzcs($get_emp_id);

$data['get_all_lzcs'] = $this->Dist_employee_model->get_all_lzcs($userid);	
	
$this->load->view('district/dist_employees_gs_lzc_list',$data);

}




function manage_gs_lzcslists_delete()
{
	
$get_emp_id = $this->uri->segment(3);
$get_lzc_id = $this->uri->segment(4);
	
$userid = $this->session->userdata('id');

$data['get_emp_id'] = $get_emp_id;

$data['gs_selected_lzcs'] = $this->Dist_employee_model->gs_selected_lzcs($get_emp_id);

$data['get_all_lzcs'] = $this->Dist_employee_model->get_all_lzcs($userid);	

$query=$this->db->query("update lzc_list SET gs_id='',gs_username='',gs_name='' where id = '".$get_lzc_id."'");

redirect(base_url('Dist_employees/dist_zakatpaid_user_lzcs/'.$get_emp_id));	
	
//$this->load->view('district/dist_employees_gs_lzc_list',$data);

}


function manage_gs_lzcslists_updates()
{

$getlzc_list  = $this->input->post("getlzc_list");	
$gs_id  = $this->input->post("gs_id");	

$get_dist_name = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$gs_id)->get();

foreach($getlzc_list as $getlzc_listvalue)
{

$lzcArrays['gs_name'] = $get_dist_name->row('name');;
$lzcArrays['gs_username'] = $get_dist_name->row('cnic');;
$lzcArrays['gs_id'] = $gs_id;
$userid = $this->input->post("userid");

$this->Dist_employee_model->update_lzcs_gs($lzcArrays,$getlzc_listvalue);

}


redirect(base_url('Dist_employees/dist_zakatpaid_user_lzcs/'.$gs_id));	


}




}
