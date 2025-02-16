<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lz_19 extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Lz_19_model');
	}
	
	
	
	public function index()
	{
		$data['get_all_districts'] = $this->Lz_19_model->get_all_districts();
		$this->load->view('district/lz_19',$data);
	}
}
