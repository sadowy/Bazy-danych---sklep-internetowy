<?php
session_start();
require('classes/product.php');
require_once "logic/connect.php";

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

<?php include "static/header.php" ?>
<?php include "static/addedReviewAlert.php" ?>
<?php include "static/addedToCartAlert.php" ?>

  <!--Produkty -->
  <div class="container">

    <div class="row">
      <!--Kategorie-->
      <?php include "static/categories.php" ?>
      <script>
        document.getElementById('tvCategory').className = "list-group-item active"; 
      </script>
      <!--Produkty-->
      <div class="col-lg-9">
        <?php
          $queryProducts = "SELECT * FROM products WHERE CategoryID = 2";
          include('static/products.php');
        ?>
      </div> 
      
    </div>
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
