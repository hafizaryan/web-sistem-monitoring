<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Mediasi</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Mediasi</span></li>
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
                    <h3 class="panel-title">Edit Mediasi</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="mediasi.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from mediasi where mediasi_id='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="mediasi_update.php">

                            <div class="form-group">
                                <label>Sengketa</label>
                                <select class="form-control" name="sengketa" required="required">
                                    <option value="<?php echo $d['id_sengketa']; ?>"><?php echo $d['nama_pemohon']; ?></option>
                                    <?php 
                                    $kategori = mysqli_query($koneksi,"SELECT * FROM sengketa where proses='Diproses'");
                                    while($k = mysqli_fetch_array($kategori)){
                                        ?>
                                        <option value="<?php echo $k['sengketa_id']; ?>"><?php echo $k['nama_pemohon']; ?></option>
                                        <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Mediasi</label>
                                <input type="hidden" name="id" value="<?php echo $d['mediasi_id']; ?>">
                                <input type="date" class="form-control" name="tgl" required="required" value="<?php echo $d['tgl_mediasi']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Jam Mediasi</label>
                                <input type="time" class="form-control" name="jam" required="required" value="<?php echo $d['jam_mediasi']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <?php 
                                $kategori = mysqli_query($koneksi, "SELECT * FROM staff");
                                while ($s = mysqli_fetch_array($kategori)) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="staff[]" value="<?php echo $s['id_staff']; ?>" id="staff<?php echo $s['id_staff']; ?>">
                                        <label class="form-check-label" for="staff<?php echo $s['id_staff']; ?>"><?php echo $s['nama_staff']; ?></label>
                                    </div>
                                    <?php 
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="submit" class="btn btn-primary" value="Simpan">
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


<?php include 'footer.php'; ?>