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

<div class="jumbotron bg-dark jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Skontaktuj się z nami! <small>Jeżeli masz jakiś problem ;)</small></h1>
            </div>
        </div>
    </div>
</div>

  <!--Kontakt info -->
  <div class="container">
    <br>
    <h1 class="card-title" style="color: #7d9801">Kontakt</h1>
  </div>

<!------ Kontakt Wiadomości ---------->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Imię</label>
                            <input type="text" class="form-control" id="name" placeholder="Podaj imię" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Adres Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Podaj email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Powód</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Wybierz z dostępnych:</option>
                                <option value="service">Obsługa Klienta</option>
                                <option value="suggestions">Sugestie</option>
                                <option value="product">Wsparcie i Reklamacja</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Wiadomość</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Treść Wiadomości"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Wyślij Wiadomość</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Nasze Biuro</legend>
            <address>
                <strong>Gruszka.NET</strong><br>
                Plac Piastowski 27<br>
                58-560 Jelenia Góra<br>
                <abbr title="Phone">
                    P:</abbr>
                (+48) 123-456-789
            </address>
            <address>
                <strong>Email</strong><br>
                <a href="mailto:#">gruszkaNET@op.pl</a>
            </address>
            </form>
        </div>
    </div>
</div>

  <h5 class="card-title" style="color: white"><center>Jesteśmy dokładnie TUTAJ! <br />
  Gruszka.net :) </center></h5> 
  
 <center> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d323.99501416505797!2d15.682011640470707!3d50.86501436358055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf43a7f25752061e!2sPolitechnika%20Wroc%C5%82awska.%20Wydzia%C5%82%20Techniczno-Informatyczny.!5e0!3m2!1spl!2spl!4v1579215793392!5m2!1spl!2spl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</center>

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
