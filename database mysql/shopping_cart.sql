-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 19 Sep 2014 pada 04.36
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(59) NOT NULL,
  `img` varchar(201) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_barang` varchar(21) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `stok` varchar(5) NOT NULL,
  `pembaharuan` datetime NOT NULL,
  `status` enum('Public','Draf') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `img`, `deskripsi`, `kode_barang`, `harga`, `stok`, `pembaharuan`, `status`) VALUES
(1, 'baju', 'f2ef0-amazon.jpg', '<p>\r\n	Baju Amazon club</p>\r\n', '12345', '50000', '5', '2014-09-10 02:09:56', 'Public'),
(2, 'Baju Kaos', '104f7-2.jpg', '<p>\r\n	Baju Apple Step Jobs</p>\r\n', '23456', '6000', '9', '2014-09-10 02:11:26', 'Public'),
(3, 'Baju seo', 'a273d-seo.png', '<p>\r\n	Baju untuk seo club</p>\r\n', '13456', '40000', '7', '2014-09-10 02:15:30', 'Public');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pesanan` varchar(9) NOT NULL,
  `qty` int(11) NOT NULL,
  `produk` varchar(201) NOT NULL,
  `hrg_satuan` varchar(16) NOT NULL,
  `tgl` datetime NOT NULL,
  `status` enum('Konfirmasi','Selesai','Baru','Batal','Sedang Dikirim') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `kode_pesanan`, `qty`, `produk`, `hrg_satuan`, `tgl`, `status`) VALUES
(1, '2730', 12, 'Baju Kaos', '6000', '2014-09-11 09:31:40', 'Sedang Dikirim'),
(2, '9910', 3, 'Baju seo', '40000', '2014-09-11 09:31:40', 'Batal'),
(3, '7918', 1, 'baju', '50000', '2014-09-11 09:31:40', 'Batal'),
(4, '6552', 1, 'baju', '50000', '2014-09-11 10:40:59', 'Selesai'),
(5, '2381', 1, 'Baju Kaos', '6000', '2014-09-11 10:40:59', 'Sedang Dikirim'),
(6, '4478', 1, 'Baju seo', '40000', '2014-09-11 10:40:59', 'Sedang Dikirim'),
(7, '6639', 1, 'baju', '50000', '2014-09-11 10:42:04', 'Selesai'),
(8, '8580', 1, 'Baju Kaos', '6000', '2014-09-11 10:42:04', 'Konfirmasi'),
(9, '2517', 1, 'Baju seo', '40000', '2014-09-11 10:42:04', 'Batal'),
(10, '1846', 1, 'baju', '50000', '2014-09-13 07:48:19', 'Baru'),
(11, '9950', 1, 'Baju Kaos', '6000', '2014-09-13 07:48:19', 'Baru'),
(12, '6941', 1, 'baju', '50000', '2014-09-19 04:35:02', 'Baru'),
(13, '451', 1, 'Baju Kaos', '6000', '2014-09-19 04:35:02', 'Baru'),
(14, '7241', 1, 'Baju seo', '40000', '2014-09-19 04:35:02', 'Baru');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
