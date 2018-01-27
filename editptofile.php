<?php include 'inc/header.php'; ?>
<?php
  $id = Session::get('userId');

  if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['updateProfile'])) {
		$updateMemberById = $member->updateMemberById($_POST,$_FILES,$id);}
  if (($_SERVER['REQUEST_METHOD']=='POST') && isset($_POST['change'])) {
   	 $changePassword = $member->changePassword($_POST);
  	}
?>
	<div class="contact-page-area contact-area">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="header-text">
						<h1>Change Password</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
<?php if (isset($changePassword)) {echo $changePassword;}?>
					<div class="form-wrapper">
						<form method="POST">
							<div class="row">
								<div class="col-md-12">
									<?php if (isset($sendMessage)) {
										echo $sendMessage;
									} ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 text-md-right">
									<span>Old password:</span>
								</div>
								<div class="col-md-8">
									<input type="password" placeholder="Enter old password" name="oldPassword">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 text-md-right">
									<span>New password:</span>
								</div>
								<div class="col-md-8">
									<input type="password" placeholder="New Password" name="newpassword">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 text-md-right">
									<span>Type Again:</span>
								</div>
								<div class="col-md-8">
									<input type="password" placeholder="Retype Password" name="repassword">
								</div>
							</div>
							<div class="submit-form">
								<button class="submit-btn" type="submit" name="change">Change <i class="fa fa-paper-plane-o"></i></button>
							</div>

						</form>
					</div>
				</div>
			</div>



			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="header-text">
						<h1>Edit Profile</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
<?php if (isset($updateMemberById)) {echo $updateMemberById;} ?>
					<div class="form-wrapper">
<?php $getMemberById = $member->getMemberById($id); ?>
<?php if ($getMemberById): while ($memberdata = $getMemberById->fetch_assoc()): ?>
						<form method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<?php if (isset($sendMessage)) {
										echo $sendMessage;
									} ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>Name:</span>
								</div>
								<div class="col-md-10">
									<input type="text" name="membername" value="<?php echo $memberdata['name'];?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>Dept.</span>
								</div>
								<div class="col-md-10">
									<select class="custom-select" name="dept">
								    	<option value="">Select Dept.</option>
								    	<option value="EEE" <?php if ($memberdata['dept']=='EEE') {echo "selected='selected'";} ?> >EEE</option>
								    	<option value="CSE" <?php if ($memberdata['dept']=='CSE') {echo "selected='selected'";} ?>>CSE</option>
								    	<option value="ME" <?php if ($memberdata['dept']=='ME') {echo "selected='selected'";} ?>>ME</option>
								    	<option value="NAME" <?php if ($memberdata['dept']=='NAME') {echo "selected='selected'";} ?>>NAME</option>
								    	<option value="CE" <?php if ($memberdata['dept']=='CE') {echo "selected='selected'";} ?>>CE</option>
								    	<option value="MME" <?php if ($memberdata['dept']=='MME') {echo "selected='selected'";} ?>>MME</option>
								    	<option value="WRE" <?php if ($memberdata['dept']=='WRE') {echo "selected='selected'";} ?>>WRE</option>
								    	<option value="IPE" <?php if ($memberdata['dept']=='IPE') {echo "selected='selected'";} ?>>IPE</option>
								    	<option value="URP" <?php if ($memberdata['dept']=='URP') {echo "selected='selected'";} ?>>URP</option>
								    	<option value="Arch" <?php if ($memberdata['dept']=='Arch') {echo "selected='selected'";} ?>>Arch.</option>
								    	<option value="Che" <?php if ($memberdata['dept']=='Che') {echo "selected='selected'";} ?>>ChE</option>
								    	<option value="BME" <?php if ($memberdata['dept']=='BME') {echo "selected='selected'";} ?>>BME</option>
								    </select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>Email:</span>
								</div>
								<div class="col-md-10">
									<input type="text" name="memberemail" value="<?php echo $memberdata['email'];?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>FB:</span>
								</div>
								<div class="col-md-10">
									<input type="text" name="memberfb" value="<?php echo $memberdata['fb'];?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>linkedin:</span>
								</div>
								<div class="col-md-10">
									<input type="text" name="memberlinkedin" value="<?php echo $memberdata['linkedin'];?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-2 text-md-right">
									<span>Image:</span>
								</div>
								<div class="col-md-10">
									<input type="file" name="memberimage" >
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="hidden" name="area" value="<?php echo $memberdata['area'];?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 ">
									<input type="hidden" name="position" value="<?php echo $memberdata['position'];?>">
								</div>
							</div>
							<div class="submit-form">
								<button class="submit-btn" type="submit" name="updateProfile">Update <i class="fa fa-paper-plane-o"></i></button>
							</div>
						</form>
<?php endwhile; endif; ?>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>