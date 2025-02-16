<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_dist_profile extends CI_Controller {


function __construct()
{
parent::__construct();

$this->load->model('Pza_dist_profile_model');

}

public function index()
{

// $data['get_all_zakatheads'] = $this->pza_dashboard_model->get_all_zakatheads();
// $data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
// $data['get_all_headofaccounts'] = $this->pza_dashboard_model->get_all_headofaccounts();
// $data['get_all_hospitals'] = $this->pza_dashboard_model->get_all_hospitals();
// $data['get_pza_fundrecords'] = $this->pza_dashboard_model->get_pza_fundrecords();


$this->load->view('pza/pza_dist_profile');
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

$this->session->set_flashdata('success','Record Added Successfully..!');
$this->pza_dashboard_model->pza_add_fund($formArray);
redirect(base_url('pza_dashboard'));

}


function manage_year_inst()
{	
	$formArray = array();
	$formArray['financial_Year'] = $this->input->post("financial_year");	
	$formArray['installment']  = $this->input->post("installment");
	$formArray['ga_percentage']  = $this->input->post("ga_percentage");
	$formArray['ma_percentage']  = $this->input->post("ma_percentage");
	$formArray['dm_percentage']  = $this->input->post("dm_percentage");
	$formArray['hc_percentage']  = $this->input->post("hc_percentage");
	$formArray['esa_percentage']  = $this->input->post("esa_percentage");
	$formArray['esp_percentage']  = $this->input->post("esp_percentage");
	
	$financial_Year = $this->input->post("financial_year");	
	$installment  = $this->input->post("installment");
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	$this->db->select("*");
	$this->db->from("year_installment");
	$this->db->where("financial_Year",$financial_Year);
	$this->db->where("installment",$installment);
	$query=$this->db->get();
	
	if($query->num_rows()>0)
	{
	$this->session->set_flashdata('error','Selected Year and installment already exists.');
	redirect(base_url('pza_dashboard'));
	}
	else
	{
	$this->pza_dashboard_model->manage_year_inst($formArray);
	$this->session->set_flashdata('success','Installment Updated Successfully.');
	redirect(base_url('pza_dashboard'));
	}
	
	

}




function pza_printlist()
{
	
	$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
	$data['get_all_headofaccounts'] = $this->pza_dashboard_model->get_all_headofaccounts();
	$data['get_all_hospitals'] = $this->pza_dashboard_model->get_all_hospitals();
	$data['get_pza_fundrecords'] = $this->pza_dashboard_model->get_pza_fundrecords();
	$this->load->view('pza/pza_printlist',$data);
}

function pza_unspent_print_list()
{
	
	$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
	$data['get_all_headofaccounts'] = $this->pza_dashboard_model->get_all_headofaccounts();
	$data['get_pza_fundrecords'] = $this->pza_dashboard_model->get_pza_fundrecords();
	$this->load->view('pza/pza_unspent_print_list',$data);
}



function update_pzf_fund()
{
	
	$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();
	$data['get_all_headofaccounts'] = $this->pza_dashboard_model->get_all_headofaccounts();
	$data['get_all_hospitals'] = $this->pza_dashboard_model->get_all_hospitals();
	$data['get_pza_fundrecords'] = $this->pza_dashboard_model->get_pza_fundrecords();
	$this->load->view('pza/update_pzf_fund',$data);
}





function dashboardsearch()
{	
$dist_hosp = $this->input->post("dist_hosp");	
$acount_head  = $this->input->post("acount_head");
$data['dashboardsearch'] = $this->pza_dashboard_model->dashboardsearch($dist_hosp,$acount_head);
$this->load->view('pza/pza_dashboardsearch',$data);	
}


function dashboardsearchdates()
{	
$dist_hosp = $this->input->post("dist_hosp");	
$acount_head  = $this->input->post("acount_head");
$start_date  = $this->input->post("start_date");
$end_date  = $this->input->post("end_date");
$data['dashboardsearch'] = $this->pza_dashboard_model->dashboardsearchdate($dist_hosp,$acount_head,$start_date,$end_date);
$this->load->view('pza/pza_dashboardsearch',$data);	
}




function manage_pzf_payment_update()
{	

$getid = $this->input->post("getid");
$formArray = array();
$formArray['payment_received'] = $this->input->post("payment_received");	
$formArray['check_no']  = $this->input->post("cheque_no");
$formArray['check_date'] = $this->input->post("cheque_date");
$formArray['financial_year'] = $this->input->post("financial_year");
//$formArray['payment_rec_from']  = $this->input->post("payment_rec_from");

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

$this->session->set_flashdata('success','Record Updated Successfully..!');

$this->pza_dashboard_model->pza_add_fund_update($formArray,$getid);
redirect(base_url('pza_dashboard'));

}











}
