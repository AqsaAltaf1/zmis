<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orphan_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Orphan_reg_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->Orphan_reg_model->get_all_districts();
		$this->load->view('district/orphan_reg',$data);
	}
}
