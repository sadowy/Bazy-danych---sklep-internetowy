
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
  
    <div class="container">
      <a class="navbar-brand" href="../index.php" style="font-size: 3ch;">
        <img class="img-fluid" width="30" height="30" src="../static/logo.png">
        Gruszka.net
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
      
        <ul class="navbar-nav ml-auto">  
          
                    <?php 
                    if  ((isset($_SESSION['zalogowany'])) || (isset($_SESSION['admin'])))
                    {
                    echo "<li class='nav-item'>";
                    echo "<p class=\"nav-link\" style='color: #ffffff'>";
                    echo "Witaj ".$_SESSION['userName'];
                    echo "</p>";
                    echo "</li>";
                    }
                    ?>
          <li class="nav-item active">    
            <a class="nav-link" href="../index.php">Sklep
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about.php">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Kontakt</a>
          </li>

            <?php  
            if (isset($_SESSION['zalogowany']))
            {  
                echo "<li class='nav-item'><a class='nav-link' href='userpanel/userpanel.php'>Moje konto</a></li>";
            }
            else if (isset($_SESSION['admin']))
            {
                echo "<li class='nav-item'><a class='nav-link' href='adminPanel.php'>Panel admina</a></li>";
            }
            ?>
            <?php 
            if ((isset($_SESSION['zalogowany'])) || (isset($_SESSION['admin'])))
            {
            echo "<li class='nav-item'><a class='nav-link' href='../logic/logout.php'>Wyloguj się</a></li>";
            }
            else
            {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='login.php' style='color: #ffffff'>";
                echo "Zaloguj się";
                echo"</a>";
                echo "</li>";
            }
            if(isset($_SESSION['zalogowany'])){
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='login.php' style='color: #ffffff'>";
                echo " <i class=\"fas fa-shopping-cart\"></i>";
                echo"</a>";
                echo "</li>";
            }
            ?>
        </ul>
      </div>
  </nav>
