-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2018 pada 15.03
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diklat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kode_admin` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL,
  `status` varchar(15) COLLATE latin1_general_ci NOT NULL DEFAULT 'Administrator'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM01', 'kabid', 'kabid', '0856521667', 'kabid@gmail.com', 'avatar1.jpg', 'Kabid Rendiklat'),
('ADM02', 'administrator', 'adm', '021987662', 'administrator@yahoo.com', 'login.png', 'Administrator'),
('ADM03', 'admin', 'admin', '021872611', 'admin@gmail.com', '32867877_39c9b53b-889e-480d-9360-dbca076257fa_2048_0.jpg', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `id` int(8) NOT NULL,
  `ip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(8) NOT NULL,
  `online` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '::1', '2018-04-28', 143, '1524927786'),
(2, '::1', '2018-05-12', 3, '1526126988'),
(3, '::1', '2018-05-14', 48, '1526306895'),
(4, '::1', '2018-05-15', 155, '1526399444'),
(5, '::1', '2018-05-16', 2, '1526455826'),
(6, '::1', '2018-05-21', 425, '1526914525'),
(7, '::1', '2018-05-22', 25, '1526997358'),
(8, '::1', '2018-05-23', 264, '1527083361'),
(9, '::1', '2018-05-24', 42, '1527140977'),
(10, '::1', '2018-05-25', 3, '1527219809'),
(11, '::1', '2018-05-26', 24, '1527305158'),
(12, '::1', '2018-05-27', 53, '1527435116'),
(13, '::1', '2018-05-28', 41, '1527526214'),
(14, '::1', '2018-05-30', 94, '1527698290'),
(15, '::1', '2018-05-31', 137, '1527759710');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kd_jadwal` int(11) NOT NULL,
  `kd_periode` varchar(10) NOT NULL,
  `kd_kursus` varchar(6) NOT NULL,
  `kd_kursus_dibuka` varchar(10) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(13) NOT NULL,
  `pertemuan_ke` varchar(5) NOT NULL,
  `mata_pelajaran` varchar(30) NOT NULL,
  `tema` varchar(30) NOT NULL,
  `guru` varchar(30) NOT NULL,
  `tempat` varchar(8) NOT NULL,
  `modul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`kd_jadwal`, `kd_periode`, `kd_kursus`, `kd_kursus_dibuka`, `hari`, `tanggal`, `waktu`, `pertemuan_ke`, `mata_pelajaran`, `tema`, `guru`, `tempat`, `modul`) VALUES
(1, 'P180400001', 'KDK002', 'D180400004', 'Senin', '2018-05-07', '07.15 - 08.45', '1 - 2', 'Menyimak', 'Listening', 'Guruh', 'Kelas', ''),
(2, 'P180400001', 'KDK002', 'D180400004', 'Kamis', '2018-05-17', '13.15 - 14.45', '1 - 2', 'Percakapan', 'Conversation', 'Guruh', 'Lapangan', ''),
(3, 'P180400001', 'KDK002', 'D180400006', 'Kamis', '2018-05-09', '10.45 - 12.15', '1 - 2', 'Membaca', 'Reading session', 'Guruh', 'Kelas', ''),
(4, 'P180400001', 'KDK002', 'D180400006', 'Kamis', '2018-05-01', '08.55 - 10.25', '1 - 2', 'Menulis', 'Writing session', 'Guruh', 'Kelas', ''),
(5, 'P180400001', 'KDK002', 'D180400005', 'Selasa', '2018-05-17', '07.15 - 08.45', '1 - 2', 'Percakapan', 'Penjelasan kultur daerah', 'Pa dosen 1', 'Kelas', ''),
(6, 'P180400001', 'KDK002', 'D180400005', 'Senin', '2018-05-09', '07.15 - 08.45', '1 - 2', 'Menulis', 'Writing session', 'guruh', 'Kelas', ''),
(7, 'P180400002', 'KDK002', 'D180500016', 'Rabu', '2018-05-29', '07.15 - 08.45', '1 - 2', 'Menulis', 'Writing session', 'guruh', 'Kelas', ''),
(8, 'P180400002', 'KDK002', 'D180500016', 'Selasa', '2018-05-24', '10.45 - 12.15', '1 - 2', 'Menulis', 'Writing session', 'guruh', 'Kelas', ''),
(9, 'P180400002', 'KDK002', 'D180400011', 'Selasa', '2018-05-22', '07.15 - 08.45', '1 - 2', 'Membaca', 'Reading', 'Guruh', 'Kelas', ''),
(10, 'P180400002', 'KDK002', 'D180400011', 'Rabu', '2018-05-25', '07.15 - 08.45', '1 - 2', 'Mendengarkan', 'Listening session', 'Guruh', 'Kelas', ''),
(11, 'P180400002', 'KDK002', 'D180400010', 'Kamis', '2018-05-14', '10.45 - 12.15', '1 - 2', 'Menulis', 'Writing session', 'Guruh', 'Kelas', ''),
(12, 'P180400002', 'KDK002', 'D180400010', 'Senin', '2018-05-02', '07.15 - 08.45', '1 - 2', 'Menyimak', 'Listening session', 'Guruh', 'Kelas', ''),
(13, 'P180400001', 'KDK002', 'D180500015', 'Rabu', '2018-05-09', '10.45 - 12.15', '1 - 2', 'Berbicara', 'Talking', 'Guruh', 'Kelas', ''),
(14, 'P180400001', 'KDK002', 'D180500015', 'Kamis', '2018-05-07', '08.55 - 10.25', '1 - 2', 'Membaca', 'Writing session', 'Guruh', 'Kelas', ''),
(15, 'P180400002', 'KDK002', 'D180400012', 'Rabu', '2018-05-29', '07.15 - 08.45', '1 - 2', 'Mendengarkan', 'Listening session', 'Guruh', 'Kelas', ''),
(16, 'P180400002', 'KDK002', 'D180400012', 'Kamis', '2018-05-16', '07.15 - 08.45', '1 - 2', 'Menulis', 'Writing session', 'Guruh', 'Kelas', ''),
(18, 'P180400001', 'KDK001', 'D180400002', 'Selasa', '2018-05-16', '07.15 - 08.45', '1 - 2', 'Membaca', 'Cerita', 'guruh', 'Kelas', ''),
(19, 'P180400001', 'KDK002', 'D180400006', 'Rabu', '2018-05-29', '08.55 - 10.25', '1 - 2', 'Menulis', 'Cerita', 'guruh', 'Kelas', ''),
(20, 'P180400002', 'KDK001', 'D180500014', 'Kamis', '2018-05-16', '10.45 - 12.15', '1 - 2', 'Berbicara', 'Reading', 'Guruh', 'Kelas', ''),
(22, 'P180500003', 'KDK006', 'D180500026', 'Kamis', '2018-05-18', '10.45 - 12.15', '5 - 6', 'Mendengarkan', 'Listening session', 'guruh', 'Kelas', ''),
(23, 'P180500003', 'KDK006', 'D180500026', 'Kamis', '2018-10-10', '10.45 - 12.15', '5 - 6', 'Menyimak', 'Reading', 'guruh', 'Kelas', ''),
(24, 'P180500003', 'KDK006', 'D180500026', 'Senin', '2018-05-16', '07.15 - 08.45', '1 - 2', 'Berbicara', 'Reading', 'Guruh', 'Kelas', ''),
(25, 'P180500003', 'KDK006', 'D180500026', 'Selasa', '2018-05-09', '08.55 - 10.25', '5 - 6', 'Berbicara', 'Cerita', 'guruh', 'Kelas', ''),
(26, 'P180500003', 'KDK006', 'D180500026', 'Selasa', '2018-11-06', '10.45 - 12.15', '3 - 4', 'Membaca', 'Listening session', 'guruh', 'Kelas', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kursus`
--

CREATE TABLE `tb_kursus` (
  `kd_kursus` varchar(6) NOT NULL,
  `nama_kursus` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kursus`
--

INSERT INTO `tb_kursus` (`kd_kursus`, `nama_kursus`, `keterangan`, `gambar`) VALUES
('KDK001', 'Indonesia', '', 'Indonesia.png'),
('KDK002', 'Inggris', '', 'Inggris.jpg'),
('KDK003', 'Bahasa Arab', '', 'Arab.png'),
('KDK004', 'Jerman', '', 'Jerman.png'),
('KDK005', 'Korea', '', 'Korea.png'),
('KDK006', 'Jepang', '', 'Jepang.png'),
('KDK007', 'Mandarin', '', 'Mandarin.png'),
('KDK008', 'Perancis', '', 'Perancis.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kursus_dibuka`
--

CREATE TABLE `tb_kursus_dibuka` (
  `kd_kursus_dibuka` varchar(10) NOT NULL,
  `kd_kursus` varchar(6) NOT NULL,
  `kd_periode` varchar(10) NOT NULL,
  `nama_subkursus` varchar(50) NOT NULL,
  `gelombang` varchar(1) NOT NULL,
  `tingkat` varchar(12) NOT NULL,
  `sifat` varchar(12) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `jampel` varchar(3) NOT NULL,
  `siswa` varchar(3) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `ujian_masuk` date NOT NULL,
  `buka` date NOT NULL,
  `ujian_tengah` date NOT NULL,
  `ujian_akhir` date NOT NULL,
  `tutup` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kursus_dibuka`
--

INSERT INTO `tb_kursus_dibuka` (`kd_kursus_dibuka`, `kd_kursus`, `kd_periode`, `nama_subkursus`, `gelombang`, `tingkat`, `sifat`, `bulan`, `jampel`, `siswa`, `kelas`, `ujian_masuk`, `buka`, `ujian_tengah`, `ujian_akhir`, `tutup`, `keterangan`) VALUES
('D180400001', 'KDK001', 'P180400001', 'KIBINA tingkat dasar ke 1', '1', 'Elementary', 'Intensif', '3', '218', '24', '2', '2017-01-05', '2017-01-16', '2017-02-13', '2017-03-06', '2017-03-27', ''),
('D180400002', 'KDK001', 'P180400001', 'KIBINA tingkat pemula ke 1', '3', 'Beginner', 'Intensif', '3', '310', '36', '3', '2017-08-10', '2017-08-21', '2017-09-18', '2017-10-16', '2017-10-25', ''),
('D180400003', 'KDK001', 'P180400001', 'KIBINA tingkat atas ke 1', '4', 'Advanced', 'Intensif', '3', '218', '24', '2', '2017-10-02', '2017-10-09', '2017-11-01', '2017-12-04', '2017-12-18', ''),
('D180400004', 'KDK002', 'P180400001', 'KIBI tingkat dasar ke 1', '1', 'Elementary', 'Intensif', '3', '218', '48', '4', '2017-02-06', '2017-02-13', '2017-03-15', '2017-04-03', '2017-04-10', ''),
('D180400005', 'KDK002', 'P180400001', 'KIBI tingkat pemula ke 1', '2', 'Beginner', 'Intensif', '4', '310', '24', '2', '2017-04-03', '2017-04-10', '2017-05-01', '2017-05-29', '2017-05-08', ''),
('D180400006', 'KDK002', 'P180400001', 'KIBI tingkat menengah ke 1', '2', 'Intermediate', 'Intensif', '4', '310', '24', '2', '2017-06-05', '2017-06-12', '2017-07-03', '2017-07-24', '2017-08-01', ''),
('D180400007', 'KDK001', 'P180400002', 'KIBINA tingkat menengah ke 2', '1', 'Intermediate', 'Intensif', '3', '218', '24', '2', '2018-01-05', '2018-01-15', '2018-02-01', '2018-03-12', '2018-03-19', ''),
('D180400008', 'KDK001', 'P180400002', 'KIBINA  dasar ke 2', '2', 'Elementary', 'Intensif', '3', '310', '24', '2', '2018-04-02', '2018-04-09', '2018-05-07', '2018-05-28', '2018-06-04', ''),
('D180400009', 'KDK001', 'P180400002', 'KIBINA tingkat pemula ke 2', '3', 'Beginner', 'Intensif', '3', '310', '24', '2', '2018-07-02', '2018-07-09', '2018-08-01', '2018-09-03', '2018-09-17', ''),
('D180400010', 'KDK002', 'P180400002', 'KIBI tingkat dasar ke 2', '1', 'Elementary', 'Intensif', '4', '310', '48', '4', '2018-03-05', '2018-03-12', '2018-04-23', '2018-05-28', '2018-06-04', ''),
('D180400011', 'KDK002', 'P180400002', 'KIBI tingkat menengah ke 2', '2', 'Intermediate', 'Intensif', '4', '310', '24', '2', '2018-06-04', '2018-06-11', '2018-07-02', '2018-08-06', '2018-09-10', ''),
('D180400012', 'KDK002', 'P180400002', 'KIBI tingkat atas ke 2', '4', 'Advanced', 'Intensif', '4', '310', '20', '2', '2018-09-03', '2018-09-10', '2018-10-29', '2018-11-26', '2018-12-03', ''),
('D180500013', 'KDK001', 'P180400001', ' KIBINA  tingkat  menengah ke 1 ', '3', 'Intermediate', 'Intensif', '3', '310', '36', '3', '2017-05-23', '2017-05-11', '2017-06-12', '2017-07-10', '2017-07-30', ''),
('D180500014', 'KDK001', 'P180400002', 'KIBINA tingkat atas ke 2', '4', 'Advanced', 'Intensif', '4', '380', '25', '2', '2018-08-01', '2018-08-21', '2018-09-24', '2018-09-24', '2018-10-15', ''),
('D180500015', 'KDK002', 'P180400001', 'KIBI tingkat atas ke 1', '4', 'Advanced', 'Intensif', '4', '410', '36', '3', '2017-08-21', '2017-08-28', '2017-09-25', '2017-11-06', '2017-11-20', ''),
('D180500016', 'KDK002', 'P180400002', 'KIBI tingkat pemula ke 2', '1', 'Beginner', 'Intensif', '2', '270', '48', '4', '2018-01-15', '2018-01-22', '2018-02-26', '2018-03-26', '2018-04-02', ''),
('D180500017', 'KDK003', 'P180400001', 'KIBA Arab tingkat pemula ke 1', '1', 'Beginner', 'Intensif', '2', '270', '24', '2', '2017-01-23', '2017-02-01', '2017-02-27', '2017-03-20', '2017-03-27', ''),
('D180500018', 'KDK003', 'P180400001', 'KIBA Arab tingkat dasar ke 1', '2', 'Elementary', 'Intensif', '3', '310', '36', '3', '2017-04-03', '2017-04-10', '2017-05-29', '2017-06-26', '2017-07-03', ''),
('D180500019', 'KDK003', 'P180400001', 'KIBA Arab tingkat menengah ke 1', '3', 'Intermediate', 'Intensif', '3', '380', '24', '2', '2017-05-24', '2017-06-01', '2017-07-10', '2017-08-21', '2017-08-28', ''),
('D180500020', 'KDK003', 'P180400001', 'KIBA Arab tingkat atas ke 1', '4', 'Advanced', 'Intensif', '4', '410', '24', '2', '2017-05-16', '2017-06-12', '2017-07-24', '2017-08-21', '2017-08-28', ''),
('D180500021', 'KDK003', 'P180400002', 'KIBA Arab tingkat pemula ke 2', '1', 'Beginner', 'Intensif', '2', '270', '48', '4', '2018-01-08', '2018-01-25', '2018-02-26', '2018-03-26', '2018-04-02', ''),
('D180500022', 'KDK003', 'P180400002', 'KIBA Arab tingkat dasar ke 2', '2', 'Elementary', 'Intensif', '3', '310', '36', '3', '2018-03-05', '2018-03-19', '2018-05-28', '2018-06-25', '2018-08-06', ''),
('D180500023', 'KDK003', 'P180400002', 'KIBA Arab tingkat menengah ke 2', '3', 'Intermediate', 'Intensif', '3', '380', '24', '2', '2018-07-02', '2018-07-16', '2018-08-13', '2018-09-17', '2018-09-24', ''),
('D180500024', 'KDK003', 'P180400002', 'KIBA Arab tingkat atas ke 2', '4', 'Advanced', 'Intensif', '4', '410', '24', '2', '2018-08-01', '2018-08-13', '2018-10-01', '2018-11-19', '2018-12-03', ''),
('D180500025', 'KDK004', 'P180400001', 'KIBA Jerman tingkat pemula ke 1', '1', 'Beginner', 'Intensif', '2', '270', '36', '3', '2017-05-01', '2017-05-15', '2017-06-19', '2017-07-17', '2017-07-24', ''),
('D180500026', 'KDK006', 'P180500003', 'KIBA Arab tingkat dasar ke 1', '3', 'Elementary', 'Intensif', '3', '270', '36', '3', '2018-05-14', '2018-05-13', '2018-05-07', '2018-05-21', '2018-05-24', ''),
('D180500027', 'KDK008', 'P180500003', 'KIBA Perancis tingkat menengah ke 3', '2', 'Intermediate', 'Intensif', '3', '270', '25', '2', '2018-05-22', '2018-05-08', '2018-05-09', '2018-05-03', '2018-01-09', ''),
('D180500028', 'KDK003', 'P180500003', 'KIBA Arab tingkat pemula ke 1', '4', 'Beginner', 'Intensif', '2', '270', '25', '3', '2018-05-23', '2018-05-08', '2018-05-08', '2018-05-22', '2018-05-22', ''),
('D180500029', 'KDK003', 'P180500003', 'KIBA Arab tingkat dasar ke 1', '4', 'Intermediate', 'Intensif', '4', '410', '25', '1', '2018-05-08', '2018-05-01', '2018-05-02', '2018-05-22', '2018-05-29', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `kd_nilai` varchar(10) NOT NULL,
  `kd_pendaftaran` varchar(10) NOT NULL,
  `kd_periode` varchar(10) NOT NULL,
  `kd_kursus` varchar(6) NOT NULL,
  `kd_kursus_dibuka` varchar(10) NOT NULL,
  `nrp` varchar(18) NOT NULL,
  `keterangan` varchar(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`kd_nilai`, `kd_pendaftaran`, `kd_periode`, `kd_kursus`, `kd_kursus_dibuka`, `nrp`, `keterangan`, `jumlah`, `nilai`) VALUES
('N180500007', 'R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', 'Ujian Masuk', 360000, 36),
('N180500008', 'R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', 'Tengah', 540000, 54),
('N180500009', 'R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', 'Akhir', 405000, 40.5),
('N180500010', 'R180500004', 'P180400001', 'KDK002', 'D180500015', '1410512044', 'Ujian Masuk', 872962, 87.2962),
('N180500011', 'R180500004', 'P180400001', 'KDK002', 'D180500015', '1410512044', 'Tengah', 324000, 32.4),
('N180500012', 'R180500004', 'P180400001', 'KDK002', 'D180500015', '1410512044', 'Akhir', 513000, 51.3),
('N180500016', 'R180500005', 'P180400001', 'KDK002', 'D180400004', '1210512027', 'Ujian Masuk', 486000, 48.6),
('N180500018', 'R180500005', 'P180400001', 'KDK002', 'D180400004', '1210512027', 'Akhir', 409000, 40.9),
('N180500019', 'R180500024', 'P180400001', 'KDK002', 'D180500015', '1210512022', 'Akhir', 21912, 2.1912);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_detail`
--

CREATE TABLE `tb_nilai_detail` (
  `id` int(11) NOT NULL,
  `kd_nilai` varchar(10) NOT NULL,
  `materi` varchar(30) NOT NULL,
  `murni` int(6) NOT NULL,
  `harga` int(6) NOT NULL,
  `prestasi` int(6) NOT NULL,
  `bobot` int(6) NOT NULL,
  `prestasi_akhir` int(6) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_detail`
--

INSERT INTO `tb_nilai_detail` (`id`, `kd_nilai`, `materi`, `murni`, `harga`, `prestasi`, `bobot`, `prestasi_akhir`, `keterangan`) VALUES
(16, 'N180500002', 'ALCPT', 90, 1000, 90000, 3, 270000, ''),
(17, 'N180500002', 'Menulis', 83, 1000, 83000, 2, 166000, ''),
(20, 'N180500004', 'Menyimak', 81, 1000, 81000, 2, 162000, ''),
(21, 'N180500004', 'ALCPT', 81, 1000, 81000, 2, 162000, ''),
(22, 'N180500005', 'Menulis', 90, 1000, 90000, 2, 180000, ''),
(23, 'N180500005', 'Menulis', 81, 1000, 81000, 3, 243000, ''),
(24, 'N180500006', 'ALCPT', 90, 1000, 90000, 2, 180000, ''),
(25, 'N180500006', 'Membaca', 81, 1000, 81000, 2, 162000, ''),
(26, 'N180500004', 'Menyimak', 90, 1000, 90000, 3, 270000, ''),
(27, 'N180500009', 'ALCPT', 81, 1000, 81000, 2, 162000, ''),
(28, 'N180500009', 'Membaca', 81, 1000, 81000, 3, 243000, ''),
(29, 'N180500008', 'Menyimak', 90, 1000, 90000, 3, 270000, ''),
(30, 'N180500008', 'Berbicara', 90, 1000, 90000, 3, 270000, ''),
(31, 'N180500007', 'ALCPT', 90, 1000, 90000, 2, 180000, ''),
(32, 'N180500007', 'Menulis', 90, 1000, 90000, 2, 180000, ''),
(33, 'N180500010', 'ALCPT', 81, 1000, 81000, 3, 243000, ''),
(34, 'N180500010', 'Menulis', 83, 1000, 83000, 3, 249000, ''),
(35, 'N180500011', 'ALCPT', 81, 1000, 81000, 2, 162000, ''),
(36, 'N180500011', 'ALCPT', 81, 1000, 81000, 2, 162000, ''),
(37, 'N180500012', 'ALCPT', 81, 1000, 81000, 3, 243000, ''),
(38, 'N180500012', 'Menulis', 90, 1000, 90000, 3, 270000, ''),
(39, 'N180500013', 'Membaca', 67, 1000, 67000, 2, 134000, ''),
(40, 'N180500013', 'ALCPT', 81, 1000, 81000, 3, 243000, ''),
(41, 'N180500014', 'Menyimak', 81, 1000, 81000, 3, 243000, ''),
(42, 'N180500014', 'ALCPT', 83, 1000, 83000, 3, 249000, ''),
(43, 'N180500015', 'Berbicara', 83, 1000, 83000, 2, 166000, ''),
(44, 'N180500015', 'Menulis', 83, 1000, 83000, 2, 166000, ''),
(45, 'N180500016', 'ALCPT', 81, 1000, 81000, 3, 243000, ''),
(46, 'N180500016', 'Menyimak', 81, 1000, 81000, 3, 243000, ''),
(47, 'N180500018', 'Membaca', 83, 1000, 83000, 3, 249000, ''),
(48, 'N180500018', 'Menulis', 80, 1000, 80000, 2, 160000, ''),
(49, 'N180500001', 'ALCPT', 90, 1000, 90000, 3, 270000, ''),
(50, 'N180500001', 'Membaca', 83, 1000, 83000, 2, 166000, ''),
(51, 'N180500003', 'Pembinaan Kejuangan dan Keprib', 83, 1000, 83000, 3, 249000, ''),
(52, 'N180500003', 'Mendengar', 88, 121, 10648, 6, 63888, ''),
(53, 'N180500003', 'Berbicara', 98, 300, 29400, 6, 176400, ''),
(54, 'N180500003', 'Membaca', 93, 132, 12276, 6, 73656, ''),
(55, 'N180500003', 'Menulis', 97, 194, 18818, 6, 112908, ''),
(56, 'N180500003', 'Tata Bahasa', 93, 132, 12276, 6, 73656, ''),
(57, 'N180500003', 'Menulis', 98, 121, 11858, 6, 71148, ''),
(58, 'N180500003', 'Pembinaan Jasmani', 75, 1000, 75000, 1, 75000, ''),
(59, 'N180500010', 'Menulis', 81, 194, 15714, 6, 94284, ''),
(60, 'N180500010', 'Berbicara', 83, 121, 10043, 2, 20086, ''),
(61, 'N180500010', 'Menyimak', 75, 132, 9900, 6, 59400, ''),
(62, 'N180500010', 'Berbicara', 90, 194, 17460, 6, 104760, ''),
(63, 'N180500010', 'Mendengar', 88, 194, 17072, 6, 102432, ''),
(64, 'N180500019', 'ALCPT', 83, 132, 10956, 2, 21912, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `kd_pendaftaran` varchar(10) NOT NULL,
  `kd_periode` varchar(10) NOT NULL,
  `kd_kursus` varchar(6) NOT NULL,
  `kd_kursus_dibuka` varchar(10) NOT NULL,
  `nrp` varchar(18) NOT NULL,
  `golongan` varchar(9) NOT NULL,
  `no_sprint` varchar(18) NOT NULL,
  `no_surat` varchar(18) NOT NULL,
  `surat` varchar(17) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`kd_pendaftaran`, `kd_periode`, `kd_kursus`, `kd_kursus_dibuka`, `nrp`, `golongan`, `no_sprint`, `no_surat`, `surat`, `tanggal_surat`, `gambar`, `tanggal_daftar`, `status`) VALUES
('R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', '', '', '', '', '0000-00-00', '', '2018-05-15', 'Tidak Sesuai'),
('R180500004', 'P180400001', 'KDK002', 'D180500015', '1410512044', '', '', '', '', '0000-00-00', '', '2018-05-15', 'Diterima'),
('R180500005', 'P180400001', 'KDK002', 'D180400004', '1210512027', '', '', 'pppppppppppppppppp', 'SK-Diterima', '2018-05-17', '', '2018-05-15', 'Diterima'),
('R180500014', 'P180400001', 'KDK002', 'D180400004', '1410512045', '', '', '', 'SK-Diterima', '2018-05-01', '', '2018-05-21', 'Diterima'),
('R180500015', 'P180400001', 'KDK002', 'D180400006', '1410512045', '', '', '', '', '0000-00-00', '', '2018-05-21', 'Diterima'),
('R180500017', 'P180400001', 'KDK002', 'D180400005', '1410512047', '', '', '', '', '0000-00-00', '', '2018-05-21', 'Diterima'),
('R180500024', 'P180400001', 'KDK002', 'D180500015', '1210512022', '', '', '', '', '0000-00-00', '', '2018-05-23', 'Tidak Diterima'),
('R180500025', 'P180400002', 'KDK002', 'D180400012', '1410512045', 'Pa-men-ti', '', '', '', '0000-00-00', 'avatar.jpg', '2018-05-26', 'Proses'),
('R180500026', 'P180400002', 'KDK002', 'D180400010', '1410512047', 'Pen-pe', '', '', '', '0000-00-00', 'avatar.jpg', '2018-05-27', 'Proses'),
('R180500027', 'P180400002', 'KDK002', 'D180400010', '1410512047', 'Pen-pe', '', '', '', '0000-00-00', 'avatar.jpg', '2018-05-27', 'Proses'),
('R180500028', 'P180400002', 'KDK002', 'D180400011', '1410512047', 'Pen-pe', '', '', '', '0000-00-00', 'avatar.jpg', '2018-05-27', 'Proses'),
('R180500029', 'P180400002', 'KDK002', 'D180400012', '1410512047', 'Pen-pe', '', '', '', '0000-00-00', '61-102-1-PB.pdf', '2018-05-27', 'Proses'),
('R180500031', 'P180400002', 'KDK003', 'D180500021', '9109203912', 'Pa-men-ti', '', 'dsdsd', 'SK-Diterima', '2018-05-17', 'avatar.jpg', '2018-05-30', 'Diterima'),
('R180500032', 'P180400002', 'KDK003', 'D180500023', '9109203912', 'Pa-men-ti', '', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500033', 'P180500003', 'KDK003', 'D180500028', '1410512045', 'Pa-men-ti', '', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500034', 'P180400002', 'KDK002', 'D180500016', '1410512045', 'Pa-men-ti', '44444444444', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500035', 'P180400002', 'KDK002', 'D180400010', '1410512045', 'Pa-men-ti', 'abcd', '', '', '0000-00-00', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500036', 'P180400002', 'KDK003', 'D180500021', '1410512045', 'Pa-men-ti', '', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500037', 'P180400002', 'KDK003', 'D180500022', '1410512045', 'Pa-men-ti', 'aaaaaaaaaaasssssss', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500038', 'P180400002', 'KDK002', 'D180400011', '1410512045', 'Pa-men-ti', '', '', '', '2018-05-30', 'avatar.jpg', '2018-05-30', 'Proses'),
('R180500039', 'P180400002', 'KDK001', 'D180400007', '9109203912', 'Pa-men-ti', 'aaaaaaaaaaaaaassss', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500040', 'P180400002', 'KDK001', 'D180500014', '9109203912', 'Pa-men-ti', 'indonesia', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500041', 'P180400002', 'KDK002', 'D180400012', '9109203912', 'Pa-men-ti', 'adna', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500042', 'P180400002', 'KDK003', 'D180500024', '9109203912', 'Pa-men-ti', '', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500043', 'P180400002', 'KDK001', 'D180400009', '9109203912', 'Pa-men-ti', '', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500044', 'P180400002', 'KDK002', 'D180500016', '9109203912', 'Pa-men-ti', '', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500045', 'P180400002', 'KDK003', 'D180500022', '9109203912', 'Pa-men-ti', '', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses'),
('R180500046', 'P180400002', 'KDK001', 'D180400007', '1410512044', 'Pen-pe', '', '', '', '2018-05-31', 'avatar.jpg', '2018-05-31', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periode`
--

CREATE TABLE `tb_periode` (
  `kd_periode` varchar(10) NOT NULL,
  `nama_periode` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_periode`
--

INSERT INTO `tb_periode` (`kd_periode`, `nama_periode`, `status`) VALUES
('P180400001', 'Tahun ajaran 2017', 'Tidak Aktif'),
('P180400002', 'Tahun ajaran 2018', 'Aktif'),
('P180500003', 'Tahun ajaran 2019', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `nrp` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `korps` varchar(20) NOT NULL,
  `golongan` varchar(9) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(15) NOT NULL,
  `agama` varchar(7) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `kesatuan` varchar(20) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `telepon_kantor` varchar(15) NOT NULL,
  `kota_kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nama_pasangan` varchar(30) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `pendidikan_umum` varchar(20) NOT NULL,
  `fakultas` varchar(20) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `nama_sekolah` varchar(20) NOT NULL,
  `pendidikan_militer` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_peserta`
--

INSERT INTO `tb_peserta` (`nrp`, `nama`, `pangkat`, `korps`, `golongan`, `tempat_lahir`, `tanggal_lahir`, `agama`, `jabatan`, `kesatuan`, `alamat_kantor`, `telepon_kantor`, `kota_kabupaten`, `provinsi`, `jenis_kelamin`, `nama_pasangan`, `alamat_rumah`, `telepon`, `pendidikan_umum`, `fakultas`, `jurusan`, `nama_sekolah`, `pendidikan_militer`, `password`, `username`, `gambar`, `status`) VALUES
('1210512022', 'Dian', 'Letnan Satu', 'Administrasi', '', 'Surabaya', '1994-11-15', 'Hindu', 'staf ahli', 'Sahli Kasad', 'Cilangkap jaya', '021989987', 'Brebes', 'Jawa Tengah', 'Perempuan', 'Nope', 'Jl wetan ', '02500387', '', '', '', 'Sman 1 Surabaya', 'Taruni Akmil', 'dian', 'dian', 'avatar-mini3.jpg', 'Aktif'),
('1210512027', 'Ridham w', 'Sersan Dua', '', 'Tamtama', 'Yogyakarta', '1994-02-8', 'Katolik', 'Sekretaris', 'Kohanud', 'Jl gajahmada', '021938379', 'Sleman', 'Yogyakarta', 'Laki-Laki', 'Nope', 'Jalan margasatwa pos II', '0211222', 'Sarjana Akuntansi', 'Ekonomi bisnis', 'Manajemen bisnis', 'Universitas Telkom', '', 'ridham', 'ridham', 'MarkTwain.jpg', 'Aktif'),
('1410512044', 'Ahmad Ramdani', 'III - c', '', 'Penata', 'Depok', '1996-10-17', 'Islam', 'staf ahli', 'Saber', 'Pondok Labu', '0212000221', 'Jakarta', 'Dki Jakarta', 'Laki-Laki', 'Nope', 'Magonda raya', '021220023', 'Sarjana komputer', 'Ilmu Komputer', 'Sistem informasi', 'UPNVJ', '', 'dani', 'dani', 'KiHajarDewantara.jpg', 'Aktif'),
('1410512045', 'Andharu Bagaskoro', 'Letnan Satu', 'Comp', 'Perwira', 'Jakarta', '1996-08-21', 'Islam', 'staf ahli', 'Disbang', 'Cilangkap jaya', '021211212000', 'Jakarta', 'Dki Jakarta', 'Laki-Laki', 'Nope', 'Jl kelurahan', '08123456789', 'Sarjana komputer', 'Komputer', 'Sistem informasi', 'UPNVJ', 'Perwira karir', 'andharu', 'andharu', 'mail-avatar.jpg', 'Aktif'),
('1410512046', 'M Lutfi', 'Letnan Satu', 'Elektro', 'Perwira', 'Jakarta', '1996-01-8', 'Islam', 'staf elektro', 'Setum', 'Sentul barat', '022979991', 'Bogor', 'Jawa Barat', 'Laki-Laki', 'Nope', 'Parung serab, bogor', '085211823', '', '', '', '', 'Akmil XXIX', 'lutfi', 'lutfi', 'avatar-mini2.jpg', 'Aktif'),
('1410512047', 'Riyan Setiawan', 'III - c', '', 'Penata', 'Jakarta', '1993-07-14', 'Islam', 'Kepala divisi pertahanan', 'Balitbang AL', 'jl pondok labu', '021872218', 'Jakarta', 'Dki Jakarta', 'Laki-Laki', 'Lianda', 'Citayam Raya', '082137717', 'Sarjana komputer', 'Komputer', 'Sistem informasi', 'UPNVJ', '', 'riyanriyan', 'riyanriyan', 'avatar-mini4.jpg', 'Aktif'),
('9109203912', 'Peserta1', 'Kapten', 'Komando', 'Perwira', 'Bogor', '2018-05-01', 'Budha', 'Komandan', 'Marinir', 'Jl. sby timur', '0282324454', 'Surabaya', 'Jawa Timur', 'Laki-Laki', 'nope', 'JL. Jati ', '08555821', '', '', '', '', 'AAL', 'peserta1', 'peserta1', 'avatar.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `kd_sertifikat` varchar(10) NOT NULL,
  `kd_pendaftaran` varchar(10) NOT NULL,
  `kd_periode` varchar(10) NOT NULL,
  `kd_kursus` varchar(6) NOT NULL,
  `kd_kursus_dibuka` varchar(10) NOT NULL,
  `nrp` varchar(18) NOT NULL,
  `status` varchar(11) NOT NULL,
  `tanggal_pembuatan` date NOT NULL,
  `no_sertifikat` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sertifikat`
--

INSERT INTO `tb_sertifikat` (`kd_sertifikat`, `kd_pendaftaran`, `kd_periode`, `kd_kursus`, `kd_kursus_dibuka`, `nrp`, `status`, `tanggal_pembuatan`, `no_sertifikat`) VALUES
('S180500003', 'R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', 'Lulus', '2018-05-15', ''),
('S180500004', 'R180500004', 'P180400001', 'KDK002', 'D180500015', '1410512044', 'Lulus', '2018-05-15', ''),
('S180500006', 'R180500005', 'P180400001', 'KDK002', 'D180400004', '1210512027', 'Lulus', '2018-05-15', ''),
('S180500012', 'R180500017', 'P180400001', 'KDK002', 'D180400005', '1410512047', 'Proses', '2018-05-22', ''),
('S180500013', 'R180500003', 'P180400001', 'KDK002', 'D180400006', '1410512046', 'Proses', '2018-05-24', ''),
('S180500016', 'R180500015', 'P180400001', 'KDK002', 'D180400006', '1410512045', 'Lulus', '2018-05-23', '2'),
('S180500017', 'R180500017', 'P180400001', 'KDK002', 'D180400005', '1410512047', 'Lulus', '2018-05-19', '1'),
('S180500018', 'R180500024', 'P180400001', 'KDK002', 'D180500015', '1210512022', 'Proses', '2018-05-20', 'uuuuuu'),
('S180500019', 'R180500024', 'P180400001', 'KDK002', 'D180500015', '1210512022', 'Lulus', '2018-05-18', '1'),
('S180500020', 'R180500031', 'P180400002', 'KDK003', 'D180500021', '9109203912', 'Lulus', '2018-05-17', 'bbbbbbbbbbb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `tb_kursus`
--
ALTER TABLE `tb_kursus`
  ADD PRIMARY KEY (`kd_kursus`);

--
-- Indexes for table `tb_kursus_dibuka`
--
ALTER TABLE `tb_kursus_dibuka`
  ADD PRIMARY KEY (`kd_kursus_dibuka`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `tb_nilai_detail`
--
ALTER TABLE `tb_nilai_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`kd_pendaftaran`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`kd_periode`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD PRIMARY KEY (`kd_sertifikat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `kd_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_nilai_detail`
--
ALTER TABLE `tb_nilai_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
