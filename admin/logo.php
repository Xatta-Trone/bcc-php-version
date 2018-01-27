<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Utilities.php'; ?>
<?php $Utilities = new Utilities(); ?>


<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateLogo'])) {
		$updateLogo = $Utilities->updateLogo($_FILES);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Logo</li>
</ol>
<?php if (isset($updateLogo)) {
	echo $updateLogo;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getAllData = $Utilities->getAllData(); ?>
<?php if ($getAllData): while ($utildata = $getAllData->fetch_assoc()): ?>
			<form method="POST" enctype="multipart/form-data">
				 
				<div class="form-group row">
				  <label class="col-2 col-form-label">Main Logo</label>
				  <div class="col-10">
				   	<img src="../file/img/<?php echo $utildata['primarylogo'];?>" style="height: 100px; width: auto;">
				  </div>
				</div>

				<div class="form-group row">
				  <label class="col-2 col-form-label">New Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="primarylogo">
				  </div>
				</div>

				<div class="form-group row">
				  <label class="col-2 col-form-label">Secondary Logo</label>
				  <div class="col-10">
				   	<img src="../file/img/<?php echo $utildata['secondarylogo'];?>" style="height: 100px; width: auto;">
				  </div>
				</div>

				<div class="form-group row">
				  <label class="col-2 col-form-label">New Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="secondarylogo">
				  </div>
				</div>

				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updateLogo" value="UPDATE" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>