<?php   
$session_id = $this->session->userdata('id');
$name = $this->session->userdata('name');
$username = $this->session->userdata('username');
$user_type = $this->session->userdata('user_type');

if(($session_id == "") || ($name == "") || ($username == "") || ($user_type == ""))
{
    $this->session->set_flashdata('error','Please Login to Your Account.'); 
    redirect(base_url());       
}
?>



<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
</ul>
<!-- <ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="index3.html" class="nav-link">Home</a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Contact</a>
</li>
</ul> -->

<!-- SEARCH FORM -->
<!--  <form class="form-inline ml-3">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
</div>
</div>
</form> -->
<h1 style="font-size: 30px; text-align: left;"> <b>ZAKAT MANAGEMENT INFORMATION SYSTEM</b></h1>


<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
<!-- Messages Dropdown Menu -->
<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
PZA-<?php echo $username ;?> 
<span class="fa fa-angle-down"></span>
</a>
<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

<a href="<?php echo base_url(); ?>Pza_profile/index" class="dropdown-item">Profile</a>
<a href="<?php echo base_url(); ?>Pza_login/logout" class="dropdown-item">Log Out</a>

<!-- Message Start -->
<!--  <div class="media">
<img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">
Brad Diesel
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">Call me whenever you can...</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>
-->

<!-- Message End -->

<!-- <div class="dropdown-divider"></div>
<a href="#" class="dropdown-item"></a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item"></a>
<div class="dropdown-divider"></div> -->

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