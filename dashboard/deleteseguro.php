<?php
session_start();
require_once '../conecao.php';
$IDcliente = $_GET["IDcliente"];
$email = $_GET["email"];
$query = "DELETE FROM cliente WHERE IDcliente='$IDcliente'";
$result = mysqli_query($conn, $query);
// Definir Alerta - Operações (DELETE) 
if ($conn->affected_rows > 0) {
    $_SESSION["message"] = array(
        "content" => "O seguro do email <b>" . $email . "</b> foi eliminado com sucesso!",
        "type" => "success",
    );
} else {
    $_SESSION["message"] = array(
        "content" => "Ocorreu um erro ao eliminar o seguro do email <b>" . $email . "</b>!",
        "type" => "danger",
    );
}
header("location: dashboardSeguro.php");
