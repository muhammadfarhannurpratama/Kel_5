<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Detail extends CI_Controller{
        public function __construct(){
            parent::__construct();
                $this->load->model('model');

                $this->url = $this->uri->segment(3);

                $this->urltrue = $this->model->detailproduk($this->url);

                $this->sess = $this->session->userdata();
        }

        public function Jersey(){
            if(empty($this->url))
            {

            }
            else
            {
                    if(count($this->urltrue)==0)
                    {
                        show_404();
                    }

                else
                {
                      $data['detail'] = $this->urltrue;

                      $data['tambahview'] = $this->model->tambahview($data['detail'][0]->id, $data['detail'][0]->view);

                      if($data['detail'][0]->jumlah==0)
                      {
                        $data['ket'] = "habis.PNG";
                      }

                      else
                      {
                        $data['ket'] = "ada.PNG";
                      }

                      if(empty($this->sess['status']))
                      {
                        $data['sesssionstatus'] = "";

                        $data['sessionemail'] = "";

                        $data['sessionnama'] = "";
                      }

                      else
                      {
                        $data['sessionstatus'] = $this->sess['status'];

                        $data['sessionemail'] = $this->sess['email'];

                        $data['sessionnama'] = $this->sess['namadpn'];

                        $data['userdata'] = $this->model->_datauser($data['sessionemail']);
                      }

                      $data['komen'] = $this->model->listkomen($data['detail'][0]->url);

                      $data['komenrow'] = $this->model->komenrow();

                      $this->load->view('detail', $data);
                }

           }

        }

        public function Cekqty()
        {
          $data['qty'] = $this->model->detailproduk($this->input->post('url_barang'));

          $this->load->view('loop-qty', $data);

          json_encode($data);
        }
    }
