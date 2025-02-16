<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('hospital_id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('hospital/include/title');?>
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


@media print {
 .showicon{
  display:none;
 } 
}

</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


<?php $this->load->view('hospital/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('hospital/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('hospital/include/user_manue');?> -->




<?php $this->load->view('hospital/include/sidebar');?>

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
<div class="alert alert-success alert-dismissible">
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





<div class="row mb-2">
<div class="col-sm-6 col-md-10">
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Regular Zakat Fund Reporting</h3>

</div>

<div class="col-sm-6 col-md-2">
F/Year: <strong><?php echo $getfinancial_year;?></strong> & Inst: <strong><?php echo $get_inst; ?></strong>

</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row"></div>


<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Regular Fund</span>
<span class="info-box-number" style="color: blue;">
<?php
$Regular_total_fund_query = $this->db->select('*')->from('hospital_payment')
->where('hospital_id',$userid)->where('financial_year',$getfinancial_year)
->where('installment',$get_inst)->get();
$total_hosp_fund = $Regular_total_fund_query->row('payment_amount');
echo number_format($total_hosp_fund,2); 
?>
  <br>
</span>
<small class="info-box-number">100%</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 

<?php


$hospital_disbursement_query = $this->db->select_sum('total_expense')->from('patients')->where('hospital_id',$userid)->where('patient_type','Regular Fund Patient')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$hosp_disbursement = $hospital_disbursement_query->row('total_expense');
echo number_format($hosp_disbursement,2);

?> 
<br>
 </span>
<small class="info-box-number">
<?php echo "%";
?>
</small>
</div>
</div>
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Fund Balance</span>
<span class="info-box-number" style="color: red;">

<?php
$net_hosp_balance =  $total_hosp_fund - $hosp_disbursement;
echo number_format($net_hosp_balance,2);
?>
<br>
 </span>
<small class="info-box-number">
<?php 
echo "%";
?>
</small>
</div>
</div>
</div></div>

<!-- Search form -->
<div class="row">


<!-- Search form 2 -->
<div class=" col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Select Start and End Date to Generate Fund Disbursement Report</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">



<!-- Form 2 -->
<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>Hosp_regular_fund_report/generate_regular_report" method="post">



<div class="form-group">
<label for="date">Start Date</label>
&nbsp;&nbsp;
<input type="date" name="start_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;">&nbsp;&nbsp;
</div>
<div class="form-group">
<label for="date">End Date</label>
&nbsp;&nbsp;
<input type="date" name="end_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;"></div>
&nbsp;&nbsp;
<input type="submit" class="btn btn-success" name="search2" value="Search">
</div>

</form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>

</div>

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Expenditure of Regular Patient's Served by  <strong><?php echo $hospital_name ?></strong>  During  Start Date:<strong>_____</strong> End Date: <strong>_____</strong> </h3>

 <!-- Print list -->
<a target="_blank" onclick="printDiv('printableArea')" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div id="printableArea">
<div class="card-body">

<!-- Search form 1-->
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Pt.Name</th>
<th>CNIC</th>
<th>District</th>
<th>LZC</th>
<th>Gender</th>
<th>Cell#</th>
<th>Disease</th>
<th>Medication</th>
<th>Test</th>
<th>Surgery</th>
<th>G/Total</th>
<th>Action</th>
</tr>
</thead>
<tbody>


<?php
$i = 1;
$final_medication_amount = 0;
$final_test_amount = 0;
$final_surgery_amount = 0;
foreach ($get_regular_report as $regular_report) 
{
$regular_report->pt_name;


?>


<tr>
<td><?php echo $i; ?></td>
<td><?php echo $regular_report->pt_name; ?></td>
<td><?php echo $regular_report->pt_cnic; ?></td>


<td>
<?php 
$get_district_id =  $regular_report->district; 
$dist_id_query = $this->db->select('*')->from('district_users')->where('id',$get_district_id)->get();
echo $district_name = $dist_id_query->row('district_name');


?>

</td>
<td>

<?php 
$lzc_id =  $regular_report->lzc; 
$lzc_id_query = $this->db->select('*')->from('lzc_list')->where('id',$get_district_id)->get();
echo $lzc_name = $lzc_id_query->row('lzc_name');

?></td>


<td><?php echo $regular_report->gender; ?></td>
<td><?php echo $regular_report->cell_no; ?></td>
<td><?php echo $regular_report->disease; ?></td>
<td>
<?php 
$get_medication = $this->db->select_sum('total_price')->from('pt_treatment')->where('pt_id',$regular_report->id)->where('treatment_type',1)->get();
echo $get_medicine_amount = $get_medication->row('total_price');
//echo $this->db->last_query();
$final_medication_amount += $get_medicine_amount;
?>
</td>
<td>
<?php 
$get_test = $this->db->select_sum('total_price')->from('pt_treatment')->where('pt_id',$regular_report->id)->where('treatment_type',2)->get();
echo $get_test_amount = $get_test->row('total_price');
$final_test_amount += $get_test_amount;
?></td>
<td>
<?php 
$get_surgery = $this->db->select_sum('total_price')->from('pt_treatment')->where('pt_id',$regular_report->id)->where('treatment_type',3)->get();
echo $get_surgery_amount = $get_surgery->row('total_price');
$final_surgery_amount += $get_surgery_amount;
?></td>
<td>
<?php
echo $total_amount = $get_medicine_amount + $get_test_amount + $get_surgery_amount;
?></td>
<td><a type="button" class="glyphicon glyphicon-check btn btn-success showicon" href="<?php echo base_url();?>Hosp_regular_patient_list/regular_patient_list_func/<?php echo $regular_report->id;?>"> <i class="fas fa-eye"></i> </a></td>
</tr>

<?php
$i++;
}
?>
<tr>

<td></td>
<td colspan="7" ><strong>Total</strong></td>
<td> <strong><?php echo $final_medication_amount;?></strong> </td>
<td> <strong><?php echo $final_test_amount;?></strong> </td>
<td> <strong><?php echo $final_surgery_amount;?></strong> </td>
<td> <strong><?php echo $final_medication_amount + $final_test_amount + $final_surgery_amount; ?></strong> </td>
</tr>
</tbody>
</table>

	
</div>
</div>
</div>

</div>
<!-- /.row -->

<div class="row"></div>



<!-- Main row -->

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
Copyright © 2020 

<footer class="main-footer">
<strong>Copyright &copy; 2020 <a href="#">Government of Khyber Pakhtunkhwa</a>.</strong>
All rights reserved
<div class="float-right d-none d-sm-inline-block">
<b>Developed By:</b> Muhammad Shahzad
</div>
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



<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
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
</body>
</html>
