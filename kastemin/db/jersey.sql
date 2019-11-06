-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2019 pada 17.55
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jersey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(9, 'jakfar', '16a4c4e9b7c54d1d4f726f58ad30c53b', 2),
(11, 'Admin', 'd01ef2e6392007f58996457348d98db6', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `berat` float NOT NULL,
  `kat` varchar(50) NOT NULL,
  `subkat` varchar(50) NOT NULL,
  `tipe` text NOT NULL,
  `m` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `xl` int(11) NOT NULL,
  `xxl` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `seller` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `berat`, `kat`, `subkat`, `tipe`, `m`, `l`, `xl`, `xxl`, `jumlah`, `harga`, `deskripsi`, `foto`, `seller`, `view`, `url`) VALUES
(44, 'Gladiator Junior', 0.5, 'Junior u12', 'Gladiator u12', 'Lengan Pendek', 0, 0, 2, 2, 4, 25000, 'Tentunya kainnya sangat bagus terubuat dari Kain kafan pilihan bebas bergerak  dan elastis', 'siQLw-IMG-20190520-WA0008.jpg', 0, 8, 'Gladiator-Junior-XfGh3WdxoCS1NbiD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `url_barang` varchar(225) NOT NULL,
  `berat` float NOT NULL,
  `foto` varchar(225) NOT NULL,
  `barang` varchar(200) NOT NULL,
  `ukuran` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis_kain` varchar(7) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `email`, `url_barang`, `berat`, `foto`, `barang`, `ukuran`, `jumlah`, `jenis_kain`, `catatan`, `harga`, `tanggal`) VALUES
(1, 'banggauciha@gmail.com', '', 1.6, 'IMG-20190520-WA0009.jpg', '', 'X', 8, 'Bagus', 'butuh secepatnya', 560000, '0000-00-00'),
(2, 'banggauciha@gmail.com', 'Gladiator-Junior-XfGh3WdxoCS1NbiD', 0.5, 'siQLw-IMG-20190520-WA0008.jpg', 'Gladiator Junior', 'l', 1, '', '', 25000, '2019-06-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kat`) VALUES
(1, 'Junior u12'),
(2, 'Junior u18'),
(3, 'Junior u20\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_barang` varchar(225) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `komen` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE IF NOT EXISTS `kritik_saran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `content` varchar(225) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `startup`
--

CREATE TABLE IF NOT EXISTS `startup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `startup`
--

INSERT INTO `startup` (`id`, `banner`, `title`, `description`) VALUES
(1, '059782+584179+che.png', 'My Jersey', 'Pusat Toko Onlen Jersey. Kami Menyediakan Jersey Dengan Kualitas Terbaik Dengan Harga Yang Terjamin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori`
--

CREATE TABLE IF NOT EXISTS `subkategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat` varchar(100) NOT NULL,
  `subkat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `subkategori`
--

INSERT INTO `subkategori` (`id`, `kat`, `subkat`) VALUES
(1, 'Junior u12', 'Samudra u12'),
(2, 'Junior u12', 'Gladiator u12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suka`
--

CREATE TABLE IF NOT EXISTS `suka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `likers` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=231 ;

--
-- Dumping data untuk tabel `suka`
--

INSERT INTO `suka` (`id`, `id_barang`, `banyak`, `likers`) VALUES
(19, 76, 1, 'davidsetya24@gmail.com'),
(42, 83, 1, ''),
(43, 83, 1, ''),
(48, 83, 1, ''),
(49, 83, 1, ''),
(50, 83, 1, ''),
(51, 83, 1, ''),
(52, 83, 1, ''),
(53, 83, 1, ''),
(54, 83, 1, ''),
(55, 83, 1, ''),
(56, 83, 1, ''),
(57, 83, 1, ''),
(58, 83, 1, ''),
(59, 83, 1, ''),
(101, 83, 1, 'davidsetya24@gmail.com'),
(102, 83, 1, 'indah@gmail.com'),
(155, 15, 1, 'davidsetya24@gmail.com'),
(179, 10, 1, 'davidsetya24@gmail.com'),
(180, 22, 1, 'davidsetya24@gmail.com'),
(183, 24, 1, 'davidsetya24@gmail.com'),
(185, 25, 1, 'davidsetya24@gmail.com'),
(186, 26, 1, 'davidsetya24@gmail.com'),
(188, 17, 1, 'davidsetya24@gmail.com'),
(191, 23, 1, 'davidsetya24@gmail.com'),
(192, 18, 1, 'davidsetya24@gmail.com'),
(193, 27, 1, 'davidsetya24@gmail.com'),
(194, 31, 1, 'davidsetya24@gmail.com'),
(206, 27, 1, 'inant@gmail.com'),
(207, 27, 1, 'tolekids35@gmail.com'),
(208, 26, 1, 'tolekids35@gmail.com'),
(209, 25, 1, 'tolekids35@gmail.com'),
(210, 22, 1, 'tolekids35@gmail.com'),
(211, 23, 1, 'tolekids35@gmail.com'),
(212, 24, 1, 'tolekids35@gmail.com'),
(213, 20, 1, 'tolekids35@gmail.com'),
(215, 27, 1, 'owen@gmail.com'),
(218, 33, 1, 'davidsetya24@gmail.com'),
(219, 33, 1, 'lukman@gmail.com'),
(220, 6, 1, 'lukman@gmail.com'),
(221, 5, 1, 'lukman@gmail.com'),
(223, 42, 1, 'riski@yahoo.com'),
(224, 27, 1, 'riski@yahoo.com'),
(225, 26, 1, 'riski@yahoo.com'),
(226, 32, 1, 'davidsetya24@gmail.com'),
(229, 42, 1, 'davidsetya24@gmail.com'),
(230, 44, 1, 'rifai_gaul@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_city`
--

CREATE TABLE IF NOT EXISTS `tb_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `ongkir` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `tb_city`
--

INSERT INTO `tb_city` (`id`, `province`, `city`, `ongkir`) VALUES
(3, 'Jawa Timur', 'Surabaya', 20000),
(4, 'Jawa Timur', 'Malang', 18000),
(7, 'Jawa Timur', 'Bondowoso', 25000),
(8, 'Nanggro Aceh Darussalam', 'Aceh Barat', 40000),
(9, 'Nanggro Aceh Darussalam', 'Aceh Selatan', 40000),
(10, 'Nanggro Aceh Darussalam', 'Aceh Tengah', 40000),
(11, 'Nanggro Aceh Darussalam', 'Aceh Tenggara', 40000),
(12, 'Nanggro Aceh Darussalam', 'Aceh Timur', 40000),
(13, 'Nanggro Aceh Darussalam', 'Aceh Utara', 40000),
(14, 'Nanggro Aceh Darussalam', 'Langsa', 41000),
(15, 'Nanggro Aceh Darussalam', 'Lhokseumawe', 43000),
(16, 'Nanggro Aceh Darussalam', 'Sabang', 50000),
(17, 'Nanggro Aceh Darussalam', 'Subulussalam', 40000),
(18, 'Sumatera Utara', 'Deli Serdang', 39000),
(19, 'Sumatera Utara', 'Medan', 38000),
(20, 'Sumatera Utara', 'Tanjung Balai', 38000),
(22, 'Sumatera Utara', 'Manado', 30000),
(23, 'Sumatera Barat', 'Bukit Tinggi', 25000),
(24, 'Sumatera Barat', 'Padang', 35000),
(25, 'Sumatera Selatan', 'Palembang', 30000),
(26, 'Jawa Tengah', 'Solo', 20000),
(27, 'Jawa Tengah', 'Semarang', 20000),
(28, 'Jawa Barat', 'Bandung', 25000),
(29, 'Jawa Barat', 'Bogor', 25000),
(30, 'Jawa Barat', 'Bekasi', 25000),
(31, 'Provinsiaja', 'kota mati', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_province`
--

CREATE TABLE IF NOT EXISTS `tb_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `tb_province`
--

INSERT INTO `tb_province` (`id`, `province`) VALUES
(1, 'Jawa Timur'),
(2, 'Jawa Barat'),
(6, 'Jawa Tengah'),
(7, 'Nanggro Aceh Darussalam'),
(8, 'Sumatera Utara'),
(9, 'Sumatera Barat'),
(10, 'Riau'),
(11, 'Kepulauan Riau'),
(12, 'Jambi'),
(13, 'Sumatera Selatan'),
(14, 'Bangka Belitung'),
(15, 'Bengkulu'),
(16, 'Lampung'),
(17, 'DKI'),
(18, 'Banten'),
(19, 'Daerah Istimewa Yogyakarta'),
(20, 'Bali'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Kalimantan Barat'),
(24, 'Kalimantan Tengah'),
(25, 'Kalimantan Selatan'),
(26, 'Kalimantan Timur'),
(27, 'Kalimantan Utara'),
(28, 'Sulawesi Utara'),
(29, 'Sulawesi Barat'),
(30, 'Sulawesi Tengah'),
(31, 'Sulawesi Tenggara'),
(32, 'Sulawesi Selatan'),
(33, 'Gorontalo'),
(34, 'Maluku'),
(35, 'Maluku Utara'),
(36, 'Papua Barat'),
(37, 'Papua'),
(38, 'Provinsiaja'),
(39, 'Provinsiaja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `email`, `total`, `kode`, `status`) VALUES
(3, 'bangga@gmail.com', 905620000, '29167803', 'terkirim'),
(4, 'rifai_gaul@gmail.com', 73000, '51280934', 'terkirim'),
(5, 'banggauciha@gmail.com', 82000, '50867931', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `namadpn` varchar(55) NOT NULL,
  `namablkng` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `jk` text NOT NULL,
  `no_hp` varchar(55) NOT NULL,
  `province` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `kode_pos` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `namadpn`, `namablkng`, `pass`, `jk`, `no_hp`, `province`, `city`, `kode_pos`, `alamat`, `foto`, `status`) VALUES
(1, 'gedukkk@gmail.com', 'geduk', 'new', 'gedukk123', 'Laki Laki', '0873821738', 'Jawa Timur', 'Bondowoso', '68281', 'disah kajer', 'default.jpg', 'aktif'),
(2, 'bangga@gmail.com', 'bangga', 'aditya', 'bangga123', 'Laki Laki', '08783271837', 'Jawa Timur', 'Bondowoso', '68281', 'disah Kajer', 'default.jpg', 'aktif'),
(3, 'rifai_gaul@gmail.com', 'Abdul', 'Rifai', 'Rifai123', 'Laki Laki', '0878512312', 'Jawa Timur', 'Malang', '68712', 'Desa Hokage Kota Mati jalan raya no 19', 'default.jpg', 'aktif'),
(4, 'banggauciha@gmail.com', 'bangga', 'uciha', 'bangga123', 'Perempuan', '087827381273', 'Jawa Timur', 'Bondowoso', '68281', 'jalan NInja no 19 desa konohagakure', 'default.jpg', 'aktif'),
(5, 'bangga@gmail.com', 'cihh', 'xl', 'biasa', 'laki', '0872781323', 'jawa timur', 'bondowoso', '68281', 'bws', 'default.jpg', 'aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
