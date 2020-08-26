<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class User_model extends CI_Model
{
    private $client;
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client([
            'base_uri' => 'http://localhost/doorprize_copy/api/'
        ]);
    }
    public function getWhere($post)
    {
        $request = $this->client->request('GET', 'user/login', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'email' => $post['email'],
                'password' => $post['password']
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getWhereId($id)
    {
        $request = $this->client->request('GET', 'user', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'id' => $id,
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
}
