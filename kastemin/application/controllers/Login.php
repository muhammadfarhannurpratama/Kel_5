<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model');

		$this->load->driver('session');

		$this->sess = $this->session->userdata();
	}

	public function login()
	{
		$data['cek'] = $this->model->ceklogin(array('email' => $this->input->post('email'), 'pass' => $this->input->post('pass')));

		$data['status'] = $this->model->_datauser($this->input->post('email'));

		if(empty($data['cek'][0]))
		{
			$dataa = array(
				'email' => $this->input->post('email'),

				'pass' => $this->input->post('pass'),

				'notif' => 'Pastikan Userame Dan Password Sudah Benar',
				);

			$this->load->view('form-login', $dataa);

		}
		else
		{
			if($data['status'][0]->status=='aktif')
			{
				$sess = array(
					'email' => $this->input->post('email'),

					'namadpn' => $data['cek'][0]->namadpn,

						'status' => $data['cek'][0]->status,
				);

			$this->session->set_userdata($sess);

			redirect(base_url());

			}
			else
			{
				$dataa = array(
					'email' => $this->input->post('email'),

					'pass' => $this->input->post('pass'),

					'notif' => 'Maaf, Akun Anda Telah Kami Non Aktifkan',
					);

				$this->load->view('form-login', $dataa);

			}
		}
	}
	public function logout()
	{
		session_destroy();

		redirect(base_url());
	}

}
