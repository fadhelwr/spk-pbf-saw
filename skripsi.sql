-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 09:51 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` int(11) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `kategori` varchar(25) DEFAULT NULL,
  `kandungan` text,
  `harga_beli` int(11) NOT NULL,
  `harga_beli_update` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `stok`, `harga_jual`, `kategori`, `kandungan`, `harga_beli`, `harga_beli_update`, `profit`) VALUES
('8992870410121', 'OBH KOMBI DEWASA', 1, 30, 0, 'UMUM', '-', 0, 8500, 0),
('8992870410193', 'IMODIUM', 1, 20, 0, 'UMUM', '-', 0, NULL, 0),
('8993498210230', 'BODREXIN PILEK ALERGI', 1, 10, 0, 'PREKURSOR', '-', 0, 1500, 0),
('8993498210231', 'ANAKONIDIN OBH', 1, 14, 0, 'PREKURSOR', '-', 0, 7500, 0),
('8993498210232', 'DECOLGEN', 1, 0, 0, 'PREKURSOR', '-', 0, 1000, 0),
('8993498210233', 'HUFAGRIP HIJAU', 1, 0, 0, 'UMUM', '-', 0, 2000, 0),
('8993498210234', 'DECOLSIN', 1, 0, 0, 'PREKURSOR', '-', 0, NULL, 0),
('8993498210235', 'FLUCADEX', 1, 0, 0, 'PREKURSOR', '-', 0, NULL, 0),
('8993498210236', 'HUFAGRIP FORTE', 1, 0, 0, 'PREKURSOR', '-', 0, NULL, 0),
('8993498210237', 'PANADOL COLD FLU', 1, 0, 0, 'PREKURSOR', '-', 0, NULL, 0),
('8998777110218', 'NOVADIUM', 1, 0, 0, 'UMUM', '-', 0, 2000, 0),
('8998898151404', 'HUFAGRIP BIRU', 1, 1, 0, 'UMUM', '-', 0, 5000, 0),
('8999908005007', 'VITAMIN B1 IPI 100TAB', 1, 0, 0, 'UMUM', '-', 0, 7500, 0),
('8999908005008', 'MEXYLIN 500MG', 1, 0, 0, 'UMUM', '-', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bentuk_sedia`
--

CREATE TABLE `tb_bentuk_sedia` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan_sedia` varchar(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bentuk_sedia`
--

INSERT INTO `tb_bentuk_sedia` (`id_satuan`, `nama_satuan_sedia`, `keterangan`) VALUES
(1, 'syr', 'Sirup'),
(2, 'tab', 'Tablet'),
(3, 'cap', 'Kapsul'),
(4, 'pil', 'Pil'),
(5, 'sach', 'Sachet');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskon`
--

CREATE TABLE `tb_diskon` (
  `id_kriteria` int(11) NOT NULL,
  `pilihan_kriteria` varchar(20) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `margin` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diskon`
--

INSERT INTO `tb_diskon` (`id_kriteria`, `pilihan_kriteria`, `bobot_kriteria`, `margin`) VALUES
(1, 'Sangat Banyak', 1, '> 10%'),
(2, 'Banyak', 0.75, '> 2,5% - 9%'),
(3, 'Sedikit', 0.25, '1% - 2,5%'),
(4, 'Tidak Ada', 0, '0%');

-- --------------------------------------------------------

--
-- Table structure for table `tb_expired_date`
--

CREATE TABLE `tb_expired_date` (
  `id_c5` int(11) NOT NULL,
  `pilihan_c5` varchar(20) NOT NULL,
  `bobot_c5` double NOT NULL,
  `margin_c5` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_expired_date`
--

INSERT INTO `tb_expired_date` (`id_c5`, `pilihan_c5`, `bobot_c5`, `margin_c5`) VALUES
(1, 'Sangat Lama', 1, '> 12 bulan'),
(2, 'Lama', 0.75, '> 8  bulan - 12 bulan'),
(3, 'Cepat', 0.25, '> 1 bulan - 7 bulan'),
(4, 'Sangat Cepat', 0, '1 bulan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_c6` int(11) NOT NULL,
  `pilihan_c6` varchar(16) NOT NULL,
  `bobot_c6` double NOT NULL,
  `margin_c6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id_c6`, `pilihan_c6`, `bobot_c6`, `margin_c6`) VALUES
(1, 'Murah', 1, ''),
(2, 'Normal', 0.75, ''),
(3, 'Mahal', 0.25, ''),
(4, 'Sangat Mahal', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kemasan`
--

CREATE TABLE `tb_kemasan` (
  `id_c4` int(11) NOT NULL,
  `pilihan_c4` varchar(20) NOT NULL,
  `bobot_c4` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kemasan`
--

INSERT INTO `tb_kemasan` (`id_c4`, `pilihan_c4`, `bobot_c4`) VALUES
(1, 'Sangat Layak', 1),
(2, 'Layak', 0.75),
(3, 'Cukup', 0.25),
(4, 'Tidak Layak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kemudahan_pelayanan`
--

CREATE TABLE `tb_kemudahan_pelayanan` (
  `id_c9` int(11) NOT NULL,
  `pilihan_c9` varchar(16) NOT NULL,
  `bobot_c9` double NOT NULL,
  `margin_c9` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kemudahan_pelayanan`
--

INSERT INTO `tb_kemudahan_pelayanan` (`id_c9`, `pilihan_c9`, `bobot_c9`, `margin_c9`) VALUES
(1, 'Sangat Mudah', 1, ''),
(2, 'Mudah', 0.75, ''),
(3, 'Cukup Mudah', 0.25, ''),
(4, 'Sulit', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kesimpulan`
--

CREATE TABLE `tb_kesimpulan` (
  `kode_nilai` varchar(25) NOT NULL,
  `kode_supplier` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kesimpulan`
--

INSERT INTO `tb_kesimpulan` (`kode_nilai`, `kode_supplier`, `nilai`, `periode`) VALUES
('SPK00001', 3, 0.9, '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketepatan_pesanan`
--

CREATE TABLE `tb_ketepatan_pesanan` (
  `id_c8` int(11) NOT NULL,
  `pilihan_c8` varchar(16) NOT NULL,
  `bobot_c8` double NOT NULL,
  `margin_c8` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ketepatan_pesanan`
--

INSERT INTO `tb_ketepatan_pesanan` (`id_c8`, `pilihan_c8`, `bobot_c8`, `margin_c8`) VALUES
(1, 'Sangat Baik', 1, ''),
(2, 'Baik', 0.75, ''),
(3, 'Kurang Baik', 0.25, ''),
(4, 'Buruk', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketersediaan`
--

CREATE TABLE `tb_ketersediaan` (
  `id_c7` int(11) NOT NULL,
  `pilihan_c7` varchar(16) NOT NULL,
  `bobot_c7` double NOT NULL,
  `margin_c7` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ketersediaan`
--

INSERT INTO `tb_ketersediaan` (`id_c7`, `pilihan_c7`, `bobot_c7`, `margin_c7`) VALUES
(1, 'Sangat Lengkap', 1, ''),
(2, 'Lengkap', 0.75, ''),
(3, 'Cukup Lengkap', 0.25, ''),
(4, 'Tidak Lengkap', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_legalitas`
--

CREATE TABLE `tb_legalitas` (
  `id_c10` int(11) NOT NULL,
  `pilihan_c10` varchar(25) NOT NULL,
  `bobot_c10` double NOT NULL,
  `margin_c10` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_legalitas`
--

INSERT INTO `tb_legalitas` (`id_c10`, `pilihan_c10`, `bobot_c10`, `margin_c10`) VALUES
(1, 'Terdaftar BPOM', 1, ''),
(2, 'Belum Diketahui', 0.75, ''),
(3, 'Diragukan', 0.25, ''),
(4, 'Tidak Terdaftar BPOM', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai_supplier`
--

CREATE TABLE `tb_nilai_supplier` (
  `id_nilai` int(11) NOT NULL,
  `kode_nilai` varchar(15) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `C1` int(11) DEFAULT NULL,
  `C2` int(11) DEFAULT NULL,
  `C3` int(11) DEFAULT NULL,
  `C4` int(11) DEFAULT NULL,
  `C5` int(11) DEFAULT NULL,
  `C6` int(11) DEFAULT NULL,
  `C7` int(11) DEFAULT NULL,
  `C8` int(11) DEFAULT NULL,
  `C9` int(11) DEFAULT NULL,
  `C10` int(11) DEFAULT NULL,
  `tgl_nilai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai_supplier`
--

INSERT INTO `tb_nilai_supplier` (`id_nilai`, `kode_nilai`, `id_supplier`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`, `C7`, `C8`, `C9`, `C10`, `tgl_nilai`) VALUES
(122, 'SPK00001', 1, 2, 2, 2, 4, 2, 2, 2, 4, 2, 2, '2019-01-15'),
(123, 'SPK00001', 2, 3, 3, 2, 2, 3, 3, 3, 2, 3, 3, '2019-01-15'),
(124, 'SPK00001', 3, 3, 3, 4, 2, 1, 3, 1, 2, 3, 1, '2019-01-15'),
(125, 'SPK00001', 4, 4, 3, 2, 3, 2, 2, 2, 3, 3, 4, '2019-01-15'),
(126, 'SPK00001', 5, 3, 2, 3, 4, 3, 3, 3, 4, 2, 3, '2019-01-15'),
(127, 'SPK00001', 6, 4, 3, 4, 3, 4, 2, 4, 3, 3, 1, '2019-01-15'),
(128, 'SPK00001', 7, 4, 2, 3, 4, 2, 1, 2, 4, 2, 4, '2019-01-15'),
(129, 'SPK00001', 10, 4, 3, 3, 4, 3, 3, 3, 4, 3, 4, '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `id` int(11) NOT NULL,
  `kode_trx` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`id`, `kode_trx`, `kode_barcode`, `jumlah`, `id_satuan`, `status`) VALUES
(27, 'SP00001', '8998898151404', 1, 1, 'SUCCESS'),
(53, 'SP00002', '8998898151404', 2, 1, 'SUCCESS'),
(54, 'SP00002', '8999908005008', 3, 1, 'SUCCESS'),
(55, 'SP00002', '8992870410193', 2, 1, 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail_pre`
--

CREATE TABLE `tb_pembelian_detail_pre` (
  `id` int(11) NOT NULL,
  `kode_trx` varchar(20) NOT NULL,
  `kode_barcode` varchar(25) NOT NULL,
  `satuan_sedia` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_detail_pre`
--

INSERT INTO `tb_pembelian_detail_pre` (`id`, `kode_trx`, `kode_barcode`, `satuan_sedia`, `jumlah`, `id_satuan`, `status`) VALUES
(19, 'PR00001', '8993498210231', 1, 2, 2, 'SUCCESS'),
(20, 'PR00001', '8993498210237', 2, 2, 2, 'SUCCESS'),
(30, 'PR00002', '8993498210231', 1, 2, 1, 'SUCCESS'),
(31, 'PR00002', '8993498210235', 1, 5, 1, 'SUCCESS'),
(32, 'PR00002', '8993498210232', 2, 2, 2, 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_tmp`
--

CREATE TABLE `tb_pembelian_tmp` (
  `kode_trx` varchar(50) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_tmp`
--

INSERT INTO `tb_pembelian_tmp` (`kode_trx`, `id_supplier`, `tgl_surat`) VALUES
('SP00001', 22, '2019-01-27'),
('SP00002', 7, '2019-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_tmp_prekursor`
--

CREATE TABLE `tb_pembelian_tmp_prekursor` (
  `kode_trx` varchar(50) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian_tmp_prekursor`
--

INSERT INTO `tb_pembelian_tmp_prekursor` (`kode_trx`, `id_supplier`, `tgl_surat`) VALUES
('PR00001', 1, '2019-01-27'),
('PR00002', 25, '2019-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `nama_satuan`, `keterangan`) VALUES
(1, 'pcs', 'Pieces'),
(2, 'box', 'Box'),
(3, 'cap', 'Kapsul'),
(4, 'btl', 'Botol'),
(5, 'tab', 'Tablet'),
(6, 'amp', 'Ampul'),
(7, 'strip', 'Strip'),
(8, 'sach', 'Sachet'),
(9, 'vial', 'Phiala (Botol Kecil)'),
(10, 'tube', 'Tube');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'PT. DHAINAKO PUTRA SEJATI', 'KARANGANYAR', '-', '-'),
(2, 'PT. PARIT PADANG GLOBAL', 'YOGYAKARTA', '(0274) 4384131', '-'),
(3, 'PT. KIMIA FARMA', 'YOGYAKARTA', '(0274) 371087', '-'),
(4, 'PT. LANGKAH INSAN MANDIRI', 'YOGYAKARTA', '(0274) 6415083', '-'),
(5, 'PT. BINA SAN PRIMA', 'YOGYAKARTA', '(0274) 4438722', '-'),
(6, 'PT. PRADIPTA ADI PASIFIC', 'SURAKARTA', '(0271) 712672', '-'),
(7, 'PT. DAYA MUDA AGUNG', 'YOGYAKARTA', '(0274) 412657', '-'),
(8, 'PT. SUMBER AGUNG SENTOSA', 'SURAKARTA', '-', '-'),
(9, 'PT. ANTARMITRA SEMBADA', 'YOGYAKARTA', '(0274) 7104921', '-'),
(10, 'PT. MENSA BINASUKSES', 'YOGYAKARTA', '(0274) 488338', '-'),
(11, 'PT. MUTIARA REKA SARANA', '-', '-', '-'),
(12, 'PT. SAPTA SARI TAMA', '-', '-', '-'),
(13, 'PT. KONIMEX', '-', '-', '-'),
(14, 'PT. TIRTA HUSADA FARMA', '-', '-', '-'),
(15, 'CV. SINAR GEMILANG', 'PURWOKERTO', '-', '-'),
(16, 'PT. ENSEVAL', '-', '-', '-'),
(17, 'PT. SAI INDONESIA', '-', '-', '-'),
(18, 'CV. MEKAR JAYA SENTOSA', '-', '-', '-'),
(19, 'UD. SARI GUNA', 'PURWOKERTO', '-', '-'),
(20, 'CV. TRIO HUTAMA', 'PURWOREJO', '-', '-'),
(21, 'PT. MARGA NUSANTARA JAYA', 'YOGYAKARTA', '-', '-'),
(22, 'OSAKA GLOBAL MEDICA', 'PURWOKERTO', '-', '-'),
(23, 'GALERI MUSLIM HERBAL', 'PURBALINGGA', '-', '-'),
(24, 'PT. TRITUNGGAL MULIA WISESA', '-', '-', '-'),
(25, 'PT TEMPO', '-', '-', '-'),
(26, 'PT. PENTAVALENT', '-', '-', '-'),
(27, 'INDOFARMA GLOBAL MEDIKA', '-', '-', '-'),
(28, 'GRAHA MEDIKA SURI', '-', '-', '-'),
(29, 'VICTORY INDO PARTNERSHIP', 'YOGYAKARTA', '-', '-'),
(30, 'GAYAMINDO KERTA', 'YOGYAKARTA', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempobayar`
--

CREATE TABLE `tb_tempobayar` (
  `id_c2` int(11) NOT NULL,
  `pilihan_c2` varchar(20) NOT NULL,
  `bobot_c2` double NOT NULL,
  `margin_c2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tempobayar`
--

INSERT INTO `tb_tempobayar` (`id_c2`, `pilihan_c2`, `bobot_c2`, `margin_c2`) VALUES
(1, 'Sangat Lama', 1, '> 30 hari'),
(2, 'Lama', 0.75, '8 hari - 20 hari'),
(3, 'Cepat', 0.25, '2 hari - 7 hari'),
(4, 'Sangat Cepat', 0, '1 hari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sia` varchar(100) NOT NULL,
  `sipa` varchar(100) NOT NULL,
  `tentang` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama`, `password`, `level`, `foto`, `sia`, `sipa`, `tentang`) VALUES
(1, 'admin', 'Juwantina Probowati, S.Farm, Apt', 'admin', 'admin', 'yan.jpg', '195/SIA/BMS/B/IV/2016', '19890503/SIPA_33.02/2017/2207', 'Hai! Tulis biografi atau deskripsi singkat disini! GREAT!!');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktukirim`
--

CREATE TABLE `tb_waktukirim` (
  `id_c3` int(11) NOT NULL,
  `pilihan_c3` varchar(20) NOT NULL,
  `bobot_c3` double NOT NULL,
  `margin_c3` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktukirim`
--

INSERT INTO `tb_waktukirim` (`id_c3`, `pilihan_c3`, `bobot_c3`, `margin_c3`) VALUES
(1, 'Sangat Cepat', 1, '1 hari'),
(2, 'Cepat', 0.75, '2 hari - 7 hari'),
(3, 'Lama', 0.25, '8 hari - 20 hari'),
(4, 'Sangat Lama', 0, '> 30 hari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`),
  ADD KEY `satuan` (`satuan`);

--
-- Indexes for table `tb_bentuk_sedia`
--
ALTER TABLE `tb_bentuk_sedia`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_expired_date`
--
ALTER TABLE `tb_expired_date`
  ADD PRIMARY KEY (`id_c5`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_c6`);

--
-- Indexes for table `tb_kemasan`
--
ALTER TABLE `tb_kemasan`
  ADD PRIMARY KEY (`id_c4`);

--
-- Indexes for table `tb_kemudahan_pelayanan`
--
ALTER TABLE `tb_kemudahan_pelayanan`
  ADD PRIMARY KEY (`id_c9`);

--
-- Indexes for table `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `kode_nilai` (`kode_nilai`,`kode_supplier`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `tb_ketepatan_pesanan`
--
ALTER TABLE `tb_ketepatan_pesanan`
  ADD PRIMARY KEY (`id_c8`);

--
-- Indexes for table `tb_ketersediaan`
--
ALTER TABLE `tb_ketersediaan`
  ADD PRIMARY KEY (`id_c7`);

--
-- Indexes for table `tb_legalitas`
--
ALTER TABLE `tb_legalitas`
  ADD PRIMARY KEY (`id_c10`);

--
-- Indexes for table `tb_nilai_supplier`
--
ALTER TABLE `tb_nilai_supplier`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `C1` (`C1`),
  ADD KEY `C2` (`C2`),
  ADD KEY `C3` (`C3`),
  ADD KEY `C4` (`C4`),
  ADD KEY `C5` (`C5`),
  ADD KEY `kode_nilai` (`kode_nilai`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_trx` (`kode_trx`),
  ADD KEY `kode_barcode` (`kode_barcode`) USING BTREE,
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `tb_pembelian_detail_pre`
--
ALTER TABLE `tb_pembelian_detail_pre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_trx` (`kode_trx`,`kode_barcode`,`id_satuan`),
  ADD KEY `kode_barcode` (`kode_barcode`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `satuan_sedia` (`satuan_sedia`);

--
-- Indexes for table `tb_pembelian_tmp`
--
ALTER TABLE `tb_pembelian_tmp`
  ADD PRIMARY KEY (`kode_trx`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_pembelian_tmp_prekursor`
--
ALTER TABLE `tb_pembelian_tmp_prekursor`
  ADD PRIMARY KEY (`kode_trx`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `tb_tempobayar`
--
ALTER TABLE `tb_tempobayar`
  ADD PRIMARY KEY (`id_c2`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_waktukirim`
--
ALTER TABLE `tb_waktukirim`
  ADD PRIMARY KEY (`id_c3`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bentuk_sedia`
--
ALTER TABLE `tb_bentuk_sedia`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_diskon`
--
ALTER TABLE `tb_diskon`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_expired_date`
--
ALTER TABLE `tb_expired_date`
  MODIFY `id_c5` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_c6` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kemasan`
--
ALTER TABLE `tb_kemasan`
  MODIFY `id_c4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kemudahan_pelayanan`
--
ALTER TABLE `tb_kemudahan_pelayanan`
  MODIFY `id_c9` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ketepatan_pesanan`
--
ALTER TABLE `tb_ketepatan_pesanan`
  MODIFY `id_c8` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ketersediaan`
--
ALTER TABLE `tb_ketersediaan`
  MODIFY `id_c7` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_legalitas`
--
ALTER TABLE `tb_legalitas`
  MODIFY `id_c10` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nilai_supplier`
--
ALTER TABLE `tb_nilai_supplier`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_pembelian_detail_pre`
--
ALTER TABLE `tb_pembelian_detail_pre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_tempobayar`
--
ALTER TABLE `tb_tempobayar`
  MODIFY `id_c2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_waktukirim`
--
ALTER TABLE `tb_waktukirim`
  MODIFY `id_c3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`satuan`) REFERENCES `tb_satuan` (`id_satuan`);

--
-- Constraints for table `tb_nilai_supplier`
--
ALTER TABLE `tb_nilai_supplier`
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_1` FOREIGN KEY (`C1`) REFERENCES `tb_diskon` (`id_kriteria`),
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_3` FOREIGN KEY (`C2`) REFERENCES `tb_tempobayar` (`id_c2`),
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_4` FOREIGN KEY (`C3`) REFERENCES `tb_waktukirim` (`id_c3`),
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_5` FOREIGN KEY (`C4`) REFERENCES `tb_kemasan` (`id_c4`),
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_6` FOREIGN KEY (`C5`) REFERENCES `tb_expired_date` (`id_c5`),
  ADD CONSTRAINT `tb_nilai_supplier_ibfk_7` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`kode_supplier`);

--
-- Constraints for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_1` FOREIGN KEY (`kode_barcode`) REFERENCES `tb_barang` (`kode_barcode`),
  ADD CONSTRAINT `tb_pembelian_detail_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`);

--
-- Constraints for table `tb_pembelian_detail_pre`
--
ALTER TABLE `tb_pembelian_detail_pre`
  ADD CONSTRAINT `tb_pembelian_detail_pre_ibfk_2` FOREIGN KEY (`kode_barcode`) REFERENCES `tb_barang` (`kode_barcode`),
  ADD CONSTRAINT `tb_pembelian_detail_pre_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`),
  ADD CONSTRAINT `tb_pembelian_detail_pre_ibfk_4` FOREIGN KEY (`satuan_sedia`) REFERENCES `tb_bentuk_sedia` (`id_satuan`);

--
-- Constraints for table `tb_pembelian_tmp`
--
ALTER TABLE `tb_pembelian_tmp`
  ADD CONSTRAINT `tb_pembelian_tmp_ibfk_1` FOREIGN KEY (`kode_trx`) REFERENCES `tb_pembelian_detail` (`kode_trx`),
  ADD CONSTRAINT `tb_pembelian_tmp_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`kode_supplier`);

--
-- Constraints for table `tb_pembelian_tmp_prekursor`
--
ALTER TABLE `tb_pembelian_tmp_prekursor`
  ADD CONSTRAINT `tb_pembelian_tmp_prekursor_ibfk_1` FOREIGN KEY (`kode_trx`) REFERENCES `tb_pembelian_detail_pre` (`kode_trx`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
