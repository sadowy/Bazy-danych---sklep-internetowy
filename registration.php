<?php 
include('logic/registrationServer.php');

?>

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
  <?php include "static/header.php" ?>

  <!--Register form -->
  <div class="container col-4" style="margin-top: 3%; margin-bottom: 3%;" >
    <form action="logic/registrationServer.php" method="post">
      <?php include('logic/errors.php') ?>
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
            <input type="checkbox" id="check"> 
            <label for="check"> Akceptuję <a href="RULES PAGE"><b>regulamin</b></a></label>
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
