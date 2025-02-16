<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_login extends CI_Controller {

//public $gettablename = "mytable";


function __construct()
{
parent::__construct();
$this->load->model('Pza_login_model');
$this->load->model('Pza_admin_profile_model');
}


public function index()
{
$this->load->view('pza/pza_login');
}



function formData()
{

$username   = $this->input->post("username");
$password   = $this->input->post("password");
$chk_account  = $this->Pza_login_model->chk_account($username,$password);
}



function formData_forgot()
{

$email   = $this->input->post("email");

$this->db->select("*");
$this->db->from("pza_admin");
$this->db->where("email",$email);
$this->db->where("status",1);
$getpayment_status = $this->db->get()->num_rows();

if($getpayment_status > 0)
{
$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, strlen($characters) - 1)];
}

$formArray = array();
$formArray['password'] = $randomString;
$result = $this->Pza_admin_profile_model->updateuser_admin_email($formArray,$email);

$email_subject = "Password Reset Notification"; 
$email_message = "Password reset Successfully, Use following details to login.\n\n";
$email_message .= "Email : ".($email)."\n";
$email_message .= "Password : ".($randomString)."\n";

$email_from = "domainname.com";
$email_to = $email;
$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 

$this->session->set_flashdata('success','Check your email for your password and login again.'); 
redirect(base_url('Pza_login'));


}
else
{
$this->session->set_flashdata('error','Invalid Email Address.'); 
redirect(base_url('Pza_login/pza_login_forgot'));		
}

}



function pza_login_forgot()
{

$this->load->view('pza/pza_login_forgot');

}




function logout()
{
$this->session->unset_userdata('id'); 
$this->session->unset_userdata('name');
$this->session->unset_userdata('user_type'); 
$this->session->set_flashdata('success','You are Successfully Logged Out.'); 
redirect(base_url('Pza_login'));

}







}
