<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

//Narazie jest na sztywno 1 produkt
//Sprawdz czy user ma juz carta(ma dodane produkty)
  $selectCart = "SELECT ID FROM cart WHERE UserID = ".$_POST['UserID'];
  $result = mysqli_query($db,$selectCart);
  $CartID = mysqli_fetch_assoc($result);
  //Jezeli nie ma stworz mu carta
  if($CartID == null){
    $query = "
    INSERT INTO cart (UserID)
      VALUES (".$_POST['UserID'].");";
    mysqli_query($db, $query);
    //Wybierz koszyk usera
    $selectCart = "SELECT ID FROM cart WHERE UserID = ".$_POST['UserID']."";
    $result = mysqli_query($db,$selectCart);
    $CartID = mysqli_fetch_assoc($result);
  }
  //Sprawdz czy user ma dodany juz taki produkt do carta
  $query1 = "SELECT cartitem.ID, cartitem.Quantity FROM cartitem, products, users, cart WHERE cartitem.ProductID = products.ID AND cartitem.CartID = cart.ID AND cart.UserID = ".$_POST['UserID']." AND cart.UserID = users.ID AND cartitem.ProductID = ".$_POST['ProductID'];
  $result1 = mysqli_query($db,$query1);
  $Product = mysqli_fetch_assoc($result1);
  //Jezeli ma zwieksz ilosc
  if($Product != null){
    $query = "UPDATE cartitem SET Quantity = ".++$Product['Quantity']." WHERE cartitem.ID = ".$Product['ID'];
  }
  //Jezeli nie dodaj produkt do cartitem
  else{
    $query = "INSERT INTO cartitem (CartID, productID, Quantity)
    VALUES (".$CartID['ID'].", ".$_POST['ProductID'].", 1);";
  }
  mysqli_query($db, $query);
    $_SESSION['addedToCart'] = true;
header('Location: ' . $_SERVER['HTTP_REFERER']);

