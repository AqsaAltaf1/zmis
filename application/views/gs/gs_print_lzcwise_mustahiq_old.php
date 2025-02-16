<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

// Count all entries in GA table
$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$get_all_mustahiq = $this->db->get()->num_rows();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('district/include/title');?>
</title>

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

</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">





<h3 align="center">
	  
Guzara Allowance LZC Wise(LZ-11) Mustahiqeen List of District <strong><?php echo $district_name; ?></strong> during Year: <strong> <?php echo $getfinancial_year; ?></strong>
</h3>



<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Registered NOBs</th>
<th>Targeted NOBs</th>
<th>Allocated NOBs</th>
<!--<th>Paid Mustahiqeen</th>
<th>Remaining Mustahiqeen</th>-->
<th>Status</th>

<!--<th>Action</th>-->

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_all_lzclist))
{
foreach($get_all_lzclist as $lzclist)
{
?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $lzclist['lzc_name']; ?></td>

<td>
<?php 
$lzcid = $lzclist['id']; 
$this->db->where('LZC_id',$lzcid);
$this->db->where('District_Name',$district_name);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('year',$getfinancial_year);
$this->db->where('installment',$get_inst);
echo $registeredNOBs = $this->db->get('mustahiqeen')->num_rows();
?>
</td>


<td>
<?php
$lzcid = $lzclist['id']; 
$targetNobQuery = $this->db->select('FormHandedOver, LZC_ID,District_Name')->from('zakatentryforms')->where('LZC_ID',$lzcid)->where('FinYear',$getfinancial_year)->where('InstallmentNo',$get_inst)->get();


 $targetNob1 = $targetNobQuery->row('FormHandedOver');

if(empty($targetNob1))
echo $targetNob = 0;
else 
echo $targetNob = $targetNobQuery->row('FormHandedOver');

?>
</td>

<td>
<?php 
$getfinancialdata = $this->db->select('nob, district_id')->from('dist_head_wise_fund')->where('lzc_institution_madrasa',$lzcid)->where('account_head','Guzara Allowance')->where('year',$getfinancial_year)->where('installment',$get_inst)->get();
 $allocatedNobs = $getfinancialdata->row('nob');


if(empty($allocatedNobs))
echo $allocatedNob = 0;
else 
echo $allocatedNob = $getfinancialdata->row('nob');

$districtid = $getfinancialdata->row('district_id');?>
</td>


<!--<td>
<?php
/*$this->db->select('*');
$this->db->where('financial_Year',$getfinancial_year);
$this->db->where('installment',$get_inst);
$this->db->where('lzc_id',$lzcid);
echo $resultpaid = $this->db->get('guzara_allowance_mustahiqeen_payments')->num_rows();*/
?>
</td>
<td>
<?php
//echo $allocatedNob - $resultpaid;
?>
</td>-->

<td>

<?php
$halfTargetNob = floor($targetNob/2);

if( ($registeredNOBs >=  $targetNob ) &&($allocatedNob <= $halfTargetNob) && ($targetNob !=0) && ($allocatedNob !=0))
{
?>
<button class="btn btn-success btn-sm"><strong>Registration Completed</strong></button>

 <?php
}
else
{
?>
<button class="btn btn-danger btn-sm"><b>Incomplete Registration</b></button>
<?php
}
?>
</td>

</tr>

<?php 
$i++;
}
}
?>


</tbody>
</table>

</body>
</html>
