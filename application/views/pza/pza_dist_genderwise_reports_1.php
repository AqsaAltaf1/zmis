<?php
$getfinancialdata = $this->db->select('financial_Year,installment')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

// Count all entries in GA table
$this->db->select("year");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$get_all_mustahiq = $this->db->get()->num_rows();


$this->db->select("year, category");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Widow');

$get_widows = $this->db->get()->num_rows();




$this->db->select("year, category");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Orphan');

 $get_orphan = $this->db->get()->num_rows();



$this->db->select("year, category");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Poor');

 $get_poor = $this->db->get()->num_rows();



$this->db->select("year, category");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('category','Disable');

 $get_disable = $this->db->get()->num_rows();



// Guzara Allowance Mustahiqeen
$this->db->select("year");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);

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

$query1 = $this->db->query("SELECT dependences_daughters, count(dependences_daughters) as daughtercount FROM guzara_allowance_mustahiqeen_details group by dependences_daughters");
$result = $query1->result_array();

foreach($result as $getdistricts)
{
//echo "<br>";
//echo $getdistricts['dependences_daughters']." ".$getdistricts['daughtercount'];	

	if($getdistricts['dependences_daughters'] == "1 Adult(Un-Married)")
	{
		$get_unmarried_1 = 	$getdistricts['daughtercount'];
		$get_unmarried_1_total = $get_unmarried_1 * 1;
	}

	if($getdistricts['dependences_daughters'] == "2 Adult(Un-Married)")
	{
		$get_unmarried_2 = 	$getdistricts['daughtercount'];
		$get_unmarried_2_total = $get_unmarried_2 * 2;
	}

	if($getdistricts['dependences_daughters'] == "3 or Above Adult(Un-Married)")
	{
		$get_unmarried_3 = 	$getdistricts['daughtercount'];
		$get_unmarried_3_total = $get_unmarried_3 * 3;
	}

}

/*

// 3 or more Adult Un-Married Gilrs details

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','3 or Above Adult(Un-married)');

$get_unmarried_3 = $this->db->get()->num_rows();
$get_unmarried_3_total = $get_unmarried_3 * 3;

$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','2 Adult(Un-married)');

$get_unmarried_2 = $this->db->get()->num_rows();
$get_unmarried_2_total = $get_unmarried_2 * 2;
$this->db->select("*");
$this->db->from("guzara_allowance_mustahiqeen_details");
// $this->db->where('year',$getfinancial_year);
$this->db->where('dependences_daughters','1 Adult(Un-married)');

$get_unmarried_1 = $this->db->get()->num_rows();
$get_unmarried_1_total = $get_unmarried_1 *1;
// $get_female_widow_percentage = ($get_adult_unmarried * 100)/$get_female;

*/

?>

<!DOCTYPE html>
<html lang="en">
<head>





<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('pza/include/title');?></title>


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
<h3 class="m-0 text-dark">Gender Wise Zakat Registered Mustahiqeen</h3>
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
<strong style="text-align:center;">
<?php
date_default_timezone_set('UTC');

echo date("d-m-Y , h:i a");
?></strong>
<!-- /.card-body -->
</div>

<!-- Gender Wise -->

<div class="card card-success col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
Male Vs Female Zakat Registered Mustahiqeen
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="gender_wise" style="height: 300px; width: 100%;"></div>
</div>

</div>



</div>

<div class="row">

<div class=" card card-success col-md-6 col-lg-6 col-sm-3" style="height: 400px; width: 100%;">
<div class="card-header">
<h3 class="card-title">Further Division of Female Applicants</h3>

<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
</button>

</div>
</div>


<?php

$this->db->select("year,gender");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Male');

$get_male = $this->db->get()->num_rows();

$get_male_percentage = ($get_male * 100)/$get_all_mustahiq;
// Female Percentage
$this->db->select("year,gender");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');

$get_female = $this->db->get()->num_rows();

$get_female_percentage = ($get_female * 100)/$get_all_mustahiq;

// Un-Married Female
$this->db->select("year,gender,marital_status,category ");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status','Un-Married');

$get_female_unmarried = $this->db->get()->num_rows();

$get_female_unmarried_percentage = ($get_female_unmarried * 100)/$get_female;

// Un-Married Female
$this->db->select("year,gender,marital_status,category ");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status','Un-Married');
$this->db->where('category','Orphan');

$get_female_unmarried_orphan = $this->db->get()->num_rows();

$get_female_unmarried_orphan_percentage = ($get_female_unmarried_orphan * 100)/$get_female;


$this->db->select("year,gender,marital_status,category ");
$this->db->from("guzara_allowance_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('gender','Female');
$this->db->where('marital_status!=','Married');
$this->db->where('category','Widow');

$get_female_widow = $this->db->get()->num_rows();

$get_female_widow_percentage = ($get_female_widow * 100)/$get_female;

$get_poor_female = $get_female - ($get_female_unmarried_orphan + $get_female_widow + $get_female_unmarried);

$get_poor_female_percentage = ($get_poor_female * 100)/$get_female;

?>
<!-- /.progress-group -->
<div class="progress-group">
<br />
<strong>Un-Married Female Applicants</strong>
<span class="float-right"><b><?php echo $get_female_unmarried;?></b>/<?php echo $get_female;?></span>
<div class="progress progress-lg" style="height:30px;">
<div class="progress-bar bg-success" style="width: <?php echo round($get_female_unmarried_percentage)."%" ;?>"><strong><?php echo round($get_female_unmarried_percentage)."%";?> </strong></div> <strong> &nbsp of Total Female</strong>
</div>
</div>



<!-- /.progress-group -->
<div class="progress-group">
<br>
<strong>Un-married Female Orphan Applicants</strong>
<span class="float-right"><b><?php echo $get_female_unmarried_orphan;?></b>/<?php echo $get_female_unmarried;?></span>
<div class="progress progress-lg"  style="height:30px;">
<div class="progress-bar bg-info" style="width: <?php echo round($get_female_unmarried_orphan_percentage)."%" ;?>"><strong><?php echo round($get_female_unmarried_orphan_percentage)."%";?> </strong></div> <strong>&nbsp of Total Un-married Female</strong>
</div>
</div>
<!-- /.progress-group -->

<div class="progress-group">
<br>
<strong>Total Widows Applicants</strong>
<span class="float-right"><b><?php echo $get_female_widow;?></b>/<?php echo $get_female;?></span>
<div class="progress progress-lg" style="height:30px;">
<div class="progress-bar bg-warning" style="width: <?php echo round($get_female_widow_percentage)."%" ;?>"><strong><?php echo round($get_female_widow_percentage)."%";?></strong></div> <strong> &nbsp of Total Female</strong>
</div>
</div>


<div class="progress-group">
<br>
<strong>Total Poor Female Applicants</strong>
<span class="float-right"><b><?php echo $get_poor_female;?></b>/<?php echo $get_female;?></span>
<div class="progress progress-lg" style="height:30px;">
<div class="progress-bar bg-primary" style="width: <?php echo round($get_poor_female_percentage)."%" ;?>"><strong><?php echo round($get_poor_female_percentage)."%";?></strong></div> <strong> &nbsp of Total Female</strong>
</div>
</div>

</div>
 


<!--  Un-married Adult girls reports -->

<div class="card card-success col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
GA Applicants with Adult Un-Married Daughters
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

</div>

</div>



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
      labels  : ['Poors', 'Orphans', 'Widows', 'Disables', 'Un-Employeed'],
      datasets: 
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
		text: "Total Un-Married Poor Females in KPK: <?php echo $get_unmarried_3_total + $get_unmarried_2_total + $get_unmarried_1_total;?>"
	},
	axisY: {
		title: "Number of Females"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "black",
		legendText: "Number of House Hold with Un-Married Daughters",
		dataPoints: [      
			{ y: <?php echo $get_unmarried_3;?>, label:  "3 or more Daughters" },
			{ y: <?php echo $get_unmarried_2;?>,  label: "2 Daughters " },
			{ y: <?php echo $get_unmarried_1;?>,  label: "1 Daughter" }
		]
	}]
});
chart.render();




}






</script>

<!-- Category Wise Mustahiqeen Registration Progress  window.onload = loadPage;-->







<script>
	
var pieChartValues = [{
  y: <?php echo $get_male; ?>,
  exploded: true,
  indexLabel: "Male:<?php echo $get_male;  echo " ("; echo round($get_male*100/$get_all_mustahiq)."%)"; ?>",
  color: "#038A0F"
}, {
  y: <?php echo $get_female; ?>,
  indexLabel: "Female:<?php echo $get_female;echo " ("; echo round($get_female*100/$get_all_mustahiq)."%)";  ?>",
  color: "#BC1805"
}];
renderPieChart(pieChartValues);

function renderPieChart(values) {

  var chart = new CanvasJS.Chart("gender_wise", {
    backgroundColor: "white",
    colorSet: "colorSet2",

    title: {
      text: "",
      fontFamily: "Verdana",
      fontSize: 22,
      fontWeight: "normal",
    },
    animationEnabled: true,
    data: [{
      indexLabelFontSize: 13,
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
