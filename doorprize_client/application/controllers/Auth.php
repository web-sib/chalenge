<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_true();
        $this->load->model('user_model', 'user');
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('valid_email', '{field} must be fill valid email');

        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $post = $this->input->post();
            $user = $this->user->getWhere($post);
            if ($user) {
                $param = [
                    'user_id' => $user[0]['id']
                ];
                $this->session->set_userdata($param);
                echo "<script>
                alert('Login success')
                window.location.href='" . base_url('home/index') . "'</script>";
            } else {
                echo "<script>
                alert('Login failed')
                window.location.href='" . base_url('auth/login') . "'</script>";
            }
        }
    }
}
