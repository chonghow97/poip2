<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	echo "<body></body>";
	require_once 'conn.php';
	$query = "SELECT * FROM category";
	$result= mysqli_query($link,$query);
	$sql = "SELECT * FROM measure";
	$result4 = mysqli_query($link,$sql);

	if(isset($_GET['rid'])){
		$rid = $_GET['rid'];
		$query1 = "SELECT * FROM category,item,request WHERE category.cid=item.cid AND request.iid=item.iid AND request.rid='$rid'";
		$result1 = mysqli_query($link,$query1);
		$query2 = "SELECT * FROM category,item,request WHERE category.cid=item.cid AND request.iid=item.iid AND request.rid='$rid'";
		$result2 = mysqli_query($link,$query2);
		$query3 = "SELECT * FROM item,request,measure WHERE measure.mid=item.mid AND request.iid=item.iid AND request.rid='$rid'";
		$result3 = mysqli_query($link,$query3);
	}


	if(isset($_POST['add'])){
		$item = $_POST['name'];
		$category = $_POST['category'];
		$measure = $_POST['measure'];
		$status = $_POST['status'];
		$query1 = "INSERT INTO item VALUES(null,'$item','$category','$measure','$status')";
		//$query2 = "INSERT INTO stock SELECT null,iid,0,expireDate FROM item";
		//&& $itemresult2 = mysqli_query($link,$query2)
		if($itemresult1 = mysqli_query($link,$query1)){
			echo "<script>alert('Item has been added');</script>";
		}else{
			echo mysqli_error($link);
		}
	}
		
	require './html/additem.html';
 ?>