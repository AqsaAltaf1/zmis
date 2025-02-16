<?php
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

$get_staff_id = $this->uri->segment(3);

if(isset($get_staff_id))
{
	$get_mustahiq_query = $this->db->select('*')->from('zakat_paid_staff_list')->where('id',$get_staff_id)->where('district_id',$userid)->get();
	$emp_name = $get_mustahiq_query->row('name');
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title> <?php $this->load->view('district/include/title');?></title>

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


  
  <?php $this->load->view('district/include/nav');?>


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
    
    <?php $this->load->view('district/include/profile_manue');?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <?php $this->load->view('district/include/user_manue');?>

      <!-- Sidebar Menu -->
      
      <?php $this->load->view('district/include/sidebar');?>
      
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
<h3 class="m-0 text-dark">Profile of Mr / MRS. <?php echo $get_mustahiq_query->row('name');?> <br>
Designation: <?php 
$designation_id = $get_mustahiq_query->row('designation_id');
$get_dist_name = $this->db->select('*')->from('zakat_paid_staff_type')->where('id',$designation_id)->get();
echo $designation_name = $get_dist_name->row('designation');
?> <br>
Zakat & Ushr Department DZC <strong><?php echo $district_name; ?></strong> </h3>
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
                       src="<?php echo base_url();?>assets/uploads/<?php echo $get_mustahiq_query->row('picture');?>" 
                       alt="User profile picture" style="width:150px; height:150px;">
                       <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-success text-md">
                          <?php echo $get_mustahiq_query->row('name');?>
                        </div>
                      </div>
                </div>

                <h3 class="profile-username text-center"><?php echo $get_mustahiq_query->row('name');?></h3>

                <p class="text-muted text-center"><?php echo $designation_name;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Posting Station</b> <a class="float-right">
                    
                    <?php echo $district_name;?>
                    
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Service Length </b> <a class="float-right">
                    
                    <?php 					
					
					$sdate = $get_mustahiq_query->row('appointment_date');
                    
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
                  
                  
                  <li class="list-group-item">
                    <b>Contact</b> <a class="float-right">
                    
                    <?php echo $get_mustahiq_query->row('contact_no');?>
                    
                    
                    </a>
                  </li>
                  
                  
                  
                  
                  
                  
                  <li class="list-group-item">
                    <b>Marital status</b> <a class="float-right">
                    
                    <?php echo $get_mustahiq_query->row('marital_status');?>
                    
                    
                    </a>
                  </li>
                  
                  
                  
                  <li class="list-group-item">
                    <b>Domicile</b> <a class="float-right">
                    
                    <?php 
					$domicile = $get_mustahiq_query->row('domicile');
					$get_domicileqry = $this->db->select('*')->from('district_users')->where('id',$domicile)->get();
					echo $getdomicile_name = $get_domicileqry->row('district_name');
					
					?>
                    
                    
                    </a>
                  </li>
                  
                  
                  
                  
                  
                </ul>

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
                  <?php echo $get_mustahiq_query->row('qualification');?>
                </p>

                <hr>
                
                
                
                
                
                

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                
                <?php echo $get_mustahiq_query->row('address');?>
                
                </p>

              
                

                

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
<!--<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Posting/Transfer</a></li>

<li class="nav-item"><a class="nav-link" href="#update_profile" data-toggle="tab">Update Profile</a></li>
-->                </ul>
</div><!-- /.card-header -->
<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="job">
<!-- Post -->
<div class="post">

<!-- /.user-block -->
<p style="width:750px;">
<?php echo $get_mustahiq_query->row('job_description');?>
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
<!-- timeline time label -->
<div class="time-label">
<span class="bg-success">
10 Feb. 2014
</span>
</div>

<div>
<i class="fas fa-user bg-primary"></i>

<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>

<h3 class="timeline-header"><a href="#">First Posting</a> as ________ in District/HQ _____and have been performed following duties </h3>

<div class="timeline-body">
Letter Drafting, etc
</div>
<div class="timeline-footer">
<!--    <a href="#" class="btn btn-primary btn-sm">Read more</a>
<a href="#" class="btn btn-danger btn-sm">Delete</a> -->
</div>
</div>
</div>
<!-- END timeline item -->

<!-- timeline item -->
<div><!-- 
<i class="fas fa-user bg-info"></i>

<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
</h3>
</div>
--></div>

<div class="time-label">
<span class="bg-success">
3 Jan. 2017
</span>
</div>
<!-- /.timeline-label -->
<!-- timeline item -->
<div>
<i class="fas fa-user bg-purple"></i>

<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>

<h3 class="timeline-header"><a href="#">Second Posting</a> as ________ in District/HQ _____and have been performed following duties </h3>

<div class="timeline-body">
Letter Drafting, etc
</div>
<div class="timeline-footer">
<!--    <a href="#" class="btn btn-primary btn-sm">Read more</a>
<a href="#" class="btn btn-danger btn-sm">Delete</a> -->
</div>
</div>
</div>
<!-- END timeline item -->

<div class="time-label">
<span class="bg-success">
05 June. 2019
</span>
</div>

<div>
<i class="fas fa-user bg-success"></i>

<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>

<h3 class="timeline-header"><a href="#">Second Posting</a> as ________ in District/HQ _____and have been performed following duties </h3>

<div class="timeline-body">
Letter Drafting, etc
</div>
<div class="timeline-footer">
<!--    <a href="#" class="btn btn-primary btn-sm">Read more</a>
<a href="#" class="btn btn-danger btn-sm">Delete</a> -->
</div>
</div>
</div>

<div class="time-label">
<span class="bg-success">
15 July. 2020
</span>
</div>

<div>
<i class="fas fa-user bg-success"></i>

<div class="timeline-item">
<span class="time"><i class="far fa-clock"></i> Posting Time and date 12:05</span>

<h3 class="timeline-header"><a href="#">Second Posting</a> as ________ in District/HQ _____and have been performed following duties </h3>

<div class="timeline-body">
Letter Drafting, etc
</div>
<div class="timeline-footer">
<!--    <a href="#" class="btn btn-primary btn-sm">Read more</a>
<a href="#" class="btn btn-danger btn-sm">Delete</a> -->
</div>
</div>
</div>
</div>
</div>
<!-- /.tab-pane -->

<div class="tab-pane" id="update_profile">
<form class="form-horizontal">


<div class="row form-group">
<label class="col-md-3" for="r_amount">Name <span class="required">*</span>
</label>
<!-- <?php echo $net_balance_pza;?> -->
<input type="Text" name="name" id="name" value="" placeholder="Employees Name" class="form-control col-md-8 col-xs-12">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Father Name<span class="required">*</span> </label>
<input type="text" id="f_name" name="f_name" required class="form-control col-md-8" value="" placeholder="Father Name">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Contact No<span class="required">*</span> </label>
<input type="text" id="contact" name="contact" required class="form-control col-md-8" value="" placeholder="Contact No">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Email<span class="required">*</span> </label>
<input type="email" id="email" name="email"  class="form-control col-md-8" value="" placeholder="Contact No">
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">CNIC<span class="required">*</span> </label>
<input type="text" id="cnic" name="cnic" required class="form-control col-md-8" value="" placeholder="CNIC" >
</div>


<div class="row form-group">
<label class="col-md-3" for="check">Select Designation<span class="required">*</span>
</label>
<select class="form-control col-md-8" id="desig" name="desig">
<option value="">---Select One----</option>
<option value="Senior District Zakat Officer (B-18)" >Senior District Zakat Officer (B-18)</option>
<option value="District Zakat Officer (B-17)" >District Zakat Officer (B-17)</option>
<option value="Assistant (B-16)" >Assistant (B-16)</option>
<option value="Computer Operator (B-16)">Computer Operator (B-16)</option>
<option value="Senior Clerk (B-14)">Senior Clerk (B-14</option>
<option value="Junior Clerk (B-11)" >Junior Clerk (B-11)</option>
<option value="Naib Qasid (B-03)">Naib Qasid (B-03)</option>
</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Highest Qualification<span class="required">*</span> </label>
<input type="test" id="qualification" name="qualification" required class="form-control col-md-8" value="" placeholder="Appointment Date" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Personal Skills<span class="required">*</span> </label>
<input type="test" id="skills" name="skills" required class="form-control col-md-8" value="" placeholder="Personal Skills" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Home Address<span class="required">*</span> </label>
<input type="test" id="address" name="address" required class="form-control col-md-8" value="" placeholder="Home Address" >
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Appointment Date<span class="required">*</span> </label>
<input type="date" id="doa" name="doa" required class="form-control col-md-8" value="" placeholder="Appointment Date" >
</div>
<div class="row form-group">
<label class="control-label col-md-3" for="year">Posting Station<span class="required">*</span> </label>
<select class="form-control col-md-8" id="posting_stat" name="posting_stat">
<option value="">---Select One----</option>

</select>
</div>

<div class="row form-group">
<label class="control-label col-md-3" for="year">Experience<span class="required">*</span> </label>
<input type="text" id="experience" name="experience" required class="form-control col-md-8" value="" placeholder="Previous Job Experience" >
</div>

<div class="row form-group">
<label class="control-label col-md-3">Current Job Description</label>

<textarea class="form-control col-md-8" rows="5" name="remarks" id="des_remarks">
</textarea>

</div>
<div class="form-group row">
<div class="offset-sm-3 col-md-3 col-md-10">
<div class="checkbox">
<label>
<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
</label>
</div>
</div>
</div>
<div class="ln_solid"></div>
<div class="row form-group">
<div class="col-md-3"></div>
<input type="submit" class="btn btn-success" name="sbmitbtn" value="Submit" class="col-md-4">
<div class="col-md-1"></div>
<button class="btn btn-primary col-md-1" type="reset">Reset</button>

</div>


</form>
</div>
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

<?php $this->load->view('district/include/footer');?>
 
 
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
