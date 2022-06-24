<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: ../login.php');
    exit(0);
}
require_once '../conecao.php';
if (isset($_POST["edithotel"])) {
    $id_hotel = $_POST["id_hotel"];
    $nome = $_POST["nome"];
    $local = $_POST["local"];
    $rua = $_POST["rua"];
    $quarto = $_POST["quarto"];
    $query = "UPDATE hotel SET nome='$nome',localizacao='$local',rua='$rua',quartos='$quarto' WHERE id_hotel='$id_hotel'";
    $result = mysqli_query($conn, $query);

    // Definir Alerta - Operações (EDITAR) 
    if ($conn->affected_rows > 0) {
        $_SESSION["messagedit"] = array(
            "content" => "O hotel <b>" . $nome . "</b> foi atualizado com sucesso!",
            "type" => "success",
        );
    } else {
        $_SESSION["messagedit"] = array(
            "content" => "Ocorreu um erro ao atualizar o hotel <b>" . $nome . "</b>!",
            "type" => "danger",
        );
    }

    header('Location: dashboardHoteisList.php');
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
            $id_hotel = $_GET["id_hotel"];
            $query = "SELECT * FROM hotel WHERE id_hotel='$id_hotel'";
            $result = mysqli_query($conn, $query);
            if ($result && $result->num_rows) {
                $row = $result->fetch_object();
                $id_hotel = $row->id_hotel;
                $nome = $row->nome;
                $local = $row->localizacao;
                $rua = $row->rua;
                //$quarto = $row->quarto;
            ?>
                <div class="container">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Editar Post Hotel</h4>
                                <div class="single-table">
                                    <form id="edithotel" action="edithotel.php" method="POST" class="form" enctype="multipart/form-data">

                                        <input type="text" class="form-control" id="id_hotel" name="id_hotel" value="<?= $id_hotel ?>" required hidden>

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
                                                <button class="btn btn-primary" name="edithotel" id="edithotelbutton" type="submit" disabled>Editar</button>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="dashboardHoteisList.php" class="btn btn-secondary" name="voltarhotel" type="submit">Voltar</a>
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
                echo "<script>alert('Selecione um Post valido');window.location='dashboardHoteisList.php'</script>";
            } ?>
        </div>
    </div>

    <!-- JQuery ativar botão editar -->
    <script>
        $(document).ready(function() {
            $('#edithotel').on('input change', function() {
                $('#edithotelbutton').attr('disabled', false);
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