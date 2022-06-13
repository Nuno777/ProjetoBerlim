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
          <h2>Hotéis</h2>
          <ol>
            <li><a href="index.php">Início</a></li>
            <li>Hotéis</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <?php
          while ($row = $result->fetch_object()) {
            //$fotohotel = $row->foto;
            echo "<div class='col-sm-3'>";
            echo "<div class='card' style='width: 18rem;'>";
            echo "<img class='' alt='Image'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row->nome . "</h5>";
            echo "<p class='card-text'>" . $row->localizacao . "</p>";
            echo "<a href='#' class='btn btn-primary'>Contactar</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            /*echo "<div class='col-sm-4'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $row->nome . "</h5>";
            echo "<p class='card-text'>Localização: " . $row->localizacao . "</p>";
            echo "<a href='#' class='btn btn-primary'>Contactar</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";*/
          }
          ?>
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