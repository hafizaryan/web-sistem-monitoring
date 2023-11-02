<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Upload Dokumen</h4>
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


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Upload Dokumen</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="dokumen.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>


                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from dokumen where dokumen_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="dokumen_update.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Nama Pemohon</label>
                                <input type="hidden" name="id" value="<?php echo $d['dokumen_id']; ?>">
                                <input type="hidden" class="form-control" name="nama" value="<?php echo $d['nama_pemohon']; ?>">
                            </div>

                            <div class="form-group">
                                <label>FotoCopy Identitas Diri </label>
                                <input type="file" name="ktp" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Permohonan Penyelesaian Sengketa Informasi</label>
                                <input type="file" name="form" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Surat Keberatan</label>
                                <input type="file" name="bukti" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Surat Permohonan Informasi</label>
                                <input type="file" name="spi" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Tanda Terima Permohonan Informasi</label>
                                <input type="file" name="ttpi" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Surat Jawaban Permohonan Informasi</label>
                                <input type="file" name="sjpi" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Tanda Terima Surat Keberatan</label>
                                <input type="file" name="ttsk" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label>Surat  Jawaban Keberatan</label>
                                <input type="file" name="sjk" required="required">
                                <small>*Upload dokumen dengan format PDF</small>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Upload">
                            </div>

                        </form>

                        <?php 
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</div>
</br>
</br>                
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>



<?php include 'footer.php'; ?>