<?php
include('../../conn.php');

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];


$query = mysqli_query($conn,"INSERT INTO tb_petugas (nama_petugas,username,password,id_level) VALUES('$nama_petugas','$username','$password','$id_level')");
header('Location: ../petugas.php');