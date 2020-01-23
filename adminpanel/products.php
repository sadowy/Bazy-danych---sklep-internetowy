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
  

  <div class="col-lg-30">

  <!--Zdjęcie i opis produktu-->
    <div class="card my-4">
      <img class="card-img-top img-fluid" src="#" alt="">
      <div class="card-body" style="background-color: #47484b">
        <div class="d-flex justify-content-between ">
          <div class="d-flex" style="align-items: center;justify-content: left;">
              <h2 class="card-title" style="color: #7d9801">PRODUKTY</h2>
          </div>
        </div>
      
	  <div class="card">
	<div class="card body">
	
      <?php
	$connection = mysqli_connect("localhost", "root", "","");
	$db = mysqli_select_db($connection,'gruszka');
					
	$query = "SELECT * FROM products";
	$query_run = mysqli_query($connection, $query);
	$pathx = "../productphotos/";
?>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
	  <th scope="col">Zdjęcie</th>
      <th scope="col">ID</th>
      <th scope="col">Nr Kategorii</th>
      <th scope="col">Nr Marki</th>
      <th scope="col">Nazwa</th>
	  <th scope="col">Ilość</th>
	  <th scope="col">Cena</th>
	  <th scope="col">Opis</th>
	  <th scope="col">Tagi</th>
    </tr>
  </thead>
  <?php
	if($query_run)
		{
			foreach($query_run as $row)
		{
	?>
	
  <tbody>
    <tr>
	  <td> <?php echo '<img class="img-fluid" width="50" height="50" src="'.$pathx.$row["Photos"].'">'; ?> </td>
      <td> <?php echo $row['ID']; ?> </td>
      <td> <?php echo $row['CategoryID']; ?> </td>
      <td> <?php echo $row['BrandID']; ?> </td>
      <td> <?php echo $row['Title']; ?> </td>
	  <td> <?php echo $row['Quantity']; ?> </td>
	  <td> <?php echo $row['Price']; ?> </td>
	  <td> <?php echo $row['Description']; ?> </td>
	  <td> <?php echo $row['Tags']; ?> </td>
    </tr>
  </tbody>
  <?php
	}
}
		else
		{
			echo "Nie znaleziono produktów";
		}
	?>
</table>
</div>
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
