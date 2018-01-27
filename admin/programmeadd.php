<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php $Programme = new Programme(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addprog'])) {
		$ProgrammeInsert = $Programme->addProgramme($_POST);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Programme Add</li>
</ol>
<?php if (isset($ProgrammeInsert)) {
	echo $ProgrammeInsert;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" >
				<div class="form-group row">
				  <label class="col-2 col-form-label">Add new Programme</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="programmename">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Programme Description</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="programmedescription">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="addprog" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>