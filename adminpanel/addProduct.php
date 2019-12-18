<?php
if (isset($_POST['upload'])) {
	$target = "products/".basename($_FILES['image']['name']);
	
	$db = mysqli_connect("localhost", "root", "", "gruszka");
	
	$image = $_FILES['image']['name'];
	$CategoryID = $_POST['CategoryID'];
	$BrandID = $_POST['BrandID'];
	$Title = $_POST['Title'];
	$Price = $_POST['Price'];
	$Description = $_POST['Description'];
	$Tags = $_POST['Tags'];
	
	$sql= "INSERT INTO products (CategoryID,BrandID,Title,Price,Description,Photos,Tags) VALUES ('$CategoryID','$BrandID','$Title','$Price','$Description','$image','$Tags')";
	mysqli_query($db, $sql);
	
}
header("refresh:2; url=products.php");
?>