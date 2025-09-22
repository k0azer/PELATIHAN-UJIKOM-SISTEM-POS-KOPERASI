-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 03:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tipeID` int(11) NOT NULL,
  `subtipeID` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_umum` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`kode_brg`, `nama`, `status`, `tipeID`, `subtipeID`, `satuan`, `harga_umum`, `harga_beli`, `stok`) VALUES
(1, 'Teh Sariwangi', 'AKTIF', 1, 1, 'box', 10000, 7000, 9),
(2, 'Kopi ABC', 'AKTIF', 1, 2, 'bungkus', 12000, 9000, 10),
(3, 'Le Minerale 1.5L', 'AKTIF', 1, 3, 'botol', 6000, 4000, 1016),
(4, 'AQUA 1.5L', 'AKTIF', 1, 3, 'botol', 6000, 3000, 49);

-- --------------------------------------------------------

--
-- Table structure for table `m_customer`
--

CREATE TABLE `m_customer` (
  `id_customer` int(11) NOT NULL,
  `kode_cust` varchar(255) NOT NULL,
  `nama_cust` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_customer`
--

INSERT INTO `m_customer` (`id_customer`, `kode_cust`, `nama_cust`, `alamat`, `status`, `no_telp`) VALUES
(1, 'CUST001', 'Agung', 'Kemang Village Bogor Utara', 'AKTIF', '089582938192'),
(2, 'CUST002', 'Rama', 'Dramaga Cantik No 26', 'AKTIF', '087879239282'),
(3, 'CUST003', 'Sugeng', 'Ciampea Bogor', 'AKTIF', '085959183981');

-- --------------------------------------------------------

--
-- Table structure for table `m_karyawan`
--

CREATE TABLE `m_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_karyawan`
--

INSERT INTO `m_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `office`, `divisi`, `jabatan`, `status`) VALUES
(1, '3201120302032', 'SUGENG GUNANTIO', 'BSS TEKNO', 'IRC', 'IT', 'AKTIF'),
(2, '3201112929192', 'ERSA PUTRI MUHAROM', 'BSS TEKNO', 'IRC', 'IT', 'AKTIF'),
(3, '3202112002323', 'YUDHA EKA SAPUTRA', 'BSS TEKNO', 'IRC', 'IT', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `m_login`
--

CREATE TABLE `m_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_login`
--

INSERT INTO `m_login` (`id`, `username`, `password`, `nickname`, `role`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'stock');

-- --------------------------------------------------------

--
-- Table structure for table `m_penerimaan`
--

CREATE TABLE `m_penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `idBrg` int(11) NOT NULL,
  `idPermintaan` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `noPermintaan` int(11) NOT NULL,
  `noPro` varchar(255) NOT NULL,
  `noSo` varchar(255) NOT NULL,
  `noDo` varchar(255) NOT NULL,
  `jumlahDiterima` int(11) NOT NULL,
  `tanggalDiterima` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_subtipe`
--

CREATE TABLE `m_subtipe` (
  `id_sub` int(11) NOT NULL,
  `tipeID` int(11) NOT NULL,
  `nama_sub` varchar(255) NOT NULL,
  `status_sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_subtipe`
--

INSERT INTO `m_subtipe` (`id_sub`, `tipeID`, `nama_sub`, `status_sub`) VALUES
(1, 1, 'TEH', 'AKTIF'),
(2, 1, 'KOPI', 'AKTIF'),
(3, 1, 'MINERAL', 'AKTIF'),
(4, 5, 'SNACK', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `m_tipe`
--

CREATE TABLE `m_tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL,
  `status_tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_tipe`
--

INSERT INTO `m_tipe` (`id_tipe`, `nama_tipe`, `status_tipe`) VALUES
(1, 'MINUMAN', 'AKTIF'),
(2, 'KEBERSIHAN', 'AKTIF'),
(3, 'PERALATAN', 'AKTIF'),
(4, 'BAHAN MASAK', 'AKTIF'),
(5, 'MAKANAN', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `m_transaksi`
--

CREATE TABLE `m_transaksi` (
  `id_permintaan` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `idSup` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `qty_transaksi` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_transaksi`
--

INSERT INTO `m_transaksi` (`id_permintaan`, `kode_transaksi`, `tgl_transaksi`, `idSup`, `idBarang`, `qty_transaksi`, `subtotal`, `sisa`) VALUES
(108, 2509001, '2025-09-22', 2, 3, 6, 6000, 6),
(109, 2509002, '2025-09-22', 1, 1, 3, 30000, 3),
(110, 2509002, '2025-09-22', 1, 2, 2, 24000, 2),
(111, 2509002, '2025-09-22', 1, 3, 2, 12000, 2),
(112, 2509003, '2025-09-22', 2, 1, 5, 50000, 5),
(113, 2509004, '2025-09-22', 1, 1, 5, 50000, 5),
(114, 2509005, '2025-09-22', 1, 1, 5, 50000, 5),
(115, 2509006, '2025-09-22', 3, 1, 1, 10000, 1),
(116, 2509006, '2025-09-22', 3, 3, 4, 24000, 4),
(117, 2509006, '2025-09-22', 3, 4, 1, 6000, 1),
(118, 2509006, '2025-09-22', 3, 2, 1, 12000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`kode_brg`),
  ADD KEY `FK_tipe` (`tipeID`);

--
-- Indexes for table `m_customer`
--
ALTER TABLE `m_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `m_login`
--
ALTER TABLE `m_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_penerimaan`
--
ALTER TABLE `m_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `m_subtipe`
--
ALTER TABLE `m_subtipe`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `m_tipe`
--
ALTER TABLE `m_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `m_transaksi`
--
ALTER TABLE `m_transaksi`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `kode_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_customer`
--
ALTER TABLE `m_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_karyawan`
--
ALTER TABLE `m_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_login`
--
ALTER TABLE `m_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_penerimaan`
--
ALTER TABLE `m_penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `m_subtipe`
--
ALTER TABLE `m_subtipe`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_tipe`
--
ALTER TABLE `m_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_transaksi`
--
ALTER TABLE `m_transaksi`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
