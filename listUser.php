<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berlim</title>
    <?php
    require_once 'head.php';
    ?>
</head>

<body>
    <h2>Utilizadores</h2>
    <?php
    require 'database.php';
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);
    $num_rows = $result->num_rows;

    if ($result) {
        if ($num_rows > 0) {
            echo "<table border=1><tr><th>Primeiro Nome</th><th>Último Nome</th><th>Email</th><th>Rua</th><th>Localidade</th></tr>";

            while ($row = $result->fetch_object()) {
                echo "<tr><td>$row->nome_primeiro</td><td>$row->nome_ultimo</td><td>$row->email</td><td>$row->rua</td><td>$row->localidade</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Não foram encontrados dados<p>";
        }
    }
    ?>
</body>

</html>