<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','user');
	}
	public function index_get()
	{
		$id = $this->get('id');
		if($id === NULL){
			$result = $this->user->get()->result_array();
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
			$result = $this->user->getWhere($id)->row_array();
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
	public function login_get()
	{
		if($this->get('email') === null || $this->get('password') === NULL){
			$this->response([
				'status' => false,
				'message' => 'Not found'
			],REST_Controller::HTTP_NOT_FOUND);
		}else{
			$data = $this->user->getLogin($this->get('email'),$this->get('password'));
			if($data){
				$this->response([
					'status' => true,
					'data' => $data->result_array()
				],REST_Controller::HTTP_OK);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No rows were found'
				],REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}
}
