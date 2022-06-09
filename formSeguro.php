<?php
require_once 'conecao.php';
$prinome = array_key_exists('prinome', $_POST) ? $_POST['prinome'] : "";
$ultnome = array_key_exists('ultnome', $_POST) ? $_POST['ultnome'] : "";
$email = array_key_exists('email', $_POST) ? $_POST['email'] : "";
$rua = array_key_exists('rua', $_POST) ? $_POST['rua'] : "";
$localidade = array_key_exists('localidade', $_POST) ? $_POST['localidade'] : "";
$postal = array_key_exists('postal', $_POST) ? $_POST['postal'] : "";
$nif = array_key_exists('nif', $_POST) ? $_POST['nif'] : "";
$msg_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($prinome == "" || $ultnome == "" || $email == "" || $rua == "" || $localidade == "" || $postal == "" || $nif == "")
        $msg_erro = "Campos não preenchidos";
    else {
        require_once 'conecao.php';
        if ($conn->connect_errno) {
            $code = $conn->connect_errno;
            $message = $conn->connect_error;
            $msg_erro = "Falha na ligação à BaseDados ($code $message)!";
        } else {
            // descontaminar variáveis
            $prinome = $conn->real_escape_string($prinome);
            $ultnome = $conn->real_escape_string($ultnome);
            $email = $conn->real_escape_string($email);
            $rua = $conn->real_escape_string($rua);
            $localidade = $conn->real_escape_string($localidade);
            $postal = $conn->real_escape_string($postal);
            $nif = $conn->real_escape_string($nif);

            /* 2: executar query... */
            $query = "INSERT INTO Cliente (nome_primeiro, nome_ultimo, email, rua, localidade, cpostal, nif) VALUES ('$prinome', '$ultnome', '$email', '$rua', '$localidade', $postal', $nif')";

            $sucesso_query = $conn->query($query);
            if ($sucesso_query) {
                header("Location: seguro.php");
                exit(0);
            } else {
                $code = $conn->errno; // error code of the most recent operation
                $message = $conn->error; // error message of the most recent op.
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
                <form id="cont" action="contato.php" method="POST" class="row g-3" enctype="multipart/form-data">

                    <div class="col-md-6" id="prinome-container">
                        <label for="prinome" class="form-label">Primeiro Nome</label>
                        <input type="text" class="form-control" id="prinome" name="prinome" required>
                        <div id="validarfeed" class="invalid-feedback invalid-name">
                        </div>
                    </div>

                    <div class="col-md-6" id="tel-container">
                        <label for="tel" class="form-label">Ultimo Nome</label>
                        <input type="text" maxlength="9" class="form-control" id="tel" name="tel" required>
                        <div id="validarfeed" class="valid-feedback invalid-telefone">
                        </div>
                    </div>

                    <div class="col-md-12" id="email-container">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div id="validarfeed" class="invalid-feedback invalid-email">
                        </div>
                    </div>

                    <div class="col-md-12" id="assunto-container">
                        <label for="assunto" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="assunto" name="assunto" required>
                        <div id="validarfeed" class="valid-feedback invalid-assunto">
                        </div>
                    </div>

                    <div class="col-md-12" id="assunto-container">
                        <label for="assunto" class="form-label">Localidade</label>
                        <input type="text" class="form-control" id="assunto" name="assunto" required>
                        <div id="validarfeed" class="valid-feedback invalid-assunto">
                        </div>
                    </div>

                    <div class="col-md-6" id="name-container">
                        <label for="nome" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="0000-000" pattern="^\d{4}-\d{3}" maxlength="8" required>
                        <div id="validarfeed" class="invalid-feedback invalid-name">
                        </div>
                    </div>

                    <div class="col-md-6" id="tel-container">
                        <label for="tel" class="form-label">NIF</label>
                        <input type="text" maxlength="9" class="form-control" id="tel" name="tel" required>
                        <div id="validarfeed" class="valid-feedback invalid-telefone">
                        </div>
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