<?php
class Dist_GA_Lz_19_model extends CI_model{

	function get_all_mustahiqeen($userid,$getfinancial_year)
	{
		
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('year',$getfinancial_year);
		$this->db->where('MustahiqType','Guzara Allowance');
		$this->db->where('Remarks!=','Reject');
		//$this->db->limit(5);
		$this->db->order_by('tobeupdated',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	function getGsMustahiqeen($userid,$getfinancial_year,$userName)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('district_id',$userid);
		$this->db->where('addedby',$userName);
		$this->db->where('year',$getfinancial_year);
		$this->db->where('Remarks!=','Reject');
		//$this->db->limit(5);
		$this->db->order_by('tobeupdated',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
		function get_all_lzc($userid)
	{
		$this->db->select("*");
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
		
	}
	
	function ga_mustahiq_manage_edit($formArray,$getid)
	{
	
	$this->db->where('id',$getid);
	$this->db->update('mustahiqeen',$formArray);		
	}
	
	
	
	function ga_mustahiq_details_audit_submit($formArray,$getid)
	{
	
	$this->db->where('id',$getid);
	$this->db->update('mustahiqeen',$formArray);		
	}
	
	
	
	
	
	
	////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
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






	
	function create($formArray)
	{
		$this->db->insert("adddata",$formArray);
	}


	function allrecords()
	{
		
		$this->db->select("*");
		$this->db->from("adddata");
		$this->db->limit(15);
		$this->db->order_by('sn',"DESC");
		return $users = $this->db->get()->result_array();
	}


	
	function lastuser()
	{

	$this->db->select("*");
	$this->db->from("adddata");
	$this->db->limit(1);
	$this->db->order_by('sn',"DESC");
	$query = $this->db->get();
	return $result = $query->result();

	}



	function get_single_user($id)
	{
	return $this->db
	->where( 'sn', $id )
	->get('adddata')
	->result();
	}
	
	
	
	
	
	

	function delete_user_data($getuserid)
	{
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}


	function get_single_user_array($id)
	{
	return $this->db
	->where( 'sn', $id )
	->get('adddata')
	->row_array();
	}
	
	
	function record_count() {
       return $this->db->count_all("adddata");
   }
	
	public function fetch_subscribers($limit, $start) {
       $this->db->limit($limit, $start);
       $query = $this->db->get("adddata");
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
       }
       return false;
   }
	
	

	function confirm_users($formArray,$getuserid)
	{
		$this->db->insert("confirmdata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}

	function review_users($formArray,$getuserid)
	{
		$this->db->insert("reviewdata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}

	function reject_users($formArray,$getuserid)
	{
		$this->db->insert("rejecteddata",$formArray);
		$this->db->where('sn',$getuserid);
		$this->db->delete('adddata');	
	}



}


?>
