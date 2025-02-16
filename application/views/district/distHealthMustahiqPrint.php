<?php
error_reporting(0);
$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getfinancial_installment = $getfinancialdata->row('installment');

$userid = $this->session->userdata('id');
$get_dist_name = $this->db->select('*')->from('district_users')->where('id',$userid)->get();
$district_name = $get_dist_name->row('district_name');





?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<style type="text/css">

@media print
{    
    #btn1, #btn2
    {
        display: none !important;
    }	
}


@media print
{    
    #footer {
	position: fixed;
	bottom: 0;
	display: block !important;
	width:100%;
	}
}

</style>


<table width="100%" border="0" style="margin:5px 10;">
  <tr align="center">
    <td width="22%">&nbsp;</td>
    <td width="56%">&nbsp;</td>
    <td width="22%">
    <button onclick="window.print()" id="btn1" class="btn btn-primary btn-sm">Print List</button>
    <button id="btn2" onclick="ExportToExcel();" class="btn btn-primary btn-sm">Export as Excel</button>
    </td>
  </tr>
</table>



<table width="100%" border="0" style="background:#E1E1E1;">
  <tr align="center">
    <td width="22%"><img src="<?php echo base_url(); ?>/assets/images/logo.png" style="width:80px"></td>
    <td width="56%"><h4 class="card-title">Health Care (District and Provincial Level) Mustahiqeen List of <br />
	District :  <strong><?php echo  $district_name;?></strong>
    </h4></td>
    <td width="22%">Dated : <?php echo date("d-m-Y");?></td>
  </tr>
</table>






<br />
<div class="card-body">
<table width="" class="table table-bordered table-striped" id="tbl_exporttable_to_xls">
<thead>
<tr>
<th>S#</th>
<th>LZC</th>
<th>ServiceCat</th>
<th>Name</th>
<th>F/Name</th>
<th>Gender</th>
<th>Age</th>
<th>CNIC</th>
<th>Istehqaq#</th>
<th>Cell #</th>
<th>Hospital</th>
<th>Disease</th>
<th>Address</th>
<th>Amount</th>
<th>Date</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($getHealthMustahiqPrint))
{
foreach($getHealthMustahiqPrint as $HealthMustahiqPrint)
{
?>

<tr>
<td><?php echo $i;?></td>
<td>
<?php 
$lzc_id = $HealthMustahiqPrint['lzc_id'];
$run_lzc_list_qry = $this->db->select('*')->from('lzc_list')->where('id',$lzc_id)->get();
echo $get_lzc_name = $run_lzc_list_qry->row('lzc_name');
?>
</td>
<td>Health Care</td>
<td><?php echo $HealthMustahiqPrint['mustahiq_name'];?></td>
<td><?php echo $HealthMustahiqPrint['f_name'];?></td>
<td><?php echo $HealthMustahiqPrint['cnic'];?></td>
<td><?php echo $HealthMustahiqPrint['gender'];?></td>
<td><?php echo $HealthMustahiqPrint['age'];?></td>
<td><?php echo $HealthMustahiqPrint['istehqaq_no'];?></td>
<td><?php echo $HealthMustahiqPrint['cell_no'];?></td>

<td>
<?php 

$hospital_id = $HealthMustahiqPrint['hospital_id'];
if($hospital_id==0)
{
  $dhq_id = $HealthMustahiqPrint['dhq_id'];
  $run_dhq_list_qry = $this->db->select('*')->from('district_users')->where('id',$dhq_id)->get();
$get_dhq_name = $run_dhq_list_qry->row('district_name');

echo "DHQ ".$get_dhq_name;
}
else
{

  $run_hostpital_list_qry = $this->db->select('*')->from('hospital_users')->where('id',$hospital_id)->get();
echo $get_hospital_name = $run_hostpital_list_qry->row('name');
}



?>
</td>
<td><?php echo $HealthMustahiqPrint['disease_type'];?></td>
<td><?php echo $HealthMustahiqPrint['address'];?></td>
<td><?php echo $HealthMustahiqPrint['amount'];?></td>
<td><?php echo $HealthMustahiqPrint['add_date'];?></td>
</tr>
<?php 
$i++;
}
}
?>
</tbody>
</table>
</div>

<div id="footer" style="display:none;">
<p align="center">
Copyright © 2020-21 Zakat & Ushr Department Khyber Pakhtunkhwa. All rights reserved
</p>
</div>




<script>

function ExportToExcel(type, fn, dl) {
var elt = document.getElementById('tbl_exporttable_to_xls');
var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
return dl ?
XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
XLSX.writeFile(wb, fn || ('LZ-19 Mustahiqeen list of <?php echo $district_name;?>.' + (type || 'xlsx')));
}

</script>