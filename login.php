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
session_start();
if (isset($_SESSION['authenticated'])) {
    header('Location: private.php');
    exit(0);
} ?>

<form action="auth.php" method="post">
        <div><label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div><label for="pass">Password:</label>
        <input type="password" name="pass" id="pass"></div>
        <div><input type="submit" value="Login"></div>
    </form>
    <?php
    if (isset($_SESSION['errors'])) {
        echo "<div>Errors:";
        foreach ($_SESSION['errors'] as $field => $error)
            echo "<p>$field: $error</p>";
        echo "</div>";
    } ?>
</body>
</html>