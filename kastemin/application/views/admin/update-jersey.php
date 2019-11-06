<?php
    include "sidebar.php";
?>

<div id="container">
    <div class="panel panel-default row">
        <div class="panel-heading text-center">
            Perbarui Jersey
        </div>

        <div class="panel-body row">
            <div class="col-md-4 text-center">
              <?php if($error==''){} else { echo "<div class='error'>$error</div>";} ?>
                <img style="max-height:331.547;" src="<?php echo base_url().'foto/'.$jersey[0]->foto; ?>" class="img-responsive img-rounded">
                <hr>
                <?php echo $jersey[0]->nama; ?>
            </div>
            <div class="col-md-8">

                <div class="row placeholders">
                    <div id="container" style="margin-top:0">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo base_url().'Admin/Acteditjersey/'.$jersey[0]->url; ?>" id="edit" method="post" enctype="multipart/form-data">
                        <label>Nama Produk</label>
                              <input type="text" name="nama" value="<?php echo $jersey[0]->nama; ?>" class="form-control" placeholder="Tulis Nama Jersey Disini...">
                    </div>

                    <div class="col-md-6">
                        <label>Harga Produk</label>
                              <input type="text" name="harga" value="<?php echo $jersey[0]->harga; ?>" class="form-control" placeholder="Sertakan Jersey Disini...">
                    </div>
                </div>
                <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Liga (Kategori)</label>
                                    <select id="changeliga" data-url="<?php echo base_url().'Admin/get_klub'; ?>" name="kat" class="form-control" onchange="func(this.value)">
                                        <option value="<?php echo $jersey[0]->kat; ?>"><?php echo $jersey[0]->kat; ?></option>
                                            <option value="">------Perbarui Liga------</option>
                                            <?php
                                                foreach ($kat as $a){
                                            ?>

                                                <option value="<?php echo $a->kat; ?>"><?php echo $a->kat; ?></option>

                                            <?php } ?>
                                    </select>
                        </div>

                        <div class="col-md-6">
                            <label>Nama Klub (Sub Kategori)</label>
                                <select id="klub" name="subkat" class="form-control">
                                    <option value="<?php echo $jersey[0]->subkat; ?>"><?php echo $jersey[0]->subkat; ?></option>
                                    <option value="">Pilih Liga Untuk Megetahui Klub</option>
                                </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tipe Produk</label>
                            <select name="tipe" class="form-control">
                                <option value="<?php echo $jersey[0]->tipe; ?>"><?php echo $jersey[0]->tipe; ?></option>
                                <option value="">-----Pilih Tipe Produk-----</option>
                                <option value="Lengan Pendek">Produk Jersey</option>
                                <option value="Lengan Panjang">Produk Kaos</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Jumlah Ukuran M</label>
                            <input type="number" name="m" class="form-control" value="<?php echo $jersey[0]->m; ?>" placeholder="Berapa Banyak Ukuran M?">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Jumlah Ukuran L</label>
                            <input type="number" name="l" class="form-control" value="<?php echo $jersey[0]->l; ?>" placeholder="Berapa Banyak Ukuran l?">
                        </div>

                        <div class="col-md-6">
                            <label>Jumlah Ukuran XL</label>
                            <input type="number" name="xl" value="<?php echo $jersey[0]->xl; ?>" class="form-control" placeholder="Berapa Banyak Ukuran XL?">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Jumlah Ukuran XXL</label>
                            <input type="number" name="xxl" value="<?php echo $jersey[0]->xxl; ?>" class="form-control" placeholder="Berapa Banyak Ukuran XXL?">
                        </div>

                        <div class="col-md-6">
                            <label>Foto Produk</label>
                            <input type="file" name="foto" class="btn btn-default">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-md-6">
                          <label>Berat Produk</label>
                          <input type="text" name="berat" class="form-control" value="<?php echo $jersey[0]->berat; ?>" placeholder="Contoh 0.5">
                          <br>
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
                          <button type="reset" class="btn btn-default"><i class="fa fa-remove"></i> Batal</button>
                      </div>

                        <div class="col-md-6">
                            <label>Deskripsi</label>
                            <textarea rows="8" class="form-control" name="deskripsi" placeholder="Tuliskan Mengenenai Jersey Tersebut"><?php echo $jersey[0]->deskripsi; ?></textarea>
                          </form>

                        </div>

                    </div>
                    </div>

                </div>

            </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
</div>

<?php
    include "slash-sidebar.php";
?>
<script>
    $(document).ready(function(){
        $(".btn-danger").click(function(){
            $('#edit')[0].reset();
        });
    });

</script>
