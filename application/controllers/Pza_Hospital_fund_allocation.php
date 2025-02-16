<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_Hospital_fund_allocation extends CI_Controller 
{


function __construct()
{
parent::__construct();
$this->load->model('Pza_Hospital_fund_allocation_model');
}


public function index()
{

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


$data['get_all_hospitalslist'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospitalslist();

$data['get_all_hospitalpayment'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospitalpayment($getfinancial_year,$getfinancial_installment);

$data['get_all_hospitalpayment_sf'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospitalpayment_sf($getfinancial_year,$getfinancial_installment);

$this->load->view('pza/hospital_fund_allocation',$data);
}


public function healthCareProv(){
	
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


$data['get_all_hospitalslist'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospitalslist();

$data['get_all_hospitalpayment'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospitalpayment($getfinancial_year,$getfinancial_installment);
$this->load->view('district/healthCareProv',$data);
	}


function manage_hospital_payment()
{

$formArray = array();
$formArray['hospital_id'] = $this->input->post("hospitalid");	
$formArray['financial_year']  = $this->input->post("financial_year");
$formArray['installment']  = $this->input->post("installment");
$formArray['payment_amount']  = $this->input->post("payment_amount");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;

$this->db->select("*");
$this->db->from("hospital_payment");
$this->db->where("hospital_id",$this->input->post("hospitalid"));
$this->db->where("financial_year",$this->input->post("financial_year"));
$this->db->where("installment",$this->input->post("installment"));
$query=$this->db->get();

//echo $this->db->last_query();

if($query->num_rows() > 0)
{
$this->session->set_flashdata('error','Record already Successfully..!');
}
else
{
$this->session->set_flashdata('success','Record Added Successfully..!');	
$this->Pza_Hospital_fund_allocation_model->manage_hospital_payment($formArray);	
}

redirect(base_url('Pza_Hospital_fund_allocation'));

}

function manage_hospital_sfpayment()
{
$formArray = array();
$formArray['hospital_id'] = $this->input->post("hospitalid");	
$formArray['p_name']  = $this->input->post("pt_name");
$formArray['pt_cnic']  = $this->input->post("pt_cnic");
$formArray['disease']  = $this->input->post("disease");
$formArray['financial_year']  = $this->input->post("financial_years");
$formArray['installment']  = $this->input->post("installments");
$formArray['amount']  = $this->input->post("amount_allocated");
$formArray['get_date'] = date("Y-m-d");
$formArray['status'] = 1;	

$this->session->set_flashdata('success','Record Added Successfully..!');	
$this->Pza_Hospital_fund_allocation_model->manage_hospital_sfpayment($formArray);	
redirect(base_url('Pza_Hospital_fund_allocation'));
}



function print_hosp_report()
{
	
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	$data['print_hosp_report'] = $this->Pza_Hospital_fund_allocation_model->print_hosp_report($getfinancial_year,$getfinancial_installment);
	$this->load->view('pza/print_hosp_report',$data);

}





function pza_print_hosp_payment()
{

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$data['get_all_hospital_print'] = $this->Pza_Hospital_fund_allocation_model->get_all_hospital_print($getfinancial_year,$getfinancial_installment);
	
	$this->load->view('pza/pza_print_hosp_payment',$data);

}



function pza_print_sf_hosp_payment()
{

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$data['get_sf_hospital_print'] = $this->Pza_Hospital_fund_allocation_model->get_sf_hospital_print($getfinancial_year,$getfinancial_installment);
	
	$this->load->view('pza/pza_print_sf_hosp_payment',$data);

}

}
