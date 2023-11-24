<?php
include('../../conn.php');
$id_history = $_GET['id_history'];

mysqli_query($conn,"DELETE FROM history_lelang WHERE id_history='$id_history'");
header('Location: ../penawaran.php');
?>