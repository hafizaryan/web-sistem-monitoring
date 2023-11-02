<?php
include '../koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Lakukan query untuk mengambil data yang sesuai dari tabel
    $query = mysqli_query($koneksi, "SELECT * FROM sengketa WHERE sengketa_id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if ($data['statuss'] == 'Mediasi') {
        // Lakukan query untuk mengambil data mediasi berdasarkan $id
        $queryMediasi = mysqli_query($koneksi, "SELECT * FROM sengketa, mediasi WHERE sengketa_id = '$id' AND id_sengketa = sengketa_id ");
        $dataMediasi = mysqli_fetch_assoc($queryMediasi);

        // Gunakan $dataMediasi sesuai kebutuhan
    } else{
        // Lakukan query untuk mengambil data sidang berdasarkan $id
        $querySidang = mysqli_query($koneksi, "SELECT * FROM sengketa, sidang WHERE sengketa_id = '$id' AND sengketa = sengketa_id ");
        $queryMediasi = mysqli_query($koneksi, "SELECT * FROM sengketa, mediasi WHERE sengketa_id = '$id' AND id_sengketa = sengketa_id ");
        $dataMediasi = mysqli_fetch_assoc($queryMediasi);

        // Gunakan $dataSidang sesuai kebutuhan
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .centered-cell {
            text-align: center;
        }
        .header{
            margin-top:90px;
        }
        .header h1{
            margin-top: -50px;
            text-align: center;
            margin-bottom: 5px;
        }
        .header p{
            text-align: center;
            margin-bottom: 30px;
        }
        .header img{
            float: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="../assets/img/logo/logo_ki2.png" width="120" alt="" />
        <h1>Komisi Informasi Provinsi Riau</h1>
        <p>Jalan Gajah Mada Nomor 200, Gedung Samsat Lantai 3,<br> Kelurahan Simpang Empat, Kecamatan Pekanbaru Kota, Pekanbaru</p>
    </div>
   
    <table>
        <tr>
            <th class="centered-cell" colspan="2">Informasi Pemohon</th>
        </tr>
        <tr>
            <th>Tanggal Permohonan</th>
            <td><?php echo $data['tanggal_permohonan']; ?></td>
        </tr>
        <tr>
            <th>NIK Pemohon</th>
            <td><?php echo $data['nik_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Nama Pemohon</th>
            <td><?php echo $data['nama_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Alamat Pemohon</th>
            <td><?php echo $data['alamat_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Tempat/Tanggal Lahir Pemohon</th>
            <td><?php echo $data['tempat_lahir_pemohon'].', '.$data['ttl_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Email Pemohon</th>
            <td><?php echo $data['email_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Nomor HP Pemohon</th>
            <td><?php echo $data['no_hp_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Kewarganegaraan Pemohon</th>
            <td><?php echo $data['kewarganegaraan_pemohon']; ?></td>
        </tr>
        <tr>
            <th>Pekerjaan Pemohon</th>
            <td><?php echo $data['pekerjaan_pemohon']; ?></td>
        </tr>

        <!-- Tambahkan informasi lainnya -->

        <tr>
            <th class="centered-cell" colspan="2">Informasi Termohon</th>
        </tr>
        <tr>
            <th>Nama Termohon</th>
            <td><?php echo $data['nama_termohon']; ?></td>
        </tr>
        <tr>
            <th>Alamat Termohon</th>
            <td><?php echo $data['alamat_termohon']; ?></td>
        </tr>
        <tr>
            <th>Informasi Yang Dimohon</th>
            <td><?php echo $data['informasi_yang_dimohon']; ?></td>
        </tr>
        <tr>
            <th>Alasan Permohonan</th>
            <td><?php echo $data['alasan_permohonan']; ?></td>
        </tr>
        <tr>
            <th>Tahapan Selesai</th>
            <td><?php echo $data['proses']; ?></td>
        </tr>
        <!-- Tambahkan informasi lainnya -->
        <tr>
            <th class="centered-cell" colspan="2">  Penyelesaian Sengketa</th>
        </tr>
        <tr>
            <th>Tanggal Mediasi</th>
            <td><?php echo $dataMediasi['tgl_mediasi'].','.$dataMediasi['jam_mediasi']; ?></td>
        </tr>
        
        <tr>
            <th>Nama Petugas Mediasi</th>
            <td>
            <?php 
                                            // Mengubah data JSON ke dalam bentuk array
            $staffArray = json_decode($dataMediasi['anggota_staff'], true);
                                            // Mendapatkan nama staff dari tabel staff berdasarkan id_staff yang ada dalam data JSON
            $staffNames = array();
            $i = 0;
            $totalStaff = count($staffArray);
            while ($i < $totalStaff) {
                $staffId = $staffArray[$i];
                $query = mysqli_query($koneksi, "SELECT nama_staff FROM staff WHERE id_staff = '$staffId'");
                $staff = mysqli_fetch_assoc($query);
                $staffNames[] = $staff['nama_staff'];
                $i++;
                }
                // Menampilkan nama-nama staff yang terlibat dalam mediasi
                echo implode(", ", $staffNames);
                ?>
            </td>
        </tr>
        <?php
        if ($data['statuss'] !== "Mediasi") {
        while($p = mysqli_fetch_array($querySidang)){
                        ?>
            <tr>
                <th>Tanggal Sidang</th>
                <td><?php echo $p['tgl_sidang']; ?></td>
            </tr>
            <tr>
                <th>Sidang ke</th>
                <td><?php echo $p['sidang_ke']; ?></td>
            </tr>
            <tr>
                <th>Agenda Sidag</th>
                <td><?php echo $p['agenda_sidang']; ?></td>
            </tr>
            <tr>
                <th>Nama Petugas Sidang</th>
                <td>
                    <?php 
                                                    // Mengubah data JSON ke dalam bentuk array
                    $staffArray = json_decode($p['staff_sidang'], true);
                                                    // Mendapatkan nama staff dari tabel staff berdasarkan id_staff yang ada dalam data JSON
                    $staffNames = array();
                    $i = 0;
                    $totalStaff = count($staffArray);
                    while ($i < $totalStaff) {
                        $staffId = $staffArray[$i];
                        $query = mysqli_query($koneksi, "SELECT nama_staff FROM staff WHERE id_staff = '$staffId'");
                        $staff = mysqli_fetch_assoc($query);
                        $staffNames[] = $staff['nama_staff'];
                        $i++;
                        }
                        // Menampilkan nama-nama staff yang terlibat dalam mediasi
                        echo implode(", ", $staffNames);
                    ?>
                </td>
            </tr>
            <tr>
                <th>Catatan Hasil Sidang</th>
                <td><?php echo $p['catatan_hasil']; ?></td>
            </tr>
           
        <?php
        }
        } else {
            // Menampilkan pesan jika status "Selesai"
            ?>
            <tr>
                <th>Tahapan Selesai</th>
                <td><?php echo $data['statuss']; ?></td>
            </tr>
            <?php
        }
        ?>
        

    </table>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
    