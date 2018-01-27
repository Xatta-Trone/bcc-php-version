<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/UserLevel.php'; ?>
<?php include $filepath.'/../classes/Member.php'; ?>
<?php include $filepath.'/../classes/Position.php'; ?>
<?php include $filepath.'/../classes/Area.php'; ?>
<?php $userlevel = new UserLevel(); ?>
<?php $member    = new Member(); ?>
<?php $position  = new Position(); ?>
<?php $area      = new Area(); ?>
<?php $getAllArea = $area->areaList(); ?>
<?php $getAllPosition = $position->PositionList(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addMember'])) {
		$memberInsert = $member->addMember($_POST,$_FILES);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Member Add</li>
</ol>
<?php if (isset($memberInsert)) {
	echo $memberInsert;
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
				  <label class="col-2 col-form-label">Dept.</label>
				  <div class="col-10">
				    <select class="form-control" name="dept">
				    	<option value="">Select Dept.</option>
				    	<option value="EEE">EEE</option>
				    	<option value="CSE">CSE</option>
				    	<option value="ME">ME</option>
				    	<option value="URP">URP</option>
				    	<option value="NAME">NAME</option>
				    	<option value="CE">CE</option>
				    	<option value="MME">MME</option>
				    	<option value="WRE">WRE</option>
				    	<option value="IPE">IPE</option>
				    	<option value="Arch">Arch.</option>
				    	<option value="Che">ChE</option>
				    	<option value="BME">BME</option>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Area</label>
				  <div class="col-10">
				    <select class="form-control" name="area">
				    	<option value="">Select Area.</option>
<?php if ($getAllArea): foreach($getAllArea as $singleArea) : ?>
				    	<option value="<?php echo $singleArea['id'] ?>"><?php echo $singleArea['areaname']; ?></option>
<?php endforeach; endif; ?>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Position</label>
				  <div class="col-10">
				    <select class="form-control" name="position">
				    	<option value="">Select Positon</option>
<?php if ($getAllPosition): foreach($getAllPosition as $singlePosition) : ?>
				    	<option value="<?php echo $singlePosition['id'] ?>"><?php echo $singlePosition['positionname']; ?></option>
<?php endforeach; endif; ?>
				    </select>
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