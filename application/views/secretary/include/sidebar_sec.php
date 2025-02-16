<?php
$page = $this->uri->segment(1);
$subPage = $this->uri->segment(2);
?>

<nav class="mt-2">

  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->

    <?php
     if (($page == "Secretary_dashboard") || ($page == "Sec_Pza_dist_genderwise_reports")  || ($page == "Sec_Pza_housestatus_reports") || ($page == "Sec_Pza_dist_genderwise_reports") || ($page == "Sec_Pza_category_wise_report") || ($page == "Sec_Pza_head_wise_report") || ($page == "Sec_RejectedMustahiqeen")) {
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
      if (($page == "Secretary_dashboard") || ($page == "Sec_Pza_dist_genderwise_reports")  || ($page == "Sec_Pza_housestatus_reports") || ($page == "Sec_Pza_dist_genderwise_reports") || ($page == "Sec_Pza_category_wise_report") || ($page == "Sec_Pza_head_wise_report") || ($page == "Sec_RejectedMustahiqeen")) {
      ?>
        <a href="#" class="nav-link active">
        <?php
      } else {
        ?>
          <a href="#" class="nav-link">
          <?php
        }
          ?>
			
			 <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Secretary Dashboard
              <i class="right fas fa-angle-left"></i>
			
          </p>
          </a>
          <ul class="nav nav-treeview">
  
        <?php
        if (($page == "Secretary_dashboard") || ($page == "Sec_Pza_dist_genderwise_reports")  || ($page == "Sec_Pza_housestatus_reports") || ($page == "Sec_Pza_dist_genderwise_reports") || ($page == "Sec_Pza_category_wise_report") || ($page == "Sec_Pza_head_wise_report") || ($page == "Sec_RejectedMustahiqeen")) {
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
                <a href="<?php echo base_url(); ?>Secretary_dashboard" class="nav-link <?php if ($page == "Secretary_dashboard") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fund Summary</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Sec_Pza_dist_genderwise_reports" class="nav-link <?php if ($page == "Sec_Pza_dist_genderwise_reports") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gender Wise Reports</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Sec_Pza_housestatus_reports" class="nav-link <?php if ($page == "Sec_Pza_housestatus_reports") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demographic Status</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Sec_Pza_category_wise_report" class="nav-link <?php if ($page == "Sec_Pza_category_wise_report") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Wise Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Sec_Pza_head_wise_report" class="nav-link <?php if ($page == "Sec_Pza_head_wise_report") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Head Wise Report</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Sec_RejectedMustahiqeen" class="nav-link <?php if ($page == "Sec_RejectedMustahiqeen") echo "active"; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected Mustahiqeen</p>
                </a>
              </li>




            </ul>
          </li>



          <!-- District Wise Reporting-->
		  
    

     
		  
          <?php
          if (($page == "Sec_PzaDistwisePaidReport") || ($page == "Sec_Pza_dist_reports")|| ($page == "yearlyHeadwiseSummary")) {
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
                  <a href="<?php echo base_url(); ?>Sec_PzaDistwisePaidReport" class="nav-link <?php if ($page == "Sec_PzaDistwisePaidReport") echo "active"; ?>">
                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Paid Utilization Summary</p>
                  </a>
                </li>
			
                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Sec_Pza_dist_reports/index" class="nav-link <?php if ($subPage == "index") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>District Reports</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url(); ?>Sec_Pza_dist_reports/yearlyHeadwiseSummary" class="nav-link <?php if ($subPage == "yearlyHeadwiseSummary") echo "active"; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yearly Headwise Summary</p>
                  </a>
                </li>
         
              </ul>
     

