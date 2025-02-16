<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$this->db->select("*");
$this->db->from("ma_mustahiqeen");
$this->db->where('district_id',$userid);
$this->db->where('approved_status',1);
$get_ma_approved_mustahiq = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("ma_mustahiqeen");
$this->db->where('district_id',$userid);
$this->db->where('payment_status',1);
$get_ma_paid_mustahiq = $this->db->get()->num_rows();

$this->db->select("*");
$this->db->from("ma_mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('district_id',$userid);
$get_all_ma_mustahiq = $this->db->get()->num_rows();


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


<?php $this->load->view('district/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('district/include/profile_manue');?>

<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('district/include/user_manue');?> -->

<!-- Sidebar Menu -->

<?php $this->load->view('district/include/sidebar');?>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 202px;">
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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>



<div class="row mb-2">
<div class="col-md-9">
<h4>Approval Summary of Most Vulnerable Mustahiqeen Regarding Marriage Assistance in respect of District <strong><?php echo $district_name;?></strong></h4>
</div><!-- /.col -->
<div class="col-sm-2 col-md-3 div_align">

<h5 class="m-0 text-dark"> F/YEAR: <b> <?php echo $getfinancial_year ?></b> INST:<b style="color: black;"> <?php echo $getfinancial_installment;?></b> </h5>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!-- Info boxes -->
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Most Vulnerable Mustahiqeen</span>
<span class="info-box-number" style="color: blue;">
<?php
$selectqry_pza = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_received_amount = $selectqry_pza->row('pza_amount');
echo number_format($selectqry_pza->row('pza_amount'),2);
?>
<br>
</span>
<small class="info-box-number">100%</small>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Approved Mustahiqeen</span>
<span class="info-box-number" style="color: green;"> 
<?php

echo $get_ma_approved_mustahiq;
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $get_all_ma_mustahiq;
$y = $get_ma_approved_mustahiq * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-minus"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Paid Mustahiqeen</span>
<span class="info-box-number" style="color: red;">
<?php
echo $get_ma_paid_mustahiq; 
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $get_ma_approved_mustahiq;
$y = $get_ma_paid_mustahiq * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div> 
<!-- /.col -->

<!-- <div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">In-Vulnerable</span>
<span class="info-box-number" style="color: red;">
<?php
$pza_balance = $total_received_amount - $total_hoa_amount;
$pza_balance_nf= number_format($pza_balance,2);
echo $pza_balance_nf;
?>
<br>
</span>
<small class="info-box-number">
<?php 
$x = $total_received_amount;
$y = $pza_balance * 100;
$z = $y/$x;
echo round($z)."%";
?>
</small>
</div>
</div>
</div> -->
<!-- /.col -->
</div>


<!-- Nave bar row -->

<div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Marriage Assistance Mustahiqeen Registration List (LZ-11)</h3>
</div>
<div class="col-md-4 col-sm-2">
<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Register GA Mustahiqeen</button> -->
</div>
</div>

<!-- Main Form -->
<div class="row">
<div class="col-12 col-md-12 col-sm-6">
<div class="card card-primary card-tabs">
<div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="lz_19-tab" data-toggle="pill" href="#lz_19" role="tab" aria-controls="lz_19" aria-selected="true">LZ-11 Mustahiqeen List</a>
</li>
<!-- <li class="nav-item">
<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Any other</a>
</li>
<li class="nav-item">
<a class="nav-link" id="lz_11-tab" data-toggle="pill" href="#lz_11" role="tab" aria-controls="lz_11" aria-selected="false">LZ-11</a>
</li> 
<li class="nav-item">
<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Add Deeni MAdrassa</a>
</li> -->
</ul>
</div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="lz_19" role="tabpanel" aria-labelledby="lz_19-tab">

<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Marriage Assistance (LZ-11) Mustahiqeen List of District <strong><?php echo $district_name;?></strong> during Year : <strong><?php echo $getfinancial_year;?></strong></h3>
<!-- Print list -->
<a target="_blank" href="printlist.php" class="btn btn-sm btn-primary float-right">Print List</a>
</div>
<!-- /.card-header -->
<div class="card-body">
<div class="row"></div>
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Age</th>
<th>Cell #</th>
<th>LZC</th>
<th>Category</th>
<th>Date</th>
<th>Action</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_all_approvedusers))
{
foreach($get_all_approvedusers as $approvedusers)
{
?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $approvedusers['mustahiq_name']?></td>
<td><?php echo $approvedusers['father_name']?></td>
<td><?php echo $approvedusers['mustahiq_cnic']?></td>
<td><?php echo $approvedusers['age']?></td>
<td><?php echo $approvedusers['contact_number']?></td>
<td><?php echo $approvedusers['LZCActualName'];?></td>
<td><?php echo $approvedusers['category']?></td>
<td><?php echo date("d-m-Y",strtotime($approvedusers['add_date']));?></td>
<td>

<?php
$get_dist_amountqry = $this->db->select('*')->from('dist_head_wise_fund')
->where('district_id',$userid)->where('lzc_institution_madrasa',$approvedusers['LZC_id'])->where('account_head',"Marriage Assistance")
->where('year',$getfinancial_year)->where('installment',$getfinancial_installment)->get();
$total_ma_dist_fund = $get_dist_amountqry->row('amount_allocated');

$get_dist_disbursment = $this->db->select_sum('payment_amount')->from('mustahiqeen_payments')
->where('district_id',$userid)->where('lzc_id',$approvedusers['LZC_id'])->where('financial_Year',$getfinancial_year)->where('MustahiqType','Marriage Assistance')->where('installment',$getfinancial_installment)->get();
$total_ma_disb_fund = $get_dist_disbursment->row('payment_amount');

$get_final_amount = $total_ma_dist_fund - $total_ma_disb_fund;

if($get_final_amount != 0)
{
?>
<a style="color:#fff;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#issue_check<?php echo $i;?>">Issue Check</a>
<?php 
}
else
{
?>

<button class="btn btn-danger btn-sm" style="font-weight:bold;">Fund Not Available</button>

<?php
}

?>




</td>
</tr>

<div class="modal fade" id="issue_check<?php echo $i;?>" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header pull-left">
<h4 class="modal-title" id="myModalLabel">Marriage Assistance Mustahiq Cheque out Details</h4>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
</button>

</div>
<div class="modal-body">

<form id="pzf_fund" onsubmit="return validate(<?php echo $i;?>)" action="<?php echo base_url(); ?>Dist_MA_lz_11/manage_ma_mustahiqeen_payment/" method="post" data-parsley-validate="" class="" enctype="multipart/form-data">

<div class="row form-group">
<label class="col-md-2" for="name">Available Fund <span class="required">*</span>
</label>
<input type="number" value="<?php echo $get_final_amount;?>" readonly class="form-control col-md-10 col-xs-12" name="available_fund" id="available_fund<?php echo $i;?>">
</div>



<div class="row form-group">
<label class="col-md-2" for="name">Name <span class="required">*</span>
</label>
<input type="text" name="name" id="name" value="<?php echo $approvedusers['mustahiq_name']?>" readonly class="form-control col-md-4 col-xs-12">

<label class="col-md-2" for="f_name">Father Name <span class="required">*</span>
</label>
<input type="text" name="f_name" id="f_name" value="<?php echo $approvedusers['father_name']?>" readonly class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="col-md-2" for="cnic">CNIC/Form-B <span class="required">*</span>
</label>
<input type="text" name="cnic" id="cnic" value="<?php echo $approvedusers['mustahiq_cnic']?>" readonly class="form-control col-md-4 col-xs-12">

<label class="col-md-2" for="mustahiq_category">Category <span class="required">*</span>
</label>
<input type="text" name="mustahiq_category" id="mustahiq_category" value="<?php echo $approvedusers['category']?>" readonly class="form-control col-md-4 col-xs-12">
</div>


<div class="row form-group">
<label class="control-label col-md-2" for="year">Financial Year <span class="required">*</span> </label>
<input type="text" id="financial_year" name="financial_Year" required class="form-control col-md-4" value="<?php echo $getfinancial_year;?>" readonly>

<label class="control-label col-md-2" for="installment">Installment <span class="required">*</span> </label>
<input type="text" id="installment" name="installment" required class="form-control col-md-4" value="<?php echo $getfinancial_installment;?>" readonly>
</div>

<div class="row form-group">
<label class="control-label col-md-2" for="bank_name">Bank Name <span class="required">*</span> </label>
<input type="text" name="bank_name" id="bank_name" required class="form-control col-md-4 col-xs-12">

<label class="control-label col-md-2" for="account">Account No <span class="required">*</span> </label>
<input type="text" name="account_number" id="account" required class="form-control col-md-4 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-2" for="cheque_no">Cheque No <span class="required">*</span> </label>
<input type="text" name="cheque_number" id="cheque_no" required class="form-control col-md-4 col-xs-12">

<label class="control-label col-md-2" for="salary">Amount <span class="required">*</span> </label>
<input type="number" max="<?php echo $get_final_amount;?>" name="payment_amount" id="paidable_amount<?php echo $i;?>" required class="form-control col-md-4 col-xs-12" value="30000" readonly>

</div>

<div class="row form-group">
<p class="col-md-12" id="error_div" style="display:none; text-align:center; color:#F00;"></p>
</div>

<div class="ln_solid"></div>
<hr>
<div class="row form-group">
<div class="col-md-2"></div>
<input style="margin-right:3px;" type="submit" class="btn btn-success" name="sbmitbtn" value="Submit">

<button style="margin-right:3px;" class="btn btn-primary col-md-2" type="reset">Reset</button>

<button  style="margin-right:3px;"class="btn btn-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>

</div>


<input type="hidden" name="user_id" value="<?php echo $approvedusers['id'];?>">
<input type="hidden" name="lzc_id" value="<?php echo $approvedusers['LZC_id'];?>">
<input type="hidden" name="lzcName" value="<?php echo $approvedusers['LZCActualName'];?>">
<input type="hidden" name="districtName" value="<?php echo $approvedusers['District_Name'];?>">

</form>
</div>
</div>
</div>
</div>







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
</div>
</div>

<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab"></div>



</div>
</div>
<!-- /.card -->
</div>
</div>
</div>

<div class="row"></div>

<!-- Table no 2 -->
<div class="row"></div>

<!-- Table No 3 -->
<div class="row"></div>
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
<!-- Bootstrap 4 -->
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

<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

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
<!-- For data tables -->
<script>
$(function () {
$("#example1").DataTable({
"responsive": true,
"autoWidth": false,
});
$('#example2').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});




function validate(row_id)
{
	
var get_available_fund = parseInt(document.getElementById('available_fund'+row_id).value);	
var get_paidable_amount = parseInt(document.getElementById('paidable_amount'+row_id).value);


//alert(get_available_fund);
//alert(get_paidable_amount);
	
if(get_available_fund < get_paidable_amount)	
{

$("#error_div").hide().fadeIn('slow').html('You have not sufficient amount...');

return false;	

}

return true;

}











</script>

</body>
</html>
