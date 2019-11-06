    <?php
        if(empty($sessionemail)){
    ?>

    <p>Anda Belum Login, Silahkan Login <a href='<?php echo base_url()."login/login" ?>'>Disini</a> Atau Kembali Ke <a href='<?php echo base_url();?>'>Beranda</a></p>

    <?php } else{ ?>


<?php
    include "header.php";
?>
    <div class='container content' style="margin-top:9%">
      <div class="row">
        <div class="col-md-5">
            <h4>Keterangan : </h4>
            <?php if(isset($_GET['kode']))
            {
              echo "Transaksi Berhasil! Dengan Kode Transaksi <font color='red'>".$_GET['kode']."</font>";
            }
            else{
            ?>
            
              <h5>Keranjang Belanja Anda Kosong</h5>
            <?php } ?>
            <h5>Keranjang Belanja Dengan Email <?php echo $_SESSION['email']; ?></h5>
            <br>
            

        </div>
      </div>
      
        <div class="row">
          <br>
          <div class="col-md-3">
            <img style="max-height:254.5" src="<?php echo base_url().'foto/'.$val['foto']; ?>" class="img-responsive img-rounded thumbnail">
          </div>
          <div class="col-md-9">
            <b><?php echo $val['barang']; ?></b>
            <hr>
            <div class="row placeholders">
              <div class="col-md-5">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td style="border-top:0">Ukuran Terpilih</td>
                      <td style="border-top:0">:</td>
                      <td style="border-top:0"><?php echo ucfirst($val['ukuran']); ?></td>
                    </tr>

                    <tr>
                      <td style="border-top:0">Jumlah Kuantitas</td>
                      <td style="border-top:0">:</td>
                      <td style="border-top:0"><?php echo $val['jumlah']; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3"><a class="konfirmasi" href="<?php echo base_url().'Keranjang/Remove?id='.$val['id'].'&url='.$val['url_barang']; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus Dari Keranjang</a>
</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-md-5 pull-right">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <td style="border-top:0">Harga Satuan</td>
                      <td style="border-top:0">:</td>
                      <td style="border-top:0"><?php echo "Rp. ".number_format($harga_satuan, '0',',','.'); ?></td>
                    </tr>

                    <tr>
                      <td style="border-top:0">Berat Jersey</td>
                      <td style="border-top:0">:</td>
                      <td style="border-top:0"><?php echo $berat_jersey." Kg"; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3"></td>
                    </tr>
                    <tr>
                      <td style="border-top:0">Harga Total</td>
                      <td style="border-top:0">:</td>
                      <td style="border-top:0"><font color="red"><?php echo "Rp. ".number_format($val['harga'], '0',',','.'); ?></font></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>

      <?php if(empty($row)){
        ?>
        <br>
        <button class="btn btn-default" data-toggle="modal" data-target="#cek"><span class="glyphicon glyphicon-briefcase"></span> Cek Pemesanan</button>

        <?php } else{?>
          <div class="row col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td>#</td>
                    <td>Sub Total</td>
                    <td>Berat Keseluruhan</td>
                    <td>Ongkos Kirim</td>
                    <td>Tujuan Pengiriman</td>
                    <td>PPN 10%</td>
                    <td>Total Akhir</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php echo "Rp. ".number_format($total_akhir, '0',',','.'); ?></td>
                    <td><?php echo $total_berat." Kg"; ?></td>
                    <td><?php echo "Rp. ".number_format($ongkir[0]->ongkir*$total_berat, '0',',','.'); ?></td>
                    <td><?php echo $ongkir[0]->city; ?></td>
                    <td><?php echo "Rp. ".number_format($ppn, '0',',','.'); ?></td>
                    <td><?php echo "Rp. ".number_format($ongkir[0]->ongkir*$total_berat+$total_akhir+$ppn, '0',',','.'); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <form action="<?php echo base_url().'Keranjang/Transaksi'; ?>" method="post" style="display:inline">
          <input type="hidden" name="total" value="<?php echo $ongkir[0]->ongkir*$total_berat+$total_akhir+$ppn; ?>">
          <button type="submit" class="btn btn-default transaksi"><span class="glyphicon glyphicon-ok"></span> Mulai Transaksi</button>
        </form>

        <button class="btn btn-default" data-toggle="modal" data-target="#cek"><span class="glyphicon glyphicon-briefcase"></span> Cek Pemesanan</button>

      <?php } ?>
    </div>
  <div class="modal fade" id="cek">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
          <br>
        </div>

        <div class="modal-body">
          <form action="<?php echo base_url().'Transaksi' ?>" method="post">
            <label>Kode Transaksi</label>
            <input type="text" name="kode_transaksi" class="form-control" placeholder="Masukan Kode Transaksi Disini...">
            <br>
            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Lihat</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).on("click", ".konfirmasi", function(e){
    e.preventDefault()
    if(confirm('Apakah Anda Yakin?'))
    {
        window.location=$(this).attr("href")
    }
    else
    {
    }
  })
</script>
<?php
  include "footer.php";
}?>
