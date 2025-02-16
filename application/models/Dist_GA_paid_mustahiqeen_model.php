<?php
class Dist_GA_paid_mustahiqeen_model extends CI_model{

	
	function manage_institution_reg_district($formArray)
	{
		$this->db->insert("district_users",$formArray);
	}
	
	
	function get_paid_mustahiqeen121212($userid,$getfinancial_year)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('payment_status',1);
		$this->db->where('payment_year',$getfinancial_year);
		//$this->db->limit($getnob);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_paid_mustahiqeen($userid,$getfinancial_year)
	{
		$this->db->select('*');
    	$this->db->from('mustahiqeen');
    	$this->db->join('mustahiqeen_payments', 'mustahiqeen_payments.user_id = mustahiqeen.id');
    $this->db->where('mustahiqeen_payments.financial_Year',$getfinancial_year);
	$this->db->where('mustahiqeen.district_id',$userid);
	$this->db->where('mustahiqeen.payment_status',1);
	$this->db->where('mustahiqeen.payment_year',$getfinancial_year);
	$this->db->where('mustahiqeen_payments.payment_amount',12000);
	//$this->db->order_by('guzara_allowance_mustahiqeen_payments.EntryDateTime',"DESC");
	return $users = $this->db->get()->result_array();
	}
	
	
	function getGsPaidMustahiqeenList($userid,$getfinancial_year,$gsUserName)
	{
		$this->db->select('*');
    	$this->db->from('mustahiqeen');
    	$this->db->join('mustahiqeen_payments', 'mustahiqeen_payments.user_id = mustahiqeen.id');
    $this->db->where('mustahiqeen_payments.financial_Year',$getfinancial_year);
	//$this->db->where('mustahiqeen.district_id',$userid);
	$this->db->where('mustahiqeen.payment_status',1);
	$this->db->where('mustahiqeen.payment_year',$getfinancial_year);
	$this->db->where('mustahiqeen.addedby',$gsUserName);
	//$this->db->order_by('guzara_allowance_mustahiqeen_payments.EntryDateTime',"DESC");
	return $users = $this->db->get()->result_array();
	}
	

	
	////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	



}


?>
