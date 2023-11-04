<!-- kode lama -->
// $nama  = $_POST['nama'];
// $username = $_POST['username'];
// $password = md5($_POST['password']);

// $rand = rand();
// $allowed =  array('gif','png','jpg','jpeg');
// $filename = $_FILES['foto']['name'];

// if($filename == ""){
// 	mysqli_query($koneksi, "insert into petugas values (NULL,'$nama','$username','$password','')");
// 	header("location:petugas.php");
// }else{
// 	$ext = pathinfo($filename, PATHINFO_EXTENSION);

// 	if(!in_array($ext,$allowed) ) {
// 		header("location:petugas.php?alert=gagal");
// 	}else{
// 		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/'.$rand.'_'.$filename);
// 		$file_gambar = $rand.'_'.$filename;
// 		mysqli_query($koneksi, "insert into petugas values (NULL,'$nama','$username','$password','$file_gambar')");
// 		header("location:petugas.php");
// 	}
// }

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

if (empty($nama) || empty($username) || empty($password)) {
    setSuccessMessage("Gagal! Data tidak lengkap.");
}

if ($filename == "") {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO petugas VALUES (NULL, '$nama', '$username', '$hashedPassword', '')";
    mysqli_query($koneksi, $query);

    setSuccessMessage("Sukses! Data berhasil ditambahkan.");
} else {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        setSuccessMessage("Gagal! Jenis file yang diunggah tidak valid.");
    } else {
        $rand = rand();
        $file_gambar = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/petugas/' . $file_gambar);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO petugas VALUES (NULL, '$nama', '$username', '$hashedPassword', '$file_gambar')";
        mysqli_query($koneksi, $query);

        setSuccessMessage("Sukses! Data berhasil ditambahkan.");
    }
}
