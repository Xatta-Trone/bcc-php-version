<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/UserLevel.php'; ?>
<?php $userlevel = new UserLevel(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addLevel'])) {
		$levelInsert = $userlevel->addLevel($_POST);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Level Add</li>
</ol>
<?php if (isset($levelInsert)) {
	echo $levelInsert;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" >
				<div class="form-group row">
				  <label class="col-2 col-form-label">Add new level</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="levelname">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Power</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="power">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="addLevel" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>