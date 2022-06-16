<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: ../login.php');
    exit(0);
}

require_once '../conecao.php';
$query = "SELECT * FROM hotel ORDER BY id_hotel";
$result = mysqli_query($conn, $query);
$resultt = mysqli_query($conn, $query);

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
                                <h4 class="header-title ">Hotéis</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Localicação</th>
                                                    <th scope="col">quartos</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_object()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row->id_hotel . "</td><td>" . $row->nome . "</td>";
                                                    echo "<td>" . $row->localizacao . "</td><td>" . $row->quartos . "</td>";
                                                    echo "<td><a href='edithotel.php?id_hotel=$row->id_hotel' class='text-secondary' name='edit'><i class='ti-pencil-alt'></i></a></td>";
                                                    echo "<td><a href='deletehotel.php?id_hotel=$row->id_hotel' class='text-danger' name='delete'><i class='ti-trash'></i></a></td>";
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
                    <?php
                    while ($row = $resultt->fetch_object()) {
                        $foto = $row->foto_hotel;
                        if ($foto == null) {
                            $foto = '../uploads/defaulthotel.jpg';
                        }
                    ?>
                        <div class='col-sm-3 mt-5'>
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">ID: <?php echo $row->id_hotel ?></p>
                                    <img src="<?php echo $foto ?>" class="card-img-top" alt="Image">
                                    <h5 class="card-title"><?php echo $row->nome ?></h5>
                                    <p class="card-text">Localização: <?php echo $row->localizacao ?></p>
                                    <a href='edithotel.php?id_hotel=<?php echo $row->id_hotel ?>' class='btn btn-secondary btn-sm' name='edit'>Editar</a>
                                    <a href='deletehotel.php?id_hotel=<?php echo $row->id_hotel ?>' class='btn btn-danger btn-sm' name='delete'>Eliminar</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
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