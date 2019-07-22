-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 10:34 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembelian`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(23) NOT NULL,
  `nama_bahan` varchar(100) DEFAULT NULL,
  `stok` mediumint(20) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `id_kat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `stok`, `satuan`, `id_kat`) VALUES
(4, 'Kain 200 Cm', 1212, 'cm', 1),
(5, 'Kain 180 Cm', 2000, 'cm', 1),
(6, 'Kain 160 Cm', 3000, 'cm', 1),
(7, 'Invisible zipper', 2300, 'pcs', 2),
(8, 'Coil zipper', 1048, 'pcs', 2),
(9, 'Plastic zipper', 3200, 'pcs', 2),
(10, 'Foam T 6 180 x 200 cm', 2000, 'cm', 3),
(11, 'Foam T 6 180 x 150 cm', 3412, 'cm', 3),
(12, 'Foam T 8 180 x 120 cm', 2000, 'cm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `jml_kary` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`jml_kary`) VALUES
(1400);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bahan`
--

CREATE TABLE `kategori_bahan` (
  `id_kat` int(4) DEFAULT NULL,
  `nama_kat` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_transaksi` int(10) NOT NULL,
  `tgl_trans` date DEFAULT NULL,
  `id_produk` varchar(2) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `customer` varchar(100) DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_transaksi`, `tgl_trans`, `id_produk`, `qty`, `customer`, `ket`) VALUES
(1382, '2015-01-03', 'D', 565, 'Didin', ''),
(1383, '2015-01-03', 'C', 405, 'Didin', ''),
(1384, '2015-01-03', 'A', 486, 'Didin', ''),
(1385, '2015-01-03', 'C', 507, 'Yunus', ''),
(1386, '2015-01-03', 'D', 126, 'Yunus', ''),
(1387, '2015-01-03', 'A', 147, 'Joni', ''),
(1388, '2015-01-03', 'B', 172, 'Joni', ''),
(1389, '2015-01-03', 'C', 328, 'Joni', ''),
(1390, '2015-01-03', 'H', 247, 'Joni', ''),
(1391, '2015-01-03', 'I', 219, 'Joni', ''),
(1392, '2015-01-04', 'C', 427, 'Suripto', ''),
(1393, '2015-01-04', 'F', 422, 'Suripto', ''),
(1394, '2015-01-04', 'D', 315, 'Suripto', ''),
(1395, '2015-01-04', 'D', 445, 'Joni', ''),
(1396, '2015-01-04', 'C', 302, 'Joni', ''),
(1397, '2015-01-04', 'G', 231, 'Joni', ''),
(1398, '2015-01-04', 'I', 394, 'Joni', ''),
(1399, '2015-01-08', 'D', 491, 'Halim', ''),
(1400, '2015-01-08', 'E', 693, 'Halim', ''),
(1401, '2015-01-08', 'H', 274, 'Halim', ''),
(1402, '2015-01-08', 'E', 502, 'Yunus', ''),
(1403, '2015-01-08', 'D', 549, 'Yunus', ''),
(1404, '2015-01-08', 'B', 615, 'Yunus', ''),
(1405, '2015-01-11', 'C', 641, 'Halim', ''),
(1406, '2015-01-11', 'C', 353, 'Halim', ''),
(1407, '2015-01-11', 'I', 412, 'Halim', ''),
(1408, '2015-01-11', 'G', 316, 'Halim', ''),
(1409, '2015-01-11', 'F', 457, 'Halim', ''),
(1410, '2015-01-11', 'C', 216, 'Didin', ''),
(1411, '2015-01-11', 'D', 272, 'Didin', ''),
(1412, '2015-01-11', 'E', 230, 'Didin', ''),
(1413, '2015-01-11', 'G', 367, 'Didin', ''),
(1414, '2015-01-11', 'H', 215, 'Didin', ''),
(1415, '2015-01-12', 'C', 449, 'Suripto', ''),
(1416, '2015-01-12', 'D', 620, 'Suripto', ''),
(1417, '2015-01-12', 'H', 443, 'Suripto', ''),
(1418, '2015-01-13', 'C', 498, 'yunus', ''),
(1419, '2015-01-13', 'D', 495, 'yunus', ''),
(1420, '2015-01-13', 'H', 492, 'yunus', ''),
(1421, '2015-01-14', 'C', 489, 'Halim', ''),
(1422, '2015-01-14', 'D', 486, 'Halim', ''),
(1423, '2015-01-14', 'H', 483, 'Halim', ''),
(1424, '2015-01-15', 'C', 480, 'Suripto', ''),
(1425, '2015-01-15', 'D', 477, 'Suripto', ''),
(1426, '2015-01-15', 'H', 474, 'Suripto', ''),
(1427, '2015-01-16', 'C', 471, 'Suripto', ''),
(1428, '2015-01-16', 'D', 468, 'Suripto', ''),
(1429, '2015-01-16', 'H', 465, 'Suripto', ''),
(1430, '2015-01-17', 'C', 462, 'Joni', ''),
(1431, '2015-01-17', 'D', 459, 'Joni', ''),
(1432, '2015-01-17', 'H', 456, 'Joni', ''),
(1433, '2015-02-03', 'D', 191, 'Didin', ''),
(1434, '2015-02-03', 'C', 495, 'Didin', ''),
(1435, '2015-02-03', 'A', 716, 'Didin', ''),
(1436, '2015-02-03', 'C', 159, 'Yunus', ''),
(1437, '2015-02-03', 'D', 127, 'Yunus', ''),
(1438, '2015-02-03', 'A', 539, 'Joni', ''),
(1439, '2015-02-03', 'B', 638, 'Joni', ''),
(1440, '2015-02-03', 'C', 175, 'Joni', ''),
(1441, '2015-02-03', 'H', 796, 'Joni', ''),
(1442, '2015-02-03', 'I', 259, 'Joni', ''),
(1443, '2015-02-04', 'C', 570, 'Suripto', ''),
(1444, '2015-02-04', 'F', 283, 'Suripto', ''),
(1445, '2015-02-04', 'D', 479, 'Suripto', ''),
(1446, '2015-02-04', 'D', 182, 'Joni', ''),
(1447, '2015-02-04', 'C', 499, 'Joni', ''),
(1448, '2015-02-04', 'G', 325, 'Joni', ''),
(1449, '2015-02-04', 'I', 618, 'Joni', ''),
(1450, '2015-02-08', 'D', 329, 'Halim', ''),
(1451, '2015-02-08', 'E', 167, 'Halim', ''),
(1452, '2015-02-08', 'H', 770, 'Halim', ''),
(1453, '2015-02-08', 'E', 281, 'Yunus', ''),
(1454, '2015-02-08', 'D', 196, 'Yunus', ''),
(1455, '2015-02-08', 'B', 171, 'Yunus', ''),
(1456, '2015-02-11', 'C', 213, 'Halim', ''),
(1457, '2015-02-11', 'C', 421, 'Halim', ''),
(1458, '2015-02-11', 'I', 789, 'Halim', ''),
(1459, '2015-02-11', 'G', 366, 'Halim', ''),
(1460, '2015-02-11', 'F', 248, 'Halim', ''),
(1461, '2015-02-11', 'C', 207, 'Didin', ''),
(1462, '2015-02-11', 'D', 608, 'Didin', ''),
(1463, '2015-02-11', 'E', 457, 'Didin', ''),
(1464, '2015-02-11', 'G', 536, 'Didin', ''),
(1465, '2015-02-11', 'H', 379, 'Didin', ''),
(1466, '2015-02-12', 'C', 629, 'Suripto', ''),
(1467, '2015-02-12', 'D', 784, 'Suripto', ''),
(1468, '2015-02-12', 'H', 275, 'Suripto', ''),
(1469, '2015-02-13', 'C', 676, 'yunus', ''),
(1470, '2015-02-13', 'D', 282, 'yunus', ''),
(1471, '2015-02-13', 'H', 101, 'yunus', ''),
(1472, '2015-02-14', 'C', 103, 'Halim', ''),
(1473, '2015-02-14', 'D', 737, 'Halim', ''),
(1474, '2015-02-14', 'H', 126, 'Halim', ''),
(1475, '2015-02-15', 'C', 560, 'Suripto', ''),
(1476, '2015-02-15', 'D', 450, 'Suripto', ''),
(1477, '2015-02-15', 'H', 500, 'Suripto', ''),
(1478, '2015-02-16', 'C', 625, 'Suripto', ''),
(1479, '2015-02-16', 'D', 797, 'Suripto', ''),
(1480, '2015-02-16', 'H', 171, 'Suripto', ''),
(1481, '2015-02-17', 'C', 516, 'Joni', ''),
(1482, '2015-02-17', 'D', 110, 'Joni', ''),
(1483, '2015-02-17', 'H', 263, 'Joni', ''),
(1484, '2015-03-03', 'D', 217, 'Didin', ''),
(1485, '2015-03-03', 'C', 557, 'Didin', ''),
(1486, '2015-03-03', 'A', 448, 'Didin', ''),
(1487, '2015-03-03', 'C', 373, 'Yunus', ''),
(1488, '2015-03-03', 'D', 273, 'Yunus', ''),
(1489, '2015-03-03', 'A', 315, 'Joni', ''),
(1490, '2015-03-03', 'B', 179, 'Joni', ''),
(1491, '2015-03-03', 'C', 468, 'Joni', ''),
(1492, '2015-03-03', 'H', 302, 'Joni', ''),
(1493, '2015-03-03', 'I', 177, 'Joni', ''),
(1494, '2015-03-04', 'C', 472, 'Suripto', ''),
(1495, '2015-03-04', 'F', 535, 'Suripto', ''),
(1496, '2015-03-04', 'D', 186, 'Suripto', ''),
(1497, '2015-03-04', 'D', 320, 'Joni', ''),
(1498, '2015-03-04', 'C', 369, 'Joni', ''),
(1499, '2015-03-04', 'G', 248, 'Joni', ''),
(1500, '2015-03-04', 'I', 467, 'Joni', ''),
(1501, '2015-03-08', 'D', 130, 'Halim', ''),
(1502, '2015-03-08', 'E', 540, 'Halim', ''),
(1503, '2015-03-08', 'H', 378, 'Halim', ''),
(1504, '2015-03-08', 'E', 170, 'Yunus', ''),
(1505, '2015-03-08', 'D', 221, 'Yunus', ''),
(1506, '2015-03-08', 'B', 341, 'Yunus', ''),
(1507, '2015-03-11', 'C', 351, 'Halim', ''),
(1508, '2015-03-11', 'C', 346, 'Halim', ''),
(1509, '2015-03-11', 'I', 482, 'Halim', ''),
(1510, '2015-03-11', 'G', 128, 'Halim', ''),
(1511, '2015-03-11', 'F', 162, 'Halim', ''),
(1512, '2015-03-11', 'C', 136, 'Didin', ''),
(1513, '2015-03-11', 'D', 298, 'Didin', ''),
(1514, '2015-03-11', 'E', 162, 'Didin', ''),
(1515, '2015-03-11', 'G', 531, 'Didin', ''),
(1516, '2015-03-11', 'H', 131, 'Didin', ''),
(1517, '2015-03-12', 'C', 331, 'Suripto', ''),
(1518, '2015-03-12', 'D', 287, 'Suripto', ''),
(1519, '2015-03-12', 'H', 425, 'Suripto', ''),
(1520, '2015-03-13', 'C', 358, 'yunus', ''),
(1521, '2015-03-13', 'D', 294, 'yunus', ''),
(1522, '2015-03-13', 'H', 263, 'yunus', ''),
(1523, '2015-03-14', 'C', 279, 'Halim', ''),
(1524, '2015-03-14', 'D', 117, 'Halim', ''),
(1525, '2015-03-14', 'H', 180, 'Halim', ''),
(1526, '2015-03-15', 'C', 216, 'Suripto', ''),
(1527, '2015-03-15', 'D', 355, 'Suripto', ''),
(1528, '2015-03-15', 'H', 177, 'Suripto', ''),
(1529, '2015-03-16', 'C', 238, 'Suripto', ''),
(1530, '2015-03-16', 'D', 296, 'Suripto', ''),
(1531, '2015-03-16', 'H', 221, 'Suripto', ''),
(1532, '2015-03-17', 'C', 108, 'Joni', ''),
(1533, '2015-03-17', 'D', 294, 'Joni', ''),
(1534, '2015-03-17', 'H', 324, 'Joni', ''),
(1535, '2015-04-03', 'D', 249, 'Didin', ''),
(1536, '2015-04-03', 'C', 395, 'Didin', ''),
(1537, '2015-04-03', 'A', 269, 'Didin', ''),
(1538, '2015-04-03', 'C', 417, 'Yunus', ''),
(1539, '2015-04-03', 'D', 195, 'Yunus', ''),
(1540, '2015-04-03', 'A', 342, 'Joni', ''),
(1541, '2015-04-03', 'B', 519, 'Joni', ''),
(1542, '2015-04-03', 'C', 478, 'Joni', ''),
(1543, '2015-04-03', 'H', 551, 'Joni', ''),
(1544, '2015-04-03', 'I', 443, 'Joni', ''),
(1545, '2015-04-04', 'C', 297, 'Suripto', ''),
(1546, '2015-04-04', 'F', 454, 'Suripto', ''),
(1547, '2015-04-04', 'D', 405, 'Suripto', ''),
(1548, '2015-04-04', 'D', 460, 'Joni', ''),
(1549, '2015-04-04', 'C', 309, 'Joni', ''),
(1550, '2015-04-04', 'G', 245, 'Joni', ''),
(1551, '2015-04-04', 'I', 520, 'Joni', ''),
(1552, '2015-04-08', 'D', 111, 'Halim', ''),
(1553, '2015-04-08', 'E', 182, 'Halim', ''),
(1554, '2015-04-08', 'H', 220, 'Halim', ''),
(1555, '2015-04-08', 'E', 370, 'Yunus', ''),
(1556, '2015-04-08', 'D', 111, 'Yunus', ''),
(1557, '2015-04-08', 'B', 420, 'Yunus', ''),
(1558, '2015-04-11', 'C', 390, 'Halim', ''),
(1559, '2015-04-11', 'C', 360, 'Halim', ''),
(1560, '2015-04-11', 'I', 380, 'Halim', ''),
(1561, '2015-04-11', 'G', 105, 'Halim', ''),
(1562, '2015-04-11', 'F', 122, 'Halim', ''),
(1563, '2015-04-11', 'C', 234, 'Didin', ''),
(1564, '2015-04-11', 'D', 325, 'Didin', ''),
(1565, '2015-04-11', 'E', 226, 'Didin', ''),
(1566, '2015-04-11', 'G', 436, 'Didin', ''),
(1567, '2015-04-11', 'H', 300, 'Didin', ''),
(1568, '2015-04-12', 'C', 111, 'Suripto', ''),
(1569, '2015-04-12', 'D', 187, 'Suripto', ''),
(1570, '2015-04-12', 'H', 115, 'Suripto', ''),
(1571, '2015-04-13', 'C', 390, 'yunus', ''),
(1572, '2015-04-13', 'D', 302, 'yunus', ''),
(1573, '2015-04-13', 'H', 444, 'yunus', ''),
(1574, '2015-04-14', 'C', 180, 'Halim', ''),
(1575, '2015-04-14', 'D', 481, 'Halim', ''),
(1576, '2015-04-14', 'H', 536, 'Halim', ''),
(1577, '2015-04-15', 'C', 104, 'Suripto', ''),
(1578, '2015-04-15', 'D', 550, 'Suripto', ''),
(1579, '2015-04-15', 'H', 475, 'Suripto', ''),
(1580, '2015-04-16', 'C', 269, 'Suripto', ''),
(1581, '2015-04-16', 'D', 344, 'Suripto', ''),
(1582, '2015-04-16', 'H', 313, 'Suripto', ''),
(1583, '2015-04-17', 'C', 169, 'Joni', ''),
(1584, '2015-04-17', 'D', 454, 'Joni', ''),
(1585, '2015-04-17', 'H', 543, 'Joni', ''),
(1586, '2015-05-03', 'D', 234, 'Didin', ''),
(1587, '2015-05-03', 'C', 524, 'Didin', ''),
(1588, '2015-05-03', 'A', 183, 'Didin', ''),
(1589, '2015-05-03', 'C', 167, 'Yunus', ''),
(1590, '2015-05-03', 'D', 246, 'Yunus', ''),
(1591, '2015-05-03', 'A', 190, 'Joni', ''),
(1592, '2015-05-03', 'B', 472, 'Joni', ''),
(1593, '2015-05-03', 'C', 404, 'Joni', ''),
(1594, '2015-05-03', 'H', 431, 'Joni', ''),
(1595, '2015-05-03', 'I', 224, 'Joni', ''),
(1596, '2015-05-04', 'C', 101, 'Suripto', ''),
(1597, '2015-05-04', 'F', 530, 'Suripto', ''),
(1598, '2015-05-04', 'D', 548, 'Suripto', ''),
(1599, '2015-05-04', 'D', 321, 'Joni', ''),
(1600, '2015-05-04', 'C', 448, 'Joni', ''),
(1601, '2015-05-04', 'G', 530, 'Joni', ''),
(1602, '2015-05-04', 'I', 552, 'Joni', ''),
(1603, '2015-05-08', 'D', 248, 'Halim', ''),
(1604, '2015-05-08', 'E', 513, 'Halim', ''),
(1605, '2015-05-08', 'H', 109, 'Halim', ''),
(1606, '2015-05-08', 'E', 309, 'Yunus', ''),
(1607, '2015-05-08', 'D', 169, 'Yunus', ''),
(1608, '2015-05-08', 'B', 276, 'Yunus', ''),
(1609, '2015-05-11', 'C', 447, 'Halim', ''),
(1610, '2015-05-11', 'C', 155, 'Halim', ''),
(1611, '2015-05-11', 'I', 277, 'Halim', ''),
(1612, '2015-05-11', 'G', 301, 'Halim', ''),
(1613, '2015-05-11', 'F', 148, 'Halim', ''),
(1614, '2015-05-11', 'C', 256, 'Didin', ''),
(1615, '2015-05-11', 'D', 176, 'Didin', ''),
(1616, '2015-05-11', 'E', 220, 'Didin', ''),
(1617, '2015-05-11', 'G', 524, 'Didin', ''),
(1618, '2015-05-11', 'H', 552, 'Didin', ''),
(1619, '2015-05-12', 'C', 168, 'Suripto', ''),
(1620, '2015-05-12', 'D', 306, 'Suripto', ''),
(1621, '2015-05-12', 'H', 376, 'Suripto', ''),
(1622, '2015-05-13', 'C', 314, 'yunus', ''),
(1623, '2015-05-13', 'D', 500, 'yunus', ''),
(1624, '2015-05-13', 'H', 172, 'yunus', ''),
(1625, '2015-05-14', 'C', 562, 'Halim', ''),
(1626, '2015-05-14', 'D', 380, 'Halim', ''),
(1627, '2015-05-14', 'H', 249, 'Halim', ''),
(1628, '2015-05-15', 'C', 427, 'Suripto', ''),
(1629, '2015-05-15', 'D', 175, 'Suripto', ''),
(1630, '2015-05-15', 'H', 192, 'Suripto', ''),
(1631, '2015-05-16', 'C', 294, 'Suripto', ''),
(1632, '2015-05-16', 'D', 352, 'Suripto', ''),
(1633, '2015-05-16', 'H', 100, 'Suripto', ''),
(1634, '2015-05-17', 'C', 562, 'Joni', ''),
(1635, '2015-05-17', 'D', 190, 'Joni', ''),
(1636, '2015-05-17', 'H', 432, 'Joni', '');

-- --------------------------------------------------------

--
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id_produk` varchar(5) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `penjualan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id_produk`, `bulan`, `penjualan`) VALUES
('A', '2015-1-01', 0),
('A', '2015-2-01', 633),
('A', '2015-3-01', 1193),
('A', '2015-4-01', 806),
('A', '2015-5-01', 630),
('A', '2015-6-01', 399),
('B', '2015-1-01', 0),
('B', '2015-2-01', 787),
('B', '2015-3-01', 807),
('B', '2015-4-01', 549),
('B', '2015-5-01', 900),
('B', '2015-6-01', 763),
('C', '2015-1-01', 0),
('C', '2015-2-01', 6028),
('C', '2015-3-01', 5866),
('C', '2015-4-01', 4728),
('C', '2015-5-01', 4166),
('C', '2015-6-01', 4763),
('D', '2015-1-01', 0),
('D', '2015-2-01', 5768),
('D', '2015-3-01', 5322),
('D', '2015-4-01', 3491),
('D', '2015-5-01', 4106),
('D', '2015-6-01', 3871),
('E', '2015-1-01', 0),
('E', '2015-2-01', 1425),
('E', '2015-3-01', 957),
('E', '2015-4-01', 881),
('E', '2015-5-01', 788),
('E', '2015-6-01', 1017),
('F', '2015-1-01', 0),
('F', '2015-2-01', 879),
('F', '2015-3-01', 566),
('F', '2015-4-01', 684),
('F', '2015-5-01', 587),
('F', '2015-6-01', 669),
('G', '2015-1-01', 0),
('G', '2015-2-01', 914),
('G', '2015-3-01', 1196),
('G', '2015-4-01', 936),
('G', '2015-5-01', 801),
('G', '2015-6-01', 1300),
('H', '2015-1-01', 0),
('H', '2015-2-01', 3549),
('H', '2015-3-01', 3398),
('H', '2015-4-01', 2501),
('H', '2015-5-01', 3397),
('H', '2015-6-01', 2691),
('I', '2015-1-01', 0),
('I', '2015-2-01', 1025),
('I', '2015-3-01', 1602),
('I', '2015-4-01', 1174),
('I', '2015-5-01', 1326),
('I', '2015-6-01', 1080);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(2) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `keterangan` text NOT NULL,
  `img` varchar(500) NOT NULL,
  `bahan_kain` int(5) DEFAULT NULL,
  `bahan_zipper` int(5) DEFAULT NULL,
  `bahan_foam` int(5) DEFAULT NULL,
  `waktu_produksi` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `ukuran`, `harga`, `stok`, `keterangan`, `img`, `bahan_kain`, `bahan_zipper`, `bahan_foam`, `waktu_produksi`) VALUES
('A', 'Kasur T 6 180 x 120 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 4, 7, 10, 2),
('B', 'Kasur T 6 180 x 150 cm', '', 20000, 500, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 4, 9, 11, 2),
('C', 'Kasur T 6 180 x 180 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 4, 8, 11, 2),
('D', 'Kasur T 6 180 x 200 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 5, 7, 12, 2),
('E', 'Kasur T 6 180 x 220 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 5, 7, 10, 3),
('F', 'Kasur T 8 180 x 120 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 6, 8, 11, 3),
('G', 'Kasur T 8 180 x 180 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 6, 8, 11, 3),
('H', 'Kasur T 8 180 x 200 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 4, 8, 12, 3),
('I', 'Kasur T 8 180 x 220 cm', '', 384000, 2000, 'Kasur', 'Kasur-Busa-Super-BIG-FOAM-18-cm.jpg', 5, 7, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(23) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `img`) VALUES
('admin', 'Admin Ganteng', '21232f297a57a5a743894a0e4a801fc3', 'face12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_produk` (`id_produk`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD KEY `fk_produk_p` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1637;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `fk_produk_p` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
