<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
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



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Allocate Fund to PZF</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>pza_dashboard/manage_pzf_payment/" method="post" data-parsley-validate class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Amount Received <span class="required">*</span>
</label>
<input type="number" name="payment_received" id="payment_received" required class="form-control col-md-8">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">cheque/Chalan # <span class="required">*</span>
</label>
<input type="text" name="cheque_no" id="cheque_no" class="form-control col-md-8">
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="date">Cheque/Chalan Date <span class="required">*</span>
</label>
<input type="date" value="<?php echo date("Y-m-d");?>" name="cheque_date" id="cheque_date"  required="required" class="form-control datetimepicker-input col-md-8">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="occupation">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly >
</div>


<div class="row form-group">
<label for="payment_received" class="control-label col-md-3">Payment Received From</label>
<select class="form-control col-md-8" id="payment_rec_from" name="payment_rec_from"  onChange='toggleShared();'>
<option value="">---Select One----</option>
<option value="Ehsaas">Ehsaas</option>
<option value="District">As Un-Spent Balance From Districts</option>
<option value="Hospital">As Un-Spent Balance From Hospitals</option>
<option value="Other">Any Other Resource</option>
</select>
</div>


<div id="district_list" style="display:none;">
<div class="row form-group">
<label for="district" class="control-label col-md-3">Select District</label>
<select class="form-control col-md-8" id="distt" name="district">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>
<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>


<div style="display:none;" id="hospital_list">
<div class="row form-group">
<label for="hospital" class="control-label col-md-3">Select Hospital</label>

<select class="form-control col-md-8" id="hosp" name="hospital">
<option value="">---Select One----</option>
<!-- Select hospital list from teh database -->
<?php
$i=1;
if(!empty($get_all_hospitals))
{
foreach($get_all_hospitals as $getallhospitals)
{
?>
<option value="<?php echo $getallhospitals['id']?>"><?php echo $getallhospitals['name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>


<div style="display:none;" id="health_account_head">

<div class="row form-group">
<label for="head" class="control-label col-md-3">Hospital Account Head (Provincial)</label>

<select class="form-control col-md-8" id="hosp_acc_head" name="hosp_acc_head">
<option value="">---Select One----</option>
<option value="Regular Health Care" >Regular Health Care</option>
<option value="Special Health Program" >Special Health Program</option>
<option value="Other resources">Any Other resource</option>
</select>
</div>

</div>



<div  style="display:none;" id="accounthead">
<div class="row form-group">
<label for="head" class="control-label col-md-3">Head of Account</label>

<select class="form-control col-md-8" id="dist_acc_head" name="dist_acc_head">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_headofaccounts))
{
foreach($get_all_headofaccounts as $getheadofaccounts)
{
?>
<option value="<?php echo $getheadofaccounts['zakat_head']?>"><?php echo $getheadofaccounts['zakat_head']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
</div>



<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks">
</textarea>

</div>

<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">
<div class="col-md-1"></div>
<button class="btn btn-primary col-md-1" type="reset">Reset</button>
<div class="col-md-4"></div>
<button class="btn btn-primary col-md-1" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>



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
<strong>Success! </strong> <?php echo $success;?>
</div>
<?php
}
else if(isset($error))
{
?>
<div class="alert alert-danger alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error! </strong> <?php echo $error;?>
</div>
<?php	
}
?>





<div class="row mb-2">
<div class="col-sm-8 col-md-7">
<h3 class="m-0 text-dark">Welcome to Provincial Zakat Administration (PZA) Dashboard</h3>
</div>

<div class="col-sm-2 col-md-2 col-lg-3">
<h3>Year: <strong><?php echo $getfinancial_year; ?></strong> & Inst: <strong><?php echo $getfinancial_installment; ?></strong> </h3>
</div>

<div class="col-sm-2 col-md-2">
<button type="button" class="btn btn-primary " data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Fund Deposit To PZF</button> 
</div><!-- /.col -->
</div>



<!-- Info Boxes -->

<div class="row">
<!--
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Fund at PZF</span>
<span class="info-box-number" style="color: blue;">
<?php
$runpzf_query_amount = $this->db->select_sum('payment_received')->from('pzf_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query_amount->row('payment_received');
echo number_format($runpzf_query_amount->row('payment_received'),2); 
?>
  <br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>

</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Amount Reserve for the Year <?php echo $getfinancial_year;?></span>
<span class="info-box-number" style="color: green;"> 

<?php
$yearlyFundReserved = $this->db->select_sum('yearly_fund')->from('pza_yearly_fund_allocation')->where('status',1)->where('financial_year',$getfinancial_year)->get();
//$this->db->last_query();
$total_reserved_amount = $yearlyFundReserved->row('yearly_fund');
echo number_format($total_reserved_amount,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $total_reserved_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">PZF Balance after <?php echo $getfinancial_year;?> Allocation</span>
<span class="info-box-number" style="color: red;">

<?php


$net_balance =  $total_pzfreceived_amount - $total_reserved_amount;
echo $net_balance_pzf= number_format($net_balance,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
</div>
</div>
-->


<div class="col-sm-12 col-md-12">
<h3 class="text-dark" style="font-weight:bold;">Actual Status of Provincial Zakat Fund Account # 03 </h3>
</div>



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Total Fund at PZF A/C # 03</span>
<span class="info-box-number" style="color: blue;">
<?php
$runpzf_query_amount = $this->db->select_sum('payment_received')->from('pzf_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query_amount->row('payment_received');
echo number_format($runpzf_query_amount->row('payment_received'),2); 
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
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">PZA Fund Reserved for the Year <?php echo $getfinancial_year;?></span>
<span class="info-box-number" style="color: green;"> 

<?php
$yearlyFundReserved = $this->db->select_sum('yearly_fund')->from('pza_yearly_fund_allocation')->where('status',1)->where('financial_year',$getfinancial_year)->get();
//$this->db->last_query();
$total_reserved_amount = $yearlyFundReserved->row('yearly_fund');
echo number_format($total_reserved_amount,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $total_reserved_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Net PZF Balance</span>
<span class="info-box-number" style="color: red;">

<?php
$net_balance =  $total_pzfreceived_amount - $total_reserved_amount;
echo $net_balance_pzf= number_format($net_balance,2);
?>

<br>
 </span>
<small class="info-box-number">

<?php 
$x = $total_pzfreceived_amount;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>




<div class="col-sm-12 col-md-12">
<h3 class="text-dark" style="font-weight:bold;">Provincial Zakat Administration Releases During  <?php echo $getfinancial_year; ?></h3>
</div>



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">PZA Fund Reserved for the Year <?php echo $getfinancial_year; ?></span>
<span class="info-box-number" style="color: green;"> 

<?php
$yearlyFundReserved = $this->db->select_sum('yearly_fund')->from('pza_yearly_fund_allocation')->where('status',1)->where('financial_year',$getfinancial_year)->get();
//$this->db->last_query();
$total_reserved_amount = $yearlyFundReserved->row('yearly_fund');
echo number_format($total_reserved_amount,2);
?>

<br>
 </span>
<small class="info-box-number">

100%
</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="clearfix hidden-md-up"></div>

<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number" >PZA Releases During Year <?php echo $getfinancial_year; ?></span>
<span class="info-box-number" style="color: green;">


<?php
$runpzf_query_hoa = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hoa_amount = $runpzf_query_hoa->row('amount_allocated');
echo number_format($runpzf_query_hoa->row('amount_allocated'),2);
?>


<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_reserved_amount;
$y = $total_hoa_amount * 100;
$z = $y/$x;
echo round($z,2)." %";
?>
</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number" >PZA Balance During Year <?php echo $getfinancial_year; ?></span>
<span class="info-box-number" style="color: red;">


<?php
 $pzaBalance = $total_reserved_amount - $total_hoa_amount;
echo number_format($pzaBalance,2);
?>


<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_hoa_amount;
$y = $pzaBalance * 100;
$z = $y/$x;
echo round($z,2)." %";
?>
</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>


<div class="col-sm-12 col-md-12">
<h3 class="text-dark" style="font-weight:bold;">Fund Utilization Summary During  <?php echo $getfinancial_year; ?> by Districts and Hiospitals</h3>
</div>


<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number" >PZA Releases During Year <?php echo $getfinancial_year; ?></span>
<span class="info-box-number" style="color: green;">


<?php
$runpzf_query_hoa = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hoa_amount = $runpzf_query_hoa->row('amount_allocated');
echo number_format($runpzf_query_hoa->row('amount_allocated'),2);
?>


<br>
</span>
<small class="info-box-number">
100%
</small>
</div>
</div>
</div>





<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number" >Utilization in <?php echo $getfinancial_year; ?> by districts & hospitals</span>
<span class="info-box-number" style="color: green;">


<?php
$runpzf_query_hoa = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_hoa_amount = $runpzf_query_hoa->row('amount_allocated');
echo number_format($runpzf_query_hoa->row('amount_allocated'),2);
?>


<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_reserved_amount;
$y = $total_hoa_amount * 100;
$z = $y/$x;
echo round($z,2)." %";
?>
</small>
</div>
</div>
</div>






</div>
</div>
</div>




<!-- /.content-header -->
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-6">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Allocate Financial Year and Installment: Current Financial Year : <strong style="color: black;"><?php echo $getfinancial_year;?></strong> & Installlment : <strong style="color: black;"><?php echo $getfinancial_installment;?></strong> </h3>  

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
</div>



<!-- Body of the Card -->
<div class="card-body">
<div class="row"> 
<form id="year" method="post" action="<?php echo base_url(); ?>pza_dashboard/manage_year_inst" enctype="multipart/form-data" class="form-inline form-label-left">
<div class="col-md-3">
<div class="form-group">  
<select class="form-control" required="required" id="financial_year" name="financial_year">
<option value="">---Select Financial Year---</option>
<?php
$datevalue =  date("Y");
for($datecounter = 2018; $datecounter <= $datevalue;$datecounter++)
{
$addyear = substr($datecounter, - 2);
$getfinal_year = $addyear + 1;
if($datecounter < $datevalue)
{
?>
<option value="<?php echo $datecounter;?>-<?php echo $getfinal_year;?>"><?php echo $datecounter;?>-<?php echo $getfinal_year;?></option>
<?php		
}	
?>
<?php	
}
?>

</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">  
<input type="radio" name="installment" value="1" class="flat"> <span style="color: black; font-size: 15px;"><b>&nbsp;&nbsp;&nbsp;Installment 1</b></span>
&nbsp;&nbsp;&nbsp;

<input type="radio" name="installment" value="2" class="flat"> <span style="color: black; font-size: 15px;"><b>&nbsp;&nbsp;&nbsp;Installment 2 &nbsp; &nbsp; &nbsp;</b></span>

<input type="radio" name="installment" value="1&2" class="flat"> <span style="color: black; font-size: 15px;"><b>&nbsp;&nbsp;&nbsp;Installment 1 & 2</b></span>
</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="ga_percentage" name="ga_percentage">
<option value="">---Select GA Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->
<input type="text" class="form-control" required="required" id="ga_percentage" name="ga_percentage" placeholder="GA Percentage">
</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="ma_percentage" name="ma_percentage">
<option value="">---Select MA Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->

<input type="text" class="form-control" required="required" id="ma_percentage" name="ma_percentage" placeholder="MA Percentage">
</div>
</div>
<br>
<div class="col-md-3" style="margin-top: 10px;">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="dm_percentage" name="dm_percentage">
<option value="">---Select DM Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->

<input type="text" class="form-control" required="required" id="dm_percentage" name="dm_percentage" placeholder="DM Percentage">


</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="hc_percentage" name="hc_percentage">
<option value="">---Select HC Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->

<input type="text" class="form-control" required="required" id="hc_percentage" name="hc_percentage" placeholder="HC Percentage">

</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="esa_percentage" name="esa_percentage">
<option value="">---Select ESA Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->

<input type="text" class="form-control" required="required" id="esa_percentage" name="esa_percentage" placeholder="ESA Percentage">


</div>
</div>

<div class="col-md-3">
<div class="form-group"> 
<!--<select class="form-control" required="required" id="esp_percentage" name="esp_percentage">
<option value="">---Select ESP Percentage---</option>
<?php 
for($i=0;$i<=100;$i++)
{
?>
<option value="<?php //echo $i;?>"><?php //echo $i;?></option>
<?php
}
?>
</select>-->

<input type="text" class="form-control" required="required" id="esp_percentage" name="esp_percentage" placeholder="ESA Percentage">
</div>
</div>
<input type="submit" name="submit_year" value="Allocate Year/Installment" class="btn btn-primary" style="margin-top: 10px;">


<div class="col-sm-1"></div>
</form> 
</div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>



<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Provincial Zakat Fund Head-wise Search</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>Pza_dashboard/dashboardsearch" method="post">

<div class="col-md-3">
<select class="form-control" id="dist_acc_head" name="dist_hosp" style="width:100%;">
<option value="">--- Select 		----</option>
<option value="allHeads">All Heads</option>
<option value="Ehsaas">Ehsaas</option>
<option value="District">Un-Spent Balance From Districts</option>
<option value="Hospital">Un-Spent Balance From Hospitals</option>
<option value="Other">Any Other Resource</option>


</select>
</div>





<div class="col-md-3">   
<select class="form-control" id="dist_acc_head" name="acount_head" style="width:100%;">
<option value="">---Zakat Head----</option>
<option value="allHeads">ALL Heads</option>
<?php
$z=1;
if(!empty($get_all_zakatheads))
{
foreach($get_all_zakatheads as $get_hoa_list)
{
?>
<option value="<?php echo $get_hoa_list['zakat_head']?>"><?php echo $get_hoa_list['zakat_head']; ?></option>
<?php 
$z++;
}
}
?>
</select>
</div>

<div class="form-group">
<label for="date">Start</label>
&nbsp;&nbsp;
<input type="date" name="start_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;">&nbsp;&nbsp;
</div>
<div class="form-group">
<label for="date">End</label>
&nbsp;&nbsp;
<input type="date" name="end_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;"></div>
&nbsp;&nbsp;

<input type="submit" class="btn btn-success" name="search1" value="Search"> 


</form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<!-- Search form 2 -->
<div class=" col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">District-wise Search</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>pza_dashboard/dashboardsearchdates" method="post">



<div class="col-md-3">
<div class="form-group">   
<select class="form-control" id="dist_acc_head" name="dist_hosp" style="width:100%;">
<option value="">Select District</option>
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

<div class="col-md-3">
<div class="form-group">

<select class="form-control" id="dist_acc_head" name="acount_head" style="width:100%;">
<option value="">Zakat Head</option>
<option value="allHeads">All Heads</option>
<?php
$z=1;
if(!empty($get_all_zakatheads))
{
foreach($get_all_zakatheads as $get_hoa_list)
{
?>
<option value="<?php echo $get_hoa_list['zakat_head']?>"><?php echo $get_hoa_list['zakat_head']; ?></option>
<?php 
$z++;
}
}
?>
</select>
</div>
</div>


<div class="form-group">
<label for="date">Start</label>
&nbsp;&nbsp;
<input type="date" name="start_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;">&nbsp;&nbsp;
</div>
<div class="form-group">
<label for="date">End</label>
&nbsp;&nbsp;
<input type="date" name="end_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;"></div>
&nbsp;&nbsp;

<input type="submit" class="btn btn-success" name="search2" value="Search"> 





</form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

</div>


<div class=" col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Hospital-wise Search</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
<form class="form-inline" target="_blank" action="<?php echo base_url(); ?>pza_dashboard/hospitalSearch" method="post">

<div class="row">

<div class="col-md-3">
<div class="form-group">   
<select class="form-control" id="hospital_name" name="hospital_name" style="width:100%;">
<option value="">--- Select Hospital ----</option>
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
<label for="date">Start</label>
&nbsp;&nbsp;
<input type="date" name="start_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;">&nbsp;&nbsp;
</div>
<div class="form-group">
<label for="date">End</label>
&nbsp;&nbsp;
<input type="date" name="end_date" class="form-control" value="<?php echo date("Y-m-d")?>" style="width:160px;"></div>
&nbsp;&nbsp;
<input type="submit" class="btn btn-success" name="searchHospital" value="Search">


</div>

</form>
</div>
<!-- /.card-body -->
</div>
</div>
<!-- /.card -->







</div>








</div>

<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title">Payment Received/Deposit in PZF Account # 03</h3>
<a target="_blank" href="<?php echo base_url(); ?>Pza_dashboard/pza_printlist" class="btn btn-sm btn-primary float-right">Print PZF Deposit Fund</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Amount</th>
<th>Cheque#</th>
<th>Cheque Date</th>
<th>Received From</th>
<th>District/Hospital Name</th>
<th>Account Head</th>
<th>Entry Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_pza_fundrecords))
{
foreach($get_pza_fundrecords as $get_pza_funds)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_pza_funds['payment_received'];?></td>
<td><?php echo $get_pza_funds['check_no'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_pza_funds['check_date']));?></td>
<td><?php echo $get_pza_funds['payment_rec_from'];?></td>
<td>
<?php 
if($get_pza_funds['payment_rec_from']=="Hospital")
{
$district_hospital_id =  $get_pza_funds['district_hospital_id'];

$gethospitalsquery = $this->db->select('*')->from('hospital_users')->where('id',$district_hospital_id)->get();
echo $gethospital_name = $gethospitalsquery->row('name');

}
else if($get_pza_funds['payment_rec_from']=="District")
{
$district_hospital_id =  $get_pza_funds['district_hospital_id'];

$getdistrictsquery = $this->db->select('*')->from('district_users')->where('id',$district_hospital_id)->get();
echo $getdistrict_name = $getdistrictsquery->row('district_name');

}
?>

</td>
<td><?php echo $get_pza_funds['account_head'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_pza_funds['add_date']));?></td>
<td>
<a href="<?php echo base_url(); ?>pza_dashboard/update_pzf_fund/<?php echo $get_pza_funds['id'];?>" class="fa fa-edit btn btn-success btn-sm"></a>
</td>
</tr>

<?php
$i++;
}
}
?>  

</tbody>





</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<div class="card">
<div class="card-header">
<h3 class="card-title">Summary Of Un-Spent Balance From Districts  For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> </h3>

<a target="_blank" href="<?php echo base_url(); ?>Pza_dashboard/pza_unspent_print_list" class="btn btn-sm btn-primary float-right">Print Unspent Balance List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>


<th>S#</th>
<th>District</th>
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ESA</th>
<th>ESP</th>
<th>HC</th>
<th>EST</th>
<th>AE</th>
<th>ChLZC</th>
<th>Total</th>



</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistricts['district_name']; ?></td>

<td>
<?php
$runpzf_query_hoa = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Guzara Allowance')->where('financial_year',$getfinancial_year)->get();
$getGA_unspent = $runpzf_query_hoa->row('payment_received');
echo number_format($runpzf_query_hoa->row('payment_received'));
?>
</td>

<td> 
<?php
$select_MA_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Marriage Assistance')->where('financial_year',$getfinancial_year)->get();
$getMA_unspent= $select_MA_unspent->row('payment_received');
echo number_format($select_MA_unspent->row('payment_received'));
?>
</td>



<td>
<?php
$select_DM_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Deeni Madaris')->where('financial_year',$getfinancial_year)->get();
$getDM_unspent= $select_DM_unspent->row('payment_received');
echo number_format($select_DM_unspent->row('payment_received'));
//echo $this->db->last_query();
?>
</td>
<td>

<?php
$select_ESA_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (A)')->where('financial_year',$getfinancial_year)->get();
$getESA_unspent= $select_ESA_unspent->row('payment_received');
echo number_format($select_ESA_unspent->row('payment_received'));
//echo $this->db->last_query();
?></td>


<td>

<?php
$select_ESP_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (P)')->where('financial_year',$getfinancial_year)->get();
$getESP_unspent= $select_ESP_unspent->row('payment_received');
echo number_format($select_ESP_unspent->row('payment_received'));
//echo $this->db->last_query();
?>

</td>


<td>

<?php
$select_HC_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Health Care (District Level)')->where('financial_year',$getfinancial_year)->get();
$getHC_unspent = $select_HC_unspent->row('payment_received');
echo number_format($select_HC_unspent->row('payment_received'));
//echo $this->db->last_query();
?>


</td>
<td> 

<?php
$select_EST_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipends (Technical)')->where('financial_year',$getfinancial_year)->get();
$getEST_unspent= $select_EST_unspent->row('payment_received');
echo number_format($select_EST_unspent->row('payment_received'));
//echo $this->db->last_query();
?></td>
<td>

<?php
$select_AE_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Administrative Expenditure')->where('financial_year',$getfinancial_year)->get();
$getAE_unspent= $select_AE_unspent->row('payment_received');
echo number_format($select_AE_unspent->row('payment_received'));
//echo $this->db->last_query();
?>

</td>
<td> 
<?php 
$select_CHLZC_unspent = $this->db->select_sum('payment_received')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','LZC chairman Allow')->where('financial_year',$getfinancial_year)->get();
$getCHLZC_unspent= $select_CHLZC_unspent->row('payment_received');
echo number_format($select_CHLZC_unspent->row('payment_received'));
?>
</td>
<td>

<?php
$total_unspent = $getGA_unspent + $getMA_unspent + $getDM_unspent + $getESA_unspent + $getESP_unspent + $getHC_unspent + $getEST_unspent + $getLZF_unspent + $getDZF_unspent + $getAE_unspent + $getCHLZC_unspent;
echo number_format($total_unspent,1);
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
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>



</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->




Copyright © 2020 

<footer class="main-footer">
<?php $this->load->view('pza/include/footer');?>
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
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">

$(document).ready(function(){
setTimeout(function()
{ 
$('#success').slideUp();
}, 3000);
});

</script>




</body>
</html>
