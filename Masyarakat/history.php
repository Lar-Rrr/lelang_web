<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar_mas.php')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
<div class="col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="text-lelang"><b>History Penawaran</b></h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
            <thead>
            <tr>
            <th width="5%" class="text-center">Id</th>
            <th>Nama barang</th>
            <th>Harga barang</th>
            <th>Harga tawar</th>
            <th>Status</th>
            <th width="12%">Aksi </th>
            </tr>
            </thead>
            <tbody>
            <?php 
              include("../conn.php");
                    $No = 0 ;
                      $history_lg = mysqli_query($conn, "SELECT * from history_lelang INNER JOIN tb_barang ON history_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_masyarakat ON history_lelang.id_user=tb_masyarakat.id_user INNER JOIN tb_lelang ON history_lelang.id_lelang=tb_lelang.id_lelang ");
                      while($his_lg = mysqli_fetch_array($history_lg)){
                        $No++
                    ?>
                    <?php if($his_lg['username'] == $_SESSION['username']) { ?>

            <tr>
                      <td class="text-center"><?php echo $No ?></td>
                      <td><?php echo $his_lg['nama_barang']; ?></td>
                      <td>Rp. <?php echo number_format($his_lg['harga_awal']); ?></td>
                      <td>Rp. <?php echo number_format($his_lg['penawaran_harga']); ?></td>
              
                <td>
                  <?php if ($his_lg['penawaran_harga'] == $his_lg['harga_akhir'] ) { ?>
                      <div class="text-center">👑</div>
                      <?php } else if($his_lg['penawaran_harga'] < $his_lg['harga_akhir'] ){ ?>
                        <div class="text-center">❌</div>
                    <?php } else { ?>
                     <div class="text-center">
                      <span class="badge badge-warning">Proses</span>
                     </div>
                      <?php } ?>
                </td>
                <td>
                <?php if($his_lg['status'] =='dibuka') { ?>
                  <button type="submit" class="btn btn-warning btn-sm text-light" data-toggle="modal" data-target="#modal-ubah-barang<?php echo $his_lg["id_history"]?>">
                     <i class="fas fa-pen"></i>
                  </button>
                  <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus-barang<?php echo $his_lg["id_history"]?>">
                     <i class="fas fa-trash"></i>
                   </button>
                  <?php } else {?>
                    <div class="badge badge-success">Lelang di tutup</div>
                  <?php } ?>
             </td>
            </tr>

        <div class="modal fade" id="modal-hapus-barang<?php echo $his_lg["id_history"]?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <div class="modal-title">
              <h4 class="modal-title">Batalkan penawaran</h4>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="delete/delete.php" method="post">
            <div class="modal-body">

                <p>Apakah anda yakin membatalkan penawaran ?</p><input type="text" value="<?php echo $his_lg["id_history"] ?>" hidden></input>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="delete/delete_lelang.php?id_history=<?php echo $his_lg["id_history"]?>" class="btn btn-primary">Save</a>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            <div class="modal fade" id="modal-ubah-barang<?php echo $his_lg["id_history"]?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit penawaran</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="update/update_lelang.php">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="id_history" value="<?php echo $his_lg["id_user"]?>"hidden >
                    <input type="text" class="form-control" name="id_history" value="<?php echo $his_lg["id_barang"]?>" hidden>
                    <input type="text" class="form-control" name="id_history" value="<?php echo $his_lg["id_history"]?>" hidden>
              </div>
                <div class="form-group">
                    <input  class="form-control" name="penawaran_harga" value="<?php echo number_format($his_lg["penawaran_harga"]) ?>"></input>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
            <?php } else {?>
            <?php } }?>
            </tbody>
            </table>
                    </div>
                  </div>
                </div>
                </div>
                </div>
<?php include('../App/footer.php')?>
