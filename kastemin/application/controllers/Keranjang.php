<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Keranjang extends CI_Controller{
        public function __construct(){
            parent::__construct();
                $this->load->model('model');


                $this->sess = $this->session->userdata();
        }

        public function index(){
            if (empty($this->sess['email']))
            {
                $data['sessionemail'] = "";

                $data['sessionstatus'] = "";

                $data['sessionnama'] = "";
            }
                else
                {
                    $data['sessionemail'] = $this->sess['email'];

                    $data['sessionstatus'] = $this->sess['status'];

                    $data['sessionnama'] = $this->sess['namadpn'];

                    $data['cart'] = $this->model->select_cart($data['sessionemail']);

                    $data['row'] = $this->model->row_cart($data['sessionemail']);

                    $data['harga_total'] = $this->model->total_harga_cart($data['sessionemail']);

                    $data['user_city'] = $this->model->_datauser($this->sess['email']);

                    $data['ongkir'] = $this->model->ongkir($data['user_city'][0]->city);
                }

            $this->load->view('keranjang', $data);
        }
        public function Save_design()
        {   

          $this->load->helper('string');       

          if (empty($this->sess['email'])) {
            echo "Login Gan";
          }else{

            if ($_POST['jenis_kain'] == "Bagus") {
              $harga = "70000";
              $berat = "0.2"*$_POST['jumlah'];
            }else if ($_POST['jenis_kain'] == "Biasa") {
              $harga = "150000";
              $berat = "0.2"*$_POST['jumlah'];
            }else{
              $harga = "150000";
              $berat = "0.2"*$_POST['jumlah'];
            }          
            
            $tmp_name = $_FILES['foto']['tmp_name'];
            $nama = $_FILES['foto']['name'];

            move_uploaded_file($tmp_name, FCPATH."foto/".$nama);

            $total = $harga * $_POST['jumlah'];

            $data = $this->db->query("INSERT INTO cart SET berat='$berat', email='$_SESSION[email]', jenis_kain='$_POST[jenis_kain]', jumlah='$_POST[jumlah]', ukuran='$_POST[ukuran]', foto='$nama', catatan='$_POST[catatan]', harga='$total'");
          }

          redirect(base_url()."keranjang");
          
        }

        public function Save_Cart()
        {
          $data['barang'] = $this->model->detailproduk($this->input->post('url'));

            if (empty($this->sess['email']))
            {
                redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=error");
            }

            else
            {
              if (empty($this->input->post('ukuran')))
              {
                redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=emptyqty");
              }
              else
              {
                $ukuran = $this->input->post('ukuran');

                $kuantitas = $this->input->post('kuantitas');

                $url = $this->input->post('url');

                if($ukuran=='m')
                {
                  if($kuantitas>$data['barang'][0]->m)
                  {
                    redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=errorqty");
                  }
                  else
                  {
                    $data['update'] = $this->model->update_m($url, $kuantitas, $ket="kurang");
                  }

                }
                else
                {
                  if($ukuran=='l')
                  {
                        if($kuantitas>$data['barang'][0]->l)
                        {
                            redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=errorqty");
                        }
                        
                        else
                        {
                            $data['update'] = $this->model->update_l($url, $kuantitas, $ket="kurang");
                        }
                  }
                  else
                  {
                    if($ukuran=='xl')
                    {
                      if($kuantitas>$data['barang'][0]->xl)
                      {
                        redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=errorqty");
                      }
                        
                      else
                      {
                          $data['update'] = $this->model->update_xl($url, $kuantitas, $ket="kurang");
                      }
                    }
                    else
                    {
                        if($ukuran=='xxl')
                        {
                            if($kuantitas>$data['barang'][0]->xxl)
                            {
                                redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=errorqty");
                            }
                            
                            else
                            {
                            $data['update'] = $this->model->update_xxl($url, $kuantitas, $ket="kurang");
                            }
                        }
                        else
                        {
                                redirect(base_url()."Detail/Jersey/".$data['barang'][0]->url."?msg=errorukuran");
                        }
                    }
                  }
                }

                $tanggal = date("Y-m-d");

            $data['cek-produk-di-cart'] = $this->model->cek_cart_produk($url, $this->sess['email'], $ukuran, $tanggal);

            $data['berat'] = $this->model->detailproduk($this->input->post('url'));

            if($data['cek-produk-di-cart']==1)
            {
              $harga_total = $data['barang'][0]->harga*$kuantitas;

              $data['act-to-cart'] = $this->model->update_cart($kuantitas, $harga_total, $url, $ukuran, $tanggal);
            }
            else
            {
              $harga_total = $data['barang'][0]->harga*$kuantitas;

              $data['act-to-cart'] = $this->model->insert_cart($this->sess['email'], $url, $data['berat'][0]->berat, $data['barang'][0]->foto, $data['barang'][0]->nama, $ukuran, $kuantitas, $harga_total, $tanggal);
            }
            redirect(base_url().'Keranjang');
              }
            }
        }

        public function Remove()
        {
          if(empty($this->input->get('id')) && empty($this->input->get('url')))
          {
            redirect(base_url().'Keranjang');
          }
          else
          {
            $hidden = array(
                'id' => $this->input->get('id'),

                'url' => $this->input->get('url')
            );

            $data['cart_id'] = $this->model->select_cart_id($hidden['id']);

            if($data['cart_id'][0]->ukuran=='m')
            {
              $data['update_barang'] = $this->model->update_m($hidden['url'], $data['cart_id'][0]->jumlah, $ket="tambah");
            }
            else
            {
              if($data['cart_id'][0]->ukuran=='l')
              {
                $data['update_barang'] = $this->model->update_l($hidden['url'], $data['cart_id'][0]->jumlah, $ket="tambah");
              }
              else
              {
                if($data['cart_id'][0]->ukuran=='xl')
                {
                  $data['update_barang'] = $this->model->update_xl($hidden['url'], $data['cart_id'][0]->jumlah, $ket="tambah");
                }
                else
                {
                  $data['update_barang'] = $this->model->update_xxl($hidden['url'], $data['cart_id'][0]->jumlah, $ket="tambah");
                }
              }
            }
            $data['remove_cart'] = $this->model->remove_cart($hidden['id']);

            redirect(base_url().'Keranjang');

        }
      }

      public function Transaksi()
      {
          if(empty($this->input->post('total')))
          {
            redirect(base_url().'Keranjang');
          }
          else
          {
            $total = $this->input->post('total');

            $this->load->helper('string');

            $data['kode'] = random_string('numeric', 8);

            $insert = array(
              'email' => $this->sess['email'],

              'total' => $total,

              'kode' => $data['kode'],

              'status' => 'pending',

            );
            $data['cart'] = $this->model->select_cart($insert['email']);

            foreach($data['cart'] as $a)
            {
                $data['seller'] = $this->model->update_seller($a->url_barang);
            }

            $data['transaksi'] = $this->model->insert_transaksi($insert);

            $data['remove-from-cart'] = $this->model->remove_cartOK($insert['email']);

            redirect(base_url().'Keranjang?kode='.$data['kode']);
            }
      }

    }
