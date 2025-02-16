<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends CI_Controller 
{

function __construct()
{
parent::__construct();
$this->load->model('UserManagement_model');
$this->load->model('General_model');
}

 

public function index()
{
	
	
/*$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','welfare_home');
$data['get_welfare_home'] = $this->db->count_all_results();	
	
$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','rehab_center');
$data['get_rehab_center'] = $this->db->count_all_results();

$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','panahgah');
$data['get_panahgah'] = $this->db->count_all_results();


$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','women_hostel');
$data['get_women_hostel'] = $this->db->count_all_results();

$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','visual_handicapped');
$data['get_visual_handicapped'] = $this->db->count_all_results();


$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','hearing_mute');
$data['get_hearing_mute'] = $this->db->count_all_results();


$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','mrph_center');
$data['get_mrph_center'] = $this->db->count_all_results();

$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','vtcdp_center');
$data['get_vtcdp_center'] = $this->db->count_all_results();

$this->db->select('*');
$this->db->from('sw_centers');
$this->db->where('institutes_type','darul_kafala');
$data['get_darul_kafala'] = $this->db->count_all_results();*/


/*$report_qry = "SELECT * FROM users WHERE Active = 1 order by user_id DESC";
$query = $this->db->query($report_qry);
$data['sw_centers'] = $query->result();*/



//$data['getMasterFields'] = $this->General_model->get_allmaster_fields();

$data['get_districts'] = $this->General_model->get_districts();	
$this->load->view('pza/userManagement',$data);
}






/*function add_ngo()
{

	$formArray['ngo_district_id']  = $this->input->post("ngo_district_id");
	$formArray['area_sector']  = $this->input->post("area_sector");
	$formArray['specified_area']  = $this->input->post("specified_area");
	$formArray['ngo_status']  = $this->input->post("ngo_status");
	$formArray['district_id']  = $this->session->userdata('district_id');	
	$formArray['added_by']  = $this->session->userdata('user_id');
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$result = $this->Direct_institution_reg_model->add_ngo($formArray);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "ngo registeration";
	$userLog['Description']  = "ngo registered successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "ngo registeration";
	$userLog['Description']  = "ngo not registered action failded";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
	
	
	

}*/


/*function add_direct_institute_reg()
{


	$get_prov_name = $this->db->select('*')->from('district_users')->where('id',$this->input->post("selected_district_id"))->get();

	$formArray['Province'] = $get_prov_name->row('Province');
	$formArray['District_Name'] = $get_prov_name->row('district_name');
	
	
	$formArray['selected_district_id']  = $this->input->post("selected_district_id");
	$formArray['center_name']  = $this->input->post("center_name");
	$formArray['institutes_type']  = $this->input->post("institutes_type");
	$formArray['focal_person_name']  = $this->input->post("focal_person_name");
	$formArray['contact_number']  = $this->input->post('contact_number');	
	$formArray['address']  = $this->input->post('address');	
	$formArray['type_of_center']  = $this->input->post('type_of_center');	
	$formArray['sub_type']  = $this->input->post('sub_type');	
	$formArray['center_status']  = $this->input->post('center_status');	
	$formArray['non_functional_reason']  = $this->input->post('non_functional_reason');	
	$formArray['building_status']  = $this->input->post('building_status');	
	$formArray['total_rooms']  = $this->input->post('total_rooms');	
	
	$formArray['living_capacity']  = $this->input->post('living_capacity');
	$formArray['food_provided']  = $this->input->post('food_provided');	
	$formArray['food_bywhom']  = $this->input->post('food_bywhom');	
	
	$formArray['pick_and_drop']  = $this->input->post('pick_and_drop');	
	$formArray['number_of_vehicles_on']  = $this->input->post('number_of_vehicles_on');
	$formArray['number_of_vehicles_off']  = $this->input->post('number_of_vehicles_off');
	$formArray['institute_level']  = $this->input->post('institute_level');
	
	$formArray['added_by']  = $this->session->userdata('user_id');
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$result = $this->Direct_institution_reg_model->add_direct_institute_reg($formArray);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "institute registeration";
	$userLog['Description']  = "institute registered successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "institute registeration";
	$userLog['Description']  = "institute not registered action failded";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
	
	
	

}*/



/*function add_direct_institute_reg_edit()
{
	
	$get_prov_name = $this->db->select('*')->from('district')->where('id',$this->input->post("selected_district_id"))->get();

	$formArray['Province'] = $get_prov_name->row('Province');
	$formArray['District_Name'] = $get_prov_name->row('district_name');
	
	$record_id  = $this->input->post("record_id");
	$formArray['selected_district_id']  = $this->input->post("selected_district_id");
	$formArray['center_name']  = $this->input->post("center_name");
	$formArray['institutes_type']  = $this->input->post("institutes_type");
	$formArray['focal_person_name']  = $this->input->post("focal_person_name");
	$formArray['contact_number']  = $this->input->post('contact_number');	
	$formArray['address']  = $this->input->post('address');	
	$formArray['type_of_center']  = $this->input->post('type_of_center');	
	$formArray['sub_type']  = $this->input->post('sub_type');	
	$formArray['center_status']  = $this->input->post('center_status');	
	$formArray['non_functional_reason']  = $this->input->post('whyNonFunctional');	
	$formArray['building_status']  = $this->input->post('building_status');	
	$formArray['total_rooms']  = $this->input->post('total_rooms');	
	
	$formArray['living_capacity']  = $this->input->post('living_capacity');
	$formArray['food_provided']  = $this->input->post('food_provided');	
	$formArray['food_bywhom']  = $this->input->post('food_bywhom');	
	
	$formArray['pick_and_drop']  = $this->input->post('pick_and_drop');	
	$formArray['number_of_vehicles_on']  = $this->input->post('number_of_vehicles_on');
	$formArray['number_of_vehicles_off']  = $this->input->post('number_of_vehicles_off');
	$formArray['institute_level']  = $this->input->post('institute_level');
	
	$formArray['added_by']  = $this->session->userdata('user_id');
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$result = $this->Direct_institution_reg_model->update_center_data($record_id,$formArray);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "institute registeration updated";
	$userLog['Description']  = "institute registered updated successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Updated Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "institute not updated";
	$userLog['Description']  = "institute not updated action failded";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
	
	
	

}*/




/*function fetch_institutes()
{
	$dist_value = $this->input->post("dist_value");
	$inst_type = $this->input->post("inst_type");
	echo $this->Direct_institution_reg_model->fetch_institutes($dist_value,$inst_type);	
}



function fetch_institutes_customize()
{
	$dist_value = $this->input->post("dist_value");
	echo $this->Direct_institution_reg_model->fetch_institutes_customize($dist_value);	
}
*/





/*function add_institutes_users()
{
	
	$get_prov_name = $this->db->select('Province')->from('district')->where('id',$this->input->post("district_id"))->get();
	$province_name = $get_prov_name->row('Province');
	$formArray['Province'] = $province_name;
	
	$formArray['entity_name'] = $this->input->post("entity_name");
	$formArray['user_name'] = $this->input->post("user_name");
	$formArray['password'] = $this->input->post("password");
	$formArray['role'] = $this->input->post("role");
	$formArray['district_id'] = $this->input->post("district_id");
	$formArray['institute_id'] = $this->input->post("institute_id");
	$formArray['users_previllages'] = $this->input->post("users_previllages");
	$formArray['Province'] = $province_name;
	$result = $this->Direct_institution_reg_model->add_institutes_users($formArray);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "user registeration";
	$userLog['Description']  = "user registered successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "user registeration";
	$userLog['Description']  = "user not registered action failded";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
}
*/
/*
function fetch_fieldTypes()
{
	$field_typevalue = $this->input->post("field_typevalue");
	$this->db->where('field_type', $field_typevalue);
	$this->db->order_by('id','DESC');
	$query = $this->db->get('master_fields');
	//echo $this->db->last_query();
	$output = '<option value="">---View List---</option>';
	foreach($query->result() as $row)
	{
	$output .= '<option value="'.$row->field_name.'">'.$row->field_name.'</option>';
	}
	echo $output; 

}*/


function manage_users_passwords()
{
	$user_id = $this->input->post("user_id");
	$updatedBy = $this->session->userdata('username');
	//$formArray['entity_name'] = $this->input->post("entity_name");
	$formArray['user_name'] = $this->input->post("user_name");
	$formArray['password'] = $this->input->post("password");
	$formArray['Active'] = $this->input->post("status");
	$formArray['district_id'] = $this->input->post("district_id");
	$getDistrictName = $this->db->select('district_name')->from('district_users')->where('id',$this->input->post("district_id"))->get();
	$districtName = $getDistrictName->row('district_name');
	$formArray['districtName'] = $districtName;
	$formArray['updatedBy'] = $updatedBy;
	$date = date("d/m/Y H:i:s:a");
	$formArray['updatedOn']  = $date;
	$result = $this->UserManagement_model->zakatPaidStaffUserPassword($formArray,$user_id);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['PersonName'] = $this->session->userdata('name');	
	$userLog['UserName'] = $this->session->userdata('username');	
	$userLog['Activity']  = $districtName." user password updated";
	$userLog['Description']  = "user password updated successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	//$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Updated Successfully..!');
	redirect(base_url('UserManagement'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('name');	
	$userLog['UserName'] = $this->session->userdata('username');	
	$userLog['Activity']  = $districtName." user password updated";
	$userLog['Description']  = "user password updated failed.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Updated Please Try Again.');
	redirect(base_url('UserManagement'));
	exit;
	}
	
}


function districtUserPassword()
{

	$user_id = $this->input->post("user_id");
	$updatedBy = $this->session->userdata('username');
	$districtName = $this->input->post("user_name");
	$formArray['username'] = $this->input->post("user_name");
	$formArray['password'] = $this->input->post("password");
	$formArray['status'] = $this->input->post("status");
	$formArray['updatedBy'] = $updatedBy;
	$date = date("d/m/Y H:i:s:a");
	$formArray['updatedOn']  = $date;
/*	$formArray['district_id'] = $this->input->post("district_id");
	$get_prov_name = $this->db->select('district_name')->from('district_users')->where('id',$this->input->post("district_id"))->get();
	$province_name = $get_prov_name->row('district_name');
	$formArray['district_name'] = $province_name;*/
	
	$result = $this->UserManagement_model->districtUserPassword($formArray,$user_id);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['PersonName'] = $this->session->userdata('name');	
	$userLog['UserName'] = $this->session->userdata('username');	
	$userLog['Activity']  = $districtName." user password updated";
	$userLog['Description']  = "user password updated successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	//$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Updated Successfully..!');
	redirect(base_url('UserManagement'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('name');	
	$userLog['UserName'] = $this->session->userdata('username');	
	$userLog['Activity']  = $districtName." user password updated";
	$userLog['Description']  = "user password updated failed.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Updated Please Try Again.');
	redirect(base_url('UserManagement'));
	exit;
	}
	

}


/*function add_masterfields()
{
	$tblname = "master_fields";
	$formArray = array();
	$formArray['field_type'] = $this->input->post("field_typevalue");
	$formArray['field_name'] = $this->input->post("field_newvalue");
		
	$result = $this->General_model->add_data($formArray,$tblname);
	
	$results = $result['affected_rows'];
	
	if($results == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = $user_id." added master field";
	$userLog['Description']  = "master field added successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "try to add new master field";
	$userLog['Description']  = "new field added failed.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
}*/



/*function add_main_masterfields()
{
	$tblname = "master_fields";
	$formArray = array();
	$formArray['field_name'] = $this->input->post("field_name");
	$formArray['field_type'] = $this->input->post("field_type");
	$formArray['status'] = 1;
	$formArray['add_date'] = date("Y-m-d");
		
	$result = $this->General_model->add_data($formArray,$tblname);
	
	$results = $result['affected_rows'];
	
	if($results == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = $user_id." added master field";
	$userLog['Description']  = "master field added successfully";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	else
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = "try to add new master field";
	$userLog['Description']  = "new field added failed.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Added Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
}


*/
/*function edit_institutes()
{
	
	
	
	$data['center_type'] = $this->General_model->get_master_fields("center_type");
	$data['sw_center_sub_type'] = $this->General_model->get_master_fields("sw_center_sub_type");
	$data['center_status'] = $this->General_model->get_master_fields("center_status");
	$data['building_status'] = $this->General_model->get_master_fields("building_status");
	
	//$data['getMasterFields'] = $this->General_model->get_allmaster_fields();
	
	$data['get_districts'] = $this->General_model->get_districts();
	
	$recordid = $this->uri->segment(3);
	$this->load->view('directorate/direct_institution_reg_edit',$data);
	
}
*/
}
