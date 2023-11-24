<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar_mas.php')?>
  
  <!-- /.navbar -->
  <style>
    img{
      transition: all ease-in-out .2s;
    }
    .img{
      overflow:hidden;
    }
    .card{
      overflow: hidden;
      height:350px;
    }
    .img img:hover{
      transform: scale(1.1);
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header">


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row bg-white rounded-sm p-2">
          <div>
            <h4 class="text-lelang"><b>Produk SI LELANG</b></h4>
          </div>
       <div class="row">
              <?php
                $No = 1;
                include('../conn.php');
                $tb_lelang= mysqli_query($conn,"SELECT * from tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas
                 ");
                while($item= mysqli_fetch_array($tb_lelang)){
                  if($item['status']=='dibuka'){ ?>
                    <div class="col-lg-3">
                      <div class="card">
                        <div class="image"><div class="img"><img  src="../file/<?php echo $item['foto']?>" width="100%" ></div></div>
                        <div class="card-body">                       
                          <ul class="list-group mb-3 mt-3">
                            <li class="list-group">
                              <h4 class="text-uppercase"><?= $item['nama_barang']?></h4>
                            </li>
                          </ul>
                          <div class="row">
                            <div class="col-sm-8 " id="harga">
                              <span>Rp <span class="h4"><?= number_format($item['harga_awal'])?></span></span>
                             </div>
                          <div class="col-sm-4">
                           
                            <a href="#" class="btn" id="btn" data-toggle="modal" data-target="#modal-tawar<?= $item['id_lelang']?>"><b>Tawar</b></a>
                          </div>
                          </div>
                                                    
                          <div class="modal fade" id="modal-tawar<?= $item['id_lelang']?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <div class="modal-title">
                                          <div class="card-body">
                                           <img class="img-thumbnail" src="../file/<?php echo $item['foto']?>" width="100%" height="100%" >
                                           <ul class="list-group mb-3 mt-3">
                            <li class="list-group">
                              <h4 class="text-uppercase "><b class="text-muted"><?= $item['nama_barang']?></b></h4>
                            </li>
                            <li class="list-group">
                              <div class="text-muted"><b>Tanggal Barang :</b> <br>  <?= $item['tgl']?> </div>
                            </li>
                            <li class="list-group">
                              <div class="text-muted"><b>Deskripsi Barang :</b> <br> <?= $item['deskripsi_barang']?> </div>
                            </li>
                          </ul>
                          <div class="row">
                          <div class="col-sm-8 text-muted">
                              <span><b>Harga Barang :</b> <br><span id="harga"> Rp <span class="h4"><?= number_format($item['harga_awal'])?></span></span></span>
                             </div>
                            </div>
                                        </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                        <?php
                                          include("../conn.php");
                                          $masyarakats = mysqli_query($conn,"SELECT * from tb_masyarakat where username='$_SESSION[username]'");
                                          while($masyarakat=mysqli_fetch_array($masyarakats)){
                                        ?>
                                      <form action="add/add_tawaran.php" method="post">
                                      <div class="modal-body">
                                      <div class="form-group">
                                             
                                              <input type="text" name="id_lelang" value="<?php echo $item['id_lelang'];?>" class="form-control" hidden>
                                              
                                              <input type="text" name="id_barang" value="<?php echo $item['id_barang'];?>" class="form-control" hidden>
                                        </div>
                                      
                                          <div class="form-group">
                                            <b class="text-muted">Tawar Barang</b>
                                            <input type="text" name="id_user" value="<?php echo $masyarakat['id_user']; ?>" class="form-control" hidden>
                                            <input type="text" id="tawar" name="penawaran_harga"  class="form-control" placeholder="Masukan Nominal Harga" autofocus >
                                            <input type="text" name="harga_awal"  value="<?=$item['harga_awal']?>" hidden></input>

                                        </div>
                                        <?php } ?>
                                      </div>
                                      <div class="modal-footer justify-content-end">
                                        <button type="submit" class="btn" id="btn">Tawar</button>
                                      </div>
                                      </form>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                            </div>
                        </div>
                      </div>
                    </div>
                    <?php } else {?>
                      
                <?php } } ?>


              </div>
              </div>
            
          </div>
      </div>
    </div>
    <!-- /.content -->
    </div>
  </div>
</div>

  <!-- /.content-wrapper -->
<?php include('../App/footer.php')?>
