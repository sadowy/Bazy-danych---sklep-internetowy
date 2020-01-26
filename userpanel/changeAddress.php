<?php
session_start();
require_once "../logic/connect.php";$polaczenie = mysqli_connect("localhost", "root", "", "gruszka") or die("Connection Error: " . mysqli_error($polaczenie));
if (count($_POST) > 0) {
    $result = mysqli_query($polaczenie, "SELECT *from users WHERE mail='" . $_SESSION["mail"] . "'");
    $row = mysqli_fetch_array($result);
      mysqli_query($polaczenie, "UPDATE users set City='" . $_POST["newCity"] . "' WHERE mail='" . $_SESSION["mail"] . "'");
      mysqli_query($polaczenie, "UPDATE users set Postal='" . $_POST["newPostal"] . "' WHERE mail='" . $_SESSION["mail"] . "'");
      mysqli_query($polaczenie, "UPDATE users set Street='" . $_POST["newStreet"] . "' WHERE mail='" . $_SESSION["mail"] . "'");
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
var newCity,newPostal,newStreet,output = true;


newCity = document.frmChange.newCity;
newPostal = document.frmChange.newPostal;
newStreet = document.frmChange.newStreet;



if(!newCity.value) {
	newCity.focus();
	document.getElementById("newCity").innerHTML = "  Uzupełnij";
	output = false;
}

if(!newPostal.value) {
	newPostal.focus();
	document.getElementById("newPostal").innerHTML = "  Uzupełnij";
	output = false;
}

if(!newStreet.value) {
	newStreet.focus();
	document.getElementById("newStreet").innerHTML = "  Uzupełnij";
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
    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div style="center;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
           
                <center><b>ZMIEŃ SWÓJ ADRES</b></center><br>
                
                <div class="form-group">
                    <label for="emailInput">Miasto:</label>
                    <input type="text" class="form-control" name="newCity" placeholder="Wprowadź nazwę miasta">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="newPostal" placeholder="Wprowadź kod pocztowy">
                </div>
                <br>
                <div class="form-group">
                    <label for="emailInput">Nowe ulica:</label>
                    <input type="text" class="form-control" name="newStreet" placeholder="Wprowadź nazwę ulicy i numer budynku">
                </div>
                <br>
                
                    
                
             
                
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
