<?php 
session_start(); // Don't forget to start the session

include '../koneksi.php';
$id  = $_POST['id'];
$sengketa  = $_POST['sengketa'];
$lama = mysqli_query($koneksi,"select * from sengketa where sengketa_id='$sengketa'");
$l = mysqli_fetch_assoc($lama);
$nama_pemohon  = $l['nama_pemohon'];
$nama_termohon  = $l['nama_termohon'];
$tgl  = $_POST['tgl'];
$ke  = $_POST['ke'];
$staffArray = $_POST['staff'];
$status = "Sidang Ke-" . $ke;
$agenda_sidang = $_POST ['agenda_sidang'];
$majelis_komisioner = $_POST ['majelis_komisioner'];
$staffJson = json_encode($staffArray);

// Lakukan sanitasi data untuk mencegah SQL injection
$sengketa = mysqli_real_escape_string($koneksi, $sengketa);
$nama_pemohon = mysqli_real_escape_string($koneksi, $nama_pemohon);
$nama_termohon = mysqli_real_escape_string($koneksi, $nama_termohon);
$tgl = mysqli_real_escape_string($koneksi, $tgl);
$ke = mysqli_real_escape_string($koneksi, $ke);
$staffJson = mysqli_real_escape_string($koneksi, $staffJson);
$agenda_sidang = mysqli_real_escape_string($koneksi, $agenda_sidang);
$majelis_komisioner = mysqli_real_escape_string($koneksi, $majelis_komisioner);


$query = "update sidang set sengketa='$sengketa',nama_pemohon_sidang='$nama_pemohon',nama_termohon_sidang='$nama_termohon',tgl_sidang='$tgl',staff_sidang='$staffJson', agenda_sidang ='$agenda_sidang', majelis_komisioner='$majelis_komisioner' where sidang_id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
} else {
    $_SESSION['success_message'] = "Gagal mengubah data.";
}

// mysqli_query($koneksi, "update sidang set sengketa='$sengketa',nama_pemohon_sidang='$nama_pemohon',nama_termohon_sidang='$nama_termohon',tgl_sidang='$tgl',staff_sidang='$staffJson', agenda_sidang ='$agenda_sidang', majelis_komisioner='$majelis_komisioner' where sidang_id='$id'");
header("location:sidang.php");