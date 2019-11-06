<?php
    include "sidebar.php";
?>

    <div id="container" style="background:white">
        <?php
            if(empty($_GET['msg'])){}
            else{
        ?>

        <div class="row">
        <div class="col-md-5">
            <div class="alert alert-success">
            Berhasil Di Upload
            </div>
        </div>
            </div>

        <?php }?>
          <div class="row">
            <div class="col-md-5">
              <?php if($error==''){} else{?><div class="error"><?php echo $error; ?></div><?php } ?>
              <form action="<?php echo base_url().'Admin/Upload'; ?>" method="post" id="add" enctype="multipart/form-data">
              <label>Nama Produk</label>
              <input type="text" name="nama" class="form-control" placeholder="Tulis Nama Pruduk Disini...">
              <br>
              <label>Foto Produk</label>
              <input type="file" name="foto" class="btn btn-default">
              <br>
              <label>Harga Produk</label>
              <input type="text" name="harga" class="form-control" placeholder="Contoh 100000">

              <br>
              <label>Berat Produk (Satuan Kilo)</label>
              <input type="text" name="berat" class="form-control" placeholder="0.5">
              <br>
              <label>Nama Liga (Kategori)</label>
                      <select id="changeliga" data-url="<?php echo base_url().'Admin/get_klub'; ?>" name="kat" class="form-control" onchange="func(this.value)">
                          <option value="">Pilih Jenis Liga</option>
                              <?php
                                  foreach ($kat as $a){
                              ?>

                                  <option value="<?php echo $a->kat; ?>"><?php echo $a->kat; ?></option>

                              <?php } ?>
                      </select>
              <br>
              <label>Nama Klub (Sub Kategori)</label>
                  <select id="klub" name="subkat" class="form-control">
                      <option>Pilih Liga Untuk Mengetahui Klub</option>
                  </select>
                  <br>
                  <label>Tipe Pruduk</label>
                  <select name="tipe" class="form-control">
                      <option value="">Pilih Tipe Produk</option>
                      <option value="Lengan Pendek">Produk Jersey</option>
                      <option value="Lengan Panjang">Produk Kaos</option>
                  </select>
                  <br>
                  <label>Jumlah Ukuran M</label>
                  <input type="number" name="m" class="form-control" placeholder="Berapa Banyak Ukuran M?">
                  <br>
                  <label>Jumlah Ukuran L</label>
                  <input type="number" name="l" class="form-control" placeholder="Berapa Banyak Ukuran l?">
                  <br>
                  <label>Jumlah Ukuran XL</label>
                  <input type="number" name="xl" class="form-control" placeholder="Berapa Banyak Ukuran XL?">
                  <br>
                  <label>Jumlah Ukuran XXL</label>
                  <input type="number" name="xxl" class="form-control" placeholder="Berapa Banyak Ukuran XXL?">
                  <br>
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" rows="8" placeholder="Tuliskan Mengenenai Jersey Tersebut"></textarea>
                  <br>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambahkan</button>
                  <button type="reset" class="btn btn-default"><i class="fa fa-remove"></i> Batal</button>
              </form>

            </div>
          </div>
    </div>
<script>
    $(document).ready(function(){
        $(".btn-danger").click(function(){
            $('#add')[0].reset();
        });
    });
</script>
<?php
  include "footer.php";
  include "slash-sidebar.php";
?>
