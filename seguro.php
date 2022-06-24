<!DOCTYPE html>
<html lang="en">

<head>
  <title>Seguro de Viagens</title>
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


        <div class="card w-75 row mb-2">
          <div class="card-body">
            <h5 class="card-title">Pacote Travel</h5>
            <p class="card-text">Seguro básico, com a proteção de bagagens</p>
            <ul>
              <li class="card-text">Proteção Covid-19 incluida</li>
              <li class="card-text">Despesas médicas e medicamentos</li>
              <li class="card-text">Bagagem</li>
            </ul>
            <a href="formSeguro.php" class="btn btn-primary">Comprar: 29,99€</a>
          </div>
        </div>

        <div class="card w-75 row mb-2">
          <div class="card-body">
            <h5 class="card-title">Pacote Travel Plus</h5>
            <p class="card-text">Seguro que contem cancelamento ou interrupção da viagem</p>
            <ul>
              <li class="card-text">Proteção Covid-19 incluida</li>
              <li class="card-text">Despesas médicas e medicamentos</li>
              <li class="card-text">Bagagem</li>
              <li class="card-text">Imprevistos em viagem como cancelamento e despesas por atraso no voo</li>
            </ul>
            <a href="formSeguro.php" class="btn btn-primary">Comprar: 34,99</a>
          </div>
        </div>
        <div class="card w-75 row mb-2">
          <div class="card-body">
            <h5 class="card-title">Pacote Travel Ultra</h5>
            <p class="card-text">Seguro que contem toda a segurança e tranqualidade</p>
            <ul>
              <li class="card-text">Proteção Covid-19 incluida</li>
              <li class="card-text">Despesas médicas e medicamentos</li>
              <li class="card-text">Bagagem</li>
              <li class="card-text">Imprevistos em viagem como cancelamento e despesas por atraso no voo</li>
              <li class="card-text">Cancelamento positivo Covid-19</li>
            </ul>
            <a href="formSeguro.php" class="btn btn-primary">Comprar: 39,99</a>
          </div>
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