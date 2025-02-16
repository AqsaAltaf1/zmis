<?php
class Pza_admin_profile_model extends CI_model{

		
	function updateuser_admin($formArray,$getid)
	{
		$this->db->where('id',$getid);
		$this->db->update('pza_admin',$formArray);		
	}
	
	
	
	
	function updateuser_admin_email($formArray,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('pza_admin',$formArray);		
	}
	
	


	


}


?>
