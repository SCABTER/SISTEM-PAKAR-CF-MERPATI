-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2022 pada 11.49
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merpati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('saka', '01677a6ba542c1b664deb29548cc75cf', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
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
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
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
-- Struktur dari tabel `hasil`
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
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `penyakit`, `gejala`, `hasil_id`, `hasil_nilai`) VALUES
(1, '2022-04-14 16:38:42', 'a:6:{i:8;s:6:\"1.0000\";i:5;s:6:\"0.6000\";i:6;s:6:\"0.6000\";i:1;s:6:\"0.4000\";i:2;s:6:\"0.4000\";i:4;s:6:\"0.4000\";}', 'a:3:{i:2;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"1\";}', 8, '1.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi`
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
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `det_penyakit` varchar(500) NOT NULL,
  `srn_penyakit` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `det_penyakit`, `srn_penyakit`, `gambar`) VALUES
(1, 'Merpati Berak Kapur', 'Penyakit ini dikenal juga dengan nama penyakit Salmonellosis ataupun Pullorum. Penyebab penyakit yaitu salmonella pullorum yang telah menyerang saluran pencernaan, penyakit berak kapur ini memiliki sifat menular.', '1. Pisahkan burung yang sakit di tempat berbeda<br>\r\n2. Berikan anti biotik secara berkala hingga sembuh', 'berakkapur.png'),
(2, 'Merpati Snot Atau Coryza', 'Penyakit ini disebabkna oleh virus Hemophillus Gallinarum. Biasanya menyerang bagian sekitar muka burung, sehinga menyebabkan bengkak dan muncul benjolan yang berwarna merah disekitar hidung, mata dan telinga.', '1. Pisahkan dengan Merpati Lain<br>\r\n2. Kelupas pada bagian yang terserang<br>\r\n3. Berikan Antiseptic Salep pada bagian yang telah di kelupas', 'snotcoryza.jpg'),
(3, 'Merpati Pigeon Pox', 'Pigeon pox merupakan jenis penyakit burung merpati yang disebabkan oleh virus, burung merpati yang terkena virus ini dapat menyebabkan kulit menjadi bengkak kecil - kecil, seperti kutu air.', '1. Pisahkan dengan Merpati Lain\r\n2. Kelupas pada bagian yang terserang\r\n3. Berikan Antiseptic Salep pada bagian yang telah di kelupas', 'pigeonpox.png'),
(4, 'Merpati Newcastle Disease Atau Tetelo', 'Penyakit merpati Newcastle Disease atau sering disebut Tetelo seringkali menyerang burung merpati baik jantan maupun betinanya. Penyebab penyakit pernapasan ini yaitu karena adanya infeksi sekunder pada saluran pernafasan oleh E. coli dan virus sejenis Mycoplasma gallisepticcum yang lebih terkenal dengan nama CRD (Chronic respiratory Disease). ', '1. Burung yang terinfeksi penyakit pernapasan segera diisolasi dikandang tersendiri<br>\r\n2. Sangkar, tempat makan dan tempat minum burung merpati Anda selalu dikontrol dan semua kotoran yang terdapat di dalam sangkar ataupun di dalam wadah makanan atau minuman harus selalu dibersihkan.<br>\r\n3. Berikan minum dengan spet (jangan sampai basah di sekeliling leher)<br>\r\n4. Tusuk lehernya yang bewarna hitam bintik ???????? bintik, disitulah racun ND yang mengendap, jangan lupa memberikan betadine agar tida', 'tetelo.jpg'),
(5, 'Merpati Paratyphoid', 'Penyakit merpati Paratyhoid merupakan bakteri yang menyerang usus pencernaan bahkan dapat menghentikan seketika tak hanya itu virus ini dapat menjalar ke saraf otak, hati dan ginjal. Paratyhoid sangat berbahaya, 5 jam saja bercampur dengan burung yang sudah terkena paratyhoid sudah dapat menularkan ke semua burung.', '1. Menggunakan obat baytril, cara pemakaiannya cukup mudah yaitu dengan 2 ??? 3 kali tetes setiap hari selama 10 ??? 15 hari. Baytril sudah banyak dipakai oleh para pemelihara merpati tinggian dan cukup efektif membunuh bakteri paratyhoid.<br>\r\n2. Tambahkan vitamin B dan amoxycilin karena dapat memperkuat tubuh merpati dalam melawan bakteri ini.', 'Paratyhoid.png'),
(6, 'Merpati Cacingan', 'Cacingan merupakan salah satu jenis penyakit yang telah menyerag saluran pencernaan dan hati. Penyebab penyakit merpati cacingan ini biasanya cacing tambang, cacing gilig, cacing pita dan cacing hati.', '1. Penberian Obat cacing<br>\r\n2. Panaskan merpati di Cahaya pagi', 'cacingan.png'),
(7, 'Merpati Bubul', 'Penyebab penyakit bubul ini adalah bakteri Staphylo coccus. Bakteri ini telah menyerang permukaan kulit terutama bagian kulit telapak kaki burung merpati.', '1. Pemberian Obat luka pada bagian yang terkena bubul\r\n2. Pemberian Vitamin ', 'bubul.jpg'),
(8, 'Merpati Trichomoniasis / Canker / Goham', 'Penyakit merpati ini merupakan penyakit yang disebabkan oleh protozoa, sasaran utama adalah burung unggas salah satunya burung merpati. Protozoa adalah micro organisme yang dapat berkembang biak melalui cairan ??? cairan yang tersentuhnya.', '1. bat yang mengandung Ronidazole, Dimetridazole, Carnidazole dan Metronidazole adalah obat yang dapat menghentikan penyebaran prozoa dapat di beli di apotik. Masa pengobatan membutuhkan waktu lama berkisar 10 ??? 15 hari.', 'cancer.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `kode_post` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
