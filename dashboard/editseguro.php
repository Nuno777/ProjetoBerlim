<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: ../login.php');
    exit(0);
}
require_once '../conecao.php';
if (isset($_POST["editseguro"])) {
    if ($pacote == 'Travel' || $pacote == 'Travel Plus') {
        $IDcliente = $_POST["IDcliente"];
        $prinome = $_POST["prinome"];
        $ultnome = $_POST["ultnome"];
        $email = $_POST["email"];
        $rua = $_POST["rua"];
        $local = $_POST["localidade"];
        $postal = $_POST["postal"];
        $nif = $_POST["nif"];
        $pacote = $_POST["pacote"];


        $query = "UPDATE Cliente SET nome_primeiro='$prinome',nome_ultimo='$ultnome',email='$email',rua='$rua',localidade='$local',cpostal='$postal',nif='$nif',pacote='$pacote' WHERE IDcliente='$IDcliente'";
        $result = mysqli_query($conn, $query);

        // Definir Alerta - Operações (EDITAR) 
        if ($conn->affected_rows > 0) {
            $_SESSION["message"] = array(
                "content" => "O seguro do email <b>" . $email . "</b> foi atualizado com sucesso!",
                "type" => "success",
            );
        } else {
            $_SESSION["message"] = array(
                "content" => "Ocorreu um erro ao atualizar o seguro do email <b>" . $email . "</b>!",
                "type" => "danger",
            );
        }
    }


    header('Location: dashboardSeguro.php');
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
            <?php
            $IDcliente = $_GET["IDcliente"];
            $query = "SELECT * FROM Cliente WHERE IDcliente='$IDcliente'";
            $result = mysqli_query($conn, $query);
            if ($result && $result->num_rows) {
                $row = $result->fetch_object();
                $IDcliente = $row->IDcliente;
                $prinome = $row->nome_primeiro;
                $ultnome = $row->nome_ultimo;
                $email = $row->email;
                $rua = $row->rua;
                $local = $row->localidade;
                $postal = $row->cpostal;
                $nif = $row->nif;
                $pacote = $row->pacote;
            ?>
                <div class="container">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Editar Seguro</h4>
                                <div class="single-table">
                                    <form id="editseguro" action="editseguro.php" method="POST" class="form" enctype="multipart/form-data">

                                        <input type="text" class="form-control" id="IDcliente" name="IDcliente" value="<?= $IDcliente ?>" required hidden>

                                        <div class="row mb-2">
                                            <div class="col-md-6" id="prinome-container">
                                                <label for="prinome" class="form-label">Primeiro Nome</label>
                                                <input type="text" class="form-control" id="prinome" name="prinome" value="<?= $prinome ?>" minlength="3" maxlength="15" required>
                                                <div id="validarfeed" class="invalid-feedback invalid-prinome">
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="ultnome-container">
                                                <label for="ultnome" class="form-label">Ultimo Nome</label>
                                                <input type="text" class="form-control" id="ultnome" name="ultnome" value="<?= $ultnome ?>" minlength="3" maxlength="15" required>
                                                <div id="validarfeed" class="valid-feedback invalid-ultnome">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-12" id="email-container">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" pattern="^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$" required>
                                                <div id="validarfeed" class="invalid-feedback invalid-email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-7" id="rua-container">
                                                <label for="rua" class="form-label">Morada</label>
                                                <input type="text" class="form-control" id="rua" name="rua" value="<?= $rua ?>" minlength="5" maxlength="120" required>
                                                <div id="validarfeed" class="valid-feedback invalid-rua">
                                                </div>
                                            </div>

                                            <div class="col-md-3" id="localidade-container">
                                                <label for="localidade" class="form-label">Localidade</label>
                                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?= $local ?>" placeholder="Morada | NºAndar | Porta" minlength="3" maxlength="25" required>
                                                <div id="validarfeed" class="valid-feedback invalid-localidade">
                                                </div>
                                            </div>

                                            <div class="col-md-2" id="postal-container">
                                                <label for="postal" class="form-label">Código Postal</label>
                                                <input type="text" class="form-control" id="postal" name="postal" value="<?= $postal ?>" placeholder="0000-000" pattern="^\d{4}-\d{3}" maxlength="8" required>
                                                <div id="validarfeed" class="invalid-feedback invalid-postal">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6" id="nif-container">
                                                <label for="nif" class="form-label">NIF</label>
                                                <input type="text" class="form-control" id="nif" name="nif" value="<?= $nif ?>" minlength="9" maxlength="9" required>
                                                <div id="validarfeed" class="valid-feedback invalid-nif">
                                                </div>
                                            </div>

                                            <div class="col-md-6" id="pacote-container">
                                                <label for="pacote" class="form-label">Pacote</label>
                                                <input type="text" class="form-control" id="pacote" name="pacote" value="<?= $pacote ?>" minlength="6" maxlength="12" required>
                                                <span class="span-contat"> Travel | Travel Plus | Travel Ultra</span>
                                                <div id="validarfeed" class="valid-feedback invalid-pacote">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-1 ">
                                                <button class="btn btn-primary" name="editseguro" id="editsegurobutton" type="submit" disabled>Editar</button>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="dashboardSeguro.php" class="btn btn-secondary" name="voltarseguro" type="submit">Voltar</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                echo "<script>alert('Selecione um seguro valido');window.location='dashboardSeguro.php'</script>";
            } ?>
        </div>
    </div>

    <!-- JQuery ativar botão editar -->
    <script>
        $(document).ready(function() {
            $('#editseguro').on('input change', function() {
                $('#editsegurobutton').attr('disabled', false);
            });
        })
    </script>

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