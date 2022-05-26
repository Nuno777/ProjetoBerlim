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
    session_start();
    if (!isset($_SESSION['authenticated'])) {
        header('Location: login.php');
        exit(0);
    }

    printf(
        '<p>Welcome %s, <a href="logout.php">Logout</a></p>',
        $_SESSION['email']
    );
    echo "<p>Session id:" . session_id() . "</p>";

    require 'database.php';
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);
    $num_rows = $result->num_rows;

    if ($result) {
        if ($num_rows > 0) {
            echo "<table border=1><tr><th>Primeiro Nome</th><th>Último Nome</th><th>Email</th><th>Rua</th><th>Localidade</th><th></th></tr>";

            while ($row = $result->fetch_object()) {
                echo "<tr><td>$row->nome_primeiro</td><td>$row->nome_ultimo</td><td>$row->email</td><td>$row->rua</td><td>$row->localidade</td><td><a href=''>editar</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Não foram encontrados dados<p>";
        }
    }
    ?>

</html>
</body>