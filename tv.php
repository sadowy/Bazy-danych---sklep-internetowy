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
          <a href="komputery.php" class="list-group-item" >Komputery</a>
          <a href="tv.php" class="list-group-item active"  >Telewizory</a>
          <a href="smartfony.php" class="list-group-item" >Smartfony</a>
          <a href="drukarki.php" class="list-group-item" >Drukarki</a>
          <a href="akcesoria.php" class="list-group-item" >Akcesoria</a>
        </div>
      </div>
      <!--Produkty-->

      <div class="col-lg-9">
      <!--Zdjęcie i opis produktu-->
        <div class="card my-4">
            
          <div class="card-body" style="background-color: #47484b">
            <div class="d-flex justify-content-between ">
              
            <div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					
				</div>

				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						<li><a href="?a=cart" id="li-cart"><i class="fa fa-shopping-cart"></i> Cart (<?php echo $cart->getTotalItem(); ?>)</a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php if ($a == 'cart'): ?>
		<div class="container">
			<h1>Twój koszyk</h1>

			<div class="row">
				<div class="col-md-12">
					 <div class="table-responsive">
						<?php echo $cartContents; ?>
					 </div>
				</div>
			</div>
		</div>
		<?php elseif ($a == 'checkout'): ?>
		<div class="container">
			<h1>Telewizory</h1>

			<div class="row">
				<div class="col-md-12">
					 <div class="table-responsive">
					 	<pre><?php print_r($cart->getItems()); ?></pre>
					 </div>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="container">
			<h1>Telewizory</h1>
			<div class="row">
				<?php
				foreach ($products as $product) {
					echo '
					<div class="col-md-6">
						<h3>' . $product->name . '</h3>
						<div>
							<div class="pull-left">
								<img src="' . $product->image->source . '" border="0" width="' . $product->image->width . '" height="' . $product->image->height . '" title="' . $product->name . '" />
							</div>
							<div class="pull-right">
								<h4>$' . $product->price . '</h4>
								<form>
									<input type="hidden" value="' . $product->id . '" class="product-id" />';
					if ($product->colors) {
						echo '
										<div class="form-group">
											<label>Kolor:</label>
											<select class="form-control color">';
						foreach ($product->colors as $key => $value) {
							echo '
												<option value="' . $key . '"> ' . $value . '</option>';
						}
						echo '
											</select>
										</div>';
					}
					echo '
									<div class="form-group">
										<label>Ilość:</label>
										<input type="number" value="1" class="form-control quantity" />
									</div>
									<div class="form-group">
										<button class="btn btn-danger add-to-cart"><i class="fa fa-shopping-cart"></i> Dodaj do koszyka</button>
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
				}
				?>
			</div>
		</div>
		<?php endif; ?>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$('.add-to-cart').on('click', function(e){
					e.preventDefault();
					var $btn = $(this);
					var id = $btn.parent().parent().find('.product-id').val();
					var color = $btn.parent().parent().find('.color').val() || '';
					var qty = $btn.parent().parent().find('.quantity').val();
					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="add" value=""><input type="hidden" name="id" value="' + id + '"><input type="hidden" name="color" value="' + color + '"><input type="hidden" name="qty" value="' + qty + '">');
					$('body').append($form);
					$form.submit();
				});
				$('.btn-update').on('click', function(){
					var $btn = $(this);
					var id = $btn.attr('data-id');
					var qty = $btn.parent().parent().find('.quantity').val();
					var color = $btn.attr('data-color');
					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="update" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="qty" value="'+qty+'"><input type="hidden" name="color" value="'+color+'">');
					$('body').append($form);
					$form.submit();
				});
				$('.btn-remove').on('click', function(){
					var $btn = $(this);
					var id = $btn.attr('data-id');
					var color = $btn.attr('data-color');
					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="remove" value=""><input type="hidden" name="id" value="'+id+'"><input type="hidden" name="color" value="'+color+'">');
					$('body').append($form);
					$form.submit();
				});
				$('.btn-empty-cart').on('click', function(){
					var $form = $('<form action="?a=cart" method="post" />').html('<input type="hidden" name="empty" value="">');
					$('body').append($form);
					$form.submit();
				});
			});
		</script>
	</body>
            
            </div>
            
            
          </div>
          
          <div class="d-flex button-group justify-content-between" style="background-color: #47484b">
           
           
            

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
