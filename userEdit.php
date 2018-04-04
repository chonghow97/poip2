<?php
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
	require './html/userEdit.html';
?>