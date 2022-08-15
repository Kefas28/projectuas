-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 01:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas_keluar`
--

CREATE TABLE `kas_keluar` (
  `no_ref` varchar(11) NOT NULL,
  `kd_kas` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `no_ref` varchar(11) NOT NULL,
  `kd_kas` varchar(10) NOT NULL,
  `kd_pj` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas`
--

CREATE TABLE `tbl_kas` (
  `kd_kas` varchar(15) NOT NULL,
  `nm_kas` varchar(40) NOT NULL,
  `saldo` int(11) NOT NULL,
  `pj` varchar(40) NOT NULL,
  `ket` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pj`
--

CREATE TABLE `tbl_pj` (
  `kd_pj` varchar(15) NOT NULL,
  `nm_pj` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `stts` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pj`
--

INSERT INTO `tbl_pj` (`kd_pj`, `nm_pj`, `alamat`, `nohp`, `stts`) VALUES
('PJ002', 'Ibu', 'KARANGMULYA', '08543323556', 'Ibu RT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_user` varchar(40) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_user`, `status`) VALUES
(1, 'admin', '12345', 'Kefas Zefanya', 'Administrator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
