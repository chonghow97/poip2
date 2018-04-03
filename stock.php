<?php
	require_once 'conn.php';
	if(isset($_POST['add'])){
		$item = $_POST['item'];
		$quantity = $_POST['quantity'];
		$exp = $_POST['exp'];
		$sql2 = "INSERT INTO stock VALUES (NULL, '$item', '$quantity', '$exp')";
		if($queryResult = mysqli_query($link, $sql2)){
			echo "<script>alert('Stock up successful');</script>";
		}
		else{
			echo "<script>alert('Failed');</script>";
		}
	}
	$sql = "SELECT `iid`,`iname` FROM item";
	if($result = mysqli_query($link,$sql)){
		while($row = mysqli_fetch_assoc($result)){
			$user[] = $row;
		}
	}
	require './html/stock.html';
 ?>