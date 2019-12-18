<?php
session_start();
require('classes/product.php');
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
  
</head>

<body>

<?php include "static/header.php" ?>

  <!--Produkty -->
  <div class="container">

    <div class="row">
      <!--Kategorie-->
      <?php include "static/categories.php" ?>
      <script>
        document.getElementById('computersCategory').className = "list-group-item active"; 
      </script>
      <!--Produkty-->

                  <div class="col-lg-9">
                  <!--Zdjęcie i opis produktu-->

                  <?php
                  //Query products----
                    $products =  array();
                    $mysqli = new mysqli('localhost', 'root', '', 'gruszka');
                    if ($mysqli->connect_errno) {
                      printf("Connect failed: %s\n", $mysqli->connect_error);
                      exit();
                  }
                  $query = "SELECT * FROM products WHERE CategoryID = 1";
                  if ($result = $mysqli->query($query)) {
                      while ($row = $result->fetch_assoc()) {
                          $ID = $row['ID'];
                          $Category = $row['CategoryID'];
                          $Brand = $row['BrandID'];
                          $Title = $row['Title'];
                          $Price = $row['Price'];
                          $Description = $row['Description'];
                          $Photo = $row['Photos'];
                          $Tags = $row['Tags'];
                          $product = new Product($ID, $Category, $Brand, $Title, $Price, $Description, $Photo, $Tags);
                          $products[] = $product;
                      }
                      $result->free();
                  }
                  
                  
                  
                  for($i = 0; $i < count($products); $i++){

                    //--------------------
                  

                  ?>
                    <div class="card my-4">
                      <img class="card-img-top img-fluid" src="productphotos/<?php echo $products[$i]->Photo;?>" alt="">
                      <div class="card-body" style="background-color: #47484b">
                        <div class="d-flex justify-content-between ">
                          <div class="d-flex" style="align-items: center;justify-content: left;">
                              <h2 class="card-title" style="color: #7d9801"><?php echo $products[$i]->Title; ?></h2>
                          </div>
                          <button class="btn btn-primary col-3 m-2" type="button" style="background-color: #7d9801;border: #7d9801;">
                              Dodaj do koszyka
                            </button>
                        </div>
                        <h4><?php echo $products[$i]->Price; ?> zł</h4>
                        <h6 class="mt-4">Opis:</h6>
                        <p class="card-text" style="color: #e1e8f0"><?php echo $products[$i]->Description; ?></p>
                      </div>
                      
                      <div class="d-flex button-group justify-content-between" style="background-color: #47484b">
                        <!--Button Pokaż recenzje-->
                        <button class="btn btn-primary col-3 m-2" type="button" data-toggle="collapse" data-target="#collapse<?php echo$i;?>" aria-expanded="false" aria-controls="collapse<?php echo$i;?>" >
                          Opinie o produkcie
                        </button>
                        <!--Button wystaw recenzje-->
                        <button class="btn btn-primary col-3 m-2" type="button"data-toggle="modal" data-target="#formModal" >
                            Wystaw opinię
                        </button>
                        </div> 
                        <div class="modal" tabindex="-1" role="dialog" id="formModal">
                          <form>
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Napisz swoją opinię</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Wyślij opinię</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                  </div>
                                
                              </div>
                            </div>
                          </div>
                          </form>
                      

                      <div class="collapse " style="background-color: #47484b" id="collapse<?php echo$i;?>">
                      <?php 
                      $query = "SELECT reviews.ID, reviews.Content, reviews.TimeStamp, products.ID, users.ID, users.Name FROM reviews, products, users WHERE 
                      reviews.ProductID = products.ID AND reviews.CustomerID = users.ID AND products.id = ".$products[$i]->ID.";";
                      $result = $mysqli->query($query);
                      if ($result->num_rows > 0) {
                        
                      echo "<div class=\"card-body \" >";
                        
                          //Query reviews------
                          
                            while ($row = $result->fetch_assoc()) {
                                echo "<p class=\"text-white\">".$row['Content']."</p>";
                                echo "<small class=\"text-muted-info\">Wystawiona przez ".$row['Name']." dnia ".$row['TimeStamp']."</small>";
                                echo "<hr style=\" border: 1px solid #555657;\">";
                            }
                        
                        ?>
                        </div>
                        <?php }?>
                        </div>
                      </div> 
                      <?php }?>
                    </div>
        
      </div>
    </div>
  
  
<?php $mysqli->close(); ?>
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
