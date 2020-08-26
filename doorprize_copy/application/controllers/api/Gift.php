<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Gift extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gift_model','gift');
	}
	public function index_get()
	{
		$user_id = $this->get('user_id');
		if($user_id === null){
			$data = $this->gift->get()->result_array();
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
			$data = $this->gift->getWhere($user_id)->result_array();
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
	public function index_post()
	{
		$user_id = $this->post('user_id');
		$doorprize_id = $this->post('doorprize_id');
		if($user_id === null || $doorprize_id === null){
			$this->response([
				'status' => false,
				'message' => 'Failed to insert, data not complete'
			],REST_Controller::HTTP_BAD_REQUEST);
		}else{
			$data = [
				'user_id' => $user_id,
				'doorprize_id' => $doorprize_id,
				'address' => $this->post('address'),
				'is_active' => $this->post('is_active')
			];

			$insert = $this->gift->insert($data);
			if($insert){
				$this->response([
					'status' => true,
					'message' => 'Added a data'
				],REST_Controller::HTTP_CREATED);
			}else{
				$this->response([
					'status' => false,
					'message' => 'Failed to insert data'
				],REST_Controller::HTTP_BAD_REQUEST);
			}
		}

	}
}