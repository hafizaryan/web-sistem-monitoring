<?php 
include '../koneksi.php';

session_start();

$sengketa  = $_POST['sengketa'];
$lama = mysqli_query($koneksi,"select * from sengketa where sengketa_id='$sengketa'");
$l = mysqli_fetch_assoc($lama);
$nama_pemohon  = $l['nama_pemohon'];
$nama_termohon  = $l['nama_termohon'];
$tgl  = $_POST['tgl'];
$ke  = $_POST['ke'];

$staffArray = $_POST['staff']; 

$status = "Sidang Ke-" . $ke; 
$existing_status_json = mysqli_query($koneksi, "select statuss from sengketa where sengketa_id='$sengketa'");
    $existing_status = json_decode(mysqli_fetch_assoc($existing_status_json)['statuss'], true);

    
    $new_status_array = array();

    
    
    $new_status_array[] = $status;

    
    if (is_array($existing_status)) {
        foreach ($existing_status as $existing) {
            $new_status_array[] = $existing;
        }
    }

    
    $statusJson = json_encode($new_status_array);

$staffJson = json_encode($staffArray);
$agenda_sidang = $_POST['agenda_sidang'];
$majelis_komisioner= $_POST['majelis_komisioner'];


$sengketa = mysqli_real_escape_string($koneksi, $sengketa);
$nama_pemohon = mysqli_real_escape_string($koneksi, $nama_pemohon);
$nama_termohon = mysqli_real_escape_string($koneksi, $nama_termohon);
$tgl = mysqli_real_escape_string($koneksi, $tgl);
$ke = mysqli_real_escape_string($koneksi, $ke);
$staffJson = mysqli_real_escape_string($koneksi, $staffJson);
$agenda_sidang = mysqli_real_escape_string($koneksi, $agenda_sidang);
$majelis_komisioner = mysqli_real_escape_string($koneksi, $majelis_komisioner);

$query1 = "INSERT INTO sidang VALUES (NULL, '$sengketa', '$nama_pemohon', '$nama_termohon', '$tgl', '$ke', '$staffJson', NULL,NULL,'$agenda_sidang','$majelis_komisioner')" or die(mysqli_error($koneksi));
$query2 = "UPDATE sengketa SET statuss='$statusJson' WHERE sengketa_id='$sengketa'" or die(mysqli_error($koneksi));

$result1 = mysqli_query($koneksi, $query1);
$result2 = mysqli_query($koneksi, $query2);

if ($result1 && $result2) {
    $_SESSION['success_message'] = "Sukses! Data berhasil diubah.";
} else {
    $_SESSION['success_message'] = "Gagal mengubah data: " . mysqli_error($koneksi);
}

// kode sebelum diberikan alert
// mysqli_query($koneksi, "INSERT INTO sidang VALUES (NULL, '$sengketa', '$nama_pemohon', '$nama_termohon', '$tgl', '$ke', '$staffJson', NULL,NULL,'$agenda_sidang','$majelis_komisioner')") or die(mysqli_error($koneksi));
// mysqli_query($koneksi, "UPDATE sengketa SET statuss='$statusJson' WHERE sengketa_id='$sengketa'") or die(mysqli_error($koneksi));

header("location:sidang.php?alert=sukses");





