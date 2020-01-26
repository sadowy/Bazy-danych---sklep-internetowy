<?php
session_start();
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

  <!--About us -->
  <div class="container mt-4" style="text-align: center;">
    <p>Projekt wykonany na przedmiot Bazy danych 2.</p>
    <p>Wykonali: Artur Rogowski, Filip Górny, Mikołaj Grzegrzółka, Jakub Sadowy.</p>
  </div>
   <h5 class="card-title" style="color: white"><center>Jesteśmy dokładnie TUTAJ! <br />
  Gruszka.NET, jak się patrzy ;) </center></h5> 
  
 <center> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d323.99501416505797!2d15.682011640470707!3d50.86501436358055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf43a7f25752061e!2sPolitechnika%20Wroc%C5%82awska.%20Wydzia%C5%82%20Techniczno-Informatyczny.!5e0!3m2!1spl!2spl!4v1579215793392!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</center>

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
