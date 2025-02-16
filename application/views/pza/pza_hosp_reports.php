<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');
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



<?php $this->load->view('pza/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('pza/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->

<!-- <?php $this->load->view('pza/include/user_manue');?> -->

<!-- Sidebar Menu -->

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
<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Expenditure Statement Of Provincial Health Institutes</h3>
</div><!-- /.col -->

<div class="col-sm-4 div_align">

<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> 2019-20</b> INSTALLMENT:<b style="color: black;"> 1</b> </h5>
<!--  <button type="button" class="btn btn-primary div_align" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Fund Deposit To PZF</button> --> 
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row"><!-- 
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total No. of Districts</span>
<span class="info-box-number text_align">
33 <br>
</span>
<small class="info-box-number"></small>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content">
<span class="info-box-number">Total Hospitals (Provin-Level)</span>
<span class="info-box-number text_align"> 
22 <br>
</span>
<small class="info-box-number"></small>
</div>
</div>
</div>

<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content">
<span class="info-box-number">Total Reg-Deeni Madaris</span>
<span class="info-box-number text_align">
1221 <br>
</span>
<small class="info-box-number"></small>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content">
<span class="info-box-number" >Total Reg-Foundations</span>
<span class="info-box-number text_align">
221<br>
</span>
<small class="info-box-number"></small>
</div>
</div>
</div>

--></div>
<div class="row navbar-white navbar-light mb-2">
<h3 class="m-0 text-dark col-md-6">Select Hospital to View Reports:</h3>
<select class="form-control col-md-3" id="district" name="district">
<option value="">---Select District----</option>
<?php
$i=1;
if(!empty($get_all_hospitals))
{
foreach($get_all_hospitals as $gethospital)
{
?>
<option value="<?php echo $gethospital['id']?>"><?php echo $gethospital['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
<div class="col-md-1"></div>
<input type="submit" name="submitbtn" class="btn btn-success col-md-2 pull-right" value="Show Report">
</div>
<!-- Main Body -->
<div class="row">

<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Over All Health Fund Summary (Provincial Level)</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pt_expense1" data-toggle="pill" href="#pt_expense" role="tab" aria-controls="pt_expense" aria-selected="false">Patient's Expenditure Details</a>
</li>
<!--  
<li class="nav-item">
<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Add Deeni Madaris</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Add Foundation</a>
</li> -->
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="total-summary-tab" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
<h4>Health Fund (Provincial Level) Receiving & Disbursement Financial Year <strong><?php echo $getfinancial_year;?></strong> Installment: <strong><?php echo $getfinancial_installment;?></strong> </h4>
<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Category</th>
<th>Disbursement</th>
<th>Balance</th>
<th>Total Mustahiq:</th>
<th>Indoor(M)</th>
<th>Indoor(F) </th>
<th>Outdoor(M)</th>
<th>Outdoor(F)</th>
</tr>

</thead>
<tbody>
<tr style="text-align: center;">
<td>1</td>
<td>3211</td>
<td>321</td>
<td>32</td>
<td>432</td>
<td>1321</td>
<td>12</td>
<td>23</td>
<td>321</td>


<!-- <td><?php echo $total_disburse_hosp;?></td>
<td><?php echo $total_disburse;?></td>
<td><?php echo $hospital_balance_nf;?></td>
<td><?php echo $get_ind_male;?></td>
<td><?php echo $get_ind_female;?></td>
<td><?php echo $get_out_male;?></td>
<td><?php echo $get_out_female; ?></td>
<td><?php echo $get_all; ?></td>
<td><?php echo $total_disburse_male_pt;?></td>
<td><?php echo $total_disburse_female_pt;?></td>
<td><?php echo $total_disburse_ind_pt;?></td>
<td><?php echo $total_disburse_out_pt;?></td> -->


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

<h2>District Wise Summary Shown Below</h2>
<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="summary_tab1" data-toggle="pill" href="#summary_tab" role="tab" aria-controls="summary_tab" aria-selected="true">Fund Summary</a>
</li>
<li class="nav-item">
<a class="nav-link" id="lzc_tab1" data-toggle="pill" href="#lzc_tab" role="tab" aria-controls="lzc_tab" aria-selected="false">Expenditure</a>
</li>
<li class="nav-item">

<a class="nav-link" id="ga_tab1" data-toggle="pill" href="#ga_tab" role="tab" aria-controls="ga_tab" aria-selected="false">Indoor Patients</a>
</li>
<li class="nav-item">
<a class="nav-link" id="ma_tab1" data-toggle="pill" href="#ma_tab" role="tab" aria-controls="ma_tab" aria-selected="false">Outdoor Patients</a>
</li>
<li class="nav-item">
<a class="nav-link" id="dm_tab1" data-toggle="pill" href="#dm_tab" role="tab" aria-controls="dm_tab" aria-selected="false">Male Patients</a>
</li>
<li class="nav-item">
<a class="nav-link" id="hc_tab1" data-toggle="pill" href="#hc_tab" role="tab" aria-controls="hc_tab" aria-selected="false">Female Patients	</a>
</li>
<li class="nav-item">
<a class="nav-link" id="esa_tab1" data-toggle="pill" href="#esa_tab" role="tab" aria-controls="esa_tab" aria-selected="false">All Patients</a>
</li>
<li class="nav-item">
<a class="nav-link" id="esp_tab1" data-toggle="pill" href="#esp_tab" role="tab" aria-controls="esp_tab" aria-selected="false">Special Pt</a>
</li>
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="summary_tab" role="tabpanel" aria-labelledby="summary_tab1">
<div class="row">    
<h4 class="col-md-11">Fund Receiving & Disbursement During Financial Year: <strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Fund Received</th>
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>HC</th>
<th>ESA</th>
<th>ESP</th>
<th>Admin-Expen</th>
<th>Total Expen</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>799909</td>
<td>89800</td>
</tbody>
</table>
</div>
</div>

<div class="tab-pane fade" id="lzc_tab" role="tabpanel" aria-labelledby="lzc_tab1">
<div class="row">    
<h4 class="col-md-11">LZC Wise GA/CH Allow Cheque List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Cheque #</th>
<th>Date</th>
<th>Guzara Allowance</th>
<th>LZC Ch.Allowance</th>
<th>Total Amount</th>
<th>No. of Beneficiaries</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
</tbody>
</table>
</div>
</div>


<div class="tab-pane fade" id="ga_tab" role="tabpanel" aria-labelledby="ga_tab1">
<div class="row">    
<h4 class="col-md-11">Guzara Allowance List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Status</th>
<th>Amount</th>
<th>Bank Name</th>
<th>A/C#</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
</tbody>
</table>
</div>
</div>



<div class="tab-pane fade" id="ma_tab" role="tabpanel" aria-labelledby="ma_tab1">
<div class="row">    
<h4 class="col-md-11">Marriage Assistance List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Status</th>
<th>Amount</th>
<th>Bank Name</th>
<th>A/C#</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
</tbody>
</table>
</div>
</div>


<div class="tab-pane fade" id="dm_tab" role="tabpanel" aria-labelledby="dm_tab1">
<div class="row">    
<h4 class="col-md-11">Deeni Madaris Mustahiqeen List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Madrassa Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Status</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>9090</td>
</tbody>
</table>
</div>
</div>


<div class="tab-pane fade" id="hc_tab" role="tabpanel" aria-labelledby="hc_tab1">
<div class="row">    
<h4 class="col-md-11">District Health Care Mustahiqeen List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Disease</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
</tbody>
</table>
</div>
</div>

<div class="tab-pane fade" id="esa_tab" role="tabpanel" aria-labelledby="eas_tab1">
<div class="row">    
<h4 class="col-md-11">Edu-Stipend (A) Mustahiqeen List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>College/University Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Status</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>9090</td>
</tbody>
</table>
</div>
</div>

<div class="tab-pane fade" id="esp_tab" role="tabpanel" aria-labelledby="esp_tab1">
<div class="row">    
<h4 class="col-md-11">Edu-Stipend (P) Mustahiqeen List in respect of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button>
</div> 
<div class="card-body">   
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>College/University Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Cell #</th>
<th>Status</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>12443</td>
<td>9090</td>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- /.card -->
</div>
</div>



</div>
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
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


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
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>
</body>
</html>
