<?php
session_start();
require_once "logic/connect.php";
$db = mysqli_connect("$host", "$db_user", '', "$db_name");

if ($db->connect_errno!=0)
{
  echo "Error: ".$db->connect_errno;
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

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/shop-item.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  

</head>

<body>
<?php
$query = "SELECT products.ID, products.Title, products.Price, products.Photos, cartitem.Quantity FROM products, cartitem, cart WHERE cart.UserID = ".$_SESSION['id']." AND cartitem.CartID = cart.ID 
AND cartitem.ProductID = products.ID";
$response = mysqli_query($db,$query);
?>

<?php include "static/header.php" ?>

  <!--Produkty -->
  <div class="container mt-4">
    <div class = "col-lg-12" style="text-align: center; color: #7d9801; font-weight: bold; font-size: 4ch;">
      PODSUMOWANIE
    </div>
  <table class="table table-dark">
  <thead >
    <tr style="text-align: center;">
      <th scope="col">#</th>
      <th scope="col">Zdjęcie</th>
      <th scope="col">Nazwa produktu</th>
      <th scope="col">Ilość</th>
      <th scope="col">Cena</th>
      <th scope="col">Wartość</th>
      <th scope="col">Usuń</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    while($result = mysqli_fetch_assoc($response)){
      echo "<form action=\"logic/deleteFromCart.php\" method=\"post\">";
      echo "<tr style=\"text-align: center;\">";
      echo "<th style=\"vertical-align: middle; text-align: center;\" scope=\"row\">".($i)."</th>";
      echo "<td style=\"width:16.66%;\"><img class=\"img-thumbnail\" style=\"width:100%;\" src=\"productphotos/".$result['Photos']."\" alt=\"Product photo\"></td>";
      echo "<td style=\"vertical-align: middle;\">".$result['Title']."</td>";
      echo "<td style=\"vertical-align: middle;\">".$result['Quantity']."</td>";
      echo "<td style=\"vertical-align: middle;\">".$result['Price']."zł</td>";
      echo "<td style=\"vertical-align: middle;\">".$result['Price']*$result['Quantity']."zł</td>";
      echo "<input type=\"hidden\" name=\"ProductID\" value=\"".$result['ID']."\">";
      echo "<td style=\"vertical-align: middle;\"><button type=submit style=\"padding: 0;border: none;background: none;\" href=\"#\" title=\"Delete\"><i style=\"color: red;\" class=\"material-icons\">&#xE872;</i></button></td>";
      echo "</tr>";
      echo "</form>";
      $i++;
    }
    ?>
  </tbody>
</table>
  
  </div>

  <!-- Footer -->
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>


</body>

</html>
