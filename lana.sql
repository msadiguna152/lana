-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Feb 2026 pada 23.29
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga_barang` varchar(15) NOT NULL,
  `stok_barang` varchar(15) NOT NULL DEFAULT '0',
  `deskripsi` text,
  `hide_barang` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_satuan`, `kode_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `deskripsi`, `hide_barang`) VALUES
(1, 3, '1010301001000001', 'Ballpoint Pilot Hitam', '', '9', '-', 0),
(2, 3, '1010301001000002', 'Ballpoint Balliner', '', '3', '-', 0),
(3, 1, '1010301001000004', 'Ballpoint Snowman', '', '0', '-', 0),
(4, 1, '1010301001000007', 'Ballpoint Standard', '', '6', '-', 0),
(5, 1, '1010301001000011', 'Spidol Snowman', '', '0', '-', 0),
(6, 1, '1010301001000012', 'Pensil Staedler', '', '10', '', 0),
(7, 3, '1010301001000016', 'Ballpoint Boxy', '', '0', '-', 0),
(8, 3, '1010301001000017', 'Ballpoint V-7', '', '1', '-', 0),
(9, 5, '1010301001000018', 'Pensil 2b Staedler', '', '3', '-', 0),
(10, 3, '1010301001000021', 'Ballpoint V3', '', '1', '-', 0),
(11, 3, '1010301001000022', 'Ballpoint V5', '', '0', '-', 0),
(12, 3, '1010301001000023', 'Ballpoint Zebra Picolo', '', '0', '-', 0),
(13, 3, '1010301001000024', 'Spidol Permanent', '', '0', '-', 0),
(14, 6, '1010301001000027', 'Ballpoint 4 Warna - Zebra', '', '0', '-', 0),
(15, 8, '1010301001000031', 'Uniball Boxy Biru', '', '0', '-', 0),
(16, 8, '1010301001000032', 'Pen Standart Boldliner Elit', '', '0', '-', 0),
(17, 7, '1010301001000036', 'Pensil 2b', '', '0', '-', 0),
(18, 9, '1010301001000038', 'Spidol White Board', '', '1', '-', 0),
(19, 11, '1010301001000045', 'Binder Klip 107 Kenko', '', '0', '-', 0),
(20, 7, '1010301001000049', 'Pensil 2b Faber', '', '0', '-', 0),
(21, 3, '1010301001000051', 'Pensil 2b Faber Castele', '', '0', '-', 0),
(22, 3, '1010301001000052', 'Stabilo', '', '0', '-', 0),
(23, 3, '1010301001000056', 'Ballpoint Tizo Tg 340', '', '0', '-', 0),
(24, 3, '1010301001000057', 'Joyko Gel Pen Gp-212', '', '0', '-', 0),
(25, 3, '1010301001000058', 'Pulpen Kenko K-1', '', '0', '-', 0),
(26, 3, '1010301001000059', 'Snowman Marker White Board', '', '0', '-', 0),
(27, 3, '1010301001000061', 'Balliner Pilot', '', '0', '-', 0),
(28, 3, '1010301001000064', 'Stabilo Pak', '', '2', '-', 0),
(29, 1, '1010301001000065', 'Spidol Permanen P77', '', '0', '-', 0),
(30, 1, '1010301001000066', 'Ballpoint Fozter', '', '0', '-', 0),
(31, 7, '1010301001000068', 'Spidol Snowman Black', '', '2', '-', 0),
(32, 3, '1010301001000069', 'Pulpen Gel In Zhixin 0,5', '', '0', '-', 0),
(33, 3, '1010301001000070', 'Pensil Ceklek', '', '0', '-', 0),
(34, 3, '1010301001000074', 'Isi Pensil Ceklek', '', '0', '-', 0),
(35, 3, '1010301001000075', 'Pulpen Kokoro', '', '0', '-', 0),
(36, 3, '1010301001000077', 'Pulpen Snowman Gel 0,5', '', '0', '-', 0),
(37, 1, '1010301001000079', 'Pen V5', '', '0', '-', 0),
(38, 11, '1010301001000080', 'Pulpen Boxy Uniball', '', '0', '-', 0),
(39, 3, '1010301001000081', 'Spidol White Board 10 Warna', '', '1', '-', 0),
(40, 6, '1010301001000082', 'Ballpoint Joyko Gel 330', '', '1', '-', 0),
(41, 6, '1010301001000083', 'Ballpoint Joyko Gel 265', '', '0', '-', 0),
(42, 1, '1010301001000084', 'Stabilo/penanda Warna', '', '0', '-', 0),
(43, 3, '1010301001000085', 'Wisdom Pulpen Evercross Gel Ev', '', '0', '-', 0),
(44, 1, '1010301001000086', 'Spidol Snowman Jumbo 500 Hitam', '', '0', '-', 0),
(45, 1, '1010301001000087', 'Spidol Snowman Jumbo 500 Warna', '', '0', '-', 0),
(46, 1, '1010301001000088', 'Ballpoint Snowmant V-7 (buah)', '', '0', '-', 0),
(47, 1, '1010301001000089', 'Pen Zebra Sarasa', '', '0', '-', 0),
(48, 3, '1010301001000090', 'Pen Standard Ae7 0,5 Hitam', '', '0', '-', 0),
(49, 3, '1010301001000091', 'Spidol Snowman 12 Warna Pw-12a (1 Lusin)', '', '0', '-', 0),
(50, 3, '1010301001000092', 'Pulpen Trifelo Toshiro Tf-342b 1.0 Mm', '', '0', '-', 0),
(51, 1, '1010301001000093', 'Ballpoint Snowman V-4 (pcs)', '', '0', '-', 0),
(52, 1, '1010301001000094', 'Pensil 2b Joyco (pcs)', '', '0', '-', 0),
(53, 1, '1010301001000095', 'Ballpoint Joyko Bp-327 Maze (pcs)', '', '0', '-', 0),
(54, 8, '1010301001000096', 'Rautan', '', '0', '-', 0),
(55, 8, '1010301001000097', 'Pulpen Merekku', '', '0', '-', 0),
(56, 7, '1010301001000098', 'Pen Standard Boldliner Pro Signature', '', '0', '-', 0),
(57, 3, '1010301001000099', 'Pensil 2b Big 900 Excellent', '', '0', '-', 0),
(58, 8, '1010301001000100', 'Pensil 2b Artline', '', '0', '-', 0),
(59, 3, '1010301001000101', 'Stabilo Kenko Hl-100', '', '0', '-', 0),
(60, 3, '1010301001000102', 'Pulpen Kenko K-1 Mini', '', '0', '-', 0),
(61, 1, '1010301001000103', 'Ballpoint Joyko Gp-330', '', '0', '-', 0),
(62, 3, '1010301001000104', 'Binder Clip Kenko 300', '', '0', '-', 0),
(63, 3, '1010301001000105', 'Binder Clip Joyko 280', '', '0', '-', 0),
(64, 3, '1010301001000106', 'Pen Kenko Sahara', '', '0', '-', 0),
(65, 8, '1010301001000107', 'Pen Standar Boldliner Elite', '', '0', '-', 0),
(66, 8, '1010301001000108', 'Spidol Snowman Permanent Black', '', '0', '-', 0),
(67, 1, '1010301002000003', 'Isi Stamp Ink Violet', '', '8', '-', 0),
(68, 8, '1010301002000004', 'Stamping Ungu', '', '1', '-', 0),
(69, 8, '1010301002000005', 'Stamping Hitam', '', '0', '-', 0),
(70, 1, '1010301002000007', 'Stample Tinta Yamura', '', '0', '-', 0),
(71, 3, '1010301003000001', 'Paper Clip', '', '0', '-', 0),
(72, 13, '1010301003000002', 'Joyko Binder 107', '', '0', '-', 0),
(73, 13, '1010301003000003', 'Joyko Binder 105', '', '0', '-', 0),
(74, 13, '1010301003000006', 'Joyko Binder 260', '', '0', '-', 0),
(75, 3, '1010301003000017', 'Binder Clips 260 Joyco', '', '9', '-', 0),
(76, 3, '1010301003000019', 'Binder Clips 200 Joyco', '', '0', '-', 0),
(77, 3, '1010301003000020', 'Binder Clips 155 Joyco', '', '0', '-', 0),
(78, 3, '1010301003000022', 'Binder Clips 105 Joyco', '', '39', '-', 0),
(79, 7, '1010301003000024', 'Clip Paper Joyco No. 3', '', '0', '-', 0),
(80, 10, '1010301003000025', 'Isi Stepler Besar', '', '0', '-', 0),
(81, 8, '1010301003000027', 'Stapler Hd 10', '', '4', '-', 0),
(82, 11, '1010301003000028', 'Isi Staples Max No. 10', '', '3', '-', 0),
(83, 1, '1010301003000030', 'Staples Kangoro', '', '0', '-', 0),
(84, 1, '1010301003000031', 'Paper Clip Joyco No. 3 Kecil', '', '0', '-', 0),
(85, 3, '1010301003000033', 'Binder Clip', '', '0', '-', 0),
(86, 3, '1010301003000035', 'Binder Clip 107', '', '0', '-', 0),
(87, 1, '1010301003000037', 'Post It Sign Here', '', '49', '-', 0),
(88, 3, '1010301003000038', 'Sticke Note Besar', '', '0', '-', 0),
(89, 3, '1010301003000039', 'Post It Note Kecil', '', '45', '-', 0),
(90, 3, '1010301003000040', 'Post It Note Tanggung', '', '0', '-', 0),
(91, 9, '1010301003000041', 'Binder Clip Sedang', '', '0', '-', 0),
(92, 9, '1010301003000042', 'Binder Clip Kecil', '', '0', '-', 0),
(93, 9, '1010301003000043', 'Binder Clip Besar', '', '0', '-', 0),
(94, 7, '1010301003000046', 'Staples Hd 10 Kenko', '', '0', '-', 0),
(95, 3, '1010301003000047', 'Isi Stapless No 10 Great Wall', '', '0', '-', 0),
(96, 11, '1010301003000048', 'Paper Clip No. 3', '', '0', '-', 0),
(97, 14, '1010301003000052', 'Isi Stapler Kecil', '', '2', '-', 0),
(98, 7, '1010301003000053', 'Staples', '', '0', '-', 0),
(99, 14, '1010301003000054', 'Paperclip Kotak', '', '0', '-', 0),
(100, 11, '1010301003000055', 'Binder Clip Kenko No. 105', '', '0', '-', 0),
(101, 6, '1010301003000056', 'Paper Clip No. 1', '', '0', '-', 0),
(102, 1, '1010301003000057', 'Binder Clip Kenko No. 107', '', '11', '-', 0),
(103, 6, '1010301003000058', 'Binder Clip No. 107 Big', '', '0', '-', 0),
(104, 3, '1010301003000059', 'Paper Clip Daito No. 3', '', '0', '-', 0),
(105, 1, '1010301003000060', 'Paperclip Warna', '', '4', '-', 0),
(106, 11, '1010301003000061', 'Binder Clipno. 111 Merek Kenko', '', '0', '-', 0),
(107, 11, '1010301003000062', 'Paper Clip No. 5 Merek Kenko', '', '0', '-', 0),
(108, 3, '1010301003000063', 'Binder Clips Kenko 200 (isi 12)', '', '0', '-', 0),
(109, 3, '1010301003000064', 'Binder Clips Kenko 111 (isi 12)', '', '0', '-', 0),
(110, 3, '1010301003000065', 'Binder Clips Big 105', '', '0', '-', 0),
(111, 8, '1010301003000066', 'Binder Clips Daito No. 1', '', '0', '-', 0),
(112, 3, '1010301003000067', 'Paper Clip Kenko 3100 Warna (isi 12)', '', '0', '-', 0),
(113, 3, '1010301003000068', 'Binder Clip 280', '', '0', '-', 0),
(114, 1, '1010301003000069', 'Staples Remover Sr-51', '', '0', '-', 0),
(115, 1, '1010301004000003', 'Joyko Tip Ex Kertas', '', '11', '-', 0),
(116, 1, '1010301004000005', 'Penghapus 2b Steadler', '', '0', '-', 0),
(117, 1, '1010301004000007', 'Corection Kenko', '', '0', '-', 0),
(118, 3, '1010301004000009', 'Penghapus', '', '11', '-', 0),
(119, 9, '1010301004000011', 'Tipe Ex Kenko', '', '3', '-', 0),
(120, 1, '1010301004000014', 'Tipe-x Roll Kenko', '', '0', '-', 0),
(121, 1, '1010301004000015', 'Gunindo Penghapus Whiteboard', '', '0', '-', 0),
(122, 1, '1010301005000001', 'Buku Tulis Sidu 24', '', '0', '-', 0),
(123, 1, '1010301005000011', 'Buku Kuarto 100', '', '0', '-', 0),
(124, 8, '1010301005000013', 'Buku Big Bos', '', '0', '-', 0),
(125, 8, '1010301005000015', 'Buku Agenda A5', '', '7', '-', 0),
(126, 1, '1010301005000021', 'Buku Kiky A6', '', '0', '-', 0),
(127, 8, '1010301005000022', 'Notebook Kulit', '', '1', '-', 0),
(128, 1, '1010301006000001', 'Bantex Odner Besar', '', '12', '-', 0),
(129, 1, '1010301006000002', 'Bantex Odner Sedang', '', '0', '-', 0),
(130, 1, '1010301006000003', 'Bantex Odner Kecil', '', '0', '-', 0),
(131, 3, '1010301006000004', 'Map Biasa Bufallow Biola', '', '0', '-', 0),
(132, 3, '1010301006000007', 'Map Seagul', '', '3', '-', 0),
(133, 3, '1010301006000009', 'Map Batik', '', '0', '-', 0),
(134, 15, '1010301006000012', 'Map Cetak Gambar Ukur', '', '0', '-', 0),
(135, 15, '1010301006000013', 'Map Cetak Bpn', '', '16', '-', 0),
(136, 1, '1010301006000014', 'Map Zipper Kancing', '', '2', '-', 0),
(137, 5, '1010301006000015', 'Map Business File Transfaran', '', '6', '-', 0),
(138, 15, '1010301006000016', 'Map Pemisahan', '', '0', '-', 0),
(139, 15, '1010301006000017', 'Map Pendaftaran', '', '0', '-', 0),
(140, 1, '1010301006000018', 'Box File Bantex', '', '14', '-', 0),
(141, 11, '1010301006000019', 'Map Buffalow Diamond', '', '0', '-', 0),
(142, 3, '1010301006000021', 'Map Kertas', '', '0', '-', 0),
(143, 15, '1010301006000022', 'Map Cetak Pengukuran', '', '0', '-', 0),
(144, 15, '1010301006000025', 'Map Pertimbangan Teknis', '', '0', '-', 0),
(145, 15, '1010301006000026', 'Map Pemberian Hak', '', '0', '-', 0),
(146, 15, '1010301006000027', 'Map Peralihan Hak', '', '0', '-', 0),
(147, 3, '1010301006000034', 'Amplop Cetak D', '', '7', '-', 0),
(148, 1, '1010301006000035', 'Map Plastik', '', '0', '-', 0),
(149, 1, '1010301006000036', 'Album Buku Tanah', '', '100', '-', 0),
(150, 15, '1010301006000041', 'Stopmap', '', '0', '-', 0),
(151, 4, '1010301006000042', 'Blanko Ptsl', '', '6', '-', 0),
(152, 3, '1010301006000045', 'Map Plastik Pak', '', '10', '-', 0),
(153, 8, '1010301006000051', 'Odner Bantex 1465', '', '35', '-', 0),
(154, 10, '1010301006000057', 'Sticky Note', '', '0', '-', 0),
(155, 11, '1010301006000058', 'Stop Map Biola', '', '4', '-', 0),
(156, 14, '1010301006000066', 'Stopmap Biola', '', '0', '-', 0),
(157, 8, '1010301006000068', 'Map Dokumen', '', '0', '-', 0),
(158, 1, '1010301006000070', 'Bantex', '', '0', '-', 0),
(159, 3, '1010301006000072', 'Sticky Note', '', '0', '-', 0),
(160, 15, '1010301006000075', 'Map Permohonan', '', '2650', '-', 0),
(161, 8, '1010301006000076', 'Map L', '', '333', '-', 0),
(162, 3, '1010301006000077', 'Map Plastik Kancing', '', '0', '-', 0),
(163, 3, '1010301006000079', 'Stop Map', '', '0', '-', 0),
(164, 3, '1010301006000082', 'Map L (pak)', '', '2', '-', 0),
(165, 7, '1010301006000083', 'Sticky Note Pembatas Halaman (lusin)', '', '0', '-', 0),
(166, 3, '1010301006000085', 'Map Plastik Tali', '', '0', '-', 0),
(167, 8, '1010301006000086', 'Stapler Hd-50 Joyco/kenko', '', '0', '-', 0),
(168, 7, '1010301006000087', 'Map L Transparan Lusin', '', '0', '-', 0),
(169, 1, '1010301006000089', 'Map Kancing Merk Favo', '', '0', '-', 0),
(170, 3, '1010301006000091', 'Pp Pocked', '', '0', '-', 0),
(171, 1, '1010301006000092', 'Box File Jadi Plastik', '', '0', '-', 0),
(172, 1, '1010301006000093', 'Map Plastik Resleting / Zipper File', '', '6', '-', 0),
(173, 1, '1010301006000094', 'Cetak Map Hitam Putih', '', '1015', '-', 0),
(174, 16, '1010301006000095', 'Cetak Blanko Kertas Hvs F4 2 Sisi', '', '1', '-', 0),
(175, 1, '1010301006000096', 'Map Topla Brief Bag Kancing', '', '0', '-', 0),
(176, 1, '1010301006000097', 'Box Plastik Besar', '', '0', '-', 0),
(177, 1, '1010301006000098', 'Map Skpt', '', '15', '-', 0),
(178, 1, '1010301006000099', 'Map Plastik Jepit/clip File', '', '0', '-', 0),
(179, 1, '1010301006000100', 'Ordner Bambi Black', '', '0', '-', 0),
(180, 3, '1010301006000101', 'Stopmap Buffalo Merek Biola', '', '0', '-', 0),
(181, 3, '1010301006000102', 'Plastik Ordner F4 Isi 100 Sheet', '', '0', '-', 0),
(182, 1, '1010301006000103', 'Tas Map Plastik Kancing', '', '0', '-', 0),
(183, 8, '1010301006000104', 'Box File Pcv F4 Bantex 4011-01', '', '0', '-', 0),
(184, 15, '1010301006000105', 'Stofmap Merek Biola (perlembar)', '', '0', '-', 0),
(185, 3, '1010301006000106', 'Map Topla', '', '0', '-', 0),
(186, 15, '1010301006000107', 'Map Redistribusi Tanah', '', '0', '-', 0),
(187, 3, '1010301006000108', 'Tas Map B280', '', '0', '-', 0),
(188, 3, '1010301006000109', 'Map L Bening Big', '', '0', '-', 0),
(189, 3, '1010301006000110', 'Map L Bening Rexy', '', '0', '-', 0),
(190, 15, '1010301006000111', 'Map Balik Nama', '', '50', '-', 0),
(191, 1, '1010301006000112', 'Box Arsip Besar', '', '100', '-', 0),
(192, 1, '1010301006000113', 'Box Arsip Sedang', '', '450', '-', 0),
(193, 1, '1010301006000114', 'Box Arsip Kecil', '', '450', '-', 0),
(194, 1, '1010301007000001', 'Penggaris Plastik', '', '0', '-', 0),
(195, 1, '1010301007000002', 'Penggaris Besi 30 Cm', '', '7', '-', 0),
(196, 3, '1010301007000005', 'Penggaris 30cm', '', '0', '-', 0),
(197, 1, '1010301007000006', 'Penggaris Kayu', '', '0', '-', 0),
(198, 1, '1010301008000001', 'Cutter', '', '0', '-', 0),
(199, 1, '1010301008000003', 'Cutter L500', '', '5', '-', 0),
(200, 1, '1010301008000004', 'Cutter A 300', '', '4', '-', 0),
(201, 7, '1010301008000007', 'Cutter', '', '0', '-', 0),
(202, 8, '1010301008000008', 'Refill Isi Cutter Kenko A-100 Kecil', '', '8', '-', 0),
(203, 1, '1010301009000001', 'Pita Mesin Tik', '', '0', '-', 0),
(204, 1, '1010301010000002', 'Lem Pavinol', '', '0', '-', 0),
(205, 1, '1010301010000004', 'Isolasi Kecil', '', '3', '-', 0),
(206, 1, '1010301010000005', 'Isolasi Sedang', '', '-1', '-', 0),
(207, 1, '1010301010000006', 'Isolasi Besar', '', '0', '-', 0),
(208, 1, '1010301010000007', 'Lakban Hitam Sedang', '', '0', '-', 0),
(209, 1, '1010301010000008', 'Lakban Hitam Besar', '', '0', '-', 0),
(210, 1, '1010301010000009', 'Lakban Bening Sedang', '', '0', '-', 0),
(211, 1, '1010301010000010', 'Lakban Bening Besar', '', '7', '-', 0),
(212, 1, '1010301010000011', 'Lakban Bening Tipis Besar', '', '2', '-', 0),
(213, 1, '1010301010000012', 'Isolasi Bolak Balik (double Tape)', '', '-1', '-', 0),
(214, 1, '1010301010000014', 'Lem Stick Besar Bantex', '', '6', '-', 0),
(215, 1, '1010301010000016', 'Double Tape 1''', '', '8', '-', 0),
(216, 8, '1010301010000019', 'Lem Stick Kecil Bantex', '', '1', '-', 0),
(217, 3, '1010301010000021', 'Lem Stick', '', '0', '-', 0),
(218, 8, '1010301010000022', 'Sticky Note Sedang', '', '0', '-', 0),
(219, 3, '1010301010000025', 'Lakban Bening 12mm', '', '7', '-', 0),
(220, 3, '1010301010000027', 'Lem Stick Kecil', '', '5', '-', 0),
(221, 3, '1010301010000029', 'Lem Povinal', '', '0', '-', 0),
(222, 3, '1010301010000031', 'Lem Kertas', '', '0', '-', 0),
(223, 8, '1010301010000032', 'Double Tape 12"', '', '1', '-', 0),
(224, 1, '1010301010000033', 'Lem Stick Kenko 25gr', '', '0', '-', 0),
(225, 1, '1010301010000034', 'Double Tape Foam Nachi 12mm', '', '4', '-', 0),
(226, 1, '1010301010000035', 'Lem Stick Kenko 15gr', '', '0', '-', 0),
(227, 19, '1010301010000036', 'Isolasi Bening Nachi 12mm', '', '0', '-', 0),
(228, 1, '1010301010000037', 'Isolasi Bening Nachi 24mm', '', '0', '-', 0),
(229, 1, '1010301010000038', 'Lem Stick Kenko 8gr', '', '0', '-', 0),
(230, 1, '1010301010000039', 'Lakban Kenko 48mm', '', '0', '-', 0),
(231, 8, '1010301010000040', 'Double Tape Busa 48mm', '', '0', '-', 0),
(232, 8, '1010301010000041', 'Lakban Hitam Besar 48 Mm', '', '0', '-', 0),
(233, 8, '1010301010000042', 'Lakban Bening 48 Mm Bazic', '', '0', '-', 0),
(234, 8, '1010301010000043', 'Double Tape Ukuran 24 Mm', '', '0', '-', 0),
(235, 1, '1010301012000002', 'Stapler Kenko Hd-10', '', '0', '-', 0),
(236, 3, '1010301013000002', 'Isi Staples No. 10 Greatwall', '', '0', '-', 0),
(237, 9, '1010301013000005', 'Isi Stapler Hd-10', '', '0', '-', 0),
(238, 1, '1010301013000006', 'Isi Staples Kecil', '', '22', '-', 0),
(239, 1, '1010301013000007', 'Isi Staples (besar) Hd-50', '', '2', '-', 0),
(240, 11, '1010301013000008', 'Isi Staples No. 10 Merek Kangaro', '', '0', '-', 0),
(241, 6, '1010301013000009', 'Isi Staples 369 No. 3 Great Well', '', '0', '-', 0),
(242, 4, '1010301014000001', 'Sertifikat Hat', '', '396', '-', 0),
(243, 4, '1010301014000003', 'Wakaf', '', '10', '-', 0),
(244, 15, '1010301014000004', 'Sambungan Blanko Sertifikat Hak Atas Tanah', '', '707', '-', 0),
(245, 15, '1010301014000010', 'Sertipikat Elektronik', '', '677', '-', 0),
(246, 1, '1010301999000007', 'Peraut Pensil', '', '0', '-', 0),
(247, 1, '1010301999000008', 'Gunting', '', '0', '-', 0),
(248, 7, '1010301999000011', 'Isi Stapler', '', '2', '-', 0),
(249, 1, '1010301999000012', 'Tempat Pulpen', '', '0', '-', 0),
(250, 1, '1010301999000016', 'Pelubang', '', '0', '-', 0),
(251, 1, '1010301999000019', 'Gunting B', '', '8', '-', 0),
(252, 1, '1010301999000021', 'Kalkulator', '', '2', '-', 0),
(253, 1, '1010301999000025', 'Isi Staples Etona No 10', '', '0', '-', 0),
(254, 1, '1010301999000032', 'Tinta Stempel Yamura Volet Blue', '', '0', '-', 0),
(255, 1, '1010301999000034', 'Post-it Basic', '', '0', '-', 0),
(256, 1, '1010301999000035', 'Post It Strip', '', '0', '-', 0),
(257, 1, '1010301999000037', 'Name Plate Kecil', '', '0', '-', 0),
(258, 5, '1010301999000040', 'Stabillo Boss', '', '0', '-', 0),
(259, 1, '1010301999000043', 'Rautan Pensil Berputar', '', '0', '-', 0),
(260, 1, '1010301999000044', 'Stapler Hd-50 Max', '', '0', '-', 0),
(261, 1, '1010301999000048', 'Pelubang Xl 85', '', '0', '-', 0),
(262, 1, '1010301999000050', 'Remover Stapler', '', '10', '-', 0),
(263, 17, '1010301999000057', 'Post It Sign Here', '', '16', '-', 0),
(264, 3, '1010301999000059', 'Staples Hd-50 Kenko', '', '0', '-', 0),
(265, 8, '1010301999000073', 'Post-it Besar', '', '0', '-', 0),
(266, 8, '1010301999000074', 'Post-it Kecil', '', '5', '-', 0),
(267, 8, '1010301999000084', 'Plastik Odner', '', '50', '-', 0),
(268, 3, '1010301999000088', 'Sticky Notes Panah', '', '0', '-', 0),
(269, 3, '1010301999000091', 'Sign Here', '', '0', '-', 0),
(270, 8, '1010301999000092', 'Mouse Wireless', '', '5', '-', 0),
(271, 8, '1010301999000096', 'Cover Plastik Folio Bening', '', '0', '-', 0),
(272, 1, '1010301999000098', 'Sticky Note Memo', '', '1', '-', 0),
(273, 11, '1010301999000099', 'Post-it Sedang', '', '-1', '-', 0),
(274, 3, '1010301999000100', 'Kertas Kalkir A4', '', '0', '-', 0),
(275, 3, '1010301999000104', 'Post It Besar', '', '1', '-', 0),
(276, 3, '1010301999000106', 'Binder Clip Uk. 25', '', '0', '-', 0),
(277, 3, '1010301999000107', 'Binder Clip Sedang', '', '0', '-', 0),
(278, 1, '1010301999000108', 'Sticky Note Besar', '', '68', '-', 0),
(279, 1, '1010301999000109', 'Post It Besar', '', '-1', '-', 0),
(280, 3, '1010301999000110', 'Clear Sheet Protectors F4', '', '14', '-', 0),
(281, 3, '1010301999000111', 'Binder Clip No. 107', '', '1', '-', 0),
(282, 3, '1010301999000112', 'Binder Clip No. 155', '', '1', '-', 0),
(283, 3, '1010301999000113', 'Cutter Kenko L-500 Besar', '', '0', '-', 0),
(284, 3, '1010301999000114', 'Isi Cutter Kenko L-500', '', '0', '-', 0),
(285, 1, '1010301999000115', 'Paper Clip Pakai Tempat', '', '0', '-', 0),
(286, 14, '1010301999000116', 'Paperclip', '', '0', '-', 0),
(287, 1, '1010301999000117', 'Sticky Note Kecil Belah 5', '', '0', '-', 0),
(288, 1, '1010301999000118', 'Sticky Note Ttd / Flag', '', '0', '-', 0),
(289, 1, '1010301999000119', 'Isi Cutter Kenko A-100/a-300', '', '0', '-', 0),
(290, 1, '1010301999000120', 'Binder Clip Kenko No.105', '', '0', '-', 0),
(291, 1, '1010301999000121', 'Gunting Dr-7 Ideal', '', '0', '-', 0),
(292, 1, '1010301999000122', 'Isi Cutter Kenko L-150/l-500', '', '0', '-', 0),
(293, 6, '1010301999000123', 'Isi Stapler Hd - 10', '', '0', '-', 0),
(294, 1, '1010301999000124', 'Gunting Dr-6 Ideal', '', '0', '-', 0),
(295, 1, '1010301999000125', 'Stabilo / Penanda Warna', '', '14', '-', 0),
(296, 1, '1010301999000126', 'Rak Kertas Dokumen 3 Susun', '', '1', '-', 0),
(297, 1, '1010301999000127', 'Tempat Pensil Desk Organizer', '', '1', '-', 0),
(298, 1, '1010301999000128', 'Tempat Paper Clip Magnet', '', '0', '-', 0),
(299, 1, '1010301999000129', 'Papan Tulis B', '', '0', '-', 0),
(300, 1, '1010301999000130', 'Gunting Dr-9 Ideal', '', '0', '-', 0),
(301, 16, '1010301999000131', 'Mika Bening / Film Ukuran A4', '', '0', '-', 0),
(302, 1, '1010301999000132', 'Cutter Kenko Kecil', '', '0', '-', 0),
(303, 8, '1010301999000133', 'Gunting Ideal Dr 5', '', '0', '-', 0),
(304, 3, '1010301999000134', 'Tipe X Kenko 107', '', '0', '-', 0),
(305, 11, '1010301999000135', 'Isi Stapler Great Wall No. 10', '', '0', '-', 0),
(306, 1, '1010301999000138', 'Paper Clip No. 01', '', '0', '-', 0),
(307, 15, '1010301999000139', 'Materai 10.000', '', '0', '-', 0),
(308, 3, '1010301999000140', 'Tas Map Topla (pak)', '', '0', '-', 0),
(309, 8, '1010301999000141', 'Container Box Kecil', '', '0', '-', 0),
(310, 8, '1010301999000142', 'Box File Plastik', '', '0', '-', 0),
(311, 3, '1010301999000143', 'Pen Snowman V3', '', '0', '-', 0),
(312, 8, '1010301999000144', 'Mouse Wireless Logitech M171', '', '0', '-', 0),
(313, 1, '1010301999000145', 'Ballpoint Zebra Sarasa Clip Gel 0,7', '', '0', '-', 0),
(314, 8, '1010301999000147', 'Mouse Wireless Philips 3pk737', '', '0', '-', 0),
(315, 14, '1010302001000002', 'Kertas F4 70 Gr', '', '9', '-', 0),
(316, 14, '1010302001000003', 'Kertas A4 70 Gr', '', '0', '-', 0),
(317, 14, '1010302001000006', 'Kertas A3', '', '0', '-', 0),
(318, 16, '1010302001000007', 'Kertas F4 70 Gr Sinar Dunia', '', '91', '-', 0),
(319, 16, '1010302001000008', 'Kertas A4 Sidu', '', '0', '-', 0),
(320, 16, '1010302001000011', 'Kertas F4 80 Gram Sidu', '', '2', '-', 0),
(321, 16, '1010302001000012', 'Kertas A4 70 Gr', '', '85', '-', 0),
(322, 16, '1010302001000016', 'Kertas F4 Warna', '', '0', '-', 0),
(323, 16, '1010302001000017', 'Kertas A4 80 Gr Sidu', '', '2', '-', 0),
(324, 16, '1010302001000018', 'Kertas F4 80 Gr Sidu', '', '0', '-', 0),
(325, 14, '1010302001000023', 'Kertas F4 Warna (box)', '', '1', '-', 0),
(326, 16, '1010302001000024', 'Kertas A4 Sidu 75 Gram', '', '0', '-', 0),
(327, 14, '1010302001000025', 'Hvs A4 Sidu 70/75 Gsm Box', '', '10', '-', 0),
(328, 14, '1010302001000026', 'Hvs F4 Sidu 70/75 Gsm Box', '', '0', '-', 0),
(329, 14, '1010302001000027', 'Kertas Ncr 2 Ply Paperline', '', '0', '-', 0),
(330, 16, '1010302001000028', 'Kertas F4 Sidu 75 Gram', '', '0', '-', 0),
(331, 16, '1010302001000029', 'Kertas Hvs F4 Gram Merek Sinar Dunia', '', '0', '-', 0),
(332, 16, '1010302001000030', 'Kertas Hvs A4 75 Gram Merek Sinar Dunia', '', '0', '-', 0),
(333, 16, '1010302001000031', 'Cetak Blanko Kertas Hvs F4 2 Sisi - Form Permohonan Layanan', '', '0', '-', 0),
(334, 3, '1010302001000032', 'Art Paper', '', '0', '-', 0),
(335, 14, '1010302002000005', 'Kertas Continuous Form 2p', '', '0', '-', 0),
(336, 8, '1010302002000006', 'Sticky Note Vis 1 Persegi Im-07', '', '0', '-', 0),
(337, 8, '1010302002000007', 'Sticky Notes Favo Sn-7651', '', '0', '-', 0),
(338, 3, '1010302002000008', 'Kertas Foto Stiker Data Print A4', '', '0', '-', 0),
(339, 8, '1010302002000009', 'Sticky Note Sedang (pcs)', '', '0', '-', 0),
(340, 8, '1010302002000010', 'Sticky Note Besar (pcs)', '', '0', '-', 0),
(341, 3, '1010302002000011', 'Kertas Sticker Glossy Photo Paper Data Print', '', '0', '-', 0),
(342, 3, '1010302004000003', 'Amplop Besar', '', '0', '-', 0),
(343, 3, '1010302004000005', 'Amplop Putih Paperline 90 Panjang', '', '5', '-', 0),
(344, 3, '1010302004000006', 'Amplop Putih Paperline 104 Kecil', '', '10', '-', 0),
(345, 3, '1010302004000010', 'Amplop Coklat Uk. A3', '', '0', '-', 0),
(346, 3, '1010302004000011', 'Cetak Amplop Dinas', '', '2', '-', 0),
(347, 11, '1010302999000005', 'Cover Buffalo Folio', '', '0', '-', 0),
(348, 3, '1010302999000009', 'Kertas Stiker', '', '30', '-', 0),
(349, 8, '1010302999000010', 'Plastik Transparan', '', '0', '-', 0),
(350, 3, '1010302999000011', 'Glossy Sticker Photo Paper A4', '', '4', '-', 0),
(351, 3, '1010302999000013', 'Kertas Foto Data Print', '', '0', '-', 0),
(352, 1, '1010304004000007', 'Refill Tinta Canon E-print', '', '0', '-', 0),
(353, 1, '1010304004000008', 'Refill Tinta Printer Epson', '', '0', '-', 0),
(354, 8, '1010304004000016', 'Tinta Brother D60 Bk', '', '0', '-', 0),
(355, 8, '1010304004000017', 'Tinta Brother Bt5000cl', '', '0', '-', 0),
(356, 8, '1010304004000022', 'Tinta Epson 003 Black', '', '42', '-', 0),
(357, 8, '1010304004000023', 'Tinta Epson 003 Magenta', '', '0', '-', 0),
(358, 8, '1010304004000024', 'Tinta Epson 003 Yellow', '', '0', '-', 0),
(359, 8, '1010304004000025', 'Tinta Epson 003 Cyan', '', '0', '-', 0),
(360, 8, '1010304004000026', 'Tinta Epson 003 Colour', '', '0', '-', 0),
(361, 21, '1010304004000030', 'Tinta Epson 664 Bk', '', '6', '-', 0),
(362, 2, '1010304004000031', 'Tinta Epson 664 Colour', '', '0', '-', 0),
(363, 8, '1010304004000032', 'Tinta Epson 001bk', '', '0', '-', 0),
(364, 8, '1010304004000038', 'Catridge 750', '', '0', '-', 0),
(365, 8, '1010304004000039', 'Catridge 751 Colour', '', '0', '-', 0),
(366, 3, '1010304004000045', 'Tinta Epson 008 4 Warna', '', '8', '-', 0),
(367, 1, '1010304004000046', 'Tinta Printer Epson 003', '', '27', '-', 0),
(368, 1, '1010304004000047', 'Tinta Epson 008 Hitam', '', '0', '-', 0),
(369, 1, '1010304004000048', 'Tinta Epson 008 Warna', '', '0', '-', 0),
(370, 8, '1010304004000049', 'Tinta Epson 001 Magenta', '', '0', '-', 0),
(371, 8, '1010304004000050', 'Tinta Epson 001 Yellow', '', '0', '-', 0),
(372, 8, '1010304004000051', 'Brother Toner Tn-269xl Black', '', '7', '-', 0),
(373, 8, '1010304004000052', 'Brother Toner Tn-269xl C/m/y', '', '9', '-', 0),
(374, 1, '1010304006000001', 'Usb Flash Disk Sandisk 8 Gb', '', '4', '-', 0),
(375, 1, '1010304006000002', 'Usb Flash Disk Sandisk 16 Gb', '', '2', '-', 0),
(376, 1, '1010304006000008', 'Hub Usb', '', '0', '-', 0),
(377, 1, '1010304006000011', 'Usb Flashdisk Hp 8 Gb', '', '0', '-', 0),
(378, 22, '1010304006000018', 'Flash Disk 16 Gb Adata', '', '0', '-', 0),
(379, 1, '1010304006000019', 'Flash Disk 32 Gb', '', '5', '-', 0),
(380, 1, '1010304006000020', 'Flashdisk 64gb', '', '0', '-', 0),
(381, 8, '1010304006000023', 'Flashdisk 32gb', '', '15', '-', 0),
(382, 1, '1010304006000027', 'Flashdisk 256 Gb', '', '0', '-', 0),
(383, 1, '1010304006000028', 'Flashdisk Sandisk Type C', '', '0', '-', 0),
(384, 1, '1010304006000029', 'Flashdisk Sandisk 32gb', '', '0', '-', 0),
(385, 1, '1010304006000030', 'Flashdisk V178p 64 Gb', '', '0', '-', 0),
(386, 1, '1010304006000031', 'Flashdisk Hp V178p 32 Gb', '', '0', '-', 0),
(387, 1, '1010304006000032', 'Usb Switch Printer Nyk', '', '0', '-', 0),
(388, 1, '1010304006000033', 'Kabel Usb Printer 1,5', '', '0', '-', 0),
(389, 1, '1010304006000034', 'Usb Sound Adapter', '', '0', '-', 0),
(390, 8, '1010304006000035', 'Sambungan Type C', '', '0', '-', 0),
(391, 8, '1010304006000036', 'Kabel Hdmi 10 Meter', '', '0', '-', 0),
(392, 8, '1010304006000037', 'Usb Hub 4 Port 2.0 M-tech', '', '0', '-', 0),
(393, 8, '1010304006000038', 'Flashdisk Sandisk Cruzer Blade 128 Gb', '', '0', '-', 0),
(394, 1, '1010304006000039', 'Usb/flashdisk Sandisk Cruzer Glide 32 Gb', '', '0', '-', 0),
(395, 8, '1010304006000040', 'Hub Usb 2.0 4 Port Saklar', '', '0', '-', 0),
(396, 8, '1010304010000002', 'Mouse Wireless Paket Keyboard', '', '0', '-', 0),
(397, 8, '1010304010000003', 'Mouse Logitech', '', '0', '-', 0),
(398, 1, '1010304010000004', 'Mouse Bluetooth Wireless', '', '0', '-', 0),
(399, 1, '1010304010000005', 'Mouse Robot Silent Klik M370', '', '0', '-', 0),
(400, 1, '1010304010000006', 'Mouse Wireless Philips Spk7378', '', '0', '-', 0),
(401, 1, '1010304010000007', 'Mousepad Logitech Studio Series', '', '0', '-', 0),
(402, 1, '1010304010000008', 'Mouse Wireless Logitech', '', '0', '-', 0),
(403, 1, '1010304999000003', 'Card Reader', '', '0', '-', 0),
(404, 1, '1010304999000004', 'Mouse Wireless', '', '1', '-', 0),
(405, 1, '1010304999000007', 'Cardtridge 750', '', '0', '-', 0),
(406, 1, '1010304999000016', 'Kabel Usb Printer', '', '0', '-', 0),
(407, 1, '1010304999000017', 'Mouse Pad', '', '10', '-', 0),
(408, 1, '1010304999000023', 'Cardtridge 751', '', '0', '-', 0),
(409, 1, '1010304999000027', 'Keyboard Logitec', '', '0', '-', 0),
(410, 1, '1010304999000028', 'Kabel Usb', '', '0', '-', 0),
(411, 8, '1010304999000067', 'Kabel Hdmi 20m', '', '0', '-', 0),
(412, 1, '1010304999000077', 'Converter Vga To Hdmi', '', '0', '-', 0),
(413, 8, '1010304999000083', 'Mouse Wireless Logitech M350', '', '0', '-', 0),
(414, 1, '1010304999000086', 'Hdmi 10 Meter', '', '0', '-', 0),
(415, 8, '1010304999000091', 'Mouse Logitech G102', '', '0', '-', 0),
(416, 1, '1010304999000094', 'Mousepad', '', '0', '-', 0),
(417, 8, '1010304999000095', 'Mouse Logitech M171', '', '0', '-', 0),
(418, 8, '1010304999000096', 'Mousepad Razer', '', '0', '-', 0),
(419, 1, '1010304999000097', 'Keyboard Dan Mouse Wireless Km3000', '', '0', '-', 0),
(420, 1, '1010304999000098', 'Gamen Earphone Gaming Gh1500', '', '0', '-', 0),
(421, 1, '1010304999000099', 'M-tech Usb Sound Adapter', '', '0', '-', 0),
(422, 1, '1010304999000100', 'Mousepad Panjang Nyk', '', '0', '-', 0),
(423, 1, '1010304999000101', 'Kabel Hdmi 5m', '', '0', '-', 0),
(424, 1, '1010304999000102', 'Hdd External Case (enclosure Computer)', '', '0', '-', 0),
(425, 1, '1010304999000103', 'Hdmi Splitter 2 Port', '', '0', '-', 0),
(426, 1, '1010304999000104', 'Universal Sambungan Kabel Hdmi F/f', '', '0', '-', 0),
(427, 1, '1010304999000105', 'Mousepad Karakter', '', '0', '-', 0),
(428, 1, '1010304999000106', 'Barel Lan', '', '0', '-', 0),
(429, 8, '1010304999000107', 'Keyboard Wireless Robot Kb30', '', '1', '-', 0),
(430, 4, '1010306010000002', 'Baterai Alkaline A2', '', '11', '-', 0),
(431, 4, '1010306010000003', 'Baterai Alkaline A3', '', '29', '-', 0),
(432, 3, '1010306010000007', 'Baterai Alkaline A2', '', '2', '-', 0),
(433, 1, '1010306010000008', 'Baterai Panasonic Aaa Biasa', '', '0', '-', 0),
(434, 8, '1010306010000009', 'Baterai Alkaline 9 Volt', '', '1', '-', 0),
(435, 4, '1010306010000010', 'Baterai Alkaline Aa (4+2)', '', '0', '-', 0),
(436, 8, '1010310999000001', 'Mesin Penghancur Kertas', '', '0', '-', 0),
(437, 1, '1010310999000001', 'Colokan 1,5 M 3 Lubang', '', '0', '-', 0),
(438, 25, '1010399999000016', 'Materai', '', '306', '-', 0),
(439, 25, '1232123311', 'Kertas A10', '', '100', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `no_berita_acara` varchar(20) DEFAULT NULL,
  `no_bukti` varchar(20) DEFAULT NULL,
  `asal_permintaan` varchar(100) DEFAULT NULL,
  `tanggal_barang_keluar` date DEFAULT NULL,
  `keterangan_barang_keluar` text NOT NULL,
  `status_barang_keluar` varchar(50) DEFAULT 'Menunggu',
  `tanggal_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pimpinan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `3.delete_barang_keluar` AFTER DELETE ON `barang_keluar` FOR EACH ROW DELETE FROM `rincian_barang_keluar` WHERE id_barang_keluar =OLD.id_barang_keluar
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `no_barang_masuk` varchar(10) NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `tanggal_barang_masuk` date NOT NULL,
  `status_input` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `1.delete_barang_masuk` AFTER DELETE ON `barang_masuk` FOR EACH ROW DELETE FROM `rincian_barang_masuk` WHERE id_barang_masuk =OLD.id_barang_masuk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` text NOT NULL,
  `hide_bidang` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `hide_bidang`) VALUES
(1, 'Subbagian Tata Usaha', 0),
(2, 'Bidang Penanganan Sengketa Pertanahan', 0),
(3, 'Bidang Penataan & Pengendalian Pertanahan', 0),
(4, 'Bidang Hak & Pendaftaran Tanah', 0),
(5, 'Bidang Survei, Pengukuran, dan Pemetaan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `keterangan_jabatan` text,
  `hide_jabatan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_bidang`, `nama_jabatan`, `keterangan_jabatan`, `hide_jabatan`) VALUES
(1, 0, 'Kepala Kantor Pertanahan', NULL, 0),
(2, 0, 'Kepala Sub Bagian Tata Usaha', NULL, 0),
(3, 0, 'Kepala Seksi Survei Dan Pemetaan', NULL, 0),
(4, 0, 'Kepala Seksi Penetapan Hak Dan Pendaftaran', NULL, 0),
(5, 0, 'Kepala Seksi Penataan Dan Pemberdayaan', NULL, 0),
(6, 0, 'Kepala Seksi Pengadaan Tanah Dan Pengembangan', NULL, 0),
(7, 0, 'Kepala Seksi Pengendalian Dan Penanganan Sengketa', NULL, 0),
(8, 0, 'Analis Pengelolaan Keuangan Apbn Pertama', NULL, 0),
(9, 0, 'Analis Sumber Daya Manusia Aparatur Pertama', NULL, 0),
(10, 0, 'Penata Kadastral Pertama', NULL, 0),
(11, 4, 'Penata Pertanahan Pertama', '', 0),
(12, 0, 'Analis Keuangan', NULL, 0),
(13, 0, 'Penata Pertanahan Ahli Pertama', NULL, 0),
(14, 0, 'Bendahara', NULL, 0),
(15, 0, 'Pengelola Sistem Dan Jaringan', NULL, 0),
(16, 0, 'Petugas Ukur', NULL, 0),
(17, 0, 'Penata Pertanahan Ahli Muda', NULL, 0),
(18, 0, 'Asisten Penata Kadastral Terampil', NULL, 0),
(19, 2, 'Analis Hukum Pertanahan', '', 0),
(21, 0, 'Pengolah Data Yuridis Pertanahan', NULL, 0),
(22, 0, 'Verifikator Berkas Permohonan Hak', NULL, 0),
(23, 0, 'Asisten Pengadministrasian Umum', NULL, 0),
(24, 0, 'Asisten Verifikator Berkas', NULL, 0),
(25, 0, 'Penjaga Keamanan', NULL, 0),
(26, 0, 'Operator Komputer', NULL, 0),
(27, 0, 'Ahli Pertama - Penata Pertanahan', NULL, 0),
(28, 0, 'Pramubakti', NULL, 0),
(29, 0, 'Juru Ukur', NULL, 0),
(30, 0, 'Customer Service Officer', NULL, 0),
(31, 0, 'Pengemudi', NULL, 0),
(32, 0, 'Asisten Penata Kadastral Pemula', NULL, 0),
(34, 4, 'Konsultan Perorangan', '', 0),
(35, 4, 'Asisten Surveyor Kadastral', '', 0),
(36, 5, 'Penata Pertanahan', '', 0),
(37, 5, 'Pengelola Layanan Operasional', '', 0),
(38, 3, 'Pengadministasi Perkantoran', '', 0),
(39, 4, 'Penata Layanan Operasional', '', 0),
(40, 4, 'Analis Hukum Pertanahan', '', 0),
(41, 1, 'Pengelola Informasi Pertanahan', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nama_pangkat` varchar(100) NOT NULL,
  `hide_pangkat` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `nama_pangkat`, `hide_pangkat`) VALUES
(1, '-', 0),
(2, 'ASK', 0),
(3, 'Outsourcing', 0),
(4, 'PPNPN', 0),
(5, 'PPPK', 0),
(6, 'Juru Muda I/a', 0),
(7, 'Juru Muda Tingkat I I/b', 0),
(8, 'Juru I/c', 0),
(9, 'Juru Tingkat I I/d', 0),
(10, 'Pengatur Muda II/a', 0),
(11, 'Pengatur Muda Tingkat I II/b', 0),
(12, 'Pengatur II/c', 0),
(13, 'Pengatur Tingkat I II/d', 0),
(14, 'Penata Muda III/a', 0),
(15, 'Penata Muda Tingkat I III/b', 0),
(16, 'Penata III/c', 0),
(17, 'Penata Tingkat I III/d', 0),
(18, 'Pembina IV/a', 0),
(19, 'Pembina Tingkat I IV/b', 0),
(20, 'Pembina Utama Muda IV/c', 0),
(21, 'Pembina Utama Madya IV/d', 0),
(22, 'Pembina Utama IV/e', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jenis_register` varchar(11) NOT NULL,
  `nip_no_reg` varchar(20) NOT NULL,
  `status_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_bidang`, `id_pangkat`, `id_jabatan`, `nama_pegawai`, `jenis_register`, `nip_no_reg`, `status_pegawai`) VALUES
(7, 1, 12, 41, 'Maulana Rizki Muhammad', 'NIP', '199809192022041001', 'Aktif'),
(8, 4, 17, 39, 'DENNY PRATIWI, S.K.M.', 'NI PPPK', '19921002 202521 2 07', 'Aktif'),
(9, 4, 5, 39, 'MUHAMAD RIFKY, S.E.', 'NI PPPK', '19930722 202521 1 05', 'Aktif'),
(10, 4, 22, 39, 'Adiguna', 'NIP', '123', 'Aktif');

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `2.delete_pegawai` AFTER DELETE ON `pegawai` FOR EACH ROW DELETE FROM `pengguna` WHERE id_pegawai = OLD.id_pegawai
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `2.insert_pegawai` AFTER INSERT ON `pegawai` FOR EACH ROW INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `nama_pengguna`, `username`, `password`, `level`, `foto_pengguna`, `status_pengguna`)  VALUES (NULL, NEW.id_pegawai, NEW.nama_pegawai, NEW.nip_no_reg, md5(NEW.nip_no_reg), '-', 'profil.png', 'Aktif')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `2.update_pegawai` AFTER UPDATE ON `pegawai` FOR EACH ROW UPDATE pengguna SET nama_pengguna=NEW.nama_pegawai,  username=NEW.nip_no_reg, password=md5(NEW.nip_no_reg) WHERE id_pegawai = NEW.id_pegawai
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturanttd`
--

CREATE TABLE `pengaturanttd` (
  `id_pengaturanttd` int(11) NOT NULL,
  `nama_mengetahui` text NOT NULL,
  `nip_mengetahui` text NOT NULL,
  `jabatan_mengetahui_b1` text NOT NULL,
  `jabatan_mengetahui_b2` text,
  `nama_diserahkan` text NOT NULL,
  `nip_diserahkan` text NOT NULL,
  `jabatan_diserahkan_b1` text NOT NULL,
  `jabatan_diserahkan_b2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturanttd`
--

INSERT INTO `pengaturanttd` (`id_pengaturanttd`, `nama_mengetahui`, `nip_mengetahui`, `jabatan_mengetahui_b1`, `jabatan_mengetahui_b2`, `nama_diserahkan`, `nip_diserahkan`, `jabatan_diserahkan_b1`, `jabatan_diserahkan_b2`) VALUES
(1, 'FITRIAH SUBEKTI, S.ST', '19821122 200312 2 001', 'Kepala Sub Bagian Tata Usaha', '', 'RABIATUL NARALITHA, S.E.', '19930831 201903 2 003', 'Analis Pengelola APBN Pertama', 'Koordinator Kelompok Substansi Keuangan dan BMN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto_pengguna` text NOT NULL,
  `status_pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `nama_pengguna`, `username`, `password`, `level`, `foto_pengguna`, `status_pengguna`) VALUES
(1, NULL, 'Adiguna', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Operator', 'lenovo_3.jpg', 'Aktif'),
(8, 8, 'DENNY PRATIWI, S.K.M.', '19921002 202521 2 07', 'd2aa5cc8b90cd566d43569d6fd4742da', '-', 'profil.png', 'Aktif'),
(9, 9, 'MUHAMAD RIFKY, S.E.', '19930722 202521 1 05', '3aef8802db6a699ba32d28b376277d67', '-', 'profil.png', 'Aktif'),
(10, 10, 'Adiguna', '123', '202cb962ac59075b964b07152d234b70', '-', 'profil.png', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_barang_keluar`
--

CREATE TABLE `rincian_barang_keluar` (
  `id_rincian_barang_keluar` int(11) NOT NULL,
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang_keluar` varchar(10) DEFAULT NULL,
  `permintaan` varchar(10) DEFAULT NULL,
  `rincian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `rincian_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `3.delete_rincian_barang_keluar` AFTER DELETE ON `rincian_barang_keluar` FOR EACH ROW UPDATE barang SET stok_barang = stok_barang + OLD.stok_barang_keluar WHERE id_barang = OLD.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `3.insert_rincian_barang_keluar` AFTER INSERT ON `rincian_barang_keluar` FOR EACH ROW UPDATE barang SET stok_barang = stok_barang - NEW.stok_barang_keluar 	WHERE id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_barang_masuk`
--

CREATE TABLE `rincian_barang_masuk` (
  `id_rincian_barang_masuk` int(11) NOT NULL,
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok_barang_masuk` varchar(10) NOT NULL,
  `harga_barang_masuk` varchar(50) NOT NULL,
  `rincian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `rincian_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `1.delete_rincian_barang_masuk` AFTER DELETE ON `rincian_barang_masuk` FOR EACH ROW UPDATE barang SET stok_barang = stok_barang - OLD.stok_barang_masuk 	WHERE id_barang = OLD.id_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `1.insert_rincian_barang_masuk` AFTER INSERT ON `rincian_barang_masuk` FOR EACH ROW UPDATE barang SET stok_barang = stok_barang + NEW.stok_barang_masuk, harga_barang = NEW.harga_barang_masuk WHERE id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `hide_satuan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `hide_satuan`) VALUES
(1, 'Buah', 0),
(2, 'Botol', 0),
(3, 'Pak', 0),
(4, 'Set', 0),
(5, 'Lsn', 0),
(6, 'Ktk', 0),
(7, 'Lusin', 0),
(8, 'Pcs', 0),
(9, 'Dus', 0),
(10, 'Pack', 0),
(11, 'Kotak', 0),
(12, 'Bush', 0),
(13, 'Doz', 0),
(14, 'Box', 0),
(15, 'Lembar', 0),
(16, 'Rim', 0),
(17, 'Bh', 0),
(18, '0', 0),
(19, 'Roll', 0),
(20, 'Rol', 0),
(21, 'Btl', 0),
(22, 'Adata', 0),
(23, 'Keping', 0),
(24, 'Pasang', 0),
(25, 'Lbr', 0),
(26, 'OK', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengaturanttd`
--
ALTER TABLE `pengaturanttd`
  ADD PRIMARY KEY (`id_pengaturanttd`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `rincian_barang_keluar`
--
ALTER TABLE `rincian_barang_keluar`
  ADD PRIMARY KEY (`id_rincian_barang_keluar`);

--
-- Indexes for table `rincian_barang_masuk`
--
ALTER TABLE `rincian_barang_masuk`
  ADD PRIMARY KEY (`id_rincian_barang_masuk`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pengaturanttd`
--
ALTER TABLE `pengaturanttd`
  MODIFY `id_pengaturanttd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rincian_barang_keluar`
--
ALTER TABLE `rincian_barang_keluar`
  MODIFY `id_rincian_barang_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rincian_barang_masuk`
--
ALTER TABLE `rincian_barang_masuk`
  MODIFY `id_rincian_barang_masuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
