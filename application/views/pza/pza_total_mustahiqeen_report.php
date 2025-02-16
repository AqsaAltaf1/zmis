<?php
$getfinancialdata = $this->db->select('financial_Year,installment')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');
/*
echo "<pre>";
print_r($totalMustahiqeen);
echo "</pre>";
*/


$gaMustahiqeen = $this->db->query("SELECT gender, count(*) as gender FROM `guzara_allowance_mustahiqeen` GROUP BY gender");
$gaMustahiqeen = $gaMustahiqeen->result_array();
$femaleMustahiqeen = $gaMustahiqeen[0]['gender'];
$maleMustahiqeen = $gaMustahiqeen[1]['gender'];
$totalMustahiqeen = $femaleMustahiqeen + $maleMustahiqeen;
//Category wise Total registered Mustahiqeen

$catWiseTotalMustahiqeen = $this->db->query("SELECT category, count(*) as catWiseTotalMustahiqeen FROM `guzara_allowance_mustahiqeen`  GROUP by category");
$catWiseTotalMustahiqeen = $catWiseTotalMustahiqeen->result_array();

$totalDisable = $catWiseTotalMustahiqeen[0]['catWiseTotalMustahiqeen'];
$totalOrphan = $catWiseTotalMustahiqeen[1]['catWiseTotalMustahiqeen'];
$totalPoor = $catWiseTotalMustahiqeen[2]['catWiseTotalMustahiqeen'];
$totalWidow = $catWiseTotalMustahiqeen[3]['catWiseTotalMustahiqeen'];

//Category wise Total paid Mustahiqeen
$mustahiqPaymentDetails = $this->db->query("SELECT category, count(*) as mustahiqPayment FROM `guzara_allowance_mustahiqeen` WHERE payment_status = 1 GROUP by category");
$mustahiqPaymentDetails = $mustahiqPaymentDetails->result_array();

$paidDisable = $mustahiqPaymentDetails[0]['mustahiqPayment'];
$paidOrphan = $mustahiqPaymentDetails[1]['mustahiqPayment'];
$paidPoor = $mustahiqPaymentDetails[2]['mustahiqPayment'];
$paidWidow = $mustahiqPaymentDetails[3]['mustahiqPayment'];
$totalPaidMustahiqeen = $paidDisable + $paidOrphan + $paidPoor + $paidWidow;
$totalUnPaidMustahiqeen = $totalMustahiqeen - $totalPaidMustahiqeen;
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
<h3 class="m-0 text-dark">Total Registered Mustahiqeen Details</h3>
</div><!-- /.col -->

<div class="col-sm-4 div_align">






</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
<div class="container-fluid">


</div>

<figure class="highcharts-figure">
    <div id="donutContainer"></div>
    <p class="highcharts-description">
        Total Registered Mustahiqeen in Guzara Allowance.
    </p>
</figure>

<!-- Guzara Allowance Gender wise distributation -->

<br />
<figure class="highcharts-figure">
    <div id="pieContainer"></div>
    <p class="highcharts-description">
        Division of Guzara Allowance Mustahiqeen on the basis of Payment.
    </p>
</figure>



<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Category wise paid and un-paid mustahiqeen details.
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
    colors: ['#50B432', '#00008b', '#ED561B']
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
        text: 'Total No. Of Mustahiqeen Registered in ZMIS System'
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
            ['Guzara Allowance', <?php echo $totalMustahiqeen; ?>],
            ['Male Mustahiqeen', <?php echo $maleMustahiqeen; ?>],
            ['Female Mustahiqeen', <?php echo $femaleMustahiqeen; ?>]
        ]
    }]
});
</script>

<!-- Guzara Allowance Gender wise distributation -->



<script type="text/javascript">

Highcharts.setOptions({
    colors: ['#36F1DA', '#C70039']
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
        text: 'Total Paid and Un-Paid Mustahiqeen'
    },
    subtitle: {
        text: ''
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
            ['Total Paid Mustahiqeen', <?php echo $totalPaidMustahiqeen; ?>],
            ['Total Un-Paid Mustahiqeen', <?php echo $totalUnPaidMustahiqeen; ?>]
        ]
    }]
});
</script>

<script type="text/javascript">
Highcharts.setOptions({
    colors: ['#ED561B', '#50B432']
});

Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Category Wise Paid and Un-Paid Mustahiqeen'
    },
    subtitle: {
        text: 'Source: '
    },
    xAxis: {
        categories: [ 'Disable', 'Orphan', 'Poor', 'Widow' ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No. of Mustahiqeen',
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
        name: 'Registered Mustaiqeen',
        data: [<?php echo $totalDisable; ?>, <?php echo $totalOrphan; ?>, <?php echo $totalPoor; ?>, <?php echo $totalWidow; ?>]
    }, {
        name: 'Paid Mustahiqeen',
        data: [<?php echo $paidDisable;?>, <?php echo $paidOrphan;?>, <?php echo $paidPoor;?>, <?php echo $paidWidow;?>]
    }]
});
		</script>




</body>
</html>
