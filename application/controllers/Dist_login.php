<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_login extends CI_Controller {

	//public $gettablename = "mytable";
	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_login_model');
	}
	
	
	public function index()
	{
		$this->load->view('district/dist_login');
	}
	
	
	
	function user_login_profile()
	{
		$this->load->view('district/user_login_profile');
	}
	
	
	function user_login_profile_update()
	{
		
		$formArray = array();
		$formArray['password'] = $this->input->post("password");
		$userid = $this->session->userdata('id');
				
		$this->Dist_login_model->user_login_profile_update($formArray,$userid);
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');	
		$this->load->view('district/dist_dashboard');
	}
	
	
	
	
	
	
	
	
	function formData()
	{
	
	$username   = $this->input->post("username");
	$password   = $this->input->post("password");
	$chk_account  = $this->Dist_login_model->chk_account($username,$password);
	
	}
	
	
	
	
	function logout()
	{
	$this->session->unset_userdata('id'); 
	$this->session->unset_userdata('district_name');
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('user_type');
	//$this->session->sess_destroy(); 
	$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
	redirect(base_url('Dist_login'));
	
	}
	
	
	
	
	
	
	
}
