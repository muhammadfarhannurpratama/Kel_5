<?php
  include "sidebar.php";
?>
  <div id="container" style="background:white">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td>#</td>
            <td>Nama User</td>
            <td>Foto User</td>
            <td>Content</td>
            <td>Status</td>
          </tr>
        </thead>

        <tbody>
            <?php $no =0 ;foreach ($kritik_saran as $a) {$no++; ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo ucwords($a->nama); ?></td>
                <td><img src="<?php echo base_url().'profil/'.$a->foto;?>" class="img-rounded thumbnail" style="max-width:160px;" >
                <td style="max-width:200px"><?php echo $a->content; ?></td>
                <td>
                  <div class="btn-group">
                  <button class="btn btn-default disabled"><?php echo ucfirst($a->status); ?></button>
                  <?php if($a->status=='pending'){ ?>
                    <button data-url="<?php echo base_url().'Admin/Status_Kritik_Saran' ?>?act=acc&id=<?php echo $a->id; ?>" class="konfirmasiJS btn btn-primary">Acc</button>
                    <button data-url="<?php echo base_url().'Admin/Status_Kritik_Saran' ?>?act=remove&id=<?php echo $a->id; ?>" class="konfirmasiJS btn btn-danger">Remove</button>
                  <?php } else{?>
                    <button data-url="<?php echo base_url().'Admin/Status_Kritik_Saran' ?>?act=remove&id=<?php echo $a->id; ?>" class="konfirmasiJS btn btn-danger">Remove</button>
                  <?php } ?>
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
