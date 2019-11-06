<?php
if(empty($this->sess['email'])){
    redirect(base_url());
}
else{
?>

<?php
include "header.php";
?>
    <div class='container content'>
      <?php
        if(isset($_GET['msg']) && $_GET['msg']=='success')
        {
       ?>
       <div class="row">
         <div class="col-md-3 col-md-offset-1">
           <div class="alert alert-success">Data Berhasil Di Perbarui
             <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
           </div>
         </div>
       </div>
       <?php } ?>
         <div class='row'>
            <div class='col-md-3 col-md-offset-1'>
                <div class="thumbnail  img-rounded profil">
                  <img src='<?php echo base_url(); ?>profil/<?php echo $user[0]->foto; ?>' class="img-responsive">
                  <div class="edit">
                    <a href="" data-toggle="modal" data-target="#profil"><img src="<?php echo base_url().'image/search.png'; ?>"></a>
                    <a href="<?php echo base_url().'Profile/Update' ?>" class="link-edit">Perbarui Data Diri Anda</a>
                  </div>

                </div>
          </div>

            <div class='col-md-7'>
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <tr>
                            <td>Nama Depan</td>
                            <td>:</td>
                            <td><?php echo ucfirst($user[0]->namadpn); ?></td>
                        </tr>

                        <tr>
                            <td>Nama Belakang</td>
                            <td>:</td>
                            <td><?php echo ucfirst($user[0]->namablkng); ?></td>
                        </tr>

                        <tr>
                            <td>Alamat E-mail</td>
                            <td>:</td>
                            <td><?php echo $user[0]->email; ?></td>
                        </tr>

                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo $user[0]->jk; ?></td>
                        </tr>

                        <tr>
                            <td>Nomor Handphone</td>
                            <td>:</td>
                            <td><?php echo $user[0]->no_hp; ?></td>
                        </tr>

                        <tr>
                            <td>Kode Pos</td>
                            <td>:</td>
                            <td><?php echo $user[0]->kode_pos; ?></td>
                        </tr>

                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>:</td>
                            <td><?php echo $user[0]->alamat; ?></td>
                        </tr>


                    </table>
                </div>
            </div>
    </div>
    <br>
    <center><a href="<?php echo base_url(); ?>"><button class="btnlogin" style="padding:13;text-transform:uppercase;word-spacing:3;letter-spacing:1"> Kembali Ke Beranda <span class="glyphicon glyphicon-home"></span></button></a></center>
    </div>

    <div class="modal fade" id="profil">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <button class="close" data-dismiss="modal">&times;</button>
            <img src="<?php echo base_url().'profil/'.$user[0]->foto;?>" class="img-responsive img-rounded thumbnail" style="max-height:385px;margin:auto">
            <form action="<?php echo base_url().'Profile/Update_Profil'; ?>" method="post" enctype="multipart/form-data">
              <label>Perbarui Profil</label>
              <br>
              <input type="file" class="btn btn-default" name="foto" style="display:inline" required>
              <button type="submit" class="btn btn-default">Perbarui</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php
include "footer.php";
}
?>
