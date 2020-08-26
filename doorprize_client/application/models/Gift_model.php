<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Gift_model extends CI_Model
{
    private $client;
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client([
            'base_uri' => 'http://localhost/doorprize_copy/api/'
        ]);
    }
    public function insert($doorprize_id, $user_id)
    {
        // cek user point
        $requestCek = $this->client->request('GET', 'point', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'user_id' => $user_id
            ]
        ]);
        $resultCek = json_decode($requestCek->getBody()->getContents(), true);
        $point = $resultCek['data'][0];
        // cek doorprize point
        $requestCek2 = $this->client->request('GET', 'doorprize', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'id' => $doorprize_id
            ]
        ]);
        $resultCek2 = json_decode($requestCek2->getBody()->getContents(), true);
        $doorprizePoint = $resultCek2['data'];
        if ($point['point'] < $doorprizePoint['point']) {
            return false;
        } else {
            // insert doorprize ke my_gift
            $data = [
                'D-KEY' => 'KEYSIB001',
                'user_id' => $user_id,
                'doorprize_id' => $doorprize_id,
                'address' => null,
                'is_active' => 1
            ];
            $request = $this->client->request('POST', 'gift', [
                'form_params' => $data
            ]);

            $result = json_decode($request->getBody()->getContents(), true);
            if ($result['status'] === true) {
                $value = $point['point'] - $doorprizePoint['point'];
                $data = [
                    'D-KEY' => 'KEYSIB001',
                    'user_id' => $user_id,
                    'point' => $value
                ];
                $requestPut = $this->client->request('PUT', 'point', [
                    'form_params' => $data
                ]);
                $resultPut = json_decode($requestPut->getBody()->getContents(), true);
                return $resultPut['status'];
            }
        }
    }

    public function getWhere($user_id)
    {
        $request = $this->client->request('GET', 'gift', [
            'query' => [
                'D-KEY' => 'KEYSIB001',
                'user_id' => $user_id
            ]
        ]);

        $result = json_decode($request->getBody()->getContents(), true);
        return $result['data'];
    }
}
