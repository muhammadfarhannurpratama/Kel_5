<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{
	public function __construct(){
		parent::__construct();

	$this->dari = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		/*ketika uri->segment(3) ada, maka $this->dari akan mengambil nilai uri->segment(3)
		ketika kosong, $this->dari akan mengambil nilai 0
		*/

	$this->load->model('model');

	$this->sess = $this->session->userdata();

	}

	public function Jersey()
	{

	$cari = $this->input->post('cari');

	if(!preg_match("/^[a-zA-Z]*$/", $cari))
	{
		$data['cari'] = "eror";
  }

	else
	{

		$data['cari'] = $this->model->search($cari);
	}

	if(empty($this->sess['status']))
	{
			$data['sessionstatus'] = "";

			$data['sessionemail'] = "";

			$data['sessionnama'] = "";

		}
		else
		{
			$data['sessionemail'] = $this->sess['email'];

			$data['sessionstatus'] = $this->sess['status'];

			$data['sessionnama'] = $this->sess['namadpn'];

		}

			$data['klub'] = $this->model->klub();

			$data['liga'] = $this->model->liga();

			$this->load->view('search', $data);

	}
}
