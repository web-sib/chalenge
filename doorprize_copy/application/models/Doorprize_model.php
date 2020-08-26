<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doorprize_model extends CI_Model
{
    public function get()
    {
        $this->db->select('*');
        $this->db->from('doorprize_data');
        return $this->db->get();
    }
    public function getGrand()
    {
        $query = $this->db->query("SELECT *, MAX(point) as max_point FROM doorprize_data");
        return $query;
    }
    public function create($post)
    {
        $data = [
            'name' => $post['name'],
            'point' => $post['point'],
            'is_active' => 1
        ];
        $this->db->insert('doorprize_data', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('doorprize_data');
        return $this->db->affected_rows();
    }
    public function getWhere($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('doorprize_data');
    }
    public function update($post, $id)
    {
        $data = [
            'name' => $post['name'],
            'point' => $post['point'],
            'is_active' => 1
        ];
        $this->db->where('id', $id);
        $this->db->update('doorprize_data', $data);
        return $this->db->affected_rows();
    }
    public function getRows()
    {
        $rows = $this->db->get('doorprize_data');
        return $rows->num_rows();
    }
    // public function getPaginate($limit,$start)
    // {
    //     return $this->db->get('doorprize_data',$limit,$start);
    // }
}
