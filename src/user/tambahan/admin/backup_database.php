<?php

/**
 * Backup the database and download the backup file.
 *
 * @return void
 */
function backupDatabase($host, $username, $password, $database, $backupFileName)
{
    // Koneksi ke database
    $link = mysqli_connect($host, $username, $password, $database);

    // Mendapatkan daftar tabel dari database
    $result = mysqli_query($link, 'SHOW TABLES');
    $tables = array();
    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }

    // Membuka file untuk menyimpan backup
    $handle = fopen($backupFileName, 'w');

    // Looping untuk setiap tabel
    foreach ($tables as $table) {
        $result = mysqli_query($link, "SELECT * FROM $table");

        // Tulis perintah DROP TABLE jika diperlukan
        fwrite($handle, "DROP TABLE IF EXISTS $table;\n");

        // Mendapatkan definisi tabel
        $row2 = mysqli_fetch_row(mysqli_query($link, "SHOW CREATE TABLE $table"));
        fwrite($handle, $row2[1] . ";\n");

        // Looping untuk mengambil data dari tabel
        while ($row = mysqli_fetch_assoc($result)) {
            $values = array_map('addslashes', $row);
            $values = array_map('trim', $values);
            $values = array_values($values);
            $values = '"' . implode('", "', $values) . '"';
            fwrite($handle, "INSERT INTO $table VALUES ($values);\n");
        }
    }

    // Tutup file backup
    fclose($handle);

    // Set header untuk mengunduh file SQL
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($backupFileName) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backupFileName));

    // Mengirimkan file ke pengguna
    readfile($backupFileName);

    // Hapus file backup setelah diunduh (opsional)
    unlink($backupFileName);
}

if (isset($_GET['backup'])) {
    // Ganti dengan informasi koneksi database Anda
    $host = 'localhost';
    $username = 'root'; // Ganti dengan username MySQL Anda
    $password = ''; // Ganti dengan password MySQL Anda
    $database = 'db_monitoring';

    // Nama file backup
    $backupFileName = 'dbmonitoring_' . date('Y-m-d') . '.sql';

    backupDatabase($host, $username, $password, $database, $backupFileName);
    exit;
}

include 'header.php'; // Sertakan header.php setelah backupDatabase() function
?>

<br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Lakukan backup database secara berkala untuk membuat cadangan database yang bisa direstore kapan saja ketika dibutuhkan. Silakan klik tombol "Backup" untuk memulai proses backup data. Setelah proses backup selesai, silakan download file backup database tersebut dan simpan di lokasi yang aman.<span style="color: red;">*</span>
                    </h3>
                    <br>
                    <h3 class="panel-title"><span style="color: red;">*</span> Tidak disarankan menyimpan file backup database dalam my documents / Local Disk C.</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <a href="?backup=1" class="btn btn-primary"><i class="fas fa-file-download"></i> Backup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Pemulihan Database</h3>
                </div>
                <div class="panel-body">
                    <form action="restore.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="restoreFile">Pilih File Backup Database:</label>
                            <input type="file" name="restoreFile" id="restoreFile" accept=".sql">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="restore">Pemulihan Database</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>