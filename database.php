<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $host = "localhost";
    $database = "ViagemBerlim";
    $user = "root";
    $pass = "";
    $conn = new mysqli($host, $user, $pass, $database);
    $conn->set_charset("UTF8");
    if ($conn->connect_errno) {
        $code = $conn->connect_errno;
        $message = $conn->connect_error;
        printf("<p>Connection error: %d %s</p>", $code, $message);
    }
?>
</body>
</html>