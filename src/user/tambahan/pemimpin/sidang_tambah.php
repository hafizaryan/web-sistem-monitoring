<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Upload Jadwal Sidang</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Jadwal Sidang</span></li>
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
                    <h3 class="panel-title">Upload Jadwal Sidang</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="sidang.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <form method="post" action="sidang_aksi.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Sengketa</label>
                            <select class="form-control" name="sengketa" required="required">
                                <option value="">Pilih pemohon</option>
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
                            <label>Tanggal Sidang</label>
                            <input type="date" class="form-control" name="tgl" required="required">
                        </div>

                        <div class="form-group">
                            <label>Sidang Ke-</label>
                            <input type="number" class="form-control" name="ke" required="required">
                        </div>

                        <div class="form-group">
                            <label>Nama Staff</label>
                            <?php 
                            $kategori = mysqli_query($koneksi, "SELECT * FROM staff");
                            while ($k = mysqli_fetch_array($kategori)) {
                                ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="staff[]" value="<?php echo $k['id_staff']; ?>" id="staff<?php echo $k['id_staff']; ?>">
                                    <label class="form-check-label" for="staff<?php echo $k['id_staff']; ?>"><?php echo $k['nama_staff']; ?></label>
                                </div>
                                <?php 
                            }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Upload">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</div>


<?php include 'footer.php'; ?>