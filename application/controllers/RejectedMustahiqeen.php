<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RejectedMustahiqeen extends CI_Controller {

	
	function __construct()
	{
	parent::__construct();
	$this->load->model('RejectedMustahiqeen_model');
	}


	public function index()
	{
		$data['get_all_districts'] = $this->RejectedMustahiqeen_model->get_all_districts();
		$this->load->view('pza/rejectedMustahiqeen',$data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
