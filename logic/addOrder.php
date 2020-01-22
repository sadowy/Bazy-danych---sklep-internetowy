<?php
  session_start();
   require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

//Przerzucić produkty z koszyka do zamówienia
//Zmniejszyć ilość na stanie
//Zapytć o adres dostawy
//Zapytać o formę płatności
//Zrobić podsumowanie zamówienia
//Poprosić o potwierdzenie(opcja rezygnuje - po jej kliknięciu wywalić zamówienie)
//Poinformować o złożonym zamówieniu i szczegółach w zakładce moje konto

//Sprawdzić czy ilość z koszyka poszególnych produktów nie przekracza ilości tych produktów na stanie
$queryHowManyInCart = "SELECT products.ID, cartitem.Quantity FROM products, cartitem, cart WHERE cart.UserID = ".$_SESSION['id']." AND cartitem.CartID = cart.ID 
  AND cartitem.ProductID = products.ID";
$responseHowManyInCart = mysqli_query($db,$queryHowManyInCart);
$resultHowManyInCart = mysqli_fetch_assoc($responseHowManyInCart);

while($resultHowManyInCart)
{
  $queryHowManyOnStock = "SELECT Quantity FROM products WHERE products.ID = ".$resultHowManyInCart['ID'];
  $responseHowManyOnStock = mysqli_query($db,$queryHowManyOnStock);
  $resultHowManyOnStock = mysqli_fetch_assoc($responseHowManyOnStock);
  if($resultHowManyOnStock['Quantity'] < $resultHowManyInCart['Quantity']){
    //Ilość w koszyku przekracza ilość na stanie(alert itp)
    $tooMuch = true;
  }
}
if(!$tooMuch){
  //Weź produkty z koszyka klienta, daj do zamówienia i odejmij ilości ze stanów.
  $queryInfoAboutProducts = "SELECT cartitem.ID, cartitem.Quantity FROM cartitem, products, users, cart 
                            WHERE cartitem.ProductID = products.ID 
                            AND cartitem.CartID = cart.ID AND cart.UserID = ".$_POST['UserID']."
                            AND cart.UserID = users.ID ";
  $responseInfoAboutProducts = mysqli_query($db,$queryInfoAboutProducts);
  $resultInfoAboutProducts = mysqli_fetch_assoc($responseInfoAboutProducts);

}

header('Location: ' . $_SERVER['HTTP_REFERER']);

