<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Utilities.php'; ?>
<?php $Utilities = new Utilities(); ?>


<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['update'])) {
		$updateLogo = $Utilities->UpdateHeaderFooter($_POST);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Header Footer</li>
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
				  <label class="col-2 col-form-label">Google Analytics</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="googleanalytics" value="<?php echo $utildata['google_analytics']; ?>">
				  </div>
				</div> 
				<div class="form-group row">
				  <label class="col-2 col-form-label">Anything for header</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="header-text" value="<?php echo $utildata['header_text']; ?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Footer text</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="footer-text" value="<?php echo $utildata['footer_text']; ?>">
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