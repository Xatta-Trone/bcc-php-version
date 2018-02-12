<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Utilities.php'; ?>
<?php $Utilities = new Utilities(); ?>
<?php 
  if (isset($_POST['submit'])) {
    $addImg  = $Utilities->imgUpload($_FILES);} ?>


<?php 
  $dir = '../file/img/';
  //$allImg = scandir($dir);
  $allImg = array_diff(scandir($dir), array('.', '..'));

  //var_dump($allImg);
  //exit();
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Img List</li>
</ol>
<?php if (isset($addImg)) {
	echo $addImg;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Img List</div>
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <input type="file" name="image">
          <br>
          <input type="submit" name="submit" value="upload">
        </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>