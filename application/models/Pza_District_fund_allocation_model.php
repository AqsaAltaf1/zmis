<?php
class Pza_District_fund_allocation_model extends CI_model
{

	
	function get_districts_payment($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("district_payment");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	

	

	
	
	
	
	
	
	
	
	
	
	


}


?>
