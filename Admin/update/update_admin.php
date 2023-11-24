<?php
include('../../conn.php');

$id = $_POST['id_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];




$query =mysqli_query($conn,"UPDATE tb_petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', id_level='$id_level' WHERE id_petugas ='$id'");

header('Location:../petugas.php');


