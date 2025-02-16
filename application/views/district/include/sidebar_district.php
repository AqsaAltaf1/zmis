<?php
$page = $this->uri->segment(1);
?>

<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

<?php 
if(($page == "Dist_dashboard") || ($page == "Dist_institution_reg") || ($page == "DistRejectedMustahiqeen") || ($page == "ReceivedZakatForms"))
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
if(($page == "Dist_dashboard") || ($page == "Dist_institution_reg") || ($page == "DistRejectedMustahiqeen") || ($page == "ReceivedZakatForms"))
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

<i class="nav-icon fas fa-home"></i>
<p>
Home
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<!--  <li class="nav-item">
<a href="./reports.php" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Reports</p>
</a>
</li> -->
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_dashboard/" class="nav-link <?php if($page == "Dist_dashboard") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Dashboard</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_institution_reg" class="nav-link <?php if($page == "Dist_institution_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Institution Resgitration</p>
</a>
</li>


<li class="nav-item">
<a href="<?php echo base_url(); ?>DistRejectedMustahiqeen" class="nav-link <?php if($page == "DistRejectedMustahiqeen") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Rejected Mustahiqeen</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>ReceivedZakatForms" class="nav-link <?php if($page == "ReceivedZakatForms") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Zakat Form Received</p>
</a>
</li>

</ul>
</li>

<!-- || ($page == "Pza_hospital_fund_allocation") -->
<?php 
if(($page == "Dist_head_wise_fund_alloc") || ($page == "Dist_head_wise_fund_alloc") || ($page == "Dist_admin_expense") || ($page == "Dist_admin_expense"))
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
Fund Allocation
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<!-- <li class="nav-item">
<a href="<?php echo base_url(); ?>pza_fund_allocation" class="nav-link <?php if($page == "pza_fund_allocation") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>PZA Fund Allocation</p>
</a>
</li> -->
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_head_wise_fund_alloc" class="nav-link <?php if($page == "Dist_head_wise_fund_alloc") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Head Wise Allocation</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_admin_expense" class="nav-link <?php if($page == "Dist_admin_expense") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Administrative Expense</p>
</a>
</li>

</ul>
</li>


<!-- Cash/Pass Book -->

<?php 
if(($page == "Dist_cash_book") || ($page == "Dist_pass_book") || ($page == "Dist_reconsilation"))
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
Cash/Pass Book
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<!-- <li class="nav-item">
<a href="<?php echo base_url(); ?>pza_fund_allocation" class="nav-link <?php if($page == "pza_fund_allocation") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>PZA Fund Allocation</p>
</a>
</li> -->
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_cash_book" class="nav-link <?php if($page == "Dist_cash_book") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Cash Book</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_pass_book" class="nav-link <?php if($page == "Dist_pass_book") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Pass Book</p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_reconsilation" class="nav-link <?php if($page == "Dist_reconsilation") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Re-Conciliation</p>
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
Mustahiq Registration
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

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_GA_paid_mustahiqeen" class="nav-link <?php if($page == "Dist_GA_paid_mustahiqeen") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>GA Paid Mustahiqeen</p>
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
<a href="<?php echo base_url();?>Dist_MA_mustahiq_reg" class="nav-link <?php if($page == "Dist_MA_mustahiq_reg") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA Entry Form </p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url();?>Dist_MA_lz_19" class="nav-link <?php if($page == "Dist_MA_lz_19") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA LZ-19 Mustahiqeen </p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_MA_lz_11" class="nav-link <?php if($page == "Dist_MA_lz_11") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA LZ-11 Mustahiqeen </p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_MA_paid_mustahiqeen" class="nav-link <?php if($page == "Dist_MA_paid_mustahiqeen") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>MA Paid Mustahiqeen </p>
</a>
</li>

</ul>
</li>



<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_DM_mustahiq_reg" class="nav-link <?php if($page == "Dist_DM_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Deeni Madaris</p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_HC_mustahiq_reg" class="nav-link <?php if($page == "Dist_HC_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Health Care</p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_ESA_mustahiq_reg" class="nav-link <?php if($page == "Dist_ESA_mustahiq_reg") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Educational Stipend (A)</p>
</a>
</li> 

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_ESP_mustahiq_reg" class="nav-link <?php if($page == "Dist_ESP_mustahiq_reg") echo "active";?>" >
  <i class="far fa-circle nav-icon"></i>
  <p>Educational Stipend (P)</p>
</a>
</li>

</ul>
</li>


<!-- Orphan Registration  -->


<?php 
if(($page == "Dist_Orphan_reg") || ($page == "Dist_orphan_lz_19") || ($page == "Dist_orphan_lz_11") || ($page == "Dist_orphan_paid_mustahiqeen"))
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
Orphan
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">

<?php 
if(($page == "Dist_Orphan_reg") || ($page == "Dist_orphan_lz_19") || ($page == "Dist_orphan_lz_11") || ($page == "Dist_orphan_paid_mustahiqeen"))
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
Orphan Registration
<i class="right fas fa-angle-left"></i>
</p>
</a>

<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url();?>Dist_Orphan_reg" class="nav-link <?php if($page == "Dist_Orphan_reg") echo "active";?>">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>Orphan Entry Form </p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>LZ-19 Orphan </p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>LZ-11 Orphan </p>
</a>
</li> 

<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-dot-circle nav-icon"></i>
  <p>Paid Orphan's List</p>
</a>
</li> 

</ul>
</li>


<!-- Marriage Assistance -->



</ul>
</li>






<?php 
if(($page == "Dist_fund_summary") || ($page == "Dist_fund_summary") || ($page == "Dist_category_wise_report") || ($page == "Dist_head_wise_report") || ($page == "Dist_HR_reports") || ($page == "Pza_Hospital_fund_allocation") )
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

<i class="nav-icon fas fa-chart-pie"></i>
<p>
Monitoring & Reports
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_fund_summary" class="nav-link <?php if($page == "Dist_fund_summary") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Fund Summary Report</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_category_wise_report" class="nav-link <?php if($page == "Dist_category_wise_report") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Category Wise Report</p>
</a>
</li>

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_head_wise_report" class="nav-link <?php if($page == "Dist_head_wise_report") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Head Wise Report</p>
</a>
</li>



<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_HR_reports" class="nav-link <?php if($page == "Dist_HR_reports") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>District HR Reports</p>
</a>
</li>


<li class="nav-item">
<a href="<?php echo base_url(); ?>Pza_Hospital_fund_allocation/healthCareProv" class="nav-link <?php if($page == "Pza_Hospital_fund_allocation") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
<p>Health Care (Prov-Level)</p>
</a>
</li>



</ul>
</li>

<!-- Human Reports Tabs -->
<?php 
if(($page == "Dist_Organogram") || ($page == "Dist_employees") || ($page == "Dist_user_profile") || ($page == ""))
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

<i class="nav-icon fas fa-users"></i>
<p>
Human Resource
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">

<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_Organogram" class="nav-link <?php if($page == "Dist_Organogram") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Organizational Structure</p>
</a>
</li>
<li class="nav-item">
<a href="<?php echo base_url(); ?>Dist_employees" class="nav-link <?php if($page == "Dist_employees") echo "active";?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Employees List</p>
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



<!-- <li class="nav-item has-treeview">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-edit"></i>
<p>
Finance Module
<i class="fas fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Page 1</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Page 2</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Page 3</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
  <i class="far fa-circle nav-icon"></i>
  <p>Page 4</p>
</a>
</li>
</ul>
</li> -->


</ul>


</nav>