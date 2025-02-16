<?php

// $get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
// $district_name = $get_dist_name->row('district_name');

$get_employee_id = $this->uri->segment(3);

if(isset($get_employee_id))
{
$get_employee_query = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
$employee_name = $get_employee_query->row('emp_name');
}
// get Designation
$get_designation_id = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
$employee_designation_id = $get_designation_id->row('designation');

$get_designation_query = $this->db->select('*')->from('add_post')->where('id',$get_employee_id)->get();
$employee_designation = $get_designation_query->row('post_name');



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

.timeline>div>.timeline-item>.timeline-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
    color: #495057;
    font-size: 16px;
    line-height: 25px;
    margin: 0;
    padding: 10px;
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
<div class="row mb-2">
<div class="col-sm-12">
<h3 class="m-0 text-dark">Profile of Mr.<strong><?php echo $employee_name; ?></strong> Designation: <strong><?php echo $employee_designation; ?></strong>  of Zakat & Ushr Department</h3>
</div><!-- /.col -->
<div class="col-sm-4 div_align">


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
<div class="row"></div>


<!-- Nave bar row -->

<div class="row mb-2"></div>



<!-- Main Form -->
<div class="row">
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">



<!-- Profile Image -->
<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle"
src="<?php echo base_url(); ?>assets/uploads/<?php echo $get_employee_query->row('picture');?>" 
alt="User profile picture">
<div class="ribbon-wrapper ribbon-xl">
<div class="ribbon bg-success text-md">
<strong><?php echo $employee_name; ?></strong>
</div>
</div>
</div>

<h3 class="profile-username text-center"><strong><?php echo $employee_name; ?></strong></h3>

<p class="text-muted text-center"><strong><?php echo $employee_designation; ?></strong></p>

<ul class="list-group list-group-unbordered mb-3">
<li class="list-group-item">
<b>Posting Station</b> <a class="float-right">

<?php
$get_employee_station = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
$employee_station = $get_employee_station->row('post_location');


if ($employee_station == "Head Quarter Level") 
{
echo "Head Quarter Level";
}
else
{
$district_id = $get_employee_station->row('posting_stat');
$get_dist = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$dist_name = $get_dist->row('district_name');
echo $dist_name;
}
?>


</a>
</li>
<li class="list-group-item">
<b>Service Length</b> <a class="float-right">


<?php
$sdate = $get_employee_query->row('appointment_date');
$edate = date("Y-m-d");

$date_diff = abs(strtotime($edate) - strtotime($sdate));

$years = floor($date_diff / (365*60*60*24));
$months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d years, %d months, %d days", $years, $months, $days);
printf("\n");


?>

</a>
</li>
<!-- <li class="list-group-item">
<b>Friends</b> <a class="float-right">13,287</a>
</li> -->
</ul>

<!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->

<!-- About Me Box -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">About Me</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
<strong><i class="fas fa-book mr-1"></i> Education</strong>

<p class="text-muted">
<?php 
$get_employee_education = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
echo $employee_education = $get_employee_education->row('qualification');

?>
</p>

<hr>

<strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

<p class="text-muted">
<?php 
$get_employee_address = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
echo $employee_address = $get_employee_address->row('address');
?>
</p>

<hr>

<strong><i class="fas fa-pencil-alt mr-1"></i> Personal Skills</strong>

<p class="text-muted">
<?php 
$get_employee_skill = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
echo $employee_skill = $get_employee_skill->row('skills');
?>
</p>

<hr>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#job" data-toggle="tab">Job Description</a></li>
  
  
<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Posting/Transfer</a></li>
            



</ul>
</div><!-- /.card-header -->
<div class="card-body" style="width:800px;">
<div class="tab-content">
<div class="active tab-pane" id="job">
<!-- Post -->
<div class="post">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/uploads/<?php echo $get_employee_query->row('picture');?>" alt="user image">
<span class="username">
<a href="#"><strong><?php echo $employee_name; ?></strong></a>

</span>
<span class="description">

Seen on  
<strong>
<?php
echo date("m/d/Y")." ";
echo "on " . date("l");
?>
</strong>

</span>
</div>
<!-- /.user-block -->
<p>
<?php 
$get_employee_jd = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
echo $employee_jd = $get_employee_jd->row('job_description');
?>
</p>

</div>

<div class="post clearfix"><!-- 
<div class="user-block">
<img class="img-circle img-bordered-sm" src="../dist/img/user7-128x128.jpg" alt="User Image">
<span class="username">
<a href="#">Sarah Ross</a>
<a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
</span>
<span class="description">Sent you a message - 3 days ago</span>
</div>

<p>
Lorem ipsum represents a long-held tradition for designers,
typographers and the like. Some people hate it and argue for
its demise, but others ignore the hate as they create awesome
tools to help create filler text for everyone from bacon lovers
to Charlie Sheen fans.
</p>

<form class="form-horizontal">
<div class="input-group input-group-sm mb-0">
<input class="form-control form-control-sm" placeholder="Response">
<div class="input-group-append">
<button type="submit" class="btn btn-danger">Send</button>
</div>
</div>
</form>
--></div>

</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="timeline">
<!-- The timeline -->
<div class="timeline timeline-inverse">



<div class="time-label">
<span class="bg-success">
<?php echo date("d-M-Y",strtotime($get_employee_query->row('appointment_date')));?>
</span>
</div>
<div>
<i class="fas fa-user bg-primary"></i>

<div class="timeline-item">
<!--<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>-->

<h3 class="timeline-header"><a href="#">First Posting</a> as 

<?php echo $employee_designation;?>


 in District/HQ "
 
 <?php
$get_employee_station = $this->db->select('*')->from('employees')->where('id',$get_employee_id)->get();
$employee_station = $get_employee_station->row('post_location');


if ($employee_station == "Head Quarter Level") 
{
echo "Head Quarter Level";
}
else
{
$district_id = $get_employee_station->row('posting_stat');
$get_dist = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
$dist_name = $get_dist->row('district_name');
echo $dist_name;
}
?> "
 
 and have been performed following duties </h3>

<div class="timeline-body">


<?php echo $get_employee_query->row('job_description');?>




</div>
<div class="timeline-footer">
</div>
</div>
</div>



<?php
$this->db->select("*");
$this->db->where("employee_name",$get_employee_id);
$query = $this->db->get('posting_transfer');
$query = $query->result();

//echo $this->db->last_query();

foreach ($query as $getemployeeinfo) 
{
 //echo $getmonth->month_id;



?>
<div class="time-label">
<span class="bg-success">
3 Jan. 2017
</span>
</div>
<div>
<i class="fas fa-user bg-purple"></i>
<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>
<h3 class="timeline-header"><a href="#">Next Posting</a> as 

<?php
$new_desig = $getemployeeinfo->new_desig;
$get_dist_name = $this->db->select('*')->from('add_post')->where('id',$new_desig)->get();
echo $post_name = $get_dist_name->row('post_name');



?>


 in District/HQ   
 
 "
 
<?php

$posted_to = $getemployeeinfo->posted_to;

if ($posted_to == "Head Quarter Level") 
{
echo "Head Quarter Level";
}
else
{
$posted_to_id = $getemployeeinfo->posted_to_id;
$get_dist = $this->db->select('*')->from('district_users')->where('id',$posted_to_id)->get();
$dist_name = $get_dist->row('district_name');
echo $dist_name;
}
?>
 
 "
 
 
 
 
   and have been performed following duties </h3>
<div class="timeline-body">

<?php
echo $getemployeeinfo->description;
?>

</div>
<div class="timeline-footer">
</div>
</div>
</div>

<?php
}
?>







</div>
</div>
<!-- /.tab-pane -->


<!-- /.tab-pane -->
</div>
<!-- /.tab-content -->
</div><!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>

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
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard2.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


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
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false,
"responsive": true,
});
});
</script>
</body>
</html>
