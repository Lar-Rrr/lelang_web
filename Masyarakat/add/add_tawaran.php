<?php
include('../../conn.php');

$id_lelang = $_POST['id_lelang'];
$id_barang = $_POST['id_barang'];
$id_user = $_POST['id_user'];
$harga_awal = $_POST["harga_awal"];
$penawaran_harga = $_POST['penawaran_harga'];



if($penawaran_harga <= $harga_awal){
    echo '<script language="javascript">alert("Tawaran harus lebih dari harga awal"); document.location="../penawaran.php";</script>';
}else{
    $penawaran_harga;
    $query = "INSERT INTO history_lelang VALUES('','$id_lelang','$id_barang','$id_user','$penawaran_harga')";
    $result = mysqli_query($conn,$query);
    if ($result){
        echo '<script language="javascript">alert("Terima kasih sudah menawar"); document.location="../penawaran.php";</script>';
    }else{
        echo '<script language="javascript">alert("Gagal Menawar"); document.location="../penawaran.php";</script>';

    }
}


?>