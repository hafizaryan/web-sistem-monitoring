<?php 
include '../koneksi.php';
session_start(); // Jangan lupa untuk memulai sesi
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from sidang where sidang_id='$id'");
// Check if the query was successful
if ($data) {
    mysqli_query($koneksi, "delete from sidang where sidang_id='$id'");
    $_SESSION['success_message'] = "Sukses! Data berhasil dihapus.";
} else {
    $_SESSION['success_message'] = "Gagal menghapus data."; // Pesan kesalahan jika penghapusan gagal
}
header("location:sidang.php");
