-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 08:30 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linuxgeekers`
--
CREATE DATABASE `linuxgeekers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `linuxgeekers`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `password`, `email`) VALUES
('admin', 'Administrator', '1b3231655cebb7a1f783eddf27d254ca', 'admin@phantom.com'),
('alfian', 'Muh Alfiansyah', '64fc0802fbae681ee55a9a4b87f0aec7', 'alfian@gmail.com'),
('chandra', 'Anugerah Chandra', '1b3231655cebb7a1f783eddf27d254ca', 'anugerah.chandra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id_customer` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `kode_order` varchar(5) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `nama`, `email`, `tlp`, `provinsi`, `kota`, `alamat`, `kode_pos`, `kode_order`) VALUES
('C001', 'Indra Firmansyah', 'in_dra21@ymail.com', '085729968839', 'Jawa Tengah', 'kota', 'Trn', '57662', 'O001');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Ubuntu'),
(2, 'HLBX');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `kode_order` varchar(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_customer` varchar(5) NOT NULL,
  `id_payment` int(11) NOT NULL,
  PRIMARY KEY (`kode_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`kode_order`, `tanggal`, `id_customer`, `id_payment`) VALUES
('O001', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `kode_order` int(11) NOT NULL,
  `kode_produk` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `kode_order` varchar(5) NOT NULL,
  `total` int(11) NOT NULL,
  `rekening` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `kode_order`, `total`, `rekening`, `tanggal`, `status`) VALUES
(5, 'O001', 295000, 'BCA bla bla bla', '2012-06-19 14:39:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode_produk` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `time` datetime NOT NULL,
  `post` int(1) NOT NULL,
  PRIMARY KEY (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama`, `harga`, `stok`, `id_kategori`, `foto`, `deskripsi`, `time`, `post`) VALUES
('P0001', 'HLBX RAW', 100000, 2, 2, '4.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-06 23:20:05', 1),
('P0002', 'HLBX UNTOLD STORY', 95000, 0, 2, '12.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-06 23:47:06', 1),
('P0003', 'HLBX TRIUMPH', 100000, 1, 2, '14.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-06 23:49:30', 1),
('P0004', 'HLBX UNTOLD STORY BLUE', 95000, 3, 2, '19.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-07 09:17:09', 0),
('P0005', 'HLBX UNTOLD STORY BLUE', 90000, 5, 2, '19.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 17:56:36', 1),
('P0006', 'HLBX UNTOLD STORY GREY', 100000, 2, 2, '52.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 17:57:15', 1),
('P0007', 'HLBX UNTOLD STORY BROWN', 95000, 1, 2, '60.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 17:58:08', 1),
('P0008', 'HLBX TRIUMPH GREY', 100000, 3, 2, '81.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 17:58:50', 1),
('P0009', 'HLBX TRIUMPH GREY 2', 90000, 2, 2, '100.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 17:59:35', 1),
('P0010', 'HLBX BLUE BIRD', 100000, 1, 2, '116.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 18:00:17', 1),
('P0011', 'HLBX TRIUMPH RED', 85000, 6, 2, '132.jpg', '<p>- 100% cotton combed 30''s.</p>\r\n<p>- Available size: S, M, L, XL</p>', '2012-06-19 18:00:49', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
