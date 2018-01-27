<?php 


	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../config/constant.php');


/**
* 
*/
class MailTemplate {
	

	public function NewMemberAdd($membername,$memberemail,$password,$code){

		$body = '<!DOCTYPE html>
				<html>
				<head>
					<title>BCC Email</title>
					
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

					<style type="text/css">
						*{margin: 0; padding: 0}
						html,body{
							font-family: \'Lato\', sans-serif;
							font-size: 12px;
							background:  #f9f9f9;
						    color: #999;
						    height: 100%;
						}
						.template p{
							color: #999;
						}
						.template{background-color:  #f9f9f9;height: 100%;padding: 20px;}

						.template-wrapper {
						    width:  600px;
						    margin:  0 auto;
						    background: #fff;
						    padding:  50px;
						    box-shadow: 0 0 5px #eee;
						    -webkit-box-shadow: 0 0 5px #eee;
						    -moz-box-shadow: 0 0 5px #eee;
						}
						.template h1{
							margin: 5px 0;
						}

						.template h1,.template a {
						    color:  #222;
						    font-size:  18px;
						}
						.template a{
							font-size: 12px;
						}

						.template img.logo {
						    height: 60px;
						    width:  auto;
						    display: inline-block;
						    /* margin-bottom: 3px; */
						}
						.template hr{
							color:#fff;
						}

						.single-section span {
						    color: #222;
						}
						.template strong {
						    color:  #222;
						    font-weight:  700;
						}

						.single-section p {
						    margin:  0;
						    line-height: 1.6;
						}

						.single-btn {
						    background: #FF4242;
						    display:  inline-block;
						    padding:  10px 20px;
						    text-align:  center;
						    font-size:  20px;
						    margin: 15px auto;
						    min-width:  20%;
						}

						.single-btn a {
						    color:  #fff;
						    text-decoration:  none;
						    display: block;
						}
						.single-btn a {font-size: 20px;}

					</style>
				</head>
				<body>

				<div class="template">
					<div class="template-wrapper">
						<div class="single-section">
							<img src="http://buetcareerclub.org//file/img/main-logo.png" class="logo">
						</div>
						<div class="single-section">
							<h1>Account activation</h1>
						</div>
						<div class="single-section">
							<p>Hi, <strong>'.$membername.'</strong></p>
							<p>
								You are receiving this email because you have been registered as an executive of <strong>BUET Career Club</strong>.
								Here is you account credentials.

							</p>
							<p>
								Username: <strong>'.$memberemail.'</strong><br>
								Password: <strong>'.$password.'</strong>
							</p>
							<p>
								You can change your password by logging in into your account.
							</p>
						</div>
						<div class="single-section" style="text-align: center;">
							<div class="single-btn">
								<a href="http://buetcareerclub.org/login.php">Login</a>
							</div>
							<div class="single-btn">
								<a href="http://buetcareerclub.org/resetpassword.php?email='.$memberemail.'&&code='.$code.'">Reset Passowrd</a>
							</div>
						</div>

						<div class="single-section">
							<p>Have a good day.</p>
						</div>
						<hr>
						<div class="single-section">
							<p>Admin, BUET Career Club.</p>
							<p>admin@buetcareerclub.org</p>
						</div>
						<div class="single-section">
							<a href="http://buetcareerclub.org/">Visit Website</a>
						</div>
					</div>
				</div>

				</body>
				</html>';

		return $body;

	}


	public function resetPassword($memberemail,$code){

		$body = '<!DOCTYPE html>
				<html>
				<head>
					<title>BCC Email</title>
					
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

					<style type="text/css">
						*{margin: 0; padding: 0}
						html,body{
							font-family: \'Lato\', sans-serif;
							font-size: 12px;
							background:  #f9f9f9;
						    color: #999;
						    height: 100%;
						}
						.template p{
							color: #999;
						}
						.template{background-color:  #f9f9f9;height: 100%;padding: 20px;}

						.template-wrapper {
						    width:  600px;
						    margin:  0 auto;
						    background: #fff;
						    padding:  50px;
						    box-shadow: 0 0 5px #eee;
						    -webkit-box-shadow: 0 0 5px #eee;
						    -moz-box-shadow: 0 0 5px #eee;
						}
						.template h1{
							margin: 5px 0;
						}

						.template h1,.template a {
						    color:  #222;
						    font-size:  18px;
						}
						.template a{
							font-size: 12px;
						}

						.template img.logo {
						    height: 60px;
						    width:  auto;
						    display: inline-block;
						    /* margin-bottom: 3px; */
						}
						.template hr{
							color:#fff;
						}

						.single-section span {
						    color: #222;
						}
						.template strong {
						    color:  #222;
						    font-weight:  700;
						}

						.single-section p {
						    margin:  0;
						    line-height: 1.6;
						}

						.single-btn {
						    background: #FF4242;
						    display:  inline-block;
						    padding:  10px 20px;
						    text-align:  center;
						    font-size:  20px;
						    margin: 15px auto;
						    min-width:  20%;
						}

						.single-btn a {
						    color:  #fff;
						    text-decoration:  none;
						    display: block;
						}
						.single-btn a {font-size: 20px;}

					</style>
				</head>
				<body>

				<div class="template">
					<div class="template-wrapper">
						<div class="single-section">
							<img src="http://buetcareerclub.org//file/img/main-logo.png" class="logo">
						</div>
						<div class="single-section">
							<h1>Reset Password</h1>
						</div>
						<div class="single-section">
							<p>Hi, <strong></strong></p>
							<p>
								Please use the code below to chnage your password. Alternatively you can use the link below to change your password directly.
							</p>
							<p>
								If you have not initiated this request, report it to us immediately.
							</p>
							<p>
								Code: <strong>'.$code.'</strong>
							</p>
						</div>
						<div class="single-section" style="text-align: center;">
							<div class="single-btn">
								<a href="http://buetcareerclub.org/resetpassword.php?email='.$memberemail.'&&code='.$code.'">Reset Password</a>
							</div>
						</div>

						<div class="single-section">
							<p>Have a good day.</p>
						</div>
						<hr>
						<div class="single-section">
							<p>Admin, BUET Career Club.</p>
							<p>admin@buetcareerclub.org</p>
						</div>
						<div class="single-section">
							<a href="http://buetcareerclub.org/">Visit Website</a>
						</div>
					</div>
				</div>

				</body>
				</html>';

		return $body;

	}

	public function receiveConfirmation($name,$email){

		$body = '<!DOCTYPE html>
				<html>
				<head>
					<title>BCC Email</title>
					
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

					<style type="text/css">
						*{margin: 0; padding: 0}
						html,body{
							font-family: \'Lato\', sans-serif;
							font-size: 12px;
							background:  #f9f9f9;
						    color: #999;
						    height: 100%;
						}
						.template p{
							color: #999;
						}
						.template{background-color:  #f9f9f9;height: 100%;padding: 20px;}

						.template-wrapper {
						    width:  600px;
						    margin:  0 auto;
						    background: #fff;
						    padding:  50px;
						    box-shadow: 0 0 5px #eee;
						    -webkit-box-shadow: 0 0 5px #eee;
						    -moz-box-shadow: 0 0 5px #eee;
						}
						.template h1{
							margin: 5px 0;
						}

						.template h1,.template a {
						    color:  #222;
						    font-size:  18px;
						}
						.template a{
							font-size: 12px;
						}

						.template img.logo {
						    height: 60px;
						    width:  auto;
						    display: inline-block;
						    /* margin-bottom: 3px; */
						}
						.template hr{
							color:#fff;
						}

						.single-section span {
						    color: #222;
						}
						.template strong {
						    color:  #222;
						    font-weight:  700;
						}

						.single-section p {
						    margin:  0;
						    line-height: 1.6;
						}

						.single-btn {
						    background: #FF4242;
						    display:  inline-block;
						    padding:  10px 20px;
						    text-align:  center;
						    font-size:  20px;
						    margin: 15px auto;
						    min-width:  20%;
						}

						.single-btn a {
						    color:  #fff;
						    text-decoration:  none;
						    display: block;
						}
						.single-btn a {font-size: 20px;}

					</style>
				</head>
				<body>

				<div class="template">
					<div class="template-wrapper">
						<div class="single-section">
							<img src="http://buetcareerclub.org//file/img/main-logo.png" class="logo">
						</div>
						<div class="single-section">
							<h1>Confirmation</h1>
						</div>
						<div class="single-section">
							<p>Hi, <strong>'.$name.'</strong></p>
							<p>
								This email is to let you know that we have received your submission.
							</p>
							<p>
								This is an auto reply. Please do not reply to this email.
							</p>
							
						</div>

						<div class="single-section">
							<p>Have a good day.</p>
						</div>
						<hr>
						<div class="single-section">
							<p>Admin, BUET Career Club.</p>
							<p>admin@buetcareerclub.org</p>
						</div>
						<div class="single-section">
							<a href="http://buetcareerclub.org/">Visit Website</a>
						</div>
					</div>
				</div>

				</body>
				</html>';

		return $body;

	}















}












 ?>