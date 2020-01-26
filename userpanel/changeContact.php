<?php
session_start();
require_once "../logic/connect.php";$polaczenie = mysqli_connect("localhost", "root", "", "gruszka") or die("Connection Error: " . mysqli_error($polaczenie));
if (count($_POST) > 0) {
    $result = mysqli_query($polaczenie, "SELECT *from users WHERE mail='" . $_SESSION["mail"] . "'");
    $row = mysqli_fetch_array($result);
      mysqli_query($polaczenie, "UPDATE users set Phone='" . $_POST["newPhone"] . "' WHERE mail='" . $_SESSION["mail"] . "'");
        $_SESSION['contactInfoChanged'] = true;
    } 

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gruszka</title>

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/shop-item.css" rel="stylesheet">
  
<script>
function validatePassword() {
var newPhone,output = true;



newPhone = document.frmChange.newPhone;




if(!newPhone.value) {
	newPhone.focus();
	document.getElementById("newPhone").innerHTML = "  Uzupełnij";
	output = false;
}

return output;
}
</script>
</head>

<body> 

    <?php include "../static/header.php" ?>
    <?php include "../static/ChangedFormAlert.php" ?>
    <script src="../js/userPanelHeaderScript.js"></script>

 <div class="container col-4" style="margin-top: 5%; margin-bottom: 5%;">
    <form name="frmChange" method="post" action="changeContact.php">
        <div style="center;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
           
                <center><b>ZMIEŃ SWOJE DANE KONTAKTOWE</b></center><br>
                
            
                <div class="form-group">
                    <label for="emailInput">Nowe numer telefonu:</label>
                    <input type="tel" class="form-control" name="newPhone" placeholder="Wprowadź nowy numer telefonu">
                </div>
         
                     
				<button type="submit" class="btn btn-primary" name="submit">Zmień</button>
                
        
        </div>
    </form>
</div>
</body>
</html>

  <!-- Footer -->
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>


</body>

</html>
