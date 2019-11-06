<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Transaksi extends CI_Controller{
      public function __construct()
      {
        parent::__construct();

        $this->sess = $this->session->userdata();

        $this->load->model('model');
      }

      public function index()
      {
        if(empty($this->sess['email']))
        {
          redirect(base_url());
        }

        else
        {
          if(empty($this->input->post('kode_transaksi')))
          {
            redirect(base_url().'Keranjang');
          }
          else
          {
            $data['sessionnama'] = $this->sess['namadpn'];

            $data['sessionstatus'] = $this->sess['status'];

            $data['sessionemail'] = $this->sess['email'];

            
            
            $kode = $this->input->post('kode_transaksi');

            $data['transaksi'] = $this->model->cek_kode_transaksi($kode, $this->sess['email'], $key="result");

            $data['row'] = $this->model->cek_kode_transaksi($kode, $this->sess['email'], $key="row");

            $this->load->view('cek-kode-transaksi', $data);
          }
      }

      }
  }
