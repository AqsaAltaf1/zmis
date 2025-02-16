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
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6 col-md-610">
<h3 class="m-0 text-dark">Zakat Paid Mustahiqeen Report (All Districts)</h3>
</div><!-- /.col -->

<div class="col-sm-6 col-md-6 div_align">

<h5 class="m-0 text-dark"> FINANCIAL YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div>
</div>
</div>
</div>

<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<form target="_blank" method="post" action="<?php echo base_url(); ?>Pza_dist_reports/yearWisePaidMustahiqeen" enctype="multipart/form-data">
<div class="row navbar-white mb-2" style="padding:5px 10px;">
<h5 class="text-dark col-md-6" style=" margin-top:5px;">Select Year to view Previous Year's Paid Mustahiqeen:</h5>
<select required class="form-control col-md-3" id="year" name="year" style="margin-right:3px;">
<option value="">---Select Financial Year----</option>
<option value="">All Years</option>
<?php
$dateValue = date("Y");

for ($dateCounter = 2019; $dateCounter <= $dateValue; $dateCounter++)
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

<input type="hidden" name="financial_year" value="<?php echo $getfinancial_year;?>">
<input type="hidden" name="inst_value" value="<?php echo $getfinancial_installment;?>">


</form>

<div>


 






<div class="row">
<div class="col-lg-12 col-md-12 col-sm-3">
<div class="card card-primary ">
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
<?php 
$queryPaidMustahiq = $this->db->query("SELECT District_Name, MustahiqType, count(MustahiqType) as Total,
SUM(CASE WHEN MustahiqType ='Guzara Allowance' THEN 1 ELSE 0 END) as GA,
SUM(CASE WHEN MustahiqType ='Marriage Assistance' THEN 1 ELSE 0 END) as MA,
SUM(CASE WHEN MustahiqType ='Deeni Madaris' THEN 1 ELSE 0 END) as DM,
SUM(CASE WHEN MustahiqType ='Educational Stipend (A)' THEN 1 ELSE 0 END) as ESA,
SUM(CASE WHEN MustahiqType ='Educational Stipend (P)' THEN 1 ELSE 0 END) as ESP
 FROM mustahiqeen where payment_year = '".$getfinancial_year."' group by District_Name");
$queryPaidResult = $queryPaidMustahiq->result_array();
//echo $query[0]['sum(no_of_posts)'];
?>

<table id="" class="table table-bordered table-striped">
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
if(!empty($queryPaidResult))
{
foreach($queryPaidResult as $paidMustahiqeen)
{
?>


<tr>
<td><?php echo $i;?></td>
<td><?php echo $paidMustahiqeen['District_Name']; ?></td>
<td><?php echo $paidMustahiqeen['GA']; ?></td>
<td><?php echo $paidMustahiqeen['MA']; ?></td>
<td><?php
/*$this->db->select("*");
$this->db->from("mustahiqeen");
$this->db->where("payment_year",$getfinancial_year);
$this->db->where("district_id",$getdistrict['id']);
$this->db->where('MustahiqType','Deeni Madaris');
echo $dm_count = $this->db->get()->num_rows();*/
echo $paidMustahiqeen['DM']; ?></td>
<td><?php ?></td>
<td><?php echo $paidMustahiqeen['ESA'];?></td>
<td><?php echo $paidMustahiqeen['ESP']; ?></td>
<td><?php echo $paidMustahiqeen['Total']; ?></td>
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
