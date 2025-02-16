<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_orphan_Lz_19 extends CI_Controller 
{

	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_orphan_Lz_19_model');
	}
	
	
	
	public function index()
	{
		$userid  = $this->session->userdata('id');
		$data['get_all_mustahiqeen'] = $this->Dist_orphan_Lz_19_model->get_all_mustahiqeen($userid);
		$this->load->view('district/dist_orphan_lz_19',$data);
	}
}
