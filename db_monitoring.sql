-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 05:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', '513615287_576347828_logo_orang.png');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `dokumen_id` int(11) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `form` varchar(100) DEFAULT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `spi` varchar(100) DEFAULT NULL,
  `ttpi` varchar(100) DEFAULT NULL,
  `sjpi` varchar(100) DEFAULT NULL,
  `ttsk` varchar(100) DEFAULT NULL,
  `sjk` varchar(100) DEFAULT NULL,
  `keterangan` enum('Lengkap','Belum Lengkap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`dokumen_id`, `nama_pemohon`, `ktp`, `form`, `bukti`, `spi`, `ttpi`, `sjpi`, `ttsk`, `sjk`, `keterangan`) VALUES
(25, 'coba', '242550827_70-Article Text-116-1-10-20200817.pdf', '242550827_213-830-1-PB.pdf', '242550827_jitter_herdian,+04+M.+Sabar+-+STT+Bandung+_JitterAgustus19_20191128.pdf', '242550827_1204-4465-1-PB (1).pdf', '242550827_14.4.2+Hamid+Kurniawan+dkk,+159-169.pdf', '242550827_435-1204-1-PB.pdf', '242550827_449-905-1-SM.pdf', '242550827_13523242 Hafizh Nuur Alfian.pdf', NULL),
(26, 'Riza Fardiansyah', '1631765535_537-Article Text-1863-1-10-20210405.pdf', '1631765535_537-Article Text-1863-1-10-20210405.pdf', '1631765535_CONTOH.pdf', '1631765535_CONTOH.pdf', '1631765535_CONTOH.pdf', '1631765535_CONTOH.pdf', '1631765535_CONTOH.pdf', '1631765535_CONTOH.pdf', 'Belum Lengkap'),
(27, 'Heriyadi', '1739146163_435-1204-1-PB.pdf', '1739146163_1204-4465-1-PB (1).pdf', '1739146163_262-Article Text-722-1-10-20201214.pdf', '1739146163_277404-aplikasi-e-document-pada-kantor-kepala-d-acf56751.pdf', '1739146163_144-509-1-PB.pdf', '1739146163_14.4.2+Hamid+Kurniawan+dkk,+159-169.pdf', '1739146163_946-Article Text-1650-1-10-20200313.pdf', '1739146163_449-905-1-SM.pdf', 'Belum Lengkap'),
(28, 'Yudha Wibowopura', '1683463046_70-Article Text-116-1-10-20200817.pdf', '1683463046_213-830-1-PB.pdf', '1683463046_jitter_herdian,+04+M.+Sabar+-+STT+Bandung+_JitterAgustus19_20191128.pdf', '1683463046_698-Article Text-1625-1-10-20200823.pdf', '1683463046_1204-4465-1-PB (1).pdf', '1683463046_698-Article Text-1625-1-10-20200823.pdf', '1683463046_698-Article Text-1625-1-10-20200823.pdf', '1683463046_277404-aplikasi-e-document-pada-kantor-kepala-d-acf56751.pdf', 'Belum Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `laporan_id` int(11) DEFAULT NULL,
  `sengketa_laporan` int(11) NOT NULL,
  `sidang_laporan` int(11) NOT NULL,
  `file_laporan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mediasi`
--

CREATE TABLE `mediasi` (
  `mediasi_id` int(11) NOT NULL,
  `id_sengketa` int(11) NOT NULL,
  `nama_pemohon` varchar(60) NOT NULL,
  `nama_termohon` varchar(60) NOT NULL,
  `tgl_mediasi` date NOT NULL,
  `jam_mediasi` time NOT NULL,
  `anggota_staff` varchar(60) NOT NULL,
  `keterangan_hasil` enum('Selesai','Lanjut Ajudikasi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediasi`
--

INSERT INTO `mediasi` (`mediasi_id`, `id_sengketa`, `nama_pemohon`, `nama_termohon`, `tgl_mediasi`, `jam_mediasi`, `anggota_staff`, `keterangan_hasil`) VALUES
(30, 32, 'coba', 'lelle', '2023-08-18', '00:00:00', '[\"3\",\"4\"]', 'Lanjut Ajudikasi'),
(31, 35, 'Yudha Wibowopura', 'Atasan PPID Utama Pemerintah Kota Pekanbaru', '2023-08-31', '08:01:00', '[\"4\",\"5\",\"9\"]', 'Selesai'),
(32, 33, 'Riza Fardiansyah', 'Atasan PPID Kantor Agraria Tata Ruang/Badan Pertanahan Nasio', '2023-11-05', '17:55:00', '[\"1\",\"2\"]', NULL),
(33, 33, 'Riza Fardiansyah', 'Atasan PPID Kantor Agraria Tata Ruang/Badan Pertanahan Nasio', '2023-11-05', '17:58:00', '[\"1\",\"2\",\"4\"]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `petugas_nama` varchar(255) NOT NULL,
  `petugas_username` varchar(255) NOT NULL,
  `petugas_password` varchar(255) NOT NULL,
  `petugas_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `petugas_nama`, `petugas_username`, `petugas_password`, `petugas_foto`) VALUES
(7, 'H. Zufra Irwan, SE., MM', 'ketua', '202cb962ac59075b964b07152d234b70', '1122559075_Screenshot 2023-08-11 083508.png'),
(8, 'Junaidi, S.Kom, M.I.Kom', 'wakil_ketua', 'c097210d80ca452c842bb2b29aefdbf3', '726042273_Screenshot 2023-08-11 153100.png'),
(9, 'Hj Yulianti, SH, MH', 'yulianti', 'e9509f9492333828e17bf53cb153b3c7', '979900846_Screenshot 2023-08-11 084005.png');

-- --------------------------------------------------------

--
-- Table structure for table `sengketa`
--

CREATE TABLE `sengketa` (
  `sengketa_id` int(11) NOT NULL,
  `tanggal_permohonan` timestamp NOT NULL DEFAULT current_timestamp(),
  `nik_pemohon` int(60) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `alamat_pemohon` varchar(255) NOT NULL,
  `tempat_lahir_pemohon` varchar(60) NOT NULL,
  `ttl_pemohon` date NOT NULL,
  `email_pemohon` varchar(60) NOT NULL,
  `no_hp_pemohon` varchar(60) NOT NULL,
  `kewarganegaraan_pemohon` varchar(60) NOT NULL,
  `pekerjaan_pemohon` varchar(100) NOT NULL,
  `nama_termohon` varchar(100) NOT NULL,
  `alamat_termohon` varchar(255) NOT NULL,
  `informasi_yang_dimohon` varchar(255) NOT NULL,
  `alasan_permohonan` varchar(255) NOT NULL,
  `proses` enum('Masuk','Diproses','Selesai','') NOT NULL DEFAULT 'Masuk',
  `dokumen_pemohon` int(11) DEFAULT NULL,
  `statuss` varchar(200) NOT NULL,
  `no_registrasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sengketa`
--

INSERT INTO `sengketa` (`sengketa_id`, `tanggal_permohonan`, `nik_pemohon`, `nama_pemohon`, `alamat_pemohon`, `tempat_lahir_pemohon`, `ttl_pemohon`, `email_pemohon`, `no_hp_pemohon`, `kewarganegaraan_pemohon`, `pekerjaan_pemohon`, `nama_termohon`, `alamat_termohon`, `informasi_yang_dimohon`, `alasan_permohonan`, `proses`, `dokumen_pemohon`, `statuss`, `no_registrasi`) VALUES
(33, '2023-08-30 16:00:16', 2147483647, 'Riza Fardiansyah', 'Jl.Bidadari No.14 Kota Pekanbaru', 'Pekanbaru', '1977-06-15', 'ferdiansyahrizaa@gmail.com', '081979092812', 'Indonesia', 'Karyawan Swasta', 'Atasan PPID Kantor Agraria Tata Ruang/Badan Pertanahan Nasional (BPN) Pemerintah Kota Pekanbaru', 'Jl. Naga Sakti ', 'Informasi tentang prosedur perizinan dan persyaratan untuk pengalihan hak atas tanah ', 'Keterbukaan Informasi bagi publik', 'Diproses', 26, '[\"Mediasi\",\"Mediasi\",\"Berkas Lengkap\",\"Permohonan\"]', 'Reg.022/PSI/KIP-R/III/2023');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `sidang_id` int(11) NOT NULL,
  `sengketa` int(11) NOT NULL,
  `nama_pemohon_sidang` varchar(100) NOT NULL,
  `nama_termohon_sidang` varchar(100) NOT NULL,
  `tgl_sidang` date NOT NULL,
  `sidang_ke` varchar(60) NOT NULL,
  `staff_sidang` varchar(100) NOT NULL,
  `catatan_hasil` varchar(255) DEFAULT NULL,
  `keterangan_sidang` enum('Selesai','Lanjut Sidang') DEFAULT NULL,
  `agenda_sidang` varchar(60) NOT NULL,
  `majelis_komisioner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`sidang_id`, `sengketa`, `nama_pemohon_sidang`, `nama_termohon_sidang`, `tgl_sidang`, `sidang_ke`, `staff_sidang`, `catatan_hasil`, `keterangan_sidang`, `agenda_sidang`, `majelis_komisioner`) VALUES
(17, 32, 'coba', 'lelle', '2023-08-23', '1', '[\"1\",\"2\"]', 'lanjut sidang 2', 'Lanjut Sidang', '', ''),
(18, 32, 'coba', 'lelle', '2023-08-25', '2', '[\"1\",\"2\"]', 'oke done', 'Selesai', '', ''),
(19, 34, 'Heriyadi', 'Atasan PPID Utama Pemerintah Prov.Riau', '2023-09-06', '1', '[\"1\",\"5\",\"8\"]', 'Diperlukan pemerikasaan lanjutan yang akan dilaksanakan pada sidang berikutnya', 'Lanjut Sidang', 'Tahapan Awal', 'Asril Darma, Yulianti, Zufra Irwan'),
(20, 34, 'Heriyadi', 'Atasan PPID Utama Pemerintah Prov.Riau', '2023-09-12', '2', '[\"1\",\"5\",\"8\"]', 'Masih dibutuhkan pendatangan saksi pada sidang berikutnya', 'Lanjut Sidang', 'Tahapan Pemeriksaan', 'Asril Darma, Yulianti, Zufra Irwan'),
(21, 34, 'Heriyadi', 'Atasan PPID Utama Pemerintah Prov.Riau', '2023-10-23', '3', '[\"1\",\"2\",\"5\"]', 'Pemeriksaan selesai, putusan akan dibacakn di sidang berikutnya', 'Lanjut Sidang', 'Tahapan Pemeriksaan', 'Tahapan Pemeriksaan');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp_staff` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `jabatan`, `no_hp_staff`) VALUES
(1, 'Didang  Muhanna', 'PP', '0898789998877'),
(2, 'Robby Hidayat', 'Mediator Pembantu', '0821567890086'),
(4, 'Nurita Sari', 'PP', '08135678732423'),
(5, 'Roma Doni', 'Mediator Pembantu', '0821790697568'),
(8, 'Tatang Yudiansyah', 'Mediator', '0856987654321'),
(9, 'Junaidi', 'Mediator', '08197907655');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`dokumen_id`);

--
-- Indexes for table `mediasi`
--
ALTER TABLE `mediasi`
  ADD PRIMARY KEY (`mediasi_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`),
  ADD UNIQUE KEY `petugas_username` (`petugas_username`);

--
-- Indexes for table `sengketa`
--
ALTER TABLE `sengketa`
  ADD PRIMARY KEY (`sengketa_id`),
  ADD UNIQUE KEY `nik_pemohon` (`nik_pemohon`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`sidang_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `dokumen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `mediasi`
--
ALTER TABLE `mediasi`
  MODIFY `mediasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sengketa`
--
ALTER TABLE `sengketa`
  MODIFY `sengketa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `sidang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
