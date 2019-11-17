-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2019 pada 14.30
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanyabuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '2014', 'Muhammad Muchlis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `password_pelanggan` varchar(15) NOT NULL,
  `nama_pelanggan` varchar(25) NOT NULL,
  `telepon_pelanggan` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'elmahdi869@yahoo.co.id', 'harun', 'harun muhammad', '081391761096'),
(2, 'farhan123@gmail.com', 'farhan', 'muhammad farhan', '082145745879');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, '2019-11-12', 300000),
(2, 1, '2019-11-13', 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `deskripsi_produk`) VALUES
(5, 'Islam yang disalahpahami', 80000, 300, 'islam.jpg', 'menepis kekeliruan'),
(7, 'Jika Kita Tak Pernah Jadi Apa-Apa', 88000, 300, '113836_f.jpg', 'Penulis :Alvi Syahrin	\r\nPenerbit :GagasMedia \r\nTanggal terbit : November - 2019\r\nJumlah Halaman : 248\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Romance\r\nBonus :Bonus Kalender\r\nText Bahasa : Indonesia Â·\r\n\r\n'),
(8, 'Kami (Bukan) Sarjana Kertas', 75000, 300, '111111_f.jpg', ' 			Penulis : J. S. Khairen	\r\nPenerbit : Bukune \r\nTanggal terbit : Maret - 2019\r\nJumlah Halaman : 372\r\nBerat : 300 gr\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 14x20mm\r\nKategori : Fiksi\r\nText Bahasa : Indonesia Â·\r\n 		'),
(9, 'PANDUAN RESMI TES SELEKSI CPNS ASN 2018-2019', 107000, 500, '105297_f.jpg', 'Penulis : Tim Smart Genesis	\r\nPenerbit : Genesis Learning \r\nTanggal terbit : Februari - 2018\r\nJumlah Halaman : 468\r\nBerat : 500 gr\r\nJenis Cover : Soft Cover\r\nKategori : Penunjang Pelajaran\r\nText Bahasa : Indonesia '),
(10, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, '113718_f.jpg', 'Penulis : Astrid Tito	\r\nPenerbit : media Pustaka Utama \r\nTanggal terbit : Oktober - 2019\r\nBerat : 210 gr\r\nJenis Cover : Soft Cover\r\nKategori : Remaja\r\nText Bahasa :Indonesia Â·\r\n'),
(11, 'SINAU BARENG MARKESOT', 85000, 350, '113835_f.jpg', 'Penulis : EMHA AINUN NADJIB	\r\nPenerbit : Mizan \r\nTanggal terbit : November - 2019\r\nJumlah Halaman : 364\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x20mm\r\nKategori : Sosial-Budaya\r\nBonus : Spesial Surat Syair Bertanda Tangan\r\nText Bahasa : Indonesia'),
(12, 'Dari Allah Menuju Allah', 40000, 300, '110535_f.jpg', 'Penulis : Haidar Bagir	\r\nPenerbit : Noura Book Publising \r\nTanggal terbit : Januari - 2019\r\nJumlah Halaman : 252\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 12x18mm\r\nKategori : Islam\r\nText Bahasa : Indonesia '),
(14, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, '90421_f.jpg', '\r\nPenulis : Raditya Dika	\r\nPenerbit : GagasMedia \r\nTanggal terbit : Februari - 2016\r\nJumlah Halaman : 140\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Komedi\r\nBonus : Edisi Tanda Tangan + Bonus USB LED Light\r\nText Bahasa : Indonesia\r\n'),
(15, 'Kita, Yang Sebatas Pernah', 47000, 300, '98934_f.jpg', 'Penulis : Penakecil_ID	\r\nPenerbit : TransMedia Pustaka \r\nTanggal terbit : Februari - 2017\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Romance\r\nText Bahasa : Indonesia Â·\r\n'),
(16, 'Catatan Najwa', 85000, 200, '97424_f.jpg', 'Penulis : Najwa Shihab	\r\nPenerbit : Literati-books \r\nTanggal terbit : November - 2016\r\nJumlah Halaman : 208\r\nJenis Cover : Soft Cover\r\nKategori : Biografi\r\nText Bahasa : Indonesia\r\n'),
(17, '', 37000, 250, '103467_f.jpg', 'Penulis : Chaos@work feat Yuyunardi	\r\nPenerbit : Gradien Mediatama \r\nTanggal terbit : November - 2017\r\nJumlah Halaman : 204\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 14x20mm\r\nKategori : Umum\r\nText Bahasa : Indonesia '),
(18, 'Home Cooking', 97000, 250, '107287_f.jpg', 'Penulis : ENDANG INDRIANI	\r\nPenerbit : KawanPustaka \r\nTanggal terbit : Mei - 2018\r\nJumlah Halaman : 128\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 18x24mm\r\nKategori : Resep Masakan\r\nText Bahasa : Indonesia Â·\r\n'),
(19, 'Catatan Akhir Kuliah 1', 44000, 500, '71849_f.jpg', 'Penulis : Sam @skripsit	\r\nPenerbit : Bentang Belia \r\nTanggal terbit : Januari - 2014\r\nJumlah Halaman : 252\r\nJenis Cover : Soft Cover\r\nKategori : Referensi Umum\r\nText Bahasa : Indonesia\r\n'),
(20, 'Filosofi Kop', 60000, 200, '49714_f.jpg', 'Penulis : Dee Lestari	\r\nPenerbit : Bentang Pustaka \r\nTanggal terbit : Januari - 2012\r\nJumlah Halaman : 152\r\nJenis Cover : Soft Cover\r\nKategori : Filosofi\r\nText Bahasa : Indonesia Â·\r\n'),
(21, 'The Power of Ideas', 73000, 350, '112300_f.jpg', '\r\nPenulis : A. Makmur Makka	\r\nPenerbit : Republika \r\nTanggal terbit : 2018\r\nJenis Cover : Soft Cover\r\nKategori : Pengembangan Diri\r\nText Bahasa : Indonesia Â·\r\n'),
(22, '', 98000, 300, '106647_f.jpg', '\r\nPenulis : Wirda Mansur	\r\nPenerbit : Katadepan \r\nTanggal terbit : Mei - 2018\r\nJumlah Halaman : 282\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Islam\r\nText Bahasa : Indonesia\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
