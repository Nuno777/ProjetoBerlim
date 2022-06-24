<?php
session_start();
require_once '../conecao.php';
$id_hotel = $_GET["id_hotel"];
$nome = $_GET["nome"];
$query = "DELETE FROM hotel WHERE id_hotel='$id_hotel'";
$result = mysqli_query($conn, $query);
/* $foto =$result->fetch_Object();
unlink("uploads/" . $foto->foto); */

  // Definir Alerta - Operações (NEW) 
  if ($conn->affected_rows > 0) {
    $_SESSION["message"] = array(
        "content" => "O post do hotel <b>" . $nome . "</b> foi eliminado com sucesso!",
        "type" => "success",
    );
} else {
    $_SESSION["message"] = array(
        "content" => "Ocorreu um erro ao eliminado o post do hotel <b>" . $nome . "</b>!",
        "type" => "danger",
    );
}
header("location: dashboardHoteisList.php");
?>