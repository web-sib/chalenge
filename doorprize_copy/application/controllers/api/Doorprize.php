<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Doorprize extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('doorprize_model','doorprize');
	}
	public function index_get()
	{
		$id = $this->get('id');
			if($id === NULL){
				$result = $this->doorprize->get()->result_array();
				if($result){
					$this->response([
						'status' => true,
						'data' => $result
					],REST_Controller::HTTP_OK);
				}else{
					$this->response([
						'status' => false,
						'message' => 'No users were found'
					],REST_Controller::HTTP_NOT_FOUND);
				}
			}else{
				$result = $this->doorprize->getWhere($id)->row_array();
				if($result){
					$this->response([
						'status' => true,
						'data' => $result
					],REST_Controller::HTTP_OK);
				}else{
					$this->response([
						'status' => false,
						'message' => 'No users were found'
					],REST_Controller::HTTP_NOT_FOUND);
				}
			}
	}

	public function gtrows_get()
	{
		$rows = $this->get('rows');
		if($rows === NULL){
			$this->response([
					'status' => false,
					'message' => 'Value of params rows blank'
				],REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if($rows === 'yes'){
				$row = $this->doorprize->getRows();
				if($row > 0){
				$this->response([
					'status' => true,
					'data' => $row
				],REST_Controller::HTTP_OK);
				}else{
					$this->response([
						'status' => false,
						'message' => 'No rows were found'
					],REST_Controller::HTTP_NOT_FOUND);
				}
			}else{
				$this->response([
					'status' => false,
					'message' => 'Value of params rows wrong'
				],REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}
	public function grand_get()
	{
		$grand = $this->get('grand');
		if($grand === NULL){
			$this->response([
					'status' => false,
					'message' => 'Value of params grand blank'
				],REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if($grand === 'yes'){
				$row = $this->doorprize->getGrand()->result_array();
				if($row > 0){
				$this->response([
					'status' => true,
					'data' => $row
				],REST_Controller::HTTP_OK);
				}else{
					$this->response([
						'status' => false,
						'message' => 'No grand were found'
					],REST_Controller::HTTP_NOT_FOUND);
				}
			}else{
				$this->response([
					'status' => false,
					'message' => 'Value of params grand wrong'
				],REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}


	// public function paginationData_get()
	// {
	// 	$pagination = $this->get('pagination');
	// 	if($pagination === 'yes'){
	// 		$row = $this->doorprize->getRows();
	// 		$start = $this->get('start');
	// 		$limit = $this->get('limit');
	// 		$base_url = $this->get('url');
	// 		// configurasi pagiation
	// 		$config['base_url'] = $base_url;
	// 		$config['total_rows'] = $row;
	// 		$config['per_page'] = $limit;

	// 		$this->pagination->initialize($config);
	// 		$query = $this->doorprize->getPaginate($config['per_page'],$start)->result_array();
	// 		if($query){
	// 			$this->response([
	// 				'status' => true,
	// 				'data' => $query
	// 			],REST_Controller::HTTP_OK);
	// 		}else{
	// 			$this->response([
	// 					'status' => false,
	// 					'message' => 'No users were found'
	// 			],REST_Controller::HTTP_NOT_FOUND);
	// 		}
	// 	}else{
	// 		$this->response([
	// 			'status' => false,
	// 			'message' => 'value of params pagination wrong'
	// 		],REST_Controller::HTTP_BAD_REQUEST);
	// 	}

	// }
}