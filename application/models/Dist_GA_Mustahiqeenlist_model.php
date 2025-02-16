<?php
class Dist_GA_Mustahiqeenlist_model extends CI_model{

	
	
	function get_lzc_mustahiqeen($userid)
	{
		$this->db->select("*");
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_lzc_mustahiqeen_limitwise($getnob,$getlzc_id,$userid)
	{
		
		
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_id',$getlzc_id);
		$this->db->where('Remarks!=','Reject');
		$this->db->where('MustahiqType','Guzara Allowance');
		$this->db->where('status=',1);
		$this->db->where('total_marks<=',90);   // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		$this->db->limit($getnob);
		// $this->db->order_by('total_marks, Priority',"DESC");
		$this->db->order_by('total_marks, Priority',"DESC"); // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		return $users = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//exit;
		
		
	}
	
		function get_lzc_mustahiqeen_limitwise_audit($getnob,$getlzc_id,$userid)
	{
		
		
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_id',$getlzc_id);
		$this->db->where('Remarks!=','Reject');
		$this->db->where('MustahiqType','Guzara Allowance');
		$this->db->where('status=',1);
		$this->db->where('total_marks<=',90);                // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		//$this->db->limit($getnob);
		// $this->db->order_by('total_marks, Priority',"DESC");
		$this->db->order_by('total_marks, Priority',"DESC"); // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		return $users = $this->db->get()->result_array();
		//echo $this->db->last_query();
		//exit;
		
	}
	
	
	
	
	
	function get_alllzc_mustahiqeen($getlzc_id,$userid)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_id',$getlzc_id);
		$this->db->where('Remarks!=','Reject');
		$this->db->where('MustahiqType','Guzara Allowance');
		//$this->db->limit($getnob);
		$this->db->order_by('total_marks',"DESC");    // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		// $this->db->order_by('total_marks',"DESC"); 
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	function manage_mustahiqeen_payment($formArray)
	{
		$this->db->insert("mustahiqeen_payments",$formArray);		
		
	}
	
	
	
	function updateuser($userid,$formarray)
	{
		$this->db->where('id',$userid);
		$this->db->update('mustahiqeen',$formarray);
			
	}
	
	
	function get_selected_mustahiqeen_print($getnob,$getlzc_id,$userid)
	{
			
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('LZC_id',$getlzc_id);
		$this->db->where('total_marks<=',90);  // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		$this->db->where('Remarks!=','Reject');
		$this->db->where('MustahiqType','Guzara Allowance');
		$this->db->where('status=',1);
		$this->db->limit($getnob);
		$this->db->order_by('total_marks, Priority',"DESC");   // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		// $this->db->order_by('total_marks, Priority',"DESC"); 
		return $users = $this->db->get()->result_array();

	}
	
	
	////////////////////////////////////////////////////////
	
	function get_lz19_mustahiqeen_print($getnob,$getlzc_id,$userid)
	{
			
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('MustahiqType','Guzara Allowance');
		$this->db->where('status',1);
		$this->db->where('LZC_id',$getlzc_id);
		//$this->db->where('marks_2021<=',70);        // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		//$this->db->limit($getnob);
		$this->db->order_by('total_marks',"DESC");     // Variable name changed to marks_2021, Changed on 25/05/2021 by Abbaas
		// $this->db->order_by('total_marks',"DESC");   
		return $users = $this->db->get()->result_array();

	}
	
	
	function manage_institution_reg_district($formArray)
	{
		$this->db->insert("district_users",$formArray);
	}
	
	
	
	
	
	
	
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	

	function get_all_headofaccounts()
	{
		$this->db->select("*");
		$this->db->from("hoa_list");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}


	function get_all_hospitals()
	{
		$this->db->select("*");
		$this->db->from("hospital_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}


	function get_pza_fundrecords()
	{
		$this->db->select("*");
		$this->db->from("pzf_fund");
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}

}


?>
