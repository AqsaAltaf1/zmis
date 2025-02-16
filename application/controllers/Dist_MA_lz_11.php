<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_MA_lz_11 extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_MA_lz_11_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_approvedusers'] = $this->Dist_MA_lz_11_model->get_all_approvedusers();
		$this->load->view('district/dist_ma_lz_11',$data);
	}
	
	
	
	
	function manage_ma_mustahiqeen_payment()
	{
	$formArray = array();
	$formArray['user_id'] = $this->input->post("user_id");	
	$formArray['MustahiqType'] ="Marriage Assistance";
	$formArray['mustahiq_name'] = $this->input->post("name");
	$formArray['father_name'] = $this->input->post("f_name");
	$formArray['mustahiq_cnic'] = $this->input->post("cnic");
	$formArray['category'] = $this->input->post("mustahiq_category");
	$formArray['bank_name']  = $this->input->post("bank_name");
	$formArray['account_number']  = $this->input->post("account_number");
	$formArray['cheque_number']  = $this->input->post("cheque_number");
	$formArray['payment_amount']  = $this->input->post("payment_amount");
	$formArray['financial_Year']  = $this->input->post("financial_Year");
	$formArray['installment']  = $this->input->post("installment");
	$formArray['lzc_id']  = $this->input->post("lzc_id");
	$formArray['LZCActualName']  = $this->input->post("lzcName");
	$formArray['district_id']  = $this->session->userdata('id');
	$formArray['District_Name']  = $this->input->post('districtName');
	$formArray['add_date'] = date("Y-m-d");	
	
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getInstallment = $getfinancialdata->row('installment');

	
	$userid = $this->input->post("user_id");	
	
	$this->db->select("*");
	$this->db->from("mustahiqeen_payments");
	$this->db->where("financial_Year",$getfinancial_year);
	$this->db->where("user_id",$userid);
	$this->db->where("mustahiq_cnic",$this->input->post("cnic"));
	$this->db->where("MustahiqType","Marriage Assistance");
	$this->db->where("installment",$getInstallment);
	$query=$this->db->get();
	
	if($query->num_rows()>0)
	{
	$this->session->set_flashdata('error',' mustahiq already paid in Marriage Assistance During '.$getfinancial_year);
	redirect(base_url('Dist_MA_lz_11'));
	}
	else
	{
	
	
	
	$this->Dist_MA_lz_11_model->manage_ma_mustahiqeen_payment($formArray);	
	
	
	
	$formArrayupdate = array();
	$formArrayupdate['payment_status'] = 1;
	$formArrayupdate['payment_year'] = $this->input->post("financial_Year");
	$formArrayupdate['payment_installment'] = $this->input->post("installment");
	$this->Dist_MA_lz_11_model->updateuser($userid,$formArrayupdate);
	
	$this->session->set_flashdata('success','Paid Successfully..!');
	
	redirect(base_url('Dist_MA_paid_mustahiqeen'));
	}
	}
	
	
	
	
	
	
	
	
	
}
