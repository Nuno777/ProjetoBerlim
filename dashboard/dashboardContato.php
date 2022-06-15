<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: ../login.php');
    exit(0);
}

require_once '../conecao.php';
$query = "SELECT * FROM contatos ORDER BY id_cont";
$result = mysqli_query($conn, $query);
$resultMenssage = mysqli_query($conn, $query);
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
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Contactos</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Assunto</th>
                                                    <th scope="col">Ver Mensagem</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_object()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row->id_cont . "</td><td>" . $row->email . "</td>";
                                                    echo "<td>" . $row->nome . "</td><td>" . $row->telefone . "</td>";
                                                    echo "<td>" . $row->assunto . "</td>";
                                                    echo "<td><a data-toggle='modal' data-target='#viewmensagem$row->id_cont' class='text-primary' name='Menssage'><i class='ti-comment-alt'></i></a></td>";
                                                    echo "<td><a href='editcontato.php?id_cont=$row->id_cont' class='text-secondary' name='edit'><i class='ti-pencil-alt'></i></a></td>";
                                                    echo "<td><a href='deletecontato.php?id_cont=$row->id_cont' class='text-danger' name='delete'><i class='ti-trash'></i></a></td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php while ($row = $resultMenssage->fetch_object()) { ?>
        <div class="modal fade" id='viewmensagem<?php echo $row->id_cont ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5><span class="span-contat">ID <?php echo $row->id_cont; ?></span>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo $row->mensagem;
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <?php
                        echo  "<a  href='editcontato.php?id_cont=$row->id_cont' type='button' class='btn btn-primary'>Editar</a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php

    } ?>
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