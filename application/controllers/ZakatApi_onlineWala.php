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
		    $getInstallment = $getfinancialdata->row('installment');
            switch ($type) {
                case 'districtWiseFund':
                    $data = $this->Api_model->districtWiseFund($getfinancial_year);
                    break;
                case 'GA_mustahiqeen':
                    $data = $this->Api_model->GA_mustahiqeen($getfinancial_year);
                    break;
                case 'GAcategory':
                    $data = $this->Api_model->GAcategory($getfinancial_year);
                    break;
                case 'headWise':
                    $data = $this->Api_model->headWise($getfinancial_year);
                    break;
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
                case 'Reg_Paid_MustahiqeenSummary':
                        $data = $this->Api_model->Reg_Paid_MustahiqeenSummary($getfinancial_year);
                        break;        
                default:
                    $data = $this->Api_model->fetch_all();
                    break;
            }

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'data' => $data,
                    //'query' => $this->db->last_query() // Debugging information
                ]));
        } else {
            // Token is invalid
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['message' => 'Unauthorized']));
        }

       
    }
}
?>
