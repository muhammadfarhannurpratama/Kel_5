<?php
  include "sidebar.php";
?>

  <div id="container" style="background:white;">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
                <tr>
                  <td>#</td>
                  <td>Foto Jersey</td>
                  <td>Komentar</td>
                  <td>Nama User</td>
                  <td>Status</td>
                </tr>
            </thead>

            <tbody>
              <?php $no = 0; foreach($komen as $a) { $no++; ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <?php
                  $data['foto'] = $this->model->detailproduk($a->url_barang);
                    foreach ($data['foto'] as $foto) {
                  ?>
                  <td><img style="max-height:160" src="<?php echo base_url().'foto/'.$foto->foto; }?>" class="img-responsive img-rounded thumbnail"></td>
                  <td style="max-width:250"><?php echo $a->komen;?></td>
                  <td><?php echo ucwords($a->nama);?></td>
                  <td>
                    <div class="btn-group">
                    <?php if($a->status=='pending'){?>
                      <button class="btn btn-default disabled"> Pending </button>
                      <button data-url="<?php echo base_url().'Admin/Komentar_Status/'.$a->id.'?status=acc'; ?>" class="konfirmasiJS btn btn-primary"> Acc </button>
                    <?php } else{?>
                      <button class="btn btn-primary disabled"> Accept </button>
                    <?php } ?>
                    <button data-url="<?php echo base_url().'Admin/Komentar_Status/'.$a->id.'?status=drop'; ?>" class="konfirmasiJS btn btn-danger"> Remove </button>
                  </div>
                  </td>
                </tr>
                <?php } ?>
            </tbody>

          </table>
        </div>
  </div>

<?php
  include "footer.php";
  include "slash-sidebar.php";
?>
