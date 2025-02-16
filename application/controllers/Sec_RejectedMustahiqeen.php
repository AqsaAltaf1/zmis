<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sec_RejectedMustahiqeen extends CI_Controller {

	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Sec_RejectedMustahiqeen_model');
	}


	public function index()
	{
		$data['get_all_districts'] = $this->Sec_RejectedMustahiqeen_model->get_all_districts();
		$this->load->view('secretary/sec_rejectedMustahiqeen',$data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
