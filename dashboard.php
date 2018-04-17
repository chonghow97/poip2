<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT COUNT(*) AS requestNo FROM request";
	$result = mysqli_query($link,$sql);

	$sql1 = "SELECT COUNT(*) AS expiredItem FROM stock WHERE expire <= CURDATE()";
	$result1 = mysqli_query($link,$sql1);

	$sql2 = "SELECT COUNT(*) AS lowStockItem FROM stock WHERE quantity <= 15";
	$result2 = mysqli_query($link,$sql2);

	require './html/dashboard.html';
 ?>