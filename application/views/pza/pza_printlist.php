<?php
error_reporting(0);
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
List Regarding Payment Received/Deposit in PZF Account # 03
</h3>

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>S#</th>
<th>Amount</th>
<th>Cheque#</th>
<th>Cheque Date</th>
<th>Received From</th>
<th>District/Hospital Name</th>
<th>Account Head</th>
<th>Entry Date</th>
<th>Remarks</th>
</tr>
</thead>
<tbody>


<?php
$i=1;
if(!empty($get_pza_fundrecords))
{
foreach($get_pza_fundrecords as $get_pza_funds)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $get_pza_funds['payment_received'];?></td>
<td><?php echo $get_pza_funds['check_no'];?></td>
<td><?php echo $get_pza_funds['check_date'];?></td>
<td><?php echo $get_pza_funds['payment_rec_from'];?></td>
<td>
<?php 
if($get_pza_funds['payment_rec_from']=="Hospital")
{
$district_hospital_id =  $get_pza_funds['district_hospital_id'];

$gethospitalsquery = $this->db->select('*')->from('hospital_users')->where('id',$district_hospital_id)->get();
$gethospital_name = $gethospitalsquery->row('name');

}
else if($get_pza_funds['payment_rec_from']=="District")
{
$district_hospital_id =  $get_pza_funds['district_hospital_id'];

$getdistrictsquery = $this->db->select('*')->from('district_users')->where('id',$district_hospital_id)->get();
echo $getdistrict_name = $getdistrictsquery->row('district_name');

}
?>

</td>
<td><?php echo $get_pza_funds['account_head'];?></td>
<td><?php echo date("d-m-Y",strtotime($get_pza_funds['add_date']));?></td>
<td>
<?php echo $get_pza_funds['remarks'];?></td>
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
