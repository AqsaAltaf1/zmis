

<?php 

$getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
$getfinancial_year = $getfinancialdata->row('financial_Year');
$getInstallment = $getfinancialdata->row('installment');

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
    <td width="56%"><h4 class="card-title">Guzara ALlowance Mustahiqeen List  <br />
	During F/Y :  <strong><?php echo $getfinancial_year;?></strong>
    </h4></td>
    <td width="22%">Dated : <?php echo date("d-m-Y");?></td>
  </tr>
</table>






<br />

<div class="card-body">
<table width="" class="table table-bordered table-striped" id="tbl_exporttable_to_xls">
<thead>
<tr>
<th width="">S#</th>
<th width="">District Name</th>
<th width="">Name</th>
<th width="">F/Name</th>
<th width="">CNIC</th>
<th width="">Gender</th>
<th width="">Cell #</th>
<th width="">LZC</th>
<th width="">Category</th>
</tr>
</thead>
<tbody>

<?php
$i=1;
if(!empty($gaTotalList))
{
foreach($gaTotalList as $gaList)
{
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $gaList['District_Name']; ?></td>
<td><?php echo $gaList['mustahiq_name']; ?></td>
<td><?php echo $gaList['father_name']; ?></td>
<td><?php echo $gaList['mustahiq_cnic']; ?></td>
<td><?php echo $gaList['gender']; ?></td>
<td><?php echo $gaList['contact_number']; ?></td>
<td><?php echo $gaList['LZCActualName'];?></td>
<td><?php echo $gaList['category'];?></td>

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
XLSX.writeFile(wb, fn || ('GA Mustahiqeen list.' + (type || 'xlsx')));
}

/*$(document).ready( function () {
    $('#tbl_exporttable_to_xls').DataTable();
} );*/

</script>















