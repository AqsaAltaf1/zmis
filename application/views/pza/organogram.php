
<?php 

$numberOfPosts = $this->db->query("SELECT sum(total_posts) FROM add_post");
$numberOfPosts = $numberOfPosts->result_array();

$vacantPosts = $this->db->query("SELECT sum(no_of_posts) FROM add_post");
$vacantPosts = $vacantPosts->result_array();
 

$this->db->select("*");
$this->db->from("employees");
$totalFilledPosts = $this->db->get()->num_rows();


//$totalFilledPosts = $numberOfPosts[0]['sum(total_posts)'] - $vacantPosts[0]['sum(no_of_posts)'];
//$filledHqPosts = $filledHq->num_rows();
//$getpayment_status = $this->db->get('table_name')->num_rows();
//$getpayment_status = $this->db->get()->num_rows();



//$filledDistrict = $this->db->query ("SELECT `post_location`, COUNT(*) FROM `add_post` WHERE `filled_vacant_status` = 'filled' AND `post_location` = 'District Level'");



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
     
      
   <!--    <?php $this->load->view('pza/include/user_manue');?> -->

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
            <h3 class="m-0 text-dark">Organizational Structure Of Zakat & Ushr Department</h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->

            
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
                <span class="info-box-number">Total Sanctions Posts</span>
                <span class="info-box-number" style="color: blue;">
                  <?php echo $numberOfPosts [0]['sum(total_posts)'];?> <br>
                </span>
                <small class="info-box-number">100%</small>
              </div>
            </div>
        
          </div>
         <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Total Filled Posts</span>
                <span class="info-box-number" style="color: green;"> 
                <?php echo $totalFilledPosts;?> <br>
                 </span>
                <small class="info-box-number">
                <?php 
				$x = $numberOfPosts [0]['sum(total_posts)'];
				$y = $totalFilledPosts;
				$z = $y *100/$x;
				echo round($z).'%';
				?>
                
                </small>
              </div>
         
            </div>
          </div>
         <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-number">Total Vacant Posts</span>
                <span class="info-box-number" style="color: red;">
               <?php echo $vacantPosts = $numberOfPosts [0]['sum(total_posts)'] - $totalFilledPosts ;?> <br>
                 </span>
                <small class="info-box-number">
                 <?php 
				$x = $numberOfPosts [0]['sum(total_posts)'];
				$y = $vacantPosts;
				$z = $y *100/$x;
				echo round($z).'%';
				?></small>
              </div>
              
            </div>
         
          </div>
          
 
 
          
<?php
$i=1;
if(!empty($get_all_posts))
{
foreach($get_all_posts as $get_posts)
{
	
$this->db->select("*");
$this->db->from("employees");
$this->db->where("designation",$get_posts['post_name']);
$total_filled_post = $this->db->get()->num_rows();

$total_post = $get_posts['countvlaue'];
$get_vacant_post = $total_post - $total_filled_post;

?>
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box" style="background-color:#009900; color:#FFF;">
<!--<span class="info-box-icon"><i class="fas fa-university"></i></span>-->
<div class="info-box-content">
<span class="info-box-text"><?php echo $get_posts['post_name']?> :<strong><?php echo $get_posts['countvlaue']?></strong>   </span>
<span class="info-box-number">
</span>
<div class="progress">
<?php 
$filledPercent = $total_filled_post * 100/$get_posts['countvlaue'];
?>
<div class="progress-bar" style="width: <?php echo round($filledPercent).'%';?>"> <?php echo round($filledPercent).'%'?></div>
</div>
<span class="progress-description">

Filled Posts:  
<?php 

$this->db->select("*");
$this->db->from("employees");
$this->db->where("designation",$get_posts['post_name']);
echo $total_filled_post = $this->db->get()->num_rows();
?> <br>

Vacant Posts: 
<?php 
$total_post = $get_posts['countvlaue'];
$get_vacant_post = $total_post - $total_filled_post;
echo $get_vacant_post;
?>


 <br>
</span>
</div>
</div>
</div>
<?php 
$i++;
}
}
?>



        </div>


<!-- Nave bar row -->
     
<div class="row mb-2"></div>



<!-- Main Form -->
<div class="row">
	
	<h2> <b>Provincial Level Setup: </b> </h2>
         <img src="<?php echo base_url(); ?>/assets/images/PZA_org.png" class="col-md-12" width="auto" height="auto" >
		 <br /> <br /> 

		 <h2> <b>District Level Setup: </b> </h2>
         <img src="<?php echo base_url(); ?>/assets/images/Dist_org.png" class="col-md-12"  width="auto" height="auto" >
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
