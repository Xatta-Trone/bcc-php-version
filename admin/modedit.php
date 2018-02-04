<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Moderator.php'; ?>
<?php $Moderator = new Moderator(); ?>
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
}else{
	//header("Location:memberlist.php");
	echo "<script>window.location = 'alumnilist.php'</script>";
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateMember'])) {
		$updateMemberById = $Moderator->updateMemberById($_POST,$_FILES,$id);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Moderator Edit</li>
</ol>
<?php if (isset($updateMemberById)) {
	echo $updateMemberById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getMemberById = $Moderator->getMemberById($id); ?>
<?php if ($getMemberById): while ($memberdata = $getMemberById->fetch_assoc()): ?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="membername" value="<?php echo $memberdata['name'];?>">
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
				  <label class="col-2 col-form-label">batch_dept</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="batch_dept" value="<?php echo $memberdata['batch_dept'];?>">
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
				    <input type="submit" name="updateMember" value="UPDATE" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>