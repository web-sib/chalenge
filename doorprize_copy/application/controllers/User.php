<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('user_model', 'user');
    }
    public function index()
    {
        $data['results'] = $this->user->get()->result();
        $this->template->load('template/template', 'user/index', $data);
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('address', 'Address', 'required');

        // set message for validation
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('valid_email', '{field} must be valid email');
        $this->form_validation->set_message('min_length', '{field} at least 5 characters');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} cannot be anything other than numbers, letters and spaces');

        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'user/create');
        } else {
            $post = $this->input->post();
            $create = $this->user->create($post);
            if ($create > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            successfully added new data.
                          </div>');
                redirect('user/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                            Failed added new data.
                          </div>');
                redirect('user/index');
            }
        }
    }

    public function delete()
    {
        $delete = $this->user->delete($this->input->post('id'));
        echo json_encode($delete);
    }

    public function show($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('address', 'Address', 'required');

        // set message for validation
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('min_length', '{field} at least 5 characters');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} cannot be anything other than');

        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->user->getWhere($id)->row();
            $this->template->load('template/template', 'user/show', $data);
        } else {
            $post = $this->input->post();
            $update = $this->user->update($post, $id);
            if ($update > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            successfully updated data.
                          </div>');
                redirect('user/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                            Failed Updated data.
                          </div>');
                redirect('user/index');
            }
        }
    }
}
