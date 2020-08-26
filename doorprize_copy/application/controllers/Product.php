<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('Product_model', 'product');
    }
    public function index()
    {
        $data['results'] = $this->product->get()->result();
        $this->template->load('template/template', 'product/index', $data);
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural');
        $this->form_validation->set_rules('purchase', 'Purchase Price', 'required|is_natural');
        $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');

        // set message for validation
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('is_natural', '{field} must be numbers');
        $this->form_validation->set_message('min_lenth', '{field} at least 3 characters');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} cannot be anything other than numbers, letters and spaces');

        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'product/create');
        } else {
            $post = $this->input->post();
            $create = $this->product->create($post);
            if ($create > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            successfully added new data.
                          </div>');
                redirect('product/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                            Failed added new data.
                          </div>');
                redirect('product/index');
            }
        }
    }

    public function delete()
    {
        $delete = $this->product->delete($this->input->post('id'));
        echo json_encode($delete);
    }

    public function show($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural');
        $this->form_validation->set_rules('purchase', 'Purchase Price', 'required|is_natural');
        $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');
        $this->form_validation->set_rules('discount', 'Discount', 'is_natural');

        // set message for validation
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('is_natural', '{field} must be numbers');
        $this->form_validation->set_message('min_length', '{field} at least 3 characters');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} cannot be anything other than numbers, letters and spaces');

        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['product'] = $this->product->getWhere($id)->row();
            $this->template->load('template/template', 'product/show', $data);
        } else {
            $post = $this->input->post();
            $update = $this->product->update($post, $id);
            if ($update > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            successfully updated data.
                          </div>');
                redirect('product/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                            Failed Updated data.
                          </div>');
                redirect('product/index');
            }
        }
    }
}
