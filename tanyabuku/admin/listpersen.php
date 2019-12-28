<h2>Data Pesen</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Persen Laba</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM persen_laba"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['persen']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspersen&id=<?php echo $pecah['no']; ?>" class="btn-danger btn">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>