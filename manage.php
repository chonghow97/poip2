<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT * FROM user";
	$result = mysqli_query($link,$sql);
	
	if(isset($_POST['saveName'])){
		$uname = $_POST['uname'];
		$sql2 = "UPDATE user
				SET fname ='$uname'
				WHERE uid = '$_SESSION[userID]'";
		$result2 = mysqli_query($link,$sql2);
	}

	require './html/manage.html';
 ?>