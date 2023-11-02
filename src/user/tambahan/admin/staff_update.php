<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jabatan = $_POST['jabatan'];
mysqli_query($koneksi, "update staff set nama_staff='$nama', jabatan='$jabatan', no_hp_staff='$no_hp' where id_staff='$id'");
header("location:staff.php");