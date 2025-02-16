<?php
$getfinancialdata = $this->db->select('financial_Year,installment')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

/*echo "<pre>";
print_r($femaleDivision);
echo "</pre>";
*/

//Category wise female Mustahiqeen
$femaleDivision = $this->db->query("SELECT category, count(*) as femaleDivision FROM `mustahiqeen` WHERE gender = 'Female' AND `year` = '".$yearWiseReportGraph."' GROUP by category");
$femaleDivision = $femaleDivision->result_array();

$femaleDisable = $femaleDivision[0]['femaleDivision'];
$femaleOrphan = $femaleDivision[1]['femaleDivision'];
$femalePoor = $femaleDivision[2]['femaleDivision'];
$femaleWidow = $femaleDivision[3]['femaleDivision'];

// Percentage
$femaleDisablePercent = round(($femaleDisable*100)/$get_all_ga_female);


//Category wise Male Mustahiqeen
$maleDivision = $this->db->query("SELECT category, count(*) as maleDivision FROM `mustahiqeen` WHERE gender = 'Male' AND `year` = '".$yearWiseReportGraph."' GROUP by category");
$maleDivision = $maleDivision->result_array();

$maleDisable = $maleDivision[0]['maleDivision'];
$maleOrphan = $maleDivision[1]['maleDivision'];
$malePoor = $maleDivision[2]['maleDivision'];
$maleWidow = $maleDivision[3]['maleDivision'];


// Guzara Allowance Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('year',$yearWiseReportGraph);

$get_all_ga_mustahiq = $this->db->get()->num_rows();


$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('year',$yearWiseReportGraph);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('gender','Male');
$get_all_ga_male = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('year',$yearWiseReportGraph);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('gender','Female');
$get_all_ga_female = $this->db->get()->num_rows();


// Get Merriage Assisatance Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Marriage Assistance');
$this->db->where('year',$yearWiseReportGraph);

$get_all_ma_mustahiq = $this->db->get()->num_rows();

// Get Deeni Madaris Mustahiqeen
$this->db->select("year");
$this->db->from("dm_mustahiqeen");
$this->db->where('year',$yearWiseReportGraph);

$get_all_dm_mustahiq = $this->db->get()->num_rows();


// Get Educational  Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Educational Stipend (A)');
$this->db->where('year',$yearWiseReportGraph);

$get_all_esa_mustahiq = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Educational Stipend (P)');
$this->db->where('year',$yearWiseReportGraph);

$get_all_esp_mustahiq = $this->db->get()->num_rows();


 
// Get Health Care  Mustahiqeen
$this->db->select("year");
$this->db->from("hc_mustahiqeen");
$this->db->where('year',$yearWiseReportGraph);

$get_all_hc_mustahiq = $this->db->get()->num_rows();

$query1 = $this->db->query("SELECT dependences_daughters, count(dependences_daughters) as daughtercount FROM mustahiqeen_details group by dependences_daughters");
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



?>

<!DOCTYPE html>
<html lang="en">
<head>





<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('secretary/include/title');?></title>
<!--
<style type="text/css">
#container {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}

.buttons {
  min-width: 310px;
  text-align: center;
  margin-bottom: 1.5rem;
  font-size: 0;
}

.buttons button {
  cursor: pointer;
  border: 1px solid silver;
  border-right-width: 0;
  background-color: #f8f8f8;
  font-size: 1rem;
  padding: 0.5rem;
  outline: none;
  transition-duration: 0.3s;
  margin: 0;
}

.buttons button:first-child {
  border-top-left-radius: 0.3em;
  border-bottom-left-radius: 0.3em;
}

.buttons button:last-child {
  border-top-right-radius: 0.3em;
  border-bottom-right-radius: 0.3em;
  border-right-width: 1px;
}

.buttons button:hover {
  color: white;
  background-color: rgb(158, 159, 163);
  outline: none;
}

.buttons button.active {
  background-color: #0051B4;
  color: white;
}

		</style>
        -->
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

<!-- Chart Library files -->


<script src="<?php echo base_url(); ?>assets/code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/code/highcharts-3d.js"></script>
<script src="<?php echo base_url(); ?>assets/code/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/code/modules/export-data.js"></script>
<script src="<?php echo base_url(); ?>assets/code/modules/accessibility.js"></script>


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


<style type="text/css">
#container {
  height: 400px;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 1000px;
  margin: 0.5em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
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
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Gender Wise Zakat Registered Mustahiqeen</h3>
</div><!-- /.col -->

<div class="col-sm-4 div_align">

<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year;?></b> INSTALLMENT:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>
 




</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Main content -->

<figure class="highcharts-figure">
    <div id="donutContainer"></div>
    <p class="highcharts-description">
        Mustahiqeen registration details regarding Guzara Allowance, Marriage Assistance, Health Care, Deeni Madaris and Educational Stipend.
    </p>
</figure>

<!-- Guzara Allowance Gender wise distributation -->

<br />
<figure class="highcharts-figure">
    <div id="pieContainer"></div>
    <p class="highcharts-description">
        Division of Guzara Allowance Mustahiqeen based on gender.
    </p>
</figure>

<br />

<figure class="highcharts-figure">
    <div id="femaledvision"></div>
    <p class="highcharts-description">
        Category wise Division of Male and Female mustahiqeen.
    </p>
</figure>

</div>


</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>


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





<script type="text/javascript">
Highcharts.setOptions({
    colors: ['#50B432', '#00008b', '#EB981B', '#F84700', '#05DDE7']
});


Highcharts.chart('donutContainer', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
		
        }
    },
    title: {
        text: 'No. Of Mustahiqeen registered during the year <strong><?php echo $yearWiseReportGraph; ?> </strong>'
    },
    subtitle: {
        text: 'More Information......'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'No. Of Mustahiqeen',
        data: [
            ['Guzara Allowance', <?php echo $get_all_ga_mustahiq; ?>],
            ['Marriage Assistance', <?php echo $get_all_ma_mustahiq; ?>],
            ['Health Care', <?php echo $get_all_hc_mustahiq; ?>],
            ['Deeni Madaris', <?php echo $get_all_dm_mustahiq; ?>],
            ['Educational Stipend', <?php echo $get_all_esa_mustahiq; ?>]
        ]
    }]
});
</script>

<!-- Guzara Allowance Gender wise distributation -->



<script type="text/javascript">

Highcharts.setOptions({
    colors: ['#50B432', '#ED561B']
});

Highcharts.chart('pieContainer', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
		
        }
    },
    title: {
        text: 'Gender Wise Guzara Allowance Mustahiqeen Division for the Year <strong><?php echo $yearWiseReportGraph; ?> </strong>'
    },
    subtitle: {
        text: 'More Information......'
    },
    plotOptions: {
        pie: {
            innerSize: 150,
            depth: 45
        }
    },
    series: [{
        name: 'No. Of Mustahiqeen',
        data: [
            ['Male', <?php echo $get_all_ga_male; ?>],
            ['Female', <?php echo $get_all_ga_female; ?>]
        ]
    }]
});
</script>

<script type="text/javascript">
Highcharts.setOptions({
    colors: ['#50B432', '#ED561B']
});

Highcharts.chart('femaledvision', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Category Wise Division of Male and Female Mustahiqeen for the Year <strong><?php echo $yearWiseReportGraph; ?> </strong> '
    },
    subtitle: {
        text: 'Source: '
    },
    xAxis: {
        categories: [ '<strong>Disable</strong>', '<strong>Orphan</strong>', '<strong>Senior Citizen</strong>', '<strong>Widow</strong>' ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: '<strong>No. of Mustahiqeen</strong>',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Mustahiqeen'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Male Mustaiqeen = <?php echo $get_all_ga_male; ?>',
        data: [<?php echo $maleDisable;?>, <?php echo $maleOrphan;?>, <?php echo $malePoor;?>, <?php echo $maleWidow;?>]
    }, {
        name: 'Female Mustahiqeen = <?php echo $get_all_ga_female; ?>',
        data: [<?php echo $femaleDisable;?>, <?php echo $femaleOrphan;?>, <?php echo $femalePoor;?>, <?php echo $femaleWidow;?>]
    }]
});
		</script>


</body>
</html>
