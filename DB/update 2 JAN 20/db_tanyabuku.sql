-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 07:35 AM
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
  `telepon_pelanggan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(2, 'aisyah123@gmail.com', '12345678', 'Aisyah Kusuma', '0815422575426'),
(3, 'pika123@gmail.com', '12345678', 'pika', '025855655511'),
(4, 'uus123@gmail.com', '123456', 'Fauziyah Pai', '081254745213'),
(5, 'tahaj@gmail.com', '12345678', 'tahajjudin', '082330044949'),
(6, 'farhan1@gmail.com', '123123123', 'farhan', '025456985201'),
(7, 'ismail123@gmail.com', '12345678', 'ismail', '085741546235');

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 2, 'Farhan', 'Bca', 98000, '2019-12-30', '20191230045954Screenshot_2019-04-06-10-41-00-129_src.com.bni.png'),
(2, 3, 'Ismail', 'MANDIRI', 84000, '2020-01-02', '20200102070701Screenshot_2019-04-06-10-41-00-129_src.com.bni.png');

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

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `nama_penerima`, `provinsi`, `kota`) VALUES
(1, 2, '2019-12-30', 80000, '50000', 'as', 'Menunggu Pembayaran', '', 'asa', 'Kalimantan Barat', 'Bengkayang'),
(2, 6, '2019-12-30', 98000, '18000', 'Jl. Trunojoyo no 28', 'Telah Melakukan Pembayaran', '', 'Farhan', 'Jawa Tengah', 'Banjarnegara'),
(3, 7, '2020-01-02', 84000, '7000', 'Jl.Trunojoyo No. 28', 'Telah Melakukan Pembayaran', '', 'Ismail', 'Jawa Timur', 'Bangkalan');

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
(43, 0, 10, 1, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, 210, 68000),
(44, 0, 11, 1, 'SINAU BARENG MARKESOT', 77000, 350, 350, 77000),
(45, 0, 43, 1, 'Merayakan Kehilangan', 196000, 200, 200, 196000),
(46, 0, 12, 1, 'Dari Allah Menuju Allah', 40000, 300, 300, 40000),
(47, 0, 12, 1, 'Dari Allah Menuju Allah', 40000, 300, 300, 40000),
(48, 0, 12, 12, 'Dari Allah Menuju Allah', 40000, 300, 3600, 480000),
(49, 0, 12, 1, 'Dari Allah Menuju Allah', 40000, 300, 300, 40000),
(50, 1, 14, 1, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, 250, 30000),
(51, 2, 12, 2, 'Dari Allah Menuju Allah', 40000, 300, 600, 80000),
(52, 3, 11, 1, 'SINAU BARENG MARKESOT', 77000, 350, 350, 77000);

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
(10, '1 Kos, 3 Cinta, 7 Keberuntungan', 68000, 210, '113718_f.jpg', ' 			 			Penulis : Astrid Tito	\r\nPenerbit : media Pustaka Utama \r\nTanggal terbit : Oktober - 2019\r\nBerat : 210 gr\r\nJenis Cover : Soft Cover\r\nKategori : Remaja\r\nText Bahasa :Indonesia Â·\r\n 		 		', 49, 'Pilih Status', 'Supplier', 0, 0, 0),
(11, 'SINAU BARENG MARKESOT', 77000, 350, '113835_f.jpg', ' 			 			 			Penulis : EMHA AINUN NADJIB	\r\nPenerbit : Mizan \r\nTanggal terbit : November - 2019\r\nJumlah Halaman : 364\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x20mm\r\nKategori : Sosial-Budaya\r\nBonus : Spesial Surat Syair Bertanda Tangan\r\nText Bahasa : Indonesia 		 		 		', 15, 'Novel', 'Supplier', 55000, 22000, 40),
(12, 'Dari Allah Menuju Allah', 40000, 300, '110535_f.jpg', ' 			 			Penulis : Haidar Bagir	\r\nPenerbit : Noura Book Publising \r\nTanggal terbit : Januari - 2019\r\nJumlah Halaman : 252\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 12x18mm\r\nKategori : Islam\r\nText Bahasa : Indonesia  		 		', 13, 'Novel', 'Supplier', 0, 0, 0),
(14, 'Komik Dari Twit-nya Raditya Dika', 30000, 250, '90421_f.jpg', ' 			\r\nPenulis : Raditya Dika	\r\nPenerbit : GagasMedia \r\nTanggal terbit : Februari - 2016\r\nJumlah Halaman : 140\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Komedi\r\nBonus : Edisi Tanda Tangan + Bonus USB LED Light\r\nText Bahasa : Indonesia\r\n 		', 14, 'Edukasi', 'Supplier', 0, 0, 0),
(15, 'Kita, Yang Sebatas Pernah', 47000, 300, '98934_f.jpg', ' 			Penulis : Penakecil_ID	\r\nPenerbit : TransMedia Pustaka \r\nTanggal terbit : Februari - 2017\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 13x19mm\r\nKategori : Romance\r\nText Bahasa : Indonesia Â·\r\n 		', 75, 'Programming', 'Supplier', 0, 0, 0),
(17, 'My Stupid Boss', 37000, 250, '103467_f.jpg', ' 			 			Penulis : Chaos@work feat Yuyunardi	\r\nPenerbit : Gradien Mediatama \r\nTanggal terbit : November - 2017\r\nJumlah Halaman : 204\r\nJenis Cover : Soft Cover\r\nDimensi(L x P) : 14x20mm\r\nKategori : Umum\r\nText Bahasa : Indonesia  		 		', 80, 'Desain', 'Supplier', 0, 0, 0),
(43, 'Merayakan Kehilangan', 196000, 200, 'merayakan.jpg', '', 35, 'Programming', 'Supplier', 140000, 56000, 40);

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
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
