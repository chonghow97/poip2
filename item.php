<?php 
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT * FROM request JOIN item ON request.iid=item.iid JOIN measure ON item.mid=measure.mid";
	$result = mysqli_query($link,$sql);

	require './html/item.html';
 ?>