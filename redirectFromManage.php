<?php
		if($_SESSION['role']){
			header('Location:user.php');
		}
		else{
			header('Location:dashboard.php');
		}
?>