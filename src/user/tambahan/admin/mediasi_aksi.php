<?php
include '../koneksi.php';

session_start();

$sengketa  = $_POST['sengketa'];
$lama = mysqli_query($koneksi, "select * from sengketa where sengketa_id='$sengketa'");
$l = mysqli_fetch_assoc($lama);
$nama_pemohon  = $l['nama_pemohon'];
$nama_termohon  = $l['nama_termohon'];
$tgl  = $_POST['tgl'];
$jam  = $_POST['jam'];
$staffArray = $_POST['staff']; // Mengambil array staff yang dipilih


$status = "Mediasi";
$existing_status_json = mysqli_query($koneksi, "select statuss from sengketa where sengketa_id='$sengketa'");
$existing_status = json_decode(mysqli_fetch_assoc($existing_status_json)['statuss'], true);

// Initialize a new array to hold both the new and existing statuses
$new_status_array = array();

// Add new status to the new array

$new_status_array[] = $status;

// Add existing statuses to the new array
if (is_array($existing_status)) {
    foreach ($existing_status as $existing) {
        $new_status_array[] = $existing;
    }
}

// Encode the updated status array to JSON
$statusJson = json_encode($new_status_array);
// Mengubah array staff menjadi JSON
$staffJson = json_encode($staffArray);

// Lakukan sanitasi data untuk mencegah SQL injection
$sengketa = mysqli_real_escape_string($koneksi, $sengketa);
$nama_pemohon = mysqli_real_escape_string($koneksi, $nama_pemohon);
$nama_termohon = mysqli_real_escape_string($koneksi, $nama_termohon);
$tgl = mysqli_real_escape_string($koneksi, $tgl);
$jam = mysqli_real_escape_string($koneksi, $jam);
$staffJson = mysqli_real_escape_string($koneksi, $staffJson);


$query1 = "INSERT INTO mediasi VALUES (NULL, '$sengketa', '$nama_pemohon', '$nama_termohon', '$tgl', '$jam', '$staffJson', NULL)";
$query2 = "UPDATE sengketa SET statuss = '$statusJson' WHERE sengketa_id = '$sengketa'";

$result1 = mysqli_query($koneksi, $query1);
$result2 = mysqli_query($koneksi, $query2);

if ($result1 && $result2) {
    $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
} else {
    $_SESSION['success_message'] = "Gagal mengubah data: " . mysqli_error($koneksi);
}

// kode lama
// mysqli_query($koneksi, "insert into mediasi values (NULL,'$sengketa','$nama_pemohon','$nama_termohon','$tgl','$jam','$staffJson',NULL)")or die(mysqli_error($koneksi));
// mysqli_query($koneksi, "update sengketa set statuss='$statusJson' where sengketa_id='$sengketa'")or die(mysqli_error($koneksi));
header("location:mediasi.php");
