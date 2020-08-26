<?php

class Data_session
{

    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('user_model', 'user');
    }
    public function get_session()
    {
        $id = $this->ci->session->userdata('user_id');
        $data = $this->ci->user->getWhereId($id);
        return $data;
    }
}
