<?php
  session_start();
  $reviewContent = $_POST['reviewContent'];
  $productID = $_POST['productID'];
  $clientID = $_POST['clientID'];
  $a = 5;

  require_once "connect.php";

  $db = mysqli_connect("$host", "$db_user", '', "$db_name");

  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }

  $query = "INSERT INTO `reviews`( `ProductID`, `CustomerID`, `Content`, `TimeStamp`) 
            VALUES (".$productID.",".$clientID.",'".$reviewContent."','".date("Y-m-d")."');";
            
mysqli_query($db, $query);    
$_SESSION['addedReview'] = true;
header('location: ../index.php');

