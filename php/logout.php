<?php
	session_start();
	session_destroy();
	unset ($_SESSION['id']);
	unset ($_SESSION['username']);
	unset ($_SESSION['realname']);
	unset ($_SESSION['city']);
	unset ($_SESSION['email']);
	unset ($_SESSION['dob']);
	unset ($_SESSION['pp']);
	echo"<script language=javascript>document.location.href='../index.php'</script>";
?>