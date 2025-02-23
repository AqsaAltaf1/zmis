<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all funds
    public function get_all_funds() {
        return $this->db->get('zakat_fund_received')->result_array();
    }

    // Insert new fund
    public function insert_fund($data) {
        return $this->db->insert('zakat_fund_received', $data) ? $this->db->insert_id() : false;
    }
}
