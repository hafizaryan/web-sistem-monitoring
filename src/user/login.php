<?php
session_start();
$title = 'Login';

require '../../public/app.php';
require '../layouts/header.php';
include 'koneksi.php';

// logic backend
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $akses = $_POST['akses'];
  if ($akses == "admin") {
    $login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
    $cek = mysqli_num_rows($login);
    if ($cek > 0) {
      session_start();
      $data = mysqli_fetch_assoc($login);
      $_SESSION['id'] = $data['admin_id'];
      $_SESSION['nama'] = $data['admin_nama'];
      $_SESSION['username'] = $data['admin_username'];
      $_SESSION['status'] = "admin_login";
      header("location:tambahan/admin?alert=sukses");
    } else {
      header("location:login.php?alert=gagal");
    }
  } else {
    $login = mysqli_query($koneksi, "SELECT * FROM petugas WHERE petugas_username='$username' AND petugas_password='$password'");
    $cek = mysqli_num_rows($login);
    if ($cek > 0) {
      session_start();
      $data = mysqli_fetch_assoc($login);
      $_SESSION['id'] = $data['petugas_id'];
      $_SESSION['nama'] = $data['petugas_nama'];
      $_SESSION['username'] = $data['petugas_username'];
      $_SESSION['status'] = "pemimpin_login";
      header("location:tambahan/pemimpin?alert=sukses");
    } else {
      header("location:login.php?alert=gagal");
    }
  }
}
?>
<div class="d-flex justify-content-center py-5 mt-5">
  <div class="card shadow mt-3 border-bottom-primary bg-gray-100" data-aos="fade-down">
    <div class="card-body">
      <?php if (isset($error)) : ?>
        <div class="alert alert-dismissible fade show" style="background-color: #b52d2d;" role="alert">
          <h6 class="text-gray-100 mt-2">Maaf username atau password anda salah</h6>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-light">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <script>
        setTimeout(function() {
          var errorMessage = document.getElementById('errorMessage');
          if (errorMessage) {
            errorMessage.style.display = 'none';
          }
        }, 3000);
      </script>
      <h3 class="text-center text-primary text-uppercase text-bold"><b>Login</b></h3>
      <hr class="bg-gradient-primary">
      <div class="row">
        <div class="col-6">
          <div class="image" style="margin-top: 60px">
            <img src="../../assets/img/logo_ki2.png" width="200" alt="">
          </div>
        </div>
        <div class="col-6">
          <form action="" method="post">
            <?php
            if (isset($_GET['alert']) && $_GET['alert'] === 'gagal') {
              echo '<div class="alert alert-danger" style="text-align: center;" role="alert" id="errorMessage">Login Gagal </div>';
            }
            ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control shadow" style="border: none;" id="exampleInputEmail1" placeholder="..." name="username" maxlength="20" autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control shadow" style="border: none;" id="exampleInputPassword1" placeholder="..." name="password" maxlength="20" autofocus>
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Hak Akses</label>
              <select class="form-control" name="akses">
                <option value="admin">Admin</option>
                <option value="petugas">Pimpinan</option>
              </select>
            </div>
            <div class="">
              <button type="submit" name="submit" class="btn btn-primary shadow-lg">Masuk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="text-center mt-3">
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</div>
<?php require '../layouts/footer.php' ?>