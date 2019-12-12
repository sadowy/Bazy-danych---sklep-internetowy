<?php
  session_start();
  include "./cart.php"

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

                    <?php 
                    if  ((isset($_SESSION['zalogowany'])) || (isset($_SESSION['admin'])))
                    {
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='#' style='color: #ffffff'>";
                    echo "Witaj ".$_SESSION['mail']."";
                    echo"</a>";
                    echo "</li>";
                    }
                    else
                    {
                    
                    }
                    ?>

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

                    <?php  
                    if (isset($_SESSION['zalogowany']))
                    {  
                        echo "<li class='nav-item'><a class='nav-link' href='#'>Moje konto</a></li>";
                    }
                    else if (isset($_SESSION['admin']))
                    {
                        echo "<li class='nav-item'><a class='nav-link' href='panel_admina/paneladmina.php'>Panel admina</a></li>";
                    }
                    else
                    {

                    }
                    ?>

                
                
                

                    <?php 
                    if ((isset($_SESSION['zalogowany'])) || (isset($_SESSION['admin'])))
                    {
                    echo "<li class='nav-item'>";
                   
                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Wyloguj się</a></li>";
                    }
                    else
                    {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='logowanie.php' style='color: #ffffff'>";
                        echo "Zaloguj się";
                        echo"</a>";
                        echo "</li>";
                    }
                    ?>
            
           <a href="?a=cart" id="li-cart"><i class="fa fa-shopping-cart"></i> Koszyk (<?php echo $cart->getTotalItem(); ?>)</a>
        </ul>
      </div>
   
    
   
    
  </nav>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>


</body>

</html>
