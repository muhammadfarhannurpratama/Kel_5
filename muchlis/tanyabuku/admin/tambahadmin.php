<h2>Data Produk</h2>

<table class="table table-bordered">
  <thread>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Nama Lengkap</th>
    </tr>
  </thread>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['username']; ?></td>
      <td><?php echo $pecah['nama_lengkap']; ?></td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>  
</table>
<a href="index.php?halaman=tambahdataadmin" class="btn btn-primary">Tambah Pegawai</a>
<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['username']; ?>" class="btn-danger btn">Hapus</a>
<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['username']; ?>" class="btn btn-warning">Ubah</a>