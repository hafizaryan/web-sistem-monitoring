<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tinjau Sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Tinjau</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Tinjau Sidang</h3>
                </div>
                <div class="panel-body">

                    <a href="sidang.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM sidang,sengketa WHERE sengketa_id=sengketa and sidang_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <div class="row">
                            <div class="col-lg-4">

                                <table class="table">
                                    <tr>
                                        <th>Nama Pemohon</th>
                                        <td><?php echo $d['nama_pemohon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIK Pemohon</th>
                                        <td><?php echo $d['nama_termohon'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Sidang</th>
                                        <td><?php echo $d['tgl_sidang']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Nama Petugas</th>
                                        <td>
                                            <?php 
                                            // Mengubah data JSON ke dalam bentuk array
                                            $staffArray = json_decode($d['staff_sidang'], true);

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
                                        <th>Agenda Sidang</th>
                                        <td><?php echo $d['agenda_sidang']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Majelis Komisioner</th>
                                        <td><?php echo $d['majelis_komisioner']; ?></td>
                                    </tr>
                                    
                                </table>

                            </div>

                            <div class="col-lg-8">
                                <form method="post" action="sidang_status.php">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $d['sidang_id']; ?>">
                                    <input type="hidden" name="ke" value="<?php echo $d['sidang_ke']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Catatan Hasil Sidang</label>
                                    <textarea class="form-control" name="catatan" required="required"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sidang Selesai</label>
                                    <input type="checkbox" name="keterangan" value="Selesai">
                                </div>
                                <div class="form-group">
                                    <label>Lanjut Sidang Selanjutnya</label>
                                    <input type="checkbox" name="keterangan" value="Lanjut Sidang">
                                </div>
                                <div class="form-group">
                                    <label></label>
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                                </form>

                            </div>
                        </div>

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>



