<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Officer_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('officer');
    }
    public function getWhere($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('officer');
    }
}
