<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Slider.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php $Slider = new Slider(); ?>
<?php $Programme = new programme(); ?>
<?php $ProgrammeList = $Programme->ProgrammeList(); ?>
<?php if (!isset($_GET['id']) || $_GET['id']==NULL) {
	//header('Location:levellist.php');
	echo "<script>window.location = 'sliderlist.php'</script>";
}else{
	//$getLevelById  = $userlevel->getLevelById($_GET['id']);
	$id = $_GET['id'];
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['update'])) {
		$updateSliderById = $Slider->updateSliderById($_POST,$_FILES,$id);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Slider Edit</li>
</ol>
<?php if (isset($updateSliderById)) {
	echo $updateSliderById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getSlideById = $Slider->getSlideById($id); ?>
<?php if ($getSlideById): while ($value = $getSlideById->fetch_assoc()):?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-($id);form-label">Programme</label>
				  <div class="col-10">
				    <select class="form-control" name="programme">
				    	<option value="">Select Programme.</option>
<?php if ($ProgrammeList): foreach($ProgrammeList as $singleProgramme) : ?>
				    	<option value="<?php echo $singleProgramme['id'] ?>" <?php if ($value['programme']==$singleProgramme['id']){echo "selected = 'selected'";} ?>><?php echo $singleProgramme['programmename']; ?></option>
<?php endforeach; endif; ?>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				    <img style="height: 400px; width: auto;" src="../file/img/<?php echo $value['image']; ?>">
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
				    <textarea class="form-control" type="text" name="caption"><?php echo $value['caption']; ?></textarea>
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="update" value="Update" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>