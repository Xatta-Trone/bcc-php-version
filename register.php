<?php include 'inc/header.php'; ?>
<?php if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
	$sumitJoinData = $submission->JoinData($_POST);
} ?>
	
	<div class="contact-page-area contact-area pb-30">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="header-text">
						<h1>Join BCC</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsam iusto sunt perspiciatis facere, voluptate enim quisquam reprehenderit nihil eum, fugit maiores, nam molestias minima?</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="form-wrapper">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<?php if (isset($sumitJoinData)) {
										echo $sumitJoinData;
									} ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="name" placeholder=" Name...">
								</div>
								<div class="col-md-6">
									<input type="text" name="email" placeholder="Email address...">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="fathers_name" placeholder="Fathers Name...">
								</div>
								<div class="col-md-6">
									<input type="text" name="mothers_name" placeholder="Mothers Name...">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="student_id" placeholder="Student Id...">
								</div>
								<div class="col-md-6">
									<select class="custom-select" name="dept">
								    	<option value="">Select Dept.</option>
								    	<option value="EEE">EEE</option>
								    	<option value="CSE">CSE</option>
								    	<option value="ME">ME</option>
								    	<option value="NAME">NAME</option>
								    	<option value="CE">CE</option>
								    	<option value="MME">MME</option>
								    	<option value="WRE">WRE</option>
								    	<option value="IPE">IPE</option>
								    	<option value="Arch">Arch.</option>
								    	<option value="Che">ChE</option>
								    	<option value="BME">BME</option>
								    </select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="contact_1" placeholder="Contact number 1..">
								</div>
								<div class="col-md-6">
									<input type="text" name="contact_2" placeholder="Contact number 2..">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="fb_id" placeholder="facebook id....">
								</div>
								<div class="col-md-6">
									<input type="text" name="linkedin_id" placeholder="linkedin id(if any)...">
								</div>
							</div>
							<p><textarea cols="30" rows="5" name="address" placeholder="Your Address"></textarea></p>
							<div class="submit-form">
								<button class="submit-btn" type="submit" name="register">Register <i class="fa fa-paper-plane-o"></i></button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>