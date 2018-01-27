<?php $filepath = realpath(dirname(__FILE__));?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php include '../classes/UserLevel.php'; ?>
<?php $userlevel = new UserLevel(); ?>

<?php if (!isset($_GET['id']) || $_GET['id']==NULL) {
	//header('Location:levellist.php');
	echo "<script>window.location = 'levellist.php'</script>";
}else{
	//$getLevelById  = $userlevel->getLevelById($_GET['id']);
	$id = $_GET['id'];
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateLevel'])) {
		$updateLevelById = $userlevel->updateLevelById($_POST,$id);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Level Edit</li>
</ol>
<?php if (isset($updateLevelById)) {
	echo $updateLevelById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php 
$getLevelById  = $userlevel->getLevelById($_GET['id']); 
if ($getLevelById) :
	while ($value = $getLevelById->fetch_assoc()): ?>
			<form method="POST" >
				<div class="form-group row">
				  <label class="col-2 col-form-label">Level Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="levelname" value="<?php echo $value['name'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Power</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="power" value="<?php echo $value['power'];?>">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updateLevel" value="Updated" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif;?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>