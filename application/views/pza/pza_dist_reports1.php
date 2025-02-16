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


<?php $this->load->view('pza/include/user_manue');?>

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
<h3 class="m-0 text-dark">Zakat Disbursement Reports all Districts</h3>
</div><!-- /.col -->

<div class="col-sm-4 div_align">

<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>
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
<form target="_blank" method="post" action="<?php echo base_url(); ?>Pza_dist_reports/manage_pza_dist_reports/" enctype="multipart/form-data">
<div class="row navbar-white mb-2" style="padding:5px 10px;">
<h5 class="text-dark col-md-5" style=" margin-top:5px;">Select District to View Disbursement Report:</h5>
<select required class="form-control col-md-2" id="district_id" name="district_id" style="margin-right:3px;">
<option value="">---Select District----</option>
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


<select required class="form-control col-md-3" id="report_type" name="report_type" style="margin-right:3px;">
<option value="">---Select Report Type----</option>
<option value="Fund Summary">Fund Summary</option>
<option value="LZC Wise List">LZC Wise List</option>
<option value="Guzara Allowance">Guzara Allowance</option>
<option value="Marriage Assist">Marriage Assist</option>
<option value="Deeni Madaris">Deeni Madaris</option>
<option value="Health Care">Health Care</option>
<option value="Edu-Stipend(A)">Edu-Stipend(A)</option>
<option value="Edu-Stipend(P)">Edu-Stipend(P)</option>
</select>

<input type="submit" name="submitbtn" class="btn btn-success pull-right" value="Show Report">
</div>

<input type="hidden" name="financial_year" value="<?php echo $getfinancial_year;?>">
<input type="hidden" name="inst_value" value="<?php echo $getfinancial_installment;?>">


</form>




<div class="row">

<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
  <div class="card-header p-0 pt-1">
    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Over All District Zakat Fund Summary</a>
      </li>
     <!--  <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Add Hospital</a>
      </li>
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
<h4>District Zakat Fund Receiving & Disbursement Financial Year <strong><?php echo $getfinancial_year;?></strong> </h4>
<div class="card-body">

<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Total Districts Allocation</th>
<th>District Disburement</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>

<td>

<?php
$district_total_fund = $this->db->select_sum('total_fund')->from('district_payment')->where('financial_year',$getfinancial_year)->get();
$total_gettoalfund = $district_total_fund->row('total_fund');
echo number_format($district_total_fund->row('total_fund'),2); 
?>

</td>

<td> 


<?php
$ga_payments_query = $this->db->select_sum('payment_amount')->from('guzara_allowance_mustahiqeen_payments')->where('financial_Year',$getfinancial_year)->get();
$ga_payments_amount = $ga_payments_query->row('payment_amount');

$ma_payments_query = $this->db->select_sum('payment_amount')->from('ma_paid_mustahiqeen')->where('financial_Year',$getfinancial_year)->get();
$ma_payments_amount = $ma_payments_query->row('payment_amount');

$dm_payments_query = $this->db->select_sum('amount')->from('dm_mustahiqeen')->where('year',$getfinancial_year)->get();
$dm_payments_amount = $dm_payments_query->row('amount');

$hc_payments_query = $this->db->select_sum('amount')->from('hc_mustahiqeen')->where('year',$getfinancial_year)->get();
$hc_payments_amount = $hc_payments_query->row('amount');

$esa_payments_query = $this->db->select_sum('amount')->from('esa_mustahiqeen')->where('year',$getfinancial_year)->get();
$esa_payments_amount = $esa_payments_query->row('amount');

$esp_payments_query = $this->db->select_sum('amount')->from('esp_mustahiqeen')->where('year',$getfinancial_year)->get();
$esp_payments_amount = $esp_payments_query->row('amount');

$zakat_paidstaff_payments_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')->where('financial_year',$getfinancial_year)->get();
$zakat_paidstaff_payments_amount = $zakat_paidstaff_payments_query->row('amount');

$gettotal_year_disbursment = $ga_payments_amount + $ma_payments_amount + $dm_payments_amount + 
$hc_payments_amount + $esa_payments_amount + $esp_payments_amount + $zakat_paidstaff_payments_amount;

echo number_format($gettotal_year_disbursment,2);

?>
</td>
<td>
<?php
echo number_format(($total_gettoalfund - $gettotal_year_disbursment),2); 
?>
</td>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div>
<h2>District Wise information regarding Mustahiqeen Shown Below</h2>
<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="summary_tab1" data-toggle="pill" href="#summary_tab" role="tab" aria-controls="summary_tab" aria-selected="true">Fund Summary</a>
</li>
<li class="nav-item">
<a class="nav-link" id="lzc_tab1" data-toggle="pill" href="#lzc_tab" role="tab" aria-controls="lzc_tab" aria-selected="false">LZC Wise List</a>
</li>
<li class="nav-item">
<a class="nav-link" id="ga_tab1" data-toggle="pill" href="#ga_tab" role="tab" aria-controls="ga_tab" aria-selected="false">Guzara Allowance</a>
</li>
<li class="nav-item">
<a class="nav-link" id="ma_tab1" data-toggle="pill" href="#ma_tab" role="tab" aria-controls="ma_tab" aria-selected="false">Marriage Assist</a>
</li>
<li class="nav-item">
<a class="nav-link" id="dm_tab1" data-toggle="pill" href="#dm_tab" role="tab" aria-controls="dm_tab" aria-selected="false">Deeni Madaris</a>
</li>
<li class="nav-item">
<a class="nav-link" id="hc_tab1" data-toggle="pill" href="#hc_tab" role="tab" aria-controls="hc_tab" aria-selected="false">Health Care</a>
</li>
<li class="nav-item">
<a class="nav-link" id="esa_tab1" data-toggle="pill" href="#esa_tab" role="tab" aria-controls="esa_tab" aria-selected="false">Edu-Stipend(A)</a>
</li>
<li class="nav-item">
<a class="nav-link" id="esp_tab1" data-toggle="pill" href="#esp_tab" role="tab" aria-controls="esp_tab" aria-selected="false">Edu-Stipend(P)</a>
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
<th>Account Head</th>
<th>Fund Received </th>
<th>Fund Disbursed</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Guzara Allowance</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>2</td>
<td>Merriage Assistannce</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3</td>
<td>Deeni Madaris</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
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
<th>Category</th>
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
<h4 class="col-md-11">Deeni Madaris Fund Summary of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button> 
</div>
<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Madrassa Name</th>
<th>Fund Received </th>
<th>Fund Disbursed</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Madrassa 1</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>2</td>
<td>Madrassa 2</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3</td>
<td>Madrassa 3</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
</tbody>
</table>
</div>
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
<h4 class="col-md-11">Educational Institution Fund Summary of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button> 
</div>
<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>University/College Name</th>
<th>Fund Received </th>
<th>Fund Disbursed</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>University/College 1</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>2</td>
<td>University/College 2</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3</td>
<td>University/College 3</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
</tbody>
</table>
</div>

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
<h4 class="col-md-11">Educational Institution Fund Summary of District____ for F/Y<strong>2015-16</strong>  Installment: <strong>1</strong></h4> 
<button type="reset" class="btn btn-primary float right">Print List</button> 
</div>
<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>University/College Name</th>
<th>Fund Received </th>
<th>Fund Disbursed</th>
<th>Balance</th>

</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>University/College 1</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>2</td>
<td>University/College 2</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>3</td>
<td>University/College 3</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>
</tbody>
</table>
</div>
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

</div>


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
