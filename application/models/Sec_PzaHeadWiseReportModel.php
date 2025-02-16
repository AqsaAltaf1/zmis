<?php
class Sec_PzaHeadWiseReportModel extends CI_model{

	
	
	 
	
	function districtList()
	{
		$this->db->select("*");
		$this->db->from("district_users");
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function accountHead()
	{
		$this->db->select("MustahiqType");
		$this->db->from("mustahiqeen");
		$this->db->group_by('MustahiqType',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function getInstallment()
	{
		$this->db->select("installment");
		$this->db->from("mustahiqeen_payments");
		$this->db->group_by('installment',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function gaTotalList($getfinancial_year,$getInstallment)
	{
		$this->db->select("District_Name, mustahiq_name, father_name, mustahiq_cnic, gender, contact_number, LZCActualName, category");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Guzara Allowance");
		$this->db->where('year',$getfinancial_year);
		$this->db->where('installment',$getInstallment);
		$this->db->order_by('District_Name',"ASC");
		//$this->db->limit(30000);
		return $users = $this->db->get()->result_array();
	}
	
	
	function maTotalList($getfinancial_year,$getInstallment)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Marriage Assistance");
		$this->db->where('year',$getfinancial_year);
		//$this->db->where('installment',$getInstallment);
		$this->db->order_by('District_Name',"ASC");
		//$this->db->limit(30000);
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	function dmTotalList($getfinancial_year,$getInstallment)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Deeni Madaris");
		$this->db->where('year',$getfinancial_year);
		$this->db->where('installment',$getInstallment);
		$this->db->where('payment_status',1);
		$this->db->order_by('District_Name',"ASC");
		//$this->db->limit(30000);
		return $users = $this->db->get()->result_array();
	}
	
	
	function esTotalList($getfinancial_year,$getInstallment)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Educational Stipend (A)");
		$this->db->or_where('MustahiqType',"Educational Stipend (P)");
		$this->db->where('year',$getfinancial_year);
		$this->db->where('installment',$getInstallment);
		$this->db->where('payment_status',1);
		$this->db->order_by('District_Name',"ASC");
		//$this->db->limit(30000);
		return $users = $this->db->get()->result_array();
	}
	
	function gaPaidList($getfinancial_year,$getInstallment)
	{
		$this->db->select("District_Name, mustahiq_name, father_name, mustahiq_cnic, gender, contact_number, LZCActualName, category");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Guzara Allowance");
		$this->db->where('payment_year',$getfinancial_year);
		$this->db->where('payment_installment',$getInstallment);
		$this->db->where('payment_status',1);
		$this->db->order_by('District_Name',"ASC");
		//$this->db->limit(30000);
		return $users = $this->db->get()->result_array();
	}
	
	
	
	function maPaidList($getfinancial_year,$getInstallment)
	{
		$this->db->select("*");
		$this->db->from("mustahiqeen");
		$this->db->where('MustahiqType',"Marriage Assistance");
		$this->db->where('payment_year',$getfinancial_year);
		$this->db->where('payment_installment',$getInstallment);
		$this->db->where('payment_status',1);
		$this->db->order_by('District_Name',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	
	
	
	
	function dashboardsearch($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("payment_rec_from",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	$this->db->where('check_date >=', $start_date);
	$this->db->where('check_date <=', $end_date);
	return $query = $this->db->get()->result_array();
	}
	
	
	function totalReceivedSearch($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where('check_date >=', $start_date);
	$this->db->where('check_date <=', $end_date);
	$this->db->order_by('id',"ASC");
	return $query = $this->db->get()->result_array();
	}
	
	function allHeadsSearch($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("payment_rec_from",'District');
	$this->db->where('check_date >=', $start_date);
	$this->db->where('check_date <=', $end_date);
	return $query = $this->db->get()->result_array();
	}
	
	function dashboardsearchdate($dist_hosp,$acount_head,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$dist_hosp);
	$this->db->where("account_head",$acount_head);
	$this->db->where("payment_rec_from",'District');
	$this->db->where('check_date >=', $start_date);
	$this->db->where('check_date <=', $end_date);
	return $query = $this->db->get()->result_array();
	}
	
	
	function hospitalSearch($hospital_id,$start_date,$end_date)
	{
	$this->db->select("*");
	$this->db->from("pzf_fund");
	$this->db->where("district_hospital_id",$hospital_id);
	$this->db->where("payment_rec_from",'Hospital');
	$this->db->where('check_date >=', $start_date);
	$this->db->where('check_date <=', $end_date);
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
