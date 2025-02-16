<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_orphan_paid_mustahiqeen extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_orphan_paid_mustahiqeen_model');
	}
	
	
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		$data['get_paid_mustahiqeen'] = $this->Dist_orphan_paid_mustahiqeen_model->get_paid_mustahiqeen($userid);
		$this->load->view('district/dist_orphan_paid_mustahiqeen',$data);
	}
}
