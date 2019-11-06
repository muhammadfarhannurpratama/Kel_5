<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    public function __construct(){
    parent::__construct();
        $this->load->model('model');

        $this->sess = $this->session->userdata();
}

    public function index()
    {
      if(empty($this->sess['email']))
      {
          redirect(base_url());
      }
      else
      {
            $data = array(
                'user' => $this->model->_datauser($this->sess['email']),

                'bestview' => $this->model->bestview(),

                'sessionemail' => $this->sess['email'],

                'sessionstatus' => $this->sess['status'],

                'sessionnama' => $this->sess['namadpn'], );

        $this->load->view('profile', $data);
    }
  }

  public function Update()
  {
    if(empty($this->sess['email']))
    {
      redirect(base_url());
    }
    else
    {
      $data = array(
        'sessionnama' => $this->sess['namadpn'],

        'sessionstatus' => $this->sess['status'],

        'sessionemail' => $this->sess['email'],

        'user' => $this->model->_datauser($this->sess['email']),
      );

      $this->load->view('update-profil', $data);
    }
  }

  public function Cek_Update()
  {
    if(empty($this->input->post('method')))
    {
      redirect(base_url());
    }
    else
    {
      $user = array(

        'namadpn' => trim($this->input->post('namadpn')),

  	    'namablkng' => trim($this->input->post('namablkng')),

    		'pass' => trim($this->input->post('pass')),

        'repass' => trim($this->input->post('repass')),

        'no_hp' => trim($this->input->post('no_hp')),

        'kode_pos' => trim($this->input->post('kode_pos')),

        'jk' => $this->input->post('jk'),

        'alamat'=> trim($this->input->post('alamat')),

      );

      if(empty($user['namadpn']))
      {
          $data['error_namadpn'] = "*Nama Depan Harus Diisi";
      }
      else
      {
        if(preg_match("/^[a-zA-Z]*$/", $user['namadpn']))
        {
          $data['error_namadpn'] = "";
        }
        else
        {
          $data['error_namadpn'] = "*Nama Depan Harus Berupa Huruf";
        }
      }

      if(empty($user['namablkng']))
      {
        $data['error_namablkng'] = "*Nama Belakang Harus Diisi";
      }
      else
      {
        if(preg_match("/^[a-zA-Z]*$/", $user['namablkng']))
        {
          $data['error_namablkng'] = "";
        }
        else
        {
          $data['error_namablkng'] = "*Nama Depan Harus Berupa Huruf";
        }
      }

      if(empty($user['pass']))
      {
        $data['error_pass'] = "*Password Harus Diisi";
      }
      else
      {
        if(strlen($user['pass'])<6 || strlen($user['pass'])>30)
        {
          $data['error_pass'] = "*Minimal 6 Karakter Dan Maksimal 30 Karakter";
        }
        else
        {
          $data['error_pass'] = "";
        }
      }

      if($user['pass']!=$user['repass'])
      {
        $data['error_passrepass'] = "*Ketik Ulang Kata Sandi Yang Sesuai";
      }
      else
      {
        $data['error_passrepass'] = "";
      }

      if(empty($user['no_hp']))
      {
        $data['error_nohp'] = "*Nomor Hp Harus Diisi";
      }
      else
      {
        if(is_numeric($user['no_hp']))
        {
          $data['error_nohp'] = "";
        }
        else
        {
          $data['error_nohp'] = "*Nomor Hp Harus Berupa Angka";
        }
      }

      if(empty($user['kode_pos']))
      {
        $data['error_kode_pos'] = "*Kode Pos Harus Diisi";
      }
      else
      {
        $data['error_kode_pos'] = "";
      }

      if(empty($user['alamat']))
      {
          $data['error_alamat'] = "*Alamat Tidak Boleh Kosong";
      }
      else
      {
        $data['error_alamat'] = "";
      }

      if($data['error_namadpn']=="" && $data['error_namablkng']=="" && $data['error_pass']=="" && $data['error_passrepass']=="" && $data['error_nohp']=="" && $data['error_kode_pos']=="" && $data['error_alamat']=="")
      {
        $update = array(
          'namadpn' => $user['namadpn'],

          'namablkng' => $user['namablkng'],

          'pass' => $user['pass'],

          'no_hp' => $user['no_hp'],

          'jk' => $user['jk'],

          'kode_pos' => $user['kode_pos'],

          'alamat' => $user['alamat'],

        );
        $data['update'] = $this->model->update_user($update, $this->sess['email']);
      }
      else
      {
        $data['update'] = "gagal";
      }

      header("content-type:json/application");

      echo json_encode($data);
    }

  }

  public function Update_Profil()
  {
    if(empty($_FILES['foto']))
    {
      redirect(base_url().'Profile');
    }
    else
    {
      $this->load->helper('string');

      $nama = random_string('alnum', 5)."+".$_FILES['foto']['name'];

      move_uploaded_file($_FILES['foto']['tmp_name'], 'profil/'.$nama);

      $data['update'] = $this->model->profil_update($nama, $this->sess['email']);

      echo (isset($data['update'])? 'Berhasil' : 'gagal');

      redirect(base_url()."Profile");

    }
  }
}
