<?php

$getfinancialdata = $this->db->select('financial_Year')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$get_inst = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('id, district_name')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');


// Count all entries in GA table
$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$get_all_mustahiq = $this->db->get()->num_rows();


$this->db->select("year");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('payment_status',1);

$getTotalPaid = $this->db->get()->num_rows();

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
          <div class="col-sm-10">
            <h3 class="m-0 text-dark">Category Wise Total Registered Mustahiqeen During <b> <?php echo $getfinancial_year;?> </b></h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
 <div class="row">
 <div class="col-12 col-sm-6 col-md-4">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-female"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Registered GA Mustahiqeen</span>
<span class="info-box-number">
<?php 


echo $get_all_mustahiq;

$x = $get_all_mustahiq;
$y = $get_all_mustahiq *100;
$z = $y/$x;

?>
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php
echo round($z)."%";

?> of total Mustahiq
</span>
</div>
</div>
</div>
 
 <div class="col-12 col-sm-6 col-md-4">
</div>	
<div class="col-12 col-sm-6 col-md-4">
</div>	
 
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-female"></i></span>
<div class="info-box-content">
<span class="info-box-text">Widows</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Widow/Divorced');

echo $get_widows = $this->db->get()->num_rows();

$x = $get_all_mustahiq;
$y = $get_widows *100;
$z = $y/$x;

?>
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php
echo round($z)."%";

?> of total Mustahiq
</span>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-street-view"></i></span>
<div class="info-box-content">
<span class="info-box-text">Orphans</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Orphan');

echo $get_orphan = $this->db->get()->num_rows();
$x = $get_all_mustahiq;
$y = $get_orphan *100;
$z = $y/$x;
?>  

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php
echo round($z)."%";
?> of total Mustahiq
</span>
</div>
</div>
<!-- /.info-box -->
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-blind"></i></span>
<div class="info-box-content">
<span class="info-box-text">Senior Citizen</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Senior Citizen');

echo $get_poor = $this->db->get()->num_rows();
$x = $get_all_mustahiq;
$y = $get_poor *100;
$z = $y/$x;
?>  

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php

echo round($z)."%";
?> of total Mustahiq
</span>
</div>
</div>

</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-wheelchair"></i></span>
<div class="info-box-content">
<span class="info-box-text">Disables</span>
<span class="info-box-number">
 
 <?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Disable');

echo $get_disable = $this->db->get()->num_rows();
$x = $get_all_mustahiq;
$y = $get_disable *100;
$z = $y/$x;
?>   

</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php

echo round($z)."%";
?> of total Mustahiq
</span>
</div>
</div></div>

</div>

        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 class="m-0 text-dark">Category Wise Paid Mustahiqeen during <b> <?php echo $getfinancial_year;?></h3>
          </div>
        </div>
        <br>
        <div class="row">
		
<div class="col-12 col-sm-6 col-md-4">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-female"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Paid Mustahiqeen </b></span>
<span class="info-box-number">
<?php 

echo $getTotalPaid;
$x = $getTotalPaid;
$y = $getTotalPaid *100;
$z = $y/$x;
?>
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of Paid Mustahiq
</span>
</div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4">
</div>	
<div class="col-12 col-sm-6 col-md-4">
</div>			
		
		
		
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-female"></i></span>
<div class="info-box-content">
<span class="info-box-text">Widows</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Widow/Divorced');
$this->db->where('payment_status',1);

echo $get_paid_widows = $this->db->get()->num_rows();
$x = $getTotalPaid;
$y = $get_paid_widows *100;
$z = $y/$x;
?>
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of Paid Mustahiq
</span>
</div>
</div>
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-street-view"></i></span>
<div class="info-box-content">
<span class="info-box-text">Orphans</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('category','Orphan');
$this->db->where('payment_status',1);

echo $get_paid_orphan = $this->db->get()->num_rows();
$x = $getTotalPaid;
$y = $get_paid_orphan *100;
$z = $y/$x;
?>
  
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of Paid Mustahiq
</span>
</div>
</div>
<!-- /.info-box -->
</div>

<div class="clearfix hidden-md-up"></div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-success">
<span class="info-box-icon"><i class="fas fa-blind"></i></span>
<div class="info-box-content">
<span class="info-box-text">Senior Citizen</span>
<span class="info-box-number">
  
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('category','Senior Citizen');
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('payment_status',1);

echo $get_paid_poor = $this->db->get()->num_rows();
$x = $getTotalPaid;
$y = $get_paid_poor *100;
$z = $y/$x;
?>
</span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%";?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?> of Paid Mustahiq
</span>
</div>
</div>

</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box bg-primary">
<span class="info-box-icon"><i class="fas fa-wheelchair"></i></span>
<div class="info-box-content">
<span class="info-box-text">Disables</span>
<span class="info-box-number">
<?php 
$this->db->select("category");
$this->db->from("mustahiqeen");
$this->db->where('payment_year',$getfinancial_year);
$this->db->where('category','Disable');
$this->db->where('MustahiqType','Guzara Allowance');
$this->db->where('payment_status',1);

echo $get_paid_disable = $this->db->get()->num_rows();
$x = $getTotalPaid;
$y = $get_paid_disable *100;
$z = $y/$x;
?></span>
<div class="progress">
<div class="progress-bar" style="width: <?php echo round($z)."%"; ?>"></div>
</div>
<span class="progress-description">
<?php echo round($z)."%";?>of Paid Mustahiq
</span>
</div>
</div>
</div>


</div>
        <!-- Main Body -->
        <div class="row">
          <div class="col-md-1"></div>
           <div class="col-12 col-md-12 col-sm-6">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="widows-tab" data-toggle="pill" href="#widows" role="tab" aria-controls="widows" aria-selected="true">Mustahiqeen Details</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="orphan-tab" data-toggle="pill" href="#orphans" role="tab" aria-controls="orphans" aria-selected="false">Orphans</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="poors-tab" data-toggle="pill" href="#poors" role="tab" aria-controls="poors" aria-selected="false">Poors</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="disables-tab" data-toggle="pill" href="#disables" role="tab" aria-controls="disables" aria-selected="false">Disables</a>
                  </li> -->
                </ul>
              </div>
<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade show active" id="widows" role="tabpanel" aria-labelledby="widows-tab">
<form class="form-horizontal form-label-left" method="post" action="#" enctype="multipart/form-data" novalidate>      
<h3>Search Mustahiq Details that are Benefited/Not Benefited with Guzara Allowance </h3>
<br>
<div class=" row item form-group">

<div class="col-md-3 col-sm-3 col-xs-12">

<select class="form-control" id="district_name">
<option>---Select District----</option>
</select>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
<select class="form-control" id="year">
<option>---Select Year----</option>
<option value="">All</option>
<option value="">Year1</option>
<option value="">Year1</option>
<option value="">Year1</option>
<option value="">Year1</option>
<option value="">Year1</option>
<option value="">Year1</option>
</select>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
<select class="form-control" id="installment">
<option>---Select Installment----</option>
<option value="">1 & 2</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
<select class="form-control" id="category">
<option>---Select Category----</option>
<option value="">All</option>
<option value="Widows">Widows</option>
<option value="Poors">Poors</option>
<option value="Orphans">Orphans</option>
<option value="Disable">Disable</option>
</select>
</div>
<!-- Need Space Between two lines -->
<div class="col-md-3 col-sm-3 col-xs-12">
<select class="form-control" id="installment">
<option>--Guzara Allowance Availed--</option>
<option value="Guzara Allowance">Yes</option>
<option value="">No</option>
</select>
</div>
</div>
<div class=" row item form-group"></div>

<div class="ln_solid"></div>
<div class=" row form-group">
<div class="col-md-12 col-md-offset-3">
<input type="submit" name="submitbtn" class="btn btn-success">
<button type="reset" class="btn btn-primary float right">Reset</button>
</div>
</div>
</form>
<div class="row">
<div class="info-box bg-success col-md-4">
<span class="info-box-icon"><i class="far fa-bookmark"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total _____ in ___</span>
<span class="info-box-number">41,410</span>
</div>
</div>
<div class="col-md-6"></div>
<button class="form-control btn btn-success float-sm-right col-md-2">Print List</button>
</div>
<br>
<table class="table table-bordered table-striped col-md-12 col-sm-6 col-12">
<thead>
<tr>
<th>S#</th>
<th>Distt Name</th>
<th>LZC Name</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>CNIC</th>
<th>Gender</th>
<th>Category</th>
<th>Cell #</th>
<th>Inst</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>4312</td>
<td>12443</td>
<td>12443</td>
<td>3232321</td>
<td>4124213</td>
<td>4312</td>
<td>78879</td>
</tbody>
</table> 
</div>
                 <!--  <div class="tab-pane fade" id="orphans" role="tabpanel" aria-labelledby="orphan-tab"></div>
                  <div class="tab-pane fade" id="poors" role="tabpanel" aria-labelledby="poors-tab"></div>
                  <div class="tab-pane fade" id="disables" role="tabpanel" aria-labelledby="disables-tab"></div> -->
                </div>
              </div>
              <!-- /.card -->
            </div>
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
