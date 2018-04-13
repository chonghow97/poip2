<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT * FROM user";
	$result = mysqli_query($link,$sql);

	if(isset($_POST['chgPW'])){
		$oldPw = $_POST['oldPw'];
		$newPw = $_POST['newPw'];
		$newPw2 = $_POST['newPw2'];

		if(!(password_verify($oldPw,$_SESSION['userPw']))){
			echo "<script>alert('Password incorrect');</script>";
		}
		else if($newPw != $newPw2){
			echo "<script>alert('New password not match');</script>";
		}
		else{
		$newHashPw = password_hash($newPw, PASSWORD_DEFAULT);
		$_SESSION['userPw'] = $newHashPw;
		$sql2 = "UPDATE user
				SET password ='$newHashPw'
				WHERE uid = '$_SESSION[userID]'";
		$result2 = mysqli_query($link,$sql2);
		echo "<script>alert('New password is set');</script>";
		}
	}

	require './html/managepassword.html';

 ?>