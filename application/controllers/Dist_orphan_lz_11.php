<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_orphan_lz_11 extends CI_Controller 
{
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_orphan_Lz_11_model');
	}
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		$data['get_all_lzclist'] = $this->Dist_orphan_Lz_11_model->get_all_lzclist($userid);
		$this->load->view('district/dist_orphan_lz_11',$data);
	}
}
