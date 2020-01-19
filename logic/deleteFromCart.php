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
    //Zrobic aby gdy usunie wszystkie produkty równiez usuneło go z cart
    //Zrobić zwiekszanie ilosci zamiast powielania produktu
header('Location: ' . $_SERVER['HTTP_REFERER']);

