<?php
session_start();
if($_SESSION['id_level']==""){
  header('Location:../index.php?error=login');
}
 $pageName =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
?>
<style>
  nav {
  background-color: #016872;
  display: flex;
  color:#a0dfdf;
  justify-content: space-between;
  padding: 1rem 2rem;
}

nav ul {
  display: flex;
  align-items: center;
  gap: 2rem;
  list-style: none;
}


nav ul li a {
  text-decoration: none;
  font-family: "Segoe UI", sans-serif;
  color: #a0dfdf;
  font-weight: 600;
  padding: 8px 0;
  transition: all ease-in-out .1s;
  border-bottom: 1px solid rgba(255, 68, 0, 0);
}

nav ul li a:hover {
  color: #fff;
}
.activeClass{
  color: #fff;
  border-bottom: 2px solid #fff;
}
.menu-icon {
  /* background-color: tomato; */
  font-size: 28px;
  display: none;
}

main {
  padding-top: 7rem;
}

@media only screen and (max-width: 768px) {
  nav {
    flex-wrap: wrap;
    position: fixed;
    width: 100%;
    top: 0;
  }

  nav ul {
    margin-left:0;
    flex-direction: column;
    width: 100%;
  }

  nav ul li:last-of-type {
    padding-bottom: 8px;
  }

  nav ul.hidden {
    display: none;
  }

  .menu-icon {
    display: flex;
    align-items: center;
  }
}
</style>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <div  class="navbar-brand">
        <span class="brand-text font-weight-bold">SI LELANG</span>
      </div>

      
  <?php if($_SESSION['id_level']=="1"){?>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-3">
          <li class="nav-item">
            <a href="index.php"  class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Admin/index.php' ? 'active text-success':'';?>">Home</a>
          </li>
          <li class="nav-item">
             <a href="barang.php" class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Admin/barang.php' ? 'active text-success':'';?>">Data Barang</a>
          </li>
          <li class="nav-item">
             <a href="petugas.php" class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Admin/petugas.php' ? 'active text-success':'';?> ">Data petugas</a>
          </li>
          <li class="nav-item">
             <a href="laporan.php" class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Admin/laporan.php' ? 'active text-success':'';?>">laporan</a>
          </li>
        </ul>
      </div>
      <?php }else{?>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-3">
          <li class="nav-item">
            <a href="index.php" class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Petugas/index.php' ? 'active text-success':'';?>">Home</a>
          </li>
          <li class="nav-item">
             <a href="aktivasi.php" class="nav-link <?= $pageName == 'localhost:8080/Lelang_Web/Petugas/aktivasi.php' ? 'active text-success ':'';?>">aktivasi</a>
          </li>
          <li class="nav-item">
             <a href="laporan.php" class="nav-link<?= $pageName == 'localhost:8080/Lelang_Web/Petugas/laporan.php' ? 'active text-success':'';?>">laporan</a>
          </li>
         
        </ul>
      </div>
        <?php };?>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <span>
                Log out
              
              </span>
            </a>
          </li>
      </ul>
    </div>
  </nav>