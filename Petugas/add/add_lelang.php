<?php
include('../../conn.php');

$id_barang = $_POST['id_barang'];
$tgl_lelang = date('Y-m-d');
$id_petugas = $_POST['id_petugas'];



mysqli_query($conn,"INSERT INTO tb_lelang VALUES('','$id_barang','$tgl_lelang','','','$id_petugas','')");
header('Location: ../aktivasi.php');