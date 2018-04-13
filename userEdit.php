<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT * FROM user";
	$result = mysqli_query($link,$sql);

	if(isset($_POST['searchUser'])){
		$role = $_POST['role'];
		$fname = $_POST['fname'];
		$sql2 = "SELECT * 
				FROM user 
				WHERE fname LIKE '%$fname%' AND role='$role'";
		$result2 = mysqli_query($link,$sql2);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql3 = "DELETE FROM user WHERE uid='$id';";
		if($itemresult1 = mysqli_query($link,$sql3)){
			echo "<script>alert('User has been removed');</script>";
			header("Location: userEdit.php");
		}else{
			echo mysqli_error($link);
		}
	}

	require './html/userEdit.html';
?>