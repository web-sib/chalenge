<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doorprize extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('Doorprize_model', 'doorprize');
    }
    public function index()
    {
        $data['results'] = $this->doorprize->get()->result();
        $this->template->load('template/template', 'doorprize/index', $data);
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('point', 'Point', 'required|is_natural');

        // set message
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('is_natural', '{field} must be numbers');

        // set delimiter
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'doorprize/create');
        } else {
            $post = $this->input->post();
            $create = $this->doorprize->create($post);
            if ($create > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                successfully added new data.
              </div>');
                redirect('doorprize/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                failed added new data.
              </div>');
                redirect('doorprize/index');
            }
        }
    }
    public function delete()
    {
        $delete = $this->doorprize->delete($this->input->post('id'));
        echo json_encode($delete);
    }
    public function show($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('point', 'Point', 'required|is_natural');

        // set message
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('is_natural', '{field} must be numbers');

        // set delimiter
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['doorprize'] = $this->doorprize->getWhere($id)->row();
            $this->template->load('template/template', 'doorprize/show', $data);
        } else {
            $post = $this->input->post();
            $update = $this->doorprize->update($post, $id);
            if ($update > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                successfully updated data.
              </div>');
                redirect('doorprize/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                failed updated data.
              </div>');
                redirect('doorprize/index');
            }
        }
    }
}
