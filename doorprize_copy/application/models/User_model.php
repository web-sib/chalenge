<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('user');
    }
    public function getWhere($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user');
    }
    public function getLogin($email,$password)
    {
    	$this->db->where('email',$email);
    	$this->db->where('password',$password);
    	$query = $this->db->get('user');
    	return $query;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
    public function create($post)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'address' => $post['address']
        ];
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    public function update($post,$id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'name' => $post['name'],
            'email' => $post['email'],
            'password' => $post['password'],
            'address' => $post['address']
        ];
        $this->db->where('id',$id);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }
}

