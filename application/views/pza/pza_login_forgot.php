<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>PZA Dashboard</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style type="text/css">

.login-box, .register-box {
    width: 600px;
}

</style>




</head>
<body class="hold-transition login-page">


<div class="login-box">

<div class="login-logo">
<a href="#"><b>PZA </b>Dashboard</a>

<h2>Zakat Management Information System</h2>

</div>
<!-- /.login-logo -->
<div class="card">
<div class="card-body login-card-body">

<?php 
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if(isset($success))
{
?>
<p class="login-box-msg" style="color:#090; font-size:18px;"><?php echo $success;?></p>
<?php
}
else if(isset($error))
{
?>
<p class="login-box-msg" style="color:#f00; font-size:18px;"><?php echo $error;?></p>
<?php	
}
else
{
?>
<p class="login-box-msg">Enter your email address</p>
<?php	
}
?>


<form action="<?php echo base_url('Pza_login/formData_forgot');?>" method="post" enctype="multipart/form-data">
<div class="input-group mb-3">
<input required type="text" class="form-control" name="email" placeholder="Email Address">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>

<div class="row">
<div class="col-8">
<button type="submit" class="btn btn-primary">Submit</button>


<a href="<?php echo base_url(); ?>Pza_login" class="btn btn-success pull-right"> Go back  </a>


</div>




<!-- /.col -->
</div>
</form>



<!-- /.social-auth-links -->
</div>

</div>

<hr>

<p align="center">
All Rights Reserved by Government of Khyber Pakhtunkhawa
<br>

</p>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>
