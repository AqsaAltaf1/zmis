<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_user_profile extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
		
	//$this->load->model('Pza_Institution_reg_model');
		
	}
	
	
	
	public function index()
	{
		
	
	
	$this->load->view('district/dist_user_profile');
	
	}
	
	
	
	
	
	
	
	
	
}
