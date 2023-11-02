<?php 
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');


$waktu = date('Y-m-d H:i:s'); 
$alasan  = $_POST['alasan'];
$informasi  = $_POST['informasi'];
$alamat_termohon  = $_POST['alamat_termohon'];
$nama_termohon  = $_POST['nama_termohon'];
$kerja  = $_POST['kerja'];
$negara  = $_POST['negara'];
$no_hp  = $_POST['no_hp'];
$email  = $_POST['email'];
$ttl  = $_POST['ttl'];
$ttl_pemohon  = $_POST['ttl_pemohon'];
$alamat_pemohon  = $_POST['alamat_pemohon'];
$nama_pemohon  = $_POST['nama_pemohon'];
$nik  = $_POST['nik'];
$proses = "Masuk";
$sql = "SELECT dokumen_id FROM dokumen ORDER BY dokumen_id DESC LIMIT 1";
// Menjalankan perintah SQL
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
$dokumen = $row['dokumen_id']+1;
$ket = "Belum Lengkap";
$status = "Permohonan";
$status_array = array(
	$status
);
$statusJson = json_encode($status_array);

mysqli_query($koneksi, "insert into sengketa values (NULL,'$waktu','$nik','$nama_pemohon','$alamat_pemohon','$ttl_pemohon','$ttl','$email','$no_hp','$negara','$kerja','$nama_termohon','$alamat_termohon','$informasi','$alasan','$proses','$dokumen','$statusJson')");
mysqli_query($koneksi, "insert into dokumen values (NULL,'$nama_pemohon',NULL,NULL,NULL,'$ket')");
header("location:permohonan.php");
?>