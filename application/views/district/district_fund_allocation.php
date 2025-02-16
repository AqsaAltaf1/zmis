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
      
      <?php $this->load->view('pza/include/user_manue');?>

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
            <h3 class="m-0 text-dark">Summary of PZA Zakat Allocation to District Allocation </h3>
          </div><!-- /.col -->
          <div class="col-sm-4 div_align">
            <!-- <?php echo $year;?> and <?php echo $inst;?>  -->
<h5 class="m-0 text-dark" class="pull-right"> F/YEAR: <b> 2019-20</b> INSTALLMENT:<b style="color: black;"> 1</b> </h5>
            
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
          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Total Population</span>
                <span class="info-box-number" style="color: green; font-size: 15px;">
                  Population: <h7 style="color: black; font-size: 13px;">20,912,243 </h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  Total RZF: <h7 style="color: black; font-size: 13px;">692,000,000 </h7></span>
                <small class="info-box-number"></small>
              </div>
            
            </div>
           
          </div> -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Guzara Allowance</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
               <span class="info-box-number">Merriage Assistance</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Deeni Madaris</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Edu_Stipend (A)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Edu_Stipend (P)</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Health Care</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Admin Expenses</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">Amount: 415,200,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-tag"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Total</span>
                <span class="info-box-number">
                  <h7 style="color: green; font-size: 15px;">RZF: 692,000,000</h7></span> 
                 <span class="info-box-number" style="color: blue;">
                  <h7 style="color: blue; font-size: 15px;"> Disburse:0.00</h7>
                  <h7 style="color: red; font-size: 15px;">Balance: 0.00</h7></span>
                <small class="info-box-number"></small>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
       <!--  <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tag"></i></span>

              <div class="info-box-content text_align">
                <span class="info-box-text" >PZA Balance</span>
                <span class="info-box-number">
                  0.00
                  0
                  <small>%</small>
                </span>
              </div>
            </div>
          </div> -->

        </div>


<!-- Nave bar row -->
     
<!-- <div class="row mb-2">
<div class="col-md-8 col-sm-4">
<h3 class="text-dark">Head Wise Fund Allocation</h3>
</div>
<div class="col-md-4 col-sm-2">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus"></i>Head Wise Zakat Fund Allocation</button>
</div>
</div> -->




<!-- Main Form -->
<div class="row">
  

<div class="card col-12 col-md-12 col-sm-6">
<div class="card-header">
<h3 class="card-title">Population Based Zakat Fund Shares for KPK Districts (Provincial Level)</h3> <small>For Current Financial Year <strong>2015-16</strong> and Installment <strong>1</strong> </small>
</div>
<!-- /.card-header -->

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>District</th>  
<th>Population</th>
<th>Ratio</th>
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ESA</th>
<th>ESP</th>
<th>HC</th> 
<th>Total</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Interne</td>
<td>Win 95+</td>
<td> 4</td>
<td>X</td>
<td>Trident</td>
<td>Interne</td>
<td>Win 95+</td>
<td>X</td>
<td>Trident</td>
<td>Interne</td>
<td><button type="button" class="glyphicon glyphicon-check btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $i1;?>"> <i class="fas fa-edit">Update</button></td>
</tbody>
<!-- update_pzf_fund.php?pid=<?php echo $getdata['id'];?> -->

    <!-- <?php
                            

                              $total_RZF;

                              $i1 = 1;
                              $selectqry = "SELECT * FROM district_users order by id ASC";
                              $runselectqry = mysql_query($selectqry);
                              while($getdata = mysql_fetch_array($runselectqry))
                              {
                              ?>
                              <tr>
                              <td><?php echo $i1;?></td>
                              <td><?php echo $getdata['district_name'];?></td>
                              <td style="text-align: center;">
                                <?php 
                                 $population =  $getdata['population'];
                                echo $population_nf = number_format($population);

                              ?></td>
                              <td style="text-align: center;">
                                <?php  
                                $population_percent = $population * 100;
                                $dist_ratio = $population_percent/$total_population;
                                echo round ($dist_ratio,3)."%";
                                ?> 
                                </td>
                              <td>
                              <?php 
                              $dist_GA = $dist_ratio/100;
                              $dist_GA_amount = $dist_GA * $GA_60;
                              echo $dist_GA_amount_nf =number_format(round($dist_GA_amount));
                              ?>  
                              </td>

                              <td>
                              <?php 
                              $dist_MA = $dist_ratio/100;
                              $dist_MA_amount = $dist_MA * $MA_12;
                              echo $dist_MA_amount_nf =number_format(round($dist_MA_amount));
                              ?>  
                              </td>
                              <td>
                              <?php 
                              $dist_DM = $dist_ratio/100;
                              $dist_DM_amount = $dist_DM * $DM_10;
                              echo $dist_DM_amount_nf =number_format(round($dist_DM_amount));
                              ?>  
                              </td>

                              <td>
                              <?php 
                              $dist_ESA = $dist_ratio/100;
                              $dist_ESA_amount = $dist_ESA * ($ES_10/2);
                              echo $dist_ESA_amount_nf =number_format(round($dist_ESA_amount));
                              ?>  
                              </td>
                              <td>
                              <?php 
                              $dist_ESP = $dist_ratio/100;
                              $dist_ESP_amount = $dist_ESP * ($ES_10/2);
                              echo $dist_ESP_amount_nf =number_format(round($dist_ESP_amount));
                              ?>  
                              </td>


                              <td>
                              <?php 
                              $dist_HC = $dist_ratio/100;
                              $dist_HC_amount = $dist_HC * $HC_8;
                              echo $dist_HC_amount_nf =number_format(round($dist_HC_amount));
                              ?>  
                              </td>
                              
                              <td>
                                <?php 
                               $total_fund = $dist_GA_amount+$dist_MA_amount+$dist_DM_amount+$dist_ESA_amount+$dist_ESP_amount+$dist_HC_amount; 
                               echo $total_fund_nf = number_format($total_fund);
                               ?> 
                               </td>
                              
                              <td>

   

<?php 
}
?>   -->

<!--  <tfoot>
<tr>
<th>1</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot> -->
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

<?php include("include/footer.php");?>
 
 
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
