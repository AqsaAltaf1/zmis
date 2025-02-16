
<?php 

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');





?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('pza/include/title');?></title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
.text_align{
text-align: right;
}
.div_align {
align-items: right;
}

@media print
{    
    #btn1, #btn2
    {
        display: none !important;
    }	
}


@media print
{    
    #footer {
	position: fixed;
	bottom: 0;
	display: block !important;
	width:100%;
	}
}
</style>
<body>



<table class="table table-bordered table-striped">

<?php
$i=1;
if(!empty($getlzc_list))
{
foreach($getlzc_list as $getlzc_listvalues)
{
	$getNOB = $this->db->select('*')->from('dist_head_wise_fund')->where('account_head','Guzara Allowance')->where('lzc_institution_madrasa',$getlzc_listvalues->id)->where('year',$year)->get();
$NOB = $getNOB->row('nob');

if ($year == '2019-20')
	{
	$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where("district_id",$getlzc_listvalues->district_id);
$this->db->where("LZC_name",$getlzc_listvalues->id);
//$this->db->where("MustahiqType",'Guzara Allowance');
$this->db->where("Status",1);
$this->db->where("year",$year);
$this->db->where('total_marks<=',"90");

$this->db->limit($NOB);

$this->db->order_by('total_marks, Priority',"DESC");

$users = $this->db->get()->result_array();
//echo $this->db->last_query();
//exit;
$allocated_nobs_query = $this->db->select('id')->from('guzara_allowance_mustahiqeen')->where("district_id",$getlzc_listvalues->district_id)->where("year",$year)->where("LZC_name",$getlzc_listvalues->id)->get();
 $total_records = $allocated_nobs_query->num_rows();
	} 
	else if ($year == '2020-21')
	{
		$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where("district_id",$getlzc_listvalues->district_id);
$this->db->where("LZC_name",$getlzc_listvalues->id);
//$this->db->where("MustahiqType",'Guzara Allowance');
$this->db->where("Status",1);
//$this->db->where("selected_lz11",1);
//$this->db->where("year",$year);
$this->db->where('total_marks<=',"90");

$this->db->limit($NOB);

$this->db->order_by('total_marks, Priority',"DESC");

$users = $this->db->get()->result_array();
//echo $this->db->last_query();
//exit;
$allocated_nobs_query = $this->db->select('id')->from('guzara_allowance_mustahiqeen')->where("district_id",$getlzc_listvalues->district_id)->where("Status",1)->where("LZC_name",$getlzc_listvalues->id)->get();
 $total_records = $allocated_nobs_query->num_rows();
	}
	else
	{
		$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("district_id",$getlzc_listvalues->district_id);
$this->db->where("LZC_id",$getlzc_listvalues->id);
$this->db->where("MustahiqType",'Guzara Allowance');
$this->db->where("Status",1);
$this->db->where("year",$year);
$this->db->where('total_marks<=',"90");

$this->db->limit($NOB);

$this->db->order_by('total_marks, Priority',"DESC");

$users = $this->db->get()->result_array();
//echo $this->db->last_query();
//exit;
$allocated_nobs_query = $this->db->select('id')->from('mustahiqeen')->where("district_id",$getlzc_listvalues->district_id)->where("MustahiqType","Guzara Allowance")->where("year",$year)->where("LZC_id",$getlzc_listvalues->id)->get();
 $total_records = $allocated_nobs_query->num_rows();
	}

	
?>

<tr>

<td colspan="12"><h3><center><?php echo $i;?> - District Name : <strong><?php echo $district_name;?></strong>, LZC Name : <strong><?php echo $getlzc_listvalues->lzc_name;?></strong>, Selected Beneficiary : <strong>
<?php  echo $NOB;?> out of <?php echo $total_records ?></strong>, Financial Year: <strong><?php echo $year;?></strong></center><hr /></td>
</tr>

<tr>
<th>#</th>
<th>Name</th>
<th>Father Name</th>
<th>CNIC</th>
<th>Contact</th>
<th>Gender</th>
<th>Age</th>
<th>Category</th>
<th>Address (Postal/Permanent)</th>
<th>Reg-Year</th>
<th>Payment-Year</th>
</tr>

<?php


$i1=1;
if(!empty($users))
{
foreach($users as $users_values)
{
?>
<tr>
<td><?php echo $i1;?></td>
<td><?php echo $users_values['mustahiq_name'];?></td>
<td><?php echo $users_values['father_name'];?></td>
<td><?php echo $users_values['mustahiq_cnic'];?></td>
<td><?php echo $users_values['contact_number'];?></td>
<td><?php echo $users_values['gender'];?></td>
<td><?php echo $users_values['age'];?></td>
<td><?php echo $users_values['category'];?></td>
<td><?php echo "Postal: " . $users_values['postal_address'];?><br /><?php echo "Permanent: " . $users_values['permanent_address'];?></td>
<td><?php echo $users_values['year'];?></td>
<td><?php echo $users_values['payment_year'];?></td>
</tr>


<?php 
$i1++;
}
}
$i++;
}
}
?>

</table>
</body>
</html>
