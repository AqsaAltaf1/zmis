<?php
$page = $this->uri->segment(1);
?>

<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

<!-- Cash/Pass Book -->

<?php 
if( ($page == "AuditDashboard") || ($page == "DistRejectedMustahiqeen"))
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

<i class="nav-icon fas fa-address-book"></i>
<p>
Audit Dashboard
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">


<li class="nav-item">
<a href="<?php echo base_url(); ?>AuditDashboard" class="nav-link <?php if($page == "AuditDashboard") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Home</p>
</a>
</li>



<li class="nav-item">
<a href="<?php echo base_url(); ?>DistRejectedMustahiqeen" class="nav-link <?php if($page == "DistRejectedMustahiqeen") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Rejected Mustahiqeen</p>
</a>
</li>


</ul>
</li>


<!--Mustahiqeen Registration -->

<?php 
if(($page == "Dist_GA_mustahiq_reg") || ($page == "Dist_GA_lz_19") || ($page == "Dist_GA_lz_11") || ($page == "Dist_MA_mustahiq_reg") || ($page == "Dist_MA_lz_19") || ($page == "Dist_MA_lz_11") || ($page == "Dist_DM_mustahiq_reg") || ($page == "Dist_ESA_mustahiq_reg") || ($page == "Dist_ESP_mustahiq_reg") || ($page == "Dist_HC_mustahiq_reg") || ($page == "Dist_GA_paid_mustahiqeen") || ($page == "Dist_MA_paid_mustahiqeen"))
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
Mustahiqeen Audit
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">

<?php 
if(($page == "Dist_GA_mustahiq_reg") || ($page == "Dist_GA_lz_19") || ($page == "Dist_GA_lz_11") || ($page == "Dist_GA_paid_mustahiqeen"))
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
Guzara Allowance
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">
<!--
<li class="nav-item">
<a href="<?php echo base_url();?>Dist_GA_mustahiq_reg" class="nav-link <?php if($page == "Dist_GA_mustahiq_reg") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>GA Entry Form </p>
</a>
</li>
-->

<li class="nav-item">
<a href="<?php echo base_url();?>Dist_GA_lz_19" class="nav-link <?php if($page == "Dist_GA_lz_19") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>LZ-19 Mustahiqeen </p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_GA_lz_11" class="nav-link <?php if($page == "Dist_GA_lz_11") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>LZ-11 Mustahiqeen </p>
</a>
</li> 

 

</ul>
</li>


<!-- Marriage Assistance -->
<?php 
if(($page == "Dist_MA_mustahiq_reg") || ($page == "Dist_MA_lz_19") || ($page == "Dist_MA_lz_11") || ($page == "Dist_MA_paid_mustahiqeen"))
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

<i class="nav-icon fas fa-restroom"></i>
<p>
Marriage Assistance
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">



<li class="nav-item">
<a href="#" class="nav-link <?php if($page == "Dist_MA_lz_19") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA LZ-19 Mustahiqeen </p>
</a>
</li>

<li class="nav-item">
<a href="$" class="nav-link <?php if($page == "Dist_MA_lz_11") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA LZ-11 Mustahiqeen </p>
</a>
</li>



</ul>
</li>



<li class="nav-item">
<a href="#" class="nav-link <?php if($page == "Dist_DM_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Deeni Madaris</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link <?php if($page == "Dist_HC_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Health Care</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link <?php if($page == "Dist_ESA_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Educational Stipend (A)</p>
</a>
</li> 

<li class="nav-item">
<a href="#" class="nav-link <?php if($page == "Dist_ESP_mustahiq_reg") echo "active";?>" >
  <i class="far fa-circle nav-icon"></i>
  <p>Educational Stipend (P)</p>
</a>
</li>

</ul>
</li>


<!-- Orphan Registration  -->






</ul>


</nav>