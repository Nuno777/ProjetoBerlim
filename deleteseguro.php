<?php
session_start();
require_once 'conecao.php';
$IDcliente = $_GET["IDcliente"];
$query = "DELETE FROM Cliente WHERE IDcliente='$IDcliente'";
$result = mysqli_query($conn, $query);
header("location: dashboardSeguro.php");
?>