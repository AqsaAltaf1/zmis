<?php
class Pza_Hospital_fund_allocation_model extends CI_model{

	
	function manage_hospital_payment($formArray)
	{
		$this->db->insert("hospital_payment",$formArray);
	}
	
	
	
	
	
	
	function get_all_hospitalslist()
	{
		$this->db->select("*");
		$this->db->from("hospital_users");
		//$this->db->limit(5);
		$this->db->order_by('name',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_all_hospitalpayment($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("hospital_payment");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	


	function get_all_hospital_print($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("hospital_payment");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	


	
	function get_all_hospitalpayment_sf($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("special_health_fund");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	function get_sf_hospital_print($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("special_health_fund");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	function manage_hospital_sfpayment($formArray)
	{
		$this->db->insert("special_health_fund",$formArray);
	}
	
	
	function print_hosp_report($getfinancial_year,$getfinancial_installment)
	{
		$this->db->select("*");
		$this->db->from("hospital_payment");
		$this->db->where('financial_year',$getfinancial_year);
		$this->db->where('installment',$getfinancial_installment);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
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
