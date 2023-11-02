<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from mediasi where mediasi_id='$id'");
mysqli_query($koneksi, "delete from mediasi where mediasi_id='$id'");
header("location:mediasi.php");
