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

//<?php include "./header.php" ?>

  <!--Produkty -->
  <div class="container">

    <div class="row">
      <!--Kategorie-->
      <div class="col-lg-3" >
        <h1 class="my-4" style="color: #7d9801">Kategorie</h1>
        <div class="list-group" >
          <a href="#f" class="list-group-item active" >Komputery</a>
          <a href="#f" class="list-group-item"  >Telewizory</a>
          <a href="#f" class="list-group-item" >Smartfony</a>
          <a href="#f" class="list-group-item" >Drukarki</a>
          <a href="#f" class="list-group-item" >Akcesoria</a>
        </div>
      </div>
      <!--Produkty-->

      <div class="col-lg-9">
      <!--Zdjęcie i opis produktu-->
        <div class="card my-4">
          <img class="card-img-top img-fluid" src="gum.png" alt="">
          <div class="card-body" style="background-color: #47484b">
            <div class="d-flex justify-content-between ">
              <div class="d-flex" style="align-items: center;justify-content: left;">
                  <h2 class="card-title" style="color: #7d9801">LENOVO IdeaPad S540-14IWL</h2>
              </div>
              <button class="btn btn-primary col-3 m-2" type="button" style="background-color: #7d9801;border: #7d9801;">
                  Dodaj do koszyka
                </button>
            </div>
            <h4>2549.99 zł</h4>
            <h6 class="mt-4">Opis:</h6>
            <p class="card-text" style="color: #e1e8f0">14-calowy IdeaPad S540, wyposażony w procesor Intel Core 8. generacji oferuje dużą wydajność oraz najwyższą jakość wykonania. Ciesz się ekranem z wąską ramką, luksusową paletą kolorów oraz aluminiową obudową. Ciche, podwójne wentylatory i ulepszony system chłodzenia gwarantują, że IdeaPad S540 nie będzie przegrzewać się podczas pracy. Czytnik linii papilarnych pozwoli zalogować się tylko zaaprobowanym użytkownikom dzięki czemu zapewnia dodatkowy poziom ochrony danych. A dzięki chroniącej prywatność osłonie kamery nie będziesz się martwić, że czyjś ciekawski wzrok naruszy Twoją osobistą przestrzeń.</p>
          </div>
          
          <div class="d-flex button-group justify-content-between" style="background-color: #47484b">
            <!--Button Pokaż recenzje-->
            <button class="btn btn-primary col-3 m-2" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1" >
              Opinie o produkcie
            </button>
            <!--Button wystaw recenzje-->
            <button class="btn btn-success col-3 m-2" type="button"data-toggle="modal" data-target="#formModal" >
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c419d26f2c.js" crossorigin="anonymous"></script>
    
    <script src="dark-mode-switch.min.js"></script>


</body>

</html>
