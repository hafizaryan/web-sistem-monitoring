<?php 
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from dokumen where dokumen_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_ktp = $l['ktp'];
$nama_file_form = $l['form'];
$nama_file_bukti = $l['bukti'];
unlink("../dokumen/".$nama_file_ktp);
unlink("../dokumen/".$nama_file_form);
unlink("../dokumen/".$nama_file_bukti);

mysqli_query($koneksi, "delete from dokumen where dokumen_id='$id'");
header("location:dokumen.php");
