<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Doorprize_model extends CI_Model
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
        $request = $this->client->request('GET', 'doorprize', [
            'query' => [
                'D-KEY' => 'KEYSIB001'
            ]
        ]);
        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getGrand()
    {
        $request = $this->client->request('GET', 'doorprize/grand', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'grand' => 'yes'
            ]
        ]);
        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getRows()
    {
        $request = $this->client->request('GET', 'doorprize/gtrows', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'rows' => 'yes'
            ]
        ]);
        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
    // public function getPaginate()
    // {
    //     $request = $this->client->request('GET', 'doorprize/paginateData', [
    //         'query' => [
    //             'D-KEY' => 'KEYSIB001',
    //             'pagination' => 'yes',
    //             'limit' => 8,
    //             'start' => 1,
    //             'url' => 'http://localhost/doorprize_client/home/index'
    //         ]
    //     ]);

    //     $result = json_decode($request->getBody()->getContents(), true);

    //     return $result['data'];
    // }
}
