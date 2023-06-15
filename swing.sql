-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2021 at 08:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwordAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `username`, `passwordAdmin`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blokir`
--

CREATE TABLE `tbl_blokir` (
  `idBlokir` int(11) NOT NULL,
  `idPenjahit` char(6) NOT NULL,
  `idPelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `idFeedback` int(11) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `pesan` varchar(225) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`idFeedback`, `pengirim`, `pesan`, `timestamp`) VALUES
(1, 'yuta', 'good job team!', '2021-01-08 15:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemFoto`
--

CREATE TABLE `tbl_itemFoto` (
  `idItemFoto` int(11) NOT NULL,
  `idPesanan` char(6) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemFoto`
--

INSERT INTO `tbl_itemFoto` (`idItemFoto`, `idPesanan`, `foto`) VALUES
(4, 'P03001', '4a564964bc1f7b7dbc5f837517d9c07e.jpg'),
(5, 'P03001', '4B635941-A0CA-4098-A173-580A714F4A4C.JPEG'),
(6, 'P03001', '4c2c5f71ef88997f5b1d46854a47e1a2.jpg'),
(12, 'P03003', 'ornamen.png'),
(13, 'P03004', 'jaket.png'),
(14, 'P03004', 'sweater.png'),
(15, 'P05001', 'd6c54294c6ddb98c6640ed4bd99542e2.jpg'),
(16, 'P03001', '812287363d1f1120d4529804aae25a15.jpg'),
(17, 'P03001', '812287363d1f1120d4529804aae25a15.jpg'),
(18, 'P03001', 'Design.png'),
(19, 'P03001', '270eec6bdf02e8f6bdf8c4494617637c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemKategori`
--

CREATE TABLE `tbl_itemKategori` (
  `idItemKategori` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `idPenjahit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemKategori`
--

INSERT INTO `tbl_itemKategori` (`idItemKategori`, `idKategori`, `idPenjahit`) VALUES
(1, 2, 5),
(2, 2, 3),
(3, 2, 8),
(4, 3, 4),
(5, 6, 2),
(6, 4, 2),
(7, 8, 6),
(8, 7, 6),
(9, 6, 6),
(10, 9, 7),
(11, 4, 7),
(12, 2, 1),
(13, 3, 1),
(14, 2, 12),
(15, 6, 12),
(16, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemNamaUkuran`
--

CREATE TABLE `tbl_itemNamaUkuran` (
  `idItemNamaUkuran` int(11) NOT NULL,
  `namaUkuran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemNamaUkuran`
--

INSERT INTO `tbl_itemNamaUkuran` (`idItemNamaUkuran`, `namaUkuran`) VALUES
(1, ' Ling Badan'),
(2, 'Lingkar Pinggang'),
(3, 'Panjang Muka'),
(4, 'Lebar Muka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemPesan`
--

CREATE TABLE `tbl_itemPesan` (
  `idItemPesan` int(11) NOT NULL,
  `idPesan` int(11) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pengirim` varchar(10) NOT NULL,
  `cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemPesan`
--

INSERT INTO `tbl_itemPesan` (`idItemPesan`, `idPesan`, `pesan`, `tanggal`, `pengirim`, `cek`) VALUES
(1, 34, 'c', '2020-12-23 18:04:59', 'pelanggan', 0),
(2, 34, 'e', '2020-12-23 18:05:02', 'pelanggan', 0),
(3, 34, 'ddadsd', '2020-12-23 18:05:17', 'pelanggan', 0),
(4, 34, 'qsqsqsqsqs', '2020-12-23 18:05:39', 'pelanggan', 0),
(5, 33, 'dcdcdcd', '2020-12-23 21:39:31', 'pelanggan', 0),
(6, 33, 'cdcdcdc', '2020-12-23 21:39:33', 'pelanggan', 0),
(7, 33, 'cdcdc', '2020-12-23 21:39:34', 'penjahit', 0),
(8, 33, 'ee', '2020-12-23 22:52:23', 'pelanggan', 0),
(9, 33, 'halo', '2020-12-23 22:55:13', 'pelanggan', 0),
(10, 33, 's', '2020-12-23 23:16:31', 'pelanggan', 0),
(11, 33, 'sss', '2020-12-23 23:16:35', 'pelanggan', 0),
(12, 33, 'ccc', '2020-12-23 23:18:10', 'pelanggan', 0),
(13, 35, 't', '2020-12-23 23:34:37', 'penjahit', 0),
(14, 35, 't', '2020-12-23 23:34:46', 'penjahit', 0),
(15, 36, 'd', '2020-12-23 23:37:23', 'pelanggan', 0),
(16, 36, 'Halo', '2020-12-23 23:37:32', 'pelanggan', 0),
(17, 36, 'Selamat malam', '2020-12-24 00:50:07', 'pelanggan', 0),
(18, 33, '', '2020-12-26 17:19:48', 'penjahit', 0),
(19, 33, 'ddsds', '2020-12-26 17:19:58', 'penjahit', 0),
(20, 33, '', '2020-12-26 17:21:30', 'penjahit', 0),
(21, 33, 'haloaaa', '2020-12-26 17:21:57', 'pelanggan', 0),
(22, 33, 'holl', '2020-12-26 17:22:10', 'penjahit', 0),
(23, 33, '', '2020-12-26 17:23:17', 'penjahit', 0),
(24, 33, '', '2020-12-26 17:24:29', 'penjahit', 0),
(25, 36, 'Selamat malam ada yang bisa kami bantu?', '2020-12-26 18:53:12', 'penjahit', 0),
(26, 33, 'dududu', '2020-12-26 18:57:27', 'pelanggan', 0),
(27, 36, 'Bagaimana kabar?', '2020-12-26 20:21:14', 'penjahit', 0),
(28, 33, 'hei balas', '2020-12-26 20:22:15', 'pelanggan', 0),
(29, 33, 'iya gimana?', '2020-12-26 20:22:40', 'penjahit', 0),
(30, 36, 'huuu', '2020-12-26 20:23:00', 'penjahit', 0),
(31, 33, 'dd', '2020-12-26 20:23:48', 'penjahit', 0),
(32, 33, 'cc', '2020-12-26 20:25:12', 'penjahit', 0),
(33, 36, 'dd', '2020-12-26 20:26:27', 'penjahit', 0),
(34, 34, 'halo', '2020-12-26 21:22:42', 'pelanggan', 0),
(35, 33, 'yes', '2020-12-26 21:22:56', 'pelanggan', 0),
(36, 33, 'hai', '2020-12-29 17:58:41', 'pelanggan', 0),
(37, 33, 'hola\n', '2020-12-29 18:21:42', 'pelanggan', 0),
(38, 34, 'selamat malam', '2020-12-29 18:27:30', 'pelanggan', 0),
(39, 33, 's', '2020-12-29 18:28:24', 'pelanggan', 0),
(40, 33, 'whyyy?', '2020-12-29 19:03:12', 'pelanggan', 0),
(41, 33, 'halo', '2020-12-30 12:38:22', 'penjahit', 0),
(42, 33, 'hi', '2020-12-30 12:43:05', 'pelanggan', 0),
(43, 33, 'ddd', '2020-12-30 12:43:46', 'pelanggan', 0),
(44, 34, 'halo', '2021-01-01 17:05:47', 'penjahit', 0),
(45, 34, 'huu', '2021-01-01 17:11:28', 'penjahit', 0),
(46, 34, 'hai juga', '2021-01-01 17:13:34', 'pelanggan', 0),
(47, 34, 'ya', '2021-01-01 17:16:03', 'penjahit', 0),
(48, 34, 'huu', '2021-01-01 17:16:48', 'pelanggan', 0),
(49, 33, 'hi', '2021-01-02 08:47:23', 'penjahit', 0),
(50, 33, 'hui', '2021-01-02 08:47:41', 'pelanggan', 0),
(51, 33, 'halo', '2021-01-03 14:58:47', 'pelanggan', 0),
(52, 33, 'halo juga', '2021-01-03 14:59:04', 'penjahit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemUkuran`
--

CREATE TABLE `tbl_itemUkuran` (
  `idItemUkuran` int(11) NOT NULL,
  `idUkuran` int(11) NOT NULL,
  `idItemNamaUkuran` int(11) NOT NULL,
  `nilaiUkuran` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_itemUkuran`
--

INSERT INTO `tbl_itemUkuran` (`idItemUkuran`, `idUkuran`, `idItemNamaUkuran`, `nilaiUkuran`) VALUES
(5, 3, 1, 88),
(7, 3, 3, 32),
(9, 4, 1, 88),
(11, 4, 3, 32),
(14, 3, 2, 68),
(15, 4, 1, 21),
(16, 4, 2, 88),
(17, 4, 4, 68),
(18, 5, 1, 90),
(19, 5, 2, 40),
(20, 5, 3, 20),
(21, 6, 1, 60),
(22, 6, 2, 40),
(23, 6, 3, 20),
(24, 7, 1, 104),
(25, 7, 2, 70),
(26, 7, 4, 20),
(27, 8, 1, 200),
(28, 8, 2, 100),
(30, 8, 3, 30),
(31, 3, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_katalog`
--

CREATE TABLE `tbl_katalog` (
  `idKatalog` char(6) NOT NULL,
  `idPenjahit` int(11) NOT NULL,
  `namaKatalog` varchar(40) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_katalog`
--

INSERT INTO `tbl_katalog` (`idKatalog`, `idPenjahit`, `namaKatalog`, `foto`, `deskripsi`, `status`) VALUES
('K01001', 1, 'Baju strowbery', 'stroberydress.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint eos molestiae inventore modi aliquam culpa impedit provident deserunt perspiciatis consectetur quo et dolores unde officia, eaque incidunt! Quaerat, pariatur voluptate?', 1),
('K01002', 1, 'Black Tuxedo', 'kemeja.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint eos molestiae inventore modi aliquam culpa impedit provident deserunt perspiciatis consectetur quo et dolores unde officia, eaque incidunt! Quaerat, pariatur voluptate?', 1),
('K01003', 1, 'Gamis Brokat', 'gamis.png', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint eos molestiae inventore modi aliquam culpa impedit provident deserunt perspiciatis consectetur quo et dolores unde officia, eaque incidunt! Quaerat, pariatur voluptate?', 1),
('K01004', 1, 'Kemeja Pendek Merah Muda dan Biru', 'HAN10.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint eos molestiae inventore modi aliquam culpa impedit provident deserunt perspiciatis consectetur quo et dolores unde officia, eaque incidunt! Quaerat, pariatur voluptate?', 1),
('K01005', 1, 'Floral Dress', 'istlivdress_cpastelfloralprint.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint eos molestiae inventore modi aliquam culpa impedit provident deserunt perspiciatis consectetur quo et dolores unde officia, eaque incidunt! Quaerat, pariatur voluptate?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`idKategori`, `namaKategori`) VALUES
(2, '  Baju Pesta'),
(3, ' Baju Sekolah'),
(4, 'Kemeja'),
(5, 'Gaun'),
(6, 'Gaun Pernikahan'),
(7, ' Baju Harian'),
(8, 'Kostum Panggung'),
(9, 'Busana Muslim'),
(10, 'Baju Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `idKurir` int(11) NOT NULL,
  `namaKurir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`idKurir`, `namaKurir`) VALUES
(2, 'JNE'),
(3, 'Pos'),
(4, 'Tiki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metodeBayar`
--

CREATE TABLE `tbl_metodeBayar` (
  `idMetodeBayar` int(11) NOT NULL,
  `namaMetode` varchar(30) NOT NULL,
  `rekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_metodeBayar`
--

INSERT INTO `tbl_metodeBayar` (`idMetodeBayar`, `namaMetode`, `rekening`) VALUES
(2, ' BRI (cek manual)', '0000123311'),
(3, 'Mandiri (cek manual)', '00000000000012'),
(4, 'OVO', '082761992099999'),
(5, 'BNI (cek manual)', '08276199212121');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_kota` varchar(30) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jenisKelamin` char(1) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `statusAktif` tinyint(1) NOT NULL,
  `tglDaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`idPelanggan`, `username`, `password`, `nama`, `alamat`, `id_kota`, `id_provinsi`, `nohp`, `email`, `jenisKelamin`, `foto`, `statusAktif`, `tglDaftar`) VALUES
(3, 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'Kim Do Woon', 'Jl indulu aja RT 01/RW 07                         ', '39', 5, '08912345678', 'day6do@gmail.com', 'L', 'dowoonww.jpeg', 1, '2020-12-07'),
(4, 'winwin', '81dc9bdb52d04dc20036dbd8313ed055', 'Dong Si Cheng', 'Jl Work It', '153', 6, '08712345678', 'winwin@nct.com', 'L', '84320886d58733930da6806315547734.jpg', 1, '2020-12-12'),
(5, 'yamazaki', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdul Yamazaki', 'Jl Kebun Teh                            ', '210', 5, '087682912212', 'yama@gmail.com', 'L', 'yama.jpg', 1, '2020-12-12'),
(6, 'nana', '81dc9bdb52d04dc20036dbd8313ed055', 'Nana Jjang', 'jl Sini Aja', '39', 5, '08654312922', 'nana@jjang.com', 'P', '84320886d58733930da6806315547734.jpg', 1, '2020-12-12'),
(7, 'marklee', '81dc9bdb52d04dc20036dbd8313ed055', 'Lee min hyung', 'Jl long asss ride', '153', 6, '0862512123131', 'mark@nct.com', 'L', 'Mark-Neverland.jpg', 1, '2020-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `idPembayaran` char(6) NOT NULL,
  `idPesanan` char(6) NOT NULL,
  `idMetodeBayar` int(11) NOT NULL,
  `biayaKirim` int(11) NOT NULL,
  `totalBayar` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `statusBayar` char(1) NOT NULL,
  `tglBayar` datetime NOT NULL,
  `cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`idPembayaran`, `idPesanan`, `idMetodeBayar`, `biayaKirim`, `totalBayar`, `bukti`, `statusBayar`, `tglBayar`, `cek`) VALUES
('B03001', 'P03001', 2, 12000, 200000, '84320886d58733930da6806315547734.jpg', 'S', '2021-01-04 20:44:02', 3),
('B03002', 'P03002', 2, 20000, 120000, 'ulasan.png', 'S', '2020-12-30 10:29:24', 3),
('B03003', 'P03003', 4, 12000, 80000, 'logo.png', 'S', '2021-01-01 16:54:19', 3),
('B03004', 'P03004', 5, 12000, 140000, 'pendaftaran 1.png', 'S', '2021-01-02 02:08:23', 3),
('B03005', 'P03005', 4, 14000, 230000, 'Screen Shot 2020-12-28 at 12.42.45.png', 'S', '2021-01-03 14:33:42', 3),
('B03006', 'P03006', 4, 14000, 50000, 'a387ac2866cdfef55c8992ae19cc2eff.jpg', 'B', '2021-01-16 13:36:11', 1),
('B05001', 'P05001', 0, 0, 50000, '', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjahit`
--

CREATE TABLE `tbl_penjahit` (
  `idPenjahit` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `idKecamatan` int(11) NOT NULL,
  `idKelurahan` varchar(15) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `kodeBank` varchar(3) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `hargaMinimal` int(11) NOT NULL,
  `kuotaPesanan` int(11) NOT NULL,
  `statusAktif` tinyint(1) NOT NULL,
  `tglDaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjahit`
--

INSERT INTO `tbl_penjahit` (`idPenjahit`, `username`, `password`, `nama`, `alamat`, `idKecamatan`, `idKelurahan`, `nohp`, `email`, `deskripsi`, `kodeBank`, `rekening`, `foto`, `hargaMinimal`, `kuotaPesanan`, `statusAktif`, `tglDaftar`) VALUES
(1, 'penjahit', '81dc9bdb52d04dc20036dbd8313ed055', 'Rapi Modiste', 'Jln.Manut No.2 CondongCatur                                 ', 340207, '3402070002', '081222122', 'swing@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex veritatis porro sit, qui quae impedit sunt accusamus, ipsam et reprehenderit delectus totam optio rerum quo quisquam exercitationem libero voluptas provident.                                                                                                                                                                                                                                                                        ', '002', '081792182912', 'fashion111.jpg', 24000, 23, 1, '2020-11-02'),
(2, 'modistenoona', '81dc9bdb52d04dc20036dbd8313ed055', 'Modiste Noona', 'Jl nggak tahu                                             ', 340206, '3402060004', '08712345172', 'noonamodiste@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using                                            ', '002', '00000000000011', 'Modiste-001.jpg', 40000, 30, 1, '2020-12-07'),
(3, 'pickyfashion', '81dc9bdb52d04dc20036dbd8313ed055', 'Modiste Picky', 'Jl Ngawurr                                            ', 340206, '3402060004', '0896527111209', 'picky@gmail.com', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque veritatis reiciendis possimus, sed, illo quo voluptate placeat magnam rerum adipisci soluta sit aliquam eveniet, voluptates iure qui dicta quae. Necessitatibus.                                            ', '008', '00000000000012', 'shutterstock_655460896.jpg', 40000, 30, 1, '2020-12-07'),
(4, 'cantikafashion', '81dc9bdb52d04dc20036dbd8313ed055', 'Cantika Fashion', 'Jl Kauman                                            ', 340206, '3402060004', '0896527111209', 'cantika@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using                                             ', '002', '00000000000011', 'Butik-Modiste-Konveksi-000.jpg', 40000, 20, 1, '2020-12-07'),
(5, 'bubufashion', '81dc9bdb52d04dc20036dbd8313ed055', 'Fashion Bubu', 'Jl Gunung Selatan                                           ', 340206, '3402060004', '0896527111209', 'bubu@gmail.com', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque veritatis reiciendis possimus, sed, illo quo voluptate placeat magnam rerum adipisci soluta sit aliquam eveniet, voluptates iure qui dicta quae. Necessitatibus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque veritatis reiciendis possimus, sed, illo quo voluptate placeat magnam rerum adipisci soluta sit aliquam eveniet, voluptates iure qui dicta quae. Necessitatibus.                                            ', '002', '00000000000011', '1468500991-.jpg', 30000, 20, 1, '2020-12-07'),
(6, 'butiktaktok', '81dc9bdb52d04dc20036dbd8313ed055', 'Butik TakTok', 'Jl Bantul km 1                                            ', 340206, '3402060004', '0896527111209', 'butiktaktok@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using                                            ', '', '00000000000011', 'pemesanan-kaus-pilkada-di-bandung_20180314_200240.jpg', 30000, 30, 1, '2020-12-07'),
(7, 'doyoumodiste', '81dc9bdb52d04dc20036dbd8313ed055', 'Modiste DoYou', 'Jl. Bantul km 12                                            ', 340206, '3402060004', '089652778900', 'doyou@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using                                            ', '009', '00000000000011', 'how-to-find-a-tailor.jpg', 30000, 30, 1, '2020-12-07'),
(8, 'injunpenjahit', '81dc9bdb52d04dc20036dbd8313ed055', 'Penjahit Renjun', 'Jl Condog catur                                            ', 340206, '3402060004', '089652778900', 'renjun@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit ipsa commodi eius quibusdam cumque laudantium necessitatibus repellat veritatis, eum perspiciatis eos totam placeat adipisci optio, omnis dolorum quaerat quod excepturi?                                            ', '008', '00000000000014', '0_NiEegp6FHbSHa8ZY.jpg', 40000, 20, 1, '2020-12-07'),
(9, 'lucastailor', '81dc9bdb52d04dc20036dbd8313ed055', 'Lucas Tailor', 'Jl Mangga', 340206, '3402060004', '097651283939', 'lucas@gmail.com', '', '', '', 'love_PNG85.png', 0, 0, 1, '2020-12-07'),
(10, 'wonpilya', '81dc9bdb52d04dc20036dbd8313ed055', 'Penjahit Wonpil', 'Jl jogka', 340206, '3402060004', '0896527111209', 'pilpil@gmail.com', '', '', '', 'doyy.jpg', 0, 0, 1, '2020-12-07'),
(11, 'lovetailor', '81dc9bdb52d04dc20036dbd8313ed055', 'Penjahit Love', 'Jl kauman', 340206, '3402060004', '089652778900', 'love@gmail.com', '', '', '', 'plus.png', 0, 0, 1, '2020-12-07'),
(12, 'irenemodiste', '81dc9bdb52d04dc20036dbd8313ed055', 'Irene Modiste', 'Jl Parangtritis KM 8', 340205, '3402050003', '0896527111209', 'irene@gmail.com', 'Jasa Jahit profesional', '008', '00000000000012', 'irenemodisre.png', 100000, 30, 1, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `idPesan` int(11) NOT NULL,
  `idPenjahit` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `waktuTerakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`idPesan`, `idPenjahit`, `idPelanggan`, `status`, `waktuTerakhir`) VALUES
(33, 1, 3, 3, '2021-01-03 14:59:04'),
(34, 2, 3, 1, '2021-01-01 17:16:48'),
(36, 1, 4, 1, '2020-12-26 20:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `idPesanan` char(6) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `idPenjahit` int(11) NOT NULL,
  `idKatalog` char(6) DEFAULT NULL,
  `idKategori` int(11) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `jenisKelamin` char(1) NOT NULL,
  `idUkuran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bahan` varchar(1) NOT NULL,
  `kurirKirim` varchar(50) NOT NULL,
  `konfirmasiBahan` int(11) NOT NULL,
  `tglOrder` date NOT NULL,
  `tglSelesai` date NOT NULL,
  `statusPesanan` varchar(15) NOT NULL,
  `idKurir` int(11) NOT NULL,
  `detailKurir` varchar(20) NOT NULL,
  `resi` varchar(20) NOT NULL,
  `cek` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`idPesanan`, `idPelanggan`, `idPenjahit`, `idKatalog`, `idKategori`, `deskripsi`, `jenisKelamin`, `idUkuran`, `jumlah`, `bahan`, `kurirKirim`, `konfirmasiBahan`, `tglOrder`, `tglSelesai`, `statusPesanan`, `idKurir`, `detailKurir`, `resi`, `cek`, `timestamp`) VALUES
('P03001', 3, 1, '', 2, 'Saya ingin baju seperti itu', 'P', 4, 1, '', '', 0, '2020-12-26', '2021-01-04', 'U', 2, 'CTC', 'fhddhfdhhh', 1, '2021-01-04 13:58:26'),
('P03002', 3, 1, 'K01001', 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit iure inventore enim ratione culpa saepe mollitia voluptatibus tenetur eligendi. Doloremque ipsa cumque, nesciunt praesentium molestiae ab expedita porro laborum doloribus!', 'P', 3, 1, '', '', 0, '2020-12-26', '2021-01-08', 'S', 3, 'Express Next Day Bar', '', 3, '2021-01-08 16:03:16'),
('P03003', 3, 2, '', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae quibusdam tempora impedit veritatis, nihil soluta earum in libero dolor magnam, qui error accusamus. Ea rerum neque nostrum sapiente quaerat animi.', 'L', 6, 1, '', '', 0, '2021-01-01', '2021-01-01', 'U', 2, 'CTC', '232324234221', 1, '2021-01-01 09:49:37'),
('P03004', 3, 1, '', 4, 'Bahan wol premium warna hitam', 'L', 4, 1, '', '', 0, '2021-01-01', '2021-01-02', 'U', 2, 'CTC', 'ftf4644545', 1, '2021-01-01 18:52:12'),
('P03005', 3, 1, 'K01002', 4, 'Tuxedo warna hitam persis dengan gambar katalog', 'L', 4, 1, '', '', 0, '2021-01-03', '2021-01-08', 'K', 3, 'Paket Kilat Khusus', 'DPS2207149', 3, '2021-01-08 16:07:23'),
('P05001', 5, 3, '', 7, 'Baju simpel', 'P', 8, 1, 'Y', 'GO send', 1, '2021-01-03', '2021-01-09', 'MB', 0, '', '', 3, '2021-01-03 15:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ukuran`
--

CREATE TABLE `tbl_ukuran` (
  `idUkuran` int(11) NOT NULL,
  `idPenjahit` int(11) NOT NULL,
  `size` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ukuran`
--

INSERT INTO `tbl_ukuran` (`idUkuran`, `idPenjahit`, `size`) VALUES
(3, 1, 'S'),
(4, 1, 'M'),
(5, 2, 'S'),
(6, 2, 'M'),
(7, 1, 'L'),
(8, 3, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `idUlasan` int(11) NOT NULL,
  `idPesanan` char(6) NOT NULL,
  `ulasan` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL,
  `fotoReview` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ulasan`
--

INSERT INTO `tbl_ulasan` (`idUlasan`, `idPesanan`, `ulasan`, `nilai`, `fotoReview`) VALUES
(1, 'P03003', 'Bagus jahitannya rapi', 5, 'bea47ada-f254-4c89-9400-809b9055e11b.JPG'),
(3, 'P03004', 'Bagus jahitan rapi ukuran pas', 5, 'e524b1568c59d81c64c0a125b5ac09eb.jpg'),
(5, 'P03005', 'GoodJob bagus banget ', 5, 'dowoonsuit.jpg'),
(6, 'P03001', 'bcbbcb', 5, '84320886d58733930da6806315547734.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_blokir`
--
ALTER TABLE `tbl_blokir`
  ADD PRIMARY KEY (`idBlokir`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`idFeedback`);

--
-- Indexes for table `tbl_itemFoto`
--
ALTER TABLE `tbl_itemFoto`
  ADD PRIMARY KEY (`idItemFoto`);

--
-- Indexes for table `tbl_itemKategori`
--
ALTER TABLE `tbl_itemKategori`
  ADD PRIMARY KEY (`idItemKategori`);

--
-- Indexes for table `tbl_itemNamaUkuran`
--
ALTER TABLE `tbl_itemNamaUkuran`
  ADD PRIMARY KEY (`idItemNamaUkuran`);

--
-- Indexes for table `tbl_itemPesan`
--
ALTER TABLE `tbl_itemPesan`
  ADD PRIMARY KEY (`idItemPesan`);

--
-- Indexes for table `tbl_itemUkuran`
--
ALTER TABLE `tbl_itemUkuran`
  ADD PRIMARY KEY (`idItemUkuran`);

--
-- Indexes for table `tbl_katalog`
--
ALTER TABLE `tbl_katalog`
  ADD PRIMARY KEY (`idKatalog`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`idKurir`);

--
-- Indexes for table `tbl_metodeBayar`
--
ALTER TABLE `tbl_metodeBayar`
  ADD PRIMARY KEY (`idMetodeBayar`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`idPembayaran`);

--
-- Indexes for table `tbl_penjahit`
--
ALTER TABLE `tbl_penjahit`
  ADD PRIMARY KEY (`idPenjahit`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`idPesan`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`idPesanan`);

--
-- Indexes for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  ADD PRIMARY KEY (`idUkuran`);

--
-- Indexes for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`idUlasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blokir`
--
ALTER TABLE `tbl_blokir`
  MODIFY `idBlokir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_itemFoto`
--
ALTER TABLE `tbl_itemFoto`
  MODIFY `idItemFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_itemKategori`
--
ALTER TABLE `tbl_itemKategori`
  MODIFY `idItemKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_itemNamaUkuran`
--
ALTER TABLE `tbl_itemNamaUkuran`
  MODIFY `idItemNamaUkuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_itemPesan`
--
ALTER TABLE `tbl_itemPesan`
  MODIFY `idItemPesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_itemUkuran`
--
ALTER TABLE `tbl_itemUkuran`
  MODIFY `idItemUkuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `idKurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_metodeBayar`
--
ALTER TABLE `tbl_metodeBayar`
  MODIFY `idMetodeBayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_penjahit`
--
ALTER TABLE `tbl_penjahit`
  MODIFY `idPenjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `idPesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_ukuran`
--
ALTER TABLE `tbl_ukuran`
  MODIFY `idUkuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `idUlasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
