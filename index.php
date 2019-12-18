<?php
session_start();
require('classes/product.php');
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

  <!--Produkty -->
  <div class="container">
  
    <div class="row">
      <?php if(isset($_SESSION['addedReview'])){
              if($_SESSION['addedReview'] == true){
                echo "<div class=\"alert alert-success col-12 mt-4\" role=\"alert\">";
                echo  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
                echo  "<span aria-hidden=\"true\">&times;</span>";
                echo  "</button>";
                echo  "<h4 class=\"alert-heading\">Udało się!</h4>";
                echo "<p>Dziękujemy za podzielenie się swoją opinią.</p>";
                echo  "</div>";
              }
              unset($_SESSION['addedReview']);
            }
              
      ?>
    
      <!--Kategorie-->
      <?php include "static/categories.php" ?>
      <script>
        document.getElementById('computersCategory').className = "list-group-item active"; 
      </script>
      <!--Produkty-->

          <div class="col-lg-9">
            <?php
              $queryProducts = "SELECT * FROM products WHERE CategoryID = 1";
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
