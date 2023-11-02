<?php include 'header.php' ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Permohonan Sengketa</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Permohonan</span></li>
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
            <h3 class="panel-title">Semua Permohonan</h3>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="permohonan_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Permohonan</a>
            </div>

                <br>
                <br>
                <br>

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Waktu Permohonan</th>
                        <th>Pemohon</th>
                        <th>Termohon</th>
                        <th>Informasi Yang Dimohon</th>
                        <th>Alasan Permohonan</th>
                        <th>Proses</th>
                        <th>No Registrasi</th>

                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $permohonan = mysqli_query($koneksi,"SELECT * FROM sengketa ORDER BY sengketa_id DESC");
                    while($p = mysqli_fetch_array($permohonan)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo date('H:i:s  d-m-Y',strtotime($p['tanggal_permohonan'])) ?></td>
                            <td>
                                <b>NIK</b> : <?php echo $p['nik_pemohon'] ?><br>
                                <b>Nama</b> : <?php echo $p['nama_pemohon'] ?><br>
                                <b>Alamat</b> : <?php echo $p['alamat_pemohon'] ?><br>
                                <b>TTL</b> : <?php echo $p['tempat_lahir_pemohon']?>, <?php echo date('d-m-Y',strtotime($p['ttl_pemohon'])) ?><br>
                                <b>Email</b> : <?php echo $p['email_pemohon'] ?><br>
                                <b>No_HP</b> : <?php echo $p['no_hp_pemohon'] ?><br>
                                <b>Kewarganegaraan</b> : <?php echo $p['kewarganegaraan_pemohon'] ?><br>
                                <b>Pekerjaan</b> : <?php echo $p['pekerjaan_pemohon'] ?><br>

                            </td>
                            <td>
                                <b>Nama</b> : <?php echo $p['nama_termohon'] ?><br>
                                <b>Alamat</b> : <?php echo $p['alamat_termohon'] ?><br>
                            </td>
                            <td><?php echo $p['informasi_yang_dimohon'] ?></td>
                            <td><?php echo $p['alasan_permohonan'] ?></td>
                            <td><?php echo $p['proses'] ?></td>
                            <td><?php echo $p['no_registrasi'] ?></td>
                            <td class="text-center">

                            <script>
                            function confirmDelete() {
                                return confirm("Apakah Anda yakin ingin menghapus data ini?");
                            }
                            </script>
                            <!-- Misalkan Anda memiliki data $p yang berisi informasi sengketa, termasuk 'sengketa_id' -->
                            <div class="btn-group">
                                <!-- Tambahkan atribut data-sengketa-id untuk menyimpan 'sengketa_id' data yang akan dihapus -->
                                <form action="permohonan_hapus.php" method="post">
                                    <input type="hidden" name="sengketa_id" value="<?php echo $p['sengketa_id']; ?>">
                                    <button type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete();">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
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
<br>
<div>
<?php include 'footer.php'; ?></div>

