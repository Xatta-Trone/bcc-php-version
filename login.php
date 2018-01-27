<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/classes/Member.php'; ?>
<?php $Member = new Member(); ?>
<?php
  if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['login'])) {
    $memberLogin = $Member->memberLogin($_POST);
  }
  Session::chkLogin();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800,900|Oswald:400,700" rel="stylesheet">


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>

<div class="login-page-wrapper oh">
	<div class="bcc-table">
		<div class="bcc-tcell">
			<div class="row">
				<div class="col-md-5 col-sm-8 mx-auto">
					<div class="form-wrapper">
						<form action="" method="POST">
							<h2>Login</h2>
<?php if (isset($memberLogin)) {echo $memberLogin;}?>
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="email" placeholder="Enter Your email">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="password" name="password" placeholder="Enter Your password">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-xl-4">
									<button type="submit" class="submit-btn" name="login">Login</button>
								</div>
								<div class="col-md-12 col-xl-8 text-xl-right text-sm-left">
									<a href="index.php">Home</a> | <a href="recoverpassword.php">Forgot Password !</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>













<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>