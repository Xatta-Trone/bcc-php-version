<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php $Programme = new Programme(); ?>

<?php if (!isset($_GET['id']) || $_GET['id']==NULL) {
	//header('Location:levellist.php');
	echo "<script>window.location = 'programmelist.php'</script>";
}else{
	//$getLevelById  = $userlevel->getLevelById($_GET['id']);
	$id = $_GET['id'];
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateProgramme'])) {
		$updateProgrammeById = $Programme->updateProgrammeById($_POST,$id);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Programme Edit</li>
</ol>
<?php if (isset($updateProgrammeById)) {
	echo $updateProgrammeById;
} ?>
<hr>
	<span>** Insert img from  <a target="_blank" href="imglist.php">here</a></span>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php 
$getProgrammeById  = $Programme->getProgrammeById($_GET['id']); 
if ($getProgrammeById) :
	while ($value = $getProgrammeById->fetch_assoc()): ?>
			<form method="POST" >
				<div class="form-group row">
				  <label class="col-2 col-form-label">Programme Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="programmename" value="<?php echo $value['programmename'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Programme Desc</label>
				  <div class="col-10">
				  	<textarea id="post" name="programmedescription"><?php echo $value['programmedescription'];?></textarea>
				    <!-- <input class="form-control" type="text" name="programmedescription" value=""> -->
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updateProgramme" value="Updated" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif;?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>