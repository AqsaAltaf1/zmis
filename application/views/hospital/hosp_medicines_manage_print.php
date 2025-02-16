<?php
$userid = $this->session->userdata('hospital_id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');

$gettypes = $this->uri->segment(3);
$get_dist_name = $this->db->select('*')->from('treatment_types')->where('id',$gettypes)->get();
$treatment_name = $get_dist_name->row('treatment_name');

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>
<?php $this->load->view('hospital/include/title');?>
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
<body>



<div class="card-body">

<h2> <strong><?php echo $hospital_name;?></strong> - Hospital <strong><?php echo $treatment_name;?></strong> List</h2>

<table id="example1" class="table table-bordered table-striped">
<thead>

<tr>
<th>S#</th>
<th>Name</th>
<th>Add Date</th>
</tr>
</thead>
<tbody>
<?php
$i=1;
if(!empty($get_hospitals_medicinces))
{
foreach($get_hospitals_medicinces as $get_allvalues)
{
?>	

<tr>
<td><?php echo $i;?></td>
<td style="text-transform:capitalize;"><?php echo $get_allvalues['name'];?></td>

<td><?php echo date("d-m-Y",strtotime($get_allvalues['add_date']));?></td>


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
