<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Data Staff</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Staff</span></li>
                            </ul>
                        </div>
                    </div><br>
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success" role="alert" id="successMessage">' . $_SESSION['success_message'] . '</div>';
                        unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
                    }
                    ?>
                    <script>
                        setTimeout(function() {
                            var successMessage = document.getElementById('successMessage');
                            if (successMessage) {
                                successMessage.style.display = 'none';
                            }
                        }, 3000); // Menghilangkan pesan setelah 3 detik (3000 ms)
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="panel panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Staff</h3>
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a href="staff_tambah.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Staff</a>
            </div>
            <br>
            <br>
            <br>
            <table id="table" class="table table-bordered table-striped table-hover table-datatable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Nomor HP </th>
                        <th class="text-center" width="10%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $staff = mysqli_query($koneksi, "SELECT * FROM staff");
                    while ($p = mysqli_fetch_array($staff)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_staff'] ?></td>
                            <td><?php echo $p['jabatan'] ?></td>
                            <td><?php echo $p['no_hp_staff'] ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="staff_edit.php?id=<?php echo $p['id_staff']; ?>" class="btn btn-default"><i class="fa fa-wrench"></i></a>
                                    <a href="staff_hapus.php?id=<?php echo $p['id_staff']; ?>" class="btn btn-default" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                                </div>
                                <?php
                                ?>
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