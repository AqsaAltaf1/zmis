<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title> WELCOME TO ZAKAT MANAGEMENT INFORMATION SYSTEM (ZMIS) </title>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="<?php echo base_url(); ?>assets/landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="<?php echo base_url(); ?>assets/landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url(); ?>assets/landing/css/creative.min.css" rel="stylesheet">



</head>

<body id="page-top">
<header class="masthead text-center text-white d-flex">
<div class="container">
<div class="row">
<table>
<tr>
    <td><!--<?php
$pza_welcome_qry = $this->db->select('*')->from('vwshowperformace')->get();
 
 echo $pza_welcome_qry->row('district_name')."-".$pza_welcome_qry->row('district_name');
?>--></td>
    <td rowspan="4">
			<div class="col-lg-10 mx-auto">
			<h1 class="text-uppercase"><br>
			<br>
			<strong style="color:#fff;text-shadow:4px 4px #000;">Welcome To Zakat Management Information System (ZMIS)</strong>
			</h1>

			<hr>

			<?php 
			$error = $this->session->flashdata('error');
			$success = $this->session->flashdata('success');
			if(isset($success))
			{
			?>
			<div class="alert alert-success alert-dismissible" id="success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success . </strong> <?php echo $success;?>
			</div>
			<?php
			}
			else if(isset($error))
			{
			?>
			<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error . </strong> <?php echo $error;?>
			</div>
			<?php	
			}
			?>


			</div>

			<div class="clearfix"></div>

			<div class="col-lg-12 mx-auto">

			<br><br>
			<a style="width:200px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="<?php echo base_url(); ?>pza_login/">PZA Login</a>


			<!--<a style="width:200px;" class="btn btn-success btn-xl js-scroll-trigger" href="PZA/index.php">PZA Login</a>-->
			<a style="width:200px; background:#007bff; " class="btn btn-success btn-xl js-scroll-trigger" href="<?php echo base_url(); ?>dist_login/">District Login</a>
			<a style="width:200px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="<?php echo base_url();?>hosp_login/">Hospital Login</a>
           <!-- <a style="width:200px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="<?php echo base_url();?>audit_login/">Audit Login</a> -->
			<a style="width:200px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="ZMIS_1.7.apk">Android App v1.7</a>

			<!-- <a style="width:200px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="#">5 Year NAB Data</a>
			<a style="width:230px; background:#007bff;" class="btn btn-success btn-xl js-scroll-trigger" href="#">PZC Chairman Login</a> -->
			</div>
			</div>
			<br/><br/>
			
			</div>
</td>
                            <td>
							.
</td>
                        </tr>
                        <tr>
                            <td>.</td>
                            <td>.</td>
                        </tr>
                        <tr>
                            <td>.</td>
                            <td>.</td>
                        </tr>
                        <tr>
                            <td>.</td>
                            <td>.</td>
                        </tr>
                    </table>
</header>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>assets/landing/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/landing/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/landing/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url(); ?>assets/landing/js/creative.min.js"></script>

</body>

</html>
