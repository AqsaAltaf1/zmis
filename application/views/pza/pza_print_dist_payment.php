<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('pza/include/title');?>
</title>

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

<h3 align="center">
Population Based Zakat Fund Allocation for KPK Districts (Provincial Level) <strong><?php echo $getfinancial_year; ?></strong>
</h3>


<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>District</th>  
<th>Population</th>
<!--<th>Ratio</th>-->
<th>GA</th>
<th>MA</th>
<th>DM</th>
<th>ESA</th>
<th>ESP</th>
<th>HC</th> 
<th>AE</th>
<!-- <th>VTI</th> -->
<th>Total</th>
<th>Date</th>

</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_districts_payment))
{
foreach($get_districts_payment as $get_districts_payments)
{
?>
<tr>
<td><?php echo $i;?></td>
<td>
<?php 
$district_id = $get_districts_payments['district_id']; 
$getdistrict_qry = $this->db->select('*')->from('district_users')->where('id',$district_id)->get();
echo $getdistname = $getdistrict_qry->row('district_name');

?></td>
<td>
<?php
echo $getdistname = $getdistrict_qry->row('population');
?>
</td>
<!--<td> 4</td>-->
<td><?php echo $get_districts_payments['GA'];?></td>
<td><?php echo $get_districts_payments['MA'];?></td>
<td><?php echo $get_districts_payments['DM'];?></td>
<td><?php echo $get_districts_payments['ESA'];?></td>
<td><?php echo $get_districts_payments['ESP'];?></td>
<td><?php echo $get_districts_payments['HC'];?></td>
<td><?php echo $get_districts_payments['admin_expns'];?></td>
<!-- <td><?php echo $get_districts_payments['VTI'];?></td> -->
<td><?php echo $get_districts_payments['total_fund'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_districts_payments['add_date']));?></td>
</tr>

<?php 
$i++;
}
}
?>

</tbody>

</table>

</body>
</html>
