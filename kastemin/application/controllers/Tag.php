<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller{
  public function __construct()
  {
  parent::__construct();

  $this->load->model('model');

  $this->sess = $this->session->userdata();

  $this->dari = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  }

  public function Klub()
  {
  if(empty($this->uri->segment(3)))
  {
    show_404();
  }

  else
  {
    $klub = str_replace('-',' ', $this->uri->segment(3));

    $jumlah = $this->model->jmlklub($klub);

    $config = array(
      'base_url' => base_url().'Tag/Klub/',

      'total_rows' => $jumlah,

      'per_page' => 6,
    );

    $this->pagination->initialize($config);

    $data['result'] =  $this->model->filterklub($klub, $config['per_page'], $this->dari);

    $data['klub'] = $this->model->klub();

    $data['liga'] = $this->model->liga();

      if(empty($this->sess['email']))
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

      }

      $this->load->view('klub', $data);
      }
  }

  public function Liga()
  {
  if(empty($this->uri->segment(3)))
  {
      show_404();
  }
  else
  {
    $liga = str_replace('-',' ', $this->uri->segment(3));

    $data['result'] =  $this->model->filterliga($liga);

    $data['klub'] = $this->model->klub();

    $data['liga'] = $this->model->liga();

    if(empty($this->sess['email']))
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
    }

    $this->load->view('liga', $data);
    }
  }

}
