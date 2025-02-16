<?php
class Dist_admin_expense_model extends CI_model{

	
	function manage_adminexp_payment($formArray)
	{
		$this->db->insert("zakat_paid_staff_payment",$formArray);
		return $this->db->insert_id();
		
	}

	function manage_admin_headwise_payment($formArray)
	{
		$this->db->insert("admin_expense_headwise_allocation",$formArray);
		return $this->db->insert_id();
		
	}
	
	function manage_adminexp_payment_months($formArray)
	{
		$this->db->insert("adminexp_payment_months",$formArray);		
	}
	
	
	function get_all_districtslist()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_salarypaid_staff($userid,$getfinancial_year)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_payment");
		$this->db->where('district_id',$userid);
		$this->db->where('designation_id',1);
		$this->db->where('financial_year',$getfinancial_year);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_audit_salarypaid_staff($userid,$getfinancial_year)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_payment");
		$this->db->where('district_id',$userid);
		$this->db->where('designation_id',2);
		$this->db->where('financial_year',$getfinancial_year);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
		
		
		//echo $this->db->last_query();
		
		
	}
	
	function get_auditor_salarypaid_staff($userid,$getfinancial_year)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_payment");
		$this->db->where('district_id',$userid);
		$this->db->where('designation_id',3);
		$this->db->where('financial_year',$getfinancial_year);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
		
		
		//echo $this->db->last_query();
		
		
	}
	
	
	
	
	
	// Get Zakat Paid Staff type

	function get_zakat_staff()
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_type");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	// Get Zakat Paid Staff List
	function get_zakat_paid_staff_list()
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	// Get Zakat Paid Staff List secretary
	function get_zakatpaid_staff_secretary($userid)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		$this->db->where('designation_id',"1");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	// Get Zakat Paid Staff List secretary
	function get_zakatpaid_staff_audit_officer($userid)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		$this->db->where('designation_id',"2");
		$this->db->where('district_id',$userid);
		//$this->db->limit(5);
		$this->db->order_by('id',"DESC");
		return $users = $this->db->get()->result_array();
	}
	
	
	// Get Zakat Paid Staff List secretary
	function get_zakatpaid_staff_auditor($userid)
	{
		$this->db->select("*");
		$this->db->from("zakat_paid_staff_list");
		$this->db->where('designation_id',"3");
		$this->db->where('district_id',$userid);
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
