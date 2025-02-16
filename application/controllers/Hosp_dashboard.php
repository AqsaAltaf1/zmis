
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_dashboard extends CI_Controller {


function __construct()
{
parent::__construct();

$this->load->model('hosp_dashboard_model');

}

public function index()
{

$data['get_all_districts'] = $this->hosp_dashboard_model->get_all_districts();
$data['get_all_headofaccounts'] = $this->hosp_dashboard_model->get_all_headofaccounts();
$data['get_all_hospitals'] = $this->hosp_dashboard_model->get_all_hospitals();
$data['get_pza_fundrecords'] = $this->hosp_dashboard_model->get_pza_fundrecords();


$this->load->view('hospital/hosp_dashboard',$data);
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
