<?php
include('../../conn.php');
$id = $_GET['id_barang'];
$data = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang='$id'");
$row = mysqli_fetch_array($data);

$foto = $row['foto'];
if(file_exists('../../file/'.$foto)){
    unlink('../../file/'. $foto);
};


mysqli_query($conn,"DELETE FROM tb_barang WHERE id_barang='$id'");
header('Location: ../barang.php');
?>