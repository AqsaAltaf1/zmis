<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$select_RZF_query = $this->db->select('*')->from('head_wise_fund')->where('account_head','Regular Zakat Fund')->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();

$total_RZF = $select_RZF_query->row('amount_allocated');

$RZF_nf = number_format($select_RZF_query->row('amount_allocated'),2);

// Get Administrative Expenses from head wise fund
$select_AE_query = $this->db->select('*')->from('head_wise_fund')->where('account_head','Adminnistrative_Expenses')->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();

$total_AE = $select_AE_query->row('amount_allocated');

// get Zakat Paid Staff expenses from zakat_paid_staff_payment
$audit_staff_ao_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('financial_year',$getfinancial_year)->where('designation_id',2)->get();
$total_auditstaff_ao_amount = $audit_staff_ao_query->row('amount');

$audit_staff_aud_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('financial_year',$getfinancial_year)->where('designation_id',3)->get();
$total_auditstaff_aud_amount = $audit_staff_aud_query->row('amount');

$audit_staff_gs_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('financial_year',$getfinancial_year)->where('designation_id',1)->get();
$total_auditstaff_gs_amount = $audit_staff_gs_query->row('amount');


$get_total_admin_expense = $total_auditstaff_gs_amount + $total_auditstaff_ao_amount + $total_auditstaff_aud_amount;


// GA Percentage selection
$get_ga_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$ga_percent = $get_ga_percentage->row('ga_percentage');
// MA Percentage selection
$get_ma_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$ma_percent = $get_ma_percentage->row('ma_percentage');
// DM Percentage selection
$get_dm_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$dm_percent = $get_dm_percentage->row('dm_percentage');
// HC Percentage selection
$get_hc_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$hc_percent = $get_hc_percentage->row('hc_percentage');
// ESA Percentage selection
$get_esa_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$esa_percent = $get_esa_percentage->row('es_percentage');
// ESP Percentage selection
$get_esp_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)->where('status',1)->get();
$esp_percent = $get_esp_percentage->row('esp_percentage');



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
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


<?php $this->load->view('secretary/include/nav_1');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('secretary/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('secretary/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('secretary/include/sidebar_sec');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8 col-md-10">
<h4 class="m-0 text-dark">Provincial Zakat Administration (PZA) Fund Summary</h4>
</div><!-- /.col -->
<div class="col-sm-4 col-md-2 div_align">

<h6 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year;?></b> INST:<b style="color: black;"><?php echo $get_inst;?></b> </h6>
</div>
</div>
</div>
</div>
<!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content 

<!-- Main row -->
<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Account Head</th>
<th>Allocation</th>
<th>Disbursement</th>
<th>Balance</th>
</tr>
</thead>
<tbody>

<tr>
<td>1</td>
<td>Guzara Allowance</td>
<td>
	<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$ga_percent_amount = $ga_percent/100;
$ga_amount = $total_RZF * $ga_percent_amount;
echo number_format($ga_amount);

?>
</a>
</td>
<td> 

<?php
$ga_disb_query = $this->db->select_sum('GA')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$ga_disb_amount = $ga_disb_query->row('GA');
echo number_format($ga_disb_amount,2);
$ga_alloc_percent = ($ga_disb_amount*100)/$ga_amount;
?>
<strong>(<?php echo round($ga_alloc_percent)."%";?>)</strong>
</td>
<td>

<?php 
$ga_balance = $ga_amount - $ga_disb_amount;
echo number_format($ga_balance);
?>

</td>
</tr>

<tr>
<td>2</td>
<td>Marriage Assistance</td>
<td>
<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$ma_percent_amount = $ma_percent/100;
$ma_amount = $total_RZF * $ma_percent_amount;
echo number_format($ma_amount);

?>
</a>	
</td>
<td> 


<?php
$ma_disb_query = $this->db->select_sum('MA')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$ma_disb_amount = $ma_disb_query->row('MA');
echo number_format($ma_disb_amount,2);
$ma_alloc_percent = ($ma_disb_amount*100)/$ma_amount;
?>
<strong>(<?php echo round($ma_alloc_percent)."%";?>)</strong>
</td>
<td>

<?php 
$ma_balance = $ma_amount - $ma_disb_amount;
echo number_format($ma_balance);
?>


</td>
</tr>

<tr>
<td>3</td>
<td>Educational Stipend(A)</td>
<td>
	<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$esa_percent_amount = $esa_percent/100;
$esa_amount = $total_RZF * $esa_percent_amount;
echo number_format($esa_amount);
?>
</a>
</td>
<td>
<?php
$esa_disb_query = $this->db->select_sum('ESA')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$esa_disb_amount = $esa_disb_query->row('ESA');
echo number_format($esa_disb_amount,2);
$esa_alloc_percent = ($esa_disb_amount*100)/$esa_amount;
?>
<strong>(<?php echo round($esa_alloc_percent)."%";?>)</strong>

</td>
<td>

<?php
$esa_balance = $esa_amount - $esa_disb_amount;
echo number_format($esa_balance);
?>
</td>
</tr>

<tr>
<td>4</td>
<td>Educational Stipend(P)</td>
<td>
<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$esp_percent_amount = $esp_percent/100;
$esp_amount = $total_RZF * $esp_percent_amount;
echo number_format($esp_amount);
?>
</a>
</td>
<td> 

<?php
$esp_disb_query = $this->db->select_sum('ESP')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$esp_disb_amount = $esp_disb_query->row('ESP');
echo number_format($esp_disb_amount,2);
$esp_alloc_percent = ($esp_disb_amount*100)/$esa_amount;
?>
<strong>(<?php echo round($esp_alloc_percent)."%";?>)</strong>



</td>
<td>
<?php
$esp_balance = $esp_amount - $esp_disb_amount;
echo number_format($esp_balance);
?>


</td>
</tr>

<tr>
<td>5</td>
<td>Health Care (District)</td>
<td>
<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$hc_percent_amount = $hc_percent/100;
$hc_amount = $total_RZF * $hc_percent_amount;
echo number_format($hc_amount);
?>
</a>
</td>
<td>

<?php
$hc_disb_query = $this->db->select_sum('HC')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$hc_disb_amount = $hc_disb_query->row('HC');
echo number_format($hc_disb_amount,2);
?>

</td>
<td>
<?php
$hc_balance = $hc_amount - $hc_disb_amount;
echo number_format($hc_balance);
?>
</td>
</tr>
<tr>
<td>6</td>
<td>Deeni Madaris</td>
<td>
<a href="<?php base_url();?>Pza_district_fund_allocation/">
<?php 
$dm_percent_amount = $dm_percent/100;
$dm_amount = $total_RZF * $dm_percent_amount;
echo number_format($dm_amount);
?>
</a>
</td>
<td>

<?php
$dm_disb_query = $this->db->select_sum('DM')->from('district_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$dm_disb_amount = $dm_disb_query->row('DM');
echo number_format($dm_disb_amount,2);
?>


</td>
<td>
<?php
$dm_balance = $dm_amount - $dm_disb_amount;
echo number_format($dm_balance);
?>
</td>
</tr>
<tr style="font-weight: bold;">
<td></td>
<td >Sub-Total-A</td>
<td>
<?php 
$get_sub_total_a = $total_RZF;
echo number_format($total_RZF,2);?>
	
</td>
<td>
<?php
$get_sub_disbursement_a = $ga_disb_amount + $ma_disb_amount + $esa_disb_amount + $esp_disb_amount + $hc_disb_amount + $dm_disb_amount;
echo number_format($get_sub_disbursement_a,2);
?>
</td>
<td>

<?php
$get_sub_balance_a = $ga_balance + $ma_balance + $esa_balance + $esp_balance + $dm_balance + $hc_balance;
echo number_format($get_sub_balance_a);
?>
</td>
</tr>



<tr>
<th>S #</th>
<th>Special Head</th>
<th>Allocation</th>
<th>Disbursement</th>
<th>Balance</th>
</tr>
</thead>
<tr>
<td>7</td>
<td>Health Care (Provincial Level)</td>
<td>
<a href="<?php base_url();?>Pza_hospital_fund_allocation/">
<?php
$hc_allocated_query = $this->db->select('amount_allocated')->from('head_wise_fund')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)
->where('account_head','Health Care (Provincial Level)')->get();
$hc_allocated_amount = $hc_allocated_query->row('amount_allocated');
echo number_format($hc_allocated_amount,2);
?>
</a>
</td>
<td> 

<?php
$hc_disb_query = $this->db->select_sum('payment_amount')->from('hospital_payment')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$hc_disb_amount = $hc_disb_query->row('payment_amount');
echo number_format($hc_disb_amount,2);
?>

</td>
<td>

<?php
$total_health_carevalue_balance = $hc_allocated_amount - $hc_disb_amount;
echo number_format($total_health_carevalue_balance,2);
?>


</td>
</tr>

<tr>
<td>8</td>
<td>Special Health Care</td>
<td>
<a href="<?php base_url();?>Pza_hospital_fund_allocation/">
<?php
$shcp_allocated_query = $this->db->select('amount_allocated')->from('head_wise_fund')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)
->where('account_head','Special Health Care Program')->get();
$shcp_allocated_amount = $shcp_allocated_query->row('amount_allocated');
echo number_format($shcp_allocated_amount,2);
?>
</a>
</td>
<td> 

<?php
$shcp_disb_query = $this->db->select_sum('amount')->from('special_health_fund')
->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$shcp_disb_amount = $shcp_disb_query->row('amount');
echo number_format($shcp_disb_amount,2);
?>


</td>
<td>

<?php
$shcp_carevalue_balance = $shcp_allocated_amount - $shcp_disb_amount;
echo number_format($shcp_carevalue_balance,2);
?>

</td>
</tr>

<tr style="font-weight: bold;">
<td></td>
<td >Sub-Total-B</td>
<td>
<?php 
$get_sub_total_b = $hc_allocated_amount + $shcp_allocated_amount;
echo number_format($get_sub_total_b,1);
?>
</td>
<td>
<?php 
$get_sub_disbursement_b = $hc_disb_amount + $shcp_disb_amount;
echo number_format($get_sub_disbursement_b,1);
?>
</td>
<td>
<?php 
$get_sub_balance_b = $total_health_carevalue_balance + $shcp_carevalue_balance;
echo number_format($get_sub_balance_b,1); 
?>
</td>
</tr>

<thead>
<tr>
<th>S #</th>
<th>Adminstrative Expenses</th>
<th>Allocation</th>
<th>Disbursement</th>
<th>Balance</th>
</tr>
</thead>
<tr>
<td>9</td>
<td>CH-LZC Allowance</td>
<td>-</td>
<td>-</td>
<td>-</td>
</tr>

<tr>
<td>9</td>
<td>Salary (Audit Staff)</td>
<td rowspan="3" align="center"> 
<br>
<br>


<?php echo number_format($total_AE,2);?>

</td>
<td><?php echo number_format($total_auditstaff_ao_amount,2);?></td>
<td rowspan="3" align="center">
<br>
<br>


<?php

$get_total_AE_disbursement = $total_auditstaff_ao_amount + $total_auditstaff_gs_amount + $total_auditstaff_aud_amount;


echo $get_total_AE_balance =  $total_AE - $get_total_AE_disbursement;
?>
</td>
</tr>
<tr>
<td>10</td>
<td>Salary (Group Secretary)</td>

<td><?php echo number_format($total_auditstaff_gs_amount,2);?></td>

</tr>
<tr>
<td>11</td>
<td>Salary (Auditor)</td>

<td><?php echo number_format($total_auditstaff_aud_amount,2);?></td>

</tr>
<tr style="font-weight: bold;">
<td></td>
<td >Sub-Total-C</td>
<td>
<?php 
$get_sub_total_c = $total_AE;
echo number_format($get_sub_total_c,1); 
?>
	
</td>
<td> 
<?php
$get_sub_disbursement_c = $total_auditstaff_ao_amount + $total_auditstaff_gs_amount + $total_auditstaff_aud_amount;
echo number_format($get_sub_disbursement_c,1);

?>
</td>
<td>
<?php
$get_sub_balance_c = $get_total_AE_balance;
echo number_format($get_sub_balance_c,1);
?>
</td>
</tr>
<tr style="font-weight: bold; font-size: 20px;">
<td></td>
<td><u> Grand-Total A+B+C </u></td>
<td> <u>
<?php
$get_grand_total_ABC = $get_sub_total_a + $get_sub_total_b + $get_sub_total_c;
echo number_format($get_grand_total_ABC,1);
?>	
</u>
</td>
<td>
<u>
<?php
$get_grand_disbursement_ABC = $get_sub_disbursement_a + $get_sub_disbursement_b + $get_sub_disbursement_c;
echo number_format($get_grand_disbursement_ABC,1);
?>	
</u>
</td>
<td>
<u>
<?php
$get_grand_balance_ABC = $get_sub_balance_a + $get_sub_balance_b + $get_sub_balance_c;
echo number_format($get_grand_balance_ABC,1);
?>	
</u>
</td>
</tr>











</tbody>
</table>
<!-- /.row -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

<?php $this->load->view('pza/include/footer');?>


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


<!-- For data tables -->

</body>
</html>
