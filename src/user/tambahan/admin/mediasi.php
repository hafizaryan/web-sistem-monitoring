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
                    </div><br>
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success" role="alert" id="successMessage">' . $_SESSION['success_message'] . '</div>';
                        unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
                    }
                    ?>
                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('successMessage');
                            if (successMessage) {
                                successMessage.style.display = 'none';
                            }
                        }, 3000); // Menghilangkan pesan setelah 3 detik (3000 ms)
                    </script>
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
            <div class="pull-right">
                <a href="mediasi_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Jadwal</a>
            </div>
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
                        <th class="text-center" width="10%">Action</th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $mediasi = mysqli_query($koneksi, "SELECT * FROM mediasi,sengketa WHERE sengketa_id=id_sengketa ORDER BY mediasi_id DESC");
                    while ($p = mysqli_fetch_array($mediasi)) {
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

                                if ($staffArray !== null) {
                                    // Decoding was successful
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
                                }
                                ?>

                            </td>
                            <td><?php echo $p['keterangan_hasil'] ?></td>
                            <td class="text-center">

                                <!-- Selesai button with a value -->
                                <form action="mediasi_status.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $p['mediasi_id']; ?>">
                                    <button type="submit" class="btn btn-success" name="status" value="Selesai">Selesai</button>
                                    <button type="submit" class="btn btn-primary" name="status" value="Lanjut Ajudikasi">Lanjut Ajudikasi</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="mediasi_edit.php?id=<?php echo $p['mediasi_id']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                   <a href="mediasi_hapus.php?id=<?php echo $p['mediasi_id']; ?>" class="btn btn-default" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                                </div>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>
<div>
    <?php include 'footer.php'; ?></div>