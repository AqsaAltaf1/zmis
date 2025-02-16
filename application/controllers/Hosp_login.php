<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_login extends CI_Controller {

//public $gettablename = "mytable";


function __construct()
{
parent::__construct();
$this->load->model('Hosp_login_model');
}


public function index()
{
$this->load->view('hospital/hosp_login');
}



function user_login_profile()
	{
		$this->load->view('hospital/user_login_profile');
	}
	
	
	function user_login_profile_update()
	{
		
		$formArray = array();
		$formArray['password'] = $this->input->post("password");
		$userid = $this->session->userdata('hospital_id');
				
		$this->Hosp_login_model->user_login_profile_update($formArray,$userid);
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');	
		$this->load->view('hospital/hosp_dashboard');
	}







function formData()
{

$username   = $this->input->post("username");
$password   = $this->input->post("password");
$chk_account  = $this->Hosp_login_model->chk_account($username,$password);

}




function logout()
{
$this->session->unset_userdata('hospital_id'); 
$this->session->unset_userdata('hospital_name');
$this->session->unset_userdata('user_type'); 
$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
redirect(base_url('Hosp_login'));

}







}
