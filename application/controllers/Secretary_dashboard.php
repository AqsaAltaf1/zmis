<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secretary_dashboard extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	//$this->load->model('Pza_District_shares_model');
	}
	
	
	
	public function index()
	{
		//$data['get_all_districts'] = $this->Pza_District_shares_model->get_all_districts();
		$this->load->view('secretary/secretary_dashboard');
	}
}
