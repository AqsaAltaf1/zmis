
 <?php 

$userid = $this->session->userdata('id');
$get_hosp_name = $this->db->select('*')->from('hospital_users')->where('id',$userid)->get();
$hospital_name = $get_hosp_name->row('hospital_name');

 ?>
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><strong><?php echo $hospital_name;?></strong>-Admin</a>
        </div>
      </div>