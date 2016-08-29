<?php
	require "conn.php";
	session_start();
	
	if(!isset($_POST['username']) && !isset($_POST['realname']) && !isset($_POST['password']) && !isset($_POST['dob']) && !isset($_POST['email']) && !isset($_POST['city'])){
				echo "<script language=javascript>document.location.href='../home.php'</script>";
	}else{
		$username = $_POST['username'];
		$realname = $_POST['realname'];
		$password = md5($_POST['password']);
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$city = $_POST['city'];
		
		$strQuery = "INSERT INTO user(Username, Realname, Date_Of_Birth, Email, Password, City) VALUES('$username', '$realname', '$dob', '$email', '$password', '$city')";
		$query = mysql_query($strQuery);
		if($query){
			$_SESSION['signup'] = "success";
			echo "<script language=javascript>document.location.href='../index.php'</script>";
		}else{
			$_SESSION['signup'] = "fail";
			echo "<script language=javascript>document.location.href='../signup.php'</script>";
		}
	}
?>