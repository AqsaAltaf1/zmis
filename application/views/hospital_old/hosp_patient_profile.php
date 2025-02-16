<?php
include ("../connection/conn.php");

// Patients Personal Information
$pid_content = $_GET['pid'];
$selectqry = "SELECT * FROM patient_list WHERE id = '".$pid_content."' "; 
$runselectqry = mysql_query($selectqry);
$fetchvalue = mysql_fetch_array($runselectqry);
$fetchvalue['opd_no'];


// Medication History
$select_medication = "SELECT * FROM pt_medicine WHERE pt_id = '".$pid_content."'"; 
$run_medication_qry = mysql_query($select_medication);
$fetch_medication = mysql_fetch_array($run_medication_qry);
$fetch_medication['total_price'];

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
// get No. Of Visists
$selectqry = "SELECT * FROM patient_list WHERE hospital_id = '".$getuserid."' AND installment = '".$inst."' AND financial_year = '".$year."' order by id DESC";
  $runselectqry = mysql_query($selectqry);
  while($getdata = mysql_fetch_array($runselectqry))
 {
$pt_count = $getdata['id'];

$count_pt_visit = "SELECT * FROM repeated_pt_list WHERE pt_id = '".$pt_count."' AND installment = '".$inst."' AND year = '".$year."'";
$run_pt_visit = mysql_query($count_pt_visit);
$get_pt_visit = mysql_num_rows($run_pt_visit);
 $get_pt_visit + 1;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php include("body/title.php");?> </title>


    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>
<style type="text/css">
  .heading_style{
    color: black;
    font-weight: bold;
  }
</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ZMIS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php include("body/profile_manue.php");?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <?php include("body/sidebar.php");?>

            </div>
             
          </div>

        </div>

        <!-- top navigation -->
       <div class="top_nav">
          <div class="nav_menu">
            <?php include("body/nav.php");?>

          </div>
            
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="row">
                <div class="col-md-6">
                <h3>Patient's History</h3>
                </div>
                <div class="col-md-6">
                  <input type="button" class="btn btn-success pull-right" onclick="printDiv('printableArea')" value="Print Report" />
                  <a href="dashboard.php" style="color: white;"><button class="btn btn-primary pull-right"> Go Back to Dashboard </button></a>
                 
                 </div>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row" id="printableArea">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="heading_style">Patient's Complete Profile</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class=""></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="collapse-link"><i class=""></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  	<h3 class="heading_style">Patient's Personal Details</h3>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <thead>
                         <tr>
                          <th>Hospital Name</th>

                          <td colspan="7" style="font-size: 20px; font-weight: bold;"><?php 
                          $hospital_id = $fetchvalue['hospital_id'];
                          $selecthostpitalsqry = "SELECT * FROM hospital_users WHERE id = '".$hospital_id."'";
                            $runhostpicalqry = mysql_query($selecthostpitalsqry);
                            $fetchhostpitalqry = mysql_fetch_array($runhostpicalqry);
                            echo $hospt_name =  $fetchhostpitalqry['name'];
                          ?></td>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <tr>

                          <th>OPD No</th>
                          <td><?php echo $fetchvalue['opd_no'];?></td>
                          <th>Istehqaq No</th>
                          <td><?php echo $fetchvalue['Istehqaq_no'];?></td>
                          <th>Patient' Name</th>
                          <td><?php echo $fetchvalue['pt_name'];?></td>
                          <th>Father Name</th>
                          <td><?php echo $fetchvalue['fh_name'];?></td>
                        </tr>
                        <tr>
                          <th>CNIC/Form-B</th>
                          <td><?php echo $fetchvalue['pt_cnic'];?></td>
                          <th>Age</th>
                          <td><?php echo $fetchvalue['age'];?></td>
                          <th>Gender</th>
                          <td><?php echo $fetchvalue['gender'];?></td>
                          <th>District Name</th>
                          <td><?php 
                          
                          $district_id =  $fetchvalue['district'];
                                $select_district_name = "SELECT * FROM district_users WHERE id = '".$district_id."'";
                                $run_district_name = mysql_query($select_district_name);
                                $fetch_district_name = mysql_fetch_array($run_district_name);
                                echo $district_name =  $fetch_district_name['district_name'];
                          ?></td>
                        </tr>
                        <tr>
                          <th>LZC Name</th>
                          <td><?php echo $fetchvalue['lzc'];?></td>
                          <th>Patient's Catagory</th>
                          <td><?php echo $fetchvalue['pt_catagory'];?></td>
                          <th>Admission Date</th>
                          <td><?php echo $fetchvalue['admin_date'];?></td>
                          <th>Discharge Date</th>
                          <td><?php echo $fetchvalue['discharge_date'];?></td>
                        </tr>
                        <tr>
                          <th>Cell No</th>
                          <td><?php echo $fetchvalue['cell_no'];?></td>
                          <th>Disease Type</th>
                          <td colspan="5"><?php echo $fetchvalue['disease'];?></td>
                        </tr>
                      </tbody>
                    </table>
 <br>
                    <h3 class="heading_style">Patient's Medication History</h3>

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <tbody>
                        
                        <tr>
                          <th>Sr#</th>
                          <th>Medicine Name</th>
                          <th>Price Per Unit</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Date</th>
                        </tr>
                        <tr>

                           <?php
                              $i = 1;
                              // Patient's Medication History 
                              $select_medication = "SELECT * FROM pt_medicine WHERE pt_id = '".$pid_content."' order by id DESC";
                              $run_medication_qry = mysql_query($select_medication);
                              while($fetch_medication = mysql_fetch_array($run_medication_qry))
                              {
                              ?>
                          <td><?php echo $i;?></td>
                          <td><?php
                          $med_id = $fetch_medication['medicine_name'];

                          $select_medicine_name = "SELECT * FROM medicine_list WHERE id = '".$med_id."'";
                            $run_med_qry = mysql_query($select_medicine_name);
                            $fet_med_name = mysql_fetch_array($run_med_qry);
                            echo $medcine_name =  $fet_med_name['medicine_name'];
                           
                           ?></td>
                          <td><?php echo $fetch_medication['unit_price'];?></td>
                          <td><?php echo $fetch_medication['quantity'];?></td>
                          <td><?php echo $fetch_medication['total_price'];?></td>
                          <td><?php echo $fetch_medication['add_date'];?></td>
                        </tr>
                        <?php
                              $i++;
                              }
                              ?>
                       
                      </tbody>
                    </table>
 <br>
              <h3 class="heading_style">Patient's Test History</h3>

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <tbody>
                        
                        <tr>
                          <th>Sr#</th>
                          <th>Test Name</th>
                          <th>Price Per Unit</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Date</th>
                        </tr>
                        <tr>
                        <?php
                              $test = 1;
                              // Patient's Test History 
                              $select_test = "SELECT * FROM pt_test WHERE pt_id = '".$pid_content."' order by id DESC";
                              $run_test_qry = mysql_query($select_test);
                              while($fetch_test = mysql_fetch_array($run_test_qry))
                              {
                              ?>
                          <td><?php echo $test;?></td>
                          <td><?php
                            $test_id = $fetch_test['test_name'];

                          $select_test_name1 = "SELECT * FROM test_list WHERE id = '".$test_id."'";
                            $run_test_qry1 = mysql_query($select_test_name1);
                            $fet_test_name1 = mysql_fetch_array($run_test_qry1);
                              $pt_test_name1 =  $fet_test_name1['test_name']; 
                            echo $pt_test_name1;
                          ?></td>
                          <td><?php echo $fetch_test['unit_price'];?></td>
                          <td><?php echo $fetch_test['quantity'];?></td>
                          <td><?php echo $fetch_test['total_price'];?></td>
                          <td><?php echo $fetch_test['add_date'];?></td>
                        </tr>
                        <?php
                              $test++;
                              }
                              ?>
                       
                      </tbody>
                    </table>



                    <br> <br>
                    <h3 class="heading_style">Patient's Surgery Details</h3>

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <tbody>
                        
                        <tr>
                          <th>Sr#</th>
                          <th>Surgery Type</th>
                          <th>Surgen Name</th>
                          <th>Surgery Result</th>
                          <th>Surgen Fee</th>
                          <th>Date</th>
                        </tr>
                        <tr>
                        <?php
                              $surg = 1;
                              // Patient's Surgary History 
                              $select_surgary = "SELECT * FROM pt_surgary WHERE pt_id = '".$pid_content."' order by id DESC";
                              $run_surgary_qry = mysql_query($select_surgary);
                              while($fetch_surgary = mysql_fetch_array($run_surgary_qry))
                              {
                              ?>
                          <td><?php echo $surg;?></td>
                          <td><?php echo $fetch_surgary['surgery_type'];?></td>
                          <td><?php echo $fetch_surgary['surgeon_name'];?></td>
                          <td><?php echo $fetch_surgary['surgery_result'];?></td>
                          <td><?php echo $fetch_surgary['surgeon_fee'];?></td>
                          <td><?php echo $fetch_surgary['add_date'];?></td>
                        </tr>
                        <?php
                              $surg++;
                              }
                              ?>
                       
                      </tbody>
                    </table>
                    <h3 class="heading_style">Patient's Total Expenditure</h3>

                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                      <tbody>
                        
                        <tr style="color: black; font-weight: bold;">
                         <div class="ln_solid"></div>
                          <div class="col-md-3">
                          <h2 class="heading_style">Total Amount</h2>
                          </div>
                          <div class="col-md-3">
                          </div>
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-2">
                            <?php 
                            $select_total_expense = "SELECT SUM(total_expense) as total_amount FROM  pt_expense WHERE pt_id = '".$pid_content."' order by id DESC";
                              $run_expense_qry = mysql_query($select_total_expense);
                              $fetch_pt_expense = mysql_fetch_array($run_expense_qry);
                              $total_pt_expense = $fetch_pt_expense['total_amount'];
                              
                            ?>
                            <h2 class="heading_style">Rs.<?php echo $total_pt_expense;?>/-</h2>
                          </div>
                        </tr>
                       
                       
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript">
    	
     function toggleShared() {
    
      payment_rec_from = document.getElementById('payment_rec_from').value;
      district_list = document.getElementById('district_list');
      accounthead = document.getElementById('accounthead');
      hospital_list = document.getElementById('hospital_list');
      
      if(payment_rec_from == 'District') {
        district_list.style.display = 'block';
        accounthead.style.display = 'block';
        hospital_list.style.display = 'none';
        health_account_head.style.display = 'none';
          }
      else if(payment_rec_from =='Hospital')
      {
      hospital_list.style.display = 'block';
      health_account_head.style.display = 'block';
      district_list.style.display = 'none';
      accounthead.style.display = 'none';
      }
      else
      {
        district_list.style.display = 'none';
        accounthead.style.display = 'none';
        hospital_list.style.display = 'none';
        health_account_head.style.display = 'none'; 
      }
          
     } 
   

    </script>
    <script type="text/javascript">
  
  // Pringt Selected Tag
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
