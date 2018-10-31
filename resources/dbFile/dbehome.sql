-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dbehome
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anggota` (
  `id_anggota` varchar(5) NOT NULL,
  `id_rumah` varchar(5) DEFAULT NULL,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `url_fotoanggota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_rumah` (`id_rumah`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keuangan`
--

DROP TABLE IF EXISTS `keuangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `keuangan` (
  `id_transaksi` varchar(5) NOT NULL,
  `id_rumah` varchar(5) DEFAULT NULL,
  `detail_transaksi` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keuangan`
--

LOCK TABLES `keuangan` WRITE;
/*!40000 ALTER TABLE `keuangan` DISABLE KEYS */;
INSERT INTO `keuangan` VALUES ('t0001','r0001','Uang bulanan','Terbayar',1,'2018-10-14');
/*!40000 ALTER TABLE `keuangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rumah`
--

DROP TABLE IF EXISTS `rumah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rumah` (
  `id_rumah` varchar(5) NOT NULL,
  `id_transaksi` varchar(5) DEFAULT NULL,
  `nama_rumah` varchar(100) DEFAULT NULL,
  `alamat` text,
  `url_foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rumah`),
  KEY `id_transaksi` (`id_transaksi`),
  CONSTRAINT `rumah_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `keuangan` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rumah`
--

LOCK TABLES `rumah` WRITE;
/*!40000 ALTER TABLE `rumah` DISABLE KEYS */;
INSERT INTO `rumah` VALUES ('r0001','t0001','E-Home','Jl. Kolonel Ahmad Syam, Puri Indah, Jl. Puri Nirwana 1, No. B6/5, Cikeruh, Jatinangor, Kabupaten Sumedang, Jawa Barat 45363\r\n',NULL);
/*!40000 ALTER TABLE `rumah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id_task` varchar(5) NOT NULL,
  `id_anggota` varchar(5) DEFAULT NULL,
  `nama_task` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_task`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_rumah` varchar(5) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kontak` int(12) DEFAULT NULL,
  KEY `id_rumah` (`id_rumah`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('r0001','admin','admin123','admin@ehome.com',123456789);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-31 10:27:14
