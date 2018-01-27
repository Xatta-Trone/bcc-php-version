<?php session_start(); ob_start(); ?>
<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/../classes/Member.php'; ?>
<?php $Member = new Member(); ?>
<?php
  if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['change'])) {
    $changePassword = $Member->changePassword($_POST);
  }


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Chnage Password</div>
<?php if (isset($changePassword)) {echo $changePassword;}?>
      <div class="card-body">
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Old Password</label>
            <input class="form-control"  type="password"  placeholder="Enter old password" name="oldPassword">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">New Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="New Password" name="newpassword">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Retype New Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Retype Password" name="repassword">
          </div>
          <!-- <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div> -->
          <input type="submit" name="change" value="Chnage Password" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
