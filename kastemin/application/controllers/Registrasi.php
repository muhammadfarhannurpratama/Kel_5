<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('model');

		$this->sess = $this->session->userdata();
    }

	public function index()
	{
      if(!empty($this->sess['email']))
			{
            redirect(base_url());
        }
        else
				{
					$data['province'] = $this->model->masterdata($tb="tb_province", $filter="");

					$this->load->view('daftar', $data);
    		}

    }
		public function kota($provinsi=0){

			 $data = $this->model->hitung_masterdata($provinsi);

			if($data != 0){
				$kotas = $this->model->filter_masterdata($provinsi);
				foreach ($kotas as  $value) {
					echo  "<option value='$value->city'>$value->city</option>";
				}
			}else{
					echo  "<option value='-'>-</option>";
			}

		}
	public function cek()
	{
        $this->load->library('form_validation');

				$this->load->helper('form');

        $input = array(

					'namadpn' => trim($this->input->post('namadpn')),

					'namablkng' => trim($this->input->post('namablkng')),

					'pass' => trim($this->input->post('pass')),

					'repass' => trim($this->input->post('repass')),

					'email' => trim($this->input->post('email')),

					'no_hp' => trim($this->input->post('no_hp')),

					'kode_pos' => trim($this->input->post('kode_pos')),

					'jk' => $this->input->post('jk'),

					'alamat'=> trim($this->input->post('alamat')),
	        );


					$user['cek-email'] = $this->model->user($input['email']);

					if(empty($input['namadpn']))
					{
						$data['error_namadpn'] = "*Nama Depan Tidak Boleh Kosong";
					}

					else
					{
						if(!preg_match("/^[a-zA-Z]*$/", $input['namadpn']))
						{
							$data['error_namadpn'] = "*Gunakan Huruf Untuk Nama Depan";
						}
						else
						{
							$data['error_namadpn'] = "";
					}
				}

					if(empty($input['namablkng']))
					{
						$data['error_namablkng'] = "*Nama Belakang Tidak Boleh Kosong";
					}

					else
					{
						if(!preg_match("/^[a-zA-Z]*$/", $input['namablkng']))
						{
							$data['error_namablkng'] = "*Gunakan Huruf Untuk Nama Belakang";
						}
						else
						{
								$data['error_namablkng'] = "";
						}
					}

					if(empty($input['pass']))
					{
						$data['error_pass'] = "*Password Tidak Boleh Kosong";
					}
					else
					{
						if(strlen($input['pass'])<6 || strlen($input['pass'])>30)
						{
							$data['error_pass'] = "*Minimal 6 Karakter Dan Maksimal 30 Karakter";
						}
						else
						{
							$data['error_pass'] = "";
						}
					}

						if($input['pass']!=$input['repass'])
						{
							$data['error_passrepass'] = "*Ketik Ulang Kata Sandi Yang Sesuai";
						}
						else
						{
							$data['error_passrepass'] = "";
					}

				if(empty($input['email']))
				{
					$data['error_email'] = "*E-mail Tidak Boleh Kosong";
				}
				else
				{
					if(!filter_var($input['email'], FILTER_VALIDATE_EMAIL))
					{
						$data['error_email'] = "*Masukan E-mail Yang Sesuai";
					}
					else
					{
						if($user['cek-email']==1)
						{
							$data['error_email'] = "Maaf E-mail Sudah Terdaftar";
						}
						else
						{
							$data['error_email'] = "";
						}
					}
				}


				if(empty($input['no_hp']))
				{
					$data['error_nohp'] = "*Nomor Hp Tidak Boleh Kosong";
				}
				else
				{

					if (is_numeric($input['no_hp']))
					{
						$data['error_nohp'] = "";
					}

					else
					{
						$data['error_nohp'] = "*Nomor Hp Harus Berupa Angka";
					}

				}

				if(empty($input['kode_pos']))
				{
					$data['error_kode_pos'] = "*Kode Pos Tidak Boleh Kosong";
				}
				else
				{
					$data['error_kode_pos'] = "";

				}

				if(empty($input['alamat']))
				{
					$data['error_alamat'] = "*Alamat Tidak Boleh Kosong";
				}
				else
				{

					$data['error_alamat'] = "";
				}

				if($data['error_namadpn']=="" && $data['error_namablkng']=="" && $data['error_pass']=="" && $data['error_passrepass']=="" && $data['error_email']=="" && $data['error_nohp']=="" && $data['error_kode_pos']=="" && $data['error_alamat']=="")
				{

				$register = array(
					'namadpn' => $input['namadpn'],

					'namablkng' => $input['namablkng'],

					'pass' => $input['pass'],

					'email' => $input['email'],

					'no_hp' => $input['no_hp'],

					'jk' => $input['jk'],

					'kode_pos' => $input['kode_pos'],

					'alamat' => $input['alamat'],

					'foto' => 'default.jpg',

					'status' => 'aktif',

					'province' => $this->input->post('province'),

					'city' => $this->input->post('city'),
				);

				$data['registrasi'] = $this->model->register($register);
			}
			else
			{
				$data['registrasi'] = "gagal";
			}
				header("content-type:json/application");

				echo json_encode($data);

			}

}
