<?php

  session_start();
  
  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  if ($polaczenie->connect_errno!=0)
  {
    echo "Error: ".$polaczenie->connect_errno;
  }
  else if ($_POST['mail'] == "admin@gruszka.net" && $_POST['password'] == "admin" )
  {
    $sql = "SELECT * FROM użytkownicy WHERE mail='admin@gruszka.net' AND password='admin'";
    if ($rezultat = @$polaczenie->query($sql))
      {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {

      //sesja admina
      $_SESSION['admin'] = true;

      $wiersz = $rezultat->fetch_assoc();
      $_SESSION['id'] = $wiersz['id'];
      $_SESSION['mail'] = $wiersz['mail'];

      unset($_SESSION['blad']);
      $rezultat->free_result();
      header('Location: loggedin.php');

        }
      }
      $polaczenie->close();
  }
  else 
  {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM użytkownicy WHERE mail='$mail' AND password='$password'";

    if ($rezultat = @$polaczenie->query($sql))
      {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
          //sesja uzytkownika
          $_SESSION['zalogowany'] = true;

       

          $wiersz = $rezultat->fetch_assoc();
          $_SESSION['id'] = $wiersz['id'];
          $_SESSION['mail'] = $wiersz['mail'];

          unset($_SESSION['blad']);
          $rezultat->free_result();
          header('Location: loggedin.php');
          
        }
        else
        {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło.</span>';
            header('Location: logowanie.php');
        }
      }

    $polaczenie->close();
  }


?>

<!DOCTYPE html>
<html lang="pl">

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
      <a class="navbar-brand" href="index.php" style="font-size: 3ch;">
        <img class="img-fluid" width="30" height="30" src="logo.png">
        Gruszka.net
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Sklep
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="onas.php">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">######</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="koszyk.php"><i class="fas fa-shopping-cart"></i></a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!--Kontakt info -->
  <div class="container">
      <br>
    <p>aaa</p>
  </div>

  <!-- Footer -->
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
