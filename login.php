<?php
session_start();
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

  <!--Login form -->
  <div class="container col-4" style="margin-top: 5%; margin-bottom: 5%;">
      <form action="logic/loginServer.php" method="POST">
          <div class="form-group">
            <label for="emailInput">Adres e-mail</label>
            <input type="mail" class="form-control" name="mail" placeholder="Wprowadź adres e-mail">
          </div>
          
          <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" placeholder="Wprowadź hasło">
          </div>
          <button type="submit" class="btn btn-primary">Zaloguj</button>
        </form>


        <?php
        if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
        ?>

</div>
<div class="container col-4" style="margin-top: 5%; margin-bottom: 5%; text-align: center;">
  <a href="registration.php"><button class="btn btn-primary">Nie masz jeszcze konta? Zarejestruj się!</button></a>
</div>

  <!-- Footer -->
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>


</body>

</html>
