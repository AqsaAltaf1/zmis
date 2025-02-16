<?php
class Dist_GA_Lz_11_model extends CI_model{

	
	
		function get_lzclist($userid)
	{
		$this->db->select("*");
		$this->db->from("lzc_list");
		$this->db->where('district_id',$userid);
		//$this->db->limit(50);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	function get_all_lzclist($userid,$getfinancial_year)
	{
// and mustahiqeen.MustahiqType
//2333555555555
	 //$query = $this->db->query("SELECT LZC_name as id,LZCActualName, count(*) as NOB FROM guzara_allowance_mustahiqeen where district_id= '".$userid."' group by LZC_name,LZCActualName ");
		$MustahiqType = "Guzara Allowance";
	   $query = $this->db->query("select lzc_list.id ,lzc_list.lzc_name as LZCActualName, count(mustahiqeen.LZC_id) as NOB from lzc_list LEFT JOIN mustahiqeen ON mustahiqeen.LZC_id=lzc_list.id where  mustahiqeen.MustahiqType='".$MustahiqType."' and lzc_list.district_id= '".$userid."' and mustahiqeen.year= '".$getfinancial_year."' GROUP by lzc_list.lzc_name, lzc_list.id");
	  return $query->result_array();
	//echo $this->db->last_query();
	//exit;

	
	}
	
	function getGsLzclist($userid,$getfinancial_year,$gsUserName)
	{
// and mustahiqeen.MustahiqType
//2333555555555
	 //$query = $this->db->query("SELECT LZC_name as id,LZCActualName, count(*) as NOB FROM guzara_allowance_mustahiqeen where district_id= '".$userid."' group by LZC_name,LZCActualName ");
		$MustahiqType = "Guzara Allowance";
	   $query = $this->db->query("select lzc_list.id ,lzc_list.lzc_name as LZCActualName, count(mustahiqeen.LZC_id) as NOB from lzc_list LEFT JOIN mustahiqeen ON mustahiqeen.LZC_id=lzc_list.id where  mustahiqeen.MustahiqType='".$MustahiqType."' and lzc_list.district_id= '".$userid."' and mustahiqeen.year= '".$getfinancial_year."' and mustahiqeen.addedby= '".$gsUserName."' GROUP by lzc_list.lzc_name, lzc_list.id");
	  return $query->result_array();
	//echo $this->db->last_query();
	//exit;

	
	}
	

	function get_lzcwise_mustahiq_record()
	{
		$this->db->select("*");
		$this->db->from("district_payment");
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	

	function get_gs_lzcwise_mustahiq_record()
	{
		$this->db->select("*");
		$this->db->from("district_payment");
		
		//$this->db->limit(5);
		$this->db->order_by('id',"ASC");
		return $users = $this->db->get()->result_array();
	}
	
	
	
	////////////////////////////////////////////////////////
	
	
	
	
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
	


}


?>
