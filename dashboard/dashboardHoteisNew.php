<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: ../login.php');
    exit(0);
}

$nome = array_key_exists('nome', $_POST) ? $_POST['nome'] : "";
$local = array_key_exists('local', $_POST) ? $_POST['local'] : "";
$rua = array_key_exists('rua', $_POST) ? $_POST['rua'] : "";
$quarto = array_key_exists('quarto', $_POST) ? $_POST['quarto'] : "";
$foto = array_key_exists('foto', $_FILES) ? $_FILES['foto']['name'] : "";
$msg_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($nome == "" || $local == "" || $rua == "")
        $msg_erro = "Campos não preenchidos";
    else {
        require_once '../conecao.php';
        if ($conn->connect_errno) {
            $code = $conn->connect_errno;
            $message = $conn->connect_error;
            $msg_erro = "Falha na ligação à BaseDados ($code $message)!";
        } else {
            $nome = $conn->real_escape_string($nome);

            $query = "INSERT INTO `hotel` (`nome`, `localizacao`, `rua`, `quartos`) VALUES ('$nome', '$local','$rua', '$quarto')";

            if ($foto != "" && getimagesize($_FILES['foto']['tmp_name'])) {
                // tratar upload da foto
                $diretoria_upload = "uploads/";
                $extensao = pathinfo($foto, PATHINFO_EXTENSION);
                $imageDatabasePath = $diretoria_upload . sha1(microtime()) . "." . $extensao;
                $newhotel_ficheiro = "../" . $imageDatabasePath;


                if (move_uploaded_file($_FILES['foto']['tmp_name'], $newhotel_ficheiro)) {
                    $query = "INSERT INTO `hotel` (`nome`, `localizacao`, `rua`, `quartos`, `foto_hotel`) VALUES ('$nome', '$local','$rua', '$quarto', '$imageDatabasePath')";
                }
            }

            $querynewhotle = $conn->query($query);
            if ($querynewhotle) {

                // Definir Alerta - Operações (NEW) 
                if ($conn->affected_rows > 0) {
                    $_SESSION["message"] = array(
                        "content" => "O post do hotel <b>" . $nome . "</b> foi criado com sucesso!",
                        "type" => "success",
                    );
                } else {
                    $_SESSION["message"] = array(
                        "content" => "Ocorreu um erro ao criado o post do hotel <b>" . $nome . "</b>!",
                        "type" => "danger",
                    );
                }
                header("Location: dashboardHoteisList.php");
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
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
    require_once 'dashboardHead.php';
    ?>
</head>

<body class="body-bg">
    <div class="horizontal-main-wrapper">
        <?php
        require_once 'dashboardNavbar.php';
        ?>

        <div class="main-content-inner">
            <div class="container">
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title ">Criar Hotel</h4>
                            <div class="single-table">
                                <form action="dashboardHoteisNew.php" id="newhotel" class="form" method="POST" enctype="multipart/form-data">

                                    <div class="row mb-2">
                                        <div class="col-md-12" class="form-input">
                                            <label for="nome">Nome do Hotel</label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o nome do hotel" value="<?= $nome ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6" class="form-input">
                                            <label for="rua">Rua do Hotel</label>
                                            <input type="text" class="form-control" id="rua" name="rua" placeholder="Escreva a rua onde se encontra o hotel" value="<?= $rua ?>" required>
                                        </div>
                                        <div class="col-md-6" class="form-input">
                                            <label for="local">Localização</label>
                                            <input type="text" class="form-control" id="local" name="local" placeholder="Escreva a localização do hotel" value="<?= $local ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6" id="quarto-container">
                                            <label for="quarto" class="form-label">Quartos</label>
                                            <select class="form-control" id="quarto" name="quarto">
                                                <option selected value="Quarto Normal">Quarto Normal</option>
                                                <option value="Quarto Duplo">Quarto Duplo</option>
                                                <option value="Suite">Suite</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" class="form-input">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" id="foto" name="foto"><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1 ">
                                            <button type="submit" class="btn btn-primary" name="newhotel">Inserir</button>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="dashboardHoteis.php" class="btn btn-secondary" name="voltarhotal" type="submit">Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="assetsAdmin/js/line-chart.js"></script>
    <script src="assetsAdmin/js/pie-chart.js"></script>
    <script src="assetsAdmin/js/bar-chart.js"></script>
    <script src="assetsAdmin/js/maps.js"></script>
    <script src="assetsAdmin/js/plugins.js"></script>
    <script src="assetsAdmin/js/scripts.js"></script>
</body>

</html>