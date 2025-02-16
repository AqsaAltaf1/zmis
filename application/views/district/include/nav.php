<?php	
 $session_id = $this->session->userdata('id');
 $district_name = $this->session->userdata('district_name');
 $username = $this->session->userdata('username');
 $audit_id = $this->session->userdata('audit_id');
//$entityName = $this->session->userdata('entityName');
 $user_type = $this->session->userdata('user_type');



if(($session_id == "") || ($district_name == "") || ($username == "") || ($user_type == ""))
{
	$this->session->set_flashdata('error','Please Login to Your Account'); 
	redirect(base_url());		
}




?>


<?php 
$userid = $this->session->userdata('id');
$username = $this->session->userdata('username');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');

?>



<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
</ul>

<h1 style="font-size: 30px; text-align: left;"> <b>ZAKAT MANAGEMENT INFORMATION SYSTEM</b></h1>


<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">


<strong>
<?php
$user_type = $this->session->userdata('user_type');
if($user_type == "audit")
{
 echo $entityName." (AO) ".$username;
} 
else if($user_type == "gs")

{
echo $entityName." (GS) ".$username;
}

?>
</strong>

District <strong><?php echo $district_name;?></strong>  -Admin 
<span class="fa fa-angle-down"></span>
</a>
<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
<?php 
if ($user_type == "district")
{
?>
<a href="<?php echo base_url(); ?>Dist_login/user_login_profile" class="dropdown-item">District Profile</a>

<?php
}
else if ($user_type == "audit")
{
?>
<a href="<?php echo base_url(); ?>Audit_login/auditLoginProfile" class="dropdown-item">Audit Profile</a>
<?php
}
?>




<?php 
if ($user_type == "district")
{
?>
<a href="<?php echo base_url(); ?>Dist_login/logout" class="dropdown-item">Log Out</a>
<?php
}
else if ($user_type == "audit")
{
?>
<a href="<?php echo base_url(); ?>Audit_login/logout" class="dropdown-item">Log Out</a>
<?php
}
?>
</div>
</li>
<!-- Notifications Dropdown Menu -->
<!-- <li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">15</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-item dropdown-header">15 Notifications</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-envelope mr-2"></i> 4 new messages
<span class="float-right text-muted text-sm">3 mins</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
</li> -->
<!--  <li class="nav-item">
<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
class="fas fa-th-large"></i></a>
</li> -->
</ul>
</nav>
<!-- /.navbar -->