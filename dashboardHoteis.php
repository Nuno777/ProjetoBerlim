<?php
session_start();
if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    exit(0);
}

require_once 'conecao.php';
$query = "SELECT * FROM hotel";
$result = mysqli_query($conn, $query);

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
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

<body class="body-bg">
    <div class="horizontal-main-wrapper">
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="index.php">Início</a></li>
                                    <li><span>Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 clearfix text-right">
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="m-3">
                                <a class="btn btn-primary" href="logout.php">
                                    <h6>Logout</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="dashboard.php"><span>Dashboard</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><span>Monumentos</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><span>Hotéis & Restaurantes</span></a>
                                        <ul class="submenu">
                                            <li><a href="#">Hotéis</a></li>
                                            <li><a href="">Restaurantes</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><span>Transportes</span></a>
                                        <ul class="submenu">
                                            <li><a href="">Transportes Públicos</a></li>
                                            <li><a href="">Seguro de Viagens</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><span>Eventos</span></a>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="javascript:void(0)"><span>Contato</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Hotéis</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
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
                                                    echo "<td>" . $row->localicacao . "</td><td>" . $row->quartos . "</td>";
                                                    echo "<td><a href='edithotel.php?id=$row->id_hotel' name='edit'><i class='ti-pencil-alt'></i></a></td>";
                                                    echo "<td><a href='deletehotel.php?id=$row->id_hotel' name='delete'><i class='ti-trash'></i></a></td>";
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