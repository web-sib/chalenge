<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_true();
        $this->load->model('auth_model', 'auth');
    }

    public function login()
    {
        // set rules
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'PAssword', 'required');
        // set message
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('min_length', '{field} at least 3 characters');
        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $post = $this->input->post();
            $login = $this->auth->login($post);
            if ($login->num_rows() > 0) {
                $results = $login->row();
                $param = [
                    'id' => $results->id
                ];
                $this->session->set_userdata($param);
                echo "<script>
                alert('Login success')
                window.location.href='" . base_url('admin') . "'</script>";
            } else {
                echo "<script>
                alert('Login failed')
                window.location.href='" . base_url('auth/login') . "'</script>";
            }
        }
    }
}
