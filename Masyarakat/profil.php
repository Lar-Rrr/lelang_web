<?php include('../App/header.php')?>

<!-- Navbar -->
<?php include( '../App/navbar_mas.php')?>
<style>

ul{
        list-style-type: none;
    }
.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:default;
}
.contact-info{
        margin-top: 100px;
        font-weight: 300;

    }
    .list-titles{
        float: left;
        text-align: left;
        font-weight: 600;
        width: 30%;

    }
    .list-center{
        width: 10%;
        float: left;
        text-align: left;
    }
    .list-content{
        float: left;
        width: 60%;
        text-align: left;
    }
.card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#a0dfdf;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom;
}

.card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#016872;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}
.bg-lelang{
    background-color:#a0dfdf;
    color:#016872;

}
.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:0;
}
@media print{
    footer, .print{
        display:none;
    }
}

</style>
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
            <?php 
       include("../conn.php");
       $masyarakats = mysqli_query($conn,"SELECT * from tb_masyarakat where username='$_SESSION[username]'");
        while($masyarakat=mysqli_fetch_array($masyarakats)){
       ?>
       
                <div class="text-center">
                    <img class="img-thumbnail rounded-circle" src="../foto-user/<?php echo $masyarakat['foto']?>" width="30%">
                </div>
                
                <div class="text-center">
                    <h5 class="mb-0"><b><?php echo $masyarakat['nama_lengkap'] ?></b> </h5>
                    
                    <div class="card-body">
                <div class="contak-info h6 text-muted">
                    <ul class="list-titles">
                        <li>Email</li>
                        <li>Username</li>
                        <li>No telp</li>
                    </ul>
                    <ul class="list-center">
                        <li>:</li>
                        <li>:</li>
                        <li>:</li>
                    </ul>
                    <ul class="list-content">
                        <li><?php echo $masyarakat['email'];?></li>
                        <li><?php echo $masyarakat['username'];?></li>
                        <li><?php echo $masyarakat['telp'];?></li>
                    </ul>
                </div>
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    
                  
                    
                    
                </div>
                
               
                
                <?php } ?>
            </div>

            <table class="table table-bordered">
            <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                    <th>Nama Barang</th>
                    <th class="text-center">Status</th>
            </tr>
            </thead>
            <div class="alert bg-lelang alert-dismissible">              
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
                <h5><i class="icon fas fa-info"></i> Perhatian !</h5>
                <h6>👑  Artinya kamu memenangakan lelang <br> ❌  Artinya kamu kalah</h6>
            </div>
            
            <tbody>
            <?php 
              include("../conn.php");
                    $No = 1 ;
                      $history_lg = mysqli_query($conn, "SELECT * from history_lelang INNER JOIN tb_barang ON history_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_masyarakat ON history_lelang.id_user=tb_masyarakat.id_user INNER JOIN tb_lelang ON history_lelang.id_lelang=tb_lelang.id_lelang ");
                      while($his_lg = mysqli_fetch_array($history_lg)){
                        
                    ?>
                    <?php if($his_lg['username'] == $_SESSION['username']) { ?>

            <tr>
                <td><?= $No++ ?></td>
                <td><?php echo $his_lg['nama_barang']; ?></td>

                <td>
                  <?php if ($his_lg['penawaran_harga'] == $his_lg['harga_akhir'] ) { ?>
                      <div class="text-center"  data-toggle="modal" data-target="#modal-tambah-barang">👑</d>
                    <?php } else if($his_lg['penawaran_harga'] < $his_lg['harga_akhir'] ){ ?>
                        <div class="text-center">❌</div>
                        <?php } else { ?>
                            <div class="text-center "> <span class="badge badge-success">Masih proses harap sabar</span></div>
                            
                        <?php  } } }?>
                    </td>
            </tr>
        </div>
    </tbody>
    </table>
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <button class="btn bg-lelang print" onclick="print()"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
            </div>
        </div>
    
    </div>
</div>
<script>
    (function print(){
        window.print();
    })
</script>
<footer class="mt-5">
<?php include("../App/footer.php");?>
</footer>