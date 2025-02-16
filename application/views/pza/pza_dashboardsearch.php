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
District / Hospital / Head Wise Search Form
</h3>

<div class="x_content" id="printableArea">
<table id="" class="table table-striped table-bordered">
<thead>
<tr>
<th>S#</th>
<th>Amount</th>
<th>Cheque#</th>
<th>Cheque Date</th>
<th>Received From</th>
<th>District/Hospital Name</th>

<th>Account Head</th>
<th>Remarks</th>
<th>Entry Date</th>

</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($dashboardsearch))
{
foreach($dashboardsearch as $getdata)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $getdata['payment_received'];?></td>
<td><?php echo $getdata['check_no'];?></td>
<td><?php echo $getdata['check_date'];?></td>
<td><?php echo $getdata['payment_rec_from'];?></td>

<td>

<?php 
if($getdata['payment_rec_from']=="Hospital")
{

$selecthostpitalsqry = $this->db->select('*')->from('hospital_users')->where('id',$getdata['district_hospital_id'])->get();
echo $selecthostpitalsqry->row('name');
}
else if($getdata['payment_rec_from']=="District")
{

$select_district_qry = $this->db->select('*')->from('district_users')->where('id',$getdata['district_hospital_id'])->get();
echo $select_district_qry->row('district_name');

}

?></td>


<td><?php echo $getdata['account_head'];?></td>
<!-- <td><?php echo $getdata['dist_acc_head'];?></td> -->
<td><?php echo $getdata['remarks'];?></td>
<td><?php echo date("F j, Y",strtotime($getdata['add_date']));?></td>

</tr>

<?php
$i++;
}
}
?> 

</tbody>
</table>
</div>
</body>
</html>
