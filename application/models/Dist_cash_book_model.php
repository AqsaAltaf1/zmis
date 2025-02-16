<?php
class Dist_cash_book_model extends CI_model{


function manage_pza_payment($formArray)
{
$this->db->insert("pza_fund",$formArray);
}


function manage_headwise_payment($formArray)
{
$this->db->insert("dist_head_wise_fund",$formArray);
}

function get_all_cashbook_entries($getfinancial_year,$userid)
{

/*$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("district_id",$userid);
$this->db->order_by('id',"DESC");
return $cashbook_entries = $this->db->get()->result_array();*/


$query = $this->db->query("SELECT * FROM dist_head_wise_fund WHERE year = '".$getfinancial_year."' AND district_id = '".$userid."' GROUP BY cheque_no");

$result = $query->result_array();
return $result;






}




function get_all_inst_list($userid)
{
$this->db->select("*");
$this->db->from("institution_list");
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}



function get_all_deeni_madaris($userid)
{
$this->db->select("*");
$this->db->from("madrassa_list");
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}



////////////////////////////////////////////////////////


function get_dist_headwise_fund($getfinancial_year,$getfinancial_installment,$userid)
{
$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("(account_head='Guzara Allowance' OR account_head='Marriage Assistance')", NULL, FALSE);
//$this->db->where("account_head",'Guzara Allowance');
//s$this->db->where("account_head",'Marriage Assistance');
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}




function get_all_madrassalist($getfinancial_year,$getfinancial_installment,$userid)
{
$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("account_head",'Deeni Madaris');
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}




function get_all_edulistings($getfinancial_year,$getfinancial_installment,$userid)
{
$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("account_head",'Educational Stipend (A)');
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}


function get_hc_listings($getfinancial_year,$getfinancial_installment,$userid)
{
$this->db->select("*");
$this->db->from("dist_head_wise_fund");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("account_head",'Health Care');
$this->db->where("district_id",$userid);
//$this->db->limit(5);
$this->db->order_by('id',"DESC");
return $users = $this->db->get()->result_array();
}










}


?>
