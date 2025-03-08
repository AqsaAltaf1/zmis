<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funds extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Fund_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->database();
        $this->load->helper('url');
    }

    // Display all received funds
    public function fund_received() {
        $data['funds'] = $this->Fund_model->get_all_funds();
        $this->load->view('funds/fund_received', $data);
    } 

    // Store new fund details
    public function store() {
        // Set form validation rules
        $this->form_validation->set_rules('payment_received', 'Payment Received', 'required');
        $this->form_validation->set_rules('total_expenditure', 'Total Expenditure', 'required');
        $this->form_validation->set_rules('check_no', 'Check No', 'required');
        $this->form_validation->set_rules('check_date', 'Check Date', 'required');
        $this->form_validation->set_rules('financial_year', 'Financial Year', 'required');
        $this->form_validation->set_rules('payment_rec_from', 'Payment Received From', 'required');
        $this->form_validation->set_rules('account_head', 'Account Head', 'required');
        $this->form_validation->set_rules('received_date', 'Received Date', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Pass validation errors via flashdata
            $this->session->set_flashdata('error', validation_errors());
            redirect('funds/fund_received');
        } else {
            // Prepare fund data for insertion
            $fund_data = $this->input->post(NULL, TRUE);

            if ($this->Fund_model->insert_fund($fund_data)) {
                $this->session->set_flashdata('success', 'Fund details saved successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to save fund details.');
            }

            redirect('funds/fund_received');
        }
    }
}
