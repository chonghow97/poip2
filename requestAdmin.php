<?php
	session_start();
	
	$uid = $_SESSION['userID'];

	require_once 'conn.php';

	$sql = "SELECT * FROM request 
			JOIN item ON request.iid=item.iid 
			JOIN measure ON item.mid=measure.mid
			JOIN user ON request.uid=user.uid";
	$result = mysqli_query($link,$sql);

	require './html/requestAdmin.html';
 ?>