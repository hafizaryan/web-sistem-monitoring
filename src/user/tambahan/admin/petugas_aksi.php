<?php
session_start();
include '../koneksi.php';

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password']; // Kata sandi tidak di-hash di sini.

$allowed = array('gif', 'png', 'jpg', 'jpeg');
$filename = $_FILES['foto']['name'];

// Fungsi untuk menghasilkan pesan sukses
function setSuccessMessage($message)
{
    $_SESSION['success_message'] = $message;
    header("location: petugas.php");
    exit;
}

// Fungsi untuk menampilkan pesan kesalahan
function setErrorMessage($message)
{
    $_SESSION['error_message'] = $message;
    header("location: petugas.php");
    exit;
}

try {
    if (empty($nama) || empty($username) || empty($password)) {
        setErrorMessage("Gagal! Data tidak lengkap.");
    }

    if ($filename == "") {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO petugas VALUES (NULL, '$nama', '$username', '$hashedPassword', '')";
        mysqli_query($koneksi, $query);

        setSuccessMessage("Sukses! Data berhasil ditambahkan.");
    } else {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            setErrorMessage("Gagal! Jenis file yang diunggah tidak valid.");
        } else {
            $rand = rand();
            $file_gambar = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/' . $file_gambar);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO petugas VALUES (NULL, '$nama', '$username', '$hashedPassword', '$file_gambar')";
            if (!mysqli_query($koneksi, $query)) {
                throw new mysqli_sql_exception(mysqli_error($koneksi));
            }

            setSuccessMessage("Sukses! Data berhasil ditambahkan.");
        }
    }
} catch (mysqli_sql_exception $e) {
    setErrorMessage("Gagal! Pesan kesalahan: " . $e->getMessage());
}
