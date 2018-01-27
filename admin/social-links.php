<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Utilities.php'; ?>
<?php $Utilities = new Utilities(); ?>


<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['update'])) {
		$updateLogo = $Utilities->SocialLinks($_POST);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Social Links</li>
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
				  <label class="col-2 col-form-label">Facebook</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="fb" value="<?php echo $utildata['fb']; ?>">
				  </div>
				</div>  
				<div class="form-group row">
				  <label class="col-2 col-form-label">Twitter</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="twitter" value="<?php echo $utildata['twitter']; ?>">
				  </div>
				</div>  
				<div class="form-group row">
				  <label class="col-2 col-form-label">Linkedin</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="linkedin" value="<?php echo $utildata['linkedin']; ?>">
				  </div>
				</div>  
				<div class="form-group row">
				  <label class="col-2 col-form-label">Youtube</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="youtube" value="<?php echo $utildata['youtube']; ?>">
				  </div>
				</div> 

				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="update" value="UPDATE" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>