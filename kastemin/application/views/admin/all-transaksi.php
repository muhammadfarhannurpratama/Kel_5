<?php
  include "sidebar.php";
?>
  <div id="container" style="background:white">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <td>#</td>
              <td>Alamat E-mail</td>
              <td>Total Belanja</td>
              <td>Kode Transaksi</td>
              <td>Status</td>
            </tr>
          </thead>

          <tbody>
            <?php $no = 0; foreach($trans as $a) { $no++; ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $a->email;?></td>
                <td><?php echo "Rp ".number_format($a->total,'0',',','.');?></td>
                <td><?php echo $a->kode; ?>
                <td>
                  <div class="btn-group">
                  <?php if($a->status=='pending'){?>
                    <button class="btn btn-default disabled"> Pending </button>
                    <button data-url="<?php echo base_url().'Admin/Transaksi_Status/'.$a->id.'?status=dijalan'; ?>" class="konfirmasiJS btn btn-primary"> Diperjalanan </button>
                    <button data-url="<?php echo base_url().'Admin/Transaksi_Status/'.$a->id.'?status=terkirim'; ?>" class="konfirmasiJS btn btn-success"> Terkirim </button>
                  <?php } else{
                    if($a->status=='terkirim'){
                  ?>
                  <button class="btn btn-default disabled"> Terkirim </button>
                  <button data-url="<?php echo base_url().'Admin/Transaksi_Status/'.$a->id.'?status=drop'; ?>" class="konfirmasiJS btn btn-danger"> Remove </button>
                  <?php } else{?>
                    <button class="btn btn-default disabled"> Diperjalanan </button>
                    <button data-url="<?php echo base_url().'Admin/Transaksi_Status/'.$a->id.'?status=terkirim'; ?>" class="konfirmasiJS btn btn-success"> Terkirim </button>
                  <?php }} ?>
                </div>
                </td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php
  include "footer.php";
  include "slash-sidebar.php";
?>
