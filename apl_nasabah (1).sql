-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 01:17 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apl_nasabah`
--
CREATE DATABASE IF NOT EXISTS `apl_nasabah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `apl_nasabah`;

-- --------------------------------------------------------

--
-- Table structure for table `datanasabah`
--

CREATE TABLE IF NOT EXISTS `datanasabah` (
  `id_nasabah` char(11) NOT NULL,
  `no_rekening` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_handphone` char(15) NOT NULL,
  PRIMARY KEY (`id_nasabah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datanasabah`
--

INSERT INTO `datanasabah` (`id_nasabah`, `no_rekening`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_handphone`) VALUES
('00', '2634890147', 'Nadia Siti Aisyah', 'Kuningan', '2023-08-14', 'P', 'Sagarahiang', '0894573890'),
('06', '1220187760', 'Nabila Hendriyani', 'Kuningan', '2023-06-12', 'P', 'Lebakkardin', '08387867840'),
('67', '3748393740', 'Nina Alia Rahma', 'Kuningan', '2023-08-12', 'P', 'Cikubangsari', '08463578901'),
('90', '7483921653', 'Nafa Rahmawati', 'Kuningan', '2023-11-22', 'P', 'Kalapa gunung', '08976543678');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
