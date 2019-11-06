<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Myjersey extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('model');

		$this->sess = $this->session->userdata();

	}

	public function index(){
		$data = array(
            'seller' => $this->model->bestseller(),

            'baru' => $this->model->terbaru(),

            'view' => $this->model->bestview(),

						'kritik_saran' => $this->model->get_kritik_saran(),

						'startup' => $this->model->startup(),
        );
		if(!empty($this->sess['email']))
        {

						$data['sessionemail'] = $this->sess['email'];

            $data['sessionstatus'] = $this->sess['status'];

            $data['sessionnama'] = $this->sess['namadpn'];

					}
		else
        {
						$data['sessionnama'] = "";

            $data['sessionemail'] = "";

            $data['sessionstatus'] = "";
		}

	    $this->load->view('home', $data);
	}

	public function Kritik_Saran()
	{
		if(empty($this->sess['email']))
		{
			$data['msg'] = "*Login Untuk Memberikan Kritik Dan Saran";
		}
		else
		{
			if(empty($this->input->post('kritik_saran')))
			{
				$data['msg'] = "*Berikan Kami Kritik Dan Saran";
			}
			else
			{
				$data['user'] = $this->model->_datauser($this->sess['email']);

				$insert = array(
					'nama' => $data['user'][0]->namadpn." ".$data['user'][0]->namablkng,

					'foto' => $data['user'][0]->foto,

					'content' => $this->input->post('kritik_saran'),

					'status' => 'pending',
				);

				$data['kirim'] = $this->model->kritik_saran($insert);

				$data['msg'] = "*Terimakasih Atas Kritik Dan Saran Anda";
			}
		}

		header("content-type:json/application");

		echo json_encode($data);
	}
}
