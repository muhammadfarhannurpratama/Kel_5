<h2>Kategori</h2>

<table class="table table-bordered">
  <thread>
    <tr> 
      <th>No</th>
      <th><center>Nama Kategori</center></th>  
    </tr>
  </thread>
  <tbody>
    <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $pecah['nama_kategori']; ?></td>
      <td>
        <a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn-danger btn">Hapus</a>
        <a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning">Ubah</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>  
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>