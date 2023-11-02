<?php 
include '../koneksi.php';

$sengketa  = $_POST['sengketa'];
$lama = mysqli_query($koneksi,"select * from sengketa where sengketa_id='$sengketa'");
$l = mysqli_fetch_assoc($lama);
$nama_pemohon  = $l['nama_pemohon'];
$nama_termohon  = $l['nama_termohon'];
$tgl  = $_POST['tgl'];
$ke  = $_POST['ke'];
$ruangan  = $_POST['ruangan'];
$staffArray = $_POST['staff']; // Mengambil array staff yang dipilih

$status = "Sidang Ke-" . $ke; // Ubah status menjadi "Sidang Ke-N" sesuai dengan ke
$existing_status_json = mysqli_query($koneksi, "select statuss from sengketa where sengketa_id='$sengketa'");
    $existing_status = json_decode(mysqli_fetch_assoc($existing_status_json)['statuss'], true);

    // Initialize a new array to hold both the new and existing statuses
    $new_status_array = array();

    // Add new status to the new array
    
    $new_status_array[] = $status;

    // Add existing statuses to the new array
    if (is_array($existing_status)) {
        foreach ($existing_status as $existing) {
            $new_status_array[] = $existing;
        }
    }

    // Encode the updated status array to JSON
    $statusJson = json_encode($new_status_array);
// Mengubah array staff menjadi JSON
$staffJson = json_encode($staffArray);

// Lakukan sanitasi data untuk mencegah SQL injection
$sengketa = mysqli_real_escape_string($koneksi, $sengketa);
$nama_pemohon = mysqli_real_escape_string($koneksi, $nama_pemohon);
$nama_termohon = mysqli_real_escape_string($koneksi, $nama_termohon);
$tgl = mysqli_real_escape_string($koneksi, $tgl);
$ke = mysqli_real_escape_string($koneksi, $ke);
$ruangan = mysqli_real_escape_string($koneksi, $ruangan);
$staffJson = mysqli_real_escape_string($koneksi, $staffJson);
// Query untuk menyimpan data sidang
mysqli_query($koneksi, "INSERT INTO sidang VALUES (NULL, '$sengketa', '$nama_pemohon', '$nama_termohon', '$tgl', '$ke', '$ruangan', '$staffJson', NULL, NULL,'$agenda_sidang','$majelis_komisioner')") or die(mysqli_error($koneksi));

// Update status sengketa menjadi "Sidang Ke-N"
mysqli_query($koneksi, "UPDATE sengketa SET statuss='$statusJson' WHERE sengketa_id='$sengketa'") or die(mysqli_error($koneksi));

header("location:sidang.php?alert=sukses");





