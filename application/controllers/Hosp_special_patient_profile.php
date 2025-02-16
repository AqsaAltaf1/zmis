
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_special_patient_profile extends CI_Controller {


function __construct()
{
parent::__construct();

//$this->load->model('hosp_dashboard_model');
$this->load->model('hosp_special_patient_profile_model');

}

public function index()
{

$data['get_all_districts'] = $this->hosp_special_patient_profile_model->get_all_districts();
$data['get_all_headofaccounts'] = $this->hosp_special_patient_profile_model->get_all_headofaccounts();
$data['get_all_hospitals'] = $this->hosp_special_patient_profile_model->get_all_hospitals();
$data['get_pza_fundrecords'] = $this->hosp_special_patient_profile_model->get_pza_fundrecords();


$this->load->view('hospital/hosp_special_patient_profile',$data);
}







}
