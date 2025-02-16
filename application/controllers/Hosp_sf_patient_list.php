
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_sf_patient_list extends CI_Controller {


function __construct()
{
parent::__construct();

//$this->load->model('hosp_dashboard_model');
$this->load->model('hosp_sf_patient_list_model');

}

public function index()
{

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$data['get_all_sf_patients'] = $this->hosp_sf_patient_list_model->get_all_sf_patients($getfinancial_year,$getfinancial_installment);

$this->load->view('hospital/hosp_sf_patient_list',$data);
}


function special_patient_list_func()
{
$get_patient_id = $this->uri->segment(3); // 1stsegment
$this->load->view('hospital/hosp_special_patient_profile',$get_patient_id);

}






}
