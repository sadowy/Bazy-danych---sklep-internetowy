<?php
session_start();
require_once('functions.php');
 
if(!empty($_POST)){
    serve_post();
}
 
?>
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koszyk</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
 
    <header>
        <h1>Koszyk</h1>
        <div> <a href="koszyk.php">sklep</a> | <a href="koszyk.php?koszyk">koszyk</a></div>
    </header>
    <div id="container">
 
        <div id="left">
            <form action="" method="post">
 
                <table>
                    <caption>Produkty</caption>
                    <th>Nr.</th>
                    <th>Nazwa</th>
                    <th>Dodaj</th>
                    <?php
                    generate_products();
                     ?>
                </table>
            </form>
        </div>
 
        <div id="right">
            <?php
            if((strpos($_SERVER['REQUEST_URI'], "?koszyk")))
                {
                    generate_cart();
                }
            ?>
        </div>
 
    </div>
</body>
 
</html>