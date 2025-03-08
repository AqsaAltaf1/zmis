<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistrictStaffModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert_staff($data) {
        return $this->db->insert('district_staff', $data);
    }

    public function update_staff($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('district_staff', $data);
    }
}
