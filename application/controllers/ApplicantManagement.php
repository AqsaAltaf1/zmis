<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantManagement extends CI_Controller 
{

function __construct()
{
parent::__construct();
$this->load->model('ApplicantManagement_model');
$this->load->model('General_model');
$this->load->model('Dist_GA_mustahiq_reg_model');
}

 

public function index()
{
	
$data['getAccountHead'] = $this->General_model->get_master_fields("zakatAccountHeads");

$data['getAllDistrict'] = $this->ApplicantManagement_model->getAllDistrict();	
$this->load->view('pza/applicantManagement',$data);
}




function mustahiqSearch()

{
$data['getAccountHead'] = $this->General_model->get_master_fields("zakatAccountHeads");
$data['getAllDistrict'] = $this->ApplicantManagement_model->getAllDistrict();	

$mustahiqType = ($this->input->post("mustahiqType") == "" ? "%%" : $this->input->post("mustahiqType"));
$districtName = ($this->input->post("districtName") == "" ? "%%" : $this->input->post("districtName"));
$searchCNIC = ($this->input->post("searchCNIC") == "" ? "%%" : $this->input->post("searchCNIC"));
/*$age = ($this->input->post("age") == "" ? "%%" : $this->input->post("age"));

preg_match_all('!\d+!', $age, $matches);
$min_age = $matches[0][0];
$max_age = $matches[0][1];*/


$search_qry = "SELECT * FROM mustahiqeen WHERE 
MustahiqType Like '".$mustahiqType."'
AND District_Name Like '".$districtName."'
AND mustahiq_cnic Like '".$searchCNIC."'";

$customizeSearch = $this->db->query($search_qry);
$data['getMustahiqInfo'] = $customizeSearch->result_array();



$data['searchCNIC'] = $this->input->post("searchCNIC") == "" ? "" : $this->input->post("searchCNIC");
$data['mustahiqType'] = $this->input->post("mustahiqType") == "" ? "" : $this->input->post("mustahiqType");
$data['districtName'] = $this->input->post("districtName") == "" ? "" : $this->input->post("districtName");
$this->load->view('pza/applicantManagement',$data);
}



function mustahiqUpdate()
	{

	
	$getmustahiq_id  = $this->uri->segment(3);
	$userid  = $this->session->userdata('id');
	$data['get_all_lzc'] = $this->General_model->get_all_lzc($userid);
	$data['getmustahiq_id'] = $getmustahiq_id;
	$data['GetLzcLocality'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("LzcLocality");
	$data['GetGender'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Gender");
	$data['GetGuardianType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GuardianType");
	$data['GetIdentityOption'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IdentityOption");
	$data['GetIdentityOptionSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("IdentityOptionSubType");
	$data['GetContectType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ContectType");
	$data['GetSehatCard'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SehatCard");
	$data['GetYesNo'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("YesNo");
	$data['GetMaritalStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("MaritalStatus");
	$data['GetSkills'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Skills");
	$data['GetSchoolGoingChild'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SchoolGoingChild");
	$data['GetChildType1'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ChildType1");
	$data['GetChildType2'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ChildType2");
	
	
	
	$districtID = $this->session->userdata('id');
	$userName = $this->session->userdata('username');
	//$data['getGroupSecretaryLZC'] = $this->FormHandingOverModel->getGroupSecretaryLZC($districtID,$userName);
	//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
	$this->load->view('pza/mustahiqUpdate',$data);
	
	}


function mustahiqUpdateManage()
	{
		
		$formArray = array();
		$mustahiq_id  = $this->input->post("mustahiq_id");
		$updatedBy  = $this->session->userdata('username');
		$formArray['mustahiq_cnic'] = $this->input->post("mustahiq_cnic");
		$formArray['updatedBy']  = $updatedBy;
		
		$date = date("d/m/Y H:i:s:a");
		$formArray['updatedOn']  = $date;
		$formArray['Remarks']  = $this->input->post("comments");
		
		$this->ApplicantManagement_model->mustahiqUpdateManage($formArray,$mustahiq_id);
		
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');
		
		redirect(base_url('ApplicantManagement'));
		
	}


function auditReconsideration()
	{
		
		$formArray = array();
		$getmustahiq_id  = $this->uri->segment(3);
		//$mustahiq_id  = $this->input->post("mustahiq_id");
		$updatedBy  = $this->session->userdata('username');
		//$formArray['mustahiq_cnic'] = $this->input->post("mustahiq_cnic");
		$formArray['status'] = 1;
		$formArray['approved_status'] =0;
		$formArray['Remarks'] = '';
		$formArray['rejectionReason'] = '';
		$formArray['Audit_Observation'] = '';
		$formArray['Audit_CNIC'] = '';
		$formArray['AuditDate'] = '';
		$formArray['selected_lz11'] = 0;	
		$formArray['updatedBy']  = $updatedBy;
		$date = date("d/m/Y H:i:s:a");
		$formArray['updatedOn']  = $date;
		
		$this->ApplicantManagement_model->auditReconsideration($formArray,$getmustahiq_id);
		
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');
		
		redirect(base_url('ApplicantManagement'));
		
	}



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
	$formArray['entity_name'] = $this->input->post("entity_name");
	$formArray['user_name'] = $this->input->post("user_name");
	$formArray['password'] = $this->input->post("password");
	$formArray['status'] = $this->input->post("status");
	$formArray['district_id'] = $this->input->post("district_id");
	$get_prov_name = $this->db->select('district_name')->from('district_users')->where('id',$this->input->post("district_id"))->get();
	$province_name = $get_prov_name->row('district_name');
	$formArray['district_name'] = $province_name;
	
	$result = $this->Direct_institution_reg_model->manage_users_passwords($formArray,$user_id);
	
	if($result == 1)
	{
	$userLog = array();
	$userLog['person_name'] = $this->session->userdata('person_name');	
	$userLog['UserName'] = $this->session->userdata('user_name');	
	$userLog['Activity']  = $user_id." user password updated";
	$userLog['Description']  = "user password updated successfully";
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
	$userLog['Activity']  = "user password updated";
	$userLog['Description']  = "user password updated failed.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['add_date'] = date("Y-m-d");
	$this->General_model->user_log($userLog); // Access Method
	$this->session->set_flashdata('error','Record Not Updated Please Try Again.');
	redirect(base_url('Direct_institution_reg'));
	exit;
	}
	
}








}
