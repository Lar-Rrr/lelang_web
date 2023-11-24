<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar.php')?>
  
  <!-- /.navbar -->
<style>
  .img-priview img{
    width:100%;
    height: 250px;
    overflow:hidden;
    object-fit: cover;
    border: 2px solid #016872;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="mt-2">Data Barang</h3>
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
                <button type="submit" class="btn" id="btn" data-toggle="modal" data-target="#modal-tambah-barang">
                <i class="fas fa-plus"></i> Tambah barang
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
            <th>Gambar barang</th>
            <th>Nama barang</th>
            <th>Tanggal barang</th>
            <th>Harga barang</th>
            <th>Deskripsi barang</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
              include("../conn.php");
                    $No = 0 ;
                      $query = mysqli_query($conn, "SELECT * from tb_barang");
                      while($brg = mysqli_fetch_array($query)){
                        $No++
                    ?>
            <tr>
                      <td><?php echo $No ?></td>
                      <td><img class="profile-user-img img-fluid " src="../file/<?php echo $brg['foto']?>"></td>
                      <td><?php echo $brg['nama_barang']; ?></td>
                      <td><?php echo $brg['tgl']; ?></td>
                      <td class="text-danger">Rp. <?php echo number_format($brg['harga_awal']); ?></td>
                      <td><?php echo $brg["deskripsi_barang"]; ?></td>
            <td>
            <button type="submit" class="btn btn-warning btn-sm text-white" data-toggle="modal" data-target="#modal-ubah-barang<?php echo $brg["id_barang"]?>">
                <i class="fas fa-pen"></i>  
            </button>
            <button type="submit" class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#modal-hapus-barang<?php echo $brg["id_barang"]?>">
                <i class="fas fa-trash"></i>  
            </button>
            </td>
            </tr>

        <div class="modal fade" id="modal-hapus-barang<?php echo $brg["id_barang"]?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">hapus data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="delete/delete.php" method="post">
            <div class="modal-body">

                <p>apakah anda yakin</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="delete/delete.php?id_barang=<?php echo $brg['id_barang'];?>" class="btn btn-primary">Save changes</a>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            <div class="modal fade" id="modal-ubah-barang<?php echo $brg["id_barang"]?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">edit data barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form enctype="multipart/form-data" method="POST" action="update/update.php">
            <div class="modal-body">    
            <div class="form-group">
                  <label>foto barang</label>
                  <input type="file" class="form-control" name="foto">
            </div>  
                <div class="form-group">
                    <input type="text" class="form-control" name="id_barang" value="<?= $brg['id_barang']?>" hidden>
              </div>
                <div class="form-group">
                    <label>Nama barang</label>
                    <input type="text" class="form-control" name="nama_brg" value="<?= $brg['nama_barang']?>">
              </div>
                <div class="form-group">
                    <label>tanggal barang</label>
                    <input type="date" class="form-control" name="tgl" value="<?= $brg['tgl']?>">
              </div>
                <div class="form-group">
                    <label>harga barang</label>
                    <input type="number" class="form-control" name="harga_awal" value="<?= $brg['harga_awal']?>">
              </div>
                <div class="form-group">
                    <label>deskripsi barang</label>
                    <textarea  class="form-control" id="" cols="50" rows="20" name="deskripsi_brg"><?php echo $brg["deskripsi_barang"]; ?></textarea>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">update</button>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            <?php }?>
            </tbody>
            </table>


      <!-- tambah barang -->
      
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

<div class="modal fade" id="modal-tambah-barang">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form enctype="multipart/form-data" method="POST" action="add/add.php">
            <div class="modal-body">
              <div class="form-group">
              <div id="preview" class=" img-priview"></div>
                  <label>foto barang</label>
                 <input type="file" class="form-control btn" name="foto" id="upload_file" onchange="getImagePreview(event)">
            </div>
              <div class="form-group">
                <label>Nama barang</label>
                <input type="text" class="form-control" name="nama_brg">
              </div>
                <div class="form-group">
                    <label>tanggal barang</label>
                    <input type="date" class="form-control" name="tgl">
              </div>
                <div class="form-group">
                    <label>harga barang</label>
                    <input type="number" class="form-control" name="harga_awal">
              </div>
                <div class="form-group">
                    <label>deskripsi barang</label>
                    <textarea  class="form-control" id="" cols="30" rows="10" name="deskripsi_brg"></textarea>
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
      <script>
         function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="300";
    imagediv.appendChild(newimg);
  }
      
      </script>
