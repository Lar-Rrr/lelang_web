<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Pengguna</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="Assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<style>
  body{
    background-image: url("Assets/dist/img/geometric-gradient-technology-background_23-2149110132.png");
    background-position: center;
    background-size: cover;

  }
  .wave-group {
  position: relative;
}

.wave-group .input {
  font-size: 16px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 100%;
  border: none;
  border-bottom: 1px solid white;
  background: transparent;
}

.wave-group .input:focus {
  outline: none;
}

.wave-group .label {
  color: white;
  font-size: 12Spx;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  display: flex;
}

.wave-group .label-char {
  transition: 0.2s ease all;
  transition-delay: calc(var(--index) * .05s);
}

.wave-group .input:focus ~ label .label-char,
.wave-group .input:valid ~ label .label-char {
  transform: translateY(-20px);
  font-size: 15px;
  color: white;
}

.wave-group .bar {
  position: relative;
  display: block;
  width: 100%;
}

.wave-group .bar:before,.wave-group .bar:after {
  content: '';
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  background: white;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}

.wave-group .bar:before {
  left: 50%;
}

.wave-group .bar:after {
  right: 50%;
}

.wave-group .input:focus ~ .bar:before,
.wave-group .input:focus ~ .bar:after {
  width: 50%;
}

</style>
</head>
<body class="login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card bg-transparent card-outline">
    <div class="card-header text-center">
      <p href="#" class="h1 text-white"><b>Login Pengguna </b></p>
    </div>
    <div class="card-body">
       

      <form action="auth_mas.php" method="post">
    <div class="wave-group mb-3">
    <input required type="text" class="input text-white" autocomplete="off" name="username">
    <span class="bar"></span>
    <label class="label">
      <span class="label-char" style="--index: 0">U</span>
      <span class="label-char" style="--index: 1">s</span>
      <span class="label-char" style="--index: 2">s</span>
      <span class="label-char" style="--index: 3">e</span>
      <span class="label-char" style="--index: 3">r</span>
      <span class="label-char" style="--index: 3">n</span>
      <span class="label-char" style="--index: 3">a</span>
      <span class="label-char" style="--index: 3">m</span>
      <span class="label-char" style="--index: 3">e</span>
    </label>
  </div>
  <div class="wave-group mb-4">
    <input required type="password" class="input text-white"  autocomplete="off" name="password">
    <span class="bar"></span>
    <label class="label">
      <span class="label-char" style="--index: 0">P</span>
      <span class="label-char" style="--index: 1">a</span>
      <span class="label-char" style="--index: 2">s</span>
      <span class="label-char" style="--index: 3">s</span>
      <span class="label-char" style="--index: 3">w</span>
      <span class="label-char" style="--index: 3">o</span>
      <span class="label-char" style="--index: 3">r</span>
      <span class="label-char" style="--index: 3">d</span>
    </label>
  </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Login Masyarakat</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0 text-white mt-2 h6">
        <i>Belum punya akun ? Daftar </i><a href="daftar_mas.php" class="text-center">Disini</a>
        <br>
        <i  class="text-center">Kamu petugas? Masuk </i> <a href="login.php">Disini</a>
      </p>
      </div>
    </div>


<!-- jQuery -->
<script src="Assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Assets/dist/js/adminlte.min.js"></script>
<script src="Assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
<?php
    if(isset($_GET['error'])){
      if($_GET['error']=="gagal"){
        echo"<script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          
        })
        Toast.fire({
          icon: 'error',
          title: 'login gagal'})
        </script>";
      }else if($_GET['error']=="daftar"){
        echo "
        <script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          
        })
        Toast.fire({
          icon: 'success',
          title: 'Terima kasih sudah mendaftar'})
        </script>"; 
        
      }
      else if($_GET['error']=="logout"){
        echo "
        <script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          
        })
        Toast.fire({
          icon: 'success',
          title: 'Berhasil logout'})
        </script>"; 
        
      }
    }
    ?>
</html>
