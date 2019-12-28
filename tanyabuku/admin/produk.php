<h2>Data Produk</h2>

<div class="kotak">
<table class="table table-bordered">
	<thread>
		<tr>

			<center><th>No</th>
			<th>Judul</th>
			<th>Harga Jual</th>
			<th>Harga Beli</th>
			<th>Laba</th>
			<th>Berat</th>
			<th>Stok</th>
			<th>Foto</th>
			<th>Kategori Produk</th>
			<th>Pengadaan Barang</th>
			<th>Opsi</th>
			
		</tr>
	</thread>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_jual']; ?></td>
			<td><?php echo $pecah['harga_beli']; ?></td>
			<td><?php echo $pecah['laba']; ?></td>
			<td><?php echo $pecah['berat']; ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<?php echo $pecah['nama_kategori']; ?>
			</td>
			<td><?php echo $pecah['pengadaan_barang']; ?></td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" onclick="return confirm('Apakah Anda Yakin Menghapusnya')" class="btn-danger btn">Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>	
</table>
</div>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary tombol">Tambah Data</a>