<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('transaction');
        return $this->db->get();
    }
    public function create($get)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Ymd');
        $data = [
            'invoice' => $get['invoice'],
            'total_product' => $get['total_product'],
            'total_pay' => preg_replace("/[^a-zA-Z0-9]/", "", $get['total']),
            'user_id' => $get['customer_id'],
            'officer_id' => $get['officer_id'],
            'money' => $get['money'],
            'remaining_money' => preg_replace("/[^a-zA-Z0-9]/", "", $get['remaining']),
            'created_at' => $date
        ];
        if (preg_replace("/[^a-zA-Z0-9]/", "", $get['total']) > 200000) {
            $point = 5;
        } elseif (preg_replace("/[^a-zA-Z0-9]/", "", $get['total']) > 100000) {
            $point = 2;
        }
        $this->db->where('user_id', $get['customer_id']);
        $my_point = $this->db->get('my_point');
        if ($my_point->num_rows() > 0) {
            $getPoint = $my_point->row();
            $newPoint = $getPoint->point + $point;
            $this->db->where('user_id', $get['customer_id']);
            $this->db->update('my_point', ['point' => $newPoint]);
        } else {
            $this->db->insert('my_point', ['user_id' => $get['customer_id'], 'point' => $point]);
        }
        $this->db->insert('transaction', $data);
        return $this->db->affected_rows();
    }
    public function getInvoice()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('ymd');
        $sql = "SELECT MAX(MID(invoice, 11,4)) AS invoice_no FROM transaction WHERE MID(invoice,5,6) = $date";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = ((int) $row->invoice_no) + 1;
            $val = sprintf("%'.04d", $value);
        } else {
            $val = "0001";
        }
        return "Door" . date('ymd') . $val;
    }
    public function getJoin()
    {
        $this->db->select('transaction.*,user.name as userName, officer.name as officerName');
        $this->db->from('transaction');
        $this->db->join('user', 'user.id = transaction.user_id');
        $this->db->join('officer', 'officer.id = transaction.officer_id');
        return $this->db->get();
    }
    public function getWhere($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('transaction');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaction');
        return $this->db->affected_rows();
    }
    public function update($post, $id)
    {
        $data = [
            'total_product' => $post['qty'],
            'total_pay' => $post['total_pay'],
            'user_id' => $post['name'],
            'officer_id' => $post['officer'] == null ? 0 : $post['officer'],
            'remaining_money' => $post['remaining']
        ];
        $this->db->where('id', $id);
        $this->db->update('transaction', $data);
        return $this->db->affected_rows();
    }
    public function getWhereUser($user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->get('transaction');
    }
}
