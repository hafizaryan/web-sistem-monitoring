<?php 
include '../koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "select * from staff where id_staff='$id'");
mysqli_query($koneksi, "delete from staff where id_staff='$id'");
header("location:staff.php");
