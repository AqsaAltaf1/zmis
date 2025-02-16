<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_HC_mustahiq_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_HC_mustahiq_reg_model');
	$this->load->model('Dist_DM_mustahiq_reg_model');
	}
	
	
	
	public function index()
	{
		
		
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');


		$userid = $this->session->userdata('id');
		$data['get_all_lzcs'] = $this->Dist_DM_mustahiq_reg_model->get_all_lzcs($userid);
		$data['get_all_hostpital_list'] = $this->Dist_HC_mustahiq_reg_model->get_all_hostpital_list();
		
		$data['get_HC_mustahiq_list'] = $this->Dist_HC_mustahiq_reg_model->get_HC_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		$data['patientDHQ'] = $this->Dist_HC_mustahiq_reg_model->get_HC_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		
		$this->load->view('district/dist_hc_mustahiq_reg',$data);
	}
	
	
	
	
	
	function dist_manage_mustahiq_register()
	{
	// Get LZC Name
	$LZC_id  = $this->input->post("lzc_id");
	$get_lzcname = $this->db->select('*')->from('lzc_list')->where('id',$LZC_id)->get();
	$LZCActualName = $get_lzcname->row('lzc_name');	
	//Get Hospital Name
	$hospitalID  = $this->input->post("hospital_id");
	$getHospitalName = $this->db->select('*')->from('hospital_users')->where('id',$hospitalID)->get();
	$hospitalName = $getHospitalName->row('name');
	
	 $userid = $this->session->userdata('id');
	$districtName = $this->session->userdata('district_name');
	$formArray['district_id'] = $this->session->userdata('id');
	$formArray['District_Name'] = $this->session->userdata('district_name');
	$formArray['lzc_id']  = $this->input->post("lzc_id");
	$formArray['LZCActualName']  = $LZCActualName;
	$formArray['mustahiq_name']  = $this->input->post("mustahiq_name");
	$formArray['f_name']  = $this->input->post("f_name");
	$formArray['cnic']  = str_replace("-", "", $this->input->post("cnic"));
	$formArray['cell_no']  = $this->input->post("cell_no");
	$formArray['gender']  = $this->input->post("gender");
	$formArray['age']  = $this->input->post("age");
	$formArray['istehqaq_no']  = $this->input->post("istehqaq_no");
	$formArray['category']  = $this->input->post("category");
	$formArray['address']  = $this->input->post("address");
	$formArray['disease_type']  = $this->input->post("disease_type");
	$formArray['hospital_id']  = $this->input->post("hospital_id");
	
	
		
		if ($this->input->post("dhq_id")=="provincial_hospital"){
		 $formArray['hospitalName']  = $hospitalName;
		}
		
		 if($this->input->post("dhq_id")=="DHQ.$userid")
		{
		$formArray['hospitalName'] =  "DHQ ".$districtName;
		}
		 if($this->input->post("dhq_id")=="THQ.$userid")
		{
		$formArray['hospitalName'] = "THQ ".$districtName;
		}
		 if($this->input->post("dhq_id")=="BHU.$userid")
		{
		$formArray['hospitalName'] =  "BHU ".$districtName;
		}
		 if($this->input->post("dhq_id")=="Qazi Husain Ahmad Hospital.$userid")
		{
		$formArray['hospitalName'] =  "Qazi Husain Ahmad Hospital Nowshera";
		}
	
	
    $dhqId = $this->input->post("dhq_id");
    $iparr =  explode(".", $dhqId); 
    $type = $iparr[0];
    $districtvalue = $iparr[1];
    
   $finalvalue = $type.$districtvalue;
   
	if($type == "THQ")
	{
	 $formArray['amount']  = $this->input->post("thqAmount");
	 $formArray['dhq_id'] = $districtvalue;   
	}
	else if($type == "DHQ")
	{
	 $formArray['amount']  = $this->input->post("amount");   
	 $formArray['dhq_id'] = $districtvalue;  
	}
	else if($type == "BHU")
	{
	 $formArray['amount']  = $this->input->post("bhuAmount"); 
	 $formArray['dhq_id'] = $districtvalue;
	}
	else if($type == "provincial_hospital")
	{
	 $formArray['amount']  = $this->input->post("bhuAmount"); 
	 $formArray['dhq_id'] = 0;
	}
	else if($type == "Qazi Husain Ahmad Hospital")
	{
	 $formArray['amount']  = $this->input->post("otherDHQAmount"); 
	 $formArray['dhq_id'] = $districtvalue;
	}
	
	
	
	
	
	
	$formArray['hospital_type'] = $type;
		
	

	//$formArray['dhq_id']  = $this->input->post("dhq_id");
	

	$formArray['year']= $this->input->post("year");
	$formArray['installment']= $this->input->post("installment");
	
	$formArray['add_date'] = date("Y-m-d");
	$formArray['status'] = 1;
	
	
		
	$this->Dist_HC_mustahiq_reg_model->dist_manage_mustahiq_register($formArray);		
		
	$this->session->set_flashdata('success','Record Added Successfully..!');
		
	redirect(base_url('Dist_HC_mustahiq_reg'));		
		
	}
	
	
function HealthMustahiqPrint()
	{
	$userid  = $this->session->userdata('id');
	$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
	$getfinancial_year = $getfinancialdata->row('financial_Year');
	$getfinancial_installment = $getfinancialdata->row('installment');
	
	$data['getHealthMustahiqPrint'] = $this->Dist_HC_mustahiq_reg_model->getHealthMustahiqPrint($userid,$getfinancial_year,$getfinancial_installment);
	$this->load->view('district/distHealthMustahiqPrint',$data);
}
	
public function updatePatient()
		{
		$patientID = $this->uri->segment(3);
		$data['patientInfo'] = $this->Dist_HC_mustahiq_reg_model->patientInfo($patientID); 
		$this->load->view('district/distHCMustahiqUpdate', $data);		
		}
		
		
		
		
public function updatePatientRecord()
	
	{
		$userid = $this->session->userdata('id');
		$districtName = $this->session->userdata('district_name');
	
		$getrecord_id = $this->input->post("getrecord_id");
		$userid = $this->session->userdata('id');
		
		
		$formArray = array();
		$formArray['amount']  = $this->input->post("amount");
		
		if ($this->input->post("dhq_id")=="provincial_hospital"){
		 $formArray['hospitalName']  = $hospitalName;
		}
		
		 if($this->input->post("dhq_id")=="DHQ.$userid")
		{
		$formArray['hospitalName'] =  "DHQ ".$districtName;
		}
		 if($this->input->post("dhq_id")=="THQ.$userid")
		{
		$formArray['hospitalName'] = "THQ ".$districtName;
		}
		 if($this->input->post("dhq_id")=="BHU.$userid")
		{
		$formArray['hospitalName'] =  "BHU ".$districtName;
		}
		
		$formArray['updatedOn']  = date("d-m-Y h:i:sa");
		
		
		$this->Dist_HC_mustahiq_reg_model->updatePatientRecord($formArray,$getrecord_id,$userid);
		
		$this->session->set_flashdata('success','Record Updated Successfully..!');	
		redirect(base_url('dist_hc_mustahiq_reg'));

	}	
	
	
	
	


	function ViewHospRecord(){
		
		//$data['get_HC_mustahiq_list'] = $this->Dist_HC_mustahiq_reg_model->get_HC_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
		$getfinancial_year = $getfinancialdata->row('financial_Year');
		$getfinancial_installment = $getfinancialdata->row('installment');


		$userid = $this->session->userdata('id');
		$data['patientDHQ'] = $this->Dist_HC_mustahiq_reg_model->get_HC_mustahiq_list($userid,$getfinancial_year,$getfinancial_installment);
		
		}
	
	
	
	function DeleteHospRecord(){
		
		if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
			$this->Dist_HC_mustahiq_reg_model->DeleteRecord($id);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
		}
	
}
