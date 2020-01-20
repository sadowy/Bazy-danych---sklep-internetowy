<?php
if (isset($_POST['addtocart'])) {
	$target = "cart/".basename($_POST['title']);
	
	$db = mysqli_connect("localhost", "root", "", "gruszka");
	
	$Title = $_POST['Title'];
	$Price = $_POST['Price'];
	$quanity = $_POST['Title'];
	
	$sql= "INSERT INTO cart (title,price,quanity) VALUES ('$title','$price','$quanity')";
	
	if(!mysqli_query($db,$sql))
	{
		echo '<h1 style="color: #7d9801">Coś nie Pykło :/</h1>';
	}
	else
	{
		echo '<h1 style="color: #7d9801">Produkt dodany do koszyka</h1>';
	}
	
	header("refresh:2; url=index.php");	
}
?>