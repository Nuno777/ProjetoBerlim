<?php
require_once 'conecao.php';
$email = array_key_exists('email', $_POST) ? $_POST['email'] : "";
$nome = array_key_exists('nome', $_POST) ? $_POST['nome'] : "";
$tel = array_key_exists('tel', $_POST) ? $_POST['tel'] : "";
$assunto = array_key_exists('assunto', $_POST) ? $_POST['assunto'] : "";
$mensagem = array_key_exists('mensagem', $_POST) ? $_POST['mensagem'] : "";
$msg_erro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($email == "" || $nome == "" || $assunto == "" || $mensagem == "")
    $msg_erro = "Campos não preenchidos";
  else {
    if ($conn->connect_errno) {
      $code = $conn->connect_errno;
      $message = $conn->connect_error;
      $msg_erro = "Falha na ligação à BaseDados ($code $message)!";
    } else {

      $email = $conn->real_escape_string($email);
      $nome = $conn->real_escape_string($nome);
      $assunto = $conn->real_escape_string($assunto);
      $mensagem = $conn->real_escape_string($mensagem);

      $query = "INSERT INTO `contatos` (`email`, `nome`, `telefone`, `assunto`, `mensagem`) VALUES ('$email', '$nome', '$tel', '$assunto', '$mensagem')";

      $sucesso_query = $conn->query($query);
      if ($sucesso_query) {
        header("Location: contato.php");
        exit(0);
      } else {
        $code = $conn->errno;
        $message = $conn->error;
        $msg_erro = "Falha na query! ($code $message)";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contacto</title>
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
          <h2>Contactar-nos</h2>
          <ol>
            <li><a href="index.php">Início</a></li>
            <li>Contacto</li>
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
                <h5 class="card-title">Email</h5>
                <p class="card-text">supportravel@gmail.com</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Telefone</h5>
                <p class="card-text">+351 211202020</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Endereço</h5>
                <p class="card-text">Avenida do Brasil, Lisboa</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <form id="cont" action="contato.php" method="POST" class="row g-3" enctype="multipart/form-data">

          <div class="col-md-12" id="email-container">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" pattern="^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$" required>
            <div id="validarfeed" class="invalid-feedback invalid-email">
            </div>
          </div>

          <div class="col-md-6" id="name-container">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" minlength="3" maxlength="25" required>
            <div id="validarfeed" class="invalid-feedback invalid-name">
            </div>
          </div>

          <div class="col-md-6" id="tel-container">
            <label for="tel" class="form-label">Telemovel <span class="span-contat">(opcional)</span></label>
            <input type="tel" maxlength="9" class="form-control" id="tel" name="tel" pattern="^9[1236][0-9]{7}$|^2[3-9][1-9][0-9]{6}$|^2[12][0-9]{7}$">
            <div id="validarfeed" class="valid-feedback invalid-telefone">
            </div>
          </div>

          <div class="col-md-12" id="assunto-container">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto" minlength="3" maxlength="100" required>
            <div id="validarfeed" class="valid-feedback invalid-assunto">
            </div>
          </div>

          <div class="col-md-12" id="mensagem-container">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" rows="10" id="mensagem" name="mensagem" minlength="4" required></textarea>
            <div id="validarfeed" class="invalid-feedback invalid-mensagem">
            </div>
          </div>

          <div class="col-md-1">
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