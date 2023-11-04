<!-- Kode Lama -->
// $nama  = $_POST['nama'];
// $no_hp = $_POST['no_hp'];
// $jabatan = $_POST['jabatan'];

// mysqli_query($koneksi, "insert into staff values (NULL,'$nama','$jabatan','$no_hp')");
// header("location:staff.php");

<?php
session_start();
include '../koneksi.php';

if (isset($_POST['nama'], $_POST['no_hp'], $_POST['jabatan'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $jabatan = $_POST['jabatan'];

    $query = "INSERT INTO staff (nama_staff, jabatan, no_hp_staff) VALUES ('$nama', '$jabatan', '$no_hp')";
    $message = "Data berhasil ditambahkan.";

    if (mysqli_query($koneksi, $query)) {
        // If the query was successful
        $_SESSION['success_message'] = "Sukses! $message";
    } else {
        // If there was an error
        $_SESSION['error_message'] = "Terjadi kesalahan saat menambahkan data: " . mysqli_error($koneksi);
    }
} else {
    // Handle the case where POST variables are not set
    $_SESSION['error_message'] = "Terjadi kesalahan. Data tidak lengkap.";
}

header("location: staff.php");
?>

