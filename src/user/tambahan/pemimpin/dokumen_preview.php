<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Preview Dokumen</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Preview</span></li>
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
                    <h3 class="panel-title">Preview Dokumen</h3>
                </div>
                <div class="panel-body">

                    <a href="dokumen.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];  
                    $data = mysqli_query($koneksi,"SELECT * FROM sengketa,dokumen WHERE dokumen_pemohon=dokumen_id and dokumen_id='$id'");
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
                                        <td><?php echo $d['nik_pemohon'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File KTP/SIM</th>
                                        <td><?php echo $d['ktp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File Form Permohonan</th>
                                        <td><?php echo $d['form']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama File Bukti Keberatan</th>
                                        <td><?php echo $d['bukti']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?php echo $d['keterangan']; ?></td>
                                    </tr>
                                </table>

                            </div>

                            <div class="col-lg-8">

                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../dokumen/<?php echo $d['ktp']; ?>"></a>
                                    </div>
                                    </br>
                                    </br>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../dokumen/<?php echo $d['form']; ?>"></a>
                                    </div>
                                    </br>
                                    </br>
                                    <div class="pdf-singe-pro">
                                        <a class="media" href="../dokumen/<?php echo $d['bukti']; ?>"></a>
                                    </div>

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



<?php include 'footer.php'; ?>