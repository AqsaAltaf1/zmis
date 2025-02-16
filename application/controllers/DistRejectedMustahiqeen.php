<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistRejectedMustahiqeen extends CI_Controller {

	
	function __construct()
	{
	parent::__construct();
	$this->load->model('DistRejectedMustahiqeen_model');
	}


	public function index()
	{
		$userid = $this->session->userdata('id');
		$data['getRejectedList'] = $this->DistRejectedMustahiqeen_model->getRejectedList($userid);
		$this->load->view('district/rejectedMustahiqeen',$data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
