<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_category_wise_report extends CI_Controller {

	function __construct()
		{
		parent::__construct();
		
		$this->load->model('General_model');
		}
	public function index()
	{
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');
		
		//$data['getDistrict'] = $this->General_model->getDistrictList();
		
		$this->load->view('district/dist_category_wise_report', $data);
	}
}
