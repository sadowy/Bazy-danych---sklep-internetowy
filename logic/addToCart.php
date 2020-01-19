<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

//Narazie jest na sztywno 1 produkt
  $selectCart = "SELECT ID FROM cart WHERE UserID = ".$_POST['UserID']."";
  $result = mysqli_query($db,$selectCart);
  $CartID = mysqli_fetch_assoc($result);
  if($CartID == null){
    $query = "
    INSERT INTO cart (UserID)
      VALUES (".$_POST['UserID'].");";
    mysqli_query($db, $query);
    $selectCart = "SELECT ID FROM cart WHERE UserID = ".$_POST['UserID']."";
    $result = mysqli_query($db,$selectCart);
    $CartID = mysqli_fetch_assoc($result);
  }
  $query1 = "SELECT cartitem.ID, cartitem.Quantity FROM cartitem, products WHERE cartitem.ProductID = products.ID AND cartitem.ProductID = ".$_POST['ProductID'];
  $result1 = mysqli_query($db,$query1);
  $Product = mysqli_fetch_assoc($result1);
  if($Product != null){
    $query = "UPDATE cartitem SET Quantity = ".++$Product['Quantity']." WHERE cartitem.ID = ".$Product['ID'];
  }
  else{
    $query = "INSERT INTO cartitem (CartID, productID, Quantity)
    VALUES (".$CartID['ID'].", ".$_POST['ProductID'].", 1);";
  }
  mysqli_query($db, $query);
    $_SESSION['addedToCart'] = true;
header('Location: ' . $_SERVER['HTTP_REFERER']);

