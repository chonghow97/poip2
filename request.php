<?php 
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 
	
	require_once 'conn.php';
	$sql = "SELECT * FROM item";
	$result = mysqli_query($link,$sql);
	$sql1 = "SELECT * FROM measure";
	$result1 = mysqli_query($link,$sql1);

	if(isset($_POST['request'])){
		$itemName = $_POST['itemName'];
		$quantity = $_POST['quantity'];
		$measureUnit = $_POST['measureUnit'];
		$purpose = $_POST['purpose'];
		$sql2 = "INSERT INTO request VALUES (null,'$itemName','$quantity','$measureUnit','$purpose',now(),'Pending')";
		if ($result2 = mysqli_query($link,$sql2)){
			echo "<script>alert('Request has been sent');</script>";
		}

	}

	require './html/request.html';
 ?>