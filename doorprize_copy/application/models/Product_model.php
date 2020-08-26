<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('product');
        return $this->db->get();
    }
    public function create($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'name' => $post['name'],
            'price' => $post['price'],
            'purchase_price' => $post['purchase'],
            'stock' => $post['stock'],
            'discount' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'is_active' => 1
        ];
        $this->db->insert('product', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
        return $this->db->affected_rows();
    }
    public function getWhere($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('product');
    }
    public function update($post, $id)
    {
        $data = [
            'name' => $post['name'],
            'price' => $post['price'],
            'purchase_price' => $post['purchase'],
            'stock' => $post['stock'],
            'discount' => $post['discount'] == null ? 0 : $post['discount'],
        ];
        $this->db->where('id', $id);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
    }
}
