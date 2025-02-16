<?php
$runpzf_query = $this->db->select_sum('pza_amount')->from('pza_fund')->where('status',1)->get();
$total_pzfreceived_amount = $runpzf_query->row('pza_amount');
$runpza_query = $this->db->select_sum('amount_allocated')->from('head_wise_fund')->where('status',1)->get();
$total_pzareceived_amount = $runpza_query->row('amount_allocated');
$gettotalnet_balance =  $total_pzfreceived_amount - $total_pzareceived_amount;

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

// Guzara Allowance Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('year',$getfinancial_year);

$get_all_ga_mustahiq = $this->db->get()->num_rows();


$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('status',1);
$this->db->where('Remarks','Approve');
$this->db->where('payment_status',1);

$get_all_paid_mustahiq = $this->db->get()->num_rows();
// Get Merriage Assisatance Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('MustahiqType','Marriage Assistance');
$this->db->where('year',$getfinancial_year);

$get_all_ma_mustahiq = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Marriage Assistance');
$this->db->where('payment_status',1);

$get_all_ma_paid_mustahiq = $this->db->get()->num_rows();

// Get Deeni Madaris Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Deeni Madaris');
$this->db->where('payment_status',1);

$get_all_dm_mustahiq = $this->db->get()->num_rows();


// Get Educational  Mustahiqeen
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Educational Stipend (A)');
$this->db->where('payment_status',1);
$get_all_esa_mustahiq = $this->db->get()->num_rows();

$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Educational Stipend (P)');
$this->db->where('payment_status',1);

$get_all_esp_mustahiq = $this->db->get()->num_rows();

$get_total_edu_mustahiq = $get_all_esa_mustahiq + $get_all_esp_mustahiq;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('secretary/include/title');?></title>

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


  <?php $this->load->view('secretary/include/nav_1');?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     
    
    <?php $this->load->view('secretary/include/profile_manue');?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
      
     <!--  <?php $this->load->view('secretary/include/user_manue');?> -->

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
          <div class="col-sm-10">
            <h3 class="m-0 text-dark">Head Wise Total Registered Mustahiqeen during <b><?php echo $getfinancial_year;?></b></h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $get_all_ga_mustahiq;?></h3>
                <p>Guzara Allowance</p>
              </div>
              <div class="icon">
                <i class="fas fa-hands-helping"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalGAList" target="_blank" class="small-box-footer">
               <strong> View Guzara Allowance List</strong>  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
           <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $get_all_ma_mustahiq;?></h3>
                <p>Marriage Assistance</p>
              </div>
              <div class="icon">
                <i class="fas fa-restroom"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalMAList" target="_blank" class="small-box-footer">
                View Marriage Assistance List <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
            <!-- /.info-box -->
         

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $get_all_dm_mustahiq;?></h3>
                <p>Deeni Madaris</p>
              </div>
              <div class="icon">
                <i class="fas fa-mosque"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalDMList" target="_blank" class="small-box-footer">
                <strong>Deeni Madaris Mustahiqeen List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $get_total_edu_mustahiq?></h3>
                <p>Educational Stipend</p>
              </div>
              <div class="icon">
                <i class="fas fa-school"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalESList" target="_blank" class="small-box-footer">
                <strong>Educational Stipend Mustahiqeen List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

        </div>

        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="m-0 text-dark">Head Wise Paid Mustahiqeen during <b><?php echo $getfinancial_year;?></b></h3>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $get_all_paid_mustahiq; ?></h3>
                <p>Guzara Allowance</p>
              </div>
              <div class="icon">
                <i class="fas fa-hands-helping"></i>
              </div>
               <a href="<?php echo base_url()?>Pza_head_wise_report/totalGAPaidList" target="_blank" class="small-box-footer">
                <strong>View Paid Guzara Allowance List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
           <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $get_all_ma_paid_mustahiq;?></h3>
                <p>Marriage Assistance</p>
              </div>
              <div class="icon">
                <i class="fas fa-restroom"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalMAPaidList" target="_blank" class="small-box-footer">
                <strong>Marriage Assistance Paid List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
            <!-- /.info-box -->
         

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $get_all_dm_mustahiq;?></h3>
                <p>Deeni Madaris</p>
              </div>
              <div class="icon">
                <i class="fas fa-mosque"></i>
              </div>
             <a href="<?php echo base_url()?>Pza_head_wise_report/totalDMList" target="_blank" class="small-box-footer">
                <strong>Deeni Madaris Mustahiqeen List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $get_total_edu_mustahiq;?></h3>
                <p>Educational Stipend</p>
              </div>
              <div class="icon">
                <i class="fas fa-school"></i>
              </div>
              <a href="<?php echo base_url()?>Pza_head_wise_report/totalESList" target="_blank" class="small-box-footer">
                <strong>Educational Stipend Mustahiqeen List</strong> <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Main Body -->
        
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
  

<!-- For data tables -->

</body>
</html>
