<?php
session_start();
require_once '../conecao.php';
$IDcliente = $_GET["IDcliente"];
$query = "DELETE FROM cliente WHERE IDcliente='$IDcliente'";
$result = mysqli_query($conn, $query);
/* $foto =$result->fetch_Object();
unlink("uploads/" . $foto->foto); */
header("location: dashboardSeguro.php");
?>