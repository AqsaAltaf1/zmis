<?php
include ("../connection/conn.php");

// get Financial Year and installment 
$selectqry_year = "SELECT * FROM year_installment WHERE status = '1'";
$runselectqry_year = mysql_query($selectqry_year);
$get_year = mysql_fetch_array($runselectqry_year);
$year = $get_year['financial_Year'];
$inst = $get_year['installment'];

//get Hospital Name
$getuserid=$_SESSION["hospital_admin"]["id"];
$selecthospital = "SELECT * FROM hospital_users WHERE id = '".$getuserid."'";
$runselectqryhospital = mysql_query($selecthospital);
$fetchqueryhospital = mysql_fetch_array($runselectqryhospital);
$hospital_name = $fetchqueryhospital['name'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


<title>Zakat & Ushr, Social Welfare, Special Education and Women Empowerment Department Khyber Pakhtunkhwa</title>
</head>

<body onLoad="window.print();">

<h2 style="text-align: center;">Pateint's List Regarding <?php echo $hospital_name = $fetchqueryhospital['name'];?> for the  Financial Year: <b style="color: black;"><?php echo $year;?></b> Installment:<b style="color: black;"> <?php echo $inst;?></b></h2>


<table border="1" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S#</th>
                          <th>P/Name</th>
                          <th>F/Name</th>
                          <th>CNIC/Form_B</th>
                          <th>District</th>
                          <th>LZC</th>
                          <th>Gender</th>
                          <th>Age</th>
                          <th>Mobile#</th>
                          <th>Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                              <?php
                              $i = 1;
                              $selectqry = "SELECT * FROM patient_list WHERE hospital_id = '".$getuserid."' order by id DESC";
                              $runselectqry = mysql_query($selectqry);
                              while($getdata = mysql_fetch_array($runselectqry))
                              {
                              ?> 
                              <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $getdata['pt_name'];?></td>
                              <td><?php echo $getdata['fh_name'];?></td>
                              <td><?php echo $getdata['pt_cnic'];?></td>
                              <td><?php 
                              
                              $district_id =  $getdata['district'];
                                $select_district_name = "SELECT * FROM district_users WHERE id = '".$district_id."'";
                                $run_district_name = mysql_query($select_district_name);
                                $fetch_district_name = mysql_fetch_array($run_district_name);
                                echo $district_name =  $fetch_district_name['district_name'];

                              ?></td>
                              <td><?php echo $getdata['lzc'];?></td> 
                              <td><?php echo $getdata['gender'];?></td>
                              <td><?php echo $getdata['age'];?></td>
                              <td><?php echo $getdata['cell_no'];?></td>
                              <td><?php echo $getdata['add_date'];?></td>
                            
                              </tr>

                              <?php
                              $i++;
                              }
                              ?> 
                        
                        
                      </tbody>
                    </table>

</body>
</html>