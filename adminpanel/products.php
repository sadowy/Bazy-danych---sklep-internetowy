<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gruszka</title>

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/shop-item.css" rel="stylesheet">

</head>

<body>

<?php include "../static/header.php" ?>
<script src="../js/adminPanelHeaderScript.js"></script>

<!--Produkty -->
<div class="container">

<div class="row">
  <!--Kategorie-->
  <?php include "../static/adminPanelCategories.php" ?>
  <script>
    document.getElementById('adminPanelCategoriesLink3').className = "list-group-item active"; 
  </script>
  

  <div class="col-lg-9">

  <!--Zdjęcie i opis produktu-->
    <div class="card my-4">
      <img class="card-img-top img-fluid" src="#" alt="">
      <div class="card-body" style="background-color: #47484b">
        <div class="d-flex justify-content-between ">
          <div class="d-flex" style="align-items: center;justify-content: left;">
              <h2 class="card-title" style="color: #7d9801">PRODUKTY</h2>
          </div>
        </div>

	  <form enctype="multipart/form-data" action="addProduct.php" method="post">

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="CategoryID">ID Kategorii :</label>
      <input type="number" class="form-control" name="CategoryID" placeholder="Kategoria">
    </div>
    <div class="form-group col-md-2">
      <label for="BrandID">ID Marki :</label>
      <input type="number" class="form-control" name="BrandID" placeholder="Marka">
    </div>
  </div>
		
		<div class="form-group">
		<label for="Title">Tytuł :</label>
        <br> <input type="text" class="form-control" name="Title" placeholder="Podaj tytuł wystawianego przedmiotu"><br/></div>
  
  <div class="form-row">
		<div class="form-group col-md-2">
      <label for="Price">Cena :</label>
      <input type="number" class="form-control" name="Price" placeholder="Bogactwo">
    </div>
  </div>
		 
<h2 style="color: #7d9801">Dodaj nową Gruszkę</h2>
   <div class="form-group">
      <label for="Description">Opis :</label>
      <textarea class="form-control" rows="20" name="Description"></textarea><br>
      		
	<div class="form-group">
		<label for="image">Zdjęcie :</label>
		<br> <input type="file" class="form-control-file" name="image"><br/></div>	
	<div class="form-group">
		<label for="Tags">Tagi :</label>
		<br> <input type="text" class="form-control" name="Tags" placeholder="Podaj Tagi dla łatwiejszego wyszukiwania przedmiotu"><br/></div>
        <br>
        <br>
        <button type="submit" name="upload" class="btn btn-primary">Dodaj Produkt</button>
        <br>
        <br>
        
		</form>
      </div>
      
      
     
                
              </div>
            </div>
          </div>
          </form>
      </div> 

      <div class="collapse" id="collapse1">
        
        

      </div>

    </div>
    
  </div>
</div>
</div>

  <!-- Footer -->
  <footer class="py-4">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Gruszka.net 2019</p>
    </div>
  </footer>
  <script src="../https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
