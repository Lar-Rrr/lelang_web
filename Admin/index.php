<?php include('../App/header.php')?>
<!-- Navbar -->
<?php include( '../App/navbar.php')?>
<?php
    include('../conn.php');  


    $query = mysqli_query($conn, "SELECT count(id_user) AS mas_onn FROM tb_masyarakat");
    $view = mysqli_fetch_array($query);
    $queryPts = mysqli_query($conn, "SELECT count(id_petugas) AS pts_onn FROM tb_petugas");
    $viewPts = mysqli_fetch_array($queryPts);
    $queryBrgOn = mysqli_query($conn, "SELECT count(id_barang) AS brg_lelangOn FROM tb_lelang WHERE status='dibuka'");
    $viewBrgOn = mysqli_fetch_array($queryBrgOn);
    $queryBrgOf = mysqli_query($conn, "SELECT count(id_barang) AS brg_lelangOf FROM tb_lelang WHERE status='ditutup'");
    $viewBrgOf = mysqli_fetch_array($queryBrgOf);
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3 effect">
          <span class="info-box-icon bg-primary elevation-1 "><i class="fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Masyarakat</span>
          <span class="info-box-number">
        <?= $view['mas_onn'] ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3 effect">
          <span class="info-box-icon bg-warning  elevation-1 "><i class="fas fa-user-tie text-white"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Jumlah Petugas </span>
          <span class="info-box-number">
        <?= $viewPts['pts_onn'] ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3 effect">
          <span class="info-box-icon bg-success elevation-1 "><i class="fas fa-box-open"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Barang Leleng Aktif </span>
          <span class="info-box-number">
        <?= $viewBrgOn['brg_lelangOn'] ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3 effect">
          <span class="info-box-icon bg-danger elevation-1 "><i class="fas fa-box-open"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"> Barang Sudah Di Tutup </span>
          <span class="info-box-number">
        <?= $viewBrgOf['brg_lelangOf'] ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      </div>
  <!-- /.info-box -->
</div>
  </div>
</div>
<?php include('../App/footer.php')?>
