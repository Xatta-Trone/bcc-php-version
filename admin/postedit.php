<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php include $filepath.'/../classes/Post.php'; ?>
<?php $Programme  = new Programme(); ?>
<?php $Post      = new Post(); ?>
<?php $ProgrammeList = $Programme->ProgrammeList(); ?>
<?php 

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = $_GET['id'];
	}else{
		echo "<script>window.location = 'postlist.php'</script>";
	}


	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updatePost'])) {
		$updatePostById = $Post->updatePostById($_POST,$_FILES,$id);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">
		Post Edit
	</li>
</ol>
<?php if (isset($updatePostById)) {
	echo $updatePostById;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getPostById = $Post->getPostById($id); ?>
<?php if ($getPostById): while ($value = $getPostById->fetch_assoc()) :?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Title</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="title" value="<?php echo $value['title']; ?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Programme</label>
				  <div class="col-10">
				    <select class="form-control" name="programme">
				    	<option value="">Select Programme.</option>
<?php if ($ProgrammeList): foreach($ProgrammeList as $singleProgramme) : ?>
				    	<option value="<?php echo $singleProgramme['id'] ?>"
				    		<?php if ($value['programme']== $singleProgramme['id']){
				    			echo "selected = 'selected'";
				    		}?>><?php echo $singleProgramme['programmename']; ?></option>
<?php endforeach; endif; ?>
				    </select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Type</label>
				  <div class="col-10">
				  	<select name="posttype" class="form-control">
				  		<option value="">Select Type</option>
				  		<option value="1" <?php if ($value['posttype']=='1'){
				    			echo "selected = 'selected'";} ?>>Blog</option>
				  		<option value="2" <?php if ($value['posttype']=='2'){
				    			echo "selected = 'selected'";} ?>>News &amp; Events(Upcoming)</option>
				  		<option value="3" <?php if ($value['posttype']=='3'){
				    			echo "selected = 'selected'";} ?>>News &amp; Events(Past)</option>
				  	</select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Post</label>
				  <div class="col-10">
				    <textarea id="post" name="postdata"><?php echo $value['body']; ?></textarea>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Tags</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="tags" data-role="tagsinput" value="<?php echo $value['tags']; ?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				    <img src="../file/img/<?php echo $value['image']; ?>" style="height: 200px; width: auto;">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">new Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="postimg">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="updatePost" value="Update" class="btn btn-primary">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>