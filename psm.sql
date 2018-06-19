-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 07:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psm`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nokenderaan` varchar(20) DEFAULT NULL,
  `tarikh_daftar` date DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `no_enjin` varchar(50) DEFAULT NULL,
  `no_chasis` varchar(50) DEFAULT NULL,
  `upload_link` varchar(250) DEFAULT NULL,
  `qr_code` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `id_user`, `nokenderaan`, `tarikh_daftar`, `model`, `no_enjin`, `no_chasis`, `upload_link`, `qr_code`, `status`) VALUES
(28, 102, 'W3425M', '2018-05-05', 'Myvi', '0156', '3512', 'upload/123-28.pdf', '09ac181eeb83ed1213da23632728df8e', '1'),
(29, 103, 'WWK1644', '2018-05-06', 'Camry', '123456789', '963258741', 'upload/DI150003-29.pdf', '37763d89067a1ca64056c31a6eca6c55', '1'),
(30, 104, 'ABC1234', '2018-05-15', 'Axia', '9871230', '1230789', 'upload/di123-30.pdf', 'a403084a99fcdc68c7fc2a2c031fb8db', '1'),
(31, 100, 'JHU1830', '2018-05-15', 'Kancil Turbo', '123456', '654321', 'upload/DI150020-31.pdf', '93791f70c2c0bc5fc237b7c4526e9486', '1'),
(32, 105, 'WTD4504', '2018-05-15', 'Viva', '123456789', '987654321', 'upload/DI150047-32.pdf', 'af6f4cf777a938e50fb99fb424a0340e', '1'),
(33, 1, 'XYZ987', '2018-05-16', 'Myvi', '987456', '123654', 'upload/Di150012-33.pdf', 'b9b8e20c86a8f32b6d0230d6af8614e1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `daftarsaman`
--

CREATE TABLE IF NOT EXISTS `daftarsaman` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  `id_saman` int(10) NOT NULL,
  `tarikh` date NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_saman` (`id_saman`),
  KEY `id_daftar` (`id_daftar`),
  KEY `daftarsaman_ibfk_3` (`id_lokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `daftarsaman`
--

INSERT INTO `daftarsaman` (`id`, `id_daftar`, `id_lokasi`, `id_saman`, `tarikh`, `status`) VALUES
(1, 26, 2, 1, '2018-05-04', '1'),
(2, 28, 2, 1, '2018-05-05', '1'),
(3, 29, 2, 1, '2018-05-06', '0'),
(4, 27, 2, 1, '2018-05-06', '0'),
(5, 27, 2, 1, '2018-05-06', '0'),
(6, 27, 2, 1, '2018-05-06', '0'),
(7, 30, 4, 3, '2018-05-15', '0'),
(8, 32, 3, 3, '2018-05-15', '0'),
(9, 32, 3, 3, '2018-05-15', '0'),
(10, 27, 3, 1, '2018-05-16', '0'),
(11, 33, 3, 1, '2018-05-16', '0'),
(12, 33, 2, 2, '2018-05-16', '0'),
(13, 33, 1, 3, '2018-05-16', '0'),
(14, 32, 2, 3, '2018-05-20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namalokasi` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `namalokasi`) VALUES
(1, 'Pejabat Pendaftar'),
(2, 'ATM UTHM'),
(3, 'Bangunan HEP UTHM'),
(4, 'Bangunan Pendaftar UTHM');

-- --------------------------------------------------------

--
-- Table structure for table `saman`
--

CREATE TABLE IF NOT EXISTS `saman` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kesalahan` varchar(250) NOT NULL,
  `kompaun` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `saman`
--

INSERT INTO `saman` (`id`, `kesalahan`, `kompaun`) VALUES
(1, 'Meletakkan Kenderaan Di Tempat Yang Salah', 30),
(2, 'Pemalsuan Pelekat Kenderaan', 100),
(3, 'Memandu Secara Bahaya', 50);

-- --------------------------------------------------------

--
-- Table structure for table `status_daftar`
--

CREATE TABLE IF NOT EXISTS `status_daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT NULL,
  `status_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status_daftar`
--

INSERT INTO `status_daftar` (`id`, `status_id`, `status_desc`) VALUES
(1, 0, 'Dalam Proses'),
(2, 1, 'Lulus'),
(3, -1, 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `status_saman`
--

CREATE TABLE IF NOT EXISTS `status_saman` (
  `id` int(11) NOT NULL,
  `status_desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_saman`
--

INSERT INTO `status_saman` (`id`, `status_desc`) VALUES
(0, 'Belum dijelaskan'),
(1, 'Sudah dijelaskan');

-- --------------------------------------------------------

--
-- Table structure for table `sys_user`
--

CREATE TABLE IF NOT EXISTS `sys_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `matrik` varchar(10) DEFAULT NULL,
  `ic` varchar(15) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `fakulti` varchar(250) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `sys_user`
--

INSERT INTO `sys_user` (`id`, `nama`, `matrik`, `ic`, `email`, `tahun`, `fakulti`, `jenis`) VALUES
(1, 'K. Karunakaran P. Kumarasamy', 'DI150012', '', 'muhdfaiqsudin@gmail.com', '2', 'FSKTM', 3),
(2, 'Hazali Mohd Noor', 'admin', 'admin', '', '-', '-', 1),
(4, 'Fairoze Binti Asha''Ri', 'pelajar', 'pelajar', '', '1', 'FSKTM', 3),
(5, 'Masarudin Bin Maspol', 'DI150033', 'DI150033', 'muin@gmail.com', '1', 'FSKTM', 1),
(7, 'Azmarul Bin Nordin', 'DI150011', 'DI150011', '', '-', '-', 1),
(100, 'Nur Afiqah Izzati Binti Kamal', 'DI150020', '950306015678', 'cikzati63@gmail.com', '3', 'FSKTM', 3),
(101, 'Nur Izzaty Binti Azni', 'DF140090', '941105145594', 'zatyazni@gmail.com', '4', 'FKAAS', 3),
(102, 'Farhain Sudin', '123', '890329105666', 'nadiatulfarhain@gmail.com', '6', 'FSKTM', 3),
(103, 'Ahmad Fauzan Bin Mohd Zamri', 'DI150003', '940206', 'dmz_fauzan@yahoo.com', '3', 'FSKTM', 3),
(104, 'Faiq', 'Di123', '123', 'muhdfaiqsudin@gmail.com', '3', 'FSKTM', 3),
(105, 'Nur Syazleen Bt Sazali', 'DI150047', '951127145252', 'syazleensazali@gmail.com', '3', 'FSKTM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sys_user_jenis`
--

CREATE TABLE IF NOT EXISTS `sys_user_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) DEFAULT NULL,
  `jenis_desc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sys_user_jenis`
--

INSERT INTO `sys_user_jenis` (`id`, `jenis`, `jenis_desc`) VALUES
(1, 1, 'Pentadbir'),
(2, 2, 'Staf'),
(3, 3, 'Pelajar');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `daftar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `sys_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
