<?php
class Pza_posting_transfer_model extends CI_model{

	
	
	function pza_employees_transfer_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $district_list = $this->db->get()->result_array();
	}
	
	
	
	
	function manage_pza_employees_transfer($formArray)
	{
		$this->db->insert("posting_transfer",$formArray);
	}
	
	
	


	


}


?>
