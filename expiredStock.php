<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';

	$sql1 = "SELECT * FROM item,category,stock,measure WHERE item.iid=stock.iid AND item.cid=category.cid AND item.mid=measure.mid AND expire <= CURDATE()";
	$result1 = mysqli_query($link,$sql1);

	if(isset($_GET['sid'])){
		$sid=$_GET['sid'];
		$sql2 = "UPDATE stock SET sStatus=0 WHERE sid='$sid'";
		$result2 = mysqli_query($link,$sql2);
		header("Location:expiredStock.php");
	}

	require './html/expiredStock.html';
 ?>