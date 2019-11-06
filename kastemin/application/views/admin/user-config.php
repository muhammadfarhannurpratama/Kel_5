<?php
  include "sidebar.php";
?>

  <div id="container" style="background:white">
    <?php
    if(isset($_GET['msg']))
    {
     ?>
     <div class="row">
       <div class="col-md-5">
         <div class="alert alert-success">
           Status Berhasil Diubah!
         </div>
       </div>
     </div>
     <?php } else{} ?>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Foto</td>
            <td>Status</td>
          </tr>
        </thead>

        <tbody>
            <?php
            $no = 0;
            foreach ($alluser as $a)
            {
              $no++;
            ?>
            <tr>
            <td><?php echo $no;  ?></td>

            <td><?php echo ucwords($a->namadpn." ".$a->namablkng); ?></td>

            <td><?php echo $a->email; ?></td>

            <td><img src="<?php echo base_url().'profil/'.$a->foto; ?>" class="img-responsive img-rounded thumbnail" style="max-width:180"></td>
            <td>
              <div class="btn-group">
            <?php
              if($a->status=='aktif')
              {
            ?>
            <button class="btn btn-default disabled"><?php echo ucfirst($a->status); ?></button>

            <?php } else{?>

              <button class="btn btn-warning disabled"><?php echo ucfirst($a->status); ?></button>

            <?php } ?>
              <?php
              if($a->status=='aktif')
              {
                ?>

            <button data-url="<?php echo base_url().'Admin/User_Status/'.urlencode($a->email)."?act=banned"; ?>" class="konfirmasiJS btn btn-warning">Banned</button>

            <?php }
            else{?>

            <button data-url="<?php echo base_url().'Admin/User_Status/'.urlencode($a->email)."?act=aktif"; ?>" class="konfirmasiJS btn btn-default">Aktifkan</button>

            <?php } ?>

            <button data-url="<?php echo base_url().'Admin/User_Status/'.urlencode($a->email)."?act=drop"; ?>" class="konfirmasiJS  btn btn-danger">Drop</button></a>

            </td>
          </div>

            <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
 <?php
  include "footer.php";
  include "slash-sidebar.php";
?>
