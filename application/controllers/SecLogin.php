<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecLogin extends CI_Controller {

//public $gettablename = "mytable";


function __construct()
{
parent::__construct();
$this->load->model('SecLoginModel');
//$this->load->model('Pza_admin_profile_model');
}


public function index()
{
$this->load->view('secretary/secLogin');
}



function formData()
{

$username   = $this->input->post("username");
$password   = $this->input->post("password");
$chk_account  = $this->SecLoginModel->chk_account($username,$password);



}






function logout()
{
$this->session->unset_userdata('id'); 
$this->session->unset_userdata('name');
$this->session->unset_userdata('user_type'); 
$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
redirect(base_url('SecLogin'));

}







}
