<?php
function generate_products(){
    for($i=1;$i<21;$i++)
    {
        echo "      
    <tr>
        <td>$i</td><td>produkt$i</td><td><input type='submit' name='towar' value='produkt$i'></td>
         
    </tr>";
    }
}

function generate_cart(){
    echo "   
    <form action = '' method = 'post'>
    <table class='koszyk' border='3px solid'>
    <caption>Koszyk</caption>
    <th>Nr.</the><th>Produkt</th><th>Ilosc</th><th>Usuń</th>
    ";
    $i=0;
    foreach($_SESSION as $key=>$n)
    {
    $i++;
        echo "
        <tr>
        <td>$i</td><td>$key</td><td>$n</td>
        <td><input type='submit' name='towar-' value='$key' class='delete'></td>
        ";
    }
}

function serve_post(){
    if(isset($_POST['towar']))
    {
        $towar = $_POST['towar'];
        if(!isset($_SESSION[$towar])) $_SESSION[$towar] = 1;
        else $_SESSION[$towar]++;
        header("Location: koszyk.php?koszyk");
    }
    if(isset($_POST['towar-']))
    {
        $towar = $_POST['towar-'];
        if($_SESSION[$towar]==1) unset($_SESSION[$towar]);
        else $_SESSION[$towar]--;
        header("Location: koszyk.php?koszyk");
    }
}