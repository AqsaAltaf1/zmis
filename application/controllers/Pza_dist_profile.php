<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pza_dist_profile extends CI_Controller {


function __construct()
{
parent::__construct();

$this->load->model('Pza_dist_profile_model');
$this->load->model('pza_dashboard_model');

}


public function index()
{

$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();

$this->load->view('pza/pza_dist_dashboard',$data);
}






function show_dist_dashboard()
{

$data['get_all_districts'] = $this->pza_dashboard_model->get_all_districts();

$getuserid = $this->uri->segment(3); // 1stsegment

$data['district_id'] = $this->input->post("district_id");

$this->load->view('pza/pza_dist_dashboard',$data);
}











}
