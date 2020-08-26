<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Point_model extends CI_Model
{
    private $client;
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client([
            'base_uri' => 'http://localhost/doorprize_copy/api/'
        ]);
    }
    public function get()
    {
        $request = $this->client->request('GET', 'point', [
            'query' => [
                'D-KEY' => 'KEYSIB001'
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getWhere($id)
    {
        $request = $this->client->request('GET', 'point', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'user_id' => $id
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'][0];
    }
}
