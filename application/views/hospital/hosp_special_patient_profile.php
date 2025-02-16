<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');


$userid = $this->session->userdata('id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');

$patient_id = $this->uri->segment(3);
$get_patient_name = $this->db->select('*')->from('patients')->where('id',$patient_id)->get();
$patient_name = $get_patient_name->row('pt_name');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('hospital/include/title');?>
</title>

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
#td_size 
{
font-size: 14px;
}

</style>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-footer-fixed">
<div class="wrapper">


<?php $this->load->view('hospital/include/nav');?>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->


<?php $this->load->view('hospital/include/profile_manue');?>



<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- <?php $this->load->view('hospital/include/user_manue');?> -->




<?php $this->load->view('hospital/include/sidebar');?>

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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>





<div class="row mb-2">
<div class="col-sm-6 col-md-8">
<h3 class="m-0 text-dark"><strong><?php echo $hospital_name;?></strong> Hospital Special Patient's Profile</h3>

</div>

<div class="col-md-4">
	<a href="dashboard.php" style="color: white;"><button class="btn btn-primary" > Go Back to Dashboard </button></a>
<input type="button" class="btn btn-success float-right" onclick="printDiv('printableArea')" value="Print Report" />


</div>
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row"></div>


<!-- <nav class="navbar navbar-expand navbar-white navbar-light"></nav> -->
<!-- Main content -->
<section class="content">


<div class="row">
<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title"> <strong>Patient's Complete Profile</strong> </h3>

</div>
<!-- /.card-header -->

<div class="card-body">
<h3 style="font-style: oblique;"><u>Patient's Personal Details</u></h3>
<!-- Search form 1-->
<div class="row"></div>
<table id="" class="table table-bordered table-striped">
<thead>
<tr>
<th colspan="2" style="font-size: 20px;">Hospital Name</th>

<td colspan="6" style="font-size: 20px; font-weight: bold;">
<?php 

echo $hospital_name = $get_hosp_name->row('name');
?></td>
</tr>
</thead>
<tbody>



<tr>

<th id="td_size">OPD No</th>
<td id="td_size"><?php echo $get_patient_name->row('opd_no');?></td>
<th id="td_size">Istehqaq No</th>
<td id="td_size"> <?php echo $get_patient_name->row('Istehqaq_no');?></td>
<th id="td_size">Patient' Name</th>
<td id="td_size"><?php echo $get_patient_name->row('pt_name');?></td>
<th id="td_size">Father Name</th>
<td id="td_size"><?php echo $get_patient_name->row('fh_name');?></td>
</tr>


<tr>
<th id="td_size">CNIC/Form-B</th>
<td id="td_size"><?php echo $get_patient_name->row('pt_cnic');?></td>
<th id="td_size">Age</th>
<td id="td_size"><?php echo $get_patient_name->row('age');?></td>
<th id="td_size">Gender</th>
<td id="td_size"><?php echo $get_patient_name->row('gender');?> </td>
<th id="td_size">District Name</th>
<td id="td_size">
<?php 
$district_id = $get_patient_name->row('district');


$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
echo $district_name = $get_dist_name->row('district_name');

?> 
</td>
</tr>
<tr>
<th id="td_size">LZC Name</th>
<td id="td_size">
<?php 
$lzc_id = $get_patient_name->row('lzc');
$get_lza_qry = $this->db->select('*')->from('lzc_list')->where('id',$lzc_id)->get();
echo $lzc_name = $get_lza_qry->row('lzc_name');
?>	

</td>
<th id="td_size">Patient's Catagory</th>
<td id="td_size"><?php echo $get_patient_name->row('pt_catagory');?></td>
<th id="td_size">Admission Date</th>
<td id="td_size"><?php echo $get_patient_name->row('admin_date');?></td>
<th id="td_size">Discharge Date</th>
<td id="td_size"><?php echo $get_patient_name->row('discharge_date');?></td>
</tr>
<tr>
<th id="td_size">Cell No</th>
<td id="td_size"><?php echo $get_patient_name->row('cell_no');?></td>
<th id="td_size">Disease Type</th>
<td colspan="5"><?php echo $get_patient_name->row('disease');?></td>
</tr>


</tbody>
</table>
<br>
<h3 style="font-style: oblique;"><u>Patient's Medication History</u></h3>
<table id="" class="table table-bordered table-striped">
<tbody>

<tr>
<th>Sr#</th>
<th>Medicine Name</th>
<th>Price Per Unit</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Date</th>
</tr>

<?php
$this->db->select("*");
$this->db->where("pt_id",$patient_id);
$this->db->where("treatment_type",1);
$query = $this->db->get('pt_treatment');

$query = $query->result();
$i=1;
foreach ($query as $get_pt_treatment) 
{
  $get_pt_treatment->pt_id;

?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_pt_treatment->get_type_name;?></td>
<td><?php echo $get_pt_treatment->unit_price;?></td>
<td><?php echo $get_pt_treatment->quantity;?></td>
<td><?php echo $get_pt_treatment->total_price;?></td>
<td> <?php echo $get_pt_treatment->add_date;?></td>
</tr>
<?php
$i++;
}
?>
</tbody>
                    
</table>

<br>

<h3 style="font-style: oblique;"><u>Patient's Tests History</u></h3>
<table id="" class="table table-bordered table-striped">
<tbody>

<tr>
<th>Sr#</th>
<th>Test Name</th>
<th>Price Per Unit</th>
<th>Quantity</th>
<th>Total Price</th>
<th>Date</th>
</tr>

<?php
$this->db->select("*");
$this->db->where("pt_id",$patient_id);
$this->db->where("treatment_type",2);
$query = $this->db->get('pt_treatment');

$query = $query->result();
$i=1;
foreach ($query as $get_pt_treatment) 
{
  $get_pt_treatment->pt_id;

?>


<tr>

<td><?php echo $i;?></td>
<td><?php echo $get_pt_treatment->get_type_name;?></td>
<td><?php echo $get_pt_treatment->unit_price;?></td>
<td><?php echo $get_pt_treatment->quantity;?></td>
<td><?php echo $get_pt_treatment->total_price;?></td>
<td> <?php echo $get_pt_treatment->add_date;?></td>
</tr>
<?php
$i++;
}
?>

</tbody>
                    
</table>

<br>

<h3 style="font-style: oblique;"><u>Patient's Surgery Details</u></h3>

<table id="" class="table table-striped table-bordered">
<tbody>

<tr>
<th>Sr#</th>
<th>Surgery Type</th>
<th>Surgen Name</th>
<th>Surgery Result</th>
<th>Surgen Fee</th>
<th>Date</th>
</tr>

<?php
$this->db->select("*");
$this->db->where("pt_id",$patient_id);
$this->db->where("treatment_type",3);
$query = $this->db->get('pt_treatment');

$query = $query->result();
$i=1;
foreach ($query as $get_pt_treatment) 
{
  $get_pt_treatment->pt_id;

?>

<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_pt_treatment->get_type_name;?></td>
<td><?php echo $get_pt_treatment->unit_price;?></td>
<td><?php echo $get_pt_treatment->quantity;?></td>
<td><?php echo $get_pt_treatment->total_price;?></td>
<td> <?php echo $get_pt_treatment->add_date;?></td>
</tr>
<?php
$i++;
}
?>

</tbody>
</table>
	

<br>
<h3 style="font-style: oblique;"> <u> Patient's Total Expenditure</u> </h3>
<table class="table table-striped table-bordered">
<tbody>

<tr style="color: black; font-weight: bold;">
<hr>
<div class="row">
<div class="col-md-3">
<h4 style="font-variant: ;">Total Amount</h4>
</div>
<div class="col-md-3">
</div>
<div class="col-md-4">
</div>
<div class="col-md-2">

<h3 class="heading_style">Rs.<?php echo $get_patient_name->row('total_expense');?>/-</h3>
</div>
</tr>
</tbody>
</div>
</table>

</div>
<!-- /.card-body -->
</div>

</div>
<!-- /.row -->

<div class="row"></div>



<!-- Main row -->

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
<footer class="main-footer">
<strong>Copyright &copy; 2020 <a href="#">Government of Khyber Pakhtunkhwa</a>.</strong>
All rights reserved
<div class="float-right d-none d-sm-inline-block">
<b>Developed By:</b> Muhammad Shahzad
</div>
</footer>
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


<!-- Script for hide and show option list in PZF entry form  -->
<script>
function toggleShared() {

payment_rec_from = document.getElementById('payment_rec_from').value;
district_list = document.getElementById('district_list');
accounthead = document.getElementById('accounthead');
hospital_list = document.getElementById('hospital_list');

if(payment_rec_from == 'District') {
district_list.style.display = 'block';
accounthead.style.display = 'block';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none';
}
else if(payment_rec_from =='Hospital')
{
hospital_list.style.display = 'block';
health_account_head.style.display = 'block';
district_list.style.display = 'none';
accounthead.style.display = 'none';
}
else
{
district_list.style.display = 'none';
accounthead.style.display = 'none';
hospital_list.style.display = 'none';
health_account_head.style.display = 'none'; 
}

} 

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
</script>
</body>
</html>
