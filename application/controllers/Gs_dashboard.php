<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gs_dashboard extends CI_Controller {


function __construct()
{
parent::__construct();

$this->load->model('Gs_dashboard_model');
$this->load->model('FormHandingOverModel');
}

public function index()
{


$userid = $this->session->userdata('id');
$districtID = $this->session->userdata('id');
$userName = $this->session->userdata('username');

$getDistrictName = $this->db->select('*')->from('district_users')->where('id',$districtID)->get();
$getName = $getDistrictName->row('district_name');

$data['get_all_lzclist'] = $this->Gs_dashboard_model->get_all_lzclist($userid);

$data['getFormReceivedLZC'] = $this->Gs_dashboard_model->getFormReceivedLZC($getName,$userName);


$this->load->view('gs/gs_dashboard',$data);
}





















}
