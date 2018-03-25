<?php
	echo "<body></body>";
	require_once 'conn.php';
	$query = "SELECT * FROM category";
	$result= mysqli_query($link,$query);
	$sql = "SELECT * FROM measure";
	$result1 = mysqli_query($link,$sql);
		if(isset($_POST['add'])){
			$item = $_POST['name'];
			$category = $_POST['category'];
			$measure = $_POST['measure'];
			$status = $_POST['status'];
			$query1 = "INSERT INTO item VALUES(null,'$item','$category','$measure','$status')";
			if($itemresult = mysqli_query($link,$query1)){
				echo "<script>alert('added Successfully');</script>";
				$_POST = array();
			}else{
				echo mysqli_error($link);
			}
		}
	require './html/additem.html';
 ?>