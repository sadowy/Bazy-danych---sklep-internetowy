<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

  $query = "DELETE FROM cartitem WHERE ProductID = ".$_POST['ProductID'];
  mysqli_query($db, $query);
  
  $queryIle1 = "SELECT SUM(cartitem.Quantity) FROM products, cartitem, cart WHERE cart.UserID = ".$_SESSION['id']." AND cartitem.CartID = cart.ID 
  AND cartitem.ProductID = products.ID";
  $responseIle1 = mysqli_query($db,$queryIle1);
  $resultIle1 = mysqli_fetch_assoc($responseIle1);
  if($resultIle1['SUM(cartitem.Quantity)'] == 0){
    $query = "DELETE FROM cart WHERE UserID = ".$_SESSION['id'];
    mysqli_query($db, $query);
  }
header('Location: ' . $_SERVER['HTTP_REFERER']);

