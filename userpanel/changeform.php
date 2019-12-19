<?php
session_start();
$polaczenie = mysqli_connect("localhost", "root", "", "gruszka") or die("Connection Error: " . mysqli_error($polaczenie));
if (count($_POST) > 0) {
    $result = mysqli_query($polaczenie, "SELECT *from users WHERE mail='" . $_SESSION["mail"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["Password"]) {
        mysqli_query($polaczenie, "UPDATE users set Password='" . $_POST["newPassword"] . "' WHERE mail='" . $_SESSION["mail"] . "'");
        $message = "Hasło zostało zmienione!";
    } else
        $message = "Dotychczasowe hasło jest nieprawidłowe.";
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
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "  Uzupełnij";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "  Uzupełnij";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "  Uzupełnij";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "<br /> Nowe hasła nie są identyczne";
	output = false;
} 	
return output;
}
</script>
</head>

<body>
    <!-- Navigation -->
    <?php include "../static/header.php" ?>

 <body style= "color: #7d9801"> <!-- Do wrzucenia z CSS -->
 <br /> <br /> 
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        <div style="center;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
           <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2"><center><b>ZMIEŃ SWOJE HASŁO</b></center></td>
                </tr>
                <tr>
                    <td width="40%"><label>Dotychczasowe hasło:</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
                </tr>
			
                <tr>
                    <td><label>Nowe hasło:</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                <td><label>Potwierdź nowe hasło:</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
				
                <tr>
                    <td colspan="2"><input type="submit" name="submit"
                        value="Zmień" class="btnSubmit"></td>
                </tr>
			
            </table>
        </div>
    </form>
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
