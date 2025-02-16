<?php
class pza_headwise_fundalloc_model extends CI_model{

	
	function manage_pza_payment($formArray)
	{
		$this->db->insert("pza_fund",$formArray);
	}
	
	
	function manage_headwise_payment($formArray)
	{
		$this->db->insert("head_wise_fund",$formArray);
	}
	
	function gethead_wise_fund($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("head_wise_fund");
		$this->db->where("financial_year",$getfinancial_year);
		$this->db->where("installment",$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	function manage_headwise_payment_update($account_head,$financial_year,$installment,$formArray)
	{
		
		$this->db->where('account_head',$account_head);
		$this->db->where('financial_year',$financial_year);
		$this->db->where('installment',$installment);
		$this->db->update('head_wise_fund',$formArray);
		
	}
	
	////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


}


?>
