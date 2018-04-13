<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

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
				JOIN measure ON item.mid = measure.mid
				WHERE iname LIKE '%$item%' AND item.cid='$category' AND status='$status';";
		$result2 = mysqli_query($link,$sql2);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql3 = "DELETE FROM item WHERE iid='$id';";
		$sql4 = "DELETE FROM stock WHERE iid='$id';";
		if($itemresult1 = mysqli_query($link,$sql3)&&$itemresult2 = mysqli_query($link,$sql4)){
			echo "<script>alert('Item has been removed');</script>";
			header("Location: itemEdit.php");
		}else{
			echo mysqli_error($link);
		}
	}

	require './html/itemEdit.html';
?>