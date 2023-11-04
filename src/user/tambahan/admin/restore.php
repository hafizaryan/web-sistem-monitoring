<?php

// Start a session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function restore($host, $user, $pass, $dbname, $file) {
    global $rest_dir; // Ensure $rest_dir is defined globally

    // Create a database connection
    $koneksi = mysqli_connect($host, $user, $pass, $dbname);

    $nama_file = $file['name'];
    $ukrn_file = $file['size'];
    $tmp_file = $file['tmp_name'];

    if ($nama_file == "" || empty($_REQUEST['password'])) {
        $_SESSION['errEmpty'] = 'ERROR! Semua Form wajib diisi';
        header("Location: ./admin.php?page=sett&sub=rest");
        die();
    } else {
        $password = $_REQUEST['password'];
        $id_user = $_SESSION['id_user'];

        $query = mysqli_query($koneksi, "SELECT password FROM tbl_user WHERE id_user='$id_user' AND password=MD5('$password')");
        
        if (mysqli_num_rows($query) > 0) {
            $alamatfile = $rest_dir . $nama_file;

            // Array of allowed file extensions
            $ekstensi = array('sql');
            $x = explode('.', $nama_file);
            $eks = strtolower(end($x));

            // Validate file extension
            if (in_array($eks, $ekstensi) == true) {
                if (move_uploaded_file($tmp_file, $alamatfile)) {
                    $templine = '';
                    $lines = file($alamatfile);

                    foreach ($lines as $line) {
                        if (substr($line, 0, 2) == '--' || $line == '')
                            continue;

                        $templine .= $line;

                        if (substr(trim($line), -1, 1) == ';') {
                            mysqli_query($koneksi, $templine);
                            $templine = '';
                        }
                    }

                    unlink($alamatfile);
                    $_SESSION['succRestore'] = 'SUKSES! Database berhasil direstore';
                    header("Location: ./admin.php?page=sett&sub=rest");
                    die();
                } else {
                    $_SESSION['errUpload'] = 'ERROR! Proses upload database gagal';
                    header("Location: ./admin.php?page=ref&act=imp");
                    die();
                }
            } else {
                $_SESSION['errFormat'] = 'ERROR! Format file yang diperbolehkan hanya *.SQL';
                header("Location: ./admin.php?page=sett&sub=rest");
                die();
            }
        } else {
            session_destroy();
            echo '<script language="javascript">
                window.alert("ERROR! Password salah. Anda mungkin tidak memiliki akses ke halaman ini");
                window.location.href="index.php";
            </script>';
        }
    }
}

include 'footer.php';
?>
