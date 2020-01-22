<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

//Zapytć o adres dostawy
//Zapytać o formę płatności
//Zrobić podsumowanie zamówienia
//Poprosić o potwierdzenie(opcja rezygnuje - po jej kliknięciu wywalić zamówienie)
//Poinformować o złożonym zamówieniu i szczegółach w zakładce moje konto

//Sprawdzić czy ilość z koszyka poszególnych produktów nie przekracza ilości tych produktów na stanie
$queryHowManyInCart = "SELECT products.ID, cartitem.Quantity FROM products, cartitem, cart WHERE cart.UserID = ".$_SESSION['id']." AND cartitem.CartID = cart.ID 
  AND cartitem.ProductID = products.ID";
$responseHowManyInCart = mysqli_query($db,$queryHowManyInCart);

while($resultHowManyInCart = mysqli_fetch_assoc($responseHowManyInCart))
{
  $tooMuch = false;
  $queryHowManyOnStock = "SELECT Quantity FROM products WHERE products.ID = ".$resultHowManyInCart['ID'];
  $responseHowManyOnStock = mysqli_query($db,$queryHowManyOnStock);
  $resultHowManyOnStock = mysqli_fetch_assoc($responseHowManyOnStock);
  if($resultHowManyOnStock['Quantity'] < $resultHowManyInCart['Quantity']){
    //Ilość w koszyku przekracza ilość na stanie(alert itp)
    $tooMuch = true;

    
  }
}
if(!$tooMuch){
  //Jesli jest okej to wrzucamy nowe zamowienie do bazy
  //Dodajemy nowe zamowienie do Order

  $queryAddOrder = "
  INSERT INTO orders (UserID)
    VALUES (".$_SESSION['id'].");";
  mysqli_query($db, $queryAddOrder);
  $selectOrder = "SELECT ID FROM `orders` WHERE UserID = ".$_SESSION['id']." ORDER BY TimeStamp DESC LIMIT 1 ";
  $resultOrder = mysqli_query($db,$selectOrder);
  $orderID = mysqli_fetch_assoc($resultOrder);

  //Weź produkty z koszyka klienta, daj do zamówienia(czyli dodaj OrderItemy) i odejmij ilości ze stanów.
  $queryInfoAboutProducts = "SELECT cartitem.ProductID, cartitem.Quantity FROM cartitem, products, users, cart 
                            WHERE cartitem.ProductID = products.ID 
                            AND cartitem.CartID = cart.ID 
                            AND cart.UserID = users.ID
                            AND cart.UserID = ".$_SESSION['id'];
  $responseInfoAboutProducts = mysqli_query($db,$queryInfoAboutProducts);
  while($resultInfoAboutProducts = mysqli_fetch_assoc($responseInfoAboutProducts)){
    //Dla każdego produktu wyciągniętego z koszyka, dodajemy go do cartitem oraz usuwamy jego stan z products
    $queryAddOrderItem = "
    INSERT INTO orderitem (OrderID, ProductID, Quantity)
      VALUES (".$orderID['ID'].", ".$resultInfoAboutProducts['ProductID'].", ".$resultInfoAboutProducts['Quantity'].");";
    mysqli_query($db, $queryAddOrderItem);

    //Pobieramy aktualną ilość danego produktu
    $queryHowManyNow = "SELECT Quantity FROM products WHERE products.ID = ".$resultInfoAboutProducts['ProductID'];
    $resultHowManyNow = mysqli_query($db,$queryHowManyNow);
    $howManyNow = mysqli_fetch_assoc($resultHowManyNow);

    $howManyAfterOrder = $howManyNow['Quantity'] - $resultInfoAboutProducts['Quantity'];

    //I zmieniamy na ilość - zamówiona ilość
    $querySubractStockQuantity = "UPDATE products SET Quantity = ".$howManyAfterOrder." 
                                  WHERE products.ID = ".$resultInfoAboutProducts['ProductID'];
    mysqli_query($db,$querySubractStockQuantity);   

    //pobranie ID koszyka danego uzytkownika 
    $selectCart = "SELECT ID FROM cart WHERE UserID = ".$_SESSION['id'];
    $results = mysqli_query($db,$selectCart);
    $CartID = mysqli_fetch_assoc($results);
    
    $quersonDeleteCartItem = "DELETE FROM cartitem WHERE CartID = ".$CartID['ID'];
    $quersonDeleteCart = "DELETE FROM cart WHERE ID = ".$CartID['ID'];

    mysqli_query($db, $quersonDeleteCartItem);
    mysqli_query($db, $quersonDeleteCart);
                 
  }

}

header('Location: ../orderDetails.php');

?>