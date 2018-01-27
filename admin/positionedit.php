<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Position.php'; ?>
<?php $Area = new Position(); ?>

<?php if (!isset($_GET['id']) || $_GET['id']==NULL) {
	//header('Location:levellist.php');
	echo "<script>window.location = 'positionlist.php'</script>";
}else{
	//$getLevelById  = $userlevel->getLevelById($_GET['id']);
	$id = $_GET['id'];
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateArea'])) {
		$updatePositionById = $Area->updatePositionById($_POST,$id);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Position Edit</li>
</ol>
<?php if (isset($updatePositionById)) {
	echo $updatePositionById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php 
$getPositionById  = $Area->getPositionById($_GET['id']); 
if ($getPositionById) :
	while ($value = $getPositionById->fetch_assoc()): ?>
			<form method="POST" >
				<div class="form-group row">
				  <label class="col-2 col-form-label">Position Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="positionname" value="<?php echo $value['positionname'];?>">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updateArea" value="Updated" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif;?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>