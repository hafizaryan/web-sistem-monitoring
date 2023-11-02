<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$no = $_POST['no'];
mysqli_query($koneksi, "update ruangan set nama_ruangan='$nama', no_ruangan='$no' where id_ruangan='$id'");
header("location:ruangan.php");