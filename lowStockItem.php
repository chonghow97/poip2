<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT *, SUM(quantity) AS sum FROM item,category,stock,measure WHERE item.iid=stock.iid AND item.cid=category.cid AND item.mid=measure.mid AND expire>now() GROUP BY iname";
	$result = mysqli_query($link,$sql);

	require './html/lowStockItem.html';
 ?>