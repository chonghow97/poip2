<?php 
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 
	
	require_once 'conn.php';
	$sql = "SELECT * FROM item WHERE status=1";
	$result = mysqli_query($link,$sql);
	$sql1 = "SELECT * FROM measure";
	$result1 = mysqli_query($link,$sql1);
	// $sql3 = "SELECT * FROM item,measure WHERE item.mid=measure.mid AND status=1";
	// $result3 = mysqli_query($link,$sql);

	if(isset($_POST['request'])){
		$itemName = $_POST['itemName'];
		$quantity = $_POST['quantity'];
		$purpose = $_POST['purpose'];
		$uid = $_SESSION['userID'];

		$sql2 = "INSERT INTO request VALUES (null,'$uid','$itemName','$quantity','$purpose',now(),'Pending')";
		if ($result2 = mysqli_query($link,$sql2)){
			echo "<script>alert('Request has been sent');</script>";
		}

	}

	require './html/request.html';
 ?>