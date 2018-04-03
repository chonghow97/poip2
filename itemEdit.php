<?php
	require_once 'conn.php';
	$sql = "SELECT * FROM category";
	$result = mysqli_query($link,$sql);
	require './html/itemEdit.html';
?>