<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> Zakat Mustahiqeen List<?php // $this->load->view('pza/include/title');?></title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


<!-- Select 2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



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

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #0066ff;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    color: #fff;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
}

</style>
<!-- <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> -->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">



<?php // $this->load->view('pza/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('pza/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('pza/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php // $this->load->view('pza/include/sidebar');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<style>
.text_align{
text-align: right;
}
</style>

<div id="userstatus"></div>

<form method="post" target="_blank" action="<?php echo base_url(); ?>Pza_lzcwise_report/getlzc_mustahiqeens/" enctype="multipart/form-data">


<div class="row">

<div class="col-md-3"><label>District Name:</label></div>
<div class="col-md-3">
<select required class="form-control" id="distt" name="district_idget">
<option value="ddd">---Select District----</option>
<?php

$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>

<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>
<div class="col-md-3"><label>Select Financial Year:</label></div>
<div class="col-md-3">
<select class="form-control" id="financial_year" name="year">
<option>---Select Year----</option>
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

</div>


<br><br>
<div class="col-md-12"><label>LZC Name</label></div>
<div class="col-md-12">


<select id="lzc_name_id" name="lzc_name[]" class="form-control col-md-10 col-sm-10 select2-purple select2" multiple="multiple" data-placeholder="Select LCS" data-dropdown-css-class="select2-purple">
</select>
*Press Ctrl to select multiple LZCs

</div>
<br><br>
<div class="col-md-12"><label>Number of LZCs to show</label></div>
<div class="col-md-12">

<select class="form-control" id="lzc_counts" name="lzc_counts">
<option value="1500">---All----</option>
<option value="1">1</option>
<option value="25">25</option>
<option value="50">50</option>
<option value="100">100</option>
<option value="150">150</option>
<option value="200">200</option>
<option value="250">250</option>
<option value="300">300</option>
<option value="350">350</option>
<option value="400">400</option>
<option value="450">450</option>
<option value="500">500</option>

</select>

</div>

</div>
<br>



<input type="submit" name="submit" value="Submit" class="btn btn-primary">




</form>

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



<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>


<script>
$('#distt').on('change',function()
{
var dist_value = $("#distt").val();	

/*$('#financial_year').on('change',function()
{
var year_value = $("#financial_year").val();*/	

if(dist_value != '')
{	
$.ajax({
url:"<?php echo base_url(); ?>Pza_lzcwise_report/fetch_lzcsvalues",
method:"POST",
beforeSend: function() 
{
$("#userstatus").html('<img src="<?php echo base_url(); ?>/assets/images/loader.gif">');
},
data:{dist_value : dist_value},
success:function(data)
{
$("#userstatus").fadeOut();	
$('#lzc_name_id').html(data);
}
});
}
else
{
$("#userstatus").text('Please select District and Institute Type.');	
}

});

   
</script>



<script>
$(function () {
//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
theme: 'bootstrap4'
})

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()

//Date range picker
$('#reservationdate').datetimepicker({
format: 'L'
});
//Date range picker
$('#reservation').daterangepicker()
//Date range picker with time picker
$('#reservationtime').daterangepicker({
timePicker: true,
timePickerIncrement: 30,
locale: {
format: 'MM/DD/YYYY hh:mm A'
}
})
//Date range as a button
$('#daterange-btn').daterangepicker(
{
ranges   : {
'Today'       : [moment(), moment()],
'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
'Last 30 Days': [moment().subtract(29, 'days'), moment()],
'This Month'  : [moment().startOf('month'), moment().endOf('month')],
'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
},
startDate: moment().subtract(29, 'days'),
endDate  : moment()
},
function (start, end) {
$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
}
)

//Timepicker
$('#timepicker').datetimepicker({
format: 'LT'
})

//Bootstrap Duallistbox
$('.duallistbox').bootstrapDualListbox()

//Colorpicker
$('.my-colorpicker1').colorpicker()
//color picker with addon
$('.my-colorpicker2').colorpicker()

$('.my-colorpicker2').on('colorpickerChange', function(event) {
$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
});

$("input[data-bootstrap-switch]").each(function(){
$(this).bootstrapSwitch('state', $(this).prop('checked'));
});

})

</script>











</body>
</html>
