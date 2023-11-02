<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jabatan = $_POST['jabatan'];

mysqli_query($koneksi, "insert into staff values (NULL,'$nama','$jabatan','$no_hp')");
header("location:staff.php");