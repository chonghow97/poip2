<?php
	echo "<body></body>";
	require_once 'conn.php';
	if(isset($_POST['add'])){
		$fullname = $_POST['fname'];
		//$password = auto generate 6 digit
		$email = $_POST['email'];
		$role = $_POST['role'];
	}
	
	require './html/addUser.html';
 ?>