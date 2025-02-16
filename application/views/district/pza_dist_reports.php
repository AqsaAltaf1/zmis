<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

// Count all entries in GA table
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$get_all_mustahiq = $this->db->get()->num_rows();


$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Widow');

$get_widows = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Widow');
$get_paid_widows = $this->db->get()->num_rows();

$x = $get_all_mustahiq;
$y = $get_widows *100;
$z = $y/$x;


$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Orphan');

 $get_orphan = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Orphan');
$get_paid_orphan = $this->db->get()->num_rows();

$a = $get_all_mustahiq;
$b = $get_orphan *100;
$c = $y/$x;

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Poor');

 $get_poor = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Poor');
$get_paid_poor = $this->db->get()->num_rows();

$d = $get_all_mustahiq;
$e = $get_poor *100;
$f = $y/$x;

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Disable');

 $get_disable = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Disable');
$get_paid_disable = $this->db->get()->num_rows();

$g = $get_all_mustahiq;
$h = $get_disable *100;
$i = $y/$x;



// Guzara Allowance Mustahiqeen
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_ga_mustahiq = $this->db->get()->num_rows();


// Get Merriage Assisatance Mustahiqeen
$this->db->select("*");
$this->db->from("ma_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_ma_mustahiq = $this->db->get()->num_rows();

// Get Deeni Madaris Mustahiqeen
$this->db->select("*");
$this->db->from("dm_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_dm_mustahiq = $this->db->get()->num_rows();


// Get Educational  Mustahiqeen
$this->db->select("*");
$this->db->from("esa_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_esa_mustahiq = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("esp_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_esp_mustahiq = $this->db->get()->num_rows();



// Get Health Care  Mustahiqeen
$this->db->select("*");
$this->db->from("hc_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_hc_mustahiq = $this->db->get()->num_rows();




// 3 or more Adult Un-Married Gilrs details

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','3 or Above Adult (Un-married)');

$get_unmarried_3 = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','2 Adult (Un-married)');

$get_unmarried_2 = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','1 Adult (Un-married)');

$get_unmarried_1 = $this->db->get()->num_rows();

// $get_female_widow_percentage = ($get_adult_unmarried * 100)/$get_female;



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


<?php // $this->load->view('pza/include/user_manue');?>

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

<div>


<div class="row">

<!-- Sales Chart Canvas -->
<div class="card card-primary col-md-6 col-sm-3 col-lg-6">
<div class="card-header">
<h3 class="card-title">Head Wise Zakat Applicants Details For The Year:<strong><?php echo $getfinancial_year; ?></strong> </h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
</button>

</div>
</div>
<div class="card-body">
<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
<!-- /.card-body -->
</div>

<div class=" card card-success col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">Male/Female/Un-Married Orphan/Widows Details</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
</button>

</div>
</div>
<p class="text-center">
<strong> <h3 class="text-center">Guzara Allowance Applicants Summary</h3> </strong>
</p>

<?php

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Male');

$get_male = $this->db->get()->num_rows();

$get_male_percentage = ($get_male * 100)/$get_all_mustahiq;
// Female Percentage
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');

$get_female = $this->db->get()->num_rows();

$get_female_percentage = ($get_female * 100)/$get_all_mustahiq;

// Un-Married Female
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status','Un-Married');

$get_female_unmarried = $this->db->get()->num_rows();

$get_female_unmarried_percentage = ($get_female_unmarried * 100)/$get_female;

// Un-Married Female
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status','Un-Married');
$this->db->where('category','Orphan');

$get_female_unmarried_orphan = $this->db->get()->num_rows();

$get_female_unmarried_orphan_percentage = ($get_female_unmarried_orphan * 100)/$get_female;


$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status','Married');
$this->db->where('category','Widow');

$get_female_widow = $this->db->get()->num_rows();

$get_female_widow_percentage = ($get_female_widow * 100)/$get_female;



?>

<div class="progress-group">
Male Guzara Allowance Applicants
<span class="float-right"><b><?php echo $get_male;?></b>/<?php echo $get_all_mustahiq;?></span>
<div class="progress progress-lg">
<div class="progress-bar bg-primary" style="width: <?php echo round($get_male_percentage)."%" ;?>"><strong><?php echo round($get_male_percentage)."%";?> </strong></div> <strong>of Total Mustahiqeen</strong>
</div>
</div>
<!-- /.progress-group -->

<div class="progress-group">
Female Guzara Allowance Applicants
<span class="float-right"><b><?php echo $get_female;?></b>/<?php echo $get_all_mustahiq;?></span>
<div class="progress progress-lg">
<div class="progress-bar bg-danger" style="width: <?php echo round($get_female_percentage)."%" ;?>"><strong><?php echo round($get_female_percentage)."%";?> </strong></div> <strong>of Total Mustahiqeen</strong>
</div>
</div>

<!-- /.progress-group -->
<div class="progress-group">
Female Un-Married Applicants
<span class="float-right"><b><?php echo $get_female_unmarried;?></b>/<?php echo $get_female;?></span>
<div class="progress progress-lg">
<div class="progress-bar bg-success" style="width: <?php echo round($get_female_unmarried_percentage)."%" ;?>"><strong><?php echo round($get_female_unmarried_percentage)."%";?> </strong></div> <strong>of Total Female</strong>
</div>
</div>



<!-- /.progress-group -->
<div class="progress-group">
Female Un-married Orphan Applicants
<span class="float-right"><b><?php echo $get_female_unmarried_orphan;?></b>/<?php echo $get_female_unmarried;?></span>
<div class="progress progress-lg">
<div class="progress-bar bg-info" style="width: <?php echo round($get_female_unmarried_orphan_percentage)."%" ;?>"><strong><?php echo round($get_female_unmarried_orphan_percentage)."%";?> </strong></div> <strong>of Total Un-married Female</strong>
</div>
</div>
<!-- /.progress-group -->

<div class="progress-group">
Female Widows Applicants
<span class="float-right"><b><?php echo $get_female_widow;?></b>/<?php echo $get_female;?></span>
<div class="progress progress-lg">
<div class="progress-bar bg-warning" style="width: <?php echo round($get_female_widow_percentage)."%" ;?>"><strong><?php echo round($get_female_widow_percentage)."%";?></strong></div> <strong>of Total Female</strong>
</div>
</div>
<!-- /.progress-group -->
<!-- <div class="progress-group">
Indoor Patient's Expense
<span class="float-right"><b>250</b>/25%</span>
<div class="progress progress-sm">
<div class="progress-bar bg-primary" style="width: 25%"></div>
</div>
</div> --> 

</div>



</div>

<div class="row">
<!-- PIE CHART -->
<div class="card card-primary col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">Category Wise Mustahiqeen Registration Progress</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
</button>

</div>
</div>
<div class="card-body">
<canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 300px; max-width: 100%;"></canvas>
</div>
</div> 


<!--  Un-married Adult girls reports -->

<div class="card card-success col-md-6 col-lg-6 col-sm-3">

<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
Guzara Allowance Applicant Details With Adult Un-Married Girls
</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="adultUnmarried" style="height: 300px; width: 100%;"></div>
</div>
<!-- /.card-body-->

</div>


<div class="col-md-6 col-lg-6 col-sm-3">
<div class="card card-success">
<div class="card-header border-0">
<div class="d-flex justify-content-between">
<h3 class="card-title">Paid & Un-Paid Mustahiqeen Report</h3>
<a href="javascript:void(0);">View Report</a>
</div>
</div>
<div class="card-body">
<!-- <div class="d-flex">
<p class="d-flex flex-column">
<span class="text-bold text-lg">$18,230.00</span>
<span>Sales Over Time</span>
</p>
<p class="ml-auto d-flex flex-column text-right">
<span class="text-success">
<i class="fas fa-arrow-up"></i> 33.1%
</span>
<span class="text-muted">Since last month</span>
</p>
</div> -->


<div class="position-relative mb-4">
<canvas id="sales-chart" height="200"></canvas>
</div>

<div class="d-flex flex-row justify-content-end">
<span class="mr-2">
<i class="fas fa-square text-primary"></i> Unpaid Mustahiqeen
</span>

<span>
<i class="fas fa-square text-success"></i> Paid Mustahiqeen
</span>
</div>
</div>
</div>
</div>






</div>

<div class="row"></div>
 

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">Summary of districts disbursement</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
	<div class="card-header">
<h3 class="card-title"></h3>
</div>
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>GA Fund</th>
<th>MA Fund</th>
<th>DM Fund</th>
<th>HC Fund</th>
<th>ESA Fund</th>
<th>ESP Fund</th>
<th>Total Fund</th>
<th>Total Disbursment</th>
<th>Balance</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistrict['district_name']; ?></td>
<td>

<?php
$get_ga_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_GA = $get_ga_qry->row('GA');
echo number_format($get_GA,2);
?>

</td>
<td>

<?php
$get_ma_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_MA = $get_ma_qry->row('MA');
echo number_format($get_MA,2);
?>


</td>
<td>

<?php
$get_dm_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_DM = $get_dm_qry->row('DM');
echo number_format($get_DM,2);
?>

</td>
<td>

<?php
$get_hc_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_HC = $get_hc_qry->row('HC');
echo number_format($get_HC,2);
?>

</td>
<td>

<?php
$get_esa_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_ESA = $get_esa_qry->row('ESA');
echo number_format($get_ESA,2);
?>



</td>
<td>

<?php
$get_esp_qry = $this->db->select('*')->from('district_payment')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$get_ESP = $get_esp_qry->row('ESP');
echo number_format($get_ESP,2);
?>


</td>
<td>
<?php
$total_fund = $get_GA + $get_MA + $get_DM + $get_HC + $get_ESA + $get_ESP;
echo number_format($total_fund,2);
?>

</td>
<td>

<?php

$ga_payment_qry = $this->db->select_sum('payment_amount')->from('guzara_allowance_mustahiqeen_payments')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_ga_amount = $ga_payment_qry->row('payment_amount');

$ma_payment_qry = $this->db->select_sum('payment_amount')->from('ma_paid_mustahiqeen')
->where('financial_year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_ma_amount = $ma_payment_qry->row('payment_amount');

$dm_payment_qry = $this->db->select_sum('amount')->from('dm_mustahiqeen')
->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_dm_amount = $dm_payment_qry->row('amount');

$hc_payment_qry = $this->db->select_sum('amount')->from('hc_mustahiqeen')
->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_hc_amount = $hc_payment_qry->row('amount');

$esa_payment_qry = $this->db->select_sum('amount')->from('esa_mustahiqeen')
->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_esa_amount = $esa_payment_qry->row('amount');

$esp_payment_qry = $this->db->select_sum('amount')->from('esp_mustahiqeen')
->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)
->where('district_id',$getdistrict['id'])->get();
$total_esp_amount = $esp_payment_qry->row('amount');

$get_total_dis = $total_ga_amount + $total_ma_amount + $total_dm_amount + $total_hc_amount + $total_esa_amount + $total_esp_amount;

echo number_format($get_total_dis,2);

?>







<!--ga mustahic + esa mustahiq_ + ma paid + hc mustahiq-->



</th>
<td>


<?php
$balance = $total_fund - $get_total_dis;
echo number_format($balance,2);
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
<h3 class="card-title">District Wise Total Registered Mustahiqeen</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">

<div class="card-header">
<h3 class="card-title"></h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example2" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>GA Mustahiq</th>
<th>MA Mustahiq</th>
<th>DM Mustahiq</th>
<th>HC Mustahiq</th>
<th>ESA Mustahiq</th>
<th>ESP Mustahiq</th>
<th>Total</th>

</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistrict['district_name']; ?></td>
<td>

<?php
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where("year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $ga_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("ma_paid_mustahiqeen");
$this->db->where("financial_year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $ma_count = $this->db->get()->num_rows();
?>


</td>
<td>

<?php
$this->db->select("*");
$this->db->from("dm_mustahiqeen");
$this->db->where("year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $dm_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("hc_mustahiqeen");
$this->db->where("year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $hc_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("esa_mustahiqeen");
$this->db->where("year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $esa_count = $this->db->get()->num_rows();
?>



</td>
<td>

<?php
$this->db->select("*");
$this->db->from("esp_mustahiqeen");
$this->db->where("year",$getfinancial_year);
// $this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $esp_count = $this->db->get()->num_rows();
?>


</td>
<td>
<?php
echo $total_counts = $ga_count + $ma_count + $dm_count + $hc_count + $esa_count + $esp_count;
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
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>

<!-- Charts -->






<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary collapsed-card">
<div class="card-header">
<h3 class="card-title">District Wise Total Paid Mustahiqeen</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
</button>
</div>
<!-- /.card-tools -->
</div>
<!-- /.card-header -->
<div class="card-body">
<div class="card">
	

<div class="card-header">
<h3 class="card-title"></h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example3" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>District</th>
<th>GA Mustahiq</th>
<th>MA Mustahiq</th>
<th>DM Mustahiq</th>
<th>HC Mustahiq</th>
<th>ESA Mustahiq</th>
<th>ESP Mustahiq</th>
<th>Total</th>

</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistrict)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdistrict['district_name']; ?></td>
<td>

<?php
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_payments");
$this->db->where("financial_year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $ga_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("ma_paid_mustahiqeen");
$this->db->where("financial_year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $ma_count = $this->db->get()->num_rows();
?>


</td>
<td>

<?php
$this->db->select("*");
$this->db->from("dm_mustahiqeen");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $dm_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("hc_mustahiqeen");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $hc_count = $this->db->get()->num_rows();
?>

</td>
<td>

<?php
$this->db->select("*");
$this->db->from("esa_mustahiqeen");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $esa_count = $this->db->get()->num_rows();
?>



</td>
<td>

<?php
$this->db->select("*");
$this->db->from("esp_mustahiqeen");
$this->db->where("year",$getfinancial_year);
$this->db->where("installment",$getfinancial_installment);
$this->db->where("district_id",$getdistrict['id']);
echo $esp_count = $this->db->get()->num_rows();
?>


</td>
<td>
<?php
echo $total_counts = $ga_count + $ma_count + $dm_count + $hc_count + $esa_count + $esp_count;
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
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>






<div class="card"></div>




<div class="card"></div>















<!-- /.card -->
</div>
<!-- /.col -->
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
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/canvasjs.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.js"></script>


<!-- For data tables -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});

$("#example2").DataTable({
"responsive": true,
"autoWidth": false,
});


$("#example3").DataTable({
"responsive": true,
"autoWidth": false,
});

});



//-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Guzara Allowance', 
          'Merriage Assistance',
          'Health Care', 
          'Educationa Stipend(A)', 
          'Educationa Stipend(P)', 
          'Deeni Madaris', 
      ],
      datasets: [
        {
          data: [<?php echo $get_all_ga_mustahiq; ?>,<?php echo $get_all_ma_mustahiq; ?>,<?php echo $get_all_hc_mustahiq; ?>,<?php echo $get_all_esa_mustahiq; ?>,<?php echo $get_all_esp_mustahiq; ?>,<?php echo $get_all_dm_mustahiq; ?>],
          backgroundColor : ['#00a65a', '#f56954', '#f39e12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions      
    })



    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
     

      labels: [
          'Poors', 
          'Orphans',
          'Widows', 
          'Disables',   
      ],
      datasets: [
        {
          data: [<?php echo $get_poor;?>,<?php echo $get_orphan; ?>,<?php echo $get_widows; ?>,<?php echo $get_disable; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#3c8dbc'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })


      //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
</script>



<!-- Sales Chart -->

<script>
	
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['Poors', 'Orphans', 'Widows', 'Disables'],
      datasets: [
        {
          backgroundColor: '#060CC7',
          borderColor    : '#060CC7',
          data           : [<?php echo $get_poor;?>, <?php echo $get_orphan; ?>, <?php echo $get_widows; ?>, <?php echo $get_disable; ?>]
        },
        {
          backgroundColor: '#02990F',
          borderColor    : '#02990F',
          data           : [<?php echo $get_paid_poor;?>, <?php echo $get_paid_orphan;?>, <?php echo $get_paid_widows;?>, <?php echo $get_paid_disable;?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 100
                value += 'k'
              }
              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type                : 'line',
        data                : [100, 120, 170, 167, 180, 177, 160],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [60, 80, 70, 67, 80, 77, 100],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})

</script>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("adultUnmarried", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Poor Adult Un-Married Female In KPK"
	},
	axisY: {
		title: "Number of Female"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "black",
		legendText: "Adult Un-Married Female In KPK",
		dataPoints: [      
			{ y: <?php echo $get_unmarried_3;?>, label: "3 or more Un-Married Female" },
			{ y: <?php echo $get_unmarried_2;?>,  label: "2 Adult (Un-Married)" },
			{ y: <?php echo $get_unmarried_1;?>,  label: "1 Adult (Un-Married)" }
		]
	}]
});
chart.render();

}
</script>


</body>
</html>
