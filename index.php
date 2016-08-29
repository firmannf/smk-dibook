<?php
	session_start();
	if(isset($_SESSION['id'])){
		echo "<script language=javascript>document.location.href='home.php'</script>";
	}
	
	if(!isset($_SESSION['signup'])){
		$_SESSION['signup'] = "";
	}
	
	if(!isset($_SESSION['login'])){
		$_SESSION['login'] = "";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dibook</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Daily diary">
		<meta name="author" content="DFF group">
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/landing.css" rel="stylesheet">
		<link href="css/toastr.css" rel="stylesheet">
		
		<!-- Javascript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/popbox.js"></script>
		<script src="js/toastr.js"></script>
		
		<!-- popup box for login -->
        <script type='text/javascript' charset='utf-8'>
			$(document).ready(function(){
             $('.popbox').popbox({
               'open'          : '.open-login',
               'box'           : '.box-login',
               'arrow'         : '.arrow-login',
               'arrow-border'  : '.arrow-border-login',
               'close'         : '.close-login'
              });
           });
		  </script>
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
					<a class="navbar-brand" href="#"><img style="margin-top:-5px; color:#" width="30px" src="img/dibook-logo.png" />ibook</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right nb-collapse popbox">
					<ul class="nav navbar-nav">
						<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
						<li>
							<a href="#" class="open-login">Login</a>
							<div class='collapse-login'>
								<div class='box-login'>
									<div class='arrow-login'></div>
									<div class='arrow-border-login'></div>
										<form role="form" style="margin-top:10%" method="POST" action="php/login.php" class="box-form-login">
											<input type="text" class="input-custom-1" placeholder="Username" name="username" style="margin-top: -10px" required>
											<input type="password" class="input-custom-2" placeholder="Password" name="password" required>
											<button class="btn btn-block btn-primary btn-custom-login" type="submit" name="signin">Sign in</button>
										</form>
										<a href="signup.php">Don't have an account ?</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		
		<!-- Cover header -->
		<div class="cover-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cover-message">
							<?php
								if($_SESSION['signup'] == "success"){
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
									toastr.success('Please Login Now!', 'Sign Up Success')
								</script>
							<?php				
									unset($_SESSION['signup']);
								}
							?>
							
							<?php
								if($_SESSION['login'] == "fail"){
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
									toastr.error('Wrong Username Or Password', 'Login Failed!')
								</script>
							<?php				
									unset($_SESSION['login']);
								}
							?>
							<img src="img/cover-dibook.png"/>
							<p>
								<img src="img/smile.png" width="50px"/>
								<img src="img/grinning.png" width="50px"/>
								<img src="img/sad.png" width="50px"/>
								<img src="img/crying.png" width="50px"/>
								<img src="img/neutral.png" width="50px"/>
								<img src="img/confused.png" width="50px"/>
								<h4>Happy,sad,bored,confused and whatever about your feelings<br/>just write it!</h4>
							</p>
						</div>
						<div class="cover-button-gsn">
							<a href="signup.php" class="btn btn-default btn-lg btn-custom">Get Started Now!</a>
						</div>
						<div class="cover-more">
							<a href="#about" id="aboutBtn">Want to know more about dibook? Let's click this! <br/><img src="img/arrow.png" width="20px"/></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Cover header -->
		
		<!--About -->
		<div id="about" class="cover-about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<br/><br/>
						<hr width="475px" class="cover-divider"><br/><br/>
						<h2>About Dibook</h2>
						<p>
							Dibook is a social media for write your feelings everyday.<br/>You can write your feelings and keep it secret<br/><br/>
							<img src="img/write.png" width="25px" style="margin-top: -7px"/>&nbsp;Write your diary everyday<br/><br/>
							<img src="img/grinning-2.png" width="25px" style="margin-top: -1px"/>&nbsp;Express your diary with emoticons<br/><br/>
							<img src="img/stat.png" width="25px" style="margin-top: 0px"/>&nbsp;View statistic about your feelings<br/><br/>
							<br/>
							<a href="signup.php" class="open-login btn btn-default btn-lg btn-custom-about-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SIGN UP NOW!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</p>
						<img src="img/about.png" width="50%" id="cover-about-img">
					</div>
				</div>
			</div>
		</div>
		<!-- End about -->
		
		<!--Copyright -->
		<div class="cover-copy">
			<p>&copy; 2014 Dibook &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">About</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Support</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Privacy</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Socmed</a></p>
		</div>
		<!--End copyright -->
		
		<!-- Javascript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/scrolld.js"></script>
		<script src="js/carousel.js"></script>
		
		<!-- Scroling on page -->
		<script type="text/javascript">
			$("[id*='Btn']").stop(true).on('click',function(e){e.preventDefault();$(this).scrolld();});
		</script>
		
    </body>
</html>