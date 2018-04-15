<?php 
	session_start();
	if(isset($_SESSION['kickOut'])){
		echo "<script type='text/javascript'>alert('Please login first');</script>";	
	} 
	require_once 'conn.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$user = mysqli_fetch_array(mysqli_query($link,"SELECT `fname`,`email` FROM user WHERE `uid`='$id'"));
	}
	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$userinfo = array($_POST['fname'],$_POST['email'],$_POST['role']);
		$sql = "UPDATE user SET fname='$userinfo[0]',email='$userinfo[1]',role='$userinfo[2]' WHERE `uid`='$id'";
		if(mysqli_query($link,$sql)){
			echo "<script>alert('Update Successfully');location.assign('userEdit.php');</script>";
		}else{
			echo mysqli_error($link);
		}
	}
	include 'html/userEdit2.html';
 ?>