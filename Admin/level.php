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
                <h3>pendataan level</h3>
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
                <h3 class="card-title">Data level</h3>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <div class="input-group-append">
                <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                <i class="fas fa-plus"></i>Tambah level
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
            <th>Nama level</th>
       
            </thead>
            <tbody>
            <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>
            <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-ubah">
                <i class="fas fa-pen"></i>edit 
            </button>
            <button type="submit" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-hapus">
                <i class="fas fa-trash"></i>edit 
            </button>
            </td>
            </tr>
            
            </tbody>
            </table>
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
            <div class="modal fade" id="modal-ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">edit data barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama level</label>
                    <input type="text" name="nama_barang" class="form-control">
              </div>
                <div class="form-group">
                    <label>tanggal barang</label>
                    <input type="date" name="tanggal_barang" class="form-control">
              </div>
                <div class="form-group">
                    <label>harga barang</label>
                    <input type="number" name="harga_barang" class="form-control">
              </div>
                <div class="form-group">
                    <label>deskripsi barang</label>
                    <textarea name="deskripsi_barang" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">update</button>
            </div>
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
            <div class="modal-body">

              <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="id_level">
                    <option value="administrator">admin</option>
                    <option value="petugas">petugas</option>
                </select>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Simpan</button>
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
