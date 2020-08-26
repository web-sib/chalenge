<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('product_model','product');
        $this->load->model('user_model','user');
        $this->load->model('doorprize_model','doorprize');
        $this->load->model('transaction_model','transaction');
    }
    public function index()
    {
        $data = [
            'product' => $this->product->get()->num_rows(),
            'user' => $this->user->get()->num_rows(),
            'doorprize' => $this->doorprize->get()->num_rows(),
            'transaction' => $this->transaction->get()->num_rows()
        ];
        $this->template->load('template/template', 'admin/index',$data);
    }
    public function logout()
    {
        $params = array('id');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
