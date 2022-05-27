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

use LDAP\Result; 

session_start();
require 'database.php';
$_SESSION['errors'] = array(); // Cleanup previous errors
if (isset($_POST['email'])) $email = trim($_POST['email']);
else $email = "";
if (isset($_POST['pass'])) $password = trim($_POST['pass']);
else $password = "";
if (strlen($email) == 0)
    $_SESSION['errors']['email'] = 'Empty email';
if (strlen($password) == 0)
    $_SESSION['errors']['pass'] = 'Empty password';
if (count($_SESSION['errors']) == 0) {

    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT email,pass FROM cliente WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows != 0) {
        $password = hash('sha512', $password);

        if ($result->fetch_object()->pass == $password) {
            $_SESSION['authenticated'] = true;
            $_SESSION['email'] = $email;
            header('Location: private.php');
        } else {
            $_SESSION['errors']['auth'] = 'Email/password incorretas';
        }
    }
}

if (count($_SESSION['errors']) != 0) {
    header('Location: login.php');
    exit(0);
}
?> 
</body>
</html>