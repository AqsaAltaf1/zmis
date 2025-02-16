<?php
error_reporting(0);

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $district_id;
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$ga_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Guzara Allowance')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_ga_amount = $ga_query->row('amount_allocated');

$ma_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Marriage Assistance')->where('installment',$get_inst)
->where('year',$getfinancial_year)->get();
$total_ma_amount = $ma_query->row('amount_allocated');

$dm_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Deeni Madaris')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_dm_amount = $dm_query->row('amount_allocated');

$hc_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Health Care')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_hc_amount = $hc_query->row('amount_allocated');

$esa_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (A)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esa_amount = $esa_query->row('amount_allocated');

$esp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (P)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esp_amount = $esp_query->row('amount_allocated');


$admin_expns_query = $this->db->select_sum('admin_expns')->from('district_payment')
->where('district_id',$userid)->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_amount = $admin_expns_query->row('admin_expns');


$admin_expns_disb_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')
->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_disb_amount = $admin_expns_disb_query->row('amount');

$audit_staff_gs_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')
->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('designation_id',1)->get();
$total_auditstaff_gs_amount = $audit_staff_gs_query->row('amount');

$audit_staff_ao_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')
->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('designation_id',2)->get();
$total_auditstaff_ao_amount = $audit_staff_ao_query->row('amount');


$audit_staff_aud_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')
->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('designation_id',3)->get();
$total_auditstaff_aud_amount = $audit_staff_aud_query->row('amount');


$get_total_admin_expense = $total_auditstaff_gs_amount + $total_auditstaff_ao_amount + $total_auditstaff_aud_amount;



$total_amount_sum = $total_ga_amount + $total_ma_amount + $total_dm_amount + $total_hc_amount + $total_esa_amount + $total_esp_amount;

/*echo $this->db->last_query();

exit;*/


// NCF Budget
$get_ncf_dist_fund = $this->db->select('*')->from('natural_calamity_fund')
->where('district_id',$userid)
->where('financial_year',$getfinancial_year)
->get();
$get_ncf_dist_allocation = $get_ncf_dist_fund->row('amount_allocated');

// NCF disbursement

$get_ncf_disb = $this->db->select_sum('amount_allocated')->from('natural_calamity_fund')
->where('financial_year',$getfinancial_year)->get();
$get_ncf_disbursement = $get_ncf_disb->row('amount_allocated');
 
$get_ncf_balanc = $get_ncf_amount_allocated - $get_ncf_disbursement;
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('pza/include/title');?>
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
<div class="wrapper">


<?php $this->load->view('pza/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('pza/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('pza/include/user_manue');?> -->




<?php $this->load->view('pza/include/sidebar');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">


<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<div class="alert alert-success alert-dismissible" id="success">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong> <?php echo $success;?>
</div>
<?php
}
else if(isset($error))
{
?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>


<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Summary of districts disbursement Guzara Allowance, Marriage Assistance and Health Care</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
</div>
<div class="card-body">
	<div class="card-header">
<input type="button" class="btn btn-success " onclick="printDiv('printableArea')" value="Print Report"/>
</div>
<div class="card-body" id="printableArea">
<h3 align="center"><strong>Guzara Allowance,Marriage Assistance and Health Care Utilization Report of All district for the Financial Year <?php echo $getfinancial_year;?></strong></h3>

<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>GA</th>
<th>Disbursement</th>
<th>Balance</th>
<th>MA</th>
<th>Disbursement</th>
<th>Balance</th>
<th>HC</th>
<th>Disbursment</th>
<th>Balance</th>

</tr>
</thead>
<tbody>


<?php
$i=1;
$total_GA_value = 0;
$total_GA_disbursement1 = 0;
$total_MA_value = 0;
$total_MA_disbursement1 = 0;
$total_hc_value = 0;
$total_hc_disbursement1 = 0;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistrict['district_name']; ?></td>
<td>

<?php
$getDisbursement = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)
->where('district_id',$getdistrict['id'])->get();
$get_GA = $getDisbursement->row('GA');
$total_GA_value +=$get_GA ;
echo number_format($get_GA,0);
?>

</td>
<td>

<?php
$ga_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Guzara Allowance')->where('year',$getfinancial_year)->where('district_id',$getdistrict['id'])->where('installment',$get_inst)->get();
 $total_ga_disbursement = $ga_disbursement_query->row('amount_allocated');
 $total_GA_disbursement1 += $total_ga_disbursement;
echo $total_ga_disbursement_nf = number_format($ga_disbursement_query->row('amount_allocated'),0);

?>


</td>
<td>

<?php
$ga_balance = $get_GA - $total_ga_disbursement;
echo number_format($ga_balance,0);
?>

</td>

<td>
<?php 
$get_MA = $getDisbursement->row('MA');
$total_MA_value +=$get_MA ;
echo number_format($get_MA,0);
?>
</td>
<td>
<?php 
$ma_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Marriage Assistance')->where('year',$getfinancial_year)->where('district_id',$getdistrict['id'])->where('installment',$get_inst)->get();
 $total_ma_disbursement = $ma_disbursement_query->row('amount_allocated');
 $total_MA_disbursement1 += $total_ma_disbursement;
echo $total_ma_disbursement_nf = number_format($ma_disbursement_query->row('amount_allocated'),0);
?>
</td>
<td>
<?php 

$ma_balance = $get_MA - $total_ma_disbursement;
echo number_format($ma_balance,0);
?>
</td>

<td>
<?php


$get_hc = $getDisbursement->row('HC');
$total_hc_value += $get_hc;
echo number_format($get_hc,0);
?>

</td>
<td>

<?php

$hc_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Health Care (District Level)')->where('year',$getfinancial_year)->where('district_id',$getdistrict['id'])->where('installment',$get_inst)->get();
$total_hc_disbursement = $hc_disbursement_query->row('amount_allocated');
$total_hc_disbursement1 += $total_hc_disbursement;
echo $total_hc_disbursement_nf = number_format($hc_disbursement_query->row('amount_allocated'),0);


?>




</td>

</th>
<td>


<?php
$hc_balance = $get_hc - $total_hc_disbursement;
echo number_format($hc_balance,0);
?>


</td>


</tr>



<?php 
$i++;
}
}
?>

<tr>
<th>#</th>
<th>Grant Total</th>
<th><strong><?php echo number_format($total_GA_value,0); ?></strong></th>
<th><strong><?php echo number_format($total_GA_disbursement1,0); ?></strong></th>
<th><strong><?php echo number_format($total_GA_value - $total_GA_disbursement1,0)?></strong></th>
<th><?php echo number_format($total_MA_value,0); ?></th>
<th><?php echo number_format($total_MA_disbursement1,0); ?></th>
<th><?php echo number_format($total_MA_value - $total_MA_disbursement1,0)?></th>

<th><strong><?php echo number_format($total_hc_value,0); ?></strong></th>

<th><strong><?php echo number_format($total_hc_disbursement1,0); ?></strong></th>
<th><strong><?php echo number_format($total_hc_value - $total_hc_disbursement1,0);?></strong></th>
</tr>




</tbody>

</table>

</div>
</div>
</div>
</div>
</div>
</div>



<!--second table -->


<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Summary of districts disbursement Deeni Madaris, Edicational Stipend (A&P)</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
</div>
<div class="card-body">
	<div class="card-header">
<input type="button" class="btn btn-success " onclick="printDiv('printableArea1')" value="Print Report"/>
</div>
<div class="card-body" id="printableArea1">
<h3 align="center"><strong>Deeni Madaris, Edicational Stipend (A&P) Utilization Report of All district for the Financial Year <?php echo $getfinancial_year;?></strong></h3>

<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>DM</th>
<th>Disbursement</th>
<th>Balance</th>
<th>ESA</th>
<th>Disbursement</th>
<th>Balance</th>
<th>ESP</th>
<th>Disbursment</th>
<th>Balance</th>

</tr>
</thead>
<tbody>


<?php
$i=1;
$total_DM_value = 0;
$total_DM_disbursement1 = 0;
$total_ESA_value = 0;
$total_ESA_disbursement1 = 0;
$total_ESP_value = 0;
$total_ESP_disbursement1 = 0;
if(!empty($get_all_districts1))
{
foreach($get_all_districts1 as $getdistrict1)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistrict1['district_name']; ?></td>
<td>

<?php
$getDisbursement = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)
->where('district_id',$getdistrict1['id'])->get();
$get_DM = $getDisbursement->row('DM');
$total_DM_value +=$get_DM ;
echo number_format($get_DM,0);
?>

</td>
<td>

<?php
$dm_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Deeni Madaris')->where('year',$getfinancial_year)->where('district_id',$getdistrict1['id'])->where('installment',$get_inst)->get();
 $total_dm_disbursement = $dm_disbursement_query->row('amount_allocated');
 $total_DM_disbursement1 += $total_dm_disbursement;
echo $total_dm_disbursement_nf = number_format($dm_disbursement_query->row('amount_allocated'),0);

?>


</td>
<td>

<?php
$dm_balance = $get_DM - $total_dm_disbursement;
echo number_format($dm_balance,0);
?>

</td>

<td>
<?php 
$get_ESA = $getDisbursement->row('ESA');
$total_ESA_value +=$get_ESA ;
echo number_format($get_ESA,0);
?>
</td>
<td>
<?php 
$esa_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Educational Stipend (A)')->where('year',$getfinancial_year)->where('district_id',$getdistrict1['id'])->where('installment',$get_inst)->get();
 $total_esa_disbursement = $esa_disbursement_query->row('amount_allocated');
 $total_ESA_disbursement1 += $total_esa_disbursement;
echo $total_esa_disbursement_nf = number_format($esa_disbursement_query->row('amount_allocated'),0);
?>
</td>
<td>
<?php 

$esa_balance = $get_ESA - $total_esa_disbursement;
echo number_format($esa_balance,0);
?>
</td>

<td>
<?php


$get_ESP = $getDisbursement->row('ESP');
$total_ESP_value += $get_ESP;
echo number_format($get_ESP,0);
?>

</td>
<td>

<?php

$esp_disbursement_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')->where('account_head','Educational Stipend (P)')->where('year',$getfinancial_year)->where('district_id',$getdistrict1['id'])->where('installment',$get_inst)->get();
$total_esp_disbursement = $esp_disbursement_query->row('amount_allocated');
$total_ESP_disbursement1 += $total_esp_disbursement;
echo $total_esp_disbursement_nf = number_format($esp_disbursement_query->row('amount_allocated'),0);


?>




</td>

</th>
<td>


<?php
$esp_balance = $get_ESP - $total_esp_disbursement;
echo number_format($esp_balance,0);
?>


</td>


</tr>



<?php 
$i++;
}
}
?>

<tr>
<th>#</th>
<th>Grant Total</th>
<th><strong><?php echo number_format($total_DM_value,0); ?></strong></th>
<th><strong><?php echo number_format($total_DM_disbursement1,0); ?></strong></th>
<th><strong><?php echo number_format($total_DM_value - $total_DM_disbursement1,0)?></strong></th>
<th><?php echo number_format($total_ESA_value,0); ?></th>
<th><?php echo number_format($total_ESA_disbursement1,0); ?></th>
<th><?php echo number_format($total_ESA_value - $total_ESA_disbursement1,0)?></th>

<th><strong><?php echo number_format($total_ESP_value,0); ?></strong></th>

<th><strong><?php echo number_format($total_ESP_disbursement1,0); ?></strong></th>
<th><strong><?php echo number_format($total_ESP_value - $total_ESP_disbursement1,0);?></strong></th>
</tr>




</tbody>

</table>

</div>
</div>
</div>
</div>
</div>
</div>



</div>
</div>











<!--second table -->
<section class="content" id="fullcontents" style="display:none;">

<div class="container-fluid">

<div class="row mb-2">
<div class="col-sm-9">
<h3 class="m-0 text-dark">District <strong><?php echo $district_name;?></strong> Report - Year : <strong><?php echo $getfinancial_year;?></strong> Installment : <strong><?php echo $get_inst;?></strong></h3>
</div>
</div>







</div>
</section>











</div>




<!-- Main Footer -->


<footer class="main-footer">
<?php $this->load->view('district/include/footer');?>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Script for hide and show option list in PZF entry form  -->
<script>
function toggleShared() {

payment_rec_from = document.getElementById('payment_rec_from').value;
district_list = document.getElementById('district_list');
accounthead = document.getElementById('accounthead');
hospital_list = document.getElementById('hospital_list');

if(payment_rec_from == 'District') {
district_list.style.display = 'block';
accounthead.style.display = 'block';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none';
}
else if(payment_rec_from =='Hospital')
{
hospital_list.style.display = 'block';
health_account_head.style.display = 'block';
district_list.style.display = 'none';
accounthead.style.display = 'none';
}
else
{
district_list.style.display = 'none';
accounthead.style.display = 'none';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none'; 
}

} 

</script>

<!-- For data tables -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});
$('#example2').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>


<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>

<script>
function printDiv(divName) 
{
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>


<?php
if(isset($userid))
{
?>
<script type="text/javascript">

$(document).ready(function(){

$('#fullcontents').fadeIn();

});


</script>
<?php
}
?>










</body>
</html>
