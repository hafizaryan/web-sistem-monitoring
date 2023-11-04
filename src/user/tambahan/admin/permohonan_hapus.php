<?php
include '../koneksi.php';
session_start(); // Jangan lupa untuk memulai sesi
// Cek apakah ada data 'sengketa_id' yang dikirimkan melalui metode POST
if (isset($_POST['sengketa_id'])) {
    $sengketa_id = $_POST['sengketa_id'];
    // Jika penambahan berhasil
    $_SESSION['success_message'] = "Sukses! Data berhasil ditambahkan.";
    // Jika pengeditan berhasil
    $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
    // Jika penghapusan berhasil
    $_SESSION['success_message'] = "Sukses! Data berhasil dihapus.";
    $lama = mysqli_query($koneksi, "select * from dokumen where dokumen_id='$id'");
    $l = mysqli_fetch_assoc($lama);
    $nama_file_ktp = $l['ktp'];
    $nama_file_form = $l['form'];
    $nama_file_bukti = $l['bukti'];
    unlink("../dokumen/" . $nama_file_ktp);
    unlink("../dokumen/" . $nama_file_form);
    unlink("../dokumen/" . $nama_file_bukti);
    mysqli_query($koneksi, "delete from dokumen where dokumen_id='$id'");
    // Lakukan proses penghapusan data berdasarkan 'sengketa_id'
    $sql = "DELETE FROM sengketa WHERE sengketa_id = $sengketa_id";
    if ($koneksi->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Sukses! Data berhasil dihapus.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
