<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

  //Wybieramy ostatnie zamowienie danego użytkownika do którego dodamy szczegóły
  $selectOrder = "SELECT ID FROM `orders` WHERE UserID = ".$_SESSION['id']." ORDER BY TimeStamp DESC LIMIT 1 ";
  $resultOrder = mysqli_query($db,$selectOrder);
  $orderID = mysqli_fetch_assoc($resultOrder);
  

  //Jezeli opcja pobierz z adresu podanego przy rejestracji zaznaczona 
  if(isset($_POST['orderRegistrationAdress']) && $_POST['orderRegistrationAdress'] = 'on'){
    $selectUserAddress = "SELECT Phone, City, Street, Postal FROM `users` WHERE ID = ".$_SESSION['id'];
    $resultUserAddress = mysqli_query($db,$selectUserAddress);
    $userAddress = mysqli_fetch_assoc($resultUserAddress);
  }
  else{
    $userAddress = [
        "Phone" => $_POST['orderPhone'],
        "City" => $_POST['orderCity'],
        "Street" => $_POST['orderStreet'],
        "Postal" => $_POST['orderPostal']
    ];
  }
  array_push($userAddress, $_POST['orderPaymentForm'],  $_POST['orderDeliveryForm']);

  
  $queryAddDetails = "UPDATE orders SET City = \"".$userAddress['City']."\", Street = \"".$userAddress['Street']."\", 
                    Postal = \"".$userAddress['Postal']."\", Phone =  \"".$userAddress['Phone']."\", Payment = \"".$userAddress[0]."\", Delivery = \"".$userAddress[1]."\"

  $queryAddDetails = "UPDATE orders SET City = \"".$userAddress['City']."\", Street = \"".$userAddress['Street']."\", 
                    Postal = \"".$userAddress['Postal']."\", Phone =  \"".$userAddress['Phone']."\"

                                  WHERE orders.ID = ".$orderID['ID'];
   $hmm = mysqli_query($db,$queryAddDetails); 
   $_SESSION['addedOrderAlert'] = true;
header('Location: ../index.php');
?>
