<div class="container">
<div class="col-lg-12">
<?php if(isset($_SESSION['addedReview'])){
              if($_SESSION['addedReview'] == true){
                echo "<div class=\"alert alert-success col-12 mt-4\" role=\"alert\">";
                echo  "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
                echo  "<span aria-hidden=\"true\">&times;</span>";
                echo  "</button>";
                echo  "<h4 class=\"alert-heading\">Udało się!</h4>";
                echo "<p>Dziękujemy za podzielenie się swoją opinią.</p>";
                echo  "</div>";
              }
              unset($_SESSION['addedReview']);
            }
              
      ?>
</div>
</div>