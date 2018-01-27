<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php include $filepath.'/../classes/Post.php'; ?>
<?php $Programme  = new Programme(); ?>
<?php $Post      = new Post(); ?>
<?php $ProgrammeList = $Programme->ProgrammeList(); ?>
<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['addPost'])) {
		$PostInsert = $Post->addPost($_POST,$_FILES);
	}


 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">
		Post add
	</li>
</ol>
<?php if (isset($PostInsert)) {
	echo $PostInsert;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">Title</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="title">
				  </div>
				</div>
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
				  <label class="col-2 col-form-label">Type</label>
				  <div class="col-10">
				  	<select name="posttype" class="form-control">
				  		<option value="">Select Type</option>
				  		<option value="1">Blog</option>
				  		<option value="2">News &amp; Events(Upcoming)</option>
				  		<option value="3">News &amp; Events(Past)</option>
				  	</select>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Post</label>
				  <div class="col-10">
				    <textarea id="post" name="postdata"></textarea>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Tags</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="tags" data-role="tagsinput">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Image</label>
				  <div class="col-10">
				    <input class="form-control" type="file" name="postimg">
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="addPost" value="Add" class="btn btn-primary">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>