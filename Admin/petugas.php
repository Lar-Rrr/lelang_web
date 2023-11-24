<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar.php')?>
  <!-- CodeMirror -->
 
  
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="mt-2">Data Petugas</h3>
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
                <button type="submit" class="btn" id="btn" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i> Tambah petugas
                </button>
                </div>
                </div>
                </div>
                </div>
                            
            <div class="card-body ">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>ID</th>
            <th>Nama petugas</th>
            <th>Username</th>
            <th>level</th>
            <th>aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              include("../conn.php");
                    $No = 0 ;
                      $query = mysqli_query($conn, "SELECT * from tb_petugas INNER JOIN tb_level ON tb_petugas.id_level=tb_level.id_level");
                      while($petugas = mysqli_fetch_array($query)){
                        $No++
                    ?>
            <tr>
              <td><?php echo $No ?></td>
              <td><?php echo $petugas['nama_petugas']; ?></td>
              <td><?php echo $petugas['username']; ?></td>
              <td><?php echo $petugas['level']; ?></td>
            
            <td>
                  <?php if ($_SESSION['username'] == $petugas['username']) { ?>
                    <button type="submit" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-ubah<?php echo $petugas["id_petugas"];?>">
                      <i class="fas fa-pen"></i> Edit 
                  </button>        
                    <?php }else { ?>
              <button type="submit" class="btn btn-warning text-white btn-sm" data-toggle="modal" data-target="#modal-ubah<?php echo $petugas["id_petugas"];?>">
                  <i class="fas fa-pen"></i> Edit 
              </button>
              <button type="submit" class="btn btn-danger text-white btn-sm" data-toggle="modal" data-target="#modal-hapus">
                  <i class="fas fa-trash"></i> Hapus 
              </button>
                <?php } ?>
              </td>
            </tr>
            <div class="modal fade" id="modal-hapus">
              <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">hapus data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p>apakah anda yakin</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            <div class="modal fade" id="modal-ubah<?php echo $petugas["id_petugas"];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Petugas</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="update/update_admin.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="id_petugas" value="<?= $petugas['id_petugas']?>" hidden class="form-control">
              </div>
                <div class="form-group">
                    <label>Nama petugas</label>
                    <input type="text" name="nama_petugas" class="form-control" value="<?php echo $petugas["nama_petugas"];?>">
              </div>
                <div class="form-group">
                    <label>username</label>
                    <input type="text" name="username" value="<?php echo $petugas["username"];?>" class="form-control">
              </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password" value="<?php echo $petugas["password"];?>" class="form-control">
              </div>
                <div class="form-group">
                    <label>level</label>
                    <select name="id_level" class="form-control" >
                      <option selected disabled>pilihhh</option>
                      <?php 
                      include("../conn.php");
                      $levels = mysqli_query($conn, "SELECT * FROM tb_level");
                      while($level = mysqli_fetch_array($levels)){
                      ?>
                        <option value="<?=$level['id_level'] ?>" <?php if($level['id_level'] == $petugas['id_level']){ echo 'selected'; } ?>><?=$level['level'] ?></option>
                      <?php } ?>
                      
                </select>
                    
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">update</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="add/add_admin.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama petugas</label>
                    <input type="text" name="nama_petugas" class="form-control">
              </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
              </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="id_level">
                    <option value="1">admin</option>
                    <option value="2">petugas</option>
                </select>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
  <?php }?>
            </tbody>
          </table>
        <!-- /.modal-dialog -->
      </div>
            </div>
              </div>
              <!-- /.card-body -->
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


<!-- <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h5>Data barang</h5>
                </div>
              <div class="card-body">
                <h6 class="card-title">Selamat datang admin </h6>
               <p class="card-text">silahkan klik tomol di bawah ini</p>
               <a href="penawaran.php" class="btn btn-primary">penawaran</a>
              </div>
            </div>
          </div>
         
      </div>
    </div> -->
