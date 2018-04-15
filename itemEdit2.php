<?php 
	session_start();
	require_once 'conn.php';
	if(!isset($_SESSION['islogin'])){
		$_SESSION['kickOut'] = "kick";
		header('Location:index.php');
	} 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$item = mysqli_fetch_array(mysqli_query($link,"SELECT `iname` FROM item WHERE iid='$id'"));
		$cat = mysqli_fetch_all(mysqli_query($link,"SELECT `cid`,`cname` FROM category"));
		$mea = mysqli_fetch_all(mysqli_query($link,"SELECT `mid`,`mname` FROM measure"));
	}else{
		echo "<script>alert('Error! id not found'); location.assign('itemedit.php');
		</script>";
	}
	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$info = array($_POST['item'],$_POST['cat'],$_POST['mea'],$_POST['status']);
		if(mysqli_query($link,"UPDATE item SET `iname`='$info[0]', `cid`='$info[1]', `mid`='$info[2]',`status`='$info[3]' WHERE `iid`='$id'")){
			echo "<script>alert('update succesfully');location.assign('itemedit.php'); </script>";
		}else{
			echo mysqli_error($link);
		}
	}
	include 'html/itemEdit2.html';
 ?>