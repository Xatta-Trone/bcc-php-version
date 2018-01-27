<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Contact.php'; ?>
<?php $Contact = new Contact(); ?>
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
}else{
	//header("Location:memberlist.php");
	echo "<script>window.location = 'Messagelist.php'</script>";
} ?>

<?php 
	if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['reply'])) {
		$reply = $Contact->reply($_POST,$id);
	//	var_dump($_POST);
	}
 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Mail Reply</li>
</ol>
<?php if (isset($reply)) {
	echo $reply;
} ?>
<hr>

<div class="container">
	<div class="row">
		<div class="col-md-12">
<?php $getMessageById = $Contact->getMessageById($id); ?>
<?php if ($getMessageById): while ($memberdata = $getMessageById->fetch_assoc()): ?>
			<form method="POST" enctype="multipart/form-data">
				<div class="form-group row">
				  <label class="col-2 col-form-label">To</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="to" value="<?php echo $memberdata['email'];?>" readonly>
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">From</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="from" value="xatta.trone@gmail.com">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Subject</label>
				  <div class="col-10">
				    <input class="form-control" type="text" name="subject" value="<?php echo $memberdata['subject'];?>">
				  </div>
				</div>
				<div class="form-group row">
				  <label class="col-2 col-form-label">Message</label>
				  <div class="col-10">
				    <textarea id="post" name="message" class="form-control" style="height: 300px;"></textarea>
				  </div>
				</div>
				<div class="form-group row">
					<label for="" class="col-2 col-form-label"></label>
				  <div class="col-10 col-md-offset-2">
				    <input type="submit" name="reply" value="Send" class="btn btn-success">
				  </div>
				</div>
			</form>
<?php endwhile; endif; ?>
		</div>
	</div>
</div>





<?php include 'inc/footer.php'; ?>