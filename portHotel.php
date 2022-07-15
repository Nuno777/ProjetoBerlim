<?php
require_once 'conecao.php';
$id_hotel = $_GET["id_hotel"];
$query = "SELECT * FROM hotel WHERE id_hotel='$id_hotel'";
$res = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query);
if ($res->num_rows) {
  $row = $res->fetch_object();
  $nome = $row->nome;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $nome ?></title>
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
          <h2><?php echo $nome ?></h2>
          <ol>
            <li><a href="index.php">Início</a></li>
            <li><?php echo $nome ?></li>
          </ol>
        </div>

      </div>
    </section>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <?php
        while ($row = $result->fetch_object()) {
          $foto = $row->foto_hotel;
          $local=$row->localizacao;
          $rua=$row->rua;
          $quarto=$row->quartos;
          if ($foto == null) {
            $foto = 'uploads/defaulthotel.jpg';
          }
        ?>
          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">

                  <div class="swiper-slide">
                    <img src="<?php echo $foto ?>" alt="Image">
                  </div>

                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              
              <div class="portfolio-info">
                <ul>
                  <li><strong>Localização</strong>: <?php echo $local ?></li>
                  <li><strong>Rua</strong>: <?php echo $rua ?></li>
                  <li><strong>Tipo de Quarto</strong>: <?php echo $quarto ?></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>This is an example of portfolio detail</h2>
                <p>
                  Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                </p>
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
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>