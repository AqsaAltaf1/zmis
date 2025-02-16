<?php
class Pza_dist_profile_model extends CI_model{

	function pza_add_fund($formArray)
	{
		$this->db->insert("pzf_fund",$formArray);
	}
	
	
	function pza_add_fund_update($formArray,$getid)
	{
		$this->db->where('id',$getid);
		$this->db->update('pzf_fund',$formArray);		
	}
	
	
	
	function get_all_districts()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_all_zakatheads()
	{
		$this->db->select("*");
		$this->db->from("hoa_list");
		//$this->db->limit(5);
		$this->db->order_by('zakat_head',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	function dashboardsearch($dist_hosp,$acount_head)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	return $query = $this->db->get()->result_array();
	}
	
	
	function dashboardsearchdate($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	$this->db->where('add_date >=', $start_date);
	$this->db->where('add_date <=', $end_date);
	return $query = $this->db->get()->result_array();
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


	function manage_year_inst($formArray)
	{
	$this->db->insert("year_installment",$formArray);
	$getlastid = $this->db->insert_id();
	$queryupdate = $this->db->query("UPDATE year_installment SET status = '0' WHERE id != '".$getlastid."'");
	}
	
	
	
	
	


	/*function allrecords()
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
	}*/



}


?>
