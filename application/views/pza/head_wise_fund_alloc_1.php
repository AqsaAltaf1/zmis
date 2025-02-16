<?php

error_reporting(0);
$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');
$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');


$selectqry_pza = $this->db->select_sum('pza_amount')->from('pza_fund')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$total_received_amount = $selectqry_pza->row('pza_amount');


$selectqry_hoa = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$total_hoa_amount = $selectqry_hoa->row('amount_allocated');

$pza_balance = $total_received_amount - $total_hoa_amount;


$get_hc_allocated = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Health Care (Provincial Level)')->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)->get();
$get_hc_amount_allocated = $get_hc_allocated->row('amount_allocated');


$get_hc_estimated_value = $get_hc_amount_allocated + $pza_balance;

$get_shc_allocated = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Special Health Care Program')->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)->get();
$get_shc_amount_allocated = $get_shc_allocated->row('amount_allocated');


$get_shc_estimated_value = $get_shc_amount_allocated + $pza_balance;




$get_AE_allocated = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Adminnistrative_Expenses')->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)->get();
$get_AE_amount_allocated = $get_AE_allocated->row('amount_allocated');


$get_AE_estimated_value = $get_AE_amount_allocated + $pza_balance;


$get_RZF_allocated = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Regular Zakat Fund')->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)->get();
$get_RZF_amount_allocated = $get_RZF_allocated->row('amount_allocated');


$get_RZF_estimated_value = $get_RZF_amount_allocated + $pza_balance;

$get_ncf_fund_query = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Natural Calamity Fund')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_ncf_amount_allocated = $get_ncf_fund_query->row('amount_allocated');

$get_ncf_estimated_value = $get_ncf_amount_allocated + $pza_balance;

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
     
      
      <<!-- ?php $this->load->view('pza/include/user_manue');?> -->

      <!-- Sidebar Menu -->
      
       <?php $this->load->view('pza/include/sidebar');?>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 202px;">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">




<!--Health care modal-->

<div class="modal fade hc-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Health Care Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="Health Care (Provincial Level)">Health Care (Provincial Level)</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Estimated Amount <span class="required">*</span> </label>
<input type="number" name="" min="1" readonly value="<?php echo $get_hc_estimated_value;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $get_hc_estimated_value;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>




<!--Special Health care modal-->


<div class="modal fade shc_modal_form" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Special Health Care Program Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="Special Health Care Program">Special Health Care Program</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Estimated Amount <span class="required">*</span> </label>
<input type="number" name="" min="1" readonly value="<?php echo $get_shc_estimated_value;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $get_shc_estimated_value;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>

<!--Admin Expenditure modal-->


<div class="modal fade AE_modal_form" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Admin Expenditure Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="Adminnistrative_Expenses">Adminnistrative Expenses</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Estimated Amount <span class="required">*</span> </label>
<input type="number" name="" min="1" readonly value="<?php echo $get_AE_estimated_value;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $get_AE_estimated_value;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>

<!--Regular Zakat Fund modal-->


<div class="modal fade RZF_modal_form" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Regular Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="Regular Zakat Fund">Regular Zakat Fund</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Estimated Amount <span class="required">*</span> </label>
<input type="number" name="" min="1" readonly value="<?php echo $get_RZF_estimated_value;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $get_RZF_estimated_value;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>


<!--Natural Calamity Fund modal-->


<div class="modal fade NCF_modal_form" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Update Natural Calamity Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment_update/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="Natural Calamity Fund">Natural Calamity Fund</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>


<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Estimated Amount <span class="required">*</span> </label>
<input type="number" name="" min="1" readonly value="<?php echo $get_ncf_estimated_value;?>" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $get_ncf_estimated_value;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>
</div>




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
<h3 class="m-0 text-dark">Provincial Zakat Administration Head Wise Allocation</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <br />
<b>Notice</b>:  Undefined variable: year in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
and <br />
<b>Notice</b>:  Undefined variable: inst in <b>/home2/visitdemos/domains/visitdemos.com/public_html/zmis/pza/head_wise_fund_alloc.php</b> on line <b>66</b><br />
-->
<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Head Wise Zakat Fund Allocation</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<form id="pzf_fund" action="<?php echo base_url(); ?>Pza_Head_wise_fund_alloc/manage_headwise_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">
<div class="row form-group">
<label class="col-md-3" for="r_amount">Budget At PZA <span class="required">*</span>
</label>
<input type="text" name="pza_budget" id="pza_budget" value="<?php echo number_format($pza_balance,2);?>" disabled="disabled" class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="col-md-3" for="check">Select Account Head<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="account_head" name="account_head">
<option value="">---Select One----</option>
<option value="Health Care (Provincial Level)">Health Care (Provincial Level)</option>
<option value="Special Health Care Program">Special Health Care Program</option>

<option value="Adminnistrative_Expenses">Administrative Expenditure (Salaries of Zakat Paid Staff & Chairman LZCs Allowance)
</option>
<option value="Regular Zakat Fund">Regular Zakat Fund</option>
<option value="Natural Calamity Fund">Natural Calamity Fund (NCF)</option>
</select>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_year" required class="form-control col-md-8" value="<?php echo $getfinancial_year;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="inst" name="installment" required class="form-control col-md-8" value="<?php echo $getfinancial_installment;?>" readonly>
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="amount_alloc">Allocate Amount <span class="required">*</span> </label>
<input type="number" name="amount_allocated" min="1" max="<?php echo $gettotalnet_balance;?>" data-validate-minmax="" id="amount_allocated" required class="form-control col-md-8 col-xs-12">
</div>
<div class="row form-group">
<label class="control-label col-md-3">Description/Remarks</label>
<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks"></textarea>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" style="margin-right:3px;" class="btn btn-success" name="sbmitbtn" value="Submit">
<button class="btn btn-primary col-md-1" style="margin-right:3px;" type="reset">Reset</button>
<button class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
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
<span class="info-box-number">Fund Allocated To PZA</span>
<span class="info-box-number" style="color: blue;">

<?php
echo number_format($selectqry_pza->row('pza_amount'),2);
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
echo number_format($selectqry_hoa->row('amount_allocated'),2);
?>
<br>
</span>
<small class="info-box-number">

<?php 
$x = $total_received_amount;
$y = $total_hoa_amount * 100;
$z = $y/$x;
echo round($z)."%";
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
<span class="info-box-number">Balance Available At PZA</span>
<span class="info-box-number" style="color: red;">

<?php
$pza_balance_nf= number_format($pza_balance,2);
echo $pza_balance_nf;
?>

 <br>
</span>
<small class="info-box-number">

<?php 
$x = $total_received_amount;
$y = $pza_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>

</small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>


</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Head Wise Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Head Wise Zakat Fund Allocation</button>
</div>
</div>


<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Summary Of Un-Spent Balance From Districts</h3> <small>For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> </small>
</div>
<!-- /.card-header -->

<div class="card-body">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
<thead>
<tr role="row">
<th width="30" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S #: activate to sort column descending">S #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Zakat Head</th>
<th width="60" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Year: activate to sort column ascending">Year</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Inst: activate to sort column ascending">Inst</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Fund: activate to sort column ascending">Fund</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Disbursement: activate to sort column ascending">Disbursement</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Balance</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Action</th>

</tr>
</thead>
<tbody>



<tr role="row" class="odd">
<td tabindex="0" class="sorting_1">1</td>
<td>Health Care (Provincial Level)</td>
<td><?php echo $getfinancial_year;?></td>
<td><?php echo $getfinancial_installment;?></td>
<td>
<?php
echo number_format($get_hc_amount_allocated,2);
?>
</td>
<td>

<?php
$getfinancialdata_disb = $this->db->select_sum('payment_amount')->from('hospital_payment')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)->get();
$get_hc_amount_allocated_disb = $getfinancialdata_disb->row('payment_amount');
echo number_format($get_hc_amount_allocated_disb,2);
?>

</td>
<td>
<?php
$get_total_balance_hc = $get_hc_amount_allocated - $get_hc_amount_allocated_disb;
echo number_format($get_total_balance_hc,2);
?>
</td>
<td>


<?php
if($get_hc_amount_allocated_disb == 0)
{
?>
<a href="#" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal" data-target=".hc-example-modal-lg"></a>
<?php
}
else
{
?>
<a class="fa fa-edit btn btn-success btn-sm"></a>
<?php	
}
?>

</td>
</tr>

<tr role="row" class="odd">


<td tabindex="0" class="sorting_1">2</td>
<td>Special Health Care Program</td>
<td><?php echo $getfinancial_year;?></td>
<td><?php echo $getfinancial_installment;?></td>
<td>
<?php
$getfinancialdata_shcp = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Special Health Care Program')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_shc_amount_allocated = $getfinancialdata_shcp->row('amount_allocated');
echo number_format($get_shc_amount_allocated,2);
?>
</td>
<td>

<?php
$getfinancialdata_shcp_disp = $this->db->select_sum('amount')->from('special_health_fund')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_shc_amount_allocated_disb = $getfinancialdata_shcp_disp->row('amount');
echo number_format($get_shc_amount_allocated_disb,2);
?>


</td>
<td>

<?php
$get_total_balance_shc = $get_shc_amount_allocated - $get_shc_amount_allocated_disb;
echo number_format($get_total_balance_shc,2);
?>

</td>
<td>
<?php
if($get_shc_amount_allocated_disb == 0)
{
?>
<a href="#" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal" data-target=".shc_modal_form"></a>
<?php
}
else
{
?>
<a class="fa fa-edit btn btn-success btn-sm"></a>
<?php 
}
?>
</td>
</tr>



<tr role="row" class="odd">
<td tabindex="0" class="sorting_1">3</td>
<td>Administrative Expenditure (Salaries of Zakat Paid Staff &amp; Allowance of Chairmen, LZCs)</td>
<td><?php echo $getfinancial_year;?></td>
<td><?php echo $getfinancial_installment;?></td>
<td>

<?php
$getfinancialdata_ae = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Adminnistrative_Expenses')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_ae_amount_allocated = $getfinancialdata_ae->row('amount_allocated');
echo number_format($get_ae_amount_allocated,2);
?>

</td>
<td>

<?php
$getfinancialdata_ae_disb = $this->db->select_sum('admin_expns')->from('district_payment')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_AE_amount_allocated_disb = $getfinancialdata_ae_disb->row('admin_expns');
echo number_format($get_AE_amount_allocated_disb,2);
?>


</td>
<td>

<?php
$get_total_balance_ae = $get_ae_amount_allocated - $get_AE_amount_allocated_disb;
echo number_format($get_total_balance_ae,2);
?>

</td>
<td>
<?php
if($get_AE_amount_allocated_disb == 0)
{
?>
<a href="#" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal" data-target=".AE_modal_form"></a>
<?php
}
else
{
?>
<a class="fa fa-edit btn btn-success btn-sm"></a>
<?php 
}
?>
</td>
</tr>


<tr role="row" class="odd">
<td tabindex="0" class="sorting_1">4</td>
<td>Regular Zakat Heads</td>
<td><?php echo $getfinancial_year;?></td>
<td><?php echo $getfinancial_installment;?></td>
<td>

<?php
$getfinancialdata_rzf = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Regular Zakat Fund')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_rzf_amount_allocated = $getfinancialdata_rzf->row('amount_allocated');
echo number_format($get_rzf_amount_allocated,2);
?>

</td>
<td>

<?php
$getfinancialdata_ga_disb = $this->db->select_sum('GA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_ga_amount_allocated_disb = $getfinancialdata_ga_disb->row('GA');

$getfinancialdata_ma_disb = $this->db->select_sum('MA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_ma_amount_allocated_disb = $getfinancialdata_ma_disb->row('MA');

$getfinancialdata_dm_disb = $this->db->select_sum('DM')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_dm_amount_allocated_disb = $getfinancialdata_dm_disb->row('DM');

$getfinancialdata_hc_disb = $this->db->select_sum('HC')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_hc_amount_allocated_disb = $getfinancialdata_hc_disb->row('HC');

$getfinancialdata_esa_disb = $this->db->select_sum('ESA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_esa_amount_allocated_disb = $getfinancialdata_esa_disb->row('ESA');

$getfinancialdata_esp_disb = $this->db->select_sum('ESP')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_esp_amount_allocated_disb = $getfinancialdata_esp_disb->row('ESP');

$total_rzf_disbvalue = $get_ga_amount_allocated_disb + $get_ma_amount_allocated_disb + $get_dm_amount_allocated_disb + $get_hc_amount_allocated_disb + $get_esa_amount_allocated_disb + $get_esp_amount_allocated_disb;

echo number_format($total_rzf_disbvalue,2);

?>


</td>
<td>
<?php
$get_rzf_balancevalue = $get_rzf_amount_allocated - $total_rzf_disbvalue;
echo number_format($get_rzf_balancevalue,2);
?>

</td>
<td>


<?php
if($total_rzf_disbvalue == 0)
{
?>
<a href="#" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal" data-target=".RZF_modal_form"></a>
<?php
}
else
{
?>
<a class="fa fa-edit btn btn-success btn-sm"></a>
<?php 
}
?>

</td>
</tr>





<tr role="row" class="odd">
<td tabindex="0" class="sorting_1">5</td>
<td>Natural Calamity Fund</td>
<td><?php echo $getfinancial_year;?></td>
<td><?php echo $getfinancial_installment;?></td>
<td>

<?php
$get_ncf_fund_query = $this->db->select('*')->from('head_wise_fund')
->where('account_head','Natural Calamity Fund')
->where('financial_year',$getfinancial_year)
->where('installment',$getfinancial_installment)
->get();
$get_ncf_amount_allocated = $get_ncf_fund_query->row('amount_allocated');
 echo number_format($get_ncf_amount_allocated,2);
?>
</td>
<td>

<?php
$getfinancialdata_ga_disb = $this->db->select_sum('GA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_ga_amount_allocated_disb = $getfinancialdata_ga_disb->row('GA');

$getfinancialdata_ma_disb = $this->db->select_sum('MA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_ma_amount_allocated_disb = $getfinancialdata_ma_disb->row('MA');

$getfinancialdata_dm_disb = $this->db->select_sum('DM')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_dm_amount_allocated_disb = $getfinancialdata_dm_disb->row('DM');

$getfinancialdata_hc_disb = $this->db->select_sum('HC')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_hc_amount_allocated_disb = $getfinancialdata_hc_disb->row('HC');

$getfinancialdata_esa_disb = $this->db->select_sum('ESA')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_esa_amount_allocated_disb = $getfinancialdata_esa_disb->row('ESA');

$getfinancialdata_esp_disb = $this->db->select_sum('ESP')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$get_esp_amount_allocated_disb = $getfinancialdata_esp_disb->row('ESP');

$total_rzf_disbvalue = $get_ga_amount_allocated_disb + $get_ma_amount_allocated_disb + $get_dm_amount_allocated_disb + $get_hc_amount_allocated_disb + $get_esa_amount_allocated_disb + $get_esp_amount_allocated_disb;

$get_ncf_disb = $this->db->select_sum('amount_allocated')->from('natural_calamity_fund')
->where('financial_year',$getfinancial_year)->get();
$get_ncf_disbursement = $get_ncf_disb->row('amount_allocated');



echo number_format($get_ncf_disbursement,2);

?>


</td>
<td>
<?php
$get_ncf_balanc = $get_ncf_amount_allocated - $get_ncf_disbursement;
 echo number_format($get_ncf_balanc,2);
?>
</td>
<td>


<?php
if($get_ncf_disbursement == 0)
{
?>
<a href="#" class="fa fa-edit btn btn-success btn-sm" data-toggle="modal" data-target=".NCF_modal_form"></a>
<?php
}
else
{
?>
<a class="fa fa-edit btn btn-success btn-sm"></a>
<?php 
}
?>

</td>
</tr>




</tbody>

</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>
<!-- /.card-body -->
</div>

</div>







<!-- Main Form -->
<div class="row"><!-- 


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Summary Of Un-Spent Balance From Districts</h3> <small>For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> </small>
</div>

<div class="card-body">
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline" role="grid" aria-describedby="example1_info">
<thead>
<tr role="row">
<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="S #: activate to sort column descending">S #</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Zakat Head: activate to sort column ascending">Zakat Head</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Year: activate to sort column ascending">Year</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Inst: activate to sort column ascending">Inst</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Fund: activate to sort column ascending">Fund</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Disbursement: activate to sort column ascending">Disbursement</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending">Balance</th>
<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($gethead_wise_fund))
{
foreach($gethead_wise_fund as $gethead_wise_funds)
{
?>
<tr role="row" class="odd">
<td tabindex="0" class="sorting_1"><?php echo $i;?></td>
<td><?php echo $gethead_wise_funds['account_head'];?></td>
<td><?php echo $gethead_wise_funds['financial_year'];?></td>
<td><?php echo $gethead_wise_funds['installment'];?></td>
<td><?php echo $amount_allocated_get = $gethead_wise_funds['amount_allocated'];?></td>
<td>

<?php 
$selectqry_zakat = $this->db->select_sum('amount_in_Rs')->from('headwise_fund_disbursement')->where('zakat_headid',$gethead_wise_funds['id'])->get();
$total_zakathead_amount = $selectqry_zakat->row('amount_in_Rs');
echo number_format($selectqry_zakat->row('amount_in_Rs'),2); 
?>

</td>
<td>

<?php echo $amount_allocated_get - $total_zakathead_amount;?>

</td>
<td>

<?php echo date("d-m-Y",strtotime($gethead_wise_funds['add_date']));?>

</td>
</tr>

<?php 
$i++;
}
}
?>



</tbody>
</table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
</div>

</div>

 --></div>

</div>
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
