 <?php
	require "conn.php";
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$encPassword = md5($password);
	
	$strQuery = "SELECT * FROM user WHERE Username = '$username' AND Password='$encPassword'";
	$query = mysql_query($strQuery);
	if($query){
		$thereIsAUser = mysql_num_rows($query);
		if($thereIsAUser==0){
			echo "<script language=javascript>document.location.href='../index.php'</script>";
			$_SESSION['login'] = "fail";
			mysql_close();
		}else{
			$result = mysql_fetch_array($query);
			$_SESSION['id'] = $result['Id_User'];
			$_SESSION['username'] = $result['Username'];
			$_SESSION['realname'] = $result['Realname'];
			$_SESSION['city'] = $result['City'];
			$_SESSION['email'] = $result['Email'];
			$_SESSION['dob'] = $result['Date_Of_Birth'];
			$_SESSION['pp'] = $result['Profil_Picture'];
			$_SESSION['password'] = $result['Password'];
			echo "<script language=javascript>document.location.href='../home.php'</script>";
			mysql_close();
		}
	}else{
			$_SESSION['login'] = "fail";
			echo "<script language=javascript>document.location.href='../index.php'</script>";
	}
?>