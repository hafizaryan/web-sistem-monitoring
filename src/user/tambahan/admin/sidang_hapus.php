<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from sidang where sidang_id='$id'");
mysqli_query($koneksi, "delete from sidang where sidang_id='$id'");
header("location:sidang.php");
