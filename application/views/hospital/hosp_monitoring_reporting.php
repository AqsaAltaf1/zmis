<?php
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
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Regular Patient's List</h3>

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
<div class="row"><div class="col-12 col-sm-6 col-md-4">
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
<div class="card card-primary 1collapsed-card">
<div class="card-header">
<h3 class="card-title">District / Hospital / Date Wise Search Form</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<!--<i class="fas fa-plus"></i>-->
</button>
</div>
<!-- /.card-tools -->
</div>


<!-- /.card-header -->
<div class="card-body">

<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>Hosp_monitoring_reporting/manage_hosp_monitoring_reporting" method="post">


<div class="row">


<div class="col-md-3">
<div class="form-group">  
<label for="date">Enter CNIC#</label><br>
<input type="text" class="form-control" style="width:100%;" name="pt_cnic">
</div>
</div>


<div class="col-md-3">
<div class="form-group">  
<label for="date">Mobile#</label><br>
<input type="text" class="form-control" style="width:100%;" name="pt_mobile">
</div>
</div>


<div class="col-md-2">
<div class="form-group">  
<label for="date">Enter Istehqaq#</label><br>
<input type="text" class="form-control" style="width:100%;" name="pt_istehqaq">
</div>
</div>


<div class="col-md-2">
<div class="form-group">  
<label for="date">OPD#</label><br>
<input type="text" class="form-control" style="width:100%;" name="pt_obdnumber">
</div>
</div>




<div class="col-md-2">
<div class="form-group">  
<label for="date">Gender</label> 
<select class="form-control" id="pt_gender" name="pt_gender" style="width:100%;">
<option value="0">- Select -</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>







</div>





<div class="row" style="margin-top:20px;">

<div class="col-md-2">
<div class="form-group">  
<label for="date">Select District</label> 
<select class="form-control" id="dist_id" name="dist_id" style="width:100%;">
<option value="0">--- All ----</option>
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
</select>
</div>
</div>


<div class="col-md-1">
<div class="form-group">  
<label for="date">Category</label> 
<select class="form-control" id="pt_catagory" name="pt_catagory" style="width:100%;">
<option value="0">- All -</option>
<option value="Indoor">Indoor</option>
<option value="Outdoor">Outdoor</option>
</select>
</div>
</div>



<div class="col-md-2">
<div class="form-group">  
<label for="date">Select Type</label> 
<select class="form-control" id="pt_type" name="pt_type" style="width:100%;">
<option value="0">--- All ----</option>
<option value="Regular Fund Patient">Regular Fund Patient</option>
<option value="Special Health Fund Patient">Special Health Fund Patient</option>
</select>
</div>
</div>


<div class="col-md-2">
<div class="form-group">  
<label for="date">Mustahiq Type</label> 
<select class="form-control" id="mustahiq_type" name="mustahiq_type" style="width:100%;">
<option value="0">---All---</option>
<option value="Poor">Poor</option>
<option value="Widow">Widow</option>
<option value="Disable">Disable</option>
<option value="Orphan">Orphan</option>
</select>
</div>
</div>



<div class="col-md-2">
<div class="form-group">  
<label for="date">Start Date</label> 
<input type="date" name="start_date" class="form-control" value="" style="width:100%;">&nbsp;&nbsp;
</div>
</div>


<div class="col-md-2">
<div class="form-group">  
<label for="date">End Date</label> 
<input type="date" name="end_date" class="form-control" value="" style="width:100%;">&nbsp;&nbsp;
</div>
</div>


<div class="col-md-1">
<div class="form-group"> 
<label for="date">&nbsp;</label>  
<input type="submit" style="margin-top:22px; height:40px; font-size:14px; text-align:center; width:90%;" class="btn btn-md btn-success" name="" value="Submit">
</div>
</div>


</div>

</form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
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
