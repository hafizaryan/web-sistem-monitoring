<?php 
include '../koneksi.php';

$id  = $_POST['id']; 
$keterangan  = $_POST['status']; 
// hapus file lama
$lama = mysqli_query($koneksi,"select * from mediasi where mediasi_id='$id'");
$l = mysqli_fetch_assoc($lama);
$sengketa = $l['id_sengketa'];
$existing_status_json = mysqli_query($koneksi, "select statuss from sengketa where sengketa_id='$sengketa'");
    $existing_status = json_decode(mysqli_fetch_assoc($existing_status_json)['statuss'], true);

    // Initialize a new array to hold both the new and existing statuses
    $new_status_array = array();

    // Add new status to the new array
    
    $new_status_array[] = $keterangan;

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
mysqli_query($koneksi, "update mediasi set keterangan_hasil='$keterangan' where mediasi_id='$id'")or die(mysqli_error($koneksi));

if($keterangan == "Selesai"){
    mysqli_query($koneksi, "update sengketa set statuss='$statusJson', proses='$keterangan' where sengketa_id='$sengketa'")or die(mysqli_error($koneksi));
}else{
    mysqli_query($koneksi, "update sengketa set statuss='$statusJson' where sengketa_id='$sengketa'")or die(mysqli_error($koneksi));
}

header("location:mediasi.php?alert=sukses");
