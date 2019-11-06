<?php
  include "header.php";
?>
  <div class="container content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php if($row==0){?>
            <h4>Pencarian Transaksi Dengan Kode "<?php echo $this->input->post('kode_transaksi'); ?>" Tidak Ditemukan</h4>
          </div>
        </div>
      </div>
        <?php } else{?>
          <a href="<?php echo base_url().'Export?kode='.$transaksi[0]->kode; ?>" class="btn btn-default"><i style="color : #34a853" class="fa fa-file-excel-o"></i> Export To Excel</a>
          <br>
          <br>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <td>#</td>
                <td>Email</td>
                <td>Total Biaya</td>
                <td>Kode Transaksi</td>
                <td>Status Transaksi</td>
              </tr>
            </thead>

            <tbody>
              <?php $no=0; foreach($transaksi as $a){ $no++;?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $a->email; ?></td>
                    <td><?php echo "Rp ".number_format($a->total, '0',',','.'); ?></td>
                    <td><?php echo $a->kode; ?></td>
                    <td><?php echo $a->status; ?></td>

                  </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
<?php } include "footer.php";?>
