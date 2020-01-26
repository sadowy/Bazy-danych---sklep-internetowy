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
  <!-- Navigation -->
  <?php include "static/header.php" ?>

  <div class = "m-5 col-lg-12" style="text-align: center; color: #7d9801; font-weight: bold; font-size: 4ch;">
      Podaj adres do wysyłki
    </div>
  <!--Register form -->
  <div class="container col-4" style="margin-top: 3%; margin-bottom: 3%;" >
    <form action="logic/addOrderDetails.php" method="post">
        <div class="form-group">
            <label for="regCity">Miasto</label>
            <input type="text" class="form-control" name="orderCity" id="orderCity" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regStreet">Ulica</label>
            <input type="text" class="form-control" name="orderStreet" id="orderStreet" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regPostal">Kod pocztowy</label>
            <input type="text" class="form-control" name="orderPostal" id="orderPostal" placeholder="" required />
        </div>
        <div class="form-group">
            <label for="regPhone">Telefon</label>
            <input type="tel" class="form-control" name="orderPhone" id="orderPhone" placeholder="" required />
        </div>
        <br>
        <div class="form-check">
            <input onchange="document.getElementById('orderCity').disabled = this.checked;
                            document.getElementById('orderCity').value = '';
                            document.getElementById('orderStreet').disabled = this.checked;
                            document.getElementById('orderStreet').value = '';
                            document.getElementById('orderPostal').disabled = this.checked;
                            document.getElementById('orderPostal').value = '';
                            document.getElementById('orderPhone').disabled = this.checked;
                            document.getElementById('orderPhone').value = '';"
                             class="form-check-input" type="checkbox" name="orderRegistrationAdress" id="check"> 
            <label class="form-check-label" for="check"> Użyj danych adresowych podanych przy rejestracji </b></a></label>
        </div>
    </div>
    <div class = "m-5 col-lg-12" style="text-align: center; color: #7d9801; font-weight: bold; font-size: 4ch;">
      Wybierz formę dostawy
    </div>
    <div class="container col-4" style="margin-top: 3%; margin-bottom: 3%;" >
        <div class="form-group my-5">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Rodzaj dostawy</label>
            <select name="orderDeliveryForm" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Wybierz</option>
                <option value="kurier">Kurier DPD</option>
                <option value="poczta">Poczta Polska</option>
            </select>
        </div>
        <div class="form-group my-5">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Forma płatności</label>
            <select name="orderPaymentForm" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Wybierz</option>
                <option value="naKonto">Przedpłata na konto</option>
                <option value="zaPobraniem">Za pobraniem</option>
            </select>
        </div>

        <button type="submit" name="addOrderAll" class="btn btn-primary" style="background-color: #7d9801;border: #7d9801;">Potwierdzam i zamawiam</button>
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
