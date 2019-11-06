<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->sess = $this->session->userdata();

    $this->load->model('model');
  }

  public function index()
  {
    $kode = $this->input->get('kode');

    $data['transaksi'] = $this->model->cek_kode_transaksi($kode, $this->sess['email'], $key="result");

    echo "<table border='1'>
    <tr>
      <td>#</td>
      <td>Email</td>
      <td>Total Biaya</td>
      <td>Kode Transaksi</td>
      <td>Status</td>
    </tr>
    <tr>
      <td>1</td>
      <td>".$data['transaksi'][0]->email."</td>
      <td>".$data['transaksi'][0]->total."</td>
      <td>".$data['transaksi'][0]->kode."</td>
      <td>".$data['transaksi'][0]->status."</td>
    </tr>
    </table>
    ";

    header("content-type : application/vnd-ms-excel");
    header("content-disposition : attachment; filename=transaksi.xls");
  }
}
