<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

// Count all entries in GA table
/*$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('year',$getfinancial_year);
$get_all_mustahiq = $this->db->get()->num_rows();


$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Widow/Divorced');

$get_widows = $this->db->get()->num_rows();

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Widow/Divorced');
$this->db->where('MustahiqType','Guzara Allowance');
$get_paid_widows = $this->db->get()->num_rows();

$x = $get_all_mustahiq;
$y = $get_widows *100;
$z = $y/$x;


$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Orphan');

 $get_orphan = $this->db->get()->num_rows();

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Orphan');
$this->db->where('MustahiqType','Guzara Allowance');
$get_paid_orphan = $this->db->get()->num_rows();

$a = $get_all_mustahiq;
$b = $get_orphan *100;
$c = $y/$x;

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Senior Citizen');
$this->db->where('MustahiqType','Guzara Allowance');

 $getSeniorCitizen = $this->db->get()->num_rows();

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Senior Citizen');
$this->db->where('MustahiqType','Guzara Allowance');
$get_paid_poor = $this->db->get()->num_rows();

$d = $get_all_mustahiq;
$e = $getSeniorCitizen *100;
$f = $y/$x; 

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Disable');

 $get_disable = $this->db->get()->num_rows();

$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('payment_status',1);
$this->db->where('category','Disable');
$this->db->where('MustahiqType','Guzara Allowance');
$get_paid_disable = $this->db->get()->num_rows();

$g = $get_all_mustahiq;
$h = $get_disable *100;
$i = $y/$x;*/


/*
// Guzara Allowance Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');

$get_all_ga_mustahiq = $this->db->get()->num_rows();


// Get Merriage Assisatance Mustahiqeen
$this->db->select("year");
$this->db->from("ma_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_ma_mustahiq = $this->db->get()->num_rows();

// Get Deeni Madaris Mustahiqeen
$this->db->select("year");
$this->db->from("dm_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_dm_mustahiq = $this->db->get()->num_rows();


// Get Educational  Mustahiqeen
$this->db->select("year");
$this->db->from("esa_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_esa_mustahiq = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("esp_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_esp_mustahiq = $this->db->get()->num_rows();



// Get Health Care  Mustahiqeen
$this->db->select("year");
$this->db->from("hc_mustahiqeen");
$this->db->where('year',$getfinancial_year);

$get_all_hc_mustahiq = $this->db->get()->num_rows();




// 3 or more Adult Un-Married Gilrs details

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
// $this->db->where('year',$getfinancial_year);
$this->db->where('age<=',16);

$get_below18 = $this->db->get()->num_rows();


$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
// $this->db->where('year',$getfinancial_year);
$this->db->where('age>=',17 );
$this->db->where('age<=',30 );
$get_age_30 = $this->db->get()->num_rows();


$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
// $this->db->where('year',$getfinancial_year);
$this->db->where('age>=',31);
$this->db->where('age<=',59);
$get_age_59 = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
// $this->db->where('year',$getfinancial_year);
$this->db->where('age>=',60);

$get_above60 = $this->db->get()->num_rows();
// $get_female_widow_percentage = ($get_adult_unmarried * 100)/$get_female;




$this->db->select("disable_type");
$this->db->from("mustahiqeen_details");
$this->db->where('disable_type','Visual Impairment');

 $get_visual = $this->db->get()->num_rows();

$this->db->select("disable_type");
$this->db->from("mustahiqeen_details");
$this->db->where('disable_type','Physical Impairment');

 $get_physical = $this->db->get()->num_rows();


$this->db->select("disable_type");
$this->db->from("mustahiqeen_details");
$this->db->where('disable_type','Hearing and Speech Impairment');

 $get_deaf= $this->db->get()->num_rows();

	 
$this->db->select("disable_type");
$this->db->from("mustahiqeen_details");
$this->db->where('disable_type','Intellectual Impairment');

 $get_mental = $this->db->get()->num_rows();*/







?>

<!DOCTYPE html>
<html lang="en">
<head>
 




<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('secretary/include/title');?></title>


<script src="<?php echo base_url(); ?>assets/plugins/chart.js/loader.js"></script>
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



<?php $this->load->view('secretary/include/nav_1');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('secretary/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<?php // $this->load->view('secretary/include/user_manue');?>

<!-- Sidebar Menu -->

<?php $this->load->view('secretary/include/sidebar_sec');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8 col-md-8">
<h3 class="m-0 text-dark">Yearly Headwise Fund Utilization Report (All Districts)</h3>
</div><!-- /.col -->

<div class="col-sm-4 col-md-4 div_align">

<h5 class="m-0 text-dark"> FINANCIAL YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div>
</div>
</div>
</div>

<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<!-- 
<form target="_blank" method="post" action="<?php echo base_url(); ?>Pza_dist_reports/yearWisePaidMustahiqeen" enctype="multipart/form-data">
<div class="row navbar-white mb-2" style="padding:5px 10px;">
<h5 class="text-dark col-md-6" style=" margin-top:5px;">Select Year to view Previous Year's Fund Utilization Report:</h5>
<select required class="form-control col-md-3" id="year" name="year" style="margin-right:3px;">
<option value="">---Select Financial Year----</option>
<option value="">All Years</option>
<?php
$dateValue = date("Y");

for ($dateCounter = 2021; $dateCounter <= $dateValue; $dateCounter++)
{
	$addYear = substr($dateCounter, -2);
	$getFinal_year = $addYear + 1;
	if($dateCounter < $dateValue)
	{

?>
<option value="<?php echo $dateCounter;?>-<?php echo $getFinal_year;?>"><?php echo $dateCounter;?>-<?php echo $getFinal_year;?></option>
<?php
}
?>
<?php
}
?>

</select>




<input type="submit" name="submitbtn" class="btn btn-success pull-right" value="Show Report">
</div>
-->
<input type="hidden" name="financial_year" value="<?php echo $getfinancial_year;?>">
<input type="hidden" name="inst_value" value="<?php echo $getfinancial_installment;?>">


</form>

<div>


 






<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary ">
<div class="card-header">
<h3 class="card-title">District Wise Fund Utilization Report for F/Y <b> <?php echo $getfinancial_year;?></b></h3>

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
<?php 
/*$queryPaidMustahiq = $this->db->query("SELECT District_Name, MustahiqType, count(MustahiqType) as Total,
SUM(CASE WHEN MustahiqType ='Guzara Allowance' THEN 1 ELSE 0 END) as GA,
SUM(CASE WHEN MustahiqType ='Marriage Assistance' THEN 1 ELSE 0 END) as MA,
SUM(CASE WHEN MustahiqType ='Deeni Madaris' THEN 1 ELSE 0 END) as DM,
SUM(CASE WHEN MustahiqType ='Educational Stipend (A)' THEN 1 ELSE 0 END) as ESA,
SUM(CASE WHEN MustahiqType ='Educational Stipend (P)' THEN 1 ELSE 0 END) as ESP
 FROM mustahiqeen where payment_year = '".$getfinancial_year."' group by District_Name");
$queryPaidResult = $queryPaidMustahiq->result_array();*/
//echo $query[0]['sum(no_of_posts)'];
?>

<table id="" class="table table-bordered table-striped">
<thead>
<tr style="text-align:center; vertical-align:central; padding-bottom:10px;">
  <th rowspan="2">#</th>
  <th rowspan="2">District</th>
  <th rowspan="2">Total Fund Received</th>
  <th rowspan="2">Disbursement</th>
  <th rowspan="2">Balance</th>
  <th rowspan="2">Utilization %age</th>
  <th colspan="3">No. of Beneficiaries</th>
  </tr>
<tr>
<th>Male</th>
<th>Female</th>
<th>Total</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
$totalIssuedFund = 0;
$sumRZF = 0;
$totalRZFFundDisbursement=0;
$average = 0;
$maleTotal = 0;
$femaleTotal = 0;
$genderTotal = 0;
if(!empty($getYearlyHeadwiseFund))
{
foreach($getYearlyHeadwiseFund as $yearlyHeadWiseFund)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $yearlyHeadWiseFund['DistrictName']; ?></td>
<td><?php $totalFund = $yearlyHeadWiseFund['total_fund']; echo number_format($yearlyHeadWiseFund['total_fund']); $totalIssuedFund += $yearlyHeadWiseFund['total_fund'];?></td>
<td>
<?php 


/*$this->db->select_sum('mustahiqeen.amount + hc_mustahiqeen.amount')
         ->from('mustahiqeen')
         ->join('hc_mustahiqeen', 'mustahiqeen.district_id = hc_mustahiqeen.district_id and mustahiqeen.payment_year = hc_mustahiqeen.year and mustahiqeen.payment_installment = hc_mustahiqeen.installment', 'left')
         ->where('mustahiqeen.payment_year', $yearlyHeadWiseFund['financial_year'])
         ->where('mustahiqeen.district_id', $yearlyHeadWiseFund['district_id'])
         ->where('mustahiqeen.payment_installment', $yearlyHeadWiseFund['installment'])
         ->get();*/
		 
		/*$this->db->select('SUM(total_fund) as total_fund')
         ->from(
             $this->db->select('mustahiqeen.amount + hc_mustahiqeen.amount as total_fund')
                      ->from('mustahiqeen')
                      ->join('hc_mustahiqeen', 'mustahiqeen.district_id = hc_mustahiqeen.district_id and mustahiqeen.payment_year = hc_mustahiqeen.year and mustahiqeen.payment_installment = hc_mustahiqeen.installment', 'left')
                      ->where('mustahiqeen.payment_year', $yearlyHeadWiseFund['financial_year'])
                      ->where('mustahiqeen.district_id', $yearlyHeadWiseFund['district_id'])
                      ->where('mustahiqeen.payment_installment', $yearlyHeadWiseFund['installment'])
                      ->get_compiled_select()
          )          ->get();

		 

$totalFund = $this->db->row('total_fund');*/



$fundDisbursementRZFQuery = $this->db->select_sum('amount')->from('mustahiqeen')->where('payment_year',$yearlyHeadWiseFund['financial_year'])->where('district_id',$yearlyHeadWiseFund['district_id'])->where('payment_installment',$yearlyHeadWiseFund['installment'])->get();
 $totalRZFFund = $fundDisbursementRZFQuery->row('amount');
 

$DHQDisbursementQuery = $this->db->select_sum('amount')->from('hc_mustahiqeen')->where('year',$yearlyHeadWiseFund['financial_year'])->where('district_id',$yearlyHeadWiseFund['district_id'])->where('installment',$yearlyHeadWiseFund['installment'])->get();
 $totalDHQFund = $DHQDisbursementQuery->row('amount');
 //$totalRZFFundDisbursement += $totalRZFFund;
 $totalFundDisbursement = $totalRZFFund + $totalDHQFund;
 echo number_format($totalFundDisbursement);
$sumRZF += $totalFundDisbursement;

?>
</td>
<td><?php $fundBalance = $yearlyHeadWiseFund['total_fund'] - $totalRZFFund; echo number_format($fundBalance);  ?></td>
<td><?php  $percentUtilization = (($totalRZFFund * 100) /$totalFund); echo round($percentUtilization,2)."%"; 
$average +=$percentUtilization;
 ?></td>
<td><?php 

/*$this->db->select('District_Name, SUM(CASE WHEN gender = "Male" THEN 1 ELSE 0 END) AS Male_Count, SUM(CASE WHEN gender = "Female" THEN 1 ELSE 0 END) AS Female_Count');
$this->db->from('mustahiqeen');
$this->db->where(array('payment_status' => 1, 'payment_year' => $yearlyHeadWiseFund['financial_year'], 'payment_installment' => $yearlyHeadWiseFund['installment'], 'district_id' =>  $yearlyHeadWiseFund['district_id']));
$this->db->group_by('District_Name');
$query = $this->db->get();
return $query->result();*/

$queryGender = "SELECT COUNT(gender) as totalGender , 
SUM(CASE WHEN gender='Male' THEN 1 ELSE 0 END) AS totalMale,
SUM(CASE WHEN gender='Female' THEN 1 ELSE 0 END) AS totalFemale
from mustahiqeen WHERE payment_year='".$yearlyHeadWiseFund['financial_year']."' AND payment_installment='".$yearlyHeadWiseFund['installment']."' AND district_id = '".$yearlyHeadWiseFund['district_id']."' ";
$genderWiseMustahiq = $this->db->query($queryGender);
$data['genderData'] = $genderWiseMustahiq->result_array(); 
echo $data['genderData']['0']['totalMale'];
$maleTotal += $data['genderData']['0']['totalMale'];

/*$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("payment_year",$yearlyHeadWiseFund['financial_year']);
$this->db->where("district_id",$yearlyHeadWiseFund['district_id']);
$this->db->where("payment_installment",$yearlyHeadWiseFund['installment']);
$this->db->where("gender","Male");
$totalGender = $this->db->get()->num_rows();
echo $totalGender;
$gender += $totalGender;*/

?></td>
<td><?php echo number_format($data['genderData']['0']['totalFemale']); $femaleTotal += $data['genderData']['0']['totalFemale'];?></td>
<td><?php echo number_format($data['genderData']['0']['totalGender']); $genderTotal += $data['genderData']['0']['totalGender'];?></td>
</tr>
<?php 
$i++;
}
}
?>
<tr style="font-weight:bold;">
<td></td>
<td>Grand Total</td>
<td><?php echo number_format($totalIssuedFund);?></td>
<td><?php echo number_format($sumRZF);?></td>
<td><?php echo number_format($totalIssuedFund-$sumRZF);?></td>
<td><?php echo round($average/($i), 2);?>%</td>
<td><?php echo number_format($maleTotal);?></td>
<td><?php echo number_format($femaleTotal);?></td>
<td><?php echo number_format($genderTotal);?></td>
</tr>
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
          'Marriage Assistance',
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
          'Senior Citizen', 
          'Orphans',
          'Widows', 
          'Disables',   
      ],
      datasets: [
        {	

          data: [<?php echo $getSeniorCitizen;?>,<?php echo $get_orphan; ?>,<?php echo $get_widows; ?>,<?php echo $get_disable; ?>],
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
      labels  : ['Senior Citizen', 'Orphans', 'Widows', 'Disables'],
      datasets: [
        {
          backgroundColor: '#060CC7',
          borderColor    : '#060CC7',
          data           : [<?php echo $getSeniorCitizen;?>, <?php echo $get_orphan; ?>, <?php echo $get_widows; ?>, <?php echo $get_disable; ?>]
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

var chart = new CanvasJS.Chart("ageWise", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Total Zakat Registered Senior Citizens: <?php echo $get_above60;?>"
	},
	axisY: {
		title: "No. Of Registered Applicants"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "black",
		legendText: "Age Wise Groups",
		dataPoints: [      
			{ y: <?php echo $get_below18;?>, label: "Below 16" },
			{ y: <?php echo $get_age_30;?>,  label: "17 to 30" },
			{ y: <?php echo $get_age_59;?>,  label: "31 to 59" },
			{ y: <?php echo $get_above60;?>,  label: "Above 60" }
		]
	}]
});
chart.render();




}






</script>

<!-- Category Wise Mustahiqeen Registration Progress  window.onload = loadPage;-->

<script>
	
google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Senior Citizen',     <?php echo $getSeniorCitizen;?>],
          ['Orphans',      <?php echo $get_orphan; ?>],
          ['Widows',  <?php echo $get_widows; ?>],
          ['Disables', <?php echo $get_disable; ?>]
        ]);

        var options = {
          // title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('category_wise'));
        chart.draw(data, options);
      }	
	 
	  
</script>


<script>
	
var pieChartValues = [{
  y: <?php echo $get_physical; ?>,
  exploded: true,
  indexLabel: "Physical Impaired: <?php echo $get_physical; ?>",
  color: "#038A0F"
}, {
  y: <?php echo $get_visual; ?>,
  indexLabel: "Visually Impaired: <?php echo $get_visual; ?>",
  color: "#BC1805"
}, {
  y: <?php echo $get_deaf; ?>,
  indexLabel: "Hearing and Speech Impaired: <?php echo $get_deaf; ?>",
  color: "#0922D5"
}, {
  y: <?php echo $get_mental; ?>,
  indexLabel: "Intellectually Impaired: <?php echo $get_mental; ?>",
  color: "#E6BE09"
}];
renderPieChart(pieChartValues);

function renderPieChart(values) {

  var chart = new CanvasJS.Chart("disable_type", {
    backgroundColor: "white",
    colorSet: "colorSet2",

    title: {
      text: "Total Registered PWDs in KPK: <?php echo $get_disable;?>  ",
      fontFamily: "Verdana",
      fontSize: 25,
      fontWeight: "normal",
    },
    animationEnabled: true,
    data: [{
      indexLabelFontSize: 15,
      indexLabelFontFamily: "Monospace",
      indexLabelFontColor: "black",
      indexLabelLineColor: "darkgrey",
      indexLabelPlacement: "outside",
      type: "pie",
      showInLegend: false,
      toolTipContent: "#percent%",
      dataPoints: values
    }]
  });
  chart.render();
}


</script>

</body>
</html>
