<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Product extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
	}
	public function index_get()
	{
		$id = $this->get('id');
		if($id === null){
			$data = $this->product->get()->result_array();
			if($data){
				$this->response([
					'status' => true,
					'data' => $data
				],REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No data were found'
				],REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
			$data = $this->product->getWhere($id)->result_array();
			if($data){
				$this->response([
					'status' => true,
					'data' => $data
				],REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No data were found!'
				],REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}
}