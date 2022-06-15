<?php
session_start();
require_once '../conecao.php';
$id_cont = $_GET["id_cont"];
$query = "DELETE FROM contatos WHERE id_cont='$id_cont'";
$result = mysqli_query($conn, $query);
header("location: dashboardContato.php");
?>