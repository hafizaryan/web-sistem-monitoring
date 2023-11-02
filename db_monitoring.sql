-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
CREATE DATABASE IF NOT EXISTS `db_monitoring` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_monitoring`;

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
(26, 'Riza Fardiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Lengkap'),
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
(31, 35, 'Yudha Wibowopura', 'Atasan PPID Utama Pemerintah Kota Pekanbaru', '2023-08-31', '08:01:00', '[\"4\",\"5\",\"9\"]', 'Selesai');

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
(33, '2023-08-30 16:00:16', 2147483647, 'Riza Fardiansyah', 'Jl.Bidadari No.14 Kota Pekanbaru', 'Pekanbaru', '1977-06-15', 'ferdiansyahrizaa@gmail.com', '081979092812', 'Indonesia', 'Karyawan Swasta', 'Atasan PPID Kantor Agraria Tata Ruang/Badan Pertanahan Nasional (BPN) Pemerintah Kota Pekanbaru', 'Jl. Naga Sakti ', 'Informasi tentang prosedur perizinan dan persyaratan untuk pengalihan hak atas tanah ', 'Keterbukaan Informasi bagi publik', 'Masuk', 26, '[\"Permohonan\"]', 'Reg.022/PSI/KIP-R/III/2023'),
(34, '2023-08-30 16:05:14', 2147483647, 'Heriyadi', 'JL. Sudirman', 'Pekanbaru', '1975-06-03', 'heriyadiii@yahoo.com', '081979092812', 'Indonesia', 'Wiraswasta', 'Atasan PPID Utama Pemerintah Prov.Riau', 'Jl. Pesisir Barat', 'Informasi mengenai anggaran penggunaan dana publik setahun terakhir', 'keterbukaan informasi publik', 'Selesai', 27, '[\"Selesai\",\"Sidang Ke-4\",\"Sidang Ke-3\",\"Sidang Ke-2\",\"Sidang Ke-1\",\"Berkas Lengkap\",\"Permohonan\"]', 'Reg.023/PSI/KIP-R/VII/2023'),
(35, '2023-08-30 16:09:47', 2147483647, 'Yudha Wibowopura', 'Jl. Diponogoro No.002, Kota Pekanbaru', 'Pelalawan', '1997-07-18', 'yudha12_wibowo@gamil.com', '081376568921', 'Indonesia', 'Mahasiswa', 'Atasan PPID Utama Pemerintah Kota Pekanbaru', 'Jl. Riau No.18', ' Laporan kinerja pemerintah provinsi, termasuk capaian dan prestasi dalam berbagai sektor.', 'Sebagai data riset yang diolah untuk penelitian tugas akhir', 'Selesai', 28, '[\"Selesai\",\"Lanjut Ajudikasi\",\"Lanjut Ajudikasi\",\"Lanjut Ajudikasi\",\"Selesai\",\"Selesai\",\"Lanjut Ajudikasi\",\"Lanjut Ajudikasi\",\"Mediasi\",\"Berkas Lengkap\",\"Permohonan\"]', 'Reg.024/KIP-R/IV/2023');

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
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `sengketa`
--
ALTER TABLE `sengketa`
  ADD PRIMARY KEY (`sengketa_id`);

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
  MODIFY `mediasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sengketa`
--
ALTER TABLE `sengketa`
  MODIFY `sengketa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'db_monitoring', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"db_monitoring\",\"phpmyadmin\",\"test\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_columns\":\"something\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_monitoring\",\"table\":\"dokumen\"},{\"db\":\"db_monitoring\",\"table\":\"admin\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-08-30 14:41:49', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
