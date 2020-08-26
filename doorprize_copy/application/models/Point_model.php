<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Point_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('my_point');
    }
    public function getWhere($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('my_point');
    }
    public function update($data,$user_id)
    {
    	$this->db->where('user_id',$user_id);
    	$this->db->update('my_point',$data);
    	return $this->db->affected_rows();
    }
}
