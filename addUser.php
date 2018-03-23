<?php
	echo "<body></body>";
	require_once 'conn.php';
	if(isset($_POST['add'])){
		$fullname = $_POST['fname'];
		$password = password_hash('abc123',PASSWORD_DEFAULT);
		$email = $_POST['email'];
		$role = $_POST['role'];
		$sql = "INSERT INTO user VALUES(null,'$fullname','$password','$email','$role',false)";
	}
	
	require './html/addUser.html';
 ?>