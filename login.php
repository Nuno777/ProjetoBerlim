<?php
session_start();

require_once 'conecao.php';
if (isset($_POST['login'])) {
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password = hash('sha512', $password); //segurança
    $sql = "SELECT * FROM adm WHERE email='$email' AND pass='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        $_SEESION['message'] = "Login com sucesso.";
        $_SEESION['email'] = $email;
        $_SEESION['password'] = $password;
        header("location: dashboard.php");
    } else {
        $_SEESION['message'] = "Email ou Password incorreta, tente novamente.";
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assetsAdmin/images/icon/favicon.ico">
    <link rel="stylesheet" href="assetsAdmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsAdmin/css/font-awesome.min.css">
    <link rel="stylesheet" href="assetsAdmin/css/themify-icons.css">
    <link rel="stylesheet" href="assetsAdmin/css/metisMenu.css">
    <link rel="stylesheet" href="assetsAdmin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assetsAdmin/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assetsAdmin/css/typography.css">
    <link rel="stylesheet" href="assetsAdmin/css/default-css.css">
    <link rel="stylesheet" href="assetsAdmin/css/styles.css">
    <link rel="stylesheet" href="assetsAdmin/css/responsive.css">
    <script src="assetsAdmin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    </header>
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="auth.php" enctype="multipart/form-data">
                    <div class="login-form-head">
                        <h4>Admin Dashboard</h4>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-gp">
                            <label for="">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="submit-btn-area">
                            <button id="login" name="login" type="submit">Login</button>
                        </div>
                        <div class="form-footer text-center mt-4">
                            <p class="text-muted">Voltar ao<a href="index.php">início</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="assetsAdmin/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assetsAdmin/js/popper.min.js"></script>
    <script src="assetsAdmin/js/bootstrap.min.js"></script>
    <script src="assetsAdmin/js/owl.carousel.min.js"></script>
    <script src="assetsAdmin/js/metisMenu.min.js"></script>
    <script src="assetsAdmin/js/jquery.slimscroll.min.js"></script>
    <script src="assetsAdmin/js/jquery.slicknav.min.js"></script>
    <script src="assetsAdmin/js/plugins.js"></script>
    <script src="assetsAdmin/js/scripts.js"></script>
</body>

</html>