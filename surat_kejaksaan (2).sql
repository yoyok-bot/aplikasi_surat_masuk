-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 02:55 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_kejaksaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(5) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `diteruskan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `tanggal_surat`, `no_surat`, `asal_surat`, `perihal`, `diteruskan_ke`) VALUES
(20, '2019-08-06', 'fsdf', 'sdfsdf', 'fsdf', 'Bapak Kajari'),
(21, '2019-08-07', '876876', 'hgbhjgb', 'hjbjhb', 'Bapak Kajari'),
(22, '2019-08-08', '888', 'bhjb', 'dsfsf', 'Bapak Kajari'),
(23, '0000-00-00', '33434', 'dasd', 'asdasd', 'Bapak Kajari'),
(24, '0000-00-00', '111', 'sdad', 'dasda', 'Bapak Kajari'),
(25, '0000-00-00', '555', 'dfsf', 'dfsf', 'Bapak Kajari'),
(26, '2019-08-08', '666', 'dfsd', 'fsdf', 'Bapak Kajari'),
(27, '2019-08-08', '333', 'dsfds', 'dfsdf', 'Bapak Kajari'),
(28, '2019-08-12', '12121212', 'sdss', 'dfsdf', 'Bapak Kajari'),
(29, '2019-08-13', '55555', 'fvfdv', 'dfgdf', 'Bapak Kajari'),
(30, '2019-08-13', '555', 'dfdf', 'sdfsd', 'Bapak Kajari'),
(31, '2019-08-14', '32434', 'dsfsdf', 'sdfsdf', 'Bapak Kajari'),
(32, '2019-08-18', '235235235', '52353', '35235', 'Bapak Kajari'),
(33, '2019-08-18', '543534', 'dvdff', 'fdfd', 'Bapak Kajari'),
(34, '2019-08-19', '312321312', 'fsdsdfsdff', 'fdsfsdfsf', 'Bapak Kajari'),
(35, '2019-08-19', '76767', 'hghjgh', 'hbhjb', 'Bapak Kajari'),
(36, '2019-08-19', '424', 'fsdf', 'fsdfsfsfsfs', 'Bapak Kajari'),
(37, '2019-08-19', '3131', 'dsadsdasdd', 'addsad', 'Bapak Kajari'),
(38, '2019-08-19', '76786', 'hjbjhb', 'jbjk', 'Bapak Kajari'),
(39, '2019-08-19', '87979798', 'jhjkhn', 'khnkuh', 'Bapak Kajari');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `nama`, `level`) VALUES
(1, 'hai', 'yoyok', 'Mahendra', 'admin'),
(2, 'hendra', 'hendra', 'Mahendra', 'operator'),
(3, 'hai', 'hai', 'Hai', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `seksi`
--

CREATE TABLE `seksi` (
  `id_seksi` int(5) NOT NULL,
  `nama_seksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seksi`
--

INSERT INTO `seksi` (`id_seksi`, `nama_seksi`) VALUES
(1, 'Kasubagbin'),
(2, 'Kasi Intelijer');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_agenda` varchar(15) NOT NULL,
  `no_surat` varchar(30) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL,
  `lampiran` text,
  `perihal` varchar(50) DEFAULT NULL,
  `sifat` varchar(30) DEFAULT NULL,
  `isi_ringkas` text,
  `file_surat` varchar(100) DEFAULT NULL,
  `id_seksi` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_agenda`, `no_surat`, `tanggal_surat`, `tujuan`, `lampiran`, `perihal`, `sifat`, `isi_ringkas`, `file_surat`, `id_seksi`) VALUES
('1', '323214', '2019-08-05', 'fdsfsf', 'sdfsdffsfs', 'fdsfsdfsf', 'Biasa', 'fsdf', '', '1'),
('2', '432423', '2019-08-05', 'rereewr', 'ewrew', 'rwerwrerewr', 'Biasa', 'rwrwer', 'Sk - 6474 - Screenshot_2018-09-06-04-50-56.png', '1'),
('3', '675675', '2019-08-31', 'ghfvghfv', 'hvghv', 'hgvghvh', 'Biasa', 'jhjhg', 'Sk - 1716 - Screenshot_2018-06-26-19-08-22.png', '2'),
('4', '333', '2019-08-07', 'ghjg', 'hjghjg', 'jhgvjhg', 'Rahasia', 'jhvjhg', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `no_agenda` varchar(16) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `isi_ringkas` text NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `lampiran` varchar(20) NOT NULL,
  `file_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`no_agenda`, `no_surat`, `tanggal_surat`, `asal_surat`, `perihal`, `sifat`, `isi_ringkas`, `tanggal_penerimaan`, `lampiran`, `file_surat`) VALUES
('1', '111', '2019-07-28', 'yugyu', 'uytguyghjbhj', 'Biasa', 'jhbjhb', '2019-08-22', 'jbgyjhgb', 'Sm - 7494 - Screenshot_2018-06-05-09-23-59.png'),
('2', 'ygyug', '2019-08-07', 'jgyjh', 'ujhuj', 'Biasa', 'hbhjb', '2019-08-22', 'jhbjhb', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id_seksi`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_agenda`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`no_agenda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id_seksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
