<?php
class Pza_dist_reports_model extends CI_model{

	
	function manage_district_payment($formArray)
	{
		$this->db->insert("district_payment",$formArray);
	}
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('district_name',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_lzc_wise_report_list($district_id,$financial_year,$inst_value)
	{
		$this->db->select("*");
		$this->db->from("dist_head_wise_fund");
		$this->db->where("district_id",$district_id);
		$this->db->where("year",$financial_year);
		$this->db->where("installment",$inst_value);
		$this->db->where("(account_head='Guzara Allowance' OR account_head='Marriage Assistance')", NULL, FALSE);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
		
		//echo $this->db->last_query();
		
		
	}
	
	
	////////////////////////////////////////////////////////
	
	function getYearlyHeadwiseFund($getfinancial_year, $getInstallment)
	{
		$this->db->select('*');
		$this->db->from('district_payment');
		//$this->db->join('mustahiqeen', 'district_payment.district_id = mustahiqeen.district_id');
		//$this->db->join('mustahiqeen_payments','mustahiqeen.district_id = mustahiqeen_payments.district_id');
		$this->db->where("financial_year",$getfinancial_year);
		$this->db->where("installment",$getInstallment);
		$this->db->order_by("district_id","ASC");
		//$this->db->group_by("district_payment.district_id","ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	



}


?>
