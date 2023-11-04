<?php
session_start(); // Mulai sesi jika belum dimulai

include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$waktu = date('Y-m-d H:i:s');
$alasan = mysqli_real_escape_string($koneksi, $_POST['alasan']);
$informasi = mysqli_real_escape_string($koneksi, $_POST['informasi']);
$alamat_termohon = mysqli_real_escape_string($koneksi, $_POST['alamat_termohon']);
$nama_termohon = mysqli_real_escape_string($koneksi, $_POST['nama_termohon']);
$kerja = mysqli_real_escape_string($koneksi, $_POST['kerja']);
$negara = mysqli_real_escape_string($koneksi, $_POST['negara']);
$no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$ttl = mysqli_real_escape_string($koneksi, $_POST['ttl']);
$ttl_pemohon = mysqli_real_escape_string($koneksi, $_POST['ttl_pemohon']);
$alamat_pemohon = mysqli_real_escape_string($koneksi, $_POST['alamat_pemohon']);
$nama_pemohon = mysqli_real_escape_string($koneksi, $_POST['nama_pemohon']);
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$proses = "Masuk";
$no_registrasi = mysqli_real_escape_string($koneksi, $_POST['no_registrasi']);

$sql = "SELECT dokumen_id FROM dokumen ORDER BY dokumen_id DESC LIMIT 1";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
$dokumen = $row['dokumen_id'] + 1;
$ket = "Belum Lengkap";
$status = "Permohonan";
$statusJson = json_encode([$status]);

try {
    // Insert data ke tabel 'sengketa'
    mysqli_query($koneksi, "INSERT INTO sengketa VALUES (NULL, '$waktu', '$nik', '$nama_pemohon', '$alamat_pemohon', '$ttl_pemohon', '$ttl', '$email', '$no_hp', '$negara', '$kerja', '$nama_termohon', '$alamat_termohon', '$informasi', '$alasan', '$proses', '$dokumen', '$statusJson', '$no_registrasi')");

    // Insert data ke tabel 'dokumen'
    mysqli_query($koneksi, "INSERT INTO dokumen VALUES (NULL, '$nama_pemohon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$ket')");

    $_SESSION['success_message'] = "Sukses! Data berhasil ditambahkan.";

    header("location: permohonan.php");
} catch (mysqli_sql_exception $e) {
    // Jika ada kesalahan dalam eksekusi query, tampilkan pesan kesalahan kepada pengguna
    $_SESSION['error_message'] = "Error: " . $e->getMessage();
    header("location: permohonan.php");
}
?>
