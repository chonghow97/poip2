<?php
	require_once 'conn.php';
	$sql = "SELECT * FROM category";
	$result = mysqli_query($link,$sql);

	if(isset($_POST['add'])){
		$category = $_POST['category'];
		$status = $_POST['status'];
		$item = $_POST['item'];
		$sql2 = "SELECT * 
				FROM item 
				JOIN stock ON item.iid = stock.iid
				JOIN category ON item.cid = category.cid
				WHERE iname LIKE '%$item%' AND item.cid='$category' AND status='$status'";
		$result2 = mysqli_query($link,$sql2);
	}
	require './html/itemEdit.html';
?>