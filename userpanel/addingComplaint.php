<?php
if (isset($_POST['complaint'])) {
	$target = "complaints/".basename($_FILES['image']['name']);
	
	$db = mysqli_connect("localhost", "root", "", "gruszka");
	
	$image = $_FILES['image']['name'];
	$OrderID = $_POST['OrderID'];
	$Title = $_POST['Title'];
	$Description = $_POST['Description'];
	
	$sql= "INSERT INTO complaints (OrderID,Title,Description,Photos) VALUES ('$OrderID','$Title','$Description','$image')";

	if(!mysqli_query($db,$sql))
	{
		echo '<h1 style="color: #7d9801">Coś nie Pykło :/</h1>';
	}
	else
	{
		echo '<h1 style="color: #7d9801">Dziękujemy za wysłanie zgłoszenia! Odpowiemy jak najszybciej</h1>';
	}
	
}
header("refresh:2; url=complaints.php");
?>