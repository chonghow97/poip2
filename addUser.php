<?php
	echo "<body></body>";
	require_once 'conn.php';
	if(isset($_POST['add'])){
		$fullname = $_POST['fname'];
		$password = password_hash('abc123',PASSWORD_DEFAULT);
		$email = $_POST['email'];
		$role = $_POST['role'];
		$sql = "INSERT INTO user VALUES(null,'$fullname','$password','$email','$role',false)";
		if($result=mysqli_query($link,$sql)){
			echo "<script>alert('Added Successfully')</script>";
		}else{
			echo "<script>alert('Invalid Name or Email')</script>";
		}
	}
	
	require './html/addUser.html';
 ?>