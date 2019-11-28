<h2>Data Admin</h2>

<table class="table table-bordered">
  <thread>
    <tr> 
      <th>No</th>
      <th><center>Username</center></th>
      <th><center>Password</center></th>
      <th><center>Nama Lengkap</center></th>
     <th><center>Fitur</center></th>  
    </tr>
  </thread>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['username']; ?></td>
      <td><?php echo $pecah['password']; ?></td>
      <td><?php echo $pecah['nama_lengkap']; ?></td>
      <td>
        <a href="index.php?halaman=hapusadmin&id=<?php echo $pecah['id_admin']; ?>" class="btn-danger btn">Hapus</a>
        <a href="index.php?halaman=ubahadmin&id=<?php echo $pecah['id_admin']; ?>" class="btn btn-warning">Ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>  
</table>
<a href="index.php?halaman=tambahdataadmin" class="btn btn-primary">Tambah Pegawai</a>