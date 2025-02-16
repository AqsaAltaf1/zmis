<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

// Count all entries in GA table
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$get_all_mustahiq = $this->db->get()->num_rows();


// House Status
$this->db->select("house_status");
$this->db->from("mustahiqeen");
$this->db->where('house_status','Homeless/Shelter');

$get_homeless = $this->db->get()->num_rows();

$this->db->select("house_status_type");
$this->db->from("mustahiqeen_details");
$this->db->where('house_status_type','Semi-Concrete');

$get_semipakka = $this->db->get()->num_rows();

$this->db->select("house_status_type");
$this->db->from("mustahiqeen_details");
$this->db->where('house_status_type','Mud');

$get_kacha= $this->db->get()->num_rows();

$this->db->select("house_status_type");
$this->db->from("mustahiqeen_details");
$this->db->where('house_status_type','Concrete');

$get_concrete = $this->db->get()->num_rows();

//un-Employement record

$this->db->select("monthly_income_source");
$this->db->from("mustahiqeen");
$this->db->where('monthly_income_source','Unemployed');

$get_unemployed = $this->db->get()->num_rows();

$this->db->select("monthly_income_source");
$this->db->from("mustahiqeen");
$this->db->where('monthly_income_source','Employed (Non Govt. Employee)');

$get_employed = $this->db->get()->num_rows();

//Water supply data

$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','Govt Water Supply');

$get_govt_water = $this->db->get()->num_rows();

$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','Open/ Dug well');

$get_open_water = $this->db->get()->num_rows();

$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','Own Bore Hole with hand-pump');

$get_ownBore_water = $this->db->get()->num_rows();


$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','Community Bore Hole');

$get_communityBore_water = $this->db->get()->num_rows();


$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','River/Pond/Stream');

$get_river_water = $this->db->get()->num_rows();

$this->db->select("water_type");
$this->db->from("mustahiqeen");
$this->db->where('water_type','No Facility');

$get_nil_water = $this->db->get()->num_rows();

//Electricty Type


$this->db->select("electricity_type");
$this->db->from("mustahiqeen");
$this->db->where('electricity_type','Wapda');

$get_wapda = $this->db->get()->num_rows();

$this->db->select("electricity_type");
$this->db->from("mustahiqeen");
$this->db->where('electricity_type','Own Arrangment/Solar');

$get_solar = $this->db->get()->num_rows();


$this->db->select("electricity_type");
$this->db->from("mustahiqeen");
$this->db->where('electricity_type','No Facility');

$get_noElectricity = $this->db->get()->num_rows();


//fuel type data


$this->db->select("fuel_type");
$this->db->from("mustahiqeen");
$this->db->where('fuel_type','Natural Gas (SNGPL)');

$get_sngpl = $this->db->get()->num_rows();


$this->db->select("fuel_type");
$this->db->from("mustahiqeen");
$this->db->where('fuel_type','Wood');

$get_wood = $this->db->get()->num_rows();


$this->db->select("fuel_type");
$this->db->from("mustahiqeen");
$this->db->where('fuel_type','LP Gas (Cylinder)');

$get_lpg = $this->db->get()->num_rows();


$this->db->select("fuel_type");
$this->db->from("mustahiqeen");
$this->db->where('fuel_type','Other/Coal');

$get_other = $this->db->get()->num_rows();


$this->db->select("fuel_type");
$this->db->from("mustahiqeen");
$this->db->where('fuel_type','Nil');

$get_nil = $this->db->get()->num_rows();



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
<h3 class="m-0 text-dark">Demographics Status Report of Zakat Registered Mustahiqeen</h3>
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
<div class="card card-success col-md-8 col-lg-8 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
Water Avaliability
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="water" style="height: 300px; width: 100%;"></div>
</div>
</div>

<div class="card card-success col-md-4 col-lg-4 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
Electricity Avaliability
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="electricity" style="height: 300px; width: 100%;"></div>
</div>
</div>

</div>


<div class="row">
<!-- PIE CHART -->
 
<div class="card card-success col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
House Status Of Zakat Registered Mustahiqeen
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="house_status" style="height: 300px; width: 100%;"></div>
</div>

</div>

<div class="card card-primary col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
Employment (Non-Govt) Vs Un-Employment
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="employement_record" style="height: 300px; width: 100%;"></div>
</div>
</div>

</div>

<div class="row">


</div>

<div class="row">




<div class="card card-primary col-md-6 col-lg-6 col-sm-3">
<div class="card-header">
<h3 class="card-title">
<i class="far fa-chart-bar"></i>
fuel Type coverages
</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div id="fuel" style="height: 300px; width: 100%;"></div>
</div>
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
window.onload = function () {


//Water availability Data 


var chart = new CanvasJS.Chart("water", {
	animationEnabled: true,
	title: {
		text: "Water utility coverages"
	},
	axisX: {
		interval: 1
	},
	axisY: {
		title: "No. of Zakat Registered Applicants in KP",
		includeZero: true,
		scaleBreaks: {
			type: "wavy",
			customBreaks: [{
				startValue: 80,
				endValue: 210
				},
				{
					startValue: 230,
					endValue: 600
				}
		]}
	},
	data: [{
		type: "bar",
		toolTipContent: "<b>{label}</b><br>People: {y} <br>{percent}% of Total Population",
		dataPoints: [
			
			{ label: "Nil", y: <?php echo $get_nil_water;?>, percent: <?php $nil_percent = ($get_nil_water * 100)/$get_all_mustahiq; echo round($nil_percent);?>},
			
			{ label: "River/Pond/Stream", y: <?php echo $get_river_water;?>, percent: <?php $river_water_percent = ($get_river_water * 100)/$get_all_mustahiq; echo round($river_water_percent);?> },
			
			{ label: "Open/Dug well", y: <?php echo $get_open_water;?>, percent: <?php $open_water_percent = ($get_open_water * 100)/$get_all_mustahiq; echo round($open_water_percent);?> },
			
			{ label: "Community Bore Hole", y: <?php echo $get_communityBore_water;?>, percent: <?php $communityBore_percent = ($get_communityBore_water * 100)/$get_all_mustahiq; echo round($communityBore_percent);?>},
			
			{ label: "Own Bore Hole with hand-pump", y: <?php echo $get_ownBore_water;?>, percent: <?php $ownBore_percent = ($get_ownBore_water * 100)/$get_all_mustahiq; echo round($ownBore_percent);?> },
			
			{ label: "Govt Water Supply", y: <?php echo $get_govt_water;?>, percent: <?php $govt_water_percent = ($get_govt_water * 100)/$get_all_mustahiq; echo round($govt_water_percent);?> }
			
		]
	}]
});
chart.render();




//Electricity data


var chart = new CanvasJS.Chart("electricity", {
	animationEnabled: true,
	title: {
		text: "Electricity utility coverages"
	},
	axisX: {
		interval: 1
	},
	axisY: {
		title: "No. of Citizens in KP",
		includeZero: true,
		scaleBreaks: {
			type: "wavy",
			customBreaks: [{
				startValue: 80,
				endValue: 210
				},
				{
					startValue: 230,
					endValue: 600
				}
		]}
	},
	data: [{
		type: "column",
		toolTipContent: "<b>{label}</b><br>People: {y} <br>{percent}% of Total Population",
		dataPoints: [
			
{ label: "No electricity", y: <?php echo $get_noElectricity;?>, percent: <?php $no_percent = ($get_noElectricity * 100)/$get_all_mustahiq; echo round($no_percent);?> },
			
			{ label: "Own Arrangement", y: <?php echo $get_solar;?>, percent: <?php $solar_percent = ($get_solar * 100)/$get_all_mustahiq; echo round($solar_percent);?> },
			
			{ label: "WAPDA", y: <?php echo $get_wapda;?>, percent: <?php $wapda_percent = ($get_wapda * 100)/$get_all_mustahiq; echo round($wapda_percent);?> }
			

			
			
			
			
		]
	}]
});
chart.render();




//fuel Type


var chart = new CanvasJS.Chart("fuel", {
	animationEnabled: true,
	title:{
		text: "Fule Coverages",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: <?php echo $get_sngpl; ?>, label: "SNGPL" },
			{ y: <?php echo $get_wood; ?>, label: "Wood" },
			{ y: <?php echo $get_lpg; ?>, label: "LPG" },
			{ y: <?php echo $get_other; ?>, label: "Other/Coal"},
			{ y: <?php echo $get_nil; ?>, label: "Nil"}
		]
	}]
});
chart.render();



}






</script>

<!-- Category Wise Mustahiqeen Registration Progress  window.onload = loadPage;-->



<script>
	
var pieChartValues = [{
  y: <?php echo $get_homeless; ?>,
  exploded: true,
  indexLabel: "Homeless: <?php echo $get_homeless; echo "/" ; echo round($get_homeless * 100/$get_all_mustahiq). "%" ;  ?>",
  color: "#038A0F"
}, {
  y: <?php echo $get_concrete; ?>,
  indexLabel: "Concrete: <?php echo $get_concrete; echo "/" ; echo round($get_concrete * 100/$get_all_mustahiq). "%" ; ?>",
  color: "#BC1805"
}, {
  y: <?php echo $get_semipakka; ?>,
  indexLabel: "Seme-Concrete: <?php echo $get_semipakka; echo "/" ; echo round($get_semipakka * 100/$get_all_mustahiq). "%" ; ?>",
  color: "#0922D5"
}, {
  y: <?php echo $get_kacha; ?>,
  indexLabel: "Kacha Ghar: <?php echo $get_kacha; echo "/" ; echo round($get_kacha * 100/$get_all_mustahiq). "%" ; ?>",
  color: "#E6BE09"
}];
renderPieChart(pieChartValues);

function renderPieChart(values) {

  var chart = new CanvasJS.Chart("house_status", {
    backgroundColor: "white",
    colorSet: "colorSet2",

    title: {
      text: "Total HomeLess Applicants: <?php echo $get_homeless; echo "/" ; echo round($get_homeless * 100/$get_all_mustahiq). "%" ; ?>  ",
      fontFamily: "Verdana",
      fontSize: 25,
      fontWeight: "normal",
    },
    animationEnabled: true,
    data: [{
      indexLabelFontSize: 15,
      indexLabelFontFamily: "Monospace",
      indexLabelFontColor: "black",
	  indexLabelFontWeight: "bold",
      indexLabelLineColor: "grey",
      indexLabelPlacement: "outside",
      type: "bar",
      showInLegend: false,
      toolTipContent: "",
      dataPoints: values
    }]
  });
  chart.render();
}



//Un-employment Data


var pieChartData = [{
  y: <?php echo $get_unemployed; ?>,
  exploded: true,
  indexLabel: "Un-Employed <?php echo $get_unemployed; ?>",
  color: "#A1AAAA"
}, {
  y: <?php echo $get_employed; ?>,
  indexLabel: "Employed (Non-Govt.) <?php echo $get_employed; ?>",
  color: "#00e2c7"
}];
renderPieChartData(pieChartData);

function renderPieChartData(values) {

  var piechart = new CanvasJS.Chart("employement_record", {
    backgroundColor: "white",
    colorSet: "colorSet2",

    title: {
      text: "Un-Employement Record in KPK: <?php echo $get_unemployed;?>  ",
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
  piechart.render();
}
</script>

</body>
</html>
