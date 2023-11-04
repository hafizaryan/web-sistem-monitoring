<?php
include '../koneksi.php';
session_start(); // Don't forget to start the session

$id  = $_POST['id'];
$sengketa  = $_POST['sengketa'];
$lama = mysqli_query($koneksi, "select * from sengketa where sengketa_id='$sengketa'");
$l = mysqli_fetch_assoc($lama);
$nama_pemohon  = $l['nama_pemohon'];
$nama_termohon  = $l['nama_termohon'];
$tgl  = $_POST['tgl'];
$jam  = $_POST['jam'];
$staffArray = $_POST['staff'];
$staffJson = json_encode($staffArray);

$sengketa = mysqli_real_escape_string($koneksi, $sengketa);
$nama_pemohon = mysqli_real_escape_string($koneksi, $nama_pemohon);
$nama_termohon = mysqli_real_escape_string($koneksi, $nama_termohon);
$tgl = mysqli_real_escape_string($koneksi, $tgl);
$jam = mysqli_real_escape_string($koneksi, $jam);
$staffJson = mysqli_real_escape_string($koneksi, $staffJson);

$query = "update mediasi set id_sengketa='$sengketa',nama_pemohon='$nama_pemohon',nama_termohon='$nama_termohon',tgl_mediasi='$tgl',jam_mediasi='$jam',anggota_staff='$staffJson' where mediasi_id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
} else {
    $_SESSION['success_message'] = "Gagal mengubah data.";
}

header("location:mediasi.php");
