<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Jadwal Mediasi</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Jadwal</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">

        <div class="panel-heading">
            <h3 class="panel-title">Jadwal Mediasi</h3>
        </div>
        <div class="panel-body">

            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Pemohon</th>
                        <th>Nama Termohon</th>
                        <th>Mediasi</th>
                        <th>Nama Petugas</th>
                        <th>Keterangan Hasil Mediasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $mediasi = mysqli_query($koneksi,"SELECT * FROM mediasi,sengketa WHERE sengketa_id=id_sengketa ORDER BY mediasi_id DESC");
                    while($p = mysqli_fetch_array($mediasi)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_pemohon'] ?></td>
                            <td><?php echo $p['nama_termohon'] ?></td>
                            <td>
                                <b>Tanggal Mediasi</b> : <?php echo $p['tgl_mediasi'] ?><br>
                                <b>Jam Mediasi</b> : <?php echo $p['jam_mediasi'] ?><br>
                            </td>
                            <td>
                            <?php 
                            // Mengubah data JSON ke dalam bentuk array
                            $staffArray = json_decode($p['anggota_staff'], true);

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
                            <td><?php echo $p['keterangan_hasil'] ?></td>
                            
                        </tr>
                        <?php 
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>
</div>


<?php include 'footer.php'; ?>