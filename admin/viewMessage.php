<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Contact.php'; ?>
<?php $Contact = new Contact(); ?>
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$Contact->SeenMailbyId($id);
}else{
	//header("Location:memberlist.php");
	echo "<script>window.location = 'Messagelist.php'</script>";
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">View Message</li>
</ol>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getMessageById = $Contact->getMessageById($id); ?>
<?php if ($getMessageById): while ($memberdata = $getMessageById->fetch_assoc()): ?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">First Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="fname" value="<?php echo $memberdata['fname'];?>" disabled>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Last Name</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="membername" value="<?php echo $memberdata['lname'];?>" disabled>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Email</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberemail" value="<?php echo $memberdata['email'];?>" disabled>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Subject</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="memberfb" value="<?php echo $memberdata['subject'];?>" disabled>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Message</label>
				  <div class="col-10">
				    <textarea disabled class="form-control" style="height: 300px;"><?php echo $memberdata['body'];?></textarea>
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <a href="replymail.php?id=<?php echo $memberdata['id'];?>" class="btn btn-primary btn-xs">Reply</a>
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>