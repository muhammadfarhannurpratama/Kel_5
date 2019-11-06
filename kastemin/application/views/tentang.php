<?php
include "header.php";
?>
<style>

</style>
<?php
if($tentang=="Carapemesanan"){?>
<div class='container content'>
			<center><h1 class='title'>Cara Pemesanan Di My Jersey
                                <hr style="border : 2px solid #337ccb;width : 80px;">

                </h1></center>
				<hr>
					<ul style='font-size:16'>
						<li>Yang pertama anda di perkenankan untuk login terlebih dahulu</li>
						<li>Namun jika anda belum memiliki akun, silahkan registrasi terlebih dahulu</li>
						<li>Isi semua form registrasi karena akan digunkan untuk data personal</li>
						<li>Setelah Registrasi anda akan bisa login</li>
						<li>Setelah login anda bisa memlih barang yang akan anda beli</li>
						<li>Lalu Klik barang yang kana dibeli akan masuk ke halaman detail barang</li>
						<li>Di halaman detail barang ini terdapat deskripsi barang barang, nama barang, harga barang, dll</li>
						<li>Anda dapat memilih ukuran yang telah tersedia dan dapat memilih jumlah kuantitas yang akan anda beli</li>
						<li>Setalah itu silahkan klik tombol add to cart, maka barang yang anda pesan tadi telah masuk ke keranjang belanja anda</li>
						<li>Setelah itu anda akan di alihkan ke halaman keranjang belanja</li>
						<li>Di halaman ini terdapat list barang yang telah anda beli tadi</li>
						<li>Jika suda selesai belanja anda bisa menekan tombol Checkout</li>
					</ul>
				<hr>
		</div>
<?php }
else{
	if($tentang=="Aturanpemesanan"){
?>
	<div class="container content">
		<center><h2 class='title'>Aturan Pemesanan Di My Jersey
                            <hr style="border : 2px solid #337ccb;width : 80px;">

            </h2></center>
			<hr>
				<ul style='font-size:16'>
					<li>Maaf, kami hanya melayani yang serius! 'time is more important than money'</li>
					<li>Barang akan dikirim apabila pembayaran selesai dilakukan(LUNAS)</li>
					<li>Pembayaran hanya melalui rekening BCA, BNI46 dan Master Card, pembayaran diluar itu bukan tanggung jawab kami</li>
					<li>Gudang kami berelokasi di Bondowoso Jawa Timur, sehingga pengiriman ke pulau jawa menjadi lebih cepat</li>
					<li>Pengiriman barang menggunakan JNE Reguler, barang akan dikirim selambat-lambatnya 5hari</li>
					<li>Apabila barang belum terkirim maka uang akan kami kembalikan 100%</li>
					<li>Nomor Resi Pengiriman akan kami infokan 1-2 hari setelah barang dikirim, karena Resi dari pihak JNE Reguler baru diinformasikan 1 hari setelah barang dikirim</li>
					<li>Saat ini kami tidak melayani COD (Cash On Delivery) karena keterbatasan SDM kami</li>
					<li>Ukuran kekecilan atau kebesaran tidak dapat di tukar, jadi teliti sebelum membeli itu hukumnya wajib</li>
					<li>Harga yang tertera sudah nett dan belum termasuk ongkos kirim</li>
				</ul>
			<hr>
	</div>
<?php
}
else{
?>
		<div class='container content' style='margin-top:6%'>
			<center><h1 class='title'>Metode Pembayaran Di My Jersey
                                <hr style="border : 2px solid #337ccb;width : 80px;">

                </h1></center>
				<hr>
					<ul style='font-size : 16'>
						<br>
						<li>Branch : <b>Bank Central Asia(BCA)</b>
						<br>
						Account Number : 1234567890
						<br>
						Account Holder : Abdul Sukimprit</li>
						<br>
						<li>Branch : <b>Bank Negara Indonesia 46(BNI46)</b>
						<br>
						Account Number : 0987654321
						<br>
						Account Holder : Abdul Sukimprit</li>
						<br>
						<li>Branch : <b>Bank Danamon</b>
						<br>
						Account Number : 5643215676
						<br>
						Account Holder : Abdul Sukimprit</li>
					</ul>
				<hr>
		</div>
<?php
}}

?>
<?php
include "footer.php";
?>
