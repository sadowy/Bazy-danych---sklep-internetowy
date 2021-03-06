<?php
session_start();
require_once "../logic/connect.php";?>
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
<script src="../js/userPanelHeaderScript.js"></script>

<!--Produkty -->
<div class="container">

<div class="row">
  <!--Kategorie-->
  <?php include "../static/userPanelCategories.php" ?>
  <script>
    document.getElementById('userPanelCategoriesLink4').className = "list-group-item active"; 
  </script>

  <div class="col-lg-9">

  <!--Zdjęcie i opis produktu-->
    <div class="card my-4">
      <img class="card-img-top img-fluid" src="#" alt="">
      <div class="card-body" style="background-color: #47484b">
        <div class="d-flex justify-content-between ">
          <div class="d-flex" style="align-items: center;justify-content: left;">
              <h2 class="card-title" style="color: #7d9801">Reklamacje i Zwroty</h2>
          </div>
        </div>
	  
	    <form enctype="multipart/form-data" action="addingComplaint.php" method="post">

<div class="form-group">
		<label for="Title">ID Zamówienia :</label>
        <br> <input type="number" class="form-control" name="OrderID" placeholder="Podaj ID swojego zamówienia"><br/></div>
		
		<div class="form-group">
		<label for="Title">Tytuł :</label>
        <br> <input type="text" class="form-control" name="Title" placeholder="Podaj nazwę zakupionego przedmiotu"><br/></div>
		 
   <div class="form-group">
      <label for="Description">Opisz krótko swój problem :</label>
      <textarea class="form-control" rows="20" name="Description"></textarea><br>
      		
	<div class="form-group">
		<label for="image">Dodaj zdjęcie opisywanego problemu :</label>
		<br> <input type="file" class="form-control-file" name="image"><br/></div>	
        <br>
        <br>
        <button type="submit" name="complaint" class="btn btn-primary">Wyślij Reklamacje</button>
        <br>
        <br>
        
		</form>
      </div>
      
      
      <div class="d-flex button-group justify-content-between" style="background-color: #47484b">

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
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
