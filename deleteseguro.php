<?php
session_start();
require_once 'conecao.php';
$email = $_GET["email"];
$query = "DELETE FROM cliente WHERE email='$email'";
$result = mysqli_query($conn, $query);
/* $foto =$result->fetch_Object();
unlink("uploads/" . $foto->foto); */
header("location: dashboardSeguro.php");
?>