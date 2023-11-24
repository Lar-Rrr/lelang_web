<?php
include('../../conn.php');

$id_lelang = $_POST['id_lelang'];
$status = $_POST['status'];


$query =mysqli_query($conn,"UPDATE tb_lelang SET status='$status' WHERE id_lelang='$id_lelang'");

header('Location:../aktivasi.php');


