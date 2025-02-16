<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_login extends CI_Controller {

//public $gettablename = "mytable";


function __construct()
{
parent::__construct();
$this->load->model('Audit_login_model');
}


public function index()
{
$this->load->view('audit/audit_login');
}



function formData()
{

$username   = $this->input->post("username");
$password   = $this->input->post("password");
$chk_account  = $this->Audit_login_model->chk_account($username,$password);

}

function auditLoginProfile()
{
$this->load->view('district/auditLoginProfile');
}


function auditLoginProfileUpdate()
{

$formArray = array();
$formArray['password'] = $this->input->post("password");
$userid = $this->session->userdata('audit_id');

$this->Audit_login_model->auditLoginProfileUpdate($formArray,$userid);

$this->session->set_flashdata('success','Record Updated Successfully..!');	
$this->load->view('district/auditLoginProfile');
}
	



function logout()
{
$this->session->unset_userdata('id'); 
$this->session->unset_userdata('audit_id');
$this->session->unset_userdata('username');
$this->session->unset_userdata('user_type');
$this->session->unset_userdata('district_name');
//$this->session->sess_destroy(); 
$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
redirect(base_url('Audit_login'));

}









}
