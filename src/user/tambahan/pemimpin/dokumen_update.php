<?php 
include '../koneksi.php';
$id  = $_POST['id']; 
$nama  = $_POST['nama'];
$ket = "Diproses";
$keterangan = "Lengkap";
$status = "Berkas Lengkap";

$existing_status_json = mysqli_query($koneksi, "select statuss from sengketa where dokumen_pemohon='$id'");
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
$rand = rand();

$ktpnama = $_FILES['ktp']['name'];
$formnama = $_FILES['form']['name'];
$buktinama = $_FILES['bukti']['name'];

	$jenis = pathinfo($ktpnama, PATHINFO_EXTENSION);

	if($jenis == "php") {
		header("location:dokumen.php?alert=gagal");
	}else{

		// hapus file lama
		$lama = mysqli_query($koneksi,"select * from dokumen where dokumen_id='$id'");
		$l = mysqli_fetch_assoc($lama);
		$nama_file_ktp = $l['ktp'];
        $nama_file_form = $l['form'];
        $nama_file_bukti = $l['bukti'];
		move_uploaded_file($_FILES['ktp']['tmp_name'], '../dokumen/'.$rand.'_'.$ktpnama);
        move_uploaded_file($_FILES['form']['tmp_name'], '../dokumen/'.$rand.'_'.$formnama);
        move_uploaded_file($_FILES['bukti']['tmp_name'], '../dokumen/'.$rand.'_'.$buktinama);
		$ktp_file = $rand.'_'.$ktpnama;
        $form_file = $rand.'_'.$formnama;
        $bukti_file = $rand.'_'.$buktinama;
		

		mysqli_query($koneksi, "update dokumen set nama_pemohon='$nama', ktp='$ktp_file', form='$form_file', bukti='$bukti_file', keterangan='$keterangan' where dokumen_id='$id'")or die(mysqli_error($koneksi));
		mysqli_query($koneksi, "update sengketa set proses='$ket', statuss='$statusJson' where dokumen_pemohon='$id'")or die(mysqli_error($koneksi));
		header("location:dokumen.php?alert=sukses");
	}


