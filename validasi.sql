-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 05:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peserta`
--

CREATE TABLE `daftar_peserta` (
  `id` int(11) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_peserta`
--

INSERT INTO `daftar_peserta` (`id`, `nama_peserta`, `no_telepon`, `instansi`) VALUES
(26, 'Glendri Hoke', '081234567890', 'UKIM'),
(34, 'Fernando William Kakisina', '081234567891', 'UKIM'),
(40, 'eqwfase', 'arhe', 'aerhqn'),
(42, 'wefarajt', 'ryja', 'rjya'),
(43, 'aewfjtgra', 'jra', 'jra'),
(44, 'arth', 'aerth', 'aqtr'),
(45, 'aqh6jtrt', 'aq', 'tjrha'),
(46, 'htrrr', 'wrht', 'wrhtrw'),
(47, 'grqe', 'grqre', 'gqergqe'),
(48, 'qerg', 'qegqeg', 'gqeg'),
(49, 'ukydt', 'kudt', 'kuydt'),
(50, 'kydty', 'ktdys', '6uw56'),
(51, 'atgu6', 'atu', 'gvntau4'),
(52, 'tEJt', 'jaruar', 'uatru'),
(53, 'traj', 'jtar', 'a56j'),
(54, 'kry', 'KARY', 'KYAR'),
(55, 'KETUKETY', 'ETYKETYK', 'ETYKETYK'),
(56, 'F,JUI', 'RYULK', 'LUY'),
(57, '6ET7I', 'YKU', 'TDYTK'),
(58, 'KYDHK', 'UKDTY', 'KUTD7Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_peserta`
--
ALTER TABLE `daftar_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
