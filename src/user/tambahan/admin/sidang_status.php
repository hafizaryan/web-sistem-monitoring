<?php 
include '../koneksi.php';

$id  = $_POST['id']; 
$catatan  = $_POST['catatan']; 
$keterangan  = $_POST['keterangan']; 
$agenda_sidang  = $_POST['agenda_sidang']; 
$majelis_komisioner  = $_POST['majelis_komisioner']; 

// hapus file lama
$lama = mysqli_query($koneksi,"select * from sidang where sidang_id='$id'");
$l = mysqli_fetch_assoc($lama);
$sengketa = $l['sengketa'];
$sidang = "Sidang Ke-".$_POST['ke'];
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

mysqli_query($koneksi, "update sidang set catatan_hasil='$catatan', keterangan_sidang='$keterangan' where sidang_id='$id'")or die(mysqli_error($koneksi));

if($keterangan == "Selesai"){
    mysqli_query($koneksi, "update sengketa set statuss='$statusJson', proses='$keterangan' where sengketa_id='$sengketa'")or die(mysqli_error($koneksi));
}
header("location:sidang.php?alert=sukses");
