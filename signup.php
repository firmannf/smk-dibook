<?php
	session_start();
	if(isset($_SESSION['id'])){
		echo "<script language=javascript>document.location.href='home.php'</script>";
	}
	
	if(!isset($_SESSION['signup'])){
		$_SESSION['signup'] = "";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dibook - Sign Up</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Daily diary">
		<meta name="author" content="DFF group">
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/signup.css" rel="stylesheet">
		<link href="css/toastr.css" rel="stylesheet">
		
		<!-- Javascript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/toastr.js"></script>
    </head>
	
   <body>	
		<nav class="navbar navbar-default navbar-fixed-top navbar-custom" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nb-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img style="margin-top:-5px" width="30px" src="img/dibook-logo.png" />ibook</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right nb-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Back</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		
		<div class="container">
			<?php
				if($_SESSION['signup'] == "fail"){
			?>
				<script language="javascript">
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"positionClass": "toast-bottom-right",
						"onclick": null,
						"showDuration": "3000",
						"hideDuration": "3000",
						"timeOut": "3000",
						"extendedTimeOut": "3000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
					toastr.error('Something wrong when attempting for signin up!', 'Fail')
				</script>
			<?php				
					unset($_SESSION['signup']);
				}
			?>
			<!-- Main component for a primary marketing message or call to action -->
			<div class="jumbotron custom-container">
				<hr width="135px" class="form-divider">
				<h2 style="padding-top: 25px; padding-bottom: 30px; letter-spacing: 2px; text-transform: uppercase;">Sign up</h2>
				<form action="php/signup.php" method="POST">
					<input type="text" class="form-control" placeholder="Fullname"name="realname" maxlength="100" required autofocus>
					<input type="text" class="form-control" placeholder="Username" name="username" maxlength="100" required>
					<input type="email" class="form-control" placeholder="E-Mail" name="email" required>
					<input type="password" class="form-control" placeholder="Password" name="password" maxlength="100" required>
					<input type="date" class="form-control" placeholder="Date Of Birth" name="dob" required>
					<input type="text" class="form-control" placeholder="City" name="city" maxlength="100" required>
					<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign up &raquo;" style="max-width:440px">
				</form>
			</div>

		</div> <!-- /container -->
		<!-- Javascript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/scrolld.js"></script>
		<script src="js/dropdown.js"></script>
		
		<!-- dropdown -->
		<script type="text/javascript">
			$('.dropdown-toggle').dropdown()
		</script>
		
    </body>
</html>