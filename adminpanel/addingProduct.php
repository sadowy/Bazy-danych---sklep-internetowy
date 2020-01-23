<?php
if (isset($_POST['upload'])) {
	$target = "products/".basename($_FILES['image']['name']);
	
	$db = mysqli_connect("localhost", "root", "", "gruszka");
	
	$image = $_FILES['image']['name'];
	$CategoryID = $_POST['CategoryID'];
	$BrandID = $_POST['BrandID'];
	$Title = $_POST['Title'];
	$Price = $_POST['Price'];
	$Quantity = $_POST['Quantity'];
	$Description = $_POST['Description'];
	$Tags = $_POST['Tags'];
	
	$sql= "INSERT INTO products (CategoryID,BrandID,Title,Price,Quantity,Description,Photos,Tags) VALUES ('$CategoryID','$BrandID','$Title','$Price','$Quantity','$Description','$image','$Tags')";

	if(!mysqli_query($db,$sql))
	{
		echo '<h1 style="color: #7d9801">Coś nie Pykło :/</h1>';
	}
	else
	{
		echo '<h1 style="color: #7d9801">Wystawiono Gruszkę na Sprzedaż :D</h1>';
	}
	
}
header("refresh:2; url=addProduct.php");
?>