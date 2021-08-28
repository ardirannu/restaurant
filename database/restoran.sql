-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 05:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `pass`, `foto_admin`) VALUES
(1, 'ardianto', 'ardiantorannu@gmail.com', 'ardianto123', 'fbd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `id_resto` int(20) NOT NULL,
  `nama_resto` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kualitas` varchar(255) NOT NULL,
  `jenis_menu` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`id_resto`, `nama_resto`, `alamat`, `kota`, `kualitas`, `jenis_menu`, `harga`, `jam_buka`, `contact`, `foto`) VALUES
(7, 'Golden Asian Restaurant', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15894.404316611503!2d119.4282492!3d-5.1676938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbdca41dcdfdeea!2sGolden%20Asian!5e0!3m2!1sid!2sid!4v1571145822558!5m2!1sid!2sid\" ', 'Makassar', 'Sangat Baik', 'Chinese Food', 'Rp 28.000 - Rp 1.000.000', '10.00 - 22.00', '04118099999', 'golden asia.jpg'),
(8, 'Gravity Sky Lounge', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.801068128544!2d119.40273501431759!3d-5.135709796272974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf02b0501fd201%3A0x9a6e007290b1e2f2!2sGravity%20Sky%20Lounge!5e0!3m2!1sid!2sid!4v1571148510266!5m2!1sid!2sid', 'Makassar', 'Sangat Baik', 'Western Food', 'Rp 28.000 - Rp 12.000.000', '12.00 - 02.00', '04113690000', 'Gravity Sky.jpg'),
(9, 'New Dinar Seafood', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7510789729936!2d119.40864001431756!3d-5.143723096267183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d53473c71d3%3A0xf3058ee0fe3c0f41!2sNew%20Dinar%20Seafood!5e0!3m2!1sid!2sid!4v1571149097780!5m2!1sid!2sid', 'Makassar', 'Baik', 'Indonesian Food', 'Rp 20.000 - Rp 400.000', '10.00 - 22.00', '0411872218', 'new-dinar-seafood.jpg'),
(10, 'Pavilion Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8360616605123!2d112.73263831433005!3d-7.259490994759905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f95cf4375601%3A0x4a94f51675f8d8ad!2sPavilion%20Restaurant!5e0!3m2!1sid!2sid!4v1571149576609!5m2!1sid!2sid', 'Surabaya', 'Sangat Baik', 'Indonesian Food', 'Rp 20.000 - Rp 800.000', '06.00 - 22.00', '0315458888', 'pavilion.jpg'),
(11, 'Arumanis Restaurant', '', 'Surabaya', 'Baik', 'Indonesian Food', 'Rp 155.000 - Rp 254.000', '06.00 - 22.00', '0315326301', 'arumanis.jpg'),
(12, 'Signature Restaurant ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7933.093058417514!2d106.82260032240322!3d-6.191377682071106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f421963cd607%3A0xdea65bf3cb20aaec!2sSignatures%20Restaurant!5e0!3m2!1sid!2sid!4v1571150414289!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Indonesian Food', 'Rp 197.000 - Rp 366.000', '18.00 - 22.00', '02123583898', 'signature.jpg'),
(13, 'The 18th Restaurant and Lounge', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.693811952953!2d107.63385271432787!3d-6.927155094994967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d8716543c9%3A0x835488125fba7486!2sThe%2018th%20Restaurant%20and%20Lounge!5e0!3m2!1sid!2sid!4v1571150952406!5m2!1sid!2sid', 'Bandung', 'Sangat Baik', 'Indonesian Food', 'Rp 99.000 - Rp 507.000', '16.00 - 00.00', '02284288288', 'the 18.jpg'),
(14, 'Jing Paradise Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.2979740439664!2d107.5934534143274!3d-6.854842995046213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f3301df5ad%3A0xa701916201888134!2sJing%20Paradise%20Restaurant!5e0!3m2!1sid!2sid!4v1571151371302!5m2!1sid!2sid', 'Bandung', 'Sangat Baik', 'Chinese Food', 'Rp 155.000 - Rp 507.000', '18.00 - 22-00', '0222012610', 'jing-paradise-chinese.jpg'),
(15, 'KESUMA Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.7131469425412!2d110.36433431433416!3d-7.82015669436495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57bcd2834539%3A0x82d6f1a31316393!2sKESUMA%20Restaurant!5e0!3m2!1sid!2sid!4v1571151747170!5m2!1sid!2sid', 'Jogyakarta', 'Baik', 'Indonesian Food', 'Rp 99.000 - Rp 155.000', '11.30 - 22.00', '081229426685', 'kesuma2.jpg'),
(16, 'Kuto Besak Theater Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.376533522688!2d104.7555713143092!3d-2.9928241978203616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b76017da3e22d%3A0xc5173f6149b95e!2sKuto%20Besak%20Theater%20Restaurant!5e0!3m2!1sid!2sid!4v1571152349038!5m2!1sid!2sid', 'Palembang', 'Sangat Baik', 'Indonesian Food', 'Rp 155.000 - Rp 507.000', '09.00 - 22-00', '0711313978', 'kuto besak.jpg'),
(17, 'Prime Steak house', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9609534019237!2d98.67343431431111!3d3.5964239973829013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131c3e9350ea3%3A0x41fbba53c016efb0!2sPrime%20Steak%20House!5e0!3m2!1sid!2sid!4v1571152646140!5m2!1sid!2sid', 'Medan', 'Sangat Baik', 'Indonesian Food', 'Rp 56.000 - Rp 606.000', '18.00 - 22-00', '06141006600', 'prime.jpg'),
(18, 'Sawah Terrace', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.1409808389694!2d115.24346761433932!3d-8.485670193898923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd223780aec85bd%3A0xbecbb58b3fd14ab4!2sSawah%20Terrace%20at%20Mandapa%2C%20a%20Ritz-Carlton%20Reserve!5e0!3m2!1sid!2sid!4v1571152890851!5m2!1sid!2sid', 'Bali', 'Sangat Baik', 'Indonesian Food', 'Rp 352.000 - Rp 775.000', '07.00 - 22.00', '03614792777', 'sawah-terrace.jpg'),
(20, 'PASOLA Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3034592912045!2d106.8100717!3d-6.2236593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f196f08a4dff%3A0x6f8a97dabcb7d15f!2sPASOLA!5e0!3m2!1sid!2sid!4v1623635867139!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Indonesian Food', '350000', '06.00 - 21.00', '+62 21 25501993', 'pasola-restaurant-buffet.jpg'),
(21, 'Kahyangan Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5317895799367!2d106.82144131400356!3d-6.193339995516387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f423df598603%3A0x798b55c25add2ba2!2sKahyangan%20Japanese%20Restaurant!5e0!3m2!1sid!2sid!4v1623636314891!5m2!1sid!2sid', 'Jakarta', 'Baik', 'Chinese Food', '750000', '06.00 - 21.00', '+62 21 2301122', 'teppanyaki.jpg'),
(22, 'Signatures Restaurant', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5150959913417!2d106.81976821400352!3d-6.195561695514793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f421963cd607%3A0xdea65bf3cb20aaec!2sSignatures%20Restaurant!5e0!3m2!1sid!2sid!4v1623696154441!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Western Food', '550000', '06.00 - 21.00', '+62 21 23583898', 'signatures-buffet.jpg'),
(23, 'Plataran Dharmawangsa', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0706790287154!2d106.80048981400398!3d-6.254418795472877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f176da0bcd53%3A0x2326390232f76ffe!2sPlataran%20Dharmawangsa!5e0!3m2!1sid!2sid!4v1623702014419!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Chinese Food', '250000', '06.00 - 21.00', '+62 21 29044167', 'melati-area-at-plataran.jpg'),
(24, 'Bandar Djakarta Ancol', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0614435227512!2d106.841603814003!3d-6.1224329955669115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e3d05306511%3A0x820b6f7432af7bcd!2sBandar%20Djakarta!5e0!3m2!1sid!2sid!4v1623702166766!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Chinese Food', '750000', '06.00 - 21.00', '+62 21 64712668', 'img-20190623-160743-largejpg.jpg'),
(25, 'Paulaner Brauhaus  Diklaim', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5085197088183!2d106.82036931400356!3d-6.196436695514186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d31bed044f%3A0x104c0c0ef0821b4c!2sPaulaner%20Br%C3%A4uhaus!5e0!3m2!1sid!2sid!4v1623702279272!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Western Food', '550000', '06.00 - 21.00', '+62 21 23583871', 'paulaner-new-normal-set.jpg'),
(26, 'Collage All Day Dining', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31732.068175203607!2d106.8050483189747!3d-6.196436403929414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65ee0336aa5%3A0x4fc35ab248c30baf!2sCollage%20All%20Day%20Dining!5e0!3m2!1sid!2sid!4v1623702385915!5m2!1sid!2sid', 'Jakarta', 'Baik', 'Indonesian Food', '150000', '06.00 - 21.00', '+62 21 29200088', '20180624-182456-largejpg.jpg'),
(27, 'Yoshi Izakaya', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2170192563985!2d106.82794601400386!3d-6.235099095486628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e88489fc61%3A0x35589c103ab95e39!2sYoshi%20Izakaya!5e0!3m2!1sid!2sid!4v1623702536486!5m2!1sid!2sid', 'Jakarta', 'Sangat Baik', 'Sea Food', '350000', '06.00 - 21.00', '+62 21 5268080', 'signature-dish.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`id_resto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resto`
--
ALTER TABLE `resto`
  MODIFY `id_resto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
