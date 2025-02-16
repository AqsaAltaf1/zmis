<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_regular_patient_list extends CI_Controller {


function __construct()
{
parent::__construct();
//$this->load->model('hosp_dashboard_model');
$this->load->model('hosp_regular_patient_list_model');

}

public function index()
{
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');
$data['get_all_regular_patients'] = $this->hosp_regular_patient_list_model->get_all_regular_patients($getfinancial_year,$getfinancial_installment);
$this->load->view('hospital/hosp_regular_patient_list',$data);
}



function regular_patient_list_func()
{
$get_patient_id = $this->uri->segment(3); // 1stsegment
$this->load->view('hospital/hosp_regular_patient_profile',$get_patient_id);
}


function manage_pzf_payment()
{	
$formArray = array();
$formArray['payment_received'] = $this->input->post("payment_received");	
$formArray['check_no']  = $this->input->post("cheque_no");
$formArray['check_date'] = $this->input->post("cheque_date");
$formArray['financial_year'] = $this->input->post("financial_year");
$formArray['payment_rec_from']  = $this->input->post("payment_rec_from");

$district = $this->input->post("district");
$hospital = $this->input->post("hospital");
$hosp_acc_head = $this->input->post("hosp_acc_head");
$dist_acc_head = $this->input->post("dist_acc_head");

$formArray['remarks'] = $this->input->post("remarks");
$formArray['add_date'] = date("Y-m-d");
$formArray['status'] = 1;




if(!empty($this->input->post("district")))
{
$formArray['district_hospital_id'] = $this->input->post("district");
}

if(!empty($this->input->post("hospital")))
{
$formArray['district_hospital_id'] = $this->input->post("hospital");
}

if(!empty($this->input->post("hosp_acc_head")))
{
$formArray['account_head'] = $this->input->post("hosp_acc_head");
}

if(!empty($this->input->post("dist_acc_head")))
{
$formArray['account_head'] = $this->input->post("dist_acc_head");
}


$this->pza_dashboard_model->pza_add_fund($formArray);

redirect(base_url('pza_dashboard'));






}


















}
