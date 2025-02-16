<?php
$page = $this->uri->segment(1);
$subPage = $this->uri->segment(2);
?>

<nav class="mt-2">

  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

    <?php
    if (($page == "Pza_dashboard") || ($page == "Pza_lzcwise_report")) {
    ?>
      <li class="nav-item has-treeview menu-open">
      <?php
    } else {
      ?>
      <li class="nav-item has-treeview">
      <?php
    }
      ?>

      <?php
      if (($page == "Pza_dashboard") || ($page == "Pza_lzcwise_report")) {
      ?>
        <a href="#" class="nav-link active">
        <?php
      } else {
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
              <a href="<?php echo base_url(); ?>Pza_dashboard/" class="nav-link <?php if ($page == "Pza_dashboard") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_lzcwise_report" class="nav-link <?php if ($page == "Pza_lzcwise_report") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Print LZC Wise Report</p>
              </a>
            </li>
          </ul>
      </li>


      <?php
      if (($page == "Pza_fund_allocation") || ($page == "Pza_head_wise_fund_alloc") || ($page == "Pza_district_shares") || ($page == "PzaMergedDistrictShares") || ($page == "Pza_district_fund_allocation")  || ($page == "Pza_hospital_fund_allocation") || ($page == "Pza_yearly_fund_allocation")) {
      ?>
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
          <?php
        } else {
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

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_yearly_fund_allocation" class="nav-link <?php if ($page == "Pza_yearly_fund_allocation") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>PZA Yearly Fund Allocation</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_fund_allocation" class="nav-link <?php if ($page == "Pza_fund_allocation") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>PZA Inst-Wise Allocation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_head_wise_fund_alloc" class="nav-link <?php if ($page == "Pza_head_wise_fund_alloc") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Head Wise Allocation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_district_shares" class="nav-link <?php if ($page == "Pza_district_shares") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Settled District Shares</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>PzaMergedDistrictShares" class="nav-link <?php if ($page == "PzaMergedDistrictShares") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Merged District Shares</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_district_fund_allocation" class="nav-link <?php if ($page == "Pza_district_fund_allocation") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>District Fund summery</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url(); ?>Pza_hospital_fund_allocation" class="nav-link <?php if ($page == "Pza_hospital_fund_allocation") echo "active"; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Hospital Fund Allocation</p>
              </a>
            </li>

          </ul>
        </li>


        <?php
        if (($page == "Pza_fund_summary") || ($page == "Pza_reports")  || ($page == "Pza_housestatus_reports") || ($page == "Pza_dist_genderwise_reports") || ($page == "Pza_category_wise_report") || ($page == "Pza_head_wise_report") || ($page == "Pza_hosp_reports") || ($page == "Pza_RB_reports") || ($page == "Pza_hr_reports")  || ($page == "RejectedMustahiqeen")) {
        ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
            <?php
          } else {
            ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <?php
          }
            ?>

            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Monitoring & Reporting
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_fund_summary" class="nav-link <?php if ($page == "Pza_fund_summary") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Summary Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_reports" class="nav-link <?php if ($page == "Pza_reports") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PZA Reports</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_dist_genderwise_reports" class="nav-link <?php if ($page == "Pza_dist_genderwise_reports") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gender Wise Reports</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_housestatus_reports" class="nav-link <?php if ($page == "Pza_housestatus_reports") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demographic Status</p>
                </a>
              </li>




              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_category_wise_report" class="nav-link <?php if ($page == "Pza_category_wise_report") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Wise Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Pza_head_wise_report" class="nav-link <?php if ($page == "Pza_head_wise_report") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Head Wise Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>RejectedMustahiqeen" class="nav-link <?php if ($page == "RejectedMustahiqeen") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected Mustahiqeen</p>
                </a>
              </li>




            </ul>
          </li>



          <!-- District Wise Reporting-->
          <?php
          if (($page == "Pza_distwise_disbursement_report") || ($page == "Pza_dist_reports") || ($page == "Pza_dist_profile") || ($page == "PzaDistwisePaidReport")  || ($page == "Pza_posting_transfer")  || ($page == "Posts_list")) {
          ?>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
              <?php
            } else {
              ?>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
              <?php
            }
              ?>

              <i class="nav-icon fas fa-users"></i>
              <p>
                District Wise Reporting
                <i class="right fas fa-angle-left"></i>
              </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_distwise_disbursement_report" class="nav-link <?php if ($page == "Pza_distwise_disbursement_report") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fund Utilization Summary</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>PzaDistwisePaidReport" class="nav-link <?php if ($page == "PzaDistwisePaidReport") echo "active"; ?>">
                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Paid Utilization Summary</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_dist_reports/distWisePaidMustahiqeen" class="nav-link <?php if ($subPage == "distWisePaidMustahiqeen") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Year-Wise Paid Mustahiqen</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_dist_reports/index" class="nav-link <?php if ($subPage == "index") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>District Reports</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_dist_profile" class="nav-link <?php if ($page == "Pza_dist_profile") echo "active"; ?>">
                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p> District Profile</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_dist_reports/yearlyHeadwiseSummary" class="nav-link <?php if ($subPage == "yearlyHeadwiseSummary") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yearly Headwise Summary</p>
                  </a>
                </li>




                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_employees" class="nav-link <?php if ($page == "Pza_employees") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Report</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Pza_posting_transfer" class="nav-link <?php if ($page == "Pza_posting_transfer") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>New Report 1</p>
                  </a>
                </li>

                <!-- <li class="nav-item">
<a href="<?php echo base_url(); ?>Pza_hospital_fund_allocation" class="nav-link <?php if ($page == "Pza_hospital_fund_allocation") echo "active"; ?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Hospital Fund Allocation</p>
</a>
</li> -->

              </ul>
            </li>




            <!-- HR reporting -->



            <?php
            if (($page == "Pza_organogram") || ($page == "Pza_new_post") || ($page == "Pza_employees") || ($page == "Pza_posting_transfer")  || ($page == "Posts_list")) {
            ?>
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                <?php
              } else {
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
                    <a href="<?php echo base_url(); ?>Pza_organogram" class="nav-link <?php if ($page == "Pza_organogram") echo "active"; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Organizational Structure</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Pza_new_post" class="nav-link <?php if ($page == "Pza_new_post") echo "active"; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add New Post</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Posts_list" class="nav-link <?php if ($page == "Posts_list") echo "active"; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Of Posts</p>
                    </a>
                  </li>


                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Pza_employees" class="nav-link <?php if ($page == "Pza_employees") echo "active"; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>HR List</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Pza_posting_transfer" class="nav-link <?php if ($page == "Pza_posting_transfer") echo "active"; ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Posting/Transfer</p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
<a href="<?php echo base_url(); ?>Pza_hospital_fund_allocation" class="nav-link <?php if ($page == "Pza_hospital_fund_allocation") echo "active"; ?>">
  <i class="far fa-circle nav-icon"></i>
  <p>Hospital Fund Allocation</p>
</a>
</li> -->

                </ul>
              </li>








              <li class="nav-item">
                <hr color="white" />
              </li>
              <?php
              if (($page == "Pza_institution_reg") || ($page == "UserManagement") || ($page == "ApplicantManagement") || ($page == "YearInstallmentAllocation")  || ($page == "AffidavitManagement")) {
              ?>

                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">

                  <?php
                } else {
                  ?>

                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                  <?php
                }
                  ?>

                  <i class="nav-icon fas fa-cogs"></i>
                  <p>
                    Admin Panel
                    <i class="right fas fa-angle-left"></i>

                  </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>Pza_institution_reg" class="nav-link <?php if ($page == "Pza_institution_reg") echo "active"; ?>">
                        <i class="far fa-registered"></i>
                        <p>Institution Resgitration</p>
                      </a>
                    </li>


                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>UserManagement" class="nav-link <?php if ($page == "UserManagement") echo "active"; ?>">
                        <i class="fas fa-users-cog"></i>
                        <p>User Management</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>ApplicantManagement" class="nav-link <?php if ($page == "ApplicantManagement") echo "active"; ?>">
                        <i class="fas fa-user-edit"></i>
                        <p>Applicant Management</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>AffidavitManagement" class="nav-link <?php if ($page == "AffidavitManagement") echo "active"; ?>">
                        <i class="fas fa-user-edit"></i>
                        <p>Affidavit Management</p>
                      </a>
                    </li>


                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>YearInstallmentAllocation" class="nav-link <?php if ($page == "YearInstallmentAllocation") echo "active"; ?>">
                        <i class="fas fa-user-edit"></i>
                        <p>F/Y/Installment Management</p>
                      </a>
                    </li>



                  </ul>
                </li>


  </ul>


</nav>