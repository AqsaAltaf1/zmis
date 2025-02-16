<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_GA_Lz_19 extends CI_Controller 
{

	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_GA_Lz_19_model');
	$this->load->model('FormHandingOverModel');
	$this->load->model('Dist_GA_mustahiq_reg_model');
	$this->load->model('General_model');
	}
	
	
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$get_inst = $getfinancialdata->row('installment');
		
		
		
		$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid,$getfinancial_year);
		$data['get_all_lzc'] = $this->Dist_GA_Lz_19_model->get_all_lzc($userid);
		$this->load->view('district/dist_ga_lz_19',$data);
	}
	
	
	function gsLz19()
	{
		
		$userid  = $this->session->userdata('id');
		$userName = $this->session->userdata('username');
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$get_inst = $getfinancialdata->row('installment');
		
		$data['getGsMustahiqeen'] = $this->Dist_GA_Lz_19_model->getGsMustahiqeen($userid,$getfinancial_year,$userName);
		$data['get_all_lzc'] = $this->Dist_GA_Lz_19_model->get_all_lzc($userid);
		$this->load->view('gs/gsLz19',$data);
	}
	
	
	function Lz19Print()
				{

		$userid  = $this->session->userdata('id');
		$userName = $this->session->userdata('username');
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$get_inst = $getfinancialdata->row('installment');
		
		$data['getGsMustahiqeen'] = $this->Dist_GA_Lz_19_model->getGsMustahiqeen($userid,$getfinancial_year,$userName);
		
		$data['get_all_lzc'] = $this->Dist_GA_Lz_19_model->get_all_lzc($userid);
		$this->load->view('gs/lz19Print',$data);
				}

		function DistrictLz19Print()
				{

		$userid  = $this->session->userdata('id');
		$userName = $this->session->userdata('username');
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$get_inst = $getfinancialdata->row('installment');
		
		$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid,$getfinancial_year);
		
		
		$this->load->view('district/lz19Print',$data);
				}
	
	
	function ga_mustahiq_details()
	{
		
		$getmustahiq_id  = $this->uri->segment(3);
		//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('gs/dist_ga_mustahiq_details',$getmustahiq_id);
	}
	
	function gaMustahiqDetails()
	{
		
		$getmustahiq_id  = $this->uri->segment(3);
		//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('district/dist_ga_mustahiq_details',$getmustahiq_id);
	}
	function ga_mustahiq_details_audit()
	{
		
		$getmustahiq_id  = $this->uri->segment(3);
		$data['GetAuditRemarks'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("AuditRemarks");
		$data['GetAuditObservation'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("AuditObservation");
		//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('district/dist_ga_mustahiq_details_audit',$data);
	}
	
	
	
	function ga_mustahiq_details_audit_submit()
	{
		
		$formArray = array();
		
		$get_lzc_id = $this->input->post("get_lzc_id");
		
		if(($this->input->post("mustahiq_status")) == "Reject")
		{
			$formArray['remarks'] = $this->input->post("mustahiq_status");
			$formArray['audit_observation'] = $this->input->post("comments");
			$formArray['rejectionReason'] = $this->input->post("rejectionReason");
			$formArray['audit_cnic'] = $this->session->userdata('username');
			$formArray['approved_status'] = 2;
			
			$formArray['status'] = 0;
			$formArray['selected_lz11'] = 0;
			$formArray['AuditDate'] = date('Y-m-d H:i:s');
			$mustahiq_id = $this->input->post("mustahiq_id");
			$this->Dist_GA_Lz_19_model->ga_mustahiq_details_audit_submit($formArray,$mustahiq_id);
			
			$result = $this->db->affected_rows();
			
			$userLog = array();
			$userLog['PersonName'] = $this->session->userdata('district_name');	
			$userLog['UserName'] = $this->session->userdata('username');	
			$userLog['Activity']  = "Zakat Applicant Rejected";
			$userLog['Description']  = "Zakat Applicant Rejected Successfully.";
			$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
			$userLog['Day'] = date("d");
			$userLog['Month'] = date("m");
			$userLog['Year'] = date("Y");
			$this->General_model->user_log($userLog); // Access Method
			
			$this->session->set_flashdata('success','Record updated Successfully..!');
			$this->session->set_flashdata('success','Record Updated Successfully..!');	
			redirect(base_url().'Dist_GA_Mustahiqeenlist/getmustahiqeenlist/'. $get_lzc_id);
			exit;
			
			
			
		}
		else if(($this->input->post("mustahiq_status")) == "Approve")
		{
			$formArray['remarks'] = $this->input->post("mustahiq_status");
			$formArray['audit_observation'] = $this->input->post("comments");
			$formArray['audit_cnic'] = $this->session->userdata('username');
			$formArray['approved_status'] = 1;
			$formArray['AuditDate'] = date('Y-m-d H:i:s');
			
			$mustahiq_id = $this->input->post("mustahiq_id");
			
			$result = $this->db->affected_rows();
			
			$userLog = array();
			$userLog['PersonName'] = $this->session->userdata('district_name');	
			$userLog['UserName'] = $this->session->userdata('username');	
			$userLog['Activity']  = "Zakat Applicant Approved";
			$userLog['Description']  = "Zakat Applicant Approved Successfully.";
			$userLog['ActivityDateTime'] = date("d/m/Y H:i:s:a");
			$userLog['Day'] = date("d");
			$userLog['Month'] = date("m");
			$userLog['Year'] = date("Y");
			$this->General_model->user_log($userLog); // Access Method
			
			$this->Dist_GA_Lz_19_model->ga_mustahiq_details_audit_submit($formArray,$mustahiq_id);		
		}
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');	
		redirect(base_url().'Dist_GA_Mustahiqeenlist/getmustahiqeenlist/'. $get_lzc_id);
		
		
		
	}
	
	
	
	
	
	function ga_mustahiq_edit()
	{
		
		$getmustahiq_id  = $this->uri->segment(3);
		$userid  = $this->session->userdata('id');
		$data['get_all_lzc'] = $this->Dist_GA_Lz_19_model->get_all_lzc($userid);
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
		$data['getGroupSecretaryLZC'] = $this->FormHandingOverModel->getGroupSecretaryLZC($districtID,$userName);
		//$data['get_all_mustahiqeen'] = $this->Dist_GA_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('gs/dist_ga_mustahiq_edit',$data);
	}
	
	
	
	function ga_mustahiq_manage_edit()
	{
		
		$formArray = array();
		$mustahiq_id  = $this->input->post("mustahiq_id");
		
		$LZC_id  = $this->input->post("LZC_id");
		$get_lzname = $this->db->select('*')->from('zakatentryforms')->where('LZC_ID',$LZC_id)->get();
		$LZCActualName = $get_lzname->row('LZC_Name');
		
		$formArray['LZCActualName'] =  $LZCActualName;
		$formArray['LZC_id'] = $this->input->post("LZC_id");
		$formArray['LzcLocality'] = $this->input->post("LzcLocality");
		$formArray['istehqaqnumber']  = $this->input->post("istehqaqnumber");
		$formArray['gender']  = $this->input->post("gender");
		$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
		$formArray['GuardianType'] = $this->input->post("MustahiqGuardianType");
		$formArray['father_name']  = $this->input->post("father_name");
		$formArray['IdentityType'] = $this->input->post("IdentityType");
		$formArray['MobileNetwork'] = $this->input->post("MobileNetwork");
		$formArray['contact_number'] = str_replace("-", "", $this->input->post("contact_number"));
		
		$formArray['SehatCard'] = $this->input->post("SehatCard");
		$formArray['marital_status'] = $this->input->post("marital_status");
		$formArray['Skills'] = $this->input->post("Skills");
		$formArray['SchoolGoingChild'] = $this->input->post("SchoolGoingChild");
		
		
		$formArray['postal_address'] = $this->input->post("postal_address");
		$formArray['permanent_address'] = $this->input->post("permanent_address");
		
		$formArray['Remarks']  = $this->input->post("comments");
		
		$this->Dist_GA_Lz_19_model->ga_mustahiq_manage_edit($formArray,$mustahiq_id);
		
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');
		
		redirect(base_url('Dist_GA_Lz_19/gsLz19'));
		
	}
	
	
	
	
	
	
}
