<?php
require_once 'conecao.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contato</title>
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
          <h2>Contato</h2>
          <ol>
            <li><a href="index.php">Início</a></li>
            <li>Contato</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">support@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">913455033</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Phone</h5>
                <p class="card-text">913455033</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <form id="form" action="" method="post" class="row g-3">
          <div class="col-md-6" id="name-container">
            <label for="nome" class="form-label">Primeiro
              Nome</label>
            <input type="text" class="form-control" id="nome">
            <div id="validarfeed" class="invalid-feedback invalid-name">
            </div>

          </div>
          <div class="col-md-6" id="apelido-container">
            <label for="apelido" class="form-label">Ultimo
              Nome</label>
            <input type="text" class="form-control" id="apelido">
            <div id="validarfeed" class="invalid-feedback invalid-apelido">
            </div>
          </div>
          <div class="col-md-12" id="email-container">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
            <div id="validarfeed" class="invalid-feedback invalid-email">
            </div>
          </div>
          <div class="col-md-12" id="endereco-container">
            <label for="endereco" class="form-label">Endereço <span class="span-contat">(opcional)</span></label>
            <input type="text" class="form-control" id="endereco">
            <div id="validarfeed" class="valid-feedback invalid-endereco">
            </div>
          </div>
          <div class="col-md-6" id="gen-container">
            <label for="gen" class="form-label">Genero</label>
            <select class="form-select" id="gen">
              <option selected disabled value="escolha">Escolha</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
              <option value="outro">Outro</option>
            </select>
            <div id="validarfeed" class="invalid-feedback invalid-genero">
            </div>
          </div>
          <div class="col-md-6" id="tel-container">
            <label for="tel" class="form-label">Telemovel <span class="span-contat">(opcional)</span></label>
            <input type="tel" maxlength="9" class="form-control" id="tel">
            <div id="validarfeed" class="valid-feedback invalid-telefone">
            </div>
          </div>
          <div class="col-md-12" id="mensagem-container">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" id="mensagem"></textarea>
            <div id="validarfeed" class="invalid-feedback invalid-mensagem">
            </div>
          </div>
          <div class="col-md-12">
            <button class="btn btn-primary w-100" type="submit">Enviar</button>
          </div>
        </form>
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