<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Transaction_model extends CI_Model
{
    private $client;
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client([
            'base_uri' => 'http://localhost/doorprize_copy/api/'
        ]);
    }
    public function getWhere($user_id)
    {
        $request = $this->client->request('GET', 'transaction', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'user_id' => $user_id
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
}
