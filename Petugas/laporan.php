<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar.php')?>
  
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="mt-2">Laporan Lelang</h3>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <a href="print.php" class="btn " id="btn" target="blank_"><i class="fas fa-print"></i> print laporan</a>
              </div>
              </div>
            </div>
                </div>
              <div class="card-body">
                            
            <div class="card-body ">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>ID</th>
            <th>Nama barang</th>
            <th>Tanggal lelang</th>
            <th>Pemenang </th>
            <th>harting </th>
            <th>status </th>
            </tr>
            </thead>
            <tbody>
              <?php
                $no=1;
                include("../conn.php");
                $lelangs = mysqli_query($conn,"SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang  INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas");

                while($lelang = mysqli_fetch_array($lelangs)){
                  $harga_tertinggi= mysqli_query($conn,"SELECT MAX(penawaran_harga) as penawaran_harga FROM history_lelang WHERE id_lelang='$lelang[id_lelang]'");
                  $harga_tertinggi = mysqli_fetch_array($harga_tertinggi);
                  $harting = $harga_tertinggi['penawaran_harga'];
                  $winners = mysqli_query($conn,"SELECT * FROM history_lelang WHERE id_lelang='$lelang[id_lelang]'");
                  $winner = mysqli_fetch_array($winners);
                  $peoples = mysqli_query($conn,"SELECT * FROM tb_masyarakat WHERE id_user='$winner[id_user]'");
                  $people = mysqli_fetch_array($peoples);                 
              ?>
            <tr>
            <td><?= $no++?></td>
            <td><?php echo $lelang['nama_barang']?></td>
            <td><?php echo $lelang['tgl_lelang']?></td>
            <td><?php echo $people['nama_lengkap']?></td>
            <td>Rp. <?= number_format($harting) ?></td>
            <td>    
              <?php if($lelang['status']==''){?>
                  <div class="btn btn-warning btn-sm">Lelang belum aktif</div>
                <?php } else if($lelang['status']=='dibuka') {?>
                  <div class="btn btn-danger btn-sm">Lelang Belum Selesai</div>
                <?php } else {?>   
                  <div class="btn btn-success btn-sm">Lelang Selesai</div>
                <?php } ?>
            </td>
            </tr>
          
            
        <div class="modal fade" id="modal-buka<?php echo $lelang['id_lelang'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">buka Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="update/update-buka.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="status" value="dibuka" class="form-control" hidden>
                    <input type="text" name="id_lelang" value="<?php echo $lelang['id_lelang'];?>"  class="form-control" hidden>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      </div>
            
      <div class="modal fade" id="modal-tutup<?php echo $lelang['id_lelang'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">tutup Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="update/update-tutup.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="status" value="ditutup" class="form-control" hidden>
                    <input type="text" name="id_lelang" value="<?php echo $lelang['id_lelang'];?>" class="form-control" hidden>
              </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      </div>

      <?php }?>
    </tbody>
  </table>
  <div class="modal fade" id="modal-lelang">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Barang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="add/add_lelang.php" method="post">
        <div class="modal-body">
            <div class="form-group">
                <select name="id_barang" class="form-control select2">
                  <option disabled selected>pilih</option>
                    <?php
                      include("../conn.php");
                      $brg_lelangs= mysqli_query($conn,"SELECT * from tb_barang");
                      while($brg_lelang= mysqli_fetch_array($brg_lelangs)){
                    ?>
                    <option value="<?php echo $brg_lelang['id_barang'];?>"><?php echo $brg_lelang['nama_barang'];?></option>

                    <?php } ?>
                </select>
          </div>
          <div class="form-group">
                    <?php
                      include("../conn.php");
                      $brg_petugass= mysqli_query($conn,"SELECT * from tb_petugas WHERE username='$_SESSION[username]'");
                      while($brg_petugas= mysqli_fetch_array($brg_petugass)){
                    ?>
                    <input type="text" name="id_petugas" value="<?php echo $brg_petugas['id_petugas'];?>" class="form-control" hidden>
                    <?php } ?>
              </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
    </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    </div>
</div>
              <!-- /.card-body -->
</div>
</div>
</div>
         
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
<?php include('../App/footer.php')?>



           