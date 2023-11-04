<?php 
include '../koneksi.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($koneksi,"select * from dokumen where dokumen_id='$id'");
$l = mysqli_fetch_assoc($lama);
$nama_file_ktp = $l['ktp'];
$nama_file_form = $l['form'];
$nama_file_bukti = $l['bukti'];
$nama_file_spi = $l['spi'];
$nama_file_ttpi = $l['ttpi'];
$nama_file_sjpi = $l['sjpi'];
$nama_file_ttsk = $l['ttsk'];
$nama_file_sjk = $l['sjk'];

unlink("../dokumen/".$nama_file_ktp);
unlink("../dokumen/".$nama_file_form);
unlink("../dokumen/".$nama_file_bukti);
unlink("../dokumen/".$nama_file_spi);
unlink("../dokumen/".$nama_file_ttpi);
unlink("../dokumen/".$nama_file_sjpi);
unlink("../dokumen/".$nama_file_ttsk);
unlink("../dokumen/".$nama_file_sjk);

$query = "delete from dokumen where dokumen_id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $_SESSION['success_message'] = "Sukses! Data berhasil dihapus.";
} else {
    $_SESSION['success_message'] = "Gagal menghapus data.";
}
header("location:dokumen.php");
