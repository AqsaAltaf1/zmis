<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<title> <?php $this->load->view('district/include/title');?></title>

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
<body class="">
<div class="wrapper">

<br>

<section class="content">
<div class="container-fluid">
<input type="button" style="float:right;" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print Report" />
</div>
</section>
<br>


<div id="printableArea">

 <section class="content">
      <div class="container-fluid">
      
      
   <div class="row">
<div class="col-md-10">
<h4>
Guzara Allownce Mustahiqeen - Year : <?php echo $get_yearvalues;?> - Benefied : <?php echo $availedvalue;?>
</h4>
</div>
<div class="col-md-2"></div>
</div>   
      
      
      
      
<table class="table table-bordered table-striped col-md-12 col-sm-6 col-12">
<thead>
<tr>
<th>S#</th>
<th>Mustahiq Name</th>
<th>F/Name</th>
<th>LZC Name</th>
<th>CNIC</th>
<th>Cell #</th>
<th>Category</th>
<th>Amount</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($get_ga_reports))
{
foreach($get_ga_reports as $get_ga_yes_values)
{
?>
<tr>
<td><?php echo $i;?></td>
<td style="text-transform:capitalize;"><?php echo $get_ga_yes_values['mustahiq_name'];?></td>
<td style="text-transform:capitalize;"><?php echo $get_ga_yes_values['father_name'];?></td>
<td>
<?php 
$LZC_name_id = $get_ga_yes_values['LZC_name'];
$get_lzcqry_name = $this->db->select('*')->from('lzc_list')->where('id',$LZC_name_id)->get();
echo $lzc_name = $get_lzcqry_name->row('lzc_name');
?>
</td>
<td><?php echo $get_ga_yes_values['mustahiq_cnic'];?></td>
<td><?php echo $get_ga_yes_values['contact_number'];?></td>
<td><?php echo $get_ga_yes_values['category'];?></td>
<td>
<?php 
$getuserid = $get_ga_yes_values['id'];
$get_payment_qry = $this->db->select('*')->from('guzara_allowance_mustahiqeen_payments')->where('user_id',$getuserid)->get();
echo $getuserpayment_value = $get_payment_qry->row('payment_amount');
?>
</td>
</tr>
<?php 
$i++;
}
}
?>

</tbody>
</table>

</div>

</section>

</div>
</div>

<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>

</body>
</html>
