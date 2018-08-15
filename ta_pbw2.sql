-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2017 at 12:46 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta_pbw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(30) NOT NULL DEFAULT '',
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `cuci`
--

CREATE TABLE IF NOT EXISTS `cuci` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jenis_cuci` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cuci`
--

INSERT INTO `cuci` (`id`, `jenis_cuci`, `harga`) VALUES
(1, 'manual', '50000'),
(2, 'foam', '15000'),
(3, 'pump', '25000'),
(4, 'steam', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `kd_pesan` varchar(5) NOT NULL,
  `no_ktp` int(16) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `layanan` varchar(30) DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `id_kar` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_kar` varchar(5) NOT NULL,
  `pass_kar` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` int(12) NOT NULL,
  PRIMARY KEY (`id_kar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kar`, `pass_kar`, `email`, `nama`, `alamat`, `no_hp`) VALUES
('K01', '12345', 'vera@gmail.com', 'vera fidiyanti', 'jl. kh. abd. hamid', 1234567890),
('K02', 'sanjaavi', '', 'sanja avi maulana', 'jl. jakarta', 987654321),
('K03', 'tririzki', '', 'tri riski herlambang', 'jl. semarang', 876548328),
('K04', 'triwidya', '', 'tri widya', 'jl. bogor', 26758196),
('K05', 'yudhaaja', '', 'yudha adenda j.a', 'jl. surabaya', 986745243);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `antrian` varchar(10) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `merk` varchar(10) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `jenis_cuci` varchar(20) DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `tgl_order` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `jenis_bayar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`antrian`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`antrian`, `email`, `merk`, `tipe`, `jenis_cuci`, `nopol`, `tgl_order`, `status`, `jenis_bayar`) VALUES
('A00006', 'sanja.avi@outlook.co', 'honda', 'sepeda', 'foam', '', '2017/11/25', 'belum', 'ditempat'),
('A00010', 'avi.sanja@gmail.com', 'hjkhjh', 'sepeda', 'pump', '08908798', '2017/11/25', 'selesai', 'credit card'),
('A00011', 'vera@gmail.com', 'kawasaki', 'sepeda', 'steam', '89098', '2017/11/25', 'selesai', 'credit card');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `no_ktp` int(16) NOT NULL,
  `pass_pel` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` int(12) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`no_ktp`, `pass_pel`, `username`, `email`, `notelp`) VALUES
(123, '123', 'vera', 'vera@gmail.com', 123),
(9808080, 'sanja', 'sanja96', 'avi.sanja@gmail.com', 2147483647),
(980808081, 'sanja', 'sanja', 'sanja.avi@outlook.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `antrian` varchar(10) NOT NULL,
  `jenis_kartu` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `no_kredit` varchar(20) DEFAULT NULL,
  `cvv` varchar(20) NOT NULL,
  `exp_date` date NOT NULL,
  `jumlah` int(30) NOT NULL,
  PRIMARY KEY (`antrian`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`antrian`, `jenis_kartu`, `email`, `no_kredit`, `cvv`, `exp_date`, `jumlah`) VALUES
('A00010', 'visa', 'avi.sanja@gmail.com', '9899809', '8097878', '2017-11-30', 25000),
('A00011', 'bri', 'sanja.avi@outlook.co', '98987', '9088677', '2017-11-29', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `tgl_order` date DEFAULT NULL,
  `idTransaksi` varchar(12) NOT NULL,
  PRIMARY KEY (`idTransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`tgl_order`, `idTransaksi`) VALUES
('2017-11-10', '2017/11/1000'),
('2017-11-10', '2017/11/1010'),
('2017-11-13', '2017/11/1300'),
('2017-11-13', '2017/11/1313'),
('2017-11-14', '2017/11/1400'),
('2017-11-14', '2017/11/1414'),
('2017-11-16', '2017/11/1600'),
('2017-11-21', '2017/11/2100'),
('2017-11-21', '2017/11/2121'),
('2017-11-22', '2017/11/2200'),
('2017-11-24', '2017/11/2400'),
('2017-11-25', '2017/11/2500'),
('2017-11-25', '2017/11/2525');
