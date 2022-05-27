<?php
require_once 'conecao.php';
$query = "SELECT * FROM hotel";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hotéis</title>
  <?php
  require_once 'head.php';
  ?>
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center">
    <?php
    require_once 'navbar.php';
    ?>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
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
        <div class="row">

          <table class="table text-center">
            <thead class="text-uppercase bg-dark">
              <tr class="text-white">
                <th scope="col">Primeiro Nome</th>
                <th scope="col">Ultimo Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Rua</th>
                <th scope="col">Localidade</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              require 'conecao.php';
              $sql = "SELECT * FROM cliente";
              $result = mysqli_query($conn, $sql);
              while ($row = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $row->nome_primeiro . "</td><td>" . $row->nome_ultimo . "</td>";
                echo "<td>" . $row->email . "</td><td>" . $row->rua . "</td><td>" . $row->localidade . "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer">
    <?php
    require_once 'footer.php';
    ?>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>