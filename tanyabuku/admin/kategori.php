<h2>Kategori</h2>

<table class="table table-bordered">
  <thread>
    <tr> 
      <th>No</th>
      <th><center>Nama Kategori</center></th>  
      <th>Button</th>
    </tr>
  </thread>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_kategori']; ?></td>
      <td>
        <a href="index.php?halaman=hapuskategori&id=<?php echo $pecah['id_kategori']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya')" class="btn-danger btn">Hapus</a>
        <a href="index.php?halaman=ubahkategori&id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-warning">Ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>  
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>