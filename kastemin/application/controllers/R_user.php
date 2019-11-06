<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class R_user extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $kontak=$this->db->get('user')->result();
        $this->response(array("result"=>$kontak, 200));
    }

    function index_post() {

        $data = array(
                    'id'                => $this->post('id'),
                    'email'             => $this->post('email'),
                    'namadpn'           => $this->post('namadpn'),
                    'namablkng'         => $this->post('namablkng'),
                    'pass'              => $this->post('pass'),
                    'jk'                => $this->post('jk'),
                    'no_hp'             => $this->post('no_hp'),
                    'province'          => $this->post('province'),
                    'city'              => $this->post('city'),
                    'kode_pos'          => $this->post('kode_pos'),
                    'alamat'            => $this->post('alamat'),
                    'foto'              => $this->post('foto'),
                    'status'            => $this->post('status'));

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    

    //Masukan function selanjutnya disini
    }
    function put_user() {
        $id = $this->put('id');
        $data = array(
                    'id'                => $this->put('id'),
                    'email'             => $this->put('email'),
                    'namadpn'           => $this->put('namadpn'),
                    'namablkng'         => $this->put('namablkng'),
                    'pass'              => $this->put('pass'),
                    'jk'                => $this->put('jk'),
                    'no_hp'             => $this->put('no_hp'),
                    'province'          => $this->put('province'),
                    'city'              => $this->put('city'),
                    'kode_pos'          => $this->put('kode_pos'),
                    'alamat'            => $this->put('alamat'),
                    'foto'              => $this->put('foto'),
                    'status'            => $this->put('status'));
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}




?>