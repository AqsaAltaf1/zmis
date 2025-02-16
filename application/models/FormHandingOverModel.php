<?php
class FormHandingOverModel extends CI_model{

	
	
	
	function getGroupSecretaryLZC($districtID,$userName)
	{
		$this->db->select("id, lzc_name");  // Changed by Abbas (16-Oct-2020)
		$this->db->from("lzc_list");
		$this->db->where('district_id',$districtID);
		$this->db->where('gs_username',$userName);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	///////////////////////////Form Handing Over/////////////////////////////
	
	function manage_chairman_dataentryform($formArray)
	{
		$this->db->insert("zakatentryforms",$formArray);
		return $this->db->insert_id();
	}

	
	
	
	////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


}


?>
