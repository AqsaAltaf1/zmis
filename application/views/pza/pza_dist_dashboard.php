<?php
error_reporting(0);
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


// Summary report quries
$ga_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Guzara Allowance')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$dist_ga_disbursement = $ga_query->row('amount_allocated');


$ma_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Marriage Assistance')->where('installment',$get_inst)
->where('year',$getfinancial_year)->get();
$dist_ma_disbursement = $ma_query->row('amount_allocated');

$hc_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Health Care (District Level)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$dist_hc_disbursement = $hc_query->row('amount_allocated');

$dm_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Deeni Madaris')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$dist_dm_disbursement = $dm_query->row('amount_allocated');



$esa_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (A)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$dist_esa_disbursement = $esa_query->row('amount_allocated');

$esp_query = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('account_head','Educational Stipend (P)')
->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$dist_esp_disbursement = $esp_query->row('amount_allocated');




/*Zakat Paid staff salary*/

$gs_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')
->where('district_id',$userid)->where('designation_id',1)
->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$gs_amount = $gs_amount_query->row('amount_allocated');

 $ao_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')
->where('district_id',$userid)->where('designation_id',2)
->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$ao_amount = $ao_amount_query->row('amount_allocated');

$auditor_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')
->where('district_id',$userid)->where('designation_id',3)
->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$auditor_amount = $auditor_amount_query->row('amount_allocated');

$chairman_amount_query = $this->db->select('*')->from('admin_expense_headwise_allocation')
->where('district_id',$userid)->where('designation_id',4)
->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$chairman_amount = $chairman_amount_query->row('amount_allocated');



$admin_expns_query = $this->db->select_sum('admin_expns')->from('district_payment')
->where('district_id',$userid)->where('installment',$get_inst)->where('financial_year',$getfinancial_year)->get();
$total_adminexp_amount = $admin_expns_query->row('admin_expns');


$admin_expns_disb_query = $this->db->select_sum('amount')->from('zakat_paid_staff_payment')
->where('district_id',$userid)->where('financial_year',$getfinancial_year)->get();
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

$total_amount_sum = $dist_ga_disbursement + $dist_ma_disbursement + $dist_dm_disbursement + $dist_hc_disbursement + $dist_esa_disbursement + $dist_esp_disbursement;



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



<div class="card-body">

<form method="post" action="<?php echo base_url(); ?>Pza_dist_profile/show_dist_dashboard" enctype="multipart/form-data" class="">
<div class="row"> 
<div class="col-12 col-sm-10 col-md-10">
<div class="form-group"> 
<select style="width:100%;" class="form-control" required="required" name="district_id">
<option value="">---Select District---</option>
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

<div class="col-12 col-sm-2 col-md-2">
<input type="submit" style="width:100%;" name="submit_year" value="Submit" class="btn btn-primary">

</div>
</div>
</form> 

</div>











</div>
</div>





<section class="content" id="fullcontents" style="display:none;">

<div class="container-fluid">

<div class="row mb-2">
<div class="col-sm-9">
<h3 class="m-0 text-dark">District <strong><?php echo $district_name;?></strong> Report - Year : <strong><?php echo $getfinancial_year;?></strong> Installment : <strong><?php echo $get_inst;?></strong></h3>
</div>
</div>

<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Zakat Fund</span>
<span class="info-box-number" style="color: blue;">
<?php
$dist_total_fund_query = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_fund_received = $dist_total_fund_query->row('total_fund');
$total_RZF_net = $total_fund_received - $total_adminexp_amount;

echo number_format($total_RZF_net,2); 


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
<span class="info-box-number">Regular Zakat Fund Disbursement</span>
<span class="info-box-number" style="color: green;"> 

<?php echo number_format($total_hc_amount,2);?>

<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_fund_received;
$y = $total_amount_sum * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Regular Zakat Fund Balance</span>
<span class="info-box-number" style="color: red;">
<?php
$net_balance =  $total_RZF_net - $total_hc_amount;
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




<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Administrative Expense</span>
<span class="info-box-number" style="color: blue;"> 

<?php
echo number_format($total_adminexp_amount,2);
?> 
<br>
 </span>
<small class="info-box-number">
<!-- <?php 
$x = $total_fund_received;
$y = $total_disbursement * 100;
$z = $y/$x;
echo round($z)."%";
?> -->100%
</small>
</div>
</div>
</div>




<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Admin Expense Disbursement</span>
<span class="info-box-number" style="color: green;">
<?php
echo number_format($total_adminexp_disb_amount,2);?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_adminexp_amount;
$y = $total_adminexp_disb_amount * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Admin Expense Balance</span>
<span class="info-box-number" style="color: red;">
<?php
$net_balance =  $total_adminexp_amount - $total_adminexp_disb_amount;
echo $net_balance_adminexp= number_format($net_balance,2);
?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_adminexp_amount;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Natural Calamity Fund</span>
<span class="info-box-number" style="color: blue;"> 

<?php
echo number_format($get_ncf_dist_allocation,2);
?> 
<br>
 </span>
<small class="info-box-number">
<!-- <?php 
$x = $total_fund_received;
$y = $total_disbursement * 100;
$z = $y/$x;
echo round($z)."%";
?> -->100%
</small>
</div>
</div>
</div>




<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Natural Calamity Fund Disbursement</span>
<span class="info-box-number" style="color: green;">
<?php
echo number_format($total_amount_sum,2);?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $get_ncf_dist_allocation;
$y = $total_amount_sum * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Natural Calamity Fund Balance</span>
<span class="info-box-number" style="color: red;">
<?php
$ncf_balance =  $get_ncf_dist_allocation - $total_amount_sum;
echo $ncf_balance_nf= number_format($ncf_balance,2);
?>
<br>
 </span>
<small class="info-box-number">
<?php 
$x = $total_adminexp_amount;
$y = $net_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>





</div>


<h3>Head Wise Zakat Fund Breakup of District <strong><?php echo $district_name ?></strong>  during  Year:<strong><?php echo $getfinancial_year;?></strong> and Inst:<strong><?php echo $get_inst; ?></strong></h3>

<div class="row">

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-hands-helping"></i></span>
<div class="info-box-content">
<span class="info-box-text">Guzara Allowance (NCF)</span>
<span class="info-box-number">
<?php

$total_GA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_GA_received = $total_GA_fund->row('GA');
echo number_format($total_GA_received,2); 

$x = $total_fund_received;
$y = $total_GA_received * 100;
$z = $y/$x;

?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-restroom"></i></span>
<div class="info-box-content">
<span class="info-box-text">Marriage Assistance</span>
<span class="info-box-number">
<?php

$total_MA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_MA_received = $total_MA_fund->row('MA');
echo number_format($total_MA_received,2); 

$x = $total_fund_received;
$y = $total_MA_received * 100;
$z = $y/$x;

?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-hospital-user"></i></span>
<div class="info-box-content">
<span class="info-box-text">District Health Care</span>
<span class="info-box-number">
<?php
$total_HC_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_HC_received = $total_HC_fund->row('HC');
echo number_format($total_HC_received,2); 
$x = $total_fund_received;
$y = $total_HC_received * 100;
$z = $y/$x;



?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-mosque"></i></span>
<div class="info-box-content">
<span class="info-box-text">Deeni Madaris</span>
<span class="info-box-number">
<?php

$total_DM_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_DM_received = $total_DM_fund->row('DM');
echo number_format($total_DM_received,2); 

$x = $total_fund_received;
$y = $total_DM_received * 100;
$z = $y/$x;


?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>
<!-- /.col -->

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-school"></i></i></span>
<div class="info-box-content">
<span class="info-box-text">Educational Stipend(A)</span>
<span class="info-box-number">
<?php

$total_ESA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_ESA_received = $total_ESA_fund->row('ESA');
echo number_format($total_ESA_received,2); 
$x = $total_fund_received;
$y = $total_ESA_received * 100;
$z = $y/$x;

?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-university"></i></span>
<div class="info-box-content">
<span class="info-box-text">Educational Stipend(P)</span>
<span class="info-box-number">
<?php

$total_ESP_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_ESP_received = $total_DM_fund->row('ESP');
echo number_format($total_ESP_received,2); 
$x = $total_fund_received;
$y = $total_ESP_received * 100;
$z = $y/$x;

?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-users-cog"></i></span>
<div class="info-box-content">
<span class="info-box-text">Administrative Expen</span>
<span class="info-box-number">
<?php

$total_admin_expns_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_admin_expns_received = $total_DM_fund->row('admin_expns');
echo number_format($total_admin_expns_received,2); 

$x = $total_fund_received;
$y = $total_admin_expns_received * 100;
$z = $y/$x;

?>

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of total fund
</span>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-male"></i></span>
<div class="info-box-content">
<span class="info-box-text">Natural Calamity Fund</span>
<span class="info-box-number">
<?php echo number_format($get_ncf_dist_allocation,1); ?>

</span>
<div class="progress">
<div class="progress-bar" style="width: 100%"></div>
</div>
<span class="progress-description">
Lum sum Amount
</span>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h3 class="card-title" style="line-height:35px;">Fund Disbursement Summary of District <strong><?php echo $district_name ?></strong>  during  Financial Year : <strong><?php echo $getfinancial_year;?></strong> </h3>
<a target="_blank" style="color:#fff;" class="btn btn-sm btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div class="card-body">

<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Head of Account</th>
<th>District Allocation</th>
<th>District Disbursement</th>
<th>Balance</th>
</tr>
</thead>
<tbody>

<tr>
<td>1</td>
<td>Guzara Allowance</td>
<td>

  <?php
  $total_GA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_GA_received = $total_GA_fund->row('GA');
echo number_format($total_GA_received,2);  


  ?> 

</td>
<td> 
<?php

echo number_format($dist_ga_disbursement,2);

/*$ga_disb_query = $this->db->select_sum('payment_amount')->from('guzara_allowance_mustahiqeen_payments')
->where('district_id',$userid)->where('installment',$get_inst)->where('financial_Year',$getfinancial_year)->get();
$ga_disb_amount = $ga_disb_query->row('payment_amount');
echo number_format($ga_disb_amount,2);*/
?>
</td>
<td>

<?php

$ga_balance = ($total_GA_received - $dist_ga_disbursement);
echo $dist_ga_balance = number_format($ga_balance,2);

?>

</td>
</tr>

<tr>
<td>2</td>
<td>Marriage Assistance</td>
<td><?php 

$total_MA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_MA_received = $total_GA_fund->row('MA');
 echo number_format($total_MA_received,2);
 number_format($dist_ma_disbursement,2);

?></td>
<td> 


<?php
echo number_format($dist_ma_disbursement,2);
?>


</td>
<td>

<?php
$ma_balance = ($total_MA_received - $dist_ma_disbursement);
echo $dist_ma_balance = number_format($ma_balance,2);


?>


</td>
</tr>

<tr>
<td>3</td>
<td>Educational Stipend(A)</td>
<td><?php 
$total_ESA_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_ESA_received = $total_ESA_fund->row('ESA');
 echo number_format($total_ESA_received,2);

?></td>
<td>
<?php
echo number_format($dist_esa_disbursement,2);
?>
</td>
<td>

<?php
$esa_balance = ($total_ESA_received - $dist_esa_disbursement);
echo $dist_esa_balance = number_format($esa_balance,2);
?>


</td>
</tr>

<tr>
<td>4</td>
<td>Educational Stipend(P)</td>
<td><?php 

$total_ESP_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_ESP_received = $total_ESP_fund->row('ESP');
echo number_format($total_ESP_received,2);

?></td>
<td> 

<?php
echo number_format($dist_esp_disbursement,2);
?>



</td>
<td>

<?php
$esp_balance = ($total_ESP_received - $dist_esp_disbursement );
echo $dist_esp_balance = number_format($esp_balance,2);
?>


</td>
</tr>

<tr>
<td>5</td>
<td>Health Care (District)</td>
<td>
<?php
$total_HC_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_HC_received = $total_HC_fund->row('HC');
echo number_format($total_HC_received,2);


?></td>
<td>
<?php 
echo number_format($dist_hc_disbursement,2);

?>

</td>
<td>
<?php 

$hc_balance = ($total_HC_received - $dist_hc_disbursement );
echo $dist_hc_balance = number_format($hc_balance,2);
?>
</td>
</tr>

<tr>
<td>6</td>
<td>Deeni Madaris</td>
<td><?php 

$total_DM_fund = $this->db->select('*')->from('district_payment')->where('district_id',$userid)->where('financial_year',$getfinancial_year)->where('installment',$get_inst)->get();
$total_DM_received = $total_DM_fund->row('DM');
echo number_format($total_DM_received,2);

?></td>
<td>

<?php
echo number_format($dist_dm_disbursement,2);
?>


</td>
<td>

<?php
$dm_balance = ($total_DM_received - $dist_dm_disbursement);
echo $dist_dm_balance = number_format($dm_balance,2);
?>


</td>
</tr>
<tr style="font-weight: bold;">
<td>7</td>
<td >Sub-Total-A</td>
<td>
<?php 

$total_rzf = $total_GA_received + $total_MA_received + $total_DM_received + $total_ESA_received + $total_ESP_received + $total_HC_received;
echo $dist_rzf  = number_format($total_rzf,2);
?></td>
<td>
<?php
$rzf_disbursement = $dist_ga_disbursement + $dist_ma_disbursement + $dist_dm_disbursement + $dist_esa_disbursement + $dist_esp_disbursement + $dist_hc_disbursement;
echo $dist_rzf_disbursement  = number_format($rzf_disbursement,2);
?>
</td>
<td>

<?php
$rzf_balance = $ga_balance + $ma_balance + $esa_balance + $esp_balance + $dm_balance + $hc_balance;
echo $dist_rzf_balance  = number_format($rzf_balance,2);
?>


</td>
</tr>

<tr>
<td>8</td>
<td>CH-LZC Allowance</td>
<td> <?php echo number_format($chairman_amount,2);?></td>
<td>-</td>
<td>-</td>
</tr>

<tr>
<td>9</td>
<td>Salary (Audit Officer)</td>
<td > 
<?php echo number_format($ao_amount,2);?>

</td>
<td><?php echo number_format($total_auditstaff_ao_amount,2);?></td>
<td>

<?php

$ao_balance = $ao_amount - $total_auditstaff_ao_amount;

echo number_format($ao_balance,2);

?>

</td>
</tr>

<tr>
<td>10</td>
<td>Salary (Group Secretary)</td>

<td><?php echo number_format($gs_amount,2);?></td>
<td><?php echo number_format($total_auditstaff_gs_amount,2);?></td>
<td><?php  
$gs_balance = $gs_amount - $total_auditstaff_gs_amount;
echo number_format($gs_balance,2);
 ?></td>
</tr>




<tr>
<td>11</td>
<td>Salary (Auditor)</td>

<td><?php echo number_format($auditor_amount,2);?></td>
<td><?php echo number_format($total_auditstaff_aud_amount,2);?></td>
<td>
<?php  
$auditor_balance = $auditor_amount - $total_auditstaff_aud_amount;
echo number_format($auditor_balance,2);
 ?>
</td>
</tr>


<tr style="font-weight: bold;">
<td>12</td>
<td >Sub-Total-B</td>
<td><?php echo number_format($total_adminexp_amount,2);?>
</td>
<td><?php 
$total_admin_expense = $total_auditstaff_gs_amount + $total_auditstaff_ao_amount + $total_auditstaff_aud_amount;

echo number_format($total_admin_expense,2);
?>
</td>
<td>
<?php
$admin_expense_balance = $ao_balance + $auditor_balance + $gs_balance;
echo number_format($admin_expense_balance,2);
?>

</td>
</tr>
<tr style="font-weight: bold;">
<td>13</td>
<td>Grand-Total A+B</td>
<td>

<?php
$total_allocated_amount = $total_adminexp_amount + $total_rzf;
echo number_format($total_allocated_amount,2);
?>

</td>
<td>
<?php



$total_disbursed_amount = $rzf_disbursement + $total_admin_expense;
echo number_format($total_disbursed_amount,2);





?>
</td>
<td>
<?php
$total_balance =  $total_allocated_amount - $total_disbursed_amount;
echo number_format($total_balance,2);
?>

</td>
</tr>
</tbody>
</table>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<div class="card">
<div class="card-header">
<h3 class="card-title">LZCs Wise Summary of Zakat Fund Disbursement of District <strong><?php echo $district_name ?></strong>  during  Financial Year:<strong><?php echo $getfinancial_year;?></strong></h3>




</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>LZC Name</th>
<th>GA</th>
<th>MA</th>
<th>ChLZC</th>
<th>Total</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_all_lzclist))
{
foreach($get_all_lzclist as $getdistricts)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistricts['lzc_name']; ?></td>
<td>
<?php
$runpzf_query_hoa = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Guzara Allowance')
->where('year',$getfinancial_year)
->where('installment',$get_inst)
->where('lzc_institution_madrasa',$getdistricts['id'])
->get();
$getGA_unspent = $runpzf_query_hoa->row('amount_allocated');
echo number_format($runpzf_query_hoa->row('amount_allocated'),2);
?>
</td>
<td>
<?php
$runpzf_query_ma = $this->db->select_sum('amount_allocated')->from('dist_head_wise_fund')
->where('district_id',$userid)
->where('account_head','Marriage Assistance')
->where('year',$getfinancial_year)
->where('installment',$get_inst)
->where('lzc_institution_madrasa',$getdistricts['id'])
->get();
$getMA_unspent = $runpzf_query_ma->row('amount_allocated');
echo number_format($runpzf_query_ma->row('amount_allocated'),2);
?>
</td>
<td>--
<?php
// $select_LZC_chr_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','LZC chairman Allow')->where('financial_year',$getfinancial_year)->get();
// $getLZC_chr_unspent= $select_LZC_chr_unspent->row('payment_received');
// echo number_format($select_LZC_chr_unspent->row('payment_received'),1);
//echo $this->db->last_query();

?>
</td>
<td>
<?php
$total_unspent = $getGA_unspent + $getMA_unspent;
echo number_format($total_unspent,2);
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
