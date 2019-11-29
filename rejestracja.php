<?php include('registrationServer.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gruszka</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html" style="font-size: 3ch;">
        <img class="img-fluid" width="30" height="30" src="logo.png">
        Gruszka.net
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Sklep
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="onas.html">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.html">Kontakt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logowanie.html">Zaloguj się</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="koszyk.html"><i class="fas fa-shopping-cart"></i></a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--Register form -->
  <div class="container col-4" style="margin-top: 3%; margin-bottom: 3%;" >
    <form action="rejestracja.php" method="post">
      <?php include('errors.php') ?>
            <div class="form-group">
            <label for="regEmail">Email</label>
            <input type="email" class="form-control" name="regEmail" id="regEmail" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regEmail">Hasło</label>
            <input type="password" class="form-control" name="regPassword" id="regPassword" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regPasswordConf">Potwierdź hasło</label>
            <input type="password" class="form-control" name="regPasswordConf" id="regPasswordConf" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regName">Imię</label>
            <input type="text" class="form-control" name="regName" id="regName" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regName2">Nazwisko</label>
            <input type="text" class="form-control" name="regName2" id="regName2" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regCity">Miasto</label>
            <input type="text" class="form-control" name="regCity" id="regCity" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regStreet">Ulica</label>
            <input type="text" class="form-control" name="regStreet" id="regStreet" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regPostal">Kod pocztowy</label>
            <input type="text" class="form-control" name="regPostal" id="regPostal" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regPhone">Telefon</label>
            <input type="tel" class="form-control" name="regPhone" id="regPhone" placeholder="" required />
        </div>
        <br>
        <div class="form-group">
            <input type="checkbox" name="rules" disabled> Akceptuję <a href="RULES PAGE"><b>regulamin</b></a>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #7d9801;border: #7d9801;">Wyślij</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
