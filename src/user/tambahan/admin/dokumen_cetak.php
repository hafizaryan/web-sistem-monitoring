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
        .table-container {
            margin-bottom: 40px;}
    </style>
</head>
<body>

    
    <div class="header">
        <img src="../assets/img/logo/logo_ki2.png" width="120" alt="" />
        <h1>Komisi Informasi Provinsi Riau</h1>
        <p>Jalan Gajah Mada Nomor 200, Gedung Samsat Lantai 3,<br> Kelurahan Simpang Empat, Kecamatan Pekanbaru Kota, Pekanbaru</p>
    </div>
    <h3>Data Kelengkapan Dokumen</h3>
    <div class="table-container">
    <table>
    
                    <tr>
                        <th>Waktu Permohonan</th>
                        <th>Nama Pemohon</th>
                        <th>Status</th>
                        <th>Kelengkapan Dokumen</th>
                    </tr>

                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $dokumen = mysqli_query($koneksi,"SELECT * FROM sengketa,dokumen WHERE dokumen_pemohon=dokumen_id ORDER BY sengketa_id DESC");
                    while($p = mysqli_fetch_array($dokumen)){
                        ?>
                     <tr> 
                     <td><?php echo date('H:i:s  d-m-Y',strtotime($p['tanggal_permohonan'])) ?></td>
                    <td><?php echo $p['nama_pemohon'] ?></td>
                        <td> <?php
                            $requiredDocuments = array(
                                'ktp', 'form', 'bukti', 'spi', 'ttpi', 'sjpi', 'ttsk', 'sjk'
                            ); 

                            $isComplete = true;
                            foreach ($requiredDocuments as $documentField) {
                                if (empty($p[$documentField])) {
                                    $isComplete = false;
                                    break; // Keluar dari perulangan jika ada dokumen yang belum lengkap
                                }
                            }
                            
                            if ($isComplete) {
                                echo 'Lengkap';
                            } else {
                                echo 'Belum Lengkap';
                            }
                            
                            ?></td>

                            <td><?php
                    $requiredDocuments = array(
                        'ktp', 'form', 'bukti', 'spi', 'ttpi', 'sjpi', 'ttsk', 'sjk'
                    );
                    
                    $isComplete = true;
                    foreach ($requiredDocuments as $documentField) {
                        if (empty($p[$documentField])) {
                            $isComplete = false;
                            echo '<span style="color: red;">' . $documentField . ': Belum Diunggah</span><br>';
                        } else {
                            echo $documentField . ': ' . $p[$documentField] . '<br>';
                        }
                    }
                }
                    ?>
                    
    </td></tr></table></div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>