<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Model extends CI_Model
{
    public function startup()
    {
        return $this->db->get('startup')->result();
    }

    public function terbaru()
    {
        $query = $this->db->order_by("id", "desc");

        $query = $this->db->get("barang", 2);

        return $query->result();
	}

    public function bestview()
    {
		$query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.view desc limit 2");

        return $query->result();
	}

	public function bestseller()
    {
        $query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.seller desc limit 2");

        return $query->result();
	}


	public function tipepanjang($limit, $start)
    {
        $query = $this->db->query("SELECT barang.*,sum(suka.banyak) as likes FROM barang LEFT JOIN suka
ON barang.id = suka.id_barang where barang.tipe = 'Lengan Panjang' GROUP BY barang.id ORDER BY barang.id desc limit $start, $limit ");

        return $query->result();
	}

    public function jmltipepanjang()
    {
        return $this->db->get_where("barang", array('tipe'=>'Lengan Panjang'))->num_rows();
    }

	public function tipependek($limit, $start)
    {
    	  $query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka
ON barang.id = suka.id_barang where barang.tipe = 'Lengan Pendek' GROUP BY barang.id ORDER BY barang.id desc limit $start, $limit");

        return $query->result();
	}

    public function jmltipependek()
    {
        return $this->db->get_where("barang", array('tipe'=>'Lengan Pendek'))->num_rows();
    }

	public function semuatipe($limit, $start)
    {
        $query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.id desc limit $start, $limit");

        return $query->result();
	}

    public function jmlsemuatipe()
    {
        return $this->db->get("barang")->num_rows();
    }

	public function detailproduk($url)
    {
		    $query = $this->db->get_where("barang", array('url'=>$url));

        return $query->result();

	}

	public function tambahview($id, $view)
    {
        $query = $this->db->where("id", $id);

        $query = $this->db->update('barang', array('view' => $view+1));

        return $query;
	}

	public function search($cari)
    {
		$query = $this->db->query("select barang.*,sum(suka.banyak) as likes from barang left join suka on barang.id = suka.id_barang where nama like '%$cari%' group by barang.id order by barang.id desc");

    return $query->result();
	}

  public function search_row($cari)
  {
    $query = $this->db->like("nama", "$cari");

    $query = $this->db->get("barang");

    return $query->num_rows();
  }

	public function ceklogin($login)
    {
        $query = $this->db->get_where("user", $login);

        return $query->result();
	}

    public function loginadmin($login)
    {
		$query = $this->db->get_where("admin", $login);

        return $query->result();
    }

  public function cek_ukuran($ukuran)
  {
    return $this->db->get_where('barang', $ukuran)->result();
  }

	public function ceksuka($id)
    {
        if(empty($this->sess['email'])){}

        else
        {
            return $this->db->get_where("suka", array('likers'=>$this->sess['email'], 'id_barang'=>$id))->num_rows();
		}
	}

    public function _datauser($email)
    {
        $sql = $this->db->get_where("user", array('email'=>$email));

        return $sql->result();
    }

    public function klub()
    {
        $query = $this->db->order_by("subkat", "asc");

        $query = $this->db->get("subkategori");

        return $query->result();
    }

    public function liga()
    {
        $query = $this->db->order_by("kat", "asc");

        $query = $this->db->get("kategori");

        return $query->result();
    }

    public function upload($input)
    {
        return $this->db->insert('barang', $input);

    }

    public function filterklub($klub)
    {
        $query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka ON barang.id = suka.id_barang where barang.subkat = '$klub' GROUP BY barang.id ORDER BY barang.id desc");

		return $query->result();
    }

   public function filterliga($liga)
   {
        $query = $this->db->query("SELECT barang.*, sum(suka.banyak) as likes FROM barang LEFT JOIN suka ON barang.id = suka.id_barang where barang.kat = '$liga' GROUP BY barang.id ORDER BY barang.id desc");

		return $query->result();

   }

    public function suka($id, $email)
    {
        return $this->db->insert("suka", array('id_barang'=>$id, 'banyak'=>1, 'likers'=>$email));
    }

    public function batalsuka($id, $session)
    {
        return $this->db->delete("suka", array('id_barang'=>$id, 'likers'=>$session));
    }

    public function jmlsuka($id)
    {
        $query = $this->db->query("select sum(banyak) as likes from suka where id_barang = '$id' ");

        return $query->result();
    }

    public function listkomen($url)
    {
        $query = $this->db->order_by("waktu", "asc");

        $query = $this->db->get_where("komentar", array('url_barang'=>$url, 'status'=>'acc'));

        return $query->result();
    }

    public function tambahkomen($komen)
    {
        return $this->db->insert('komentar', $komen);
    }

    public function komen_pending_rows()
    {
        return $this->db->get_where("komentar", array('status'=>'pending'))->num_rows();
    }

    public function transaksi_rows()
    {
        return $this->db->get_where("transaksi", array('status'=>'pending'))->num_rows();
    }

    public function klub_per_liga($liga)
    {
        $query = $this->db->order_by("subkat", "asc");

        $query = $this->db->get_where("subkategori", array('kat'=>$liga));

        return $query->result();
    }

    public function addjersey($input)
    {
        return $this->db->insert("barang", $input);
    }

    public function filter_admin($filter)
    {
        $sql = $this->db->get_where("barang", $filter);

        return $sql->result();
    }

    public function addliga($kat)
    {
        return $this->db->insert('kategori', array('kat'=>$kat));
    }

    public function addklub($insert)
    {
        return $this->db->insert('subkategori', $insert);
    }

    public function removeklub($id)
    {
        return $this->db->delete("subkategori", array('id'=>$id));
    }

    public function removeliga($id)
    {
        return $this->db->delete("kategori", array('id'=>$id));
    }

    public function _upload($insert)
    {
        return $this->db->insert("barang", $insert);
    }

    public function removejersey($id)
    {
        return $this->db->delete("barang", array('id' => $id));

    }

    public function update_jersey($update, $url)
    {
        $query = $this->db->where("url", $url);

        $query = $this->db->update("barang", $update);

        return $query;
    }

    public function filterternew($limit, $start)
    {
        $query = $this->db->query("SELECT barang.*,sum(suka.banyak) as likes FROM barang LEFT JOIN suka
        ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.id desc limit $start, $limit");

        return $query->result();}

    public function filterbestview($limit, $start)
    {
        $query = $this->db->query("SELECT barang.*,sum(suka.banyak) as likes FROM barang LEFT JOIN suka
        ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.view desc limit $start, $limit");

        return $query->result();
    }

    public function filterbestseller($limit, $start)
    {
        $query = $this->db->query("SELECT barang.*,sum(suka.banyak) as likes FROM barang LEFT JOIN suka
        ON barang.id = suka.id_barang GROUP BY barang.id ORDER BY barang.seller desc limit $start, $limit");

        return $query->result();

    }

		public function komenrow()
		{
			$url = $this->uri->segment(3);

			return $this->db->get_where("komentar", array('url_barang'=>$url, 'status'=>'acc'))->num_rows();
		}

    public function user($email)
    {
        return $this->db->get_where("user", array('email'=>$email))->num_rows();
    }

    public function register($input)
    {
      return $this->db->insert('user', $input);
    }

    public function alluser()
    {
      $query = $this->db->order_by("id","desc");

      $query = $this->db->get('user');

      return $query->result();
    }

    public function user_status($email, $status)
    {
      $query = $this->db->where('email', $email);

      $query = $this->db->update('user', array('status' => $status));

      return $query;
    }

    public function user_drop($email)
    {
      return $this->db->delete('user', array('email'=>$email));
    }

    public function update_m($url, $qty, $ket)
    {
      if($ket=='tambah')
      {
        $query = $this->db->query("update barang set m = m+$qty, jumlah = jumlah+$qty where url = '$url' ");
      }
      else
      {
        $query = $this->db->query("update barang set m = m-$qty, jumlah = jumlah-$qty where url = '$url' ");
      }

      return $query;
    }

    public function update_l($url, $qty, $ket)
    {
      if($ket=='tambah')
      {
        $query = $this->db->query("update barang set l = l+$qty, jumlah = jumlah+$qty where url = '$url' ");
      }
      else
      {
        $query = $this->db->query("update barang set l = l-$qty, jumlah = jumlah-$qty where url = '$url' ");
      }

      return $query;
    }

    public function update_xl($url, $qty, $ket)
    {
      if($ket=='tambah')
      {
        $query = $this->db->query("update barang set xl = xl+$qty, jumlah = jumlah+$qty where url = '$url' ");
      }
      else
      {
        $query = $this->db->query("update barang set xl = xl-$qty, jumlah = jumlah-$qty where url = '$url' ");
      }

      return $query;
    }

    public function update_xxl($url, $qty, $ket)
    {
      if($ket=='tambah')
      {
        $query = $this->db->query("update barang set xxl = xxl+$qty, jumlah = jumlah+$qty where url = '$url' ");
      }
      else
      {
        $query = $this->db->query("update barang set xxl = xxl-$qty, jumlah = jumlah-$qty where url = '$url' ");
      }

      return $query;
    }
    public function get_berat($url)
    {

    }

    public function cek_cart_produk($url, $email, $ukuran, $tgl)
    {
      return $this->db->get_where("cart", array('url_barang' => $url, 'email' => $email, 'ukuran' => $ukuran, 'tanggal' => $tgl))->num_rows();
    }

    public function insert_cart($email, $url, $berat, $foto, $barang, $ukuran, $jumlah, $harga, $tgl)
    {
      return $this->db->insert('cart', array('email' => $email, 'berat'=>$berat, 'url_barang' => $url, 'foto' => $foto, 'barang' => $barang, 'ukuran' => $ukuran, 'jumlah' => $jumlah, 'harga' => $harga, 'tanggal' => $tgl));
    }

    public function update_cart($jumlah, $total_harga, $url, $ukuran, $tgl)
    {
      return $this->db->query("update cart set jumlah = jumlah+$jumlah, harga = harga+$total_harga where url_barang='$url' and ukuran = '$ukuran' and tanggal = '$tgl' ");
    }

    public function select_cart($email)
    {
      $query = $this->db->order_by("id", "desc");

      $query = $this->db->get_where("cart", array('email' => $email));

      return $query->result_array();
    }

    public function row_cart($email)
    {
      return $this->db->get_where("cart", array('email'=>$email))->num_rows();
    }

    public function select_cart_id($id)
    {
      $query = $this->db->get_where("cart", array('id'=>$id));

      return $query->result();
    }

    public function remove_cart($id)
    {
      return $this->db->delete("cart", array('id'=>$id));
    }

    public function ongkir($city)
    {
      return $this->db->get_where('tb_city', array('city'=>$city))->result();
    }

    public function total_harga_cart($email)
    {
      $query = $this->db->query("select sum(harga) as harga_total from cart where email = '$email' ");

      return $query->result();
    }

    public function insert_transaksi($insert)
    {
      return $this->db->insert("transaksi", $insert);
    }

    public function remove_cartOK($email)
    {
      return $this->db->delete("cart", array('email'=>$email));
    }

    public function cek_kode_transaksi($kode, $email, $key)
    {
      $query = $this->db->get_where('transaksi', array('kode'=>$kode, 'email'=>$email));

      if($key=='result')
      {
        return $query->result();
      }

      else
      {
        return $query->num_rows();
      }
    }

    public function all_komentar()
    {
      $query = $this->db->order_by("waktu", "desc");

      $query = $this->db->get("komentar");

      return $query->result();
    }

    public function komentar_status($id, $status)
    {
       $query = $this->db->where('id', $id);

       $query = $this->db->update('komentar', array('status'=> $status));

       return $query;

    }

    public function remove_komentar($id)
    {
      return $this->db->delete('komentar', array('id'=>$id));
    }

    public function all_transaksi()
    {
      $query = $this->db->order_by("id", "desc");

      $query = $this->db->get("transaksi");

      return $query->result();
    }

    public function transaksi_status($id, $status)
    {
      $query = $this->db->where('id', $id);

      $query = $this->db->update('transaksi', array('status'=>$status));

      return $query;
    }

    public function remove_transaksi($id)
    {
      return $this->db->delete("transaksi", array('id'=>$id));
    }

    public function update_user($update, $email)
    {
      $query = $this->db->where('email', $email);

      $query = $this->db->update("user", $update);

      return $query;
    }

    public function update_seller($url)
    {
        return $this->db->query("update barang set seller = seller+1 where url = '$url' ");
    }

    public function profil_update($foto, $email)
    {
      $query = $this->db->where('email', $email);

      $query = $this->db->update("user", array('foto'=>$foto));

      return $query;
    }

    public function jmlklub($klub)
    {
      return $this->db->get_where('barang', array('subkat'=>$klub))->num_rows();
    }

    public function kritik_saran($insert)
    {
      return $this->db->insert('kritik_saran', $insert);
    }

    public function kritik_saran_rows()
    {
      return $this->db->get_where('kritik_saran', array('status'=>'pending'))->num_rows();
    }

    public function all_kritik_saran()
    {
      $query = $this->db->order_by("id","desc");

      $query = $this->db->get('kritik_saran');

      return $query->result();
    }

    public function kritik_saran_acc($id)
    {
      $query = $this->db->where("id", $id);

      $query = $this->db->update("kritik_saran", array("status"=>"accept"));

      return $query;
    }

    public function remove_kritik_saran($id)
    {
      return $this->db->delete("kritik_saran", array("id"=>$id));
    }

    public function get_kritik_saran()
    {
      $query =  $this->db->order_by("id", "desc");

      $query =  $this->db->get_where("kritik_saran", array("status"=>"accept"), 3);

      return $query->result();
    }

    public function update_startup($update)
    {
      return $this->db->update('startup', $update);
    }

    public function masterdata($tb, $filter)
    {
      $query = $this->db->order_by("id","desc");

      if($filter=="")
      {

      }
      else
      {
        $query = $this->db->where("id",$filter);
      }

      $query = $this->db->get($tb);

      return $query->result();
    }

    public function add_masterdata($tb, $input)
    {
      return $this->db->insert($tb, $input);
    }

    public function update_masterdata($tb, $update, $id)
    {
      $query = $this->db->where("id",$id);

      $query = $this->db->update($tb,$update);

      return $query;
    }

    public function delete_masterdata($tb, $id)
    {
      $query = $this->db->where("id",$id);

      $query = $this->db->delete($tb);

      return $query;
    }
    public function hitung_masterdata($filter){
        $provinsi = str_replace('%20', ' ', $filter);
        $provinsi = "$provinsi";
        $query = $this->db->query("SELECT * FROM tb_city where province='$provinsi' ");
        return $query->num_rows();
    }
    public function filter_masterdata($filter)
    {
        $provinsi = str_replace('%20', ' ', $filter);
        $provinsi = "$provinsi";
        $query = $this->db->query("SELECT * FROM tb_city where province='$provinsi' ");
          return $query->result();
    }

    public function view_admin($filter)
    {
      $query = $this->db->order_by("id","desc");

      if($filter=="")
      {

      }
      else
      {
        $query = $this->db->where("id",$filter);
      }

      $query = $this->db->get('admin');

      return $query->result();
    }


    public function add_admin($input)
    {
        return $this->db->insert('admin', $input);
    }

    public function update_admin($update, $id)
    {
      $query = $this->db->where("id",$id);

      $query = $this->db->update('admin',$update);

      return $query;
    }

    public function delete_admin($id)
    {
    $query = $this->db->where("id",$id);

    $query = $this->db->delete('admin');

    return $query;
    }

    public function view_klub_id($id)
    {
      return $this->db->get_where("subkategori", array('id'=>$id))->result();
    }

    public function view_liga_id($id)
    {
      return $this->db->get_where("kategori", array('id'=>$id))->result();
    }

    public function update_klub($update, $id)
    {
      $query = $this->db->where("id",$id);

      $query = $this->db->update('subkategori',$update);

      return $query;
    }

    public function update_liga($update, $id)
    {
    $query = $this->db->where("id",$id);

    $query = $this->db->update('kategori',$update);

    return $query;
    }


}
