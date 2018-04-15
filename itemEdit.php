<?php
	session_start();
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 

	require_once 'conn.php';
	$sql = "SELECT * FROM category";
	$result = mysqli_query($link,$sql);
		$sql2 = "SELECT i.iname,c.cname,m.mname,i.status,i.iid FROM item as i,`measure` as m,`category` as c where i.cid = c.cid AND i.mid = m.mid";
		$result2 = mysqli_query($link,$sql2);
		$row2 = mysqli_fetch_all($result2);
		foreach ($row2 as $r2=>$l2) {
			($l2[3])? ($row2[$r2][3] = "Available") : ($row2[$r2][3] = "Unavailable");
		}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql3 = "DELETE FROM `item` WHERE `item`.`iid` = '$id'";
		if($result3 = mysqli_query($link,$sql3)){
			echo "<script>alert('data has been deleted');
				window.location='itemEdit.php';
			</script>";
		}
	}

	require './html/itemEdit.html';
?>