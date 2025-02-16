<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist_Orphan_reg extends CI_Controller {

	
	
	function __construct()
	{
	parent::__construct();
	$this->load->model('Dist_Orphan_reg_model');
	$this->load->model('Dist_GA_mustahiq_reg_model');
	}
	
	

public function index()
{
$userid = $this->session->userdata('id');
$data['get_all_districts'] = $this->Dist_GA_mustahiq_reg_model->get_all_districts();
$data['GetLzcLocality'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("LzcLocality");
$data['GetGender'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Gender");
$data['GetGuardianType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanGuardian");
$data['GetIdentityOption'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanIdentity");
$data['GetIdentityOptionSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("IdentityOptionSubType");
$data['GetContectType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("ContectType");
$data['GetSehatCard'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SehatCard");
$data['GetYesNo'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("YesNo");
//$data['GetMaritalStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("MaritalStatus");
$data['GetSkills'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("Skills");
$data['GetSchoolGoingChild'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("SchoolGoingChild");
$data['GetBrother'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanBrother");
$data['GetSister'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanSister");

$data['GetCategory'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanCategory");
$data['GetOtherDisableType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OtherDisableType");
$data['GetCategorySubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("CategorySubType");
$data['GetFinancialAssiatance'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("FinancialAssiatance");
$data['GetFinancialAssiatanceSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("FinancialAssiatanceSubType");
$data['GetGoldStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GoldStatus");
$data['GetMotherJobStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("motherJobStatus");
$data['GetGoldStatusSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("GoldStatusSubType");
$data['GetHouseStatus'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("HouseStatus");
$data['GetHouseStatusSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("HouseStatusSubType");
$data['GetRentalSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("RentalSubType");
$data['GetNoOfDependence'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("NoOfDependence");
$data['GetNoOfDependenceSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("NoOfDependenceSubType");
$data['GetQualification'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OrphanEducation");
$data['GetIncomeSource'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IncomeSource");
$data['GetMonthlyIncomeRange'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("MonthlyIncomeRange");
$data['GetJobType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("JobType");
$data['GetOtherIncomeSource'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("OtherIncomeSource");
$data['GetIncomeSourceSubType'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("IncomeSourceSubType");
$data['GetBankAccount'] = $this->Dist_GA_mustahiq_reg_model->get_master_fields("BankAccount");
$data['GetLiveStock']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("LiveStock");
$data['GetLiveStockSubType']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("LiveStockSubType");
$data['GetModeOfTransportation']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("ModeOfTransportation");

$data['GetElectricity']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Electricity");
$data['GetFuel']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Fuel");
$data['GetWater']=$this->Dist_GA_mustahiq_reg_model->get_master_fields("Water");

$data['get_all_lzc'] = $this->Dist_GA_mustahiq_reg_model->get_all_lzc($userid);

$userName = $this->session->userdata('username');




$data['get_all_districts'] = $this->Dist_Orphan_reg_model->get_all_districts();
$this->load->view('district/dist_orphan_reg',$data);
	}
}
