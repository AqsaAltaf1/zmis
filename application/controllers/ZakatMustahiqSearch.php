<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ZakatMustahiqSearch extends CI_Controller
{


	public function index()
	{
		$this->load->view('pza/search/zakatMustahiqSearch');
	}

	public function MustahiqSearch()
	{
		$mustahiqCnic = $this->input->post("mustahiqCnic");

		$getMustahiqCnic = $this->db->query("SELECT * FROM mustahiqeen WHERE mustahiq_cnic = '" . $mustahiqCnic . "'");
		$cnicCount =  $getMustahiqCnic->num_rows();

		if ($cnicCount > 0) {
			$selectedMustahiq = $this->db->select('*')->from('mustahiqeen')->where('mustahiq_cnic', $mustahiqCnic)->get();
			$flag = 1;
			$mustahiqStatus = $selectedMustahiq->row('selected_lz11');
			$status = $selectedMustahiq->row('status');
			$mustahiqDistrict = $selectedMustahiq->row('District_Name');
			$mustahiqLzc = $selectedMustahiq->row('LZCActualName');
			$mustahiqAudit = $selectedMustahiq->row('rejectionReason');
			$mustahiqPaymentStatus = $selectedMustahiq->row('payment_status');
			$year = $selectedMustahiq->row('year');
			$MustahiqType = $selectedMustahiq->row('MustahiqType');
			$auditRemarks = $selectedMustahiq->row('Remarks');
			$mustahiqInstitute = $selectedMustahiq->row('InstituteName');


			$data['mustahiqCnic'] = $mustahiqCnic;
			$data['mustahiq_name'] = $selectedMustahiq->row('mustahiq_name');
			$data['father_name'] = $selectedMustahiq->row('father_name');
			$data['mustahiq_cnic'] = $selectedMustahiq->row('mustahiq_cnic');
			$data['District_Name'] = $selectedMustahiq->row('District_Name');
			$data['category'] = $selectedMustahiq->row('category');
			$data['year'] = $selectedMustahiq->row('year');
			$data['payment_year'] = $selectedMustahiq->row('payment_year');
			$data['MustahiqType'] = $selectedMustahiq->row('MustahiqType');
			$data['payment_status'] = $selectedMustahiq->row('payment_status');
			$data['Remarks'] = $selectedMustahiq->row('Remarks');
			$data['rejectionReason'] = $selectedMustahiq->row('rejectionReason');

			if (($mustahiqStatus == 1) &&
				($status == 1) &&
				($mustahiqPaymentStatus == 1) &&
				($MustahiqType == "Guzara Allowance")
			) {
				$data['resultmsg'] = "The citizen bearing <b>" . $mustahiqCnic . " </b>
				 has received <b>Rs.12000/-</b> during year: " . $year . " 
				 from District <b>'" . $mustahiqDistrict . "'</b> 
				 Local Zakat Committtee <b>'" . $mustahiqLzc . "'</b> ";
			} else if (($mustahiqStatus == 1) &&
				($status == 1) &&
				($mustahiqPaymentStatus == 0) &&
				($MustahiqType == "Guzara Allowance")
			) {
				$data['resultmsg'] = "The citizen bearing <b> " . $mustahiqCnic . "</b> 
				is nominated for Zakat payment for the year: <b>'" . $year . "' </b> 
				from District <b>'" . $mustahiqDistrict . "'</b> Local Zakat Committtee 
				<b>'" . $mustahiqLzc . "'</b> but not received till now";
			} else if (($mustahiqStatus == 0) &&
				($status == 0) &&
				($MustahiqType = "Guzara Allowance")
			) {
				$data['resultmsg'] = "The citizen bearing CNIC: <b> " . $mustahiqCnic . "  
				</b>is rejected by Zakat Audit team due to following audit observation.  
				<br /> <b>'" . $mustahiqAudit . "'</b>   ";
			} else if (($mustahiqStatus == 0) &&
				($status == 1) &&
				($mustahiqPaymentStatus == 0) &&
				($MustahiqType == "Guzara Allowance") &&
				($auditRemarks == "Approve")
			) {
				$data['resultmsg'] = " The citizen bearing CNIC: <b> " . $mustahiqCnic . " 
				</b>is registered during financial Year: <b>'" . $year . "' </b> 
				in District <b>'" . $mustahiqDistrict . "'</b> 
				Zakat office but due to low budget, he is not able to get financial assistance. ";
			} else if (($status == 1) &&
				($MustahiqType == "Deeni Madaris") or
				($MustahiqType == "Educational Stipend (A)") or
				($MustahiqType == "Educational Stipend (P)")  &&
				($mustahiqPaymentStatus = 1)
			) {
				$data['resultmsg'] = " The citizen bearing CNIC: <b> " . $mustahiqCnic . " 
				</b> is registered during financial Year: <b>'" . $year . "' </b> 
				in Institute <b>'" . $mustahiqInstitute . "'</b> 
				and received Financial Assistance from Zakat Fund. ";
			} else if (($status == 1) &&
				($MustahiqType == "Marriage Assistance") &&
				($mustahiqPaymentStatus == 1)
			) {
				$data['resultmsg'] = " The citizen bearing CNIC: <b> " . $mustahiqCnic . " 
				</b> is registered during financial Year: <b>'" . $year . "' </b> 
				in District <b>'" . $mustahiqDistrict . "'</b> 
				and Received Financial Assistance ";
			}
			// else if (($MustahiqType != "Marriage Assistance") or
			// 	($MustahiqType != "Deeni Madaris") or
			// 	($MustahiqType != "Educational Stipend (A)") or
			// 	($MustahiqType != "Educational Stipend (P)") or
			// 	($MustahiqType != "Guzara Allowance")
			// ) {
			// 	$hcMustahiqCnic = $this->input->post("mustahiqCnic");
			// 	$getHcMustahiqCnic = $this->db->query(" SELECT  *   FROM hc_mustahiqeen where cnic = '" . $hcMustahiqCnic . "' And  year = 
			// 	'" . $year . "' ");
			// 	$cnicCount =  $getHcMustahiqCnic->num_rows();
			// 	$data['mustahiq_cnic'] = $selectedMustahiq->row('cnic');
			// 	$data['mustahiq_name'] = $selectedMustahiq->row('mustahiq_name');
			// 	$data['father_name'] = $selectedMustahiq->row('f_name');
			// 	$data['District_Name'] = $selectedMustahiq->row('District_Name');
			// 	$data['category'] = $selectedMustahiq->row('category');
			// }
		} else if ($cnicCount == 0) {
			$flag = 0;
			$data['resultmsg'] =  "The Citizen bearing CNIC: <b> " . $mustahiqCnic . " 
				</b> is not available in Zakat Database";
		}


		$data['flag'] = $flag;


		$this->load->view('pza/search/mustahiqSearch', $data);
	}
}
