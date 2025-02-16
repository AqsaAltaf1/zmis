<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class ZakatApi extends CI_Controller {

    private $fixed_token = 'zakat_CM_data'; // Dummy token for authentication

    public function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->helper('url');
    }

    public function index() {
        // Get the token from query parameters
        $provided_token = $this->input->get('token');
        
        // Check if the token is valid
        if ($provided_token === $this->fixed_token) {
            // Determine which function to call based on a query parameter
            $type = $this->input->get('type');
            $getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
            $getfinancial_year = $getfinancialdata->row('financial_Year');
            
            $type = $_GET['type'] ?? 'default';
            switch 
            ($type) {
                case 'GA_mustahiqeenList':
                    $data = $this->Api_model->GA_mustahiqeenList($getfinancial_year);
                    break;
                case 'MA_mustahiqeenList':
                    $data = $this->Api_model->MA_mustahiqeenList($getfinancial_year);
                    break;
                case 'DM_mustahiqeenList':
                    $data = $this->Api_model->DM_mustahiqeenList($getfinancial_year);
                    break;
                case 'ES_mustahiqeenList':
                    $data = $this->Api_model->ES_mustahiqeenList($getfinancial_year);
                    break;
                case 'HC_mustahiqeenList':
                    $data = $this->Api_model->HC_mustahiqeenList($getfinancial_year);
                    break;
                case 'MustahiqeenSummary':
                    $data = $this->Api_model->MustahiqeenSummary($getfinancial_year);
                    break;
                default:
                    $data = $this->Api_model->fetch_all();
                    break;
            }

            $view_data['data'] = $data;
            $this->load->view('zakat_api_summary', $view_data);
                
        } else {
            // Token is invalid
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Unauthorized']));
        }
    }
}
// <!-- <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class ZakatApi extends CI_Controller {

//     private $fixed_token = 'zakat_CM_data'; // Dummy token for authentication

//     public function __construct() {
//         parent::__construct();
//         $this->load->model('Api_model');
//         $this->load->helper('url');
//     }

//     public function index() {
//         // Get the token from query parameters
//         $provided_token = $this->input->get('token');
        
//         // Check if the token is valid
//         if ($provided_token === $this->fixed_token) {
//             // Determine which function to call based on a query parameter
//             $type = $this->input->get('type');
//             $getfinancialdata = $this->db->select('*')->from('year_installment')->where('status',1)->get();
//             $getfinancial_year = $getfinancialdata->row('financial_Year');
            
//             switch ($type) {
//                 case 'MustahiqeenSummary':
//                     $data = $this->Api_model->MustahiqeenSummary($getfinancial_year);
//                     break;
//                 default:
//                     $data = $this->Api_model->fetch_all();
//                     break;
//             }

//             // Prepare data for the view
//             $view_data['data'] = $data;

//             // Load the view and pass the data
//             $this->load->view('zakat_api_summary', $view_data);
//         } else {
//             // Token is invalid
//             $this->output
//                 ->set_content_type('application/json')
//                 ->set_output(json_encode(['message' => 'Unauthorized']));
//         }
//     }
// } -->
