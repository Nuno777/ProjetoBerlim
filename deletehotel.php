<?php
session_start();
require_once 'conecao.php';
$id_hotel = $_GET["id_hotel"];
$query = "DELETE FROM hotel WHERE id_hotel='$id_hotel'";
$result = mysqli_query($conn, $query);
/* $foto =$result->fetch_Object();
unlink("uploads/" . $foto->foto); */
header("location: dashboardHoteis.php");
?>