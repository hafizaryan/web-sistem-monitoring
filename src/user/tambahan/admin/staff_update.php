<?php
session_start(); // Don't forget to start the session
include '../koneksi.php';

// Check if POST variables are set
if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['no_hp']) && isset($_POST['jabatan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $jabatan = $_POST['jabatan'];

    // Query to update data in the database
    $query = "UPDATE staff SET nama_staff='$nama', jabatan='$jabatan', no_hp_staff='$no_hp' WHERE id_staff='$id'";

    if (mysqli_query($koneksi, $query)) {
        // If the update is successful
        $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
    } else {
        // If there is an error during the update
        $_SESSION['error_message'] = "Terjadi kesalahan saat mengubah data: " . mysqli_error($koneksi);
    }
} else {
    // Handle the case where POST variables are not set
    $_SESSION['error_message'] = "Terjadi kesalahan. Data tidak lengkap.";
}

// Redirect back to the staff.php page
header("location: staff.php");
?>