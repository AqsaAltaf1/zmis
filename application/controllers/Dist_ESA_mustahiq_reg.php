<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_ESA_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_ESA_mustahiq_reg_model');
	$this->load->model('Dist_DM_mustahiq_reg_model');
	$this->load->model('General_model');
	}
	
	
	
	public function index()
	{
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');

		$userid = $this->session->userdata('id');
		$data['get_all_lzcs'] = $this->Dist_DM_mustahiq_reg_model->get_all_lzcs($userid);
		$data['get_all_coleges_uni_list'] = $this->Dist_ESA_mustahiq_reg_model->get_all_coleges_uni_list($userid);
		$data['getCategory'] = $this->General_model->get_master_fields("otherCategory");
		$data['getGender'] = $this->General_model->get_master_fields("Gender");
		$data['getEducationLevel'] = $this->General_model->get_master_fields("Qualification");
		$data['getStipendDuration'] = $this->General_model->get_master_fields("stipendDuration");
		
		$data['dist_esa_mustahiq_list'] = $this->Dist_ESA_mustahiq_reg_model->dist_esa_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		$this->load->view('district/dist_esa_mustahiq_reg',$data);
	}
	
	
	
	function manage_esa_mustahiq_reg()
	{
	//Getting LZC Name	
	$LZC_id  = $this->input->post("lzcID");
	$get_lzcname = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
	$LZCActualName = $get_lzcname->row('lzc_name');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	$formArray = array();
	$formArray['MustahiqType'] = "Educational Stipend (A)";
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['District_Name'] = $this->session->userdata('district_name');
	$formArray['LZC_id']  = $this->input->post("lzcID");
	$formArray['LZCActualName']  = $LZCActualName;
	$formArray['payment_status']  = 1;
	$formArray['payment_year']  = $getfinancial_year;
	$formArray['payment_installment']  = $getfinancial_installment;
	$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
	$formArray['father_name']  = $this->input->post("f_name");
	$formArray['mustahiq_cnic']  = str_replace("-", "", $this->input->post("cnic"));
	$formArray['contact_number']  = str_replace("-", "", $this->input->post("cell_no"));
	$formArray['gender']  = $this->input->post("gender");
	$formArray['InstituteName']  = $this->input->post("college_university_name");
	$formArray['ClassDarja']  = $this->input->post("class_department");
	$formArray['Qualification']  = $this->input->post("educationalLevelText");
	$formArray['stipendDuration']  = $this->input->post("stipendDuration")." Month/s";
	$formArray['dob']  = $this->input->post("dob");
	$formArray['istehqaqnumber']  = $this->input->post("Istehqaq_no");
	$formArray['category']  = $this->input->post("category");
	$formArray['permanent_address']  = $this->input->post("address");
	$formArray['amount']  = $this->input->post("amount");
	$formArray['year']= $this->input->post("year");
	$formArray['installment']= $this->input->post("installment");
	$formArray['addedby'] = $this->session->userdata('district_name');
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	//For Duplicate Entry...
	$this->db->select("*");
	$this->db->from("mustahiqeen");
	$this->db->where("mustahiq_cnic",$this->input->post("cnic"));
	$query=$this->db->get();
	
	if($query->num_rows() > 0)
	{
	$this->session->set_flashdata('error','CNIC already Exists..!');
	redirect(base_url('Dist_ESA_mustahiq_reg'));
	exit;
	}

	
	
	// Userlog entry
	$result = $this->db->affected_rows();	
	$userLog = array();
	$userLog['PersonName'] = $this->session->userdata('district_name');	
	$userLog['UserName'] = $this->session->userdata('district_name');	
	$userLog['Activity']  = "Educational Stipend Mustahiq entry";
	$userLog['Description']  = "Educational Stipend Mustahiq entry successfully.";
	$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
	$userLog['Day'] = date("d");
	$userLog['Month'] = date("m");
	$userLog['Year'] = date("Y");
	$this->General_model->user_log($userLog); // Access Method

	$this->Dist_ESA_mustahiq_reg_model->manage_esa_mustahiq_reg($formArray);
	$this->session->set_flashdata('success','Record Added Successfully..!');
	redirect(base_url('Dist_ESA_mustahiq_reg'));	
	
	}
	
	
	
	
function EduStipendPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');

	
	$data['getEduStipendPrint'] = $this->Dist_ESA_mustahiq_reg_model->getEduStipendPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/distEduStipendPrint',$data);
}	
	
	
	
	function deleteESARecord(){
		
		$studentID=$this->uri->segment(3);
	  	$response=$this->Dist_ESA_mustahiq_reg_model->deleteESArecord($studentID);
	if($response==true){
		
	  	$this->session->set_flashdata('success','Record Deleted Successfully..!');
		redirect(base_url('Dist_ESA_mustahiq_reg'));
  		}
	else
		{
	  	$this->session->set_flashdata('error','Record not Deleted Successfully..!');
		redirect(base_url('Dist_ESA_mustahiq_reg'));
		}
	  }
	  
	  
	  
	  
	  
	
	
	
}
