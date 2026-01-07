-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jun 2022 pada 04.13
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekatalog1`
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
(2, '2021-11-25', '09:00', '11:00', 'BALAI DESA BATU LAKI', 'KEC. PADANG BATUNG', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(3, '2021-11-18', '09:00', '11:00', 'BALAI DESA KARANG BULAN', 'KEC. KALUMPANG', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(4, '2021-11-11', '09:00', '11:00', 'BALAI DESA ULIN', 'KEC. SIMPUR', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(5, '2021-11-02', '09:00', '11:30', 'BALAI DESA HAMAYUNG', 'KEC. DAHA UTARA', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(6, '2021-10-26', '09:00', '11:00', 'BALAI DESA BAJAYAU TENGAH', 'KEC. DAHA BARAT', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(7, '2021-10-21', '09:00', '11:00', 'BALAI DESA TANIRAN KUBAH', 'KEC. ANGKINANG', 'GEBYAR GELAR PANGAN MURAH TTI (Menyambut HUT Ke-71 Kabupaten Hulu Sungai Selatan'),
(8, '2022-04-28', '09:00', '11:00', 'DEPAN KANTOR KECAMATAN PADANG BATUNG', 'KEC. PADANG BATUNG', 'BAZAR SEHATI GELAR PANGAN MURAH TTI'),
(9, '2022-04-26', '09:00', '11:00', 'BALAI DESA BALANTI', 'KEC. KALUMPANG', 'BAZAR SEHATI GELAR PANGAN MURAH TTI'),
(10, '2022-04-21', '09:00', '11:00', 'BALAI DESA ANGKINANG (SUNGAI HANYAR)', 'KEC. ANGKINANG', 'BAZAR SEHATI GELAR PANGAN MURAH TTI'),
(11, '2022-04-18', '09:00', '11:30', 'BALAI DESA BADAUN', 'KEC. DAHA BARAT', 'BAZAR SEHATI GELAR PANGAN MURAH TTI'),
(12, '2022-04-14', '09:00', '11:00', 'BALAI DESA BARIANG', 'KEC. KANDANGAN', 'BAZAR SEHATI GELAR PANGAN MURAH TTI'),
(13, '2022-04-11', '09:00', '11:30', 'BALAI DESA LUMPANGI', 'KEC. LOKSADO', 'BAZAR SEHATI GELAR PANGAN MURAH TTI');

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
(5, 'Pangan Beku'),
(6, 'Pangan Segar'),
(7, 'Beras Organik'),
(8, 'Beras Putih'),
(9, 'Sayuran'),
(10, 'Rempah'),
(11, 'Sayuran Hidroponik'),
(13, 'UMKM Kab.HSS');

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
(5, 'Mili Liter (ml)'),
(6, 'Gram'),
(7, 'Ons'),
(8, 'Botol Besar 600ml'),
(9, 'Botol Kecil 330ml'),
(10, 'Rak'),
(11, 'Butir'),
(12, 'Bungkus'),
(13, 'Karung'),
(16, 'Kemasan, Berat 250 Gram'),
(17, 'Kemasan, Berat 500 Gram'),
(18, 'Kemasan 3 Kg'),
(20, 'Box '),
(21, 'Botol Beling isi 525ml');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra_antar`
--

CREATE TABLE `mitra_antar` (
  `id_mitra_antar` int(11) NOT NULL,
  `nama_mitra_antar` varchar(50) NOT NULL,
  `no_mitra_antar` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `jk_mitra_antar` varchar(20) NOT NULL,
  `alamat_mitra_antar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mitra_antar`
--

INSERT INTO `mitra_antar` (`id_mitra_antar`, `nama_mitra_antar`, `no_mitra_antar`, `keterangan`, `status`, `jk_mitra_antar`, `alamat_mitra_antar`) VALUES
(1, 'Adiguna', '085245462842', '1234511', 'Aktif', 'Laki-laki', 'Kurau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `jk_pelanggan` varchar(25) NOT NULL,
  `no_pelanggan` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `jk_pelanggan`, `no_pelanggan`, `status`, `keterangan`) VALUES
(1, 'Adiguna Pelanggan', 'Kurau', 'Laki-laki', '121121', 'Aktif', '111');

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
  `foto_pengguna` varchar(100) NOT NULL,
  `id_penyuplai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `no_telpon`, `foto_pengguna`, `id_penyuplai`) VALUES
(2, 'Hikmah Erni', '18630238', '18630238', 'Admin', '085388528580', 'photo6328087024904548195.jpg', NULL),
(3, 'Adiguna Penyuplai', '123', '123', 'Penyuplai', '111', '113.jpg', 4),
(4, 'Kepala Bidang', '121', '121', 'Kepala Bidang', '6285245462842', '114.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyuplai`
--

CREATE TABLE `penyuplai` (
  `id_penyuplai` int(11) NOT NULL,
  `nik_penyuplai` varchar(20) DEFAULT NULL,
  `nama_penyuplai` varchar(100) NOT NULL,
  `alamat_penyuplai` text NOT NULL,
  `no_penyuplai` varchar(15) NOT NULL,
  `jk_penyuplai` varchar(15) NOT NULL,
  `status_penyuplai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyuplai`
--

INSERT INTO `penyuplai` (`id_penyuplai`, `nik_penyuplai`, `nama_penyuplai`, `alamat_penyuplai`, `no_penyuplai`, `jk_penyuplai`, `status_penyuplai`) VALUES
(3, NULL, 'A. Hilal Najmi', 'Taniran Kubah Kec. Angkinang', '089691186650', 'Laki-laki', 'Aktif'),
(4, NULL, 'Sania Maysa', 'Ambarai, Karang Jawa Kec. Padang Batung', '081291296001', 'Perempuan', 'Aktif'),
(5, NULL, 'Rusidi Yasin', 'Muara Sangkuang Kec. Kandangan', '082194845191', 'Laki-laki', 'Aktif'),
(6, NULL, 'Hj. Mamar', 'Teluk Mesjid Kec. Kandangan', '0831599996861', 'Perempuan', 'Aktif'),
(7, '12345', 'Adiguna Penyuplai', 'Kurau', '111', 'Laki-laki', 'Aktif');

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
(3, 2, 11, 'Telor Bebek', '240', 'Desain_tanpa_judul_(1)1.png', 'Ya', 'Ya', 'ghgcfgcfygjhbnm', '2000'),
(4, 2, 1, 'Telor Ayam', '8', 'Desain_tanpa_judul_(2)2.png', 'Ya', 'Ya', 'njdfbjhgfjgjsgfbsbfjs', '22000'),
(5, 5, 1, 'Daging Kerbau', '80', 'Desain_tanpa_judul1.png', 'Tidak', 'Ya', 'njghjftdhgchjgyutrdgfc', '85000'),
(6, 6, 1, 'Bawang Merah', '18 ', 'Desain_tanpa_judul2.png', 'Ya', 'Ya', 'jnjvbjdygfskndsug', '24000'),
(7, 6, 1, 'Bawang Putih', '18', 'Desain_tanpa_judul_(2)1.png', 'Ya', 'Ya', 'jfgsyfdysfsjhfikn', '20000'),
(8, 2, 1, 'Gula Merah', '10', 'Desain_tanpa_judul_(1)2.png', 'Tidak', 'Ya', 'krytdfbhdjhjsnkjcidjd', '19000'),
(9, 2, 1, 'Gula Pasir', '380', 'Desain_tanpa_judul_(4).png', 'Ya', 'Ya', 'jfdvgsfdkuiygehjfgv ', '11000'),
(10, 2, 2, 'Minyak Goreng', '72', 'minyak_goreng.png', 'Ya', 'Ya', 'hgdsestujlmncxsdfc', '14000'),
(11, 6, 1, 'Daging Ayam', '40', 'tti_aym.png', 'Ya', 'Tidak', 'mvhjvdfdhdftydfhv', '35000'),
(12, 9, 12, 'Sayur-sayuran Segar Organik', '25', 'tti_sayuran1.png', 'Tidak', 'Ya', 'nhjdgdfbgdftgnbv', '5000'),
(13, 6, 1, 'Daging Sapi', '40', 'tti_daging_sapi.png', 'Tidak', 'Ya', 'kmfnbdfgyefhjfdbgvb', '120000'),
(14, 7, 18, 'Beras Sehat', '340', 'tti_beras_sehat3.png', 'Ya', 'Ya', 'knvhvdgyefbbgksh', '45000'),
(15, 1, 8, 'Jamu Pisit (Pinang Sirih kunyiT)', '24', 'tti_jamu.png', 'Tidak', 'Ya', 'jmbjhfthdrgdrtdyjfih', '20000'),
(16, 1, 8, 'Jamu Kunsi (Kunyit Sirih)', '24', 'tti_jamu1.png', 'Tidak', 'Ya', 'knkjgjyfrsytfukhlkh', '20000'),
(17, 13, 12, 'Kerupuk Ikan Gabus (Haruan)', '4', 'tti_umkm_kerupuk_haruan.png', 'Tidak', 'Ya', 'ncscsgsvdndkvdfihr', '6500'),
(18, 6, 1, 'Ikan Haruan (Gabus)', '0', 'tti_haruan.png', 'Ya', 'Tidak', 'ndjcbgcygdfnkfvjjgfbjgnbh', '65000'),
(19, 6, 1, 'Ikan Nila', '0', 'tti_nila.png', 'Ya', 'Ya', 'nvdgcdndnnkgjsuio', '42000'),
(20, 6, 1, 'Ikan Papuyu', '0', 'tti_papuyu.png', 'Ya', 'Tidak', 'mvkjchvcidfhjfviivjvdcvncvjj', '105000'),
(21, 13, 16, 'Sapat Siam Kering', '0', 'tti_sapat_siam_karing.png', 'Ya', 'Ya', 'mfbhgvfgyfsjkfdkfhhfn', '25000'),
(22, 13, 19, 'Sirop Rozen Kandangan', '96', 'tti_sirup_rozen_hss.png', 'Tidak', 'Ya', 'mdcjdcggdhbdndsbsvvs', '25000'),
(23, 13, 21, 'Sirop Rozen Kandangan', '96', 'tti_sirup_rozen_hss1.png', 'Tidak', 'Ya', 'nxjksjhfxfyshncskjwqbcftchj', '22000');

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
(1, 1, '2021-12-29', '200', 1, '12345'),
(2, 14, '2021-11-25', '260 Bungkus/', 2, 'nvxhbdvgydfjdfgczfdgvdbj'),
(3, 11, '2021-11-25', '40', 2, 'kjfbgdvtyawdjbcg'),
(4, 16, '2021-11-18', '24', 3, 'nkjbhggsrtdygiljngfrttdd'),
(5, 15, '2021-11-18', '24', 3, 'kjuhyfrdesrydygilnk'),
(6, 21, '2021-11-25', '30 Bungkus/', 2, 'jnfhjfgfgskhgghs');

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
(5, 1, 1, '200', '2021-12-29', 'mmm'),
(6, 6, 14, '340 Bungkus/', '2021-11-24', 'njdvhdfbbdvdfdjb'),
(7, 3, 11, '40', '2021-11-25', 'jghdygwjksdbcfshfdbfdh'),
(8, 4, 16, '24', '2021-11-17', 'njkghgfgdkjhhliyjfhv'),
(9, 4, 15, '24', '2021-11-17', 'jhjhghhdgfdgvjb'),
(10, 5, 21, '30 Bungkus/', '2021-10-21', 'hjgdfdxbvnkjilhyhfghcng');

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
-- Indexes for table `mitra_antar`
--
ALTER TABLE `mitra_antar`
  ADD PRIMARY KEY (`id_mitra_antar`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

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
  MODIFY `id_jadwal_bazar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  MODIFY `id_jenis_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mitra_antar`
--
ALTER TABLE `mitra_antar`
  MODIFY `id_mitra_antar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `penyuplai`
--
ALTER TABLE `penyuplai`
  MODIFY `id_penyuplai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `produk_keluar`
--
ALTER TABLE `produk_keluar`
  MODIFY `id_produk_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
