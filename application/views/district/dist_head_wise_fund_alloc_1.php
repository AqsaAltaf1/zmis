<?php

$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');

$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

// Get total Fund for district
$dist_total_fund_query = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_fund_received = $dist_total_fund_query->row('total_fund');
//$this->db->last_query();



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



$esa_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (A)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esa_amount = $esa_query->row('amount_allocated');

$esp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (P)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_esp_amount = $esp_query->row('amount_allocated');

$hc_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Health Care (District Level)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_hc_amount = $hc_query->row('amount_allocated');



$total_amount_sum = $total_ga_amount + $total_ma_amount + $total_dm_amount + $total_esa_amount + $total_esp_amount;

// Administrative Expenses
$admin_expns_query = $this->db->select_sum('admin_expns')->from('district_payment')
->where('district_id',$userid)->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_amount = $admin_expns_query->row('admin_expns');

$net_rzf_amount = $total_fund_received - $total_adminexp_amount;

// NCF Budget
$get_ncf_dist_fund = $this->db->select('*')->from('natural_calamity_fund')
->where('district_id',$userid)
->where('financial_year',$getfinancial_year)
->get();
$get_ncf_dist_allocation = $get_ncf_dist_fund->row('amount_allocated');

$total_rzf_amount = $get_ncf_dist_allocation + $net_rzf_amount;

$get_remaining_balance = $total_rzf_amount - $total_amount_sum;
$net_balance =  $total_rzf_amount - $total_amount_sum;

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


<?php $this->load->view('district/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('district/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('district/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('district/include/sidebar');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 202px;">




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
<div class="col-sm-8">
<h3 class="m-0 text-dark">District <strong><?php echo $district_name; ?></strong> Head Wise Fund Allocation</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year; ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $get_inst;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">District <strong><?php echo $district_name; ?></strong> Head Wise Zakat Fund Allocation 22</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form action="<?php echo base_url(); ?>Dist_head_wise_fund_alloc/manage_dist_headwise_payment/" method="post" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget at <strong><?php echo $district_name; ?></strong> <span class="required">*</span>
</label>


<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($net_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head" required="">
<option value="">---Select One----</option>
<option value="Guzara Allowance">Guzara Allowance</option>
<option value="Marriage Assistance">Marriage Assistance</option>
<option value="Deeni Madaris">Deeni Madaris</option>

<!--<option value="Adminnistrative_Expenses">
Administrative Expenditure (Salaries of Zakat Paid Staff (Field Clerk & Audit Staff))
</option>-->

<option value="Health Care (District Level)">Health Care</option>
<option value="Educational Stipend (A)">Educational Stipend (A)</option>
<option value="Educational Stipend (P)">Educational Stipend (P)</option>
<!--<option value="LZC Chairman">LZC Chairman Allowance</option>-->
<option value="Natural Calamity Fund">Natural Calamity Fund</option>
</select>
</div>


<div class="row form-group" id="lzc_div" style="display:none;">
<label class="col-md-3" for="check">Select LZC<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="lzc" name="lzc">
<option value="">---Select LZCs---</option>

<?php
$i=1;
if(!empty($get_all_lzc))
{
foreach($get_all_lzc as $get_lzcname)
{
?>
<option value="<?php echo $get_lzcname['id']?>"><?php echo $get_lzcname['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>

<div class="row form-group" id="madrassa_div" style="display:none;">
<label class="col-md-3" for="check">Select Madarassa<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="madarassa" name="madarassa">


<?php
$i=1;
if(!empty($get_all_deeni_madaris))
{
foreach($get_all_deeni_madaris as $get_all_deeni_madarisvalue)
{
?>
<option value="<?php echo $get_all_deeni_madarisvalue['id']?>"><?php echo $get_all_deeni_madarisvalue['madrassa_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>
</div>
<div class="row form-group" id="institution_div" style="display: none;">
<label class="col-md-3" for="check">Select Institution<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="institution" name="institution">

<?php
$i=1;
if(!empty($get_all_inst_list))
{
foreach($get_all_inst_list as $get_all_instlist)
{
?>
<option value="<?php echo $get_all_instlist['id']?>"><?php echo $get_all_instlist['institution_name']; ?></option>
<?php 
$i++;
}
}
?>


</select>
</div>



<div class="row form-group" id="hospital_div" style="display:none;">
<label class="col-md-3" for="check">Select Hospital<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="hospital_type" name="hospital_type">

<option value="">---Select Hospital----</option>
<option value="DHQ">District Headquarter Hosital</option>
<option value="THQ">Tehsil Headquarter Hosital</option>
<option value="BHU">Basic Health Unit</option>



</select>
</div>



<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_no" id="cheque_no" class="form-control col-md-8 col-xs-12" required>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque Date <span class="required">*</span> </label>
<input type="date" value="<?php echo date("Y-m-d");?>" name="cheque_date" id="cheque_date" class="form-control col-md-8 col-xs-12" required>
</div>



<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="year" name="year" class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" class="form-control col-md-8" value="<?php echo $get_inst;?>" readonly>
</div>



<div>

<div id="guzara_allownce_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" id="nobvalues" name="nob_ga" onKeyUp="calculatenobs_ga(this.value)" min="1" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" id="amount_allocatedvalue_ga" name="amount_allocated_ga" min="1" max="<?php echo $net_balance;?>" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div id="marriage_assistance_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" name="nob_ma" onKeyUp="calculatenobs_ma(this.value);" min="1" id="nobvalues" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" id="amount_allocatedvalues_ma" name="amount_allocated_ma" min="1" max="<?php echo $net_balance;?>" class="form-control col-md-8 col-xs-12">
</div>
</div>

<div id="allocate_amount_div" style="display:none;">
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated_all" min="1" max="<?php echo $net_balance;?>" id="amount_allocatedvaluev" class="form-control col-md-8 col-xs-12">
</div>
</div>


</div>




<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button style="margin-right:3px;"  class="btn btn-primary col-md-1" type="reset">Reset</button>
<button style="margin-right:3px;"  class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>

</form>
</div>
</div>
</div>
</div>





<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Fund Allocated To <strong><?php echo $district_name; ?></strong> </span>
<span class="info-box-number" style="color: blue;">

<?php

echo number_format($total_rzf_amount,2); 
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
<span class="info-box-number">Fund Released/Disbursed</span>
<span class="info-box-number" style="color: green;"> 
<?php
echo number_format($total_amount_sum,2);
?>
<br>
</span>
<small class="info-box-number">

<?php 
// $x = $total_received_amount;
// $y = $total_hoa_amount * 100;
// $z = $y/$x;
// echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Balance Available</span>
<span class="info-box-number" style="color: red;">

<?php

echo $net_balance_nf= number_format($net_balance,2);
?>

<br>
</span>
<small class="info-box-number">

<?php 
// $x = $total_received_amount;
// $y = $pza_balance * 100;
// $z = $y/$x;
// echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->


</div>


<!--For Hospital Fund-->

<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Hospital Fund Allocated To <strong><?php echo $district_name; ?></strong> </span>
<span class="info-box-number" style="color: blue;">

<?php
$total_HC_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_HC_received = $total_HC_fund->row('HC');
echo number_format($total_HC_received,2);

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
<span class="info-box-number">Hospital Fund Released/Disbursed</span>
<span class="info-box-number" style="color: green;"> 
<?php
echo number_format($total_hc_amount,2);
?>
<br>
</span>
<small class="info-box-number">

<?php 
// $x = $total_received_amount;
// $y = $total_hoa_amount * 100;
// $z = $y/$x;
// echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Hospital Fund Balance Available</span>
<span class="info-box-number" style="color: red;">

<?php
$hospital_balance = $total_HC_received - $total_hc_amount;
echo number_format($hospital_balance,2);
?>

<br>
</span>
<small class="info-box-number">

<?php 
// $x = $total_received_amount;
// $y = $pza_balance * 100;
// $z = $y/$x;
// echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->


</div>




<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Head Wise Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i> Head Wise Zakat Fund Allocation</button>
</div>
</div>



<!-- Main Form -->
<div class="row">

<div class="card col-12 col-md-12 col-sm-6">

<div class="card-header">
<h3 class="card-title">LZC Fund Allocation Summary of District <strong><?php echo $district_name; ?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="<?php echo base_url(); ?>Dist_head_wise_fund_alloc/LZCFundPrint" class="btn btn-primary btn-sm float-right">Print LZC Fund Details</a>
</div>
<!-- /.card-header -->



<div class="card-body">
<table id="table1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>name</th>
<th>Zakat Head</th>
<th>Cheque</th>
<th>Chq Date</th>
<th>NOBs</th>
<th>Fund</th>
<th>Disbursed</th>
<th>Balance</th>
<th>Date</th>
<th>Action</th>
<th>Cancel</th>
</tr>
</thead>
<tbody>

<?php
$i1=1;
if(!empty($get_dist_headwise_fund))
{
foreach($get_dist_headwise_fund as $dist_headwise_fund)
{
?>

<?php
if($dist_headwise_fund['status'] == "0")
{
?>
<tr bgcolor="#F57B5D">
<?php	
}
else
{
?>
<tr>
<?php	
}
?>

<td tabindex="0" class="sorting_1"><?php echo $i1;?></td>

<td><?php 
$LZC_name = $dist_headwise_fund['lzc_institution_madrasa']; 
$getlzc_query = $this->db->select('*')->from('lzc_list')->where('id',$LZC_name)->get();
echo $getlzc_name = $getlzc_query->row('lzc_name');

?></td>
<td><?php echo $dist_headwise_fund['account_head'];?></td>
<td><?php echo $dist_headwise_fund['cheque_no'];?></td>
<td><?php echo date("d-m-Y",strtotime($dist_headwise_fund['cheque_date']));?></td>
<td><?php echo $dist_headwise_fund['nob'];?></td>
<td><?php echo $amount_allocated = $dist_headwise_fund['amount_allocated'];?></td>


<td>

<?php
if($dist_headwise_fund['account_head'] == "Guzara Allowance")
{
	
$query_amount_ga = $this->db->select_sum('payment_amount')->from('guzara_allowance_mustahiqeen_payments')
->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)
->where('lzc_id',$LZC_name)->where('district_id',$userid)
->get();
$get_final_amount = $query_amount_ga->row('payment_amount');
echo number_format($get_final_amount,2);			
}
else if($dist_headwise_fund['account_head'] == "Marriage Assistance")
{
$query_amount_ma = $this->db->select_sum('payment_amount')->from('ma_paid_mustahiqeen')
->where('financial_Year',$getfinancial_year)->where('installment',$get_inst)
->where('lzc_id',$LZC_name)->where('district_id',$userid)
->get();
$get_final_amount = $query_amount_ma->row('payment_amount');
echo number_format($get_final_amount,2);
}




?>



</td>


<td>

<?php 
$get_total_balance = $amount_allocated - $get_final_amount;
echo number_format($get_total_balance,2);
?>

</td>

<td><?php echo date("d-m-Y",strtotime($dist_headwise_fund['add_date']));?></td>

<td>

<?php
if($dist_headwise_fund['status'] == "1")
{
?>

<?php
if($get_final_amount == 0)
{
?>
<!--<a href="#" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>-->
<button type="button" data-target=".bs-example-modal-lg<?php echo $i1;?>" class="btn btn-success btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></button>
<?php
}
?>

<?php

}
?>

</td>



<td>

<?php
if($dist_headwise_fund['status'] == "1")
{
?>

<?php
if($get_final_amount == 0)
{
?>
<!--<a href="#" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>-->
<button type="button" data-target=".bs-example-modal-lg-cancel<?php echo $i1;?>" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></button>
<?php
}
?>

<?php
}
?>


</td>




</tr>

</div>






<div class="modal bs-example-modal-lg-cancel<?php echo $i1;?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update District <strong><?php echo $district_name;?></strong> Head Wise Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_head_wise_fund_alloc/manage_dist_headwise_payment_cancel/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">


<div>
<div id="guzara_allownce_div">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">Enter District Password <span class="required">*</span> </label>
<input type="password" value="" name="dist_password" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Comments<span class="required">*</span> </label>

<textarea name="comments" class="form-control col-md-8" style="height:200px;"></textarea>

</div>
</div>
</div>




<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button style="margin-right:3px;"  class="btn btn-primary col-md-1" type="reset">Reset</button>
<button style="margin-right:3px;"  class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

<input type="hidden" name="cancel_type" value="canceled">
<input type="hidden" name="getrecord_id" value="<?php echo $dist_headwise_fund['id'];?>">




</div>

</form>
</div>
</div>
</div>
</div>





<div class="modal fade bs-example-modal-lg<?php echo $i1;?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update District <strong><?php echo $district_name;?></strong> Head Wise Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" action="<?php echo base_url(); ?>Dist_head_wise_fund_alloc/manage_dist_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="check">Select LZC<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="lzc" name="lzcid">
<option value="<?php echo $LZC_name;?>"><?php echo $getlzc_name;?></option>

<?php
$i=1;
if(!empty($get_all_lzc))
{
foreach($get_all_lzc as $get_lzcname)
{
?>
<option value="<?php echo $get_lzcname['id']?>"><?php echo $get_lzcname['lzc_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_no" value="<?php echo $dist_headwise_fund['cheque_no'];?>" id="cheque_no" class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="cheque_no">Cheque Date <span class="required">*</span> </label>
<input type="date" value="<?php echo date("Y-m-d",strtotime($dist_headwise_fund['cheque_date']));?>" name="cheque_date" id="cheque_date" class="form-control col-md-8 col-xs-12">
</div>



<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="year" name="year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-8" value="<?php echo $get_inst;?>" readonly>
</div>

<?php
if($dist_headwise_fund['account_head'] == "Guzara Allowance")
{
$account_head = $dist_headwise_fund['account_head'];
?>
<div>
<div id="guzara_allownce_div">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" onKeyUp="calculatenobs_ga_edit(this.value,<?php echo $i1;?>);" id="nobvalues<?php echo $i1;?>" name="nob_ga_value" value="<?php echo $dist_headwise_fund['nob'];?>" min="1" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input value="<?php echo $dist_headwise_fund['amount_allocated'];?>" id="amount_allocated_ga_edit<?php echo $i1;?>" type="number" name="amount_allocated_ga" min="1" max="<?php echo $net_balance;?>" class="form-control col-md-8 col-xs-12">
</div>
</div>
</div>
<?php
}
if($dist_headwise_fund['account_head'] == "Marriage Assistance")
{

$account_head = $dist_headwise_fund['account_head'];
	
?>

<div>
<div id="guzara_allownce_div">
<div class="row form-group">
<label class="control-label col-md-3" for="mustahiq_no">No of Mustahiqeen <span class="required">*</span> </label>
<input type="number" value="<?php echo $dist_headwise_fund['nob'];?>" name="nob_ma_value" onKeyUp="calculatenobs_ma_edit(this.value,<?php echo $i1;?>);" min="1" id="nobvalues" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input value="<?php echo $dist_headwise_fund['amount_allocated'];?>" type="number" name="amount_allocated_ma" min="1" max="<?php echo $net_balance;?>" id="calculatenobs_ma_edit<?php echo $i1;?>" class="form-control col-md-8 col-xs-12">
</div>
</div>
</div>


<?php
}
?>






<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button style="margin-right:3px;"  class="btn btn-primary col-md-1" type="reset">Reset</button>
<button style="margin-right:3px;"  class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

<input type="hidden" name="account_head" value="<?php echo $account_head;?>">
<input type="hidden" name="getrecord_id" value="<?php echo $dist_headwise_fund['id'];?>">




</div>

</form>
</div>
</div>
</div>
</div>

















<?php 
$i1++;
}
}
?>
</tbody>

</table>
</div>
</div>
<!-- /.card-body -->
</div>

</div>

<!-- Table no 2 -->
<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Deeni Madaris Fund Allocation Summary of District <strong><?php echo $district_name; ?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary btn-sm float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="table2" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Madrassa Name</th>
<th>Zakat Head</th>
<th>Year</th>
<th>Inst</th>
<th>Fund</th>
<th>Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_madrassalist))
{
foreach($get_all_madrassalist as $getdeeni_madaras)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td>

<?php
$lzc_institution_madrasaid = $getdeeni_madaras['lzc_institution_madrasa']; 
$district_id = $userid; 
$getdeenimadarisqry = $this->db->select('*')->from('madrassa_list')->where('id',$lzc_institution_madrasaid)->where('district_id',$district_id)->get();
echo $getMadrassaName = $getdeenimadarisqry->row('madrassa_name');
?>

</td>
<td><?php echo $getdeeni_madaras['account_head'];?></td>
<td><?php echo $getdeeni_madaras['year'];?></td>
<td><?php echo $getdeeni_madaras['installment'];?></td>
<td><?php echo $amount_allocated_get = $getdeeni_madaras['amount_allocated'];?></td>

<td><?php echo date("d-m-Y",strtotime($getdeeni_madaras['add_date']));?></td>

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


</div>

<!-- Table No 3 -->
<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Educational Institution Fund Allocation Summary of District <strong><?php echo $district_name; ?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary btn-sm float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="table3" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Institution Name</th>
<th>Zakat Head</th>
<th>Year</th>
<th>Inst</th>
<th>Fund</th>
<th>Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_edulistings))
{
foreach($get_all_edulistings as $get_edulist)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td>
<?php 
$educational_id = $get_edulist['lzc_institution_madrasa'];
$district_id = $userid; 
$getEduInstitutionQry = $this->db->select('*')->from('institution_list')->where('id',$educational_id)->where('district_id',$district_id)->get();
//echo $this->db->last_query();

echo $getInstName = $getEduInstitutionQry->row('institution_name');
?>

</td>
<td><?php echo $get_edulist['account_head'];?></td>
<td><?php echo $get_edulist['year'];?></td>
<td><?php echo $get_edulist['installment'];?></td>
<td><?php echo $amount_allocated_get = $get_edulist['amount_allocated'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_edulist['add_date']));?></td>

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



</div>




<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Health Care Fund Allocation Summary of District <strong><?php echo $district_name; ?></strong> for Year:<strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" href="printlist.php" class="btn btn-primary btn-sm float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="table4" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Zakat Head</th>
<th>Hospital</th>
<th>Year</th>
<th>Inst</th>
<th>Fund</th>
<th>Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_hc_listings))
{
foreach($get_hc_listings as $get_hc_listings_values)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>

<?php 
/*$educational_id = $get_edulist['lzc_institution_madrasa'];
$lzc_institution_madrasaid = $getdeeni_madaras['lzc_institution_madrasa']; 
$getdeenimadarisqry = $this->db->select('*')->from('institution_list')->where('id',$educational_id)->get();
echo $getlzc_name = $getdeenimadarisqry->row('institution_name');*/
?>





<td><?php echo $get_hc_listings_values['account_head'];?></td>
<td><?php echo $get_hc_listings_values['lzc_institution_madrasa']; echo ' '.$district_name;?></td>
<td><?php echo $get_hc_listings_values['year'];?></td>
<td><?php echo $get_hc_listings_values['installment'];?></td>
<td><?php echo $amount_allocated_get = $get_hc_listings_values['amount_allocated'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_hc_listings_values['add_date']));?></td>

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


<script>

// ------------- Local Zakat Committee -------------//

$('#account_head').on('change',function()
{
if( $(this).val()==="Guzara Allowance")
{
$("#lzc_div").slideDown()
$("#guzara_allownce_div").slideDown();
$("#marriage_assistance_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideUp();
$("#madrassa_div").slideUp();
}
else if($(this).val()==="Marriage Assistance")
{
$("#lzc_div").slideDown();
$("#marriage_assistance_div").slideDown();
$("#guzara_allownce_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideUp();
$("#madrassa_div").slideUp();
} 
else if( $(this).val() === "Deeni Madaris") 
{
$("#lzc_div").slideUp();
$("#madrassa_div").slideDown();
$("#allocate_amount_div").slideDown();
$("#institution_div").slideUp();

$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();	
}
else if( $(this).val() === "Adminnistrative_Expenses") 
{
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();
$("#institution_div").slideUp();

$("#allocate_amount_div").slideDown();	
}

else if( $(this).val() === "Health Care (District Level)")
{
$("#institution_div").slideUp();
$("#lzc_div").slideUp();	
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();

$("#hospital_div").slideDown();
$("#allocate_amount_div").slideDown();		
}

else if(($(this).val() === "Educational Stipend (A)") ||  ($(this).val() === "Educational Stipend (P)"))
{
$("#institution_div").slideDown();
$("#allocate_amount_div").slideDown();

$("#lzc_div").slideUp();
$("#madrassa_div").slideUp();
$("#guzara_allownce_div").slideUp();
$("#marriage_assistance_div").slideUp();	
}






});


function calculatenobs_ga(getnobs)
{
var grandtotal = getnobs * 12000;
document.getElementById("amount_allocatedvalue_ga").value = grandtotal;
}



function calculatenobs_ma(getnobs)
{
var grandtotal = getnobs * 30000;
document.getElementById("amount_allocatedvalues_ma").value = grandtotal;
}





function calculatenobs_ga_edit(getnobs,getrowid)
{
var grandtotal = getnobs * 12000;
document.getElementById("amount_allocated_ga_edit"+getrowid).value = grandtotal;
}



function calculatenobs_ma_edit(getnobs,getrowid)
{
var grandtotal = getnobs * 30000;
document.getElementById("calculatenobs_ma_edit"+getrowid).value = grandtotal;
}

</script>


<script>
$(function () {
$("#table1").DataTable({
"responsive": true,
"autoWidth": true,
});
$('#table2').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
$("#table3").DataTable({
"responsive": true,
"autoWidth": true,
});
$("#table4").DataTable({
"responsive": true,
"autoWidth": true,
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

$(document).ready(function() 
{
$('#example1').DataTable( {
dom: 'Bfrtip',
buttons: [
{
extend: 'print', text: 'Print Report', className: 'btn btn-sm btn-primary',
},
]
} );
} );
</script>

</body>
</html>
