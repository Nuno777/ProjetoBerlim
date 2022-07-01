<?php
require_once 'conecao.php';
$q = "SELECT * FROM hotel";
$result = mysqli_query($conn, $q);
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
  </header>

  <main id="main">
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

    <!-- <section class="inner-page">
       <div class="container">
        <div class="row ">
          
            <div class='col-sm-3'>
              <div class='card'>
                <img class='card-img-top' src='<?php echo $foto ?>' alt='Image'>
                <div class='card-body'>
                  <h5 class='card-title'><?php echo $row->nome ?></h5>
                  <p class='card-text'>Localização: <?php echo $row->localizacao ?></p>
                  <a href='#' class='btn btn-primary'>Contactar</a>
                </div>
              </div>
            </div>
          
        </div>
      </div> 
    </section>-->

    <section id="portfolio" class="portfolio">
      <div class="container">
        <?php
        while ($row = $result->fetch_object()) {
          $foto = $row->foto_hotel;
          if ($foto == null) {
            $foto = 'uploads/defaulthotel.jpg';
          }
        ?>
          <div class="row portfolio-container">
            <div class='col-sm-3'>
              <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-wrap">
                  <img src="<?php echo $foto ?>" class="img-fluid" alt="Image">
                  <div class="portfolio-info">
                    <h4><?php echo $row->nome ?></h4>
                    <p>Localização: <?php echo $row->localizacao ?></p>
                    <div class="portfolio-links">
                      <a href="<?php echo $foto ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $row->nome ." <br>Localização: ". $row->localizacao?>"><i class="bx bx-plus"></i></a>
                      <a href="" title="Mais Detalhes"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
        }
          ?>
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