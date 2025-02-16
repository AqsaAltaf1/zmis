<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$selectqry_pza = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzareceived_amount = $selectqry_pza->row('pza_amount');
$total_received_amountpza= number_format($total_pzareceived_amount,2);

$selectqry_zakat = $this->db->select('*')->from('head_wise_fund')->where('account_head','Regular Zakat Fund')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$zakatamount_allocated = $selectqry_zakat->row('amount_allocated');
$total_RZF = $selectqry_zakat->row('amount_allocated');
$RZF_nf = number_format($total_RZF);



$selectqry_zakatVTP = $this->db->select('*')->from('head_wise_fund')->where('account_head','Vocational Training Program')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_VTI = $selectqry_zakatVTP->row('amount_allocated');
$VTI_nf = number_format($total_VTI);

$selectqry_popu = $this->db->select_sum('population')->from('district_users')->where('status',1)->get();
$total_population = $selectqry_popu->row('population');
$total_population_nf= number_format($total_population);
$total_population_nf;
$GA_percentage = $total_RZF * 0.68;
$MA_percentage = $total_RZF * 0.10;
$DM_percentage = $total_RZF * 0.08;
$ESA_percentage = $total_RZF * 0.04;
$ESP_percentage = $total_RZF * 0.04;
$HC_percentage = $total_RZF * 0.08;

$selectqry_GA = $this->db->select_sum('GA')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_GA_alloc = $selectqry_GA->row('GA');
$total_GA_alloc_nf= number_format($total_GA_alloc,2);

$runselectqry_MA = $this->db->select_sum('MA')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_MA_alloc = $runselectqry_MA->row('MA');
$total_MA_alloc_nf= number_format($total_MA_alloc,2);

$selectqry_DM = $this->db->select_sum('DM')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_DM_alloc = $selectqry_DM->row('DM');
$total_DM_alloc_nf= number_format($total_DM_alloc,2);

$selectqry_HC = $this->db->select_sum('HC')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_HC_alloc = $selectqry_HC->row('HC');
$total_HC_alloc_nf= number_format($total_HC_alloc,2);

$selectqry_ESA = $this->db->select_sum('ESA')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_ESA_alloc = $selectqry_ESA->row('ESA');
$total_ESA_alloc_nf= number_format($total_ESA_alloc,2);

$selectqry_ESP = $this->db->select_sum('ESP')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_ESP_alloc = $selectqry_ESP->row('ESP');
$total_ESP_alloc_nf= number_format($total_ESP_alloc,2);

// $selectqry_VTI = $this->db->select_sum('VTI')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
// $total_VTI_alloc = $selectqry_VTI->row('VTI');
// $total_VTI_alloc_nf= number_format($total_VTI_alloc,2);

$selectqry_admin_expns = $this->db->select_sum('admin_expns')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_admin_expns_alloc = $selectqry_admin_expns->row('admin_expns');
$total_admin_expns_alloc_nf= number_format($total_admin_expns_alloc,2);

$selectqry_total_fund = $this->db->select_sum('total_fund')->from('district_payment')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_fund_alloc = $selectqry_total_fund->row('total_fund');
 $total_fund_alloc_nf= number_format($total_fund_alloc,2);



// GA Percentage selection
$get_ga_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$ga_percent = $get_ga_percentage->row('ga_percentage');
// MA Percentage selection
$get_ma_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$ma_percent = $get_ma_percentage->row('ma_percentage');
// DM Percentage selection
$get_dm_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$dm_percent = $get_dm_percentage->row('dm_percentage');
// HC Percentage selection
$get_hc_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$hc_percent = $get_hc_percentage->row('hc_percentage');
// ESA Percentage selection
$get_esa_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$esa_percent = $get_esa_percentage->row('esa_percentage');
// ESP Percentage selection
$get_esp_percentage = $this->db->select('*')->from('year_installment')->where('financial_Year',$getfinancial_year)->where('installment',$getfinancial_installment)->where('status',1)->get();
$esp_percent = $get_esp_percentage->row('esp_percentage');


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
<h3 class="m-0 text-dark">Summary of PZA Zakat Allocation to District Allocation </h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">
<!-- <?php echo $year;?> and <?php echo $inst;?>  -->
<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

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
<div class="row">
<!-- <div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
<div class="info-box-content">
<span class="info-box-number">Total Population</span>
<span class="info-box-number" style="color: green; font-size: 15px;">
  Population: <h7 style="color: black; font-size: 13px;">20,912,243 </h7></span> 
 <span class="info-box-number" style="color: blue;">
  Total RZF: <h7 style="color: black; font-size: 13px;">692,000,000 </h7></span>
<small class="info-box-number"></small>
</div>

</div>

</div> -->
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-hands-helping"></i></span>
<div class="info-box-content">
<span class="info-box-number">Guzara Allowance</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">Amount: 
    <?php 

$ga_percent_amount = $ga_percent/100;
$GA_68 = $total_RZF * $ga_percent_amount;
echo $GA_nf = number_format($GA_68,1); 
?>
      
    </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse:<?php echo $total_GA_alloc_nf; ?></h7> <br>
  <h7 style="color: red; font-size: 15px;">Balance: <?php echo number_format($GA_68 - $total_GA_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-restroom"></i></span>
<div class="info-box-content">
<span class="info-box-number">Merriage Assistance</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">Amount :
   <?php 

$ma_percent_amount = $ma_percent/100;
$MA_12 = $total_RZF * $ma_percent_amount;
echo $MA_nf = number_format($MA_12,1); 

   ?>
     

   </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : 
    <?php echo $total_MA_alloc_nf; ?></h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($MA_12 - $total_MA_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-mosque"></i></span>
<div class="info-box-content">
<span class="info-box-number">Deeni Madaris</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Amount : 
<?php 
$dm_percent_amount = $dm_percent/100;
$DM_8 = $total_RZF * $dm_percent_amount;
echo $DM_nf = number_format($DM_8,1);  

?>
  
</h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : <?php echo $total_DM_alloc_nf; ?></h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($DM_8 - $total_DM_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-school"></i></span>
<div class="info-box-content">
<span class="info-box-number">Edu_Stipend (A)</span>
<span class="info-box-number">
<h7 style="color: green; font-size: 15px;">Amount: 
<?php 
$esa_percent_amount = $esa_percent/100;
$ESA_4 = $total_RZF * $esa_percent_amount;
echo $ESA_nf = number_format($ESA_4,1);  

?>
  
</h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : <?php echo $total_ESA_alloc_nf; ?></h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($ESA_4 - $total_ESA_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-university"></i></span>
<div class="info-box-content">
<span class="info-box-number">Edu_Stipend (P)</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">Amount: 
<?php 
$esp_percent_amount = $esp_percent/100;
$ESP_4 = $total_RZF * $esp_percent_amount;
echo $ESP_nf = number_format($ESP_4,1);  

?>
      

    </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : <?php echo $total_ESP_alloc_nf; ?></h7> <br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($ESP_4 - $total_ESP_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-hospital"></i></span>
<div class="info-box-content">
<span class="info-box-number">Health Care</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">Amount : 

  <?php 
$hc_percent_amount = $hc_percent/100;
$HC_4 = $total_RZF * $hc_percent_amount;
echo $HC_nf = number_format($HC_4,1);  

?>
      

    </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : <?php echo $total_HC_alloc_nf; ?></h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($HC_4 - $total_HC_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-user"></i></span>
<div class="info-box-content">
<span class="info-box-number">Admin Expenses</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">Amount: 

<?php 
$selectqry_zakatAE = $this->db->select('*')->from('head_wise_fund')->where('account_head','Adminnistrative_Expenses')->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_admin_expenses = $selectqry_zakatAE->row('amount_allocated');
$admin_expenses_nf = number_format($total_admin_expenses,1);
echo $admin_expenses_nf;

?>

      

    </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : <?php echo $total_admin_expns_alloc_nf; ?></h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($total_admin_expenses - $total_admin_expns_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-success"><i class="fas fa-box"></i></span>
<div class="info-box-content">
<span class="info-box-number">Total</span>
<span class="info-box-number">
  <h7 style="color: green; font-size: 15px;">RZF : 


    <?php 
    $total_rzf_AE = $total_RZF + $total_admin_expenses;

    echo number_format($total_rzf_AE,1);

    ?>
      

    </h7></span> 
 <span class="info-box-number" style="color: blue;">
  <h7 style="color: blue; font-size: 15px;"> Disburse : 


    <?php 

    echo $total_fund_alloc_nf; 

    ?>
      

    </h7><br>
  <h7 style="color: red; font-size: 15px;">Balance : <?php echo number_format($total_rzf_AE - $total_fund_alloc,2); ?></h7></span>
<small class="info-box-number"></small>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>
<!-- /.col -->
<!--  <div class="col-12 col-sm-6 col-md-2">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

<div class="info-box-content text_align">
<span class="info-box-text" >PZA Balance</span>
<span class="info-box-number">
  0.00
  0
  <small>%</small>
</span>
</div>
</div>
</div> -->

</div>


<!-- Nave bar row -->

<!-- <div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Head Wise Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Head Wise Zakat Fund Allocation</button>
</div>
</div> -->




<!-- Main Form -->
<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Population Based Zakat Fund Shares for KPK Districts (Provincial Level) For Current Financial Year <strong><?php echo $getfinancial_year;?></strong> and Installment <strong><?php echo $getfinancial_installment;?></strong> </h3>

<a target="_blank" href="<?php echo base_url(); ?>Pza_District_fund_allocation/pza_print_dist_payment" class="btn btn-sm btn-primary float-right">Print PZF Deposit Fund</a>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>District</th>  
<th>Population</th>
<!--<th>Ratio</th>-->
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ESA</th>
<th>ESP</th>
<th>HC</th> 
<th>AE</th>
<!-- <th>VTI</th> -->
<th>Total</th>
<th>Date</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_districts_payment))
{
foreach($get_districts_payment as $get_districts_payments)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php 
$district_id = $get_districts_payments['district_id']; 
$getdistrict_qry = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
echo $getdistname = $getdistrict_qry->row('district_name');

?></td>
<td>
<?php
echo $getdistname = $getdistrict_qry->row('population');
?>
</td>
<!--<td> 4</td>-->
<td><?php echo $get_districts_payments['GA'];?></td>
<td><?php echo $get_districts_payments['MA'];?></td>
<td><?php echo $get_districts_payments['DM'];?></td>
<td><?php echo $get_districts_payments['ESA'];?></td>
<td><?php echo $get_districts_payments['ESP'];?></td>
<td><?php echo $get_districts_payments['HC'];?></td>
<td><?php echo $get_districts_payments['admin_expns'];?></td>
<!-- <td><?php echo $get_districts_payments['VTI'];?></td> -->
<td><?php echo $get_districts_payments['total_fund'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_districts_payments['add_date']));?></td>
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

<?php include("include/footer.php");?>


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
