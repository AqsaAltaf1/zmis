<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lzc_list extends CI_Controller {

	//public $gettablename = "mytable";
	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Lzc_list_model');
	}
	
	
	public function index()
	
	{
		$data['get_all_lzclist'] = $this->Lzc_list_model->get_all_lzclists();
		$this->load->view('gs/lzc_benf_list',$data);
	}
	
	
	
	function LZC_NOB()
	{	
		
		$cnic = $this->input->post("gsUsername");
		$lzc_query = $this->db->query("select LZCActualName, count(*) as RegBen from guzara_allowance_mustahiqeen where LZC_name in (select id from lzc_list where gs_username='".$cnic."') group by LZCActualName");
		
		$data['get_all_lzclist'] = $lzc_query->result_array();
		
		//echo $this->db->last_query();
		
		$this->load->view('gs/lzc_benf_list',$data);
		
	}
	
	function LZC_List()
	{	
		
		$cnic = $this->input->post("gsUsername");
		
		$lzc_query = $this->db->query("select LZCActualName, count(*) as RegBen from guzara_allowance_mustahiqeen where LZC_name in (select id from lzc_list where gs_username='".$cnic."') group by LZCActualName");
		
		$data['get_all_lzclist'] = $lzc_query->result_array();
		
		//echo $this->db->last_query();
		
		$this->load->view('gs/lzc_benf_list',$data);
		
	}
	
	
	
	
	
}




//