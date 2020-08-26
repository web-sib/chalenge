<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Point extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Point_model', 'point');
    }
    public function index_get()
    {
        $results = $this->point->get()->result_array();
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
            $getWhere = $this->point->getWhere($id)->result_array();
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
    public function index_put()
    {
        $user_id = $this->put('user_id');
        $point = $this->put('point');

        if($user_id === NULL || $point === NULL){
            $this->response([
                'status' => false,
                'message' => 'Failed to update, data not complete'
            ],REST_Controller::HTTP_BAD_REQUEST);
        }else{
             $data = [
                'point' => $point,
            ];

            $update = $this->point->update($data,$user_id);
            if($update){
                $this->response([
                    'status' => true,
                    'message' => 'updated a data'
                ],REST_Controller::HTTP_CREATED);
            }else{
                $this->response([
                    'status' => false,
                    'data' => $update
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
