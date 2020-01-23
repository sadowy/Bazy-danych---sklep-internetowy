<div class="container">
<div class="col-lg-12">
<?php if(isset($_SESSION['tooMuchAlert'])){
  require_once "logic/connect.php";
  $db = mysqli_connect("$host", "$db_user", '', "$db_name");
  
  if ($db->connect_errno!=0)
  {
    echo "Error: ".$db->connect_errno;
  }
  $queryWhichProduct = "SELECT products.Title, products.Quantity 
                        FROM products, cartitem, cart, users 
                        WHERE cart.UserID = ".$_SESSION['id']." 
                        AND cartitem.Quantity > products.Quantity
                        AND cartitem.CartID = cart.ID 
                        AND cart.UserID = users.ID
                        AND cartitem.ProductID = products.ID";
  $responseWhichProduct = mysqli_query($db,$queryWhichProduct);
  

  if($_SESSION['tooMuchAlert'] == true){
      
    echo "<div class=\"alert alert-danger col-12 mt-4\" role=\"alert\">";
    echo  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
    echo  "<span aria-hidden=\"true\">&times;</span>";
    echo  "</button>";
    echo  "<h4 class=\"alert-heading\">Ups!</h4>";
    echo "<p>Niestety, poniższe produkty z koszyka przekroczyły ilości na stanie :(</p>";

    while($resultWhichProduct = mysqli_fetch_assoc($responseWhichProduct)){
      echo "<span class = \"font-weight-bold\">Nazwa produktu:</span> ".$resultWhichProduct['Title'].".<span class = \"font-weight-bold\"> Na stanie: </span>".$resultWhichProduct['Quantity'];
      echo "</br>";
    }
    echo "<p></p>";
    echo "<p>Prosimy o zmniejszenie zamówienia.</p>";
    echo  "</div>";
  }
    unset($_SESSION['tooMuchAlert']);
} 

?>
</div>
</div>