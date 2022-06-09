<?php
require_once 'conecao.php';
$query = "SELECT nome FROM adm WHERE id";
$queryadm = mysqli_query($conn, $query);
if ($queryadm->num_rows) {
    $row = $queryadm->fetch_object();
    $adm = $row->nome;
}
?>
<div class="mainheader-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <ul class="breadcrumbs pull-left">
                            <p><?php echo "<h4>".$adm."</h4>";?></p>
                            <!-- <li><a href="index.php">Início</a></li>
                            <li><span>Dashboard</span></li> -->
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
                                <a href=""><span>Monumentos</span></a>
                            </li>
                            <li>
                                <a><span>Hotéis & Restaurantes</span></a>
                                <ul class="submenu">
                                    <li><a href="dashboardHoteis.php">Hotéis</a></li>
                                    <li><a href="">Restaurantes</a></li>
                                </ul>
                            </li>
                            <li>
                                <a><span>Transportes</span></a>
                                <ul class="submenu">
                                    <li><a href="">Transportes Públicos</a></li>
                                    <li><a href="dashboardSeguro.php">Seguro de Viagens</a></li>
                                </ul>
                            </li>
                            <li class="mega-menu">
                                <a href=""><span>Eventos</span></a>
                            </li>
                            <li class="mega-menu">
                                <a href="dashboardContato.php"><span>Contactos</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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

            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>