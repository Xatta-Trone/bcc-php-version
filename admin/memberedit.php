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
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
}else{
	//header("Location:memberlist.php");
	echo "<script>window.location = 'memberlist.php'</script>";
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateMember'])) {
		$updateMemberById = $member->updateMemberById($_POST,$_FILES,$id);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Member Edit</li>
</ol>
<?php if (isset($updateMemberById)) {
	echo $updateMemberById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getMemberById = $member->getMemberById($id); ?>
<?php if ($getMemberById): while ($memberdata = $getMemberById->fetch_assoc()): ?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="membername" value="<?php echo $memberdata['name'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Dept.</label>
				  <div class="col-10">
				    <select class="form-control" name="dept">
				    	<option value="">Select Dept.</option>
				    	<option value="EEE" <?php if ($memberdata['dept']=='EEE') {echo "selected='selected'";} ?> >EEE</option>
				    	<option value="CSE" <?php if ($memberdata['dept']=='CSE') {echo "selected='selected'";} ?>>CSE</option>
				    	<option value="ME" <?php if ($memberdata['dept']=='ME') {echo "selected='selected'";} ?>>ME</option>
				    	<option value="NAME" <?php if ($memberdata['dept']=='NAME') {echo "selected='selected'";} ?>>NAME</option>
				    	<option value="CE" <?php if ($memberdata['dept']=='CE') {echo "selected='selected'";} ?>>CE</option>
				    	<option value="MME" <?php if ($memberdata['dept']=='MME') {echo "selected='selected'";} ?>>MME</option>
				    	<option value="WRE" <?php if ($memberdata['dept']=='WRE') {echo "selected='selected'";} ?>>WRE</option>
				    	<option value="URP" <?php if ($memberdata['dept']=='URP') {echo "selected='selected'";} ?>>URP</option>
				    	<option value="IPE" <?php if ($memberdata['dept']=='IPE') {echo "selected='selected'";} ?>>IPE</option>
				    	<option value="Arch" <?php if ($memberdata['dept']=='Arch') {echo "selected='selected'";} ?>>Arch.</option>
				    	<option value="Che" <?php if ($memberdata['dept']=='Che') {echo "selected='selected'";} ?>>ChE</option>
				    	<option value="BME" <?php if ($memberdata['dept']=='BME') {echo "selected='selected'";} ?>>BME</option>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Area</label>
				  <div class="col-10">
				    <select class="form-control" name="area">
				    	<option value="">Select Area.</option>
<?php if ($getAllArea): foreach($getAllArea as $singleArea) : ?>
				    	<option value="<?php echo $singleArea['id'] ?>" <?php if ($memberdata['area']==$singleArea['id']) {echo "selected='selected'";} ?> ><?php echo $singleArea['areaname']; ?></option>
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
				    	<option value="<?php echo $singlePosition['id'] ?>" <?php if ($memberdata['position']==$singlePosition['id']) {echo "selected='selected'";} ?> ><?php echo $singlePosition['positionname']; ?></option>
<?php endforeach; endif; ?>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Email</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberemail" value="<?php echo $memberdata['email'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Facebook</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberfb" value="<?php echo $memberdata['fb'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Linkedin</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberlinkedin" value="<?php echo $memberdata['linkedin'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				   	<img src="../file/img/<?php echo $memberdata['image'];?>" style="height: 200px; width: auto;">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">New Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="memberimage">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updateMember" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>