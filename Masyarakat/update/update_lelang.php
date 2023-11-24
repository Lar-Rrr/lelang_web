<?php
include('../../conn.php');

$id_history = $_POST['id_history'];
$penawaran_harga = $_POST['penawaran_harga'];




$query =mysqli_query($conn,"UPDATE history_lelang SET id_history='$id_history', penawaran_harga='$penawaran_harga' WHERE id_history ='$id_history'");

header('Location:../penawaran.php');


