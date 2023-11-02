<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Petugas</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Petugas</span></li>
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
                    <h3 class="panel-title">Edit Petugas</h3>
                </div>
                <div class="panel-body">

                    <div class="pull-right">            
                        <a href="staff.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($koneksi, "select * from staff where id_staff='$id'");
                    while($d = mysqli_fetch_array($data)){
                        ?>

                        <form method="post" action="staff_update.php">

                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="hidden" name="id" value="<?php echo $d['id_staff']; ?>">
                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $d['nama_staff']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Peran Petugas</label>
                                <input type="text" class="form-control" name="jabatan" required="required" value="<?php echo $d['jabatan']; ?>">
                            </div>

                            <div class="form-group">
                                <label>Nomor HP Petugas</label>
                                <input type="text" class="form-control" name="no_hp" required="required" value="<?php echo $d['no_hp_staff']; ?>">
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
<br><br><br><br><br><br>
<div>
<?php include 'footer.php'; ?></div>

