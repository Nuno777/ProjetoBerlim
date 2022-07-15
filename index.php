<!DOCTYPE html>
<html lang="en">

<head>
  <title>Berlim</title>
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

  <section id="hero" class="d-flex flex-column justify-content-center
      align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Bem-vindo a Berlim</h1>
      <h2>Planeia o que vai visitar em Berlim</h2>
      <a href="#Hotéis_Restaurantes" class="btn-get-started scrollto">Iniciar</a>
    </div>
  </section>

  <main id="main">

    <section id="Hotéis_Restaurantes" class="about">
      <div class="container">
        <div class="row">
          <div class="section-title" data-aos="fade-up">
            <h2>Hotéis</h2>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <p class="card-text">Quer conhecer um pouco mais sobre os vários hotéis disponíveis.</p>
                  <p class="card-text">Temos vários hotéis que podem agradar para si, basta ir na aba <b>Hotéis</b> ou então clicar no botão em baixo!</p>
                  <a href="hotel.php" class="btn btn-outline-primary">Visitar Hotéis</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="seguro" class="services section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Seguros de Viagens</h2>
        </div>
        <div class="row">

          <div class="col-md-4  d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <h4 class="title">Pacote Travel</h4>
              <p class="description">Seguro básico, com a proteção de bagagens.</p>
              <p class="description">Inclui proteção contra Covid-19 e despesas médicas, quer saber mais <a href="seguro.php">clique aqui</a>.</p>
            </div>
          </div>

          <div class="col-md-4  d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <h4 class="title">Pacote Travel Plus</h4>
              <p class="description">Seguro que contem cancelamento ou interrupção da viagem.</p>
              <p class="description">Inclui proteção contra Covid-19, despesas médicas e cancelamento de voos, quer saber mais <a href="seguro.php">clique aqui</a>.</p>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <h4 class="title">Pacote Travel Ultra</h4>
              <p class="description">Seguro que contem toda a segurança e tranqualidade.</p>
              <p class="description">Inclui proteção contra Covid-19, despesas médicas, cancelamento de voos e reembolso de o voo apos ter dado positivo a Covid-19, quer saber mais <a href="seguro.php">clique aqui</a>.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="steps" class="steps ">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Eventos</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-in">
            <h4>Berliner Filmfestspiele</h4>
            <p>Berliner Filmfestspiele, chama artistas de todo o mundo para o grande festival de cinema . <br>É um evento espetacular, <a href="eventos.php">clica para saber mais.</a></p>
          </div>
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-in" data-aos-delay="100">
            <h4>Festival das Luzes</h4>
            <p>Festival das Luzes, vários edifícios da cidade ficam iluminados. <br> É um evento espetacular, <a href="eventos.php">clica para saber mais.</a></p>
          </div>
          <div class="col-lg-4 col-md-6 content-item" data-aos="fade-in" data-aos-delay="100">
            <h4>Grüne Woche</h4>
            <p>Grüne Woche, “Semana Verde” e uma feira agrícola e tem ênfase na gastronomia. <br>É um evento espetacular, <a href="eventos.php">clica para saber mais.</a></p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer">
    <?php
    require_once 'footer.php';
    ?>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center
  justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>