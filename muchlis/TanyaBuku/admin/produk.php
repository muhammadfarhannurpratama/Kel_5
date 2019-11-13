<h2>Data Produk</h2>

<table class="table table-bordered">
	<thread>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Foto</th>
			<th>Button</th>
		</tr>
	</thread>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['berat']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
				<a href="" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>	
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>