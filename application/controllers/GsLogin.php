<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GsLogin extends CI_Controller {

//public $gettablename = "mytable";


function __construct()
{
parent::__construct();
$this->load->model('GsLoginModel');
}


public function index()
{
$this->load->view('gs/gsLogin');
}



function formData()
{

$username   = $this->input->post("username");
$password   = $this->input->post("password");
$chk_account_gs  = $this->GsLoginModel->chk_account_gs($username,$password);

}




function logout()
{
$this->session->unset_userdata('id'); 
$this->session->unset_userdata('groupSecretaryID');
$this->session->unset_userdata('entityName');
$this->session->unset_userdata('username');
$this->session->unset_userdata('user_type'); 
$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
redirect(base_url(GsLogin));

}







}
