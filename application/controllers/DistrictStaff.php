<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistrictStaff extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('DistrictStaffModel');
		$this->load->library('session'); // Load session for alerts
		$this->load->helper('url'); // Load URL helper for redirection
	}

	// Store New District Staff
	public function store() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_type' => $this->input->post('user_type'),
			'district_id' => $this->input->post('district_id'),
			'phone_number' => $this->input->post('phone_number')
		);

		if ($this->DistrictStaffModel->insert_staff($data)) {
			$this->session->set_flashdata('success', 'District Staff added successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to add District Staff.');
		}

		redirect(base_url('Secretary_dashboard/UserManagement'));
	}

	// Update District Staff
	public function update() {
		$id = $this->input->post('staff_id');
		$data = array(
			'username' => $this->input->post('username'),
			'user_type' => $this->input->post('user_type'),
			'district_id' => $this->input->post('district_id'),
			'phone_number' => $this->input->post('phone_number')
		);

		// Update password only if provided
		if (!empty($this->input->post('password'))) {
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		}

		if ($this->DistrictStaffModel->update_staff($id, $data)) {
			$this->session->set_flashdata('success', 'District Staff updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update District Staff.');
		}

		redirect(base_url('Secretary_dashboard/UserManagement'));
	}
}
