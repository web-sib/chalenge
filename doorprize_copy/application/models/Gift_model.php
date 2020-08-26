<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gift_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('my_gift');
    }
    public function getJoin()
    {
        $this->db->select('my_gift.*,user.name as name, doorprize_data.name as doorprize');
        $this->db->from('my_gift');
        $this->db->join('user', 'user.id = my_gift.user_id');
        $this->db->join('doorprize_data', 'doorprize_data.id = my_gift.doorprize_id');
        return $this->db->get();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('my_gift');
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert('my_gift',$data);
        return $this->db->affected_rows();
    }
    public function getWhere($id)
    {
        $this->db->select('my_gift.*,doorprize_data.name as doorprize_name ,doorprize_data.point as point,user.name as user_name');
        $this->db->from('my_gift');
        $this->db->join('doorprize_data','doorprize_data.id = my_gift.doorprize_id');
        $this->db->join('user','user.id = my_gift.user_id');
        $this->db->where('user_id',$id);
        return $this->db->get();
    }
}
