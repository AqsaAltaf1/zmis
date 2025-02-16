<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

/*$guzara_allowance_query = $this->db->select_sum('amount_allocated')
->from('dist_head_wise_fund')->where('district_id',$this->session->userdata('id'))
->where('account_head','Guzara Allowance')->where('installment',$get_inst)->where('year',$getfinancial_year)->get();
$total_guzara_allowance = $guzara_allowance_query->row('amount_allocated');*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('district/include/title');?>
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


<?php $this->load->view('district/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('district/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<?php $this->load->view('district/include/user_manue');?>




<?php $this->load->view('district/include/sidebar');?>

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
<div class="col-sm-9">
<h3 class="m-0 text-dark">Welcome to District <strong><?php echo $district_name;?></strong> Dashboard</h3>



</div><!-- /.col -->

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
<span class="info-box-number">Zakat Fund</span>
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
<span class="info-box-number">RZF Disbursement</span>
<span class="info-box-number" style="color: green;"> 

4500









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









<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">RZF Balance</span>
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




<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Admin Expen</span>
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




<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Admin Expense Balance</span>
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



<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-number">Admin Expense Balance</span>
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

<h3>Head Wise Zakat Fund Breakup of District <strong><?php echo $district_name ?></strong>  during  Year:<strong><?php echo $getfinancial_year;?></strong> and Inst:<strong><?php echo $get_inst; ?></strong></h3>
<!-- Info Boxes -->
<div class="row">

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">Guzara Allowance</span>
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
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
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
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box bg-danger">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">District Health Care</span>
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
<div class="info-box bg-warning">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">Deeni Madaris</span>
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
<div class="info-box bg-success">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
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
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
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
<div class="info-box bg-danger">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
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
<div class="info-box bg-warning">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">Chairman Allowance</span>
<span class="info-box-number">41,410</span>
<div class="progress">
<div class="progress-bar" style="width: 70%"></div>
</div>
<span class="progress-description">
30% of zakat fund
</span>
</div>
</div>
</div>
</div>

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Fund Disbursement Summary of District <strong><?php echo $district_name ?></strong>  during  Financial Year:<strong><?php echo $getfinancial_year;?></strong> </h3>

 <!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->

<div class="card-body">

<!-- Search form 1-->
<div class="row"></div>
<table id="example" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Head of Account</th>
<th>Allocation</th>
<th>Disbursement</th>
<th>Balance</th>
</tr>
</thead>
<tbody>

<tr>
<td>1</td>
<td>Guzara Allowance</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr>
<td>2</td>
<td>Marriage Assistance</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr>
<td>3</td>
<td>Educational Stipend(A)</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr>
<td>4</td>
<td>Educational Stipend(P)</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr>
<td>5</td>
<td>Health Care (District)</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>
<tr>
<td>6</td>
<td>Deeni Madaris</td>
<td>Win 95+</td>
<td>4</td>
<td>X</td>
</tr>
<tr style="font-weight: bold;">
<td>7</td>
<td >Sub-Total-A</td>
<td>Win 95+</td>
<td>4</td>
<td>X</td>
</tr>

<tr>
<td>8</td>
<td>CH-LZC Allowance</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr>
<td>9</td>
<td>Salary (Audit Staff)</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>
<tr>
<td>10</td>
<td>Salary (Group Secretary)</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
</tr>

<tr style="font-weight: bold;">
<td>11</td>
<td >Sub-Total-B</td>
<td>Win 95+</td>
<td>4</td>
<td>X</td>
</tr>
<tr style="font-weight: bold;">
<td>12</td>
<td>Grand-Total A+B</td>
<td>Win 95+</td>
<td>4</td>
<td>X</td>
</tr>
</tbody>
</table>

	
</div>
<!-- /.card-body -->
</div>

</div>
<!-- /.row -->

<!-- Second Table Summary of Un-Spent Balance -->
<div class="row">

<div class="card col-12 col-md-12 col-sm-6">
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
$runpzf_query_hoa = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Guzara Allowance')->where('financial_year',$getfinancial_year)->get();
$getGA_unspent = $runpzf_query_hoa->row('payment_received');
echo number_format($runpzf_query_hoa->row('payment_received'),1);
//echo $this->db->last_query();
?>


</td>

<!--<td>
<?php
$select_DM_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Deeni Madaris')->where('financial_year',$getfinancial_year)->get();
$getDM_unspent= $select_DM_unspent->row('payment_received');
//echo number_format($select_DM_unspent->row('payment_received'),1);
//echo $this->db->last_query();
?>
</td>-->




<!--<td>

<?php
$select_ESA_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (A)')->where('financial_year',$getfinancial_year)->get();
$getESA_unspent= $select_ESA_unspent->row('payment_received');
//echo number_format($select_ESA_unspent->row('payment_received'),1);
//echo $this->db->last_query();
?>

</td>-->



<!--<td>

<?php
$select_ESP_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Educational Stipend (P)')->where('financial_year',$getfinancial_year)->get();
$getESP_unspent= $select_ESP_unspent->row('payment_received');
//echo number_format($select_ESP_unspent->row('payment_received'),1);
//echo $this->db->last_query();
?>

</td>-->



<td>

<?php
$select_HC_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','Health Care (District Level)')->where('financial_year',$getfinancial_year)->get();
$getHC_unspent= $select_HC_unspent->row('payment_received');
//echo number_format($select_HC_unspent->row('payment_received'),1);
//echo $this->db->last_query();
?>
</td>

<td>
<?php
$select_LZC_chr_unspent = $this->db->select('*')->from('pzf_fund')->where('district_hospital_id',$getdistricts['id'])->where('account_head','LZC chairman Allow')->where('financial_year',$getfinancial_year)->get();
$getLZC_chr_unspent= $select_LZC_chr_unspent->row('payment_received');
echo number_format($select_LZC_chr_unspent->row('payment_received'),1);
//echo $this->db->last_query();
?>
</td>

<td>
<?php
// echo $total_unspent = $GA_unspent + $MA_unspent+$DF_unspent +$ESA_unspent+$ESP_unspent +$DM_unspent +$EST_unspent +$HC_unspent +$LZF_unspent +$DZF_unspent+$AE_unspent+$LZC_chr_unspent;
?>

</td>
</tr>
<?php
$i++;
}
}
?>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
</tbody>
<!-- update_pzf_fund.php?pid=<?php echo $getdata['id'];?> -->

<!-- <?php
$i = 1;
$selectqry = "SELECT * FROM pzf_fund order by id DESC";
$runselectqry = mysql_query($selectqry);
while($getdata = mysql_fetch_array($runselectqry))
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdata['payment_received'];?></td>
<td><?php echo $getdata['check_no'];?></td>
<td><?php echo $getdata['check_date'];?></td>
<td><?php echo $getdata['payment_rec_from'];?></td>
<td>

<?php 
if($getdata['payment_rec_from']=="Hospital")
{
$district_hospital_id =  $getdata['district_hospital_id'];
$selecthostpitalsqry = "SELECT * FROM hospital_users WHERE id = '".$district_hospital_id."'";
$runhostpicalqry = mysql_query($selecthostpitalsqry);
$fetchhostpitalqry = mysql_fetch_array($runhostpicalqry);
echo $hospt_name =  $fetchhostpitalqry['name'];
}
else if($getdata['payment_rec_from']=="District")
{

$district_hospital_id =  $getdata['district_hospital_id'];
$select_district_qry = "SELECT * FROM district_users WHERE id = '".$district_hospital_id."'";
$run_district_qry = mysql_query($select_district_qry);
$fetch_district_qry = mysql_fetch_array($run_district_qry);
echo $dist_name =  $fetch_district_qry['district_name'];

}
?>  
</td>
<td><?php echo $getdata['account_head'];?></td>
<td><?php echo date("F j, Y",strtotime($getdata['add_date']));?></td>
<td>
<a href="update_pzf_fund.php?pid=<?php echo $getdata['id'];?>"><button type="submit" name="update" class="fa fa-edit btn btn-success" target="_blank"></button></a>
</td>
</tr>

<?php
$i++;
}
?> --> 
<!--  <tfoot>
<tr>
<th>1</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot> -->
</table>
</div>
<!-- /.card-body -->
</div>
</div>



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
