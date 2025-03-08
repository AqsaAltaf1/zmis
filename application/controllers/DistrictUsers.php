<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistrictUsers extends CI_Controller {

  public function store() {
    $this->load->library('session'); // Load session library for flash messages

    // Get form data
    $data = [
      'district_name' => trim($this->input->post('district_name')),
      'population' => $this->input->post('population'),
      'NOB' => $this->input->post('NOB'),
      'number_of_lzc' => $this->input->post('number_of_lzc'),
      'username' => $this->input->post('username'),
      'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
      'role' => 'district',
      'status' => $this->input->post('status'),
    ];

    // **Step 1: Check if district_name already exists**
    $existing = $this->db->get_where('district_users', ['district_name' => $data['district_name']])->row();
    if ($existing) {
      $this->session->set_flashdata('error', 'Error: District name must be unique!');
      redirect('Secretary_dashboard/UserManagement'); // Redirect back to form
      return;
    }

    // **Step 2: Insert New Record**
    $this->db->insert('district_users', $data);

    // **Step 3: Update Total Population & Percentage**
    $this->updateTotalPopulation();

    // **Step 4: Success Message & Redirect**
    $this->session->set_flashdata('success', 'District added successfully!');
    redirect('Secretary_dashboard/UserManagement');
  }

  private function updateTotalPopulation() {
    // Get the new total population
    $query = $this->db->query("SELECT SUM(population) AS total_population FROM district_users");
    $total_population = ($query->num_rows() > 0) ? $query->row()->total_population : 0;

    if ($total_population > 0) {
      // Update total_population in all records
      $this->db->query("UPDATE district_users SET total_population = $total_population");

      // Update each record's population_percentage
      $districts = $this->db->get('district_users')->result();
      foreach ($districts as $district) {
        $percentage = ($district->population / $total_population) * 100;

        $this->db->where('id', $district->id);
        $this->db->update('district_users', ['population_percentage' => $percentage]);
      }
    }
  }


  public function update() {
    $district_id = $this->input->post('district_id');
    $population = $this->input->post('population');
    $district_name = $this->input->post('district_name');
    $NOB = $this->input->post('NOB');
    $number_of_lzc = $this->input->post('number_of_lzc');
    $status = $this->input->post('status');

    // Fetch current population for comparison
    $currentDistrict = $this->db->get_where('district_users', ['id' => $district_id])->row();
    $old_population = $currentDistrict->population;

    // Update the specific district record
    $this->db->where('id', $district_id);
    $this->db->update('district_users', [
      'district_name' => $district_name,
      'population' => $population,
      'NOB' => $NOB,
      'number_of_lzc' => $number_of_lzc,
      'status' => $status
    ]);

    // If population has changed, update total population and percentages
    if ($old_population != $population) {
      $this->updateTotalPopulation();
    }

    // Redirect back with success message
    $this->session->set_flashdata('success', 'District updated successfully.');
    redirect('Secretary_dashboard/UserManagement');
  }
}
