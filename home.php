<?php
	require "php/conn.php";
	session_start();
	if(!isset($_SESSION['id'])){
		echo "<script language=javascript>document.location.href='index.php'</script>";
	}
	
	if(!isset($_SESSION['create'])){
		$_SESSION['create'] = "";
	}
	
	if(!isset($_SESSION['edit'])){
		$_SESSION['edit'] = "";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dibook - Home</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Daily diary">
		<meta name="author" content="DFF group">
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/home.css" rel="stylesheet">
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
						<li>
							<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
								<?php echo $_SESSION['realname'];?>&nbsp;&nbsp;&nbsp;<img src="<?php if($_SESSION['pp'] == "") echo "php/pp/no.jpg"; else echo "php/pp/".$_SESSION['pp'];?>" width="25px" height="25px" class="img-circle">
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li><a href="edit_profile.php">Edit Profile</a></li>
								<li role="presentation" class="divider"></li>
								<li><a href="php/logout.php">Logout</a></li>
							 </ul>
						</li>
						<li>
							<a data-toggle="modal" href="#myModal"><img src="img/write.png" width="25px" height="25px" style="margin-top: -2px; opacity: 0.5 "/></a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		
		
		<div class="container">
			<?php
				if($_SESSION['edit'] == "success"){
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
						toastr.success('Your profile has been updated!', 'Success')
					</script>
			<?php				
					unset($_SESSION['edit']);
				}
			?>
			<?php
				if($_SESSION['create'] == "success"){
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
						toastr.success('Your diary has been created!', 'Success')
					</script>
			<?php				
					unset($_SESSION['create']);
				}else if($_SESSION['create'] == "fail"){
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
						toastr.error('Your diary  cant created!', 'Fail')
					</script>
			<?php				
					unset($_SESSION['create']);
				}
			?>
			
			<!-- Modal -->
			<form action="php/create_diary.php" method="POST">
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Write a diary</h4>
							</div>
						  <div class="modal-body">
							<input type="text" maxlength="100" name="title" placeholder="Title" class="form-control" style="margin-bottom:10px" required/>
							<textarea class="form-control" style="min-height: 250px; resize: none;" placeholder="Write your diary here...." name="diary" required></textarea>
							<table align="center">
								<tr align="center">
									<td><img src="img/smile-2.png" width="30px"/></td>
									<td><img src="img/sad-2.png" width="30px"/></td>
									<td><img src="img/grinning-2.png" width="30px"/></td>
									<td><img src="img/crying-2.png" width="30px"/></td>
									<td><img src="img/confused-2.png" width="30px"/></td>
									<td><img src="img/neutral-2.png" width="30px"/></td>
								</tr>
								<tr align="center">
									<td>Smile</td>
									<td>Sad</td>
									<td>Grinning</td>
									<td>Crying</td>
									<td>Confused</td>
									<td>Neutral</td>
								</tr>
								<tr align="center">
									<td><input type="radio" name="emot" value="smile" checked/></td>
									<td><input type="radio" name="emot" value="sad"/></td>
									<td><input type="radio" name="emot" value="grinning"/></td>
									<td><input type="radio" name="emot" value="crying"/></td>
									<td><input type="radio" name="emot" value="confused"/></td>
									<td><input type="radio" name="emot" value="neutral"/></td>
								</tr>
							</table>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" value="Create">
						  </div>
						</div>
					</div>
				</div>
			</form>
			<!-- end modal -->
			<div class="profile">
				<?php
						$id = $_SESSION['id'];
						$strQuery = "SELECT count(Id_Diary) FROM diary WHERE Id_User = '$id'";
						$query = mysql_query($strQuery);
						$result = mysql_fetch_row($query);
					?>
				<h3>@<?php echo $_SESSION['username']?></h3>
				<h5>&nbsp;Total Diary : <?php echo $result[0];?> Diary</h5>
			</div>
			<div style="">
			<?php include ('graph.php')?>
			</div>
			<div class="content">
				<ul>
					<li><h2>Your Diary</h2></li>
					<li><hr/></li>
					<?php
						$id = $_SESSION['id'];
						$strQuery = "SELECT * FROM diary WHERE Id_User = '$id' ORDER BY Id_Diary DESC";
						$query = mysql_query($strQuery);
						while($result = mysql_fetch_row($query)){
					?>
							<li>
								<div class="date"><?php echo $result[3];?></div>
								<div class="title"><?php echo $result[2];?></div>
								<div class="diary"><p><?php echo $result[4];?></p></div>
								<div class="emot">
									<?php if($result[5] == "smile"){?><img src="img/smile-2.png" width="20px"><?php } ?>
									<?php if($result[5] == "sad"){?><img src="img/sad-2.png" width="20px"><?php } ?>
									<?php if($result[5] == "grinning"){?><img src="img/grinning-2.png" width="20px"><?php } ?>
									<?php if($result[5] == "crying"){?><img src="img/crying-2.png" width="20px"><?php } ?>
									<?php if($result[5] == "confused"){?><img src="img/confused-2.png" width="20px"><?php } ?>
									<?php if($result[5] == "neutral"){?><img src="img/neutral-2.png" width="20px"><?php } ?>
									&nbsp;<?php echo $result[5]; ?>
								</div>
								<hr/>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
		
		<!-- Javascript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/scrolld.js"></script>
		<script src="js/modal.js"></script>
		<script src="js/dropdown.js"></script>
		
		<!-- dropdown -->
		<script type="text/javascript">
			$('.dropdown-toggle').dropdown()
		</script>
		
    </body>
</html>