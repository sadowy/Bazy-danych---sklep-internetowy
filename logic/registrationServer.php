<?php
session_start();

$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'gruszka');

// REGISTER USER
if(!empty($_POST)){
//if (isset($_POST['regEmail'])) {
  
  $email = strtolower(mysqli_real_escape_string($db, $_POST['regEmail']));
  $password_1 = mysqli_real_escape_string($db, $_POST['regPassword']);
  $password_2 = mysqli_real_escape_string($db, $_POST['regPasswordConf']);
  $name = mysqli_real_escape_string($db, $_POST['regName']);
  $name2 = mysqli_real_escape_string($db, $_POST['regName2']);
  $city = mysqli_real_escape_string($db, $_POST['regCity']);
  $street = mysqli_real_escape_string($db, $_POST['regStreet']);
  $postal = mysqli_real_escape_string($db, $_POST['regPostal']);
  $phone = mysqli_real_escape_string($db, $_POST['regPhone']);

  // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //   array_push($errors, "Podano nie poprawny mail");
  // } 

  
  $clean_email = "";

  
  $clean_email = filter_var($email,FILTER_SANITIZE_EMAIL);

  if (filter_var($clean_email,FILTER_VALIDATE_EMAIL)){
      $email = $clean_email;
    } else {
      array_push($errors, "Podano błędny email");
  }

  if (empty($name)) { array_push($errors, "Uzupełnij pole imię"); }
  if (empty($email)) { array_push($errors, "Uzupełnij pole email"); }
  
  if (empty($password_1)) { array_push($errors, "Hasło jest wymagane"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Hasła się nie zgadzają");
  }
  if (empty($name2)) { array_push($errors, "Uzupełnij pole nazwisko"); }
  if (empty($city)) { array_push($errors, "Uzupełnij pole miasto"); }
  if (empty($street)) { array_push($errors, "Uzupełnij pole ulica"); }
  if (empty($postal)) { array_push($errors, "Uzupełnij pole Kod pocztowy"); }
  if(!preg_match("/^[0-9]{2}-[0-9]{3}$/", $postal)) {
    array_push($errors, "Podano nie poprawny Kod pocztowy");
  }
  if (empty($phone)) { array_push($errors, "Uzupełnij pole Telefon"); }
  if(!preg_match("/^[0-9]{9}$/", $phone)) {
    array_push($errors, "Podano nie poprawny nr telefonu");
  }

  $user_check_query = "SELECT * FROM users WHERE Mail='$email' OR Name='$name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['Mail'] === $email) {
      array_push($errors, "Użytkownik już istnieje");
    }
  }

  
  if (count($errors) == 0) {
  	$password = ($password_1);

  	$query = "INSERT INTO users (Name, Mail, Password, Surname, City, Phone, Postal, Street) 
  			  VALUES('$name', '$email', '$password', '$name2', '$city', '$phone', '$postal', '$street')";
  	mysqli_query($db, $query);    
  	header('location: ../index.php');
  }
  else
  {
    include 'errors.php';
  }

}