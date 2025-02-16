<?php
class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database
      
    }

    // public function fetch_all() {
    //       $sql = "SELECT info.student_name, info.f_name, info.date_of_birth, info.gender, cert.dis_impairment, cert.fit_to_work
    //             FROM beneficiaries_info info
    //             JOIN certificates_card_issue cert ON info.id = cert.user_id
    //             ORDER BY info.f_name ASC";
    //     // Execute the query
    //     $query = $this->db->query($sql);
    //     // Return the result as an array
    //     return $query->result_array();
    // }	
    
public function MustahiqeenSummary($getfinancial_year) {
    $sql = "SELECT * FROM `mustahiqeensummary`";
      // Adjust the query and table names as needed
    $query = $this->db->query($sql);
    return $query->result_array();
}

   
public function GA_mustahiqeenList($getfinancial_year) {
  $sql = "SELECT * FROM `ga_mustahiqeen_list`";
    // Adjust the query and table names as needed
  $query = $this->db->query($sql);
  return $query->result_array();
}


}

?>
