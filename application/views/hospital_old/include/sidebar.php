<?php
$page = $this->uri->segment(1);
?>

<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

<?php 
if(($page == "Hosp_dashboard") || ($page == "Hosp_regular_patient_list")  || ($page == "Hosp_sf_patient_list"))
{
?>
<li class="nav-item has-treeview menu-open">
<?php
}
else
{
?>
<li class="nav-item has-treeview">
<?php
}
?>

<?php 
if(($page == "Hosp_dashboard") || ($page == "Hosp_regular_patient_list") || ($page == "Hosp_sf_patient_list"))
{
?>
<a href="#" class="nav-link active">
<?php
}
else
{
?>
<a href="#" class="nav-link">
<?php
}
?>

<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Home
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_dashboard/" class="nav-link <?php if($page == "Hosp_dashboard") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Dashboard</p>
</a>
</li>
 <li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_regular_patient_list" class="nav-link <?php if($page == "Hosp_regular_patient_list") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Regular Patient's List</p>
</a>
</li> 

 <li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_sf_patient_list" class="nav-link <?php if($page == "Hosp_sf_patient_list") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Special Fund Patient's List</p>
</a>
</li>
</ul>
</li>

<?php 
if(($page == "Hosp_patient_entry_form") || ($page == "Hosp_patient_entry_form") || ($page == "Dist_admin_expense"))
{
?>
<li class="nav-item has-treeview menu-open">
<a href="#" class="nav-link active">
<?php
}
else
{
?>
<li class="nav-item has-treeview">
<a href="#" class="nav-link">
<?php
}
?>

<i class="nav-icon fas fa-edit"></i>
<p>
Manage Patient's
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_patient_entry_form" class="nav-link <?php if($page == "Hosp_patient_entry_form") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Patient Entry Form</p>
</a>
</li>


</ul>
</li>




<!-- Human Reports Tabs -->
<?php 
if(($page == "Hosp_regular_fund_report") || ($page == "Hosp_special_fund_report") || ($page == "Hosp_special_fund_report") || ($page == ""))
{
?>
<li class="nav-item has-treeview menu-open">
<a href="#" class="nav-link active">
<?php
}
else
{
?>
<li class="nav-item has-treeview">
<a href="#" class="nav-link">
<?php
}
?>

<i class="nav-icon fas fa-user"></i>
<p>
Fund Reporting
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_regular_fund_report" class="nav-link <?php if($page == "Hosp_regular_fund_report") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Regular Fund Reporting</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Hosp_special_fund_report" class="nav-link <?php if($page == "Hosp_special_fund_report") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Special Fund Reporting</p>
</a>
</li>

<!-- <li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_user_profile" class="nav-link <?php if($page == "Dist_user_profile") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Employees Profile</p>
</a>
</li> -->

</ul>
</li>



</ul>


</nav>