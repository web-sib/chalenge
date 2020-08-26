<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('Transaction_model', 'transaction');
        $this->load->model('User_model', 'user');
        $this->load->model('Product_model', 'product');
        $this->load->model('Officer_model', 'officer');
    }
    public function create()
    {
        $data['customers'] = $this->user->get()->result();
        $data['products'] = $this->product->get()->result();
        $data['invoice'] = $this->transaction->getInvoice();
        $this->template->load('template/template', 'transaction/create', $data);
    }
    public function contents()
    {
        $get = $this->input->get();

        $query = $this->product->getWhere($get['id'])->row();
        echo json_encode($query);
    }
    public function store()
    {
        $get = $this->input->get();

        $create = $this->transaction->create($get);
        echo json_encode($create);
    }
    public function minStock()
    {
        $where = [];
        $post = $this->input->get();
        $items_id = count($post['id']);
        for ($i = 0; $i < $items_id; $i++) {
            $id_where = (int) $post['id'][$i];
            $query = $this->db->query("SELECT stock FROM product WHERE id = $id_where")->row();
            $stock = $query->stock;
            $qty = (int) $post['qty'][$i];
            $this->db->query("UPDATE product SET stock = $stock - $qty WHERE id = $id_where");
            array_push($where,);
        }
        echo json_encode($where);
    }
    public function history()
    {
        $data['results'] = $this->transaction->getJoin()->result();
        $this->template->load('template/template', 'transaction/history', $data);
    }
    public function show($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('officer', 'Officer', 'required|is_natural');
        $this->form_validation->set_rules('qty', 'Total product', 'required|is_natural');
        $this->form_validation->set_rules('total_pay', 'Total pay', 'required|is_natural');
        $this->form_validation->set_rules('remaining', 'Remaining', 'is_natural');

        // set message for validation
        $this->form_validation->set_message('required', '{field} must be filled');
        $this->form_validation->set_message('is_natural', '{field} must be numbers');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} cannot be anything other than numbers, letters and spaces');

        // set delimiters
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        if ($this->form_validation->run() == false) {
            $data['officers'] = $this->officer->get()->result();
            $data['users'] = $this->user->get()->result();
            $data['transaction'] = $this->transaction->getWhere($id)->row();
            $this->template->load('template/template', 'transaction/show', $data);
        } else {
            $post = $this->input->post();
            $update = $this->transaction->update($post, $id);
            if ($update > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            successfully updated data.
                          </div>');
                redirect('transaction/history');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Failed!</h5>
                            Failed Updated data.
                          </div>');
                redirect('transaction/history');
            }
        }
    }
    public function delete()
    {
        $delete = $this->transaction->delete($this->input->post('id'));
        echo json_encode($delete);
    }
}
