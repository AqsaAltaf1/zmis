
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_special_fund_report extends CI_Controller {


function __construct()
{
parent::__construct();

//$this->load->model('hosp_dashboard_model');
$this->load->model('hosp_special_fund_report_model');

}

public function index()
{

$data['get_all_districts'] = $this->hosp_special_fund_report_model->get_all_districts();
$data['get_all_headofaccounts'] = $this->hosp_special_fund_report_model->get_all_headofaccounts();
$data['get_all_hospitals'] = $this->hosp_special_fund_report_model->get_all_hospitals();
$data['get_pza_fundrecords'] = $this->hosp_special_fund_report_model->get_pza_fundrecords();


$this->load->view('hospital/hosp_special_fund_report',$data);
}


function generate_special_report()
{
$userid = $this->session->userdata('hospital_id');
$formArray = array();
$start_date= $this->input->post("start_date");	
$end_date = $this->input->post("end_date");

$this->db->select('*');
$this->db->from('patients');
$this->db->where('add_date >=', $start_date);
$this->db->where('add_date <=', $end_date);
$this->db->where('hospital_id', $userid);
$this->db->where('patient_type', 'Special Health Fund Patient');

$query = $this->db->get();


$data['get_special_report'] = $query->result();
// print_r($result);

$this->load->view('hospital/hosp_special_fund_report',$data);

}


}
