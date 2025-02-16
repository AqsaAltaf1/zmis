<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_patient_entry_form extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('hosp_dashboard_model');
	$this->load->model('Hosp_patient_entry_form_model');
	}
	
	
	public function index()
	{
		
		$data['get_all_districts'] = $this->hosp_dashboard_model->get_all_districts();
		$this->load->view('hospital/hosp_patient_entry_form',$data);
	}
	
	
	function manage_fetch_details()
	{
		
	$get_patient_cinc = str_replace("-", "", $this->input->post("mustahiq_cnic_value"));
	
	$get_hospital_id = $this->session->userdata('hospital_id');
	$mustahiq_istehqaqno = $this->input->post("mustahiq_istehqaqno");
	
	$this->db->select("*");
	$this->db->from("hc_mustahiqeen");
	$this->db->where("hospital_id",$get_hospital_id);
	$this->db->where("istehqaq_no",$mustahiq_istehqaqno);
	$this->db->where("treatment_status",1);
	$this->db->where("cnic",$get_patient_cinc);
	$pt_status_found = $this->db->get()->num_rows();
	if($pt_status_found == 1)
	{
	$this->session->set_flashdata('error','You already treated, your istehqaq number is expired.');	
	redirect(base_url('Hosp_patient_entry_form'));	
	exit;
	}
	
	
	$this->db->select("*");
	$this->db->from("hc_mustahiqeen");
	$this->db->where("hospital_id",$get_hospital_id);
	$this->db->where("istehqaq_no",$mustahiq_istehqaqno);
	$this->db->where("treatment_status",0);
	$this->db->where("cnic",$get_patient_cinc);
	$pt_status = $this->db->get()->num_rows();
	
	
	if($pt_status > 0)
	{
	//$data['get_all_types'] = $this->Hosp_patient_entry_form_model->get_all_types();	
	$data['patient_info'] = $this->db->select('*')->from('hc_mustahiqeen')->where('hospital_id',$get_hospital_id)->where('cnic',$get_patient_cinc)->where('istehqaq_no',$mustahiq_istehqaqno)->get()->result_array();
	$this->session->set_flashdata('success','Patient Found with following details.');	
	$this->load->view('hospital/Hosp_patient_entry_form',$data);
	}
	else
	{
	$this->session->set_flashdata('error','No Record Found');	
	$this->load->view('hospital/Hosp_patient_entry_form');
	}
		
		
	}
	
	
	
	
	function get_medicine_list()
	{
	
	$hospital_id = $this->session->userdata('hospital_id');	
	
	$gettypeid = $this->input->post("gettypeid");
	
	$medicine_query = "SELECT * FROM treatment_types_values WHERE type_id = '".$gettypeid."' AND  hospital_id = '".$hospital_id."'";
	$data = $this->db->query($medicine_query)->result_array();	
	
	echo json_encode($data);
	
	}
	
	
	
	
	
	
	
	function manage_details_submit()
	{
		
		
		$formArray = array();
		$pt_treatment_details = array();
		
		$formArray['hospital_id'] = $this->session->userdata('hospital_id');
		$record_id = $this->input->post('record_id');
			
		
		$formArray['pt_hc_category']  = $this->input->post("pt_hc_category");
		
		$formArray['pt_name']  = $this->input->post("pt_name");
		$formArray['fh_name']  = $this->input->post("f_name");
		
		$formArray['age']  = $this->input->post("age");
		$formArray['gender']  = $this->input->post("gender");
		
		$formArray['pt_cnic']  = str_replace("-", "", $this->input->post("mustahiq_cnic"));
		
		$formArray['cell_no']  = $this->input->post("contact_number");
		$formArray['district']  = $this->input->post("district_id");
		$formArray['lzc']  = $this->input->post("lzc_id");
		
		
		$formArray['age']  = $this->input->post("age");
		$formArray['gender']  = $this->input->post("gender");
		
		$formArray['financial_year']  = $this->input->post("year");
		$formArray['installment']  = $this->input->post("installment");
		$formArray['disease']  = $this->input->post("disease");
		$formArray['Istehqaq_no']  = $this->input->post("istehqaq_no");
		
		$formArray['opd_no']  = $this->input->post("opd_no");
		$formArray['pt_catagory']  = $this->input->post("pt_category");
		
		$formArray['admin_date']  = $this->input->post("admission_date");
		$formArray['discharge_date']  = $this->input->post("discharge_date");
		
		
		$formArray['patient_type']  = $this->input->post("pt_type");
		$formArray['total_expense']  = $this->input->post("grand_total");
		
		$formArray['add_date'] = date("Y-m-d");
		$formArray['status'] = 1;
		
		$getpt_id = $this->Hosp_patient_entry_form_model->patient_hosp_register($formArray);
		
		
		
		$ptidvalue = array('getpt_id'=>$getpt_id);
		$get_last_ptid = $this->session->set_userdata($ptidvalue);
		
		
		$treatment_type  = $this->input->post("treatment_type");
		
		foreach($this->input->post('treatment_type') as $key => $id)
		{
		
		$formArray_details['hospital_id'] = $this->session->userdata('hospital_id');	
		$formArray_details['pt_id'] = $this->session->userdata('getpt_id');
		$formArray_details['treatment_type'] = $_POST['treatment_type'][$key];
		$formArray_details['get_type_name'] = $_POST['medicine'][$key];
		$formArray_details['unit_price'] = $_POST['unit_price'][$key];
		$formArray_details['quantity'] = $_POST['quantity'][$key];
		$formArray_details['total_price'] = $_POST['total_price'][$key];
		$formArray_details['financial_year']  = $this->input->post("year");
		$formArray_details['installment']  = $this->input->post("installment");	
		$formArray_details['patient_type']  = $this->input->post("pt_type");
		$formArray_details['add_date'] = date("Y-m-d");
		$formArray_details['status'] = 1;
		
		$getpt_id = $this->Hosp_patient_entry_form_model->patient_hosp_register_details($formArray_details);		
		
		}
		
		
		$formArray_update = array();
		$formArray_update['treatment_status'] = 1;
		
		$this->Hosp_patient_entry_form_model->update_patient_status($formArray_update,$record_id);
		
		
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('Hosp_patient_entry_form'));		
		
		
		
		
		
		
	}
	
	
	
	
	
	
}




















