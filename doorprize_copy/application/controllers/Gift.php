<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gift extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('gift_model', 'gift');
        $this->load->model('user_model', 'user');
    }
    public function index()
    {
        $data['results'] = $this->gift->getJoin()->result();
        $this->template->load('template/template', 'gift/index', $data);
    }
    public function delete()
    {
        $delete = $this->gift->delete($this->input->post('id'));
        echo json_encode($delete);
    }
}
