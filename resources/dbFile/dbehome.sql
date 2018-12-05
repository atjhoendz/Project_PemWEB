-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2018 at 02:09 AM
-- Server version: 10.1.37-MariaDB-1
-- PHP Version: 7.2.9-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbehome`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(5) NOT NULL,
  `id_rumah` varchar(5) DEFAULT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `url_fotoanggota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_rumah`, `nama_anggota`, `url_fotoanggota`) VALUES
('Ari90', 'adm83', 'Arif R Gilang', 'http://hda.himatif.org/assets/foto/2017/30.jpg'),
('Fis50', 'fis36', 'Fish', 'https://cdn.shopify.com/s/files/1/0250/3642/collections/Tasty.Sushi_grande.jpg?v=1486936319'),
('Imr76', 'adm83', 'Imron Madani', 'http://hda.himatif.org/assets/foto/2017/61.jpg'),
('M H7', 'adm83', 'M HafidzAlfarizi', 'http://hda.himatif.org/assets/foto/2017/22.jpg'),
('Moh8', 'adm83', 'Moh Achun Armando', 'http://localhost/TugasPW/pw-archive/Profile+Bootstrap/assets/foto-me.png'),
('Muh63', 'adm83', 'Muh Fahmi Alwan', 'http://hda.himatif.org/assets/foto/2017/52.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_transaksi` int(11) NOT NULL,
  `id_rumah` varchar(5) DEFAULT NULL,
  `detail_transaksi` varchar(100) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_transaksi`, `id_rumah`, `detail_transaksi`, `jumlah`, `flag`, `tanggal`) VALUES
(1, 'fis36', 'Melewati Start', 300000, 1, '2018-10-17'),
(3, 'fis36', 'Beli landmark', 5000000, 0, '2018-09-19'),
(4, 'adm83', 'aeaerae', 1000000, 1, '2018-12-14'),
(5, 'adm83', 'Bayar Wifi', 300000, 0, '2018-12-05'),
(6, 'adm83', 'Iuran Tahunan', 500000, 1, '2018-12-20'),
(7, 'adm83', 'Iuran Tahunan', 1000000, 1, '2018-12-13'),
(8, 'adm83', 'Bayar pompa aer', 2000000, 0, '2018-12-14'),
(9, 'adm83', 'bayar ifest', 1000000, 0, '2018-12-12'),
(10, 'adm83', 'Uang Bulanan', 100000, 1, '2018-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` varchar(5) NOT NULL,
  `nama_rumah` varchar(100) DEFAULT NULL,
  `alamat` text,
  `url_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `nama_rumah`, `alamat`, `url_foto`) VALUES
('adm83', '', '', ''),
('atj81', '', '', ''),
('fis36', 'Fisheries', 'Atlantic Ocean 248th Reef 2nd District', '');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` varchar(5) NOT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `id_rumah` varchar(5) NOT NULL,
  `nama_task` varchar(100) DEFAULT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `tgl_task` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `id_anggota`, `id_rumah`, `nama_task`, `nama_anggota`, `tgl_task`) VALUES
('Bay45', 'Muh63', 'adm83', 'Bayar Satpam', 'Muh Fahmi Alwan', '2018-12-15'),
('Bel61', 'Imr76', 'adm83', 'Beli Token Listrik', 'Imron Madani', '2018-12-07'),
('Bel63', 'Moh8', 'adm83', 'Beli Galon', 'Moh Achun Armando', '2018-12-07'),
('tsk01', 'Ari90', 'adm83', 'Bayar Wifi', 'Arif R Gilang', '2018-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_rumah` varchar(5) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_rumah`, `username`, `password`, `email`, `kontak`) VALUES
('fis36', 'fish', 'fish', 'fish@atlanticocean.com', '085262399545'),
('adm83', 'admin', 'admin', 'achunarmando@gmail.com', '089646596302'),
('atj81', 'atjhoendz', '123', 'achunarmando@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_rumah` (`id_rumah`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_rumah` (`id_rumah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `id_rumah` (`id_rumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
