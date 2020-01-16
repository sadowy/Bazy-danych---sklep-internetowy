 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top">
  
    <div class="container">
      <a id="indexLogoLink" class="navbar-brand" href="index.php" style="font-size: 3ch;">
        <img id="logo" class="img-fluid" width="30" height="30" src="static/logo.png">
        Gruszka.net
      </a>
      <nav class="navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      </nav>
      
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
            <a id="indexLink2" class="nav-link" href="index.php">Sklep
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a id="aboutLink" class="nav-link" href="about.php">O nas</a>
          </li>
          <li class="nav-item">
            <a id="contactLink" class="nav-link" href="contact.php">Kontakt</a>
          </li>

            <?php  
            if (isset($_SESSION['zalogowany']))
            {  
                echo "<li class='nav-item'><a class='nav-link' href='../userpanel/userpanel.php'>Moje konto</a></li>";
            }
            else if (isset($_SESSION['admin']))
            {
                echo "<li class='nav-item'><a id=\"adminPanelLink\" class='nav-link' href='adminpanel/adminPanel.php'>Panel admina</a></li>";
            }
            ?>
            <?php 
            if ((isset($_SESSION['zalogowany'])) || (isset($_SESSION['admin'])))
            {
            echo "<li class='nav-item'><a id=\"logoutLink\" class='nav-link' href='logic/logout.php'>Wyloguj się</a></li>";
            }
            else
            {
                echo "<li class='nav-item'>";
                echo "<a id=\"loginLink\" class='nav-link' href='login.php' style='color: #ffffff'>";
                echo "Zaloguj się";
                echo"</a>";
                echo "</li>";
            }
            if(isset($_SESSION['zalogowany'])){
              echo "<li class='nav-item'>";
                echo "<a id=\"cartLink\" class='nav-link' href='cart.php' style='color: #ffffff'>";
                echo " <i class=\"fas fa-shopping-cart\"></i>";
                echo"</a>";
                echo "</li>";
            }
            ?>
        </ul>
      </div>
  </nav>
