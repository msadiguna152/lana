-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Des 2021 pada 00.52
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekatalog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_bazar`
--

CREATE TABLE `jadwal_bazar` (
  `id_jadwal_bazar` int(11) NOT NULL,
  `tanggal_bazar` date NOT NULL,
  `waktu_mulai` varchar(10) NOT NULL,
  `waktu_selesai` varchar(10) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat_tempat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_bazar`
--

INSERT INTO `jadwal_bazar` (`id_jadwal_bazar`, `tanggal_bazar`, `waktu_mulai`, `waktu_selesai`, `nama_tempat`, `alamat_tempat`, `keterangan`) VALUES
(1, '2021-12-29', '10:00', '17:00', 'Pelaihari', 'Pelaihari Kota', 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL,
  `nama_jenis_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id_jenis_produk`, `nama_jenis_produk`) VALUES
(1, 'Minuman'),
(2, 'Makanan'),
(4, 'Pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_satuan`
--

CREATE TABLE `jenis_satuan` (
  `id_jenis_satuan` int(11) NOT NULL,
  `nama_jenis_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_satuan`
--

INSERT INTO `jenis_satuan` (`id_jenis_satuan`, `nama_jenis_satuan`) VALUES
(1, 'Kg'),
(2, 'Liter'),
(4, 'Meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `foto_pengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `no_telpon`, `foto_pengguna`) VALUES
(1, 'Adiguna', '1', '1', 'Admin', '085245462842', 'profil.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuplai`
--

CREATE TABLE `penyuplai` (
  `id_penyuplai` int(11) NOT NULL,
  `nama_penyuplai` varchar(100) NOT NULL,
  `alamat_penyuplai` text NOT NULL,
  `no_penyuplai` varchar(15) NOT NULL,
  `jk_penyuplai` varchar(15) NOT NULL,
  `status_penyuplai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyuplai`
--

INSERT INTO `penyuplai` (`id_penyuplai`, `nama_penyuplai`, `alamat_penyuplai`, `no_penyuplai`, `jk_penyuplai`, `status_penyuplai`) VALUES
(1, 'Adiguna', 'Ds. Sarikandi', '085245462842', 'Laki-laki', 'Aktif'),
(2, 'Adiguna', 'Ds Sarikandi', '0852454628422', 'Laki-laki', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_jenis_produk` int(11) NOT NULL,
  `id_jenis_satuan` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `promo` varchar(10) NOT NULL,
  `terlaris` varchar(10) NOT NULL,
  `detail_produk` text NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_jenis_produk`, `id_jenis_satuan`, `nama_produk`, `stok`, `foto_produk`, `promo`, `terlaris`, `detail_produk`, `harga`) VALUES
(1, 1, 1, 'Jamu', '3', '11.png', 'Tidak', 'Ya', 'Jamu Kunyit', '20000'),
(2, 2, 1, 'Gula Merah', '140', 'among-us-neon-ios-games-android-games-pc-games-black-4200x2428-3950.png', 'Ya', 'Ya', 'Gula terbuat dari pohon aren asli', '12000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_keluar`
--

CREATE TABLE `produk_keluar` (
  `id_produk_keluar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `stok_keluar` varchar(50) NOT NULL,
  `id_jadwal_bazar` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_keluar`
--

INSERT INTO `produk_keluar` (`id_produk_keluar`, `id_produk`, `tanggal_keluar`, `stok_keluar`, `id_jadwal_bazar`, `keterangan`) VALUES
(1, 1, '2021-12-29', '200', 1, '12345');

--
-- Trigger `produk_keluar`
--
DELIMITER $$
CREATE TRIGGER `produk_keluar` BEFORE INSERT ON `produk_keluar` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok - NEW.stok_keluar
    WHERE id_produk =  NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_penyuplai` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `stok_masuk` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_penyuplai`, `id_produk`, `stok_masuk`, `tanggal_masuk`, `keterangan`) VALUES
(1, 1, 1, '200', '2021-12-29', 'Barang Masuk V2'),
(3, 2, 2, '20', '2021-12-29', '123'),
(4, 2, 2, '20', '2021-12-29', '123'),
(5, 1, 1, '200', '2021-12-29', 'mmm');

--
-- Trigger `produk_masuk`
--
DELIMITER $$
CREATE TRIGGER `produk_masuk` AFTER INSERT ON `produk_masuk` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok + NEW.stok_masuk
    WHERE id_produk =  NEW.id_produk;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_bazar`
--
ALTER TABLE `jadwal_bazar`
  ADD PRIMARY KEY (`id_jadwal_bazar`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id_jenis_produk`);

--
-- Indexes for table `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  ADD PRIMARY KEY (`id_jenis_satuan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyuplai`
--
ALTER TABLE `penyuplai`
  ADD PRIMARY KEY (`id_penyuplai`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  ADD PRIMARY KEY (`id_produk_keluar`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_bazar`
--
ALTER TABLE `jadwal_bazar`
  MODIFY `id_jadwal_bazar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  MODIFY `id_jenis_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyuplai`
--
ALTER TABLE `penyuplai`
  MODIFY `id_penyuplai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_produk_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
