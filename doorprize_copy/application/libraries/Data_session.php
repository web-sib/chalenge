<?php

class Data_session
{

    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('officer_model', 'officer');
    }
    public function get_session()
    {
        $id = $this->ci->session->userdata('id');
        $data = $this->ci->officer->getWhere($id)->row();
        return $data;
    }
}
