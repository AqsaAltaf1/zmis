<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResponseResult{
public $Result;
public $Description;
public $linkforweb;
public $GeoLocation;
}

class FormHandingOver extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->model('FormHandingOverModel');	
	}
	
	
	public function index()
	{
		$districtID = $this->session->userdata('id');
		$userName = $this->session->userdata('username');
		$data['getGroupSecretaryLZC'] = $this->FormHandingOverModel->getGroupSecretaryLZC($districtID,$userName);
		$this->load->view('gs/formHandingOver',$data);
	}
	
	
	function ZakatEntryForm()
	{
	
		
		$formArray = array();
		
		$districtID =  $this->session->userdata('id');
		$userName = $this->session->userdata('username');
		$GetDistrictName = $this->db->select('*')->from('district_users')->where('id',$districtID)->get();
		$districtName = $GetDistrictName->row('district_name');
		$formArray['District_Name'] = $districtName;
		$formArray['LZC_Name'] =  $this->input->post("LZC_Name");     		
		$formArray['GS_Name'] =  $this->session->userdata('entityName'); 
		$formArray['GS_Username'] =  $userName; 
		$formArray['FinYear'] =  $this->input->post("FinYear");       
		$formArray['InstallmentNo'] =  $this->input->post("InstallmentNo");       
		$formArray['ChairmanName'] =  $this->input->post("ChairmanName");       
		$formArray['ChairmanFather'] =  $this->input->post("ChairmanFather"); 
		$formArray['ChairmanCNIC'] = str_replace ("-","", $this->input->post("ChairmanCNIC"));
		$formArray['ChairmanDoB'] =  $this->input->post("dateOfBirth");
		$formArray['ChairmanPhone1'] = str_replace("-","",  $this->input->post("ChairmanPhone1"));       
		$formArray['ChairmanPhone2'] = str_replace("-","",  $this->input->post("ChairmanPhone2"));       
		$formArray['FormHandedOver'] =  $this->input->post("FormHandedOver");       
		$formArray['CNICHandedOver'] =  $this->input->post("CNICHandedOver");              
		$formArray['ChairmanAppointDate'] =  $this->input->post("ChairmanAppointDate");       
		$formArray['EnteredBy'] =  $this->session->userdata('entityName');
		
		$ChairmanCNIC = str_replace ("-","", $this->input->post("ChairmanCNIC"));
		$cnicFront['upload_path'] = 'assets/zakatentryform/'; 
		$cnicFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
		$cnicFront['file_name'] = $ChairmanCNIC.'_cnicFront'.$_FILES["cnicFront"];
		$getcnicFront = $ChairmanCNIC.'_cnicFront'.$_FILES["cnicFront"];
		$this->load->library('upload', $cnicFront); 
		$this->upload->initialize($cnicFront);
		$this->upload->do_upload('cnicFront');
		$cnicFrontName = $this->upload->data();
		$formArray['cnicFront']  = $cnicFrontName['file_name'];
		       
		$cnicBack['upload_path'] = 'assets/zakatentryform/'; 
		$cnicBack['allowed_types'] = 'jpg|jpeg|png|gif'; 
		$cnicBack['file_name'] = $ChairmanCNIC.'_cnicBack'.$_FILES["cnicBack"]['name'];
		$getcnicBack = $ChairmanCNIC.'_cnicBack'.$_FILES["cnicBack"]['name'];
		$this->load->library('upload', $cnicBack); 
		$this->upload->initialize($cnicBack);
		$this->upload->do_upload('cnicBack');
		$cnicBackName = $this->upload->data();
		$formArray['cnicBack']  = $cnicBackName['file_name'];	
		
		$affidavit['upload_path'] = 'assets/zakatentryform/'; 
		$affidavit['allowed_types'] = 'jpg|jpeg|png|gif'; 
		$affidavit['file_name'] = $ChairmanCNIC.'_affidavit'.$_FILES["affidavit"]['name'];
		$getaffidavit = $ChairmanCNIC.'_affidavit'.$_FILES["affidavit"]['name'];
		$this->load->library('upload', $affidavit); 
		$this->upload->initialize($affidavit);
		$this->upload->do_upload('affidavit');
		$affidavitName = $this->upload->data();
		$formArray['affidavit']  = $affidavitName['file_name'];  
		
		$date = date('Y-m-d H:i:s');
		$formArray['EntryDateTime'] = $date;
		$formArray['Device'] = "Computer";
		$formArray['status'] = 1;
		$getid = $this->FormHandingOverModel->manage_chairman_dataentryform($formArray);
	
		//$myResponse->Result = "Successful";
		//$myResponse->Description = "Record Added Successfully";
		
		//echo json_encode($myResponse);
		$this->session->set_flashdata('success','Record Added Successfully..!');
		redirect(base_url('FormHandingOver'));
}
	 
	
// Abbas sb need your gudence to follow this function for picture saving...
	
function SavePicture()
{

$allowed_image_extension = array("gif","jpg","png","jpeg","JPEG","JPG","PNG","GIF");

if($_FILES["pictureurl"]["tmp_name"])
{
$path = $_FILES['pictureurl']['name'];
$file_extension = pathinfo($path, PATHINFO_EXTENSION);
if(! in_array($file_extension, $allowed_image_extension)) 
{
$myResponse->Result = "Error";
$myResponse->Description = "Invalid Image Format ";
echo json_encode($myResponse);
}
else if($_FILES["pictureurl"]["size"] > 409600)
{
$myResponse->Result = "Error";
$myResponse->Description = "Invalid Image Size Exceeded then 400KB ";
echo json_encode($myResponse);
}
else
{

$student_cnic = $this->input->post("cnicno");
$picture_type =  $this->input->post("picture_type");
$config_cnicFront['upload_path'] = 'assets/zakatentryform/'; 
$config_cnicFront['allowed_types'] = 'jpg|jpeg|png|gif'; 
$config_cnicFront['file_name'] = $student_cnic."".$picture_type.".jpg";        //"".$_FILES["pictureurl"]['name']; Changed on 03-Jun-2021 by ABBAS

$this->load->library('upload', $config_cnicFront); 
$this->upload->initialize($config_cnicFront);
$this->upload->do_upload('pictureurl');
$fileData = $this->upload->data();
$formArray['cnicFront']  = $fileData['file_name'];


$myResponse->Result = "Successful";
$myResponse->Description = "Picture Uploaded Successfully ";

}
	
	
	
}
	
}
	
	
	
	
	
	
}
