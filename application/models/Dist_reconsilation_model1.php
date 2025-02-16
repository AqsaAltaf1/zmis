<?php
class Dist_reconsilation_model extends CI_model{

	
	function manage_dist_employees($formArray)
	{
		$this->db->insert("zakat_paid_staff_list",$formArray);
	}
	
	
	
	function get_passcheques($getfinancial_year,$getfinancial_installment,$userid)
	{
		$this->db->select("*");
		$this->db->from("district_passbook");
		$this->db->where("year",$getfinancial_year);
		$this->db->where("district_id",$userid);
		
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	


}


?>
