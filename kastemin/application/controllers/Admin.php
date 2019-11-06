<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends CI_Controller{
        public function __construct(){
            parent::__construct();
                $this->load->model('model');

                $this->sess = $this->session->userdata('backend');

                $this->komentar = $this->model->komen_pending_rows();

                $this->transaksi = $this->model->transaksi_rows();

                $this->dari = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

                $this->kritik_saran = $this->model->kritik_saran_rows();

        }
        public function index(){
            if(empty($this->sess['user'])){
              $this->load->view('admin/login');
            }

            else
            {
                redirect(base_url()."Admin/Dashboard");
            }
      }

        public function Cek()
        {
            $data['cek'] = $this->model->loginadmin(array('username'=>$this->input->post('username'), 'password'=>md5($this->input->post('pass'))));

            if(!empty($data['cek'][0]))
            {
                $session = array(
                'status' => $data['cek'][0]->status,

                'user' => $this->input->post('username')
                );

                $this->session->set_userdata(array( 'backend' => $session));

                redirect(base_url()."Admin/Dashboard");
            }
            else
            {
                redirect(base_url()."Admin?error=1");
            }
        }

        public function Logout(){
                $this->session->unset_userdata('backend');
                    redirect(base_url()."Admin");
        }

        public function Dashboard()
        {
            $data = array(
            'user' => $this->sess['user'],

            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,
            );

            $this->load->view('admin/home', $data);

        }

        public function Addjersey()
        {
            $data = array(
            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'kat' => $this->model->liga(),

            'error' => ''

            );

            $this->load->view('admin/addjersey', $data);
        }

        public function get_klub()
        {
            $liga = $this->input->post('option');

            $data['subkat_per_liga'] = $this->model->klub_per_liga($liga);

            foreach($data['subkat_per_liga'] as $a)
            {
                echo "<option value='$a->subkat'>$a->subkat</option>";
            }

            echo json_encode($data);
        }

        public function Upload()
        {
            $this->load->helper('string');

            $nama = random_string('alnum', 5)."-".$_FILES['foto']['name'];

            $config = array(
              'upload_path' => 'foto/',

              'allowed_types' =>  'jpg|png|jpeg|JPG|PNG|JPEG',

              'max_size' => 5000,

              'file_name' => $nama,
            );

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto'))
            {
              $data = array(
              'error' => $this->upload->display_errors(),

              'komen_rows' => $this->komentar,

              'transaksi_rows' => $this->transaksi,

              'kritik_saran_rows' => $this->kritik_saran,

              'kat' => $this->model->liga(),
              );

              $this->load->view('admin/addjersey', $data);
            }
            else
            {
              $url_title = url_title($this->input->post('nama'));

              $url = $url_title."-".random_string('alnum', 16);

              $input = array(
                'nama' => $this->input->post('nama'),

                'berat' => $this->input->post('berat'),

                'kat' => $this->input->post('kat'),

                'subkat' => $this->input->post('subkat'),

                'tipe' => $this->input->post('tipe'),

                'm' => $this->input->post('m'),

                'l' => $this->input->post('l'),

                'xl' => $this->input->post('xl'),

                'xxl' => $this->input->post('xxl'),

                'jumlah' => $this->input->post('m')+$this->input->post('l')+$this->input->post('xl')+$this->input->post('xxl'),

                'harga' => $this->input->post('harga'),

                'deskripsi' => $this->input->post('deskripsi'),

                'foto' => $config['file_name'],

                'url' => $url,
              );
              $data['upload'] = $this->model->_upload($input);

              redirect(base_url()."Admin/Addjersey?msg=success");
            }

            }

        public function Removejersey()
        {
            $this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

            $this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

            $jumlah = $this->model->jmlsemuatipe();

            $config = array(
            'base_url' => base_url()."Admin/Ajax_paging_remove?tipe".$this->key,

            'total_rows' => $jumlah,

            'per_page' => 6,
            );

            $this->pagination->initialize($config);

            $data = array(
            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'kat' => $this->model->liga(),

            'semua' => $this->model->semuatipe($config['per_page'], $this->dari),

            );

            $this->load->view('admin/remove-jersey', $data);
        }

        public function Ajax_paging_remove()
        {
          $this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

          $this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

          $jumlah = $this->model->jmlsemuatipe();

          $config = array(
          'base_url' => base_url()."Admin/Ajax_paging_remove?tipe".$this->key,

          'total_rows' => $jumlah,

          'per_page' => 6,
          );

          $this->pagination->initialize($config);

          $data = array(
          'komen_rows' => $this->komentar,

          'transaksi_rows' => $this->transaksi,

          'kritik_saran_rows' => $this->kritik_saran,

          'kat' => $this->model->liga(),

          'semua' => $this->model->semuatipe($config['per_page'], $this->dari),

          );

          $this->load->view('admin/remove-jersey', $data);
        }

        public function Filter()
        {
            $filter_jersey = array(
                'kat' => $liga = $this->input->post('kat'),

                'subkat' => $klub = $this->input->post('subkat'),

                'tipe' => $tipe = $this->input->post('tipe'),
            );


            $data['filter'] = $this->model->filter_admin($filter_jersey);

            $this->load->view('admin/jersey-item', $data);

            json_encode($data);
        }

        public function Editjersey()
        {

        $this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

        $this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $jumlah = $this->model->jmlsemuatipe();

            $config = array(
            'base_url' => base_url()."Admin/Ajax_paging_edit?tipe=".$this->key,

            'total_rows' => $jumlah,

            'per_page' => 6,
            );

            $this->pagination->initialize($config);

            $data = array(
            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'kat' => $this->model->liga(),

            'semua' => $this->model->semuatipe($config['per_page'], $this->dari),

            );

            $this->load->view('admin/edit-jersey', $data);

        }
        public function Ajax_paging_edit()
        {

        $this->key = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->input->get('tipe');

        $this->dari = !empty($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $jumlah = $this->model->jmlsemuatipe();

            $config = array(
            'base_url' => base_url()."Admin/Ajax_paging_edit?tipe=".$this->key,

            'total_rows' => $jumlah,

            'per_page' => 6,
            );

            $this->pagination->initialize($config);

            $data = array(
            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'kat' => $this->model->liga(),

            'semua' => $this->model->semuatipe($config['per_page'], $this->dari),

            );

            $this->load->view('admin/edit-jersey', $data);

        }

        public function Klub()
        {
          if(empty($this->uri->segment(3)))
          {
            $data = array(
              'komen_rows' => $this->komentar,

              'transaksi_rows' => $this->transaksi,

              'kritik_saran_rows' => $this->kritik_saran,

              'kat' => $this->model->liga(),

              'subkat' => $this->model->klub(),
            );

            $this->load->view('admin/view-klub', $data);
          }
          else
          {
            if($this->uri->segment(3)=='Add')
            {
              $data = array(
                'komen_rows' => $this->komentar,

                'transaksi_rows' => $this->transaksi,

                'kritik_saran_rows' => $this->kritik_saran,

                'kat' => $this->model->liga(),
              );

              $this->load->view('admin/Add-klub', $data);

            }
            else
            {
              if($this->uri->segment(3)=='Actaddklub')
              {
                    $insert = array(
                    'kat' => $this->input->post('kat'),

                    'subkat' => $this->input->post('subkat'),
                    );

                    $data['insert'] = $this->model->addklub($insert);

                    redirect(base_url().'Admin/Klub');
              }
              else
              {
                if($this->uri->segment(3)=='Remove')
                {
                  $data['delete'] = $this->model->removeklub($this->uri->segment(4));

                  redirect(base_url().'Admin/Klub');
                }
                else
                {
                  if($this->uri->segment(3)=='Edit')
                  {
                    $data = array(
                      'komen_rows' => $this->komentar,

                      'transaksi_rows' => $this->transaksi,

                      'kritik_saran_rows' => $this->kritik_saran,

                      'kat' => $this->model->liga(),

                      'view' => $this->model->view_klub_id($this->uri->segment(4)),
                    );

                    $this->load->view('admin/edit-klub', $data);
                  }
                  else
                  {
                    if($this->uri->segment('3')=='Update')
                    {
                      $insert = array(
                      'kat' => $this->input->post('kat'),

                      'subkat' => $this->input->post('subkat'),
                      );

                      $data['update'] = $this->model->update_klub($insert, $this->uri->segment(4));

                      redirect(base_url().'Admin/Klub');
                    }
                    else
                    {
                      show_404();
                    }
                  }
                }
              }
            }
          }
        }

        public function Liga()
        {
          if(empty($this->uri->segment(3)))
          {
            $data = array(
            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'kat' => $this->model->liga(),
            );

            $this->load->view('admin/view-liga', $data);

          }
          else
          {
            if($this->uri->segment(3)=='Add')
            {
              $data = array(
              'komen_rows' => $this->komentar,

              'transaksi_rows' => $this->transaksi,

              'kritik_saran_rows' => $this->kritik_saran,
              );

              $this->load->view('admin/add-liga', $data);
            }
            else
            {
              if($this->uri->segment(3)=='Actaddliga')
              {
                $data['insert'] = $this->model->addliga($this->input->post('kat'));

                redirect(base_url().'Admin/Liga');
              }
              else
              {
                if($this->uri->segment(3)=='Remove')
                {
                  $data['delete'] = $this->model->removeliga($this->uri->segment(4));

                  redirect(base_url().'Admin/Liga');
                }
                else
                {
                  if($this->uri->segment(3)=='Edit')
                  {
                    $data = array(
                    'komen_rows' => $this->komentar,

                    'transaksi_rows' => $this->transaksi,

                    'kritik_saran_rows' => $this->kritik_saran,

                    'view' => $this->model->view_liga_id($this->uri->segment(4))
                    );

                    $this->load->view('admin/edit-liga', $data);

                  }
                  else
                  {
                    if($this->uri->segment(3)=='Update')
                    {
                      $insert = array(
                      'kat' => $this->input->post('kat'),
                      );

                      $data['update'] = $this->model->update_liga($insert, $this->uri->segment(4));

                      redirect(base_url().'Admin/Liga');
                    }
                    else
                    {
                      show_404();
                    }
                  }
                }
              }
            }
          }
        }
        public function Actremovejersey()
        {
            $data['delete'] = $this->model->removejersey($this->uri->segment(3));

            redirect(base_url().'Admin/Removejersey');
        }

        public function Updatejersey()
        {
            $data = array(
                'komen_rows' => $this->komentar,

                'transaksi_rows' => $this->transaksi,

                'kritik_saran_rows' => $this->kritik_saran,

                'kat' => $this->model->liga(),

                'jersey' => $this->model->detailproduk($this->uri->segment(3)),

                'error' => ''
            );

            $this->load->view("admin/update-jersey", $data);
        }

        public function Acteditjersey()
        {
        $this->load->helper('string');

          if(empty($_FILES['foto']['name']))
          {
                $input = array(
                        'nama' => $this->input->post('nama'),

                        'kat' => $this->input->post('kat'),

                        'subkat' => $this->input->post('subkat'),

                        'tipe' => $this->input->post('tipe'),

                        'm' => $this->input->post('m'),

                        'l' => $this->input->post('l'),

                        'xl' => $this->input->post('xl'),

                        'xxl' => $this->input->post('xxl'),

                        'jumlah' => $this->input->post('m')+$this->input->post('l')+$this->input->post('xl')+$this->input->post('xxl'),

                        'harga' => $this->input->post('harga'),

                        'deskripsi' => $this->input->post('deskripsi'),

                        'berat' => $this->input->post('berat')
                      );

                      $data['update'] = $this->model->update_jersey($input, $this->uri->segment(3));

                      redirect(base_url().'Admin/Updatejersey/'.$this->uri->segment(3)."?msg=success");
          }
          else
          {

          $nama = random_string('alnum', 5)."-".$_FILES['foto']['name'];

          $config = array(
            'upload_path' => 'foto/',

            'allowed_types' =>  'jpg|png|jpeg|JPG|PNG|JPEG',

            'max_size' => 5000,

            'file_name' => $nama,
          );

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('foto'))
            {
              $data = array(
                  'komen_rows' => $this->komentar,

                  'transaksi_rows' => $this->transaksi,

                  'kritik_saran_rows' => $this->kritik_saran,

                  'kat' => $this->model->liga(),

                  'jersey' => $this->model->detailproduk($this->uri->segment(3)),

                  'error' => $this->upload->display_errors(),
              );

              $this->load->view("admin/update-jersey", $data);
            }
            else
            {

            $input = array(
            'nama' => $this->input->post('nama'),

            'kat' => $this->input->post('kat'),

            'subkat' => $this->input->post('subkat'),

            'tipe' => $this->input->post('tipe'),

            'm' => $this->input->post('m'),

            'l' => $this->input->post('l'),

            'xl' => $this->input->post('xl'),

            'xxl' => $this->input->post('xxl'),

            'jumlah' => $this->input->post('m')+$this->input->post('l')+$this->input->post('xl')+$this->input->post('xxl'),

            'harga' => $this->input->post('harga'),

            'deskripsi' => $this->input->post('deskripsi'),

            'foto' => $nama,

            'berat' => $this->input->post('berat')
          );

          $data['update'] = $this->model->update_jersey($input, $this->uri->segment(3));

          redirect(base_url().'Admin/Updatejersey/'.$this->uri->segment(3)."?msg=success");
          }
        }
      }
        public function Userconfig()
        {
          $data = array(

            'komen_rows' => $this->komentar,

            'transaksi_rows' => $this->transaksi,

            'kritik_saran_rows' => $this->kritik_saran,

            'alluser' => $this->model->alluser(),
          );

          $this->load->view('admin/user-config', $data);
        }

        public function User_Status()
        {
          $uri = str_replace('%40', '@', $this->uri->segment(3));


          if (empty($uri))
          {
            redirect(base_url().'Admin/Userconfig');
          }
          else
          {
            $data['user-email'] = $this->model->user($uri);

            if ($data['user-email']==1)
            {
              if (isset($_GET['act']))
              {
                if($_GET['act']=="banned")
                {
                  $this->model->user_status($uri, $status="banned");
                }

                else
                {
                  if ($_GET['act']=="aktif")
                  {
                    $this->model->user_status($uri, $status="aktif");
                  }
                  else
                  {
                    $this->model->user_drop($uri);
                  }
                }
              }
              else{
                redirect(base_url().'Admin/Userconfig');
              }

                redirect(base_url().'Admin/Userconfig?msg=success');
            }
            else
            {
              redirect(base_url().'Admin/Userconfig');
            }

          }

        }

        public function Komentar()
        {
          $data['komen'] = $this->model->all_komentar();

          $data['user'] = $this->sess['user'];

          $data['komen_rows'] = $this->komentar;

          $data['transaksi_rows'] = $this->transaksi;

          $data['kritik_saran_rows'] = $this->kritik_saran;

          $this->load->view('admin/all-komentar', $data);
        }

        public function Komentar_Status()
        {
          if(empty($this->uri->segment(3)))
          {
            redirect(base_url().'Admin/Komentar');
          }
          else
          {
              if(empty($_GET['status']))
              {
                redirect(base_url().'Admin/Komentar');
              }
              else
              {
                  $id = $this->uri->segment(3);

                  $status = $_GET['status'];

                  if($status=='acc')
                  {
                    $data['komentar_status'] = $this->model->komentar_status($id, $status);
                  }
                  else
                  {
                    $data['remove'] = $this->model->remove_komentar($id);
                  }
                  redirect(base_url().'Admin/Komentar');
              }
          }
        }

        public function Transaksi()
        {
          $data['trans'] = $this->model->all_transaksi();

          $data['user'] = $this->sess['user'];

          $data['komen_rows'] = $this->komentar;

          $data['kritik_saran_rows'] = $this->kritik_saran;

          $data['transaksi_rows'] = $this->transaksi;

          $this->load->view('admin/all-transaksi', $data);
        }

        public function Transaksi_Status()
        {
          if(empty($this->uri->segment(3)))
          {
            redirect(base_url().'Admin/Transaki');
          }
          else
          {
            if(empty($_GET['status']))
            {
              redirect(base_url().'Admin/Transaksi');
            }
            else
            {
                $id = $this->uri->segment(3);

                $status = $_GET['status'];

                if($status=='terkirim')
                {
                    $data['status'] = $this->model->transaksi_status($id, $status);
                    redirect(base_url().'Admin/Transaksi');
                }
                else
                {
                  if($status=='dijalan')
                  {
                    $data['status'] = $this->model->transaksi_status($id, $status);
                    redirect(base_url().'Admin/Transaksi');
                  }
                  else
                  {
                    if($status=='drop')
                    {
                      $data['drop'] = $this->model->remove_transaksi($id);
                      redirect(base_url().'Admin/Transaksi');
                    }
                    else
                    {
                      redirect(base_url().'Admin/Transaksi');
                    }
                  }
                }
            }
          }
        }

    public function Kritik_Saran()
    {
      $data = array(
        'transaksi_rows' => $this->transaksi,

        'komen_rows' => $this->komentar,

        'kritik_saran_rows' => $this->kritik_saran,

        'kritik_saran' => $this->model->all_kritik_saran(),
      );

      $this->load->view('admin/kritik-saran', $data);

    }

    public function Status_Kritik_Saran()
    {

        if(isset($_GET['act']) && isset($_GET['id']))
        {
          $act = $_GET['act'];

          $id = $_GET['id'];

          if($act=='acc')
          {

            $data['act'] = $this->model->kritik_saran_acc($id);

            redirect(base_url().'Admin/Kritik_Saran');

          }
          else
          {
            if($act=='remove')
            {

              $data['act'] = $this->model->remove_kritik_saran($id);

              redirect(base_url().'Admin/Kritik_Saran');
            }
            else
            {
              redirect(base_url().'Admin/Kritik_Saran');
            }
          }
        }
        else
        {
            redirect(base_url()."Admin/Kritik_Saran");
        }
    }
    public function Startup()
    {
      if(empty($this->uri->segment(3)))
      {
        show_404();
      }
      else
      {
        if($this->uri->segment(3)=='Management-Startup')
        {
          $data = array(
            'transaksi_rows' => $this->transaksi,

            'komen_rows' => $this->komentar,

            'kritik_saran_rows' => $this->kritik_saran,

            'startup' => $this->model->startup(),

          );

          $this->load->view('admin/management-startup', $data);
        }
        else
        {
          if($this->uri->segment(3)=='Startup-Edit')
          {
            $data = array(
              'transaksi_rows' => $this->transaksi,

              'komen_rows' => $this->komentar,

              'kritik_saran_rows' => $this->kritik_saran,

              'startup' => $this->model->startup(),

            );
            $this->load->view('admin/startup-edit', $data);

          }
          else
          {
            if($this->uri->segment(3)=='Update-Startup')
            {
              if(empty($_FILES['banner']['name']))
              {
                $input = array(
                  'title' => $this->input->post('title'),

                  'description' => $this->input->post('description'),
                );

                $this->model->update_startup($input);

                redirect(base_url().'Admin/Startup/Management-Startup');
              }
              else
              {
                $type = array("png","jpg","gif","jpeg","PNG","JPG","GIF","JPEG");

                $extension = pathinfo($_FILES['banner']['name']);

                if(!in_array($extension['extension'], $type))
                {
                  redirect(base_url().'Admin/Startup/Startup-Edit?error=extension');
                }
                else
                {
                  $this->load->helper('string');

                  $random = random_string('numeric', 6);

                  $name = $random."+".$_FILES['banner']['name'];

                  $source_path = $_FILES['banner']['tmp_name'];

                  $target_path = "banner/".$name;

                  if(!move_uploaded_file($source_path, $target_path))
                  {
                    redirect(base_url().'Admin/Startup/Startup-Edit?error=size');
                  }
                  else
                  {
                      $input = array(
                        'banner' => $name,

                        'title' => $this->input->post('title'),

                        'description' => $this->input->post('description'),
                      );

                      $this->model->update_startup($input);

                      redirect(base_url().'Admin/Startup/Management-Startup');

                  }
                }
              }
            }
            else
            {
              show_404();
            }
          }
        }
      }
    }
    public function Adminconfig()
    {
      if(empty($this->uri->segment(3)))
      {
        $data = array(
          'transaksi_rows' => $this->transaksi,

          'komen_rows' => $this->komentar,

          'kritik_saran_rows' => $this->kritik_saran,

          'admin' => $this->model->view_admin($filter="")
        );

        $this->load->view('admin/admin-config', $data);
      }
      else
      {
        if($this->uri->segment(3)=='Add')
        {
          $data = array(
            'transaksi_rows' => $this->transaksi,

            'komen_rows' => $this->komentar,

            'kritik_saran_rows' => $this->kritik_saran,
          );

          $this->load->view('admin/add-admin', $data);
        }
        else
        {
          if($this->uri->segment(3)=='Act-Add')
          {
            $input = array(
              'username' => $this->input->post('username'),

              'password' => md5($_POST['password']),

              'status' => $this->input->post('status'),
            );

            $this->model->add_admin($input);

            redirect(base_url().'Admin/Adminconfig');
          }
          else
          {
            if($this->uri->segment(3)=='Edit')
            {
              $data = array(
                'transaksi_rows' => $this->transaksi,

                'komen_rows' => $this->komentar,

                'kritik_saran_rows' => $this->kritik_saran,

                'admin' => $this->model->view_admin($filter=$this->uri->segment(4)),
              );

             $this->load->view('admin/edit-admin', $data);

            }
            else
            {
              if($this->uri->segment(3)=='Update')
              {
                  $input = array(
                    'username' => $this->input->post('username'),

                    'password' => md5($this->input->post('password')),

                    'status' => $this->input->post('status'),
                  );

                  $this->model->update_admin($input, $this->uri->segment(4));

                  redirect(base_url().'Admin/Adminconfig');
              }
              else
              {
                if($this->uri->segment(3)=='Delete')
                {
                  $this->model->delete_admin($this->uri->segment(4));

                  redirect(base_url().'Admin/Adminconfig');
                }
                else
                {

                }
              }
            }
          }
        }
      }
    }

    public function Masterdata()
    {
      if(empty($this->uri->segment(3)))
      {
        show_404();
      }
      else
      {
        if($this->uri->segment(3)=='Province')
        {
          if(empty($this->uri->segment(4)))
          {
            $data = array(
              'transaksi_rows' => $this->transaksi,

              'komen_rows' => $this->komentar,

              'kritik_saran_rows' => $this->kritik_saran,

              'province' => $this->model->masterdata($tb="tb_province", $filter=""),

            );

            $this->load->view('admin/province', $data);
          }
          else
          {
            if($this->uri->segment(4)=='Add')
            {
              $data = array(
                'transaksi_rows' => $this->transaksi,

                'komen_rows' => $this->komentar,

                'kritik_saran_rows' => $this->kritik_saran,

              );

              $this->load->view('admin/add-province', $data);
            }
            else
            {
              if($this->uri->segment(4)=='Act-Add')
              {
                $input = array(
                  'province' => $this->input->post('province'),
                );

                $this->model->add_masterdata($tb="tb_province", $input);

                redirect(base_url().'Admin/Masterdata/Province');
              }
              else
              {
                if($this->uri->segment(4)=='Edit')
                {
                  $data = array(
                    'transaksi_rows' => $this->transaksi,

                    'komen_rows' => $this->komentar,

                    'kritik_saran_rows' => $this->kritik_saran,

                    'edit' => $this->model->masterdata($tb="tb_province", $filter=$this->uri->segment(5)),
                  );

                  $this->load->view('admin/edit-province', $data);

                }
                else
                {
                  if($this->uri->segment(4)=='Update')
                  {
                    $input = array(
                      'province' => $this->input->post('province'),
                    );

                    $this->model->update_masterdata($tb="tb_province", $input, $this->uri->segment(5));

                    redirect(base_url().'Admin/Masterdata/Province');

                  }
                  else
                  {
                    if($this->uri->segment(4)=='Delete')
                    {
                      $this->model->delete_masterdata($tb="tb_province",$this->uri->segment(5));

                      redirect(base_url().'Admin/Masterdata/Province');
                    }
                    else
                    {
                      show_404();
                    }
                  }
                }
              }
            }
          }


        }
        else
        {
          if($this->uri->segment(3)=='City')
          {
            if(empty($this->uri->segment(4)))
            {
              $data = array(
                'transaksi_rows' => $this->transaksi,

                'komen_rows' => $this->komentar,

                'kritik_saran_rows' => $this->kritik_saran,

                'city' => $this->model->masterdata($tb="tb_city", $filter=""),
              );

              $this->load->view('admin/city', $data);
            }
            else
            {
              if($this->uri->segment(4)=='Add')
              {
                $data = array(
                  'transaksi_rows' => $this->transaksi,

                  'komen_rows' => $this->komentar,

                  'kritik_saran_rows' => $this->kritik_saran,

                  'city' => $this->model->masterdata($tb="tb_city", $filter=""),

                  'province' => $this->model->masterdata($tb="tb_province", $filter=""),
                );

                $this->load->view('admin/add-city', $data);
              }
              else
              {
                if($this->uri->segment(4)=='Act-Add')
                {
                  $input = array(
                    'city' => $this->input->post('city'),

                    'province' => $this->input->post('province'),

                    'ongkir' => $this->input->post('ongkir'),
                  );

                  $this->model->add_masterdata($tb="tb_city", $input);

                  redirect(base_url().'Admin/Masterdata/City');

                }
                else
                {
                  if($this->uri->segment(4)=='Edit')
                  {
                    $data = array(
                      'transaksi_rows' => $this->transaksi,

                      'komen_rows' => $this->komentar,

                      'kritik_saran_rows' => $this->kritik_saran,

                      'province' => $this->model->masterdata($tb="tb_province", $filter=""),

                      'edit' => $this->model->masterdata($tb="tb_city", $filter=$this->uri->segment(5)),
                    );

                    $this->load->view('admin/edit-city', $data);
                  }
                  else
                  {
                    if($this->uri->segment(4)=='Update')
                    {
                      $input = array(
                        'province' => $this->input->post('province'),

                        'city' => $this->input->post('city'),

                        'ongkir' => $this->input->post('ongkir'),
                      );

                      $this->model->update_masterdata($tb="tb_city", $input, $this->uri->segment(5));

                      redirect(base_url().'Admin/Masterdata/City');
                    }
                    else
                    {
                      if($this->uri->segment(4)=='Delete')
                      {
                        $this->model->delete_masterdata($tb="tb_city",$this->uri->segment(5));

                        redirect(base_url().'Admin/Masterdata/City');
                      }
                      else
                      {
                        show_404();
                      }
                    }
                  }
                }
              }
            }

          }
          else
          {
            show_404();
          }
        }
      }
    }
  }
