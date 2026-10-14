CREATE DATABASE  IF NOT EXISTS `kisi_uts_web`;

USE `kisi_uts_web`;

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode_produk` varchar(10) NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


LOCK TABLES `penjualan` WRITE;
INSERT INTO `penjualan` VALUES (1,'2026-10-05 11:16:08','B001',5),(2,'2026-10-05 11:16:13','B003',4),(3,'2026-10-05 11:23:21','B002',4),(4,'2026-10-05 11:32:19','B004',4),(5,'2026-10-05 11:32:25','B002',2);
UNLOCK TABLES;


DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  PRIMARY KEY (`kode`),
  UNIQUE KEY `kode_UNIQUE` (`kode`),
  UNIQUE KEY `nama_UNIQUE` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `produk` WRITE;

INSERT INTO `produk` VALUES ('B001','Telur Ayam',2000),('B002','Indomie Kaldu Ayam',3000),('B003','Indomie Goreng',3200),('B004','Sambal',2500);

UNLOCK TABLES;