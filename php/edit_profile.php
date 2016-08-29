<?php
	require "conn.php";
	session_start();
	$folder ="pp/";
	define ('SITE_ROOT', realpath(dirname(__FILE__)));
	if(!isset($_SESSION['id'])){
		echo "<script language=javascript>document.location.href='../index.php'</script>";
	}else{
		if(!isset($_POST['username']) && !isset($_POST['realname']) && !isset($_POST['dob']) && !isset($_POST['email']) && !isset($_POST['city'])){
			echo "<script language=javascript>document.location.href='../home.php'</script>";
		}else{
			$username = $_POST['username'];
			$realname = $_POST['realname'];
			$password = $_POST['password'];
			$dob = $_POST['dob'];
			$email = $_POST['email'];
			$city = $_POST['city'];
			
			if($password == "") {
				$strQuery = "UPDATE user set Username = '$username', Realname ='$realname', Date_Of_Birth = '$dob', Email = '$email', City = '$city' WHERE Id_User = '$_SESSION[id]'";
			}else{
				$pass = md5($password);
				$strQuery = "UPDATE user set Username = '$username', Realname ='$realname', Date_Of_Birth = '$dob', Email = '$email', Password = '$pass', City = '$city' WHERE Id_User = '$_SESSION[id]'";
			}
			$query = mysql_query($strQuery);
			
			if($query){
				if(!empty($_FILES['Profil_Picture']['tmp_name'])){
					$img_type=$_FILES['Profil_Picture']['type'];
					if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/gif" || $img_type=="image/png"){
						$img = $_SESSION['id']."." .basename($_FILES['Profil_Picture']['type']);
						$img2 = $folder.$_SESSION['id']."." .basename($_FILES['Profil_Picture']['type']);
						if(move_uploaded_file($_FILES['Profil_Picture']['tmp_name'], SITE_ROOT."/".$img2)) {
							$strQuery2 = "UPDATE user set Profil_Picture = '$img' WHERE Id_User = '$_SESSION[id]'";
							$query2 = mysql_query($strQuery2);
							if($query2){
								$_SESSION['edit'] = "success";
								$_SESSION['username'] = $username;
								$_SESSION['realname'] = $realname;
								$_SESSION['city'] = $city;
								$_SESSION['email'] = $email;
								$_SESSION['dob'] = $dob;
								$_SESSION['pp'] = $img;
								echo "<script language=javascript>document.location.href='../home.php'</script>";
							}else{
								$_SESSION['edit'] = "fail";
								echo "<script language=javascript>document.location.href='../edit_profile.php'</script>";
							}
						}else{
							$_SESSION['edit'] = "fail";
							echo "<script language=javascript>document.location.href='../edit_profile.php'</script>";
						}
					}else{
						$_SESSION['edit'] = "fail";
						echo "<script language=javascript>document.location.href='../edit_profile.php'</script>";
					}
				}else{
					$_SESSION['edit'] = "success";
					$_SESSION['username'] = $username;
					$_SESSION['realname'] = $realname;
					$_SESSION['city'] = $city;
					$_SESSION['email'] = $email;
					$_SESSION['dob'] = $dob;
					echo "<script language=javascript>document.location.href='../home.php'</script>";
				}
			}else{
				$_SESSION['edit'] = "fail";
				echo "<script language=javascript>document.location.href='../edit_profile.php'</script>";
			}
		}
	}
?>