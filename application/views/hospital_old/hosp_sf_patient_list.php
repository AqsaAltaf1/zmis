<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
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
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Special Fund Patient's List</h3>

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
<!-- 2nd Row -->

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Special Fund</span>
<span class="info-box-number" style="color: blue;">
<?php

$dist_total_fund_query = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_fund_received = $dist_total_fund_query->row('total_fund');
echo number_format($total_fund_received,2); 
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
<span class="info-box-number">Special Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 

<?php

echo $total_disbursement = 1000;
// $runpzf_query_amount = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
// $total_pzareceived_amount = $runpzf_query_amount->row('pza_amount');
// echo number_format($runpzf_query_amount->row('pza_amount'),2);
?> 
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_fund_received;
$y = $total_disbursement * 100;
$z = $y/$x;
echo round($z)."%";
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
<span class="info-box-number">Special Fund Balance</span>
<span class="info-box-number" style="color: red;">
<?php
$net_balance =  $total_fund_received - $total_disbursement;
echo $net_balance_nf= number_format($net_balance,2);
?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_fund_received;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>
<!-- /.col -->

</div>
<!-- /.row -->

<!-- Search form -->
<div class="row">


<!-- Search form 2 -->
<div class=" col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">District / Hospital / Date Wise Search Form</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">


<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>pza_dashboard/dashboardsearchdates" method="post">

<div class="row">

<div class="col-md-3">
<div class="form-group">   
<select class="form-control" id="dist_acc_head" name="dist_hosp" style="width:100%;">
<option value="">--- Select Hospital ----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>
<option value="<?php echo $getdistrict['id']?>"><?php echo $getdistrict['district_name']; ?></option>
<?php 
$i++;
}
}
?>
<?php
$i1=1;
if(!empty($get_all_hospitals))
{
foreach($get_all_hospitals as $gethospitals)
{
?>
<option value="<?php echo $gethospitals['id']?>"><?php echo $gethospitals['name']; ?></option>
<?php 
$i1++;
}
}
?>
</select>
</div>
</div>


<input type="submit" class="btn btn-success" name="search1" value="Search">


</form>

<!-- Form 2 -->
<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>pza_dashboard/dashboardsearchdates" method="post">



<div class="col-md-3">
<div class="form-group">   
<select class="form-control" id="dist_acc_head" name="dist_hosp" style="width:100%;">
<option value="">--- Select Hospital ----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>
<option value="<?php echo $getdistrict['id']?>"><?php echo $getdistrict['district_name']; ?></option>
<?php 
$i++;
}
}
?>
<?php
$i1=1;
if(!empty($get_all_hospitals))
{
foreach($get_all_hospitals as $gethospitals)
{
?>
<option value="<?php echo $gethospitals['id']?>"><?php echo $gethospitals['name']; ?></option>
<?php 
$i1++;
}
}
?>
</select>
</div>
</div>


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
<h3 class="card-title">List of Spefial Fund Patients Served by  <strong><?php echo $hospital_name ?></strong>  during  Financial Year:<strong><?php echo $getfinancial_year;?></strong> </h3>

 <!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">

<!-- Search form 1-->
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>District</th>
<th>LZC</th>
<th>Gender</th>
<th>Visits</th>
<th>Cell#</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Muhammad Shahzad</td>
<td>Muhamamd Asghar</td>
<td>13302-4773929-9</td>
<td>Haripur</td>
<td>Bareela</td>
<td>Male</td>
<td>3</td>
<td>0331-5426692</td>
<td><a type="button" class="glyphicon glyphicon-check btn btn-success" href="<?php echo base_url();?>Hosp_special_patient_profile"> <i class="fas fa-eye"></i> </a></td>
</tr>
</tbody>
</table>

  
</div>
<!-- /.card-body -->
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
