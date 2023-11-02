<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Tambah Permohonan</h4>
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


    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Permohonan</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="permohonan.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="permohonan_aksi.php">

                        <div class="form-group">
                            <label>NIK Pemohon</label>
                            <input type="text" class="form-control" name="nik" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Pemohon</label>
                            <input type="text" class="form-control" name="nama_pemohon" required="required">
                        </div>

                        <div class="form-group">
                            <label>Alamat Pemohon</label>
                            <input type="text" class="form-control" name="alamat_pemohon" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir Pemohon</label>
                            <input type="text" class="form-control" name="ttl_pemohon" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="ttl" required="required">
                        </div>

                        <div class="form-group">
                            <label>Email Pemohon</label>
                            <input type="text" class="form-control" name="email" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nomor HP Pemohon</label>
                            <input type="text" class="form-control" name="no_hp" required="required">
                        </div>

                        <div class="form-group">
                            <label>Kewarganegaraan</label>
                            <input type="text" class="form-control" name="negara" required="required">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan Pemohon</label>
                            <input type="text" class="form-control" name="kerja" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Termohon</label>
                            <input type="text" class="form-control" name="nama_termohon" required="required">
                        </div>

                        <div class="form-group">
                            <label>Alamat Termohon</label>
                            <input type="text" class="form-control" name="alamat_termohon" required="required">
                        </div>

                        <div class="form-group">
                            <label>Informasi Yang Dimohon</label>
                            <textarea class="form-control" name="informasi" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Alasan Permohonan</label>
                            <textarea class="form-control" name="alasan" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>