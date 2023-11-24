<?php
include('../../conn.php');

$nama_brg = $_POST['nama_brg'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_brg = $_POST['deskripsi_brg'];

$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, '../../file/'.$foto);



$query = mysqli_query($conn,"INSERT INTO tb_barang (nama_barang,tgl,harga_awal,deskripsi_barang,foto) VALUES('$nama_brg','$tgl','$harga_awal','$deskripsi_brg','$foto')");
header('Location: ../barang.php');

?>