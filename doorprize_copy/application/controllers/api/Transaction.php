<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Transaction extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaction_model','transaction');
	}
	    public function index_get()
    {
        $results = $this->transaction->get()->result_array();
        $id = $this->get('user_id');
        if ($id === NULL) {
            if ($results) {
                $this->response([
                    'status' => TRUE,
                    'data' => $results
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were fount'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $getWhere = $this->transaction->getWhereUser($id)->result_array();
            if ($getWhere) {
                $this->response([
                    'status' => TRUE,
                    'data' => $getWhere
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were fount'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}