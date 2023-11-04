<?php
include '../koneksi.php';
session_start(); // Pastikan session sudah dimulai

$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// Inisialisasi pesan sukses
$success_message = "";

// cek gambar
$rand = rand();
$allowed =  array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (empty($pwd) && empty($filename)) {
    // Jika tidak ada perubahan pada password dan gambar
    mysqli_query($koneksi, "update petugas set petugas_nama='$nama', petugas_username='$username' where petugas_id='$id'");
    $success_message = "Sukses! Data berhasil diubah.";
} elseif (empty($pwd)) {
    // Jika tidak ada perubahan pada password
    if (!in_array($ext, $allowed)) {
        header("location:petugas.php");
    } else {
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/' . $rand . '_' . $filename);
        $x = $rand . '_' . $filename;
        mysqli_query($koneksi, "update petugas set petugas_nama='$nama', petugas_username='$username', petugas_foto='$x' where petugas_id='$id'");
        $success_message = "Sukses! Data berhasil diubah.";
    }
} elseif (empty($filename)) {
    // Jika tidak ada perubahan pada gambar
    mysqli_query($koneksi, "update petugas set petugas_nama='$nama', petugas_username='$username', petugas_password='$password' where petugas_id='$id'");
    $success_message = "Sukses! Data berhasil diubah.";
}

// Set pesan sukses dalam session
$_SESSION['success_message'] = $success_message;

header("location:petugas.php");
