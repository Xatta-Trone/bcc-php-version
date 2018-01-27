<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php include $filepath.'/../classes/Slider.php'; ?>
<?php $Programme  = new Programme(); ?>
<?php $Slider      = new Slider(); ?>
<?php $ProgrammeList = $Programme->ProgrammeList(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addSlider'])) {
		$addSlider = $Slider->addSlider($_POST,$_FILES);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">
		Slider Add
	</li>
</ol>
<?php if (isset($addSlider)) {
	echo $addSlider;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Programme</label>
				  <div class="col-10">
				    <select class="form-control" name="programme">
				    	<option value="">Select Programme.</option>
<?php if ($ProgrammeList): foreach($ProgrammeList as $singleProgramme) : ?>
				    	<option value="<?php echo $singleProgramme['id'] ?>"><?php echo $singleProgramme['programmename']; ?></option>
<?php endforeach; endif; ?>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="sliderimg">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Caption</label>
				  <div class="col-10">
				    <textarea class="form-control" type="text" name="caption"></textarea>
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="addSlider" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>