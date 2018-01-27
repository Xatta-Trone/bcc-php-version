<?php session_start(); ob_start();
 ini_set( 'display_errors', 1 ); 
 error_reporting( E_ALL );
    $filepathe = realpath(dirname(__FILE__));
    include $filepathe.'/../../lib/Session.php';

    Session::init();
    Session::chkAdminSession();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php 
    if (isset($_GET['action']) && $_GET['action']=='logout') {
    Session::destroy();
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
  <link rel="stylesheet" href="css/codemirror.min.css">
  <link rel="stylesheet" href="css/froala_editor.pkgd.min.css">
  <link rel="stylesheet" href="css/froala_style.min.css">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/bootstrap-tagsinput.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

