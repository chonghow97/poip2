<?php 
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT COUNT(*) AS requestNo FROM request";
	$result = mysqli_query($link,$sql);
	
	require './html/user.html';
 ?>