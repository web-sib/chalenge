<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function login($post)
    {
        $this->db->where(['username' => $post['username'], 'password' => $post['password']]);
        return $this->db->get('officer');
    }
}
