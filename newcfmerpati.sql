-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 11:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cfmerpati`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('saka', '01677a6ba542c1b664deb29548cc75cf', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
(1, 1, 1, 0.6, 0.2),
(2, 1, 2, 0.6, 0.2),
(3, 1, 3, 1.0, 0.0),
(4, 1, 4, 0.8, 0.2),
(5, 2, 2, 0.6, 0.2),
(6, 2, 8, 0.8, 0.0),
(7, 2, 9, 0.8, 0.2),
(8, 2, 11, 0.8, 0.2),
(9, 3, 8, 0.8, 0.0),
(10, 3, 12, 1.0, 0.0),
(11, 3, 13, 0.8, 0.2),
(12, 4, 2, 0.6, 0.2),
(13, 4, 10, 1.0, 0.4),
(14, 4, 15, 1.0, 0.2),
(15, 4, 11, 0.8, 0.0),
(16, 4, 7, 0.8, 0.2),
(17, 5, 1, 0.8, 0.2),
(18, 5, 2, 0.8, 0.2),
(19, 5, 5, 1.0, 0.4),
(20, 5, 7, 0.8, 0.2),
(21, 5, 15, 1.0, 0.4),
(22, 6, 1, 0.8, 0.4),
(23, 6, 2, 0.8, 0.2),
(24, 6, 7, 0.8, 0.2),
(25, 6, 16, 1.0, 0.0),
(26, 7, 19, 1.0, 0.0),
(27, 7, 20, 1.0, 0.0),
(28, 8, 2, 0.8, 0.4),
(29, 8, 17, 1.0, 0.0),
(30, 8, 18, 1.0, 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
(1, 'Kotoran burung berbentuk cair dan berwarna putih'),
(2, 'Nafsu makan menurun'),
(3, 'Banyak kotoran yang berwarna putih di anus'),
(4, 'Mukanya pucat'),
(5, 'Bulu tidak teratur'),
(6, 'Sayap menggantung'),
(7, 'Burung kurang bergairah.'),
(8, 'Bengkak pada bagian muka'),
(9, 'Hidung berlendir'),
(10, 'Sering bersin-bersin'),
(11, 'Sesak Nafas'),
(12, 'Kulit melepuh seperti terbakar'),
(13, 'Kulit menjadi bintik-bintik dan muncul benjolan'),
(14, 'Pernapasannya akan ngorok'),
(15, 'Keseimbagan merpati berkurang'),
(16, 'Kotoran terdapat cacing'),
(17, 'Terdapat benjolan kuning di area rongga mulut'),
(18, 'Terlalu sering minum'),
(19, 'Kulit Keras pada area kaki '),
(20, 'Area kaki Membengkak');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL DEFAULT '0',
  `penyakit` text NOT NULL,
  `gejala` text NOT NULL,
  `hasil_id` int(11) NOT NULL,
  `hasil_nilai` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `penyakit`, `gejala`, `hasil_id`, `hasil_nilai`) VALUES
(1, '2022-06-24 12:26:22', 'a:6:{i:1;s:6:\"0.8760\";i:5;s:6:\"0.7920\";i:6;s:6:\"0.6880\";i:2;s:6:\"0.3200\";i:4;s:6:\"0.3200\";i:8;s:6:\"0.3200\";}', 'a:4:{i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"4\";}', 1, '0.8760'),
(2, '2022-06-24 12:37:09', 'a:7:{i:2;s:6:\"0.9343\";i:3;s:6:\"0.6400\";i:5;s:6:\"0.6000\";i:6;s:6:\"0.6000\";i:4;s:6:\"0.5920\";i:1;s:6:\"0.4000\";i:8;s:6:\"0.4000\";}', 'a:4:{i:2;s:1:\"1\";i:8;s:1:\"2\";i:9;s:1:\"1\";i:11;s:1:\"4\";}', 2, '0.9343'),
(3, '2022-06-24 12:41:22', 'a:2:{i:3;s:6:\"1.0000\";i:2;s:6:\"0.6400\";}', 'a:3:{i:8;s:1:\"2\";i:12;s:1:\"1\";i:13;s:1:\"2\";}', 3, '1.0000'),
(4, '2022-06-24 12:45:19', 'a:6:{i:4;s:6:\"0.9851\";i:5;s:6:\"0.8419\";i:2;s:6:\"0.6464\";i:6;s:6:\"0.6048\";i:1;s:6:\"0.3200\";i:8;s:6:\"0.3200\";}', 'a:5:{i:2;s:1:\"2\";i:7;s:1:\"4\";i:10;s:1:\"1\";i:11;s:1:\"2\";i:15;s:1:\"1\";}', 4, '0.9851'),
(5, '2022-06-24 12:54:32', 'a:6:{i:5;s:6:\"0.9409\";i:4;s:6:\"0.7933\";i:6;s:6:\"0.7850\";i:1;s:6:\"0.3616\";i:2;s:6:\"0.2400\";i:8;s:6:\"0.2400\";}', 'a:5:{i:1;s:1:\"4\";i:2;s:1:\"3\";i:5;s:1:\"1\";i:7;s:1:\"1\";i:15;s:1:\"4\";}', 5, '0.9409'),
(6, '2022-06-24 12:59:15', 'a:6:{i:5;s:6:\"0.9409\";i:4;s:6:\"0.7933\";i:6;s:6:\"0.7850\";i:1;s:6:\"0.3616\";i:2;s:6:\"0.2400\";i:8;s:6:\"0.2400\";}', 'a:5:{i:1;s:1:\"4\";i:2;s:1:\"3\";i:5;s:1:\"1\";i:7;s:1:\"1\";i:15;s:1:\"4\";}', 5, '0.9409'),
(7, '2022-06-24 13:01:29', 'a:6:{i:6;s:6:\"1.0000\";i:5;s:6:\"0.8419\";i:1;s:6:\"0.5920\";i:4;s:6:\"0.5440\";i:2;s:6:\"0.4000\";i:8;s:6:\"0.4000\";}', 'a:4:{i:1;s:1:\"2\";i:2;s:1:\"1\";i:7;s:1:\"4\";i:16;s:1:\"1\";}', 6, '1.0000'),
(8, '2022-06-24 13:14:30', 'a:1:{i:7;s:6:\"1.0000\";}', 'a:2:{i:19;s:1:\"1\";i:20;s:1:\"3\";}', 7, '1.0000'),
(9, '2022-06-24 13:16:04', 'a:6:{i:8;s:6:\"1.0000\";i:5;s:6:\"0.2400\";i:6;s:6:\"0.2400\";i:1;s:6:\"0.1600\";i:2;s:6:\"0.1600\";i:4;s:6:\"0.1600\";}', 'a:3:{i:2;s:1:\"4\";i:17;s:1:\"1\";i:18;s:1:\"1\";}', 8, '1.0000'),
(10, '2022-06-24 13:25:03', 'a:3:{i:5;s:6:\"0.8400\";i:1;s:6:\"0.6160\";i:6;s:6:\"0.4000\";}', 'a:4:{i:1;s:1:\"1\";i:4;s:1:\"3\";i:5;s:1:\"1\";i:6;s:1:\"1\";}', 5, '0.8400'),
(11, '2022-06-24 15:44:24', 'a:6:{i:1;s:6:\"1.0000\";i:5;s:6:\"0.8400\";i:6;s:6:\"0.7600\";i:2;s:6:\"0.4000\";i:4;s:6:\"0.4000\";i:8;s:6:\"0.4000\";}', 'a:4:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"2\";}', 1, '1.0000'),
(12, '2022-06-24 16:54:20', 'a:6:{i:1;s:6:\"0.9539\";i:5;s:6:\"0.8400\";i:6;s:6:\"0.7600\";i:2;s:6:\"0.4000\";i:4;s:6:\"0.4000\";i:8;s:6:\"0.4000\";}', 'a:4:{i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"2\";i:4;s:1:\"3\";}', 1, '0.9539');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `ket`) VALUES
(1, 'Pasti ya', ''),
(2, 'Hampir pasti ya', ''),
(3, 'Kemungkinan besar ya', ''),
(4, 'Mungkin ya', ''),
(5, 'Tidak tahu', ''),
(6, 'Mungkin tidak', ''),
(7, 'Kemungkinan besar tidak', ''),
(8, 'Hampir pasti tidak', ''),
(9, 'Pasti tidak', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `det_penyakit` varchar(500) NOT NULL,
  `srn_penyakit` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `det_penyakit`, `srn_penyakit`, `gambar`) VALUES
(1, 'Merpati Berak Kapur', 'Penyakit ini dikenal juga dengan nama penyakit Salmonellosis ataupun Pullorum. Penyebab penyakit yaitu salmonella pullorum yang telah menyerang saluran pencernaan, penyakit berak kapur ini memiliki sifat menular.', '1. Pisahkan burung yang sakit di tempat berbeda<br>\r\n2. Berikan anti biotik secara berkala hingga sembuh', 'berakkapur.png'),
(2, 'Merpati Snot Atau Coryza', 'Penyakit ini disebabkna oleh virus Hemophillus Gallinarum. Biasanya menyerang bagian sekitar muka burung, sehinga menyebabkan bengkak dan muncul benjolan yang berwarna merah disekitar hidung, mata dan telinga.', '1. Pisahkan dengan Merpati Lain<br>\r\n2. Kelupas pada bagian yang terserang<br>\r\n3. Berikan Antiseptic Salep pada bagian yang telah di kelupas', 'snotcoryza.jpg'),
(3, 'Merpati Pigeon Pox', 'Pigeon pox merupakan jenis penyakit burung merpati yang disebabkan oleh virus, burung merpati yang terkena virus ini dapat menyebabkan kulit menjadi bengkak kecil - kecil, seperti kutu air.', '1. Pisahkan dengan Merpati Lain\r\n2. Kelupas pada bagian yang terserang\r\n3. Berikan Antiseptic Salep pada bagian yang telah di kelupas', 'pigeonpox.png'),
(4, 'Merpati Newcastle Disease Atau Tetelo', 'Penyakit merpati Newcastle Disease atau sering disebut Tetelo seringkali menyerang burung merpati baik jantan maupun betinanya. Penyebab penyakit pernapasan ini yaitu karena adanya infeksi sekunder pada saluran pernafasan oleh E. coli dan virus sejenis Mycoplasma gallisepticcum yang lebih terkenal dengan nama CRD (Chronic respiratory Disease). ', '1. Burung yang terinfeksi penyakit pernapasan segera diisolasi dikandang tersendiri<br>\r\n2. Sangkar, tempat makan dan tempat minum burung merpati Anda selalu dikontrol dan semua kotoran yang terdapat di dalam sangkar ataupun di dalam wadah makanan atau minuman harus selalu dibersihkan.<br>\r\n3. Berikan minum dengan spet (jangan sampai basah di sekeliling leher)<br>\r\n4. Tusuk lehernya yang bewarna hitam bintik â€“ bintik, disitulah racun ND yang mengendap, jangan lupa memberikan betadine agar tida', 'tetelo.jpg'),
(5, 'Merpati Paratyphoid', 'Penyakit merpati Paratyhoid merupakan bakteri yang menyerang usus pencernaan bahkan dapat menghentikan seketika tak hanya itu virus ini dapat menjalar ke saraf otak, hati dan ginjal. Paratyhoid sangat berbahaya, 5 jam saja bercampur dengan burung yang sudah terkena paratyhoid sudah dapat menularkan ke semua burung.', '1. Menggunakan obat baytril, cara pemakaiannya cukup mudah yaitu dengan 2 – 3 kali tetes setiap hari selama 10 – 15 hari. Baytril sudah banyak dipakai oleh para pemelihara merpati tinggian dan cukup efektif membunuh bakteri paratyhoid.<br>\r\n2. Tambahkan vitamin B dan amoxycilin karena dapat memperkuat tubuh merpati dalam melawan bakteri ini.', 'Paratyhoid.png'),
(6, 'Merpati Cacingan', 'Cacingan merupakan salah satu jenis penyakit yang telah menyerag saluran pencernaan dan hati. Penyebab penyakit merpati cacingan ini biasanya cacing tambang, cacing gilig, cacing pita dan cacing hati.', '1. Penberian Obat cacing<br>\r\n2. Panaskan merpati di Cahaya pagi', 'cacingan.png'),
(7, 'Merpati Bubul', 'Penyebab penyakit bubul ini adalah bakteri Staphylo coccus. Bakteri ini telah menyerang permukaan kulit terutama bagian kulit telapak kaki burung merpati.', '1. Pemberian Obat luka pada bagian yang terkena bubul\r\n2. Pemberian Vitamin ', 'bubul.jpg'),
(8, 'Merpati Trichomoniasis / Canker / Goham', 'Penyakit merpati ini merupakan penyakit yang disebabkan oleh protozoa, sasaran utama adalah burung unggas salah satunya burung merpati. Protozoa adalah micro organisme yang dapat berkembang biak melalui cairan – cairan yang tersentuhnya.', '1. bat yang mengandung Ronidazole, Dimetridazole, Carnidazole dan Metronidazole adalah obat yang dapat menghentikan penyebaran prozoa dapat di beli di apotik. Masa pengobatan membutuhkan waktu lama berkisar 10 – 15 hari.', 'cancer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `kode_post` int(11) NOT NULL,
  `nama_post` varchar(50) NOT NULL,
  `det_post` varchar(15000) NOT NULL,
  `srn_post` varchar(15000) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `kode_post` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
