<?php 
	// require_once 'conn.php'
	// if(isset($_POST['add'])){
	// 	$fullname =
	// 	$password = 
	// 	$email = 
	// 	$role = 
	// }
	require './html/addUser.html';
	$rand = substr(md5(microtime()),rand(0,26),6);
	echo $rand;
 ?>