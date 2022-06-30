<?php
require_once 'conecao.php';
$prinome = array_key_exists('prinome', $_POST) ? $_POST['prinome'] : "";
$ultnome = array_key_exists('ultnome', $_POST) ? $_POST['ultnome'] : "";
$email = array_key_exists('email', $_POST) ? $_POST['email'] : "";
$rua = array_key_exists('rua', $_POST) ? $_POST['rua'] : "";
$localidade = array_key_exists('localidade', $_POST) ? $_POST['localidade'] : "";
$postal = array_key_exists('postal', $_POST) ? $_POST['postal'] : "";
$nif = array_key_exists('nif', $_POST) ? $_POST['nif'] : "";
$pacote = array_key_exists('pacote', $_POST) ? $_POST['pacote'] : "";
$msg_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($prinome == "" || $ultnome == "" || $email == "" || $rua == "" || $localidade == "" || $postal == "" || $nif == "")
        $msg_erro = "Campos não preenchidos";
    else {
        if ($conn->connect_errno) {
            $code = $conn->connect_errno;
            $message = $conn->connect_error;
            $msg_erro = "Falha na ligação à BaseDados ($code $message)!";
        } else {

            $query = "INSERT INTO `cliente` (`nome_primeiro`, `nome_ultimo` , `email`, `rua`, `localidade`, `cpostal`, `nif`,`pacote`) VALUES ('$prinome', '$ultnome', '$email', '$rua', '$localidade', '$postal', '$nif','$pacote')";

            $queryseguro = $conn->query($query);
            if ($queryseguro) {
                header("Location: seguro.php");
                exit(0);
            } else {
                $code = $conn->errno;
                $message = $conn->error;
                $msg_erro = "Falha na query! ($code $message)";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Seguro de Viagens</title>
    <?php
    require_once 'head.php';
    ?>
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center">
        <?php
        require_once 'navbar.php';
        ?>
    </header>

    <main id="main">

        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Seguro de Viagens</h2>
                    <ol>
                        <li><a href="index.php">Início</a></li>
                        <li>Seguro de Viagens</li>
                    </ol>
                </div>

            </div>
        </section>

        <section class="inner-page">
            <div class="container">
                <form id="seguro" action="formSeguro.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <div class="col-md-6" id="prinome-container">
                        <label for="prinome" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" id="prinome" name="prinome" minlength="3" maxlength="15" required>
                        <div id="validarfeed" class="invalid-feedback invalid-prinome">
                        </div>
                    </div>

                    <div class="col-md-6" id="ultnome-container">
                        <label for="ultnome" class="form-label">Ultimo Nome</label>
                        <input type="text" class="form-control" id="ultnome" name="ultnome" minlength="3" maxlength="15" required>
                        <div id="validarfeed" class="valid-feedback invalid-ultnome">
                        </div>
                    </div>

                    <div class="col-md-12" id="email-container">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" pattern="^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$" required>
                        <div id="validarfeed" class="invalid-feedback invalid-email">
                        </div>
                    </div>

                    <div class="col-md-12" id="rua-container">
                        <label for="rua" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="rua" name="rua" minlength="5" maxlength="120" required>
                        <div id="validarfeed" class="valid-feedback invalid-rua">
                        </div>
                    </div>

                    <div class="col-md-6" id="localidade-container">
                        <label for="localidade" class="form-label">Localidade</label>
                        <input type="text" class="form-control" id="localidade" name="localidade" minlength="3" maxlength="25" required>
                        <div id="validarfeed" class="valid-feedback invalid-localidade">
                        </div>
                    </div>

                    <div class="col-md-6" id="postal-container">
                        <label for="postal" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="postal" name="postal" placeholder="0000-000" pattern="^\d{4}-\d{3}" maxlength="8" required>
                        <div id="validarfeed" class="invalid-feedback invalid-postal">
                        </div>
                    </div>

                    <div class="col-md-6" id="nif-container">
                        <label for="nif" class="form-label">NIF</label>
                        <input type="text" class="form-control" id="nif" name="nif" minlength="9" maxlength="9" required>
                        <div id="validarfeed" class="valid-feedback invalid-nif">
                        </div>
                    </div>

                    <div class="col-md-6" id="pacote-container">
                        <label for="pacote" class="form-label">Pacote</label>
                        <select class="form-select" id="pacote" name="pacote">
                            <option selected value="Travel">Travel</option>
                            <option value="Travel Plus">Travel Plus</option>
                            <option value="Travel Ultra">Travel Ultra</option>
                        </select>
                    </div>

                    <div class="col-md-1">
                        <button class="btn btn-primary w-100" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>

    </main>

    <footer id="footer">
        <?php
        require_once 'footer.php';
        ?>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/main.js"></script>

</body>

</html>