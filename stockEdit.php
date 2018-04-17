<?php 
	session_start();
	
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';


	if(isset($_POST['search'])){
		$fname = $_POST['fname'];
		$sql2 = "SELECT i.iname,s.quantity,s.expire, m.mname 
				FROM stock as s, item as i, measure as m 
				WHERE s.iid = i.iid AND i.mid = m.mid AND i.iname LIKE '%$fname%';";
		$result2 = mysqli_query($link,$sql2);
	}
	else{
		$sql = "SELECT i.iname,s.quantity,s.expire, m.mname 
				FROM stock as s, item as i, measure as m 
				WHERE s.iid = i.iid AND i.mid = m.mid;";
		$result = mysqli_query($link,$sql);
	}

	include 'html/stockEdit.html';
 ?>