<div class="container">
<?php if(isset($_SESSION['addedToCart'])){
              if($_SESSION['addedToCart'] == true){
                echo "<div class=\"alert alert-success col-12 mt-4\" role=\"alert\">";
                echo  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
                echo  "<span aria-hidden=\"true\">&times;</span>";
                echo  "</button>";
                echo  "<h4 class=\"alert-heading\">Udało się!</h4>";
                echo "<p>Dodano produkt do koszyka.</p>";
                echo  "</div>";
              }
              unset($_SESSION['addedReview']);
            }
              
      ?>
</div>