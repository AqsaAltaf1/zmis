<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_admin_expense extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_admin_expense_model');
	}
	
	
	
	public function index()
	{
		$userid = $this->session->userdata('id');
		
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

		$data['get_zakatpaid_staff_secretary'] = $this->Dist_admin_expense_model->get_zakatpaid_staff_secretary($userid);
		$data['get_zakatpaid_staff_audit_officer'] = $this->Dist_admin_expense_model->get_zakatpaid_staff_audit_officer($userid);
		$data['get_zakatpaid_staff_auditor'] = $this->Dist_admin_expense_model->get_zakatpaid_staff_auditor($userid);
		
		
		$data['get_zakat_staff'] = $this->Dist_admin_expense_model->get_zakat_staff();
		$data['get_salarypaid_staff'] = $this->Dist_admin_expense_model->get_salarypaid_staff($userid,$getfinancial_year);
		$data['get_audit_salarypaid_staff'] = $this->Dist_admin_expense_model->get_audit_salarypaid_staff($userid,$getfinancial_year);
		$data['get_auditor_salarypaid_staff'] = $this->Dist_admin_expense_model->get_auditor_salarypaid_staff($userid,$getfinancial_year);		
		$this->load->view('district/dist_admin_expense',$data);
	}
	
	
	
	function manage_adminexp_payment()
	{
	
	$formArray = array();
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['designation_id'] = $this->input->post("staff_category");
	
	if($this->input->post("gs_name_id")!="")
	{
		$formArray['staff_name']  = $this->input->post("gs_name_id");
	}
	else if($this->input->post("auditor_name_id")!="")
	{
		$formArray['staff_name']  = $this->input->post("auditor_name_id");
	}
	else if($this->input->post("audit_staff_id")!="")
	{
		$formArray['staff_name']  = $this->input->post("audit_staff_id");
	}
	
	
	$formArray['cheque_no']  = $this->input->post("cheque_no");
	$formArray['amount']  = $this->input->post("amount");
	
	$formArray['financial_year']  = $this->input->post("financial_year");
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$salary  = $this->input->post("salary_month");
	
	$formArray['salary_month'] = count($salary);
	
	$getlastid = $this->Dist_admin_expense_model->manage_adminexp_payment($formArray);
	
	$formArrays = array();
	$formArrays['district_id'] = $this->session->userdata('id');
	$formArrays['financial_year']  = $this->input->post("financial_year");
	$formArrays['record_id'] = $getlastid;
	$formArrays['add_date'] = date("Y-m-d");
	
	foreach($salary as $salaryamount)
	{
	$formArrays['month_id'] = $salaryamount;
	$this->Dist_admin_expense_model->manage_adminexp_payment_months($formArrays);
	}
	
	$this->session->set_flashdata('success','Record Added Successfully..!');
	
	redirect(base_url('Dist_admin_expense'));
		
	}
	
	
// Admin HeadWise function

	function manage_admin_headwise_payment()
	{
	
	$formArray = array();
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['designation_id'] = $this->input->post("zakat_paid_staff");
	$formArray['financial_year']  = $this->input->post("financial_year1");
	$formArray['installment']  = $this->input->post("installment1");
	$formArray['amount_allocated']  = $this->input->post("amount1");
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;

	

	$district_id = $this->session->userdata('id');
	$financial_year = $this->input->post("financial_year1");
	$designation_id = $this->input->post("zakat_paid_staff");


	$this->db->select("*");
	$this->db->from("admin_expense_headwise_allocation");
	$this->db->where("financial_year",$financial_year);
	$this->db->where("district_id",$district_id);
	$this->db->where("designation_id",$designation_id);
	$this->db->where("installment",$this->input->post("installment1"));
	$query=$this->db->get();

	
	if($query->num_rows()>0)
	{
	$this->session->set_flashdata('error',' Zakat Paid Staff record already exists for this year and installment.');
	redirect(base_url('Dist_admin_expense'));
	}
	else
	{
	$this->Dist_admin_expense_model->manage_admin_headwise_payment($formArray);
	$this->session->set_flashdata('success','Data for Zakat Paid Staff Inserted Successfully.');
	redirect(base_url('Dist_admin_expense'));
	}

	
	
	
	
	
	
}	
}
