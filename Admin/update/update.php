<?php
include('../../conn.php');

$id = $_POST['id_barang'];
$nama_brg = $_POST['nama_brg'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_brg = $_POST['deskripsi_brg'];
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
move_uploaded_file($lokasi, '../../file/'.$foto);




$query = mysqli_query($conn, "UPDATE tb_barang SET nama_barang='$nama_brg', tgl='$tgl', harga_awal='$harga_awal', deskripsi_barang='$deskripsi_brg', foto='$foto' WHERE id_barang='$id'");

header('Location:../barang.php');


