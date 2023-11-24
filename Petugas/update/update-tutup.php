<?php
include('../../conn.php');

$id_lelang = $_POST['id_lelang'];
$status = $_POST['status'];
$id_user = $_POST['id_user'];
$harga_akhir = $_POST['harga_akhir'];


$query =mysqli_query($conn,"UPDATE tb_lelang SET status='$status', id_user='$id_user', harga_akhir='$harga_akhir' WHERE id_lelang='$id_lelang'");

header('Location:../aktivasi.php');


