<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hosp_monitoring_reporting extends CI_Controller {


function __construct()
{
parent::__construct();
//$this->load->model('hosp_dashboard_model');
$this->load->model('Hosp_monitoring_reporting_model');

}

public function index()
{
$data['get_all_districts'] = $this->Hosp_monitoring_reporting_model->get_all_districts();
$this->load->view('hospital/hosp_monitoring_reporting',$data);
}




function manage_hosp_monitoring_reporting()
{	
$today = date("Y-m-d");

$pt_cnic = ($this->input->post("pt_cnic") == "" ? "%%" : $this->input->post("pt_cnic"));
$pt_mobile = ($this->input->post("pt_mobile") == "" ? "%%" : $this->input->post("pt_mobile"));
$pt_istehqaq = ($this->input->post("pt_istehqaq") == "" ? "%%" : $this->input->post("pt_istehqaq"));
$pt_obdnumber = ($this->input->post("pt_obdnumber") == "" ? "%%" : $this->input->post("pt_obdnumber"));
$pt_gender = ($this->input->post("pt_gender") == "0" ? "%%" : $this->input->post("pt_gender"));
$dist_id = ($this->input->post("dist_id") == '0' ? "%%" : $this->input->post("dist_id"));
$pt_catagory = ($this->input->post("pt_catagory") == '0' ? "%%" : $this->input->post("pt_catagory"));
$pt_type = ($this->input->post("pt_type") == '0' ? "%%" : $this->input->post("pt_type"));
$mustahiq_type = ($this->input->post("mustahiq_type") == '0' ? "%%" : $this->input->post("mustahiq_type"));

$start_date = ($this->input->post("start_date") == "" ? "2018-01-01" : $this->input->post("start_date"));
$end_date = ($this->input->post("end_date") == "" ? "".$today."" : $this->input->post("end_date"));

$report_qry = "SELECT * FROM patients WHERE 
district Like '".$dist_id."'
AND pt_catagory Like '".$pt_catagory."'
AND pt_cnic Like '".$pt_cnic."'
AND cell_no Like '".$pt_mobile."'
AND Istehqaq_no Like '".$pt_istehqaq."'
AND opd_no Like '".$pt_obdnumber."'
AND gender Like '".$pt_gender."'
AND patient_type Like '".$pt_type."'
AND add_date between  '".$start_date."' AND  '".$end_date."'
AND pt_hc_category Like '".$mustahiq_type."'";
$query = $this->db->query($report_qry);

$data['get_all_regular_patients'] = $query->result_array();

$this->load->view('hospital/hosp_monitoring_reporting_print',$data);


}


















}
