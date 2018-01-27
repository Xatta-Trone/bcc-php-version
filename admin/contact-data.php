<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Utilities.php'; ?>
<?php $Utilities = new Utilities(); ?>


<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['update'])) {
		$updateLogo = $Utilities->ContactData($_POST);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Contact Data</li>
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
				  <label class="col-2 col-form-label">Email</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="email" value="<?php echo $utildata['email']; ?>">
				  </div>
				</div>  
				<div class="form-group row">
				  <label class="col-2 col-form-label">Phone</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="phone" value="<?php echo $utildata['phone']; ?>">
				  </div>
				</div>  
				<div class="form-group row">
				  <label class="col-2 col-form-label">Address</label>
				  <div class="col-10">
				   	<input type="text" class="form-control" name="address" value="<?php echo $utildata['address']; ?>">
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