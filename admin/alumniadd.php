<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/UserLevel.php'; ?>
<?php include $filepath.'/../classes/Alumni.php'; ?>
<?php $Alumni    = new Alumni(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addMember'])) {
		$AlumniInsert = $Alumni->addAlumni($_POST,$_FILES);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Add Alumni</li>
</ol>
<?php if (isset($AlumniInsert)) {
	echo $AlumniInsert;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="membername">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Email</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberemail">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Facebook</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberfb">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Linkedin</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberlinkedin">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Batch Dept</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="batch_dept">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="memberimage">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="addMember" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>