<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

foreach($emp_info as $emp_info_values)
{
	$emp_info_values['personal_no'];
	
}

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
<!-- Select 2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

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
<strong>Failed !</strong> <?php echo $error;?>
</div>
<?php	
}
?>


<div class="row mb-2">
<div class="col-sm-8">
<h3 class="m-0 text-dark">Posting Transfer Portal of Zakat & Ushr Department</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Nave bar row -->
<!-- <div class="row navbar-white navbar-light">

<div class="col-sm-6 col-md-12">
<h3 class="m-0 text-dark">Welcome to Provincial Zakat Administration (PZA) Fund Allocation</h3>
</div>
</div>
<br> -->

<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">


<!-- Info boxes -->
<div class="row"></div>

<!-- Main row -->
<div class="row">
<div class="col-md-1"></div>
<div class="card card-primary col-md-12 col-sm-12 col-xs-12">
<div class="card-header">
<h3 class="card-title">Posting Transfer Form</h3>
</div>
<!-- /.card-header -->
<!-- form start -->





<div class="card-body">

<form role="form" id="pzafund" action="<?php echo base_url();?>Pza_posting_transfer/pza_employees_transfer/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3">Employee CNIC<span class="required">*</span>
</label>
<input required type="text" style="margin-right:3px;" name="emp_cnic" data-inputmask='"mask": "99999-9999999-9"' data-mask  class="form-control col-md-7 col-sm-6 col-xs-12" value="">
<button class="btn btn-success col-md-1 col-sm-1 col-xs-1">Find</button>
</div>

</form>

<form role="form" id="pzafund" action="<?php echo base_url(); ?>Pza_posting_transfer/manage_pza_employees_transfer/" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-3" for="check">Personal No<span class="required">*</span>
</label>
<input type="text" id="personal_no" name="personal_no" required class="form-control col-md-8 col-sm-6 col-xs-12" value="<?php echo $emp_info_values['personal_no'];?>" readonly>
</div>

<div class="row form-group">
<label class="col-md-3" for="check">Employee Name<span class="required">*</span>
</label>
<input type="text" id="emp_name" name="emp_name" required class="form-control col-md-8 col-sm-6 col-xs-12" value="<?php echo $emp_info_values['emp_name'];?>" readonly>
</div>

<?php 
$designation_id = $emp_info_values['designation'];
$get_designation = $this->db->select('*')->from('add_post')->where('id',$designation_id)->get();
$designation_name = $get_designation->row('post_name');
?>

<div class="row form-group">
<label class="col-md-3" for="check">Employee Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="new_desig">

<?php
if(isset($designation_name))
{
?>
<option style="background:#0C0;" value="<?php echo $designation_id;?>"><?php echo $designation_name;?></option>
<?php
}
else
{
?>
<option value="">----- Select ------</option>
<?php	
}
?>
<?php
$i=1;
if(!empty($get_designation_list))
{
foreach($get_designation_list as $designation_list)
{
?>

<?php echo $i;?>

<option value="<?php echo $designation_list['id']?>"><?php echo $designation_list['post_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>
</div>





<div class="row form-group">
<label class="col-md-3" for="check">Type<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="desig">
<option value="0">Only Transfer</option>
<option value="1">Transfer &amp; Promotion</option>
</select>
</div>







<div class="row form-group">
<label class="col-md-3" for="check">Current Posting Station<span class="required">*</span>
</label>




<?php 

$post_location = $emp_info_values['post_location'];

if($post_location == "Head Quarter Level")
{
	$current_posting_stattion = "Head Quarter Level";
}
else if($post_location == "District Level")
{
	
	
	$posting_stat = $emp_info_values['posting_stat'];
	$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$posting_stat)->get();
	$current_posting_stattion = $get_dist_name->row('district_name');

}

?>

<input type="text" id="current_posting" name="current_posting" required class="form-control col-md-8 col-sm-6 col-xs-12" value="<?php echo $current_posting_stattion;?>" readonly>

</div>


<div class="form-group row">
<label for="transfer_date" class="control-label col-md-3 col-sm-3 col-xs-12">Transfer Date </label>
<input type="date" id="transfer_date" value="<?php echo date("Y-d-m");?>" name="transfer_date" required class="form-control col-md-8 col-sm-6 col-xs-12">            
</div>


<div class="form-group row">
<label for="transfer_date" class="control-label col-md-3 col-sm-3 col-xs-12">Joining Date </label>
<input type="date" id="" value="<?php echo date("Y-d-m");?>" name="joined_on" required class="form-control col-md-8 col-sm-6 col-xs-12">            
</div>




<div class="form-group row">
<label for="transfer_date" class="control-label col-md-3 col-sm-3 col-xs-12">Posting Location </label>

<select class="form-control col-md-8 col-sm-6 col-xs-12" name="posted_to" id="posted_to">
<option value="">---Select One---</option>
<option value="Head Quarter Level">Head Quarter Level</option>
<option value="District Level">District Level</option>
</select>           
</div>

<div class="row form-group" id="district_div" style="display: none;" >
<label for="transfer_to" class="control-label col-md-3 col-sm-3 col-xs-12">Transfer To </label>
<select class="form-control col-md-8" id="district_id" name="district_name">
<option value="">---Select One----</option>
<?php
$i=1;
if(!empty($get_all_districts))
{
foreach($get_all_districts as $getdistricts)
{
?>

<?php echo $i;?>

<option value="<?php echo $getdistricts['id']?>"><?php echo $getdistricts['district_name']; ?></option>
<?php 
$i++;
}
}
?>
</select>            
</div>


<div class="form-group row">
<label for="pzfFund" class="control-label col-md-3 col-sm-3 col-xs-12">Job Description / Remarks</label>
<textarea id="remarks" required name="remarks" class="form-control col-md-8 col-sm-6 col-xs-12" rows="5"></textarea>                       
</div>
</div>
<!-- /.card-body -->

<div class="card-footer">
<input type="submit" class="btn btn-primary" name="sbmit_btn" value="Submit">
<button type="reset" class="btn btn-success float-right">Reset Form</button>
</div>


<input type="hidden" name="posting_stat" value="<?php echo $emp_info_values['posting_stat'];?>">
<input type="hidden" name="post_location" value="<?php echo $emp_info_values['post_location'];?>">
<input type="hidden" name="employee_id" value="<?php echo $emp_info_values['id'];?>">

<input type="hidden" name="current_desig" value="<?php echo $emp_info_values['designation'];?>">


</form>
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

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



<!-- For data tables -->


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

});


</script>




<script>

// -------------  Posting district div -------------//

$('#posted_to').on('change',function(){
if( $(this).val()==="District Level")
{
$("#district_div").slideDown();
}
else
{ 
$("#district_div").slideUp();
}
});
</script>




</body>
</html>
