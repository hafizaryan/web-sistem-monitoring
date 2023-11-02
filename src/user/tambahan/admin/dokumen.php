<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Dokumen</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Dokumen</span></li>
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
            <h3 class="panel-title">Data Dokumen</h3>
        </div>
        <br>
        <div class="pull-right">
                <a href="dokumen_cetak.php" class="btn btn-primary"><i class="fa fa-download"></i> Cetak Kelengkapan Dokumen</a>
            </div>
        <div class="panel-body">

            <br>
            <br>
            <br>

            <center>
                <?php 
                if(isset($_GET['alert'])){
                    if($_GET['alert'] == "gagal"){
                        ?>
                        <div class="alert alert-danger">File dokumen gagal diupload. krena demi keamanan file .php tidak diperbolehkan.</div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-success">dokumen berhasil tersimpan.</div>
                        <?php
                    }
                }
                ?>
            </center>
            

            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Pemohon</th>
                        <th>Kelengkapan Dokumen</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th class="text-center" width="20%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no = 1;
                    $dokumen = mysqli_query($koneksi,"SELECT * FROM sengketa,dokumen WHERE dokumen_pemohon=dokumen_id ORDER BY sengketa_id DESC");
                    while($p = mysqli_fetch_array($dokumen)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_pemohon'] ?></td>
                            <td>

                                <b>FotoCopy Identitas Diri </b> : <?php echo $p['ktp'] ?><br>
                                <b>Permohonan Penyelesaian Sengketa Informasi</b> : <?php echo $p['form'] ?><br>
                                <b>Surat Keberatan</b> : <?php echo $p['bukti'] ?><br>
                                <b>Surat Permohonan Informasi </b> : <?php echo $p['spi'] ?><br>
                                <b>Tanda Terima Permohonan Informasi</b> : <?php echo $p['ttpi'] ?><br>
                                <b>Surat Jawaban Permohonan Informasi</b> : <?php echo $p['sjpi'] ?><br>
                                <b>Tanda Terima Surat Keberatan </b> : <?php echo $p['ttsk'] ?><br>
                                <b>Surat Jawaban Keberatan</b> : <?php echo $p['sjk'] ?><br>

                            </td>
                            <td><?php
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
                    ?>
                        </td>
                            <td class="text-center">



                                <div class="modal fade" id="exampleModal_<?php echo $p['dokumen_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PERINGATAN!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data ini? <br>file dan semua yang berhubungan akan dihapus secara permanen.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                                <a href="dokumen_hapus.php?id=<?php echo $p['dokumen_id']; ?>" class="btn btn-primary"><i class="fa fa-check"></i> &nbsp; Ya, hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="btn-group">
                                <?php
                    if (!$isComplete) {
                        echo '<a href="dokumen_tambah.php?id=' . $p['dokumen_id'] . '" class="btn btn-primary"><i class="fa fa-cloud"></i> Upload Dokumen</a>';
                    } else {
                        echo '<a target="_blank" href="dokumen_preview.php?id=' . $p['dokumen_id'] . '" class="btn btn-default"><i class="fa fa-search"></i> Preview</a>';
                    }
                    ?>
                                    
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

<div>
<?php include 'footer.php'; ?></div>

