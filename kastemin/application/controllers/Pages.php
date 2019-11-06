<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model');

		$this->sess = $this->session->userdata();

        $this->key = $this->uri->segment(2);

        $this->dari = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        /*ketika uri->segment(3) ada, maka $this->dari akan mengambil nilai uri->segment(3)
        ketika kosong, $this->dari akan mengambil nilai 0
        */
        $this->klub = $this->model->klub();

        $this->liga = $this->model->liga();
    }
	public function Carapemesanan(){
			if(empty($this->sess['email']))
            {
				$data['sessionemail'] = "";

                $data['sessionnama'] = "";

                $data['sessionstatus'] = "";
				}
					else
                    {
						$data['sessionnama'] = $this->sess['namadpn'];

                        $data['sessionemail'] = $this->sess['email'];

                        $data['sessionstatus'] = $this->sess['status'];
				}

		$data['tentang'] = $this->key;

		$this->load->view('tentang', $data);
	}
	public function Aturanpemesanan()
    {
		if(empty($this->sess['email'])){
			$data['sessionemail'] = "";

            $data['sessionstatus'] = "";

            $data['sessionnama'] = "";

		}
		else{
			$data['sessionemail'] = $this->sess['email'];

            $data['sessionstatus'] = $this->sess['status'];

            $data['sessionnama'] = $this->sess['namadpn'];

		}

		$data['tentang'] = $this->key;

		$this->load->view('tentang', $data);
	}
	public function Metodepembayaran()
    {
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


        $data['tentang'] = $this->key;

        $this->load->view('tentang', $data);

	}
    public function Designsendiri()
    {
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

        // if ($data <= 0 ) {
        //     redirect(base_url()."Pages/Designsendiri?msg=error");
        // }

        $this->load->view('design', $data);
    }
	public function Kaos()
    {
		$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

		$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$jumlah = $this->model->jmltipepanjang();
        $config = array(
            'base_url' => base_url()."Pages/Ajax_paging_panjang",

            'total_rows' => $jumlah,

            'per_page' => 6,
        );

        $this->pagination->initialize($config);

        $data = array(
            'liga' => $this->liga,

            'klub' => $this->klub,

            'list' => $this->key,

            'panjang' => $this->model->tipepanjang($config['per_page'], $this->dari),
		);

			if(empty($this->sess['email'])){
                $data['sessionemail'] = "";

                $data['sessionstatus'] = "";

                $data['sessionnama'] = "";

		}
		else{
                $data['sessionemail'] = $this->sess['email'];

                $data['sessionstatus'] = $this->sess['status'];

                $data['sessionnama'] = $this->sess['namadpn'];

		}
       $this->load->view('list-jersey', $data);
	}
	public function Ajax_paging_panjang()
	{

		$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

		$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$jumlah = $this->model->jmltipepanjang();
        $config = array(
            'base_url' => base_url()."Pages/Ajax_paging_panjang",

            'total_rows' => $jumlah,

            'per_page' => 6,
        );

        $this->pagination->initialize($config);

        $data = array(
            'liga' => $this->liga,

            'klub' => $this->klub,

            'list' => $this->key,

            'filter' => $this->model->tipepanjang($config['per_page'], $this->dari),
		);

			if(empty($this->sess['email'])){
                $data['sessionemail'] = "";

                $data['sessionstatus'] = "";

                $data['sessionnama'] = "";

		}
		else{
                $data['sessionemail'] = $this->sess['email'];

                $data['sessionstatus'] = $this->sess['status'];

                $data['sessionnama'] = $this->sess['namadpn'];

		}
       $this->load->view('filter-list', $data);
	}

	public function Jerseypendek()
    {
				$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

				$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $jumlah = $this->model->jmltipependek();

        $config = array(
            'base_url' => base_url()."/Pages/Ajax_paging_pendek?tipe=".$this->key,

            'total_rows' => $jumlah,

            'per_page' => 6,
            );

        $this->pagination->initialize($config);

        $data = array(
            'liga' => $this->liga,

            'klub' => $this->klub,

            'list' => $this->key,

            'pendek' => $this->model->tipependek($config['per_page'], $this->dari),
            );

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

		$this->load->view('list-jersey', $data);
	}

	public function Ajax_paging_pendek()
	{
		$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

		$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$jumlah = $this->model->jmltipependek();

		$config = array(
				'base_url' => base_url()."/Pages/Ajax_paging_pendek?tipe=".$this->key,

				'total_rows' => $jumlah,

				'per_page' => 6,
				);

		$this->pagination->initialize($config);

		$data = array(
				'liga' => $this->liga,

				'klub' => $this->klub,

				'list' => $this->key,

				'filter' => $this->model->tipependek($config['per_page'], $this->dari),
				);

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

$this->load->view('filter-list', $data);

	}

	public function Semuatipe()
    {
			$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

			$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$jumlah = $this->model->jmlsemuatipe();

        $config = array(
            'base_url' => base_url()."/Pages/Ajax_paging_all?tipe=".$this->key,

            'total_rows' => $jumlah,

            'per_page' => 6,
        );

        $this->pagination->initialize($config);

        $data = array(
            'liga' => $this->liga,

            'klub' => $this->klub,

            'list' => $this->key,

            'semua' => $this->model->semuatipe($config['per_page'], $this->dari),
		);

			if(empty($this->sess['email'])){
			$data['sessionemail'] = "";

            $data['sessionstatus'] = "";

            $data['sessionnama'] = "";

		}
		else{
			$data['sessionemail'] = $this->sess['email'];

            $data['sessionstatus'] = $this->sess['status'];

            $data['sessionnama'] = $this->sess['namadpn'];

		}

		$this->load->view('list-jersey', $data);
	}
	public function Ajax_paging_all()
	{
		$this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

		$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

	$jumlah = $this->model->jmlsemuatipe();

			$config = array(
					'base_url' => base_url()."/Pages/Ajax_paging_all?tipe=".$this->key,

					'total_rows' => $jumlah,

					'per_page' => 6,
			);

			$this->pagination->initialize($config);

			$data = array(
					'liga' => $this->liga,

					'klub' => $this->klub,

					'list' => $this->key,

					'filter' => $this->model->semuatipe($config['per_page'], $this->dari),
	);

		if(empty($this->sess['email'])){
		$data['sessionemail'] = "";

					$data['sessionstatus'] = "";

					$data['sessionnama'] = "";

	}
	else{
		$data['sessionemail'] = $this->sess['email'];

					$data['sessionstatus'] = $this->sess['status'];

					$data['sessionnama'] = $this->sess['namadpn'];

	}

	$this->load->view('filter-list', $data);
	}


    public function Suka(){
        if(empty($this->sess['email'])){
            $data['session'] = "";
        }
        else{
            $data['session'] = $this->sess['email'];

            $data['suka'] = $this->model->suka($this->uri->segment(3), $data['session']);

            if($this->input->get('method')=='ajax'){
                $data['span'] = '<span class="glyphicon glyphicon-thumbs-down"></span> Batalsuka';

                $data['jmllike'] = $this->model->jmlsuka($this->uri->segment(3));

                echo json_encode($data);
            }

    }
    }
    public function Batalsuka(){
    if(empty($this->sess['email'])){
            $data['session'] = "";
    }
        else{
            $data['session'] = $this->sess['email'];

            $data['batalsuka'] = $this->model->batalsuka($this->uri->segment(3), $data['session']);

            if($this->input->get('method')=='ajax'){
                $data['span'] = '<span class="glyphicon glyphicon-thumbs-up"></span> Suka';

                $data['jmllike'] = $this->model->jmlsuka($this->uri->segment(3));

                echo json_encode($data);
            }
        }
    }

    public function Komentar()
		{
        	$user['datauser'] = $this->model->_datauser($this->sess['email']);

					$komentarValue = array(
							'url_barang' => $this->input->post('url_barang'),

							'nama' => $user['datauser'][0]->namadpn." ".$user['datauser'][0]->namablkng,

							'foto' => $user['datauser'][0]->foto,

							'komen' => $this->input->post('komentar'),

							'waktu' => date("Y-m-d H:i:s"),

							'status' => 'pending',
					);

					$data['komentar'] = $this->model->tambahkomen($komentarValue);

					echo json_encode($data);
    }
    public function Filterlist()
        {
					$selected = !empty($this->input->post('filter')) ? $this->input->post('filter') : $this->input->get('filter');
					$this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
					  if(empty($selected))
            {
                $data['filter'] = "";
            }
            else
            {
							if(empty($this->sess['email']))
							{
									$data['sessionemail'] = "";
							}
							else
							{
								$data['sessionemail'] = $this->sess['email'];
							}

								$jumlah = $this->model->jmlsemuatipe();

                $config = array(
                    'base_url' => base_url()."/Pages/Filterlist?filter=".$this->input->post('filter'),

                    'total_rows' => $jumlah,

                    'per_page' => 6,
                );

                $this->pagination->initialize($config);

          			if($selected=="new")
                {
                    $data['filter'] = $this->model->filterternew($config['per_page'], $this->dari);
                }
                else
                {
                    if($selected=="bestview")
                    {
                        $data['filter'] = $this->model->filterbestview($config['per_page'], $this->dari);
                    }
                    else
                    {
                        $data['filter'] = $this->model->filterbestseller($config['per_page'], $this->dari);
                    }
                }
            }
            $this->load->view('filter-list', $data);

            json_encode($data);

        }
}
