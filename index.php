<?php
	session_start();
	require_once 'conn.php';
	if(isset($_POST['sub'])){
		$email = htmlentities($_POST['uemail']);
		$password = $_POST['upassword'];
		$sql = "SELECT fname, password, role, firstlogin FROM user WHERE email='$email'";
		if($result = mysqli_query($link,$sql)){
			if(mysqli_num_rows($result) == 1){
				$row= mysqli_fetch_assoc($result);
				$hpass= $row['password'];
				if(password_verify($password,$hpass)){
					$_SESSION['islogin'] = true;
					$_SESSION['loginUsername'] = $row['fname'];
					if($row['role']){
						header('Location: '.'user.php');
					}else{
						header('Location: '.'dashboard.php');
					}
				}else{
					echo "<script>alert('Wrong password please try again')</script>";
				}
			}
		}
	}
	require './html/index.html';
 ?>