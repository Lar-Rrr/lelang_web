<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar.php')?>

<div class="content-wrapper">
  <div class="content-header">
    <?php 
       include("../conn.php");
       $petugas = mysqli_query($conn,"SELECT * from tb_petugas where username='$_SESSION[username]'");
        while($pts = mysqli_fetch_array($petugas)){
       ?>

    <div class="alert alert-success alert-dismissible">
        <h5><b><i class="icon fas fa-user-tie"></i> Welcome!</b></h5>
         <p><?= $pts['nama_petugas'] ?></p>
          <a href="aktivasi.php">Start Activation</a>
    </div>  
  <?php } ?>
  </div>
</div>
<!-- /.content-wrapper -->
<?php include('../App/footer.php')?>

