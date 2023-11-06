<?php 
include '../koneksi.php';
session_start(); // Jangan lupa untuk memulai sesi

$id = $_GET['id'];
$foto = $d['petugas_foto'];
unlink("../gambar/petugas/$foto");
$data = mysqli_query($koneksi, "select * from petugas where petugas_id='$id'");
// Check if the query was successful
if ($data) {
    mysqli_query($koneksi, "delete from petugas where petugas_id='$id'");
    $_SESSION['success_message'] = "Sukses! Data berhasil dihapus.";
} else {
    $_SESSION['success_message'] = "Gagal menghapus data."; // Pesan kesalahan jika penghapusan gagal
}


header("location:petugas.php");
?>