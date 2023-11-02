<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Laporan</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Laporan</span></li>
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
            <h3 class="panel-title">Laporan</h3>
        </div>
        <div class="panel-body">

            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Sengketa</th>
                        <th>Alasan Permohonan</th>
                        <th>Tahapan Selesai</th>
                        <th class="text-center" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $laporan = mysqli_query($koneksi,"SELECT * FROM sengketa WHERE proses='Selesai' ORDER BY sengketa_id DESC");
                    while($p = mysqli_fetch_array($laporan)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <b>Nama Pemohon</b> : <?php echo $p['nama_pemohon'] ?><br>
                                <b>NIK Pemohon</b> : <?php echo $p['nik_pemohon'] ?><br>
                                <b>Nama Termohon</b> : <?php echo $p['nama_termohon'] ?><br>
                            </td>
                            <td><?php echo $p['alasan_permohonan'] ?></td>
                            <td><?php echo $p['proses'] ?></td>
                            <td>
                                
                                <!--   Tombol untuk mencetak laporan -->
                                <button onclick="cetakLaporan(<?php echo $p['sengketa_id']; ?>)" class="btn btn-primary"><i class="fa fa-download"></i> Cetak Laporan</button>


                                <!-- Script untuk mengarahkan ke halaman pencetakan -->
                                <script>
                                    function cetakLaporan(id) {
                                        // Arahkan ke halaman laporan dengan parameter id_sengketa
                                        window.location.href = "laporan_cetak.php?id=" + id;
                                    }
                                </script>
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


<?php include 'footer.php'; ?>