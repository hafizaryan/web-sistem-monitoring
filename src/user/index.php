<?php

$title = 'Sistem Informasi Monitoring Persidangan Sengketa Informasi Publik';

require '../layouts/header.php';

include 'koneksi.php';

// logic backend


// mengambil angka pengaduan dari database
$masuk = mysqli_query($koneksi, "select * from sengketa WHERE proses = 'Masuk'");

// mengambil angka tanggapan dari database
$diproses = mysqli_query($koneksi, "select * from sengketa WHERE proses = 'Diproses'");

// mengambil angka akun masyarakat dari database
$selesai = mysqli_query($koneksi, "select * from sengketa WHERE proses = 'Selesai'");

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 shadow">
  <div class="container" data-aos="fade-down">
    <a class="navbar-brand" href="#">
      <i class="fas fa-atlas"></i> Sistem Informasi Monitoring Persidangan Sengketa
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <a href="login.php" class="btn btn-light mr-3"><b>Login</b></a>    
      </ul>
    </div>
  </div>
</nav>

<div class="bg-gradient-primary" style="border-bottom-right-radius: 100px; border-bottom-left-radius: 100px; padding:150px;">
  <div class="container d-flex justify-content-center" data-aos="zoom-in">
    <div class="text-center col-8 text-light" style="margin-top: -25px;">
      <h1><b>Komisi Informasi Provinsi Riau</b></h1>
      <p>Sistem Informasi Monitoring Persidangan Sengketa Informasi Publik berbasis
        web ini adalah platform digital yang memudahkan pemantauan dan 
        pelaporan sengketa <br> dengan transparan dan efisien, melibatkan semua pihak terkait 
        <br> untuk mencapai  penyelesaian yang akurat dan objektif.</p>
        <a href="javascript:void(0);" onclick="scrollToDiv();" class="btn btn-outline-light">Hubungi</a>
        <script>
      function scrollToDiv() {
        var targetDiv = document.querySelector('.container.text-center.text-light');
        window.scrollTo({
          top: targetDiv.offsetTop,
          behavior: 'smooth'
        });
      }
    </script>
    </div>
  </div>
</div>

<div class="container" style="margin-top: -35px ;">
  <!-- Card -->
    <div class="row mb-3">
      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="500">
        <div class="card border-left-info border-bottom-info shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
                <div class="h5 mb-0 font-weight-bold text-danger"><?php echo mysqli_num_rows($masuk); ?> Sengketa</div>
              </div>
              <i class="fas fa-comment fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="700">
        <div class="card border-left-success border-bottom-success shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
                <div class="h5 mb-0 font-weight-bold text-warning"><?php echo mysqli_num_rows($diproses); ?> Sengketa</div>
              </div>
              <i class="fas fa-comment fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="900">
        <div class="card border-left-warning border-bottom-warning shadow-lg h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col ml-3">
              <div class="h5 mb-0 font-weight-bold text-success"><?php echo mysqli_num_rows($selesai); ?> Sengketa</div>
              </div>
              <i class="fas fa-comments fa-2x text-gray-500"></i>
            </div>
          </div>
        </div>
      </div>

    </div>
    <title>Fitur Pencarian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: white;
        }

        form {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 8px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .search-results {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-results h2 {
            color: #007BFF;
        }

      
    table {
        width: 100%; /* Melebarkan tabel untuk mengisi lebar kontainer */
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px; /* Menambahkan padding ke sel-sel tabel */
        border: 2px solid #ccc; /* Menambahkan border ke sel-sel tabel */
        color: #000;
    }

    th {
        background-color: #004080; /* Warna latar belakang untuk baris kepala (th) */
        color: white; /* Warna teks untuk baris kepala */
        text-align: center; /* Pusatkan teks dalam sel-sel tabel */

    }

    tr:nth-child(even) {
        background-color: #f2f2f2; /* Warna latar belakang untuk baris genap */
    }

    tr:nth-child(odd) {
        background-color: #ffffff; /* Warna latar belakang untuk baris ganjil */
    }
</style>
    
<body>
<h1><b>Cari Data</b></h1>
<form action="" method="get">
    <label for="keyword">NIK : </label>
    <input type="text" id="keyword" name="nik_pemohon" style="margin-right: 10px;"> <!-- Menambahkan margin kanan -->
    <button type="submit">Cari</button>
</form>

<?php
    include 'koneksi.php';

    $whereClause = '';

    if (isset($_GET['nik_pemohon']) && !empty($_GET['nik_pemohon'])) {
        $nik_pemohon = mysqli_real_escape_string($koneksi, $_GET['nik_pemohon']);
        $whereClause = "WHERE nik_pemohon LIKE '%$nik_pemohon'";
        $query = mysqli_query($koneksi, "SELECT * FROM sengketa $whereClause ORDER BY statuss DESC");

        if (mysqli_num_rows($query) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Nama</th>';
            echo '<th>NIK</th>';
            echo '<th>Data Status</th>';
            echo '<th>Proses</th>';
            echo '</tr>';

            while ($dataProses = mysqli_fetch_assoc($query)) {
                $status = json_decode($dataProses['statuss'], true);

                if (is_array($status)) {
                    echo '<tr>';
                    echo '<td>' . $dataProses['nama_pemohon'] . '</td>';
                    echo '<td>' . $dataProses['nik_pemohon'] . '</td>';
                    echo '<td>';
                    echo '<ul>';
                    
                    $reversedStatus = array_reverse($status);

                    foreach ($reversedStatus as $statusItem) {
                        echo '<li>' . $statusItem . '</li>';
                    }

                    echo '</ul>';
                    echo '</td>';
                    echo '<td>' . $dataProses['proses'] . '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        } else {
            echo "Tidak ada data yang cocok.";
        }
    } else {
        echo '<p>&nbsp;</p>'; // Paragraf untuk memberikan spasi
        echo "Silakan masukkan kata kunci pencarian.";

    }
    ?>
<br><br>
   
</body>
</html>
    <div class="container">
      <div class="row">
        <div class="col-6" data-aos="fade-right">
          <div class="desc" style="margin-top: 130px;">
            <h4 class="text-justify text-gray-900" >Komisi Informasi Provinsi Riau merupakan Lembaga Negara 
              Mandiri yang dibentuk berdasarkan Undang-undang Nomor 14 Tahun 2008, Pasal 23.</h4>
          </div>
        </div>
        <div class="col-6">
          <div class="img mt-5 ml-3" data-aos="fade-left">
            <img src="../../assets/img/ki.png" width="350" alt="" style="margin-left: 100px; margin-top:-30px">
          </div>
        </div>

        <div class="col-6" style="margin-top: -10px;">
          <div class="img" data-aos="fade-right">
            <img src="../../assets/img/ki2.jpg" style="margin-left: -30px; margin-top: 10px" width="500" alt="">
          </div>
        </div>
        <div class="col-6" style="margin-top: -90px;">
          <div class="desc ml-3" style="margin-top: 200px;" data-aos="fade-left">
            <h4 class="text-left text-gray-900" style="margin-left: 5px;"><b>VISI KOMISI INFORMASI PROVINSI RIAU</b>
              <br> <br>“Optimalisasi Transparansi Informasi Publik Memanfaatkan Teknologi
               Informasi untuk Mewujudkan Provinsi Riau Berkemajuan dan Berdaya Saing”</h4>
          </div>
        </div>

        <div class="col-6" style="margin-top: 130px;">
          <div class="desc" data-aos="fade-right">
            <h4 class="text-justify text-gray-900" style="margin-left: 20px; margin-bottom: 130px;"><b>ALAMAT </b><br><br>
            Jalan Gajah Mada Nomor 200, Gedung Samsat Lantai 3, Kelurahan Simpang Empat, Kecamatan Pekanbaru Kota, Pekanbaru
          </div>
        </div>
        <div class="col-6" style="margin-top: 40px;" data-aos="fade-left">
          <div class="img ml-3">
            <img src="../../assets/img/lokasi.png" style="margin-left: 70px" width="300" alt="">
          </div>
        </div>
      </div>
    </div>
</div>


<!-- info -->
<div class="bg-gradient-primary py-5">
  <div class="container text-center text-light">
    <h1 class="mb-3"><b>Info Contact</b></h1>
    <a href="mailto:arifahdila57@gmail.com" class="btn btn-outline-light ml-1">Chat admin</a>
    <a href="mailto:arifahfadhila57@gmail.com" class="btn btn-outline-light ml-1">Contact Developer</a>
    <div class="mt-4">
      <a href="https://www.instagram.com/komisiinformasi_riau/" class="mr-3 text-light">
        <i class="fab fa-instagram"></i> @komisiinformasi_riau <!-- Simbol Instagram dari Font Awesome -->
      </a>
      <a href="https://komisiinformasi.riau.go.id/" class="text-light">
        <i class="fas fa-globe"></i> Kunjungi Situs Web 
      </a>
    </div>
  </div>
</div>

<!-- footer -->
<div class="bg-gray-400 py-3">
  <footer>
    <div class="text-center mt-2 text-gray-700">
      <h6>Copyright &copy;2023 Komisi Informasi Provinsi Riau</h6>
    </div>
  </footer>
</div>


<?php require '../layouts/footer.php'; ?>