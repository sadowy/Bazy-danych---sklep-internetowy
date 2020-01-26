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

<?php include "header.php" ?>
<script src="../js/adminPanelHeaderScript.js"></script>

<!--Produkty -->
<div class="container">

<div class="row">
  <!--Kategorie-->
  <?php include "../static/adminPanelCategories.php" ?>
  <script>
    document.getElementById('adminPanelCategoriesLink4').className = "list-group-item active"; 
  </script>

  <div class="col-lg-15">

  <!--Zdjęcie i opis produktu-->
    <div class="card my-4">
      <img class="card-img-top img-fluid" src="#" alt="">
      <div class="card-body" style="background-color: #47484b">
        <div class="d-flex justify-content-between ">
          <div class="d-flex" style="align-items: center;justify-content: left;">
              <h2 class="card-title" style="color: #7d9801">ZAMÓWIENIA</h2>
          </div>
        </div>
  <div class="card">
	<div class="card body">
				
<?php
	$connection = mysqli_connect("localhost", "root", "","");
	$db = mysqli_select_db($connection,'gruszka');
					
	$query = "SELECT  users.Name, users.Surname, orders.TimeStamp, orders.City, orders.Street, orders.Postal, orders.Phone, orders.Payment, orders.Delivery, products.Title, orderitem.Quantity 
FROM users, orders, orderitem, products
WHERE orders.UserID = users.ID 
AND orderitem.OrderID = orders.ID
AND orderitem.ProductID = products.ID ";
	$query_run = mysqli_query($connection, $query);
?>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
	  <th scope="col">Czas Operacji</th>
	  <th scope="col">Numer Telefonu</th>
      <th scope="col">Miasto</th>
	  <th scope="col">Ulica</th>
	  <th scope="col">Kod Pocztowy</th>
	  <th scope="col">Nazwa Produktu</th>
	  <th scope="col">Ilość</th>
	  <th scope="col">Forma Zapłaty</th>
	  <th scope="col">Forma Dostawy</th>
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
     
	  <td> <?php echo $row['Name']; ?> </td>
      <td> <?php echo $row['Surname']; ?> </td>
	  <td> <?php echo $row['TimeStamp']; ?> </td>
	  <td> <?php echo $row['Phone']; ?> </td>
	  <td> <?php echo $row['City']; ?> </td>
	  <td> <?php echo $row['Street']; ?> </td>
	  <td> <?php echo $row['Postal']; ?> </td>
	  <td> <?php echo $row['Title']; ?> </td>
	  <td> <?php echo $row['Quantity']; ?> </td>
	  <td> <?php echo $row['Payment']; ?> </td>
	  <td> <?php echo $row['Delivery']; ?> </td>
	  
    </tr>
  </tbody>
  <?php
	}
}
		else
		{
			echo "Nie znaleziono zamówienia";
		}
	?>
</table>
</div>
</div>
        <br>
        <br>
        <br>
        <br>
        <br>
        

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

      <div class="collapse" id="collapse1">
        
        <div class="card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
          <small class="text-muted">Posted by Anonymous on 3/1/17</small>
          <hr>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
          <small class="text-muted">Posted by Anonymous on 3/1/17</small>
          <hr>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
          <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        </div>

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
