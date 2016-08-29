<?php
	require "conn.php";
	session_start();
	if(!isset($_SESSION['id'])){
		echo "<script language=javascript>document.location.href='../index.php'</script>";
	}else{
		if(!isset($_POST['title']) && !isset($_POST['diary']) && !isset($_POST['emot'])){
				echo "<script language=javascript>document.location.href='../home.php'</script>";
		}else{
			$title = $_POST['title'];
			$diary = $_POST['diary'];
			$emot = $_POST['emot'];
			
			date_default_timezone_set("Asia/Jakarta");
			$date = date("Y-m-d");
			$id_user = $_SESSION['id'];
			
			$strQuery = "INSERT INTO diary(Id_User,Title,Date,Diary,Emoticon) VALUES('$id_user','$title','$date','$diary','$emot')";
			$query = mysql_query($strQuery);
			if($query){
				$_SESSION['create'] = "success";
				echo "<script language=javascript>document.location.href='../home.php'</script>";
				mysql_close();
			}else{
				$_SESSION['create'] = "fail";
				echo "<script language=javascript>document.location.href='../home.php'</script>";
			}
		}
	}
?>