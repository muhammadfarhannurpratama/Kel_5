-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 03:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '2014', 'Haroen Mohammed'),
(3, 'admin1@gmail.co', '2020', 'agung'),
(4, 'farhan@gmail.co', '2020', 'Muhammad Farhan'),
(5, 'uus@gmail.com', '1234', 'uus males');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Desain'),
(2, 'Programming'),
(3, 'Edukasi'),
(4, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `password_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(13) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(2, 'aisyah123@gmail.com', '12345678', 'Aisyah Kusuma', '0815422575426', 'Jl. ku sama jalanmu sama aja'),
(3, 'pika123@gmail.com', '12345678', 'pika', '025855655511', 'jl. asdasd'),
(4, 'uus123@gmail.com', '123456', 'Fauziyah Pai', '081254745213', 'Jl. Tamanan No.28 16/06 Bondowoso'),
(5, 'tahaj@gmail.com', '12345678', 'tahajjudin', '082330044949', 'nanannanamma  ananama annamamam');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `tarif` varchar(9) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Menunggu Pembayaran',
  `resi_pengiriman` varchar(30) NOT NULL,
  `nama_penerima` varchar(25) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 10, 5, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, 1050, 340000),
(2, 2, 8, 1, 'Kami (Bukan) Sarjana Kertas', 75000, 300, 300, 75000),
(3, 2, 15, 5, 'Kita, Yang Sebatas Pernah', 47000, 300, 1500, 235000),
(4, 3, 5, 3, 'Islam yang disalahpahami', 80000, 300, 900, 240000),
(5, 4, 15, 2, 'Kita, Yang Sebatas Pernah', 47000, 300, 600, 94000),
(6, 5, 10, 3, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, 630, 204000),
(7, 6, 11, 1, 'SINAU BARENG MARKESOT', 85000, 350, 350, 85000),
(8, 6, 17, 2, 'My Stupid Boss', 37000, 250, 500, 74000),
(9, 7, 17, 1, 'My Stupid Boss', 37000, 250, 250, 37000),
(10, 9, 10, 1, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, 210, 68000),
(11, 12, 22, 2, 'Merayakan kehilangan', 120000, 300, 600, 240000),
(12, 13, 10, 1, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, 210, 68000),
(13, 0, 17, 11, 'My Stupid Boss', 0, 250, 2750, 0),
(14, 0, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(15, 0, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(16, 0, 10, 1, '1 Kos, 3 Cinta, 7 Keberuntungan', 0, 210, 210, 0),
(17, 14, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(18, 14, 10, 1, '1 Kos, 3 Cinta, 7 Keberuntungan', 0, 210, 210, 0),
(19, 15, 39, 1, 'roxy', 0, 250, 250, 0),
(20, 15, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(21, 16, 14, 1, 'Komik Dari Twit-nya Raditya Dika', 0, 250, 250, 0),
(22, 17, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(23, 18, 14, 1, 'Komik Dari Twit-nya Raditya Dika', 0, 250, 250, 0),
(24, 19, 11, 1, 'SINAU BARENG MARKESOT', 0, 350, 350, 0),
(25, 20, 8, 1, 'Kami (Bukan) Sarjana Kertas', 0, 300, 300, 0),
(26, 21, 43, 1, 'Pasti Untung', 0, 200, 200, 0),
(27, 22, 12, 2, 'Dari Allah Menuju Allah', 40000, 300, 600, 80000),
(28, 23, 12, 1, 'Dari Allah Menuju Allah', 40000, 300, 300, 40000),
(29, 24, 15, 1, 'Kita, Yang Sebatas Pernah', 47000, 300, 300, 47000),
(30, 25, 11, 1, 'SINAU BARENG MARKESOT', 77000, 350, 350, 77000),
(31, 26, 14, 1, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, 250, 30000),
(32, 27, 43, 1, 'Pasti Untung', 196000, 200, 200, 196000),
(33, 28, 43, 1, 'Pasti Untung', 196000, 200, 200, 196000),
(34, 29, 43, 2, 'Pasti Untung', 196000, 200, 400, 392000),
(35, 30, 43, 1, 'Pasti Untung', 196000, 200, 200, 196000),
(36, 31, 12, 6, 'Dari Allah Menuju Allah', 40000, 300, 1800, 240000),
(37, 32, 43, 1, 'Pasti Untung', 196000, 200, 200, 196000),
(38, 33, 43, 1, 'Pasti Untung', 196000, 200, 200, 196000),
(39, 34, 14, 1, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, 250, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `persen_laba`
--

CREATE TABLE `persen_laba` (
  `no` int(11) NOT NULL,
  `persen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persen_laba`
--

INSERT INTO `persen_laba` (`no`, `persen`) VALUES
(41, 20);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(80) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(3) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `pengadaan_barang` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `persen_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_jual`, `berat`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `nama_kategori`, `pengadaan_barang`, `harga_beli`, `laba`, `persen_produk`) VALUES
(8, 'Kami (Bukan) Sarjana Kertas', 196000, 300, '111111_f.jpg', ' 			 			 			 			 			 			 			 			 			Penulis : J. S. Khairen	\r\nPenerbit : Bukune \r\nTanggal terbit : Maret - 2019\r\nJumlah Halaman : 372\r\nBerat : 300 gr\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 14x20mm\r\nKategori : Fiksi\r\nText Bahasa : Indonesia Â·\r\n 		 		 		 		 		 		 		 		 		', 100, 'Desain', 'Supplier', 140000, 56000, 40),
(10, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, '113718_f.jpg', ' 			 			Penulis : Astrid Tito	\r\nPenerbit : media Pustaka Utama \r\nTanggal terbit : Oktober - 2019\r\nBerat : 210 gr\r\nJenis Cover : Soft Cover\r\nKategori : Remaja\r\nText Bahasa :Indonesia Â·\r\n 		 		', 50, 'Pilih Status', 'Supplier', 0, 0, 0),
(11, 'SINAU BARENG MARKESOT', 77000, 350, '113835_f.jpg', ' 			 			 			Penulis : EMHA AINUN NADJIB	\r\nPenerbit : Mizan \r\nTanggal terbit : November - 2019\r\nJumlah Halaman : 364\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x20mm\r\nKategori : Sosial-Budaya\r\nBonus : Spesial Surat Syair Bertanda Tangan\r\nText Bahasa : Indonesia 		 		 		', 20, 'Novel', 'Supplier', 55000, 22000, 40),
(12, 'Dari Allah Menuju Allah', 40000, 300, '110535_f.jpg', ' 			 			Penulis : Haidar Bagir	\r\nPenerbit : Noura Book Publising \r\nTanggal terbit : Januari - 2019\r\nJumlah Halaman : 252\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 12x18mm\r\nKategori : Islam\r\nText Bahasa : Indonesia  		 		', 30, 'Novel', 'Supplier', 0, 0, 0),
(14, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, '90421_f.jpg', ' 			\r\nPenulis : Raditya Dika	\r\nPenerbit : GagasMedia \r\nTanggal terbit : Februari - 2016\r\nJumlah Halaman : 140\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Komedi\r\nBonus : Edisi Tanda Tangan + Bonus USB LED Light\r\nText Bahasa : Indonesia\r\n 		', 15, 'Edukasi', 'Supplier', 0, 0, 0),
(15, 'Kita, Yang Sebatas Pernah', 47000, 300, '98934_f.jpg', ' 			Penulis : Penakecil_ID	\r\nPenerbit : TransMedia Pustaka \r\nTanggal terbit : Februari - 2017\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Romance\r\nText Bahasa : Indonesia Â·\r\n 		', 75, 'Programming', 'Supplier', 0, 0, 0),
(17, 'My Stupid Boss', 37000, 250, '103467_f.jpg', ' 			 			Penulis : Chaos@work feat Yuyunardi	\r\nPenerbit : Gradien Mediatama \r\nTanggal terbit : November - 2017\r\nJumlah Halaman : 204\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 14x20mm\r\nKategori : Umum\r\nText Bahasa : Indonesia  		 		', 80, 'Desain', 'Supplier', 0, 0, 0),
(43, 'Merayakan Kehilangan', 196000, 200, 'merayakan.jpg', '', 37, 'Programming', 'Supplier', 140000, 56000, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `persen_laba`
--
ALTER TABLE `persen_laba`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `persen_laba`
--
ALTER TABLE `persen_laba`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
