


<?php 

$numberOfPosts = $this->db->query("SELECT post_location,post_category, sum(total_posts) FROM add_post group by post_location, post_category");
$numberOfPosts = $numberOfPosts->result_array();

$filledHq = $this->db->query ("SELECT  *  FROM `add_post` WHERE `filled_vacant_status` = 'filled' AND `post_location` = 'Head Quarter Level'");

$filledHqPosts = $filledHq->num_rows();
 
//$filledHqPosts = $filledHq->num_rows();
//$getpayment_status = $this->db->get('table_name')->num_rows();
//$getpayment_status = $this->db->get()->num_rows();

$filledDistrict = $this->db->query ("SELECT * FROM `add_post` WHERE `filled_vacant_status` = 'filled' AND `post_location` = 'District Level'");


//$filledDistrict = $this->db->query ("SELECT `post_location`, COUNT(*) FROM `add_post` WHERE `filled_vacant_status` = 'filled' AND `post_location` = 'District Level'");

 $filledDistrictPosts = $filledDistrict->num_rows();

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
<strong>Success!</strong> <?php echo $error;?>
</div>
<?php	
}
?>



<div class="row mb-2">
<div class="col-sm-12 col-md-12 col-lg-12">
<h3 class="m-0 text-dark">Provincial Level Posts Summary (PZA Level) </h3>
</div><!-- /.col -->

<div class="col-sm-3 div_align">

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
<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Sanctions Posts (PZA Level)</span>
<span class="info-box-number" style="color: blue;">
  
<?php

echo $numberOfPosts[1]['sum(total_posts)'];  

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
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Filled Posts</span>
<span class="info-box-number" style="color: green;"> 
<?php echo $filledHqPosts;?> <br>
 </span>
<small class="info-box-number">
<?php 

$x = $numberOfPosts[1]['sum(total_posts)'];

$y = $filledHqPosts;
$z = ($y *100)/$x;

echo round($z).'%';
?>

</small>
</div>
</div>
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Vacant Posts</span>
<span class="info-box-number" style="color: red;">
<?php 
$vacantHq = $numberOfPosts[1]['sum(total_posts)'] -  $filledHqPosts;

echo $vacantHq;


?><br>
 </span>
<small class="info-box-number" style="color: red;">

<?php 


$x = $numberOfPosts[1]['sum(total_posts)'];

$y = $vacantHq;
$z = ($y *100)/$x;

echo round($z).'%';
?>

</small>
</div>
</div>
</div>


</div>



<div class="row mb-2">
<div class="col-sm-12 col-md-12 col-lg-12">
<h3 class="m-0 text-dark">District Level Zakat & Ushr Posts Summary </h3>
</div><!-- /.col -->

<div class="col-sm-3 div_align">

</div><!-- /.col -->
</div>

<div class="row">
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box">
<span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Sanctions Posts (District Level)</span>
<span class="info-box-number" style="color: blue;">
  
<?php

echo $numberOfPosts[0]['sum(total_posts)']; 

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
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Filled Posts</span>
<span class="info-box-number" style="color: green;"> 
<?php 

echo $filledDistrictPosts;

?>
 <br>
 </span>
<small class="info-box-number">

<?php 

$x = $numberOfPosts[0]['sum(total_posts)'];

$y = $filledDistrictPosts;
$z = ($y *100)/$x;

echo round($z).'%';

?>

</small>
</div>
</div>
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>
<div class="info-box-content text_align">
<span class="info-box-number">Total Vacant Posts</span>
<span class="info-box-number" style="color: red;">
<?php 

$districtVacant = $numberOfPosts[0]['sum(total_posts)'] - $filledDistrictPosts;
echo $districtVacant;

?> <br>
 </span>
<small class="info-box-number" style="color: red;">


<?php 

$x = $numberOfPosts[0]['sum(total_posts)'];

$y = $districtVacant;
$z = ($y *100)/$x;

echo round($z).'%';


?>

</small>
</div>
</div>
</div>


</div>





<!-- Main Body -->




<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">List of All Posts Zakat & Ushr Department</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Post Name</th>
<th>BPS</th>
<th>Post Status</th>
<th>Post Location</th>
<th>Post Category</th>
<th>District</th>
<th>No. of Posts</th>
<th>Filled/Vacant</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_posts_list))
{
foreach($get_posts_list as $post_list)
{
?>
<tr>

<td><?php echo $i;?></td>

<?php $desig_id = $post_list['designation'];?>

<td><?php echo $post_list['post_name'];?></td>
<td><?php echo $post_list['bps']; ?></td>
<td><?php echo $post_list['post_status']; ?> </td>
<td><?php echo $post_list['post_location']; ?></td>
<td><?php echo $post_list['post_category']; ?></td>
<td> <?php echo $post_list['district_name']; ?></td>

<td><?php  echo $post_list['no_of_posts'];?></td>

<td>

<a type="button" class="glyphicon glyphicon-check btn-sm btn btn-success" href="<?php echo base_url();?>Pza_employees/employees_details/<?php echo $post_list['id']; ?>"> <i class="fas fa-eye"></i> </a>

<button type="button" class="glyphicon glyphicon-check btn btn-sm btn-primary" data-toggle="modal" data-target=".update"> <i class="fas fa-edit"></i> </button></td>

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


<!--Headquarter List-->




<div class="row">


<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">List of All Posts Headquarter Level (PZA) Zakat & Ushr Department</h3>
</div>

<div class="card-body">
<table id="tableHq" class="table table-bordered table-striped">
<thead>
<tr>
<th>S #</th>
<th>Post Name</th>
<th>BPS</th>
<th>Post Status</th>
<th>Post Location</th>
<th>Post Category</th>
<th>No. of Posts</th>
<th>Filled/Vacant</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_postsHq_list))
{
foreach($get_postsHq_list as $postHq_list)
{
?>
<tr>

<td><?php echo $i;?></td>



<td><?php echo $postHq_list['post_name'];?></td>
<td><?php echo $postHq_list['bps']; ?></td>
<td><?php echo $postHq_list['post_status']; ?> </td>
<td><?php echo $postHq_list['post_location']; ?></td>
<td><?php echo $postHq_list['post_category']; ?></td>
<td><?php  echo $postHq_list['no_of_posts'];?></td>

<td>

<a type="button" class="glyphicon glyphicon-check btn-sm btn btn-success" href="<?php echo base_url();?>Pza_employees/employees_details/<?php echo $post_list['id']; ?>"> <i class="fas fa-eye"></i> </a>

<button type="button" class="glyphicon glyphicon-check btn btn-sm btn-primary" data-toggle="modal" data-target=".update"> <i class="fas fa-edit"></i> </button></td>

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
$('#tableHq').DataTable({
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



<script>
  
// -------------  Posting district div -------------//

$('#post_location').on('change',function(){
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
