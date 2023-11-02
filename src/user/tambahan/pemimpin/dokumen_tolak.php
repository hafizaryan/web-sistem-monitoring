<?php 
include '../koneksi.php';
$id = $_GET['id'];
$keterangan = "Ditolak";
// hapus file lama
$lama = mysqli_query($koneksi,"select * from dokumen where dokumen_id='$id'");
$l = mysqli_fetch_assoc($lama);
mysqli_query($koneksi, "update dokumen set keterangan='$keterangan' where dokumen_id='$id'")or die(mysqli_error($koneksi));
header("location:dokumen.php?alert=sukses");
