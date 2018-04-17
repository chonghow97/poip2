<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 
	require_once 'conn.php';

	if(isset($_POST['add'])){
		$item = $_POST['item'];
		$quantity = $_POST['quantity'];
		$exp = $_POST['exp'];
		$sql2 = "INSERT INTO stock VALUES (NULL, '$item', '$quantity', '$exp', 1)";
		if($queryResult = mysqli_query($link, $sql2)){
			echo "<script>alert('Stock up successful');</script>";
		}
		else{
			echo "<script>alert('Failed');</script>";
		}
	}

	if(isset($_GET['rid'])){
		$rid = $_GET['rid'];
		$query1 = "SELECT * FROM item,request WHERE request.iid=item.iid AND request.rid='$rid'";
		$result1 = mysqli_query($link,$query1);
		$query3 = "SELECT * FROM item,request WHERE request.iid=item.iid AND request.rid='$rid'";
		$result3 = mysqli_query($link,$query1);
		if(isset($_POST['add'])){
			$query2 = "UPDATE request SET rStatus='Stocked Up' WHERE rid='$rid'";
			$result2 = mysqli_query($link,$query2);
		}
	}

	if(isset($_GET['iid'])){
		$iid = $_GET['iid'];
		$query4 = "SELECT * FROM item WHERE iid='$iid'";
		$result4 = mysqli_query($link,$query4);
		
	}


	$sql = "SELECT `iid`,`iname` FROM item";
	if($result = mysqli_query($link,$sql)){
		while($row = mysqli_fetch_assoc($result)){
			$user[] = $row;
		}
	}
	require './html/stock.html';
 ?>