<?php include 'inc/header.php'; ?>
<?php if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['Submit'])) {
	$sumitJoinData = $submission->VoluenteerData($_POST);
} ?>

	<div class="contact-page-area contact-area pb-30">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="header-text">
						<h1>Voluenteer Form</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsam iusto sunt perspiciatis facere, voluptate enim quisquam reprehenderit nihil eum, fugit maiores, nam molestias minima?</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="form-wrapper text-left volunteer-wrapper">
						<form method="POST">
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
									<input type="text" name="student_id" placeholder="Student ID...">
								</div>
								<div class="col-md-6">
									<input type="text" name="fb_id" placeholder="facebook id...">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="email" placeholder="Email address...">
								</div>
								<div class="col-md-6">
									<input type="text" name="linkedin_id" placeholder="Linkedin Id (if any)..">
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
								<div class="col-md-12">
									<p><strong>Please take your time &amp; answer the following questions !</strong></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>1. Are you curently involved with any club ? if any, write their names and your involvement.</p>
									<p><textarea cols="30" rows="5" name="question_1" placeholder="Your Answer"></textarea></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>2. Do you have any experience of volunteering ? if any, share your experience in brief.</p>
									<p><textarea cols="30" rows="5" name="question_2" placeholder="Your Answer"></textarea></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>3. Do you want to be a voluenteer of BUET Career Club ? Why ? </p>
									<p><textarea cols="30" rows="5" name="question_3" placeholder="Your Answer"></textarea></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>4. In which Dept. do you think you are best suited for ? </p>
									<div class="row">
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Logistics" name=" question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Logistics</span>
											</label>
										</div>
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Planning" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Planning</span>
											</label>
										</div>
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Design" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Design</span>
											</label>
										</div>
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="IT" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">IT</span>
											</label>
										</div>
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Public Relation" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Public Relation</span>
											</label>
										</div>
										<div class="col-md-4">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Finance" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Finance</span>
											</label>
										</div>
										<div class="col-md-12">
											<label class="custom-control custom-checkbox">
											  <input type="checkbox" class="custom-control-input" value="Event Management" name="question_4[]">
											  <span class="custom-control-indicator"></span>
											  <span class="custom-control-description">Event Management</span>
											</label>
										</div>
										<div class="col-md-12">
											<p>Other(mention please)</p>
											<p><textarea cols="30" rows="5" name="question_5" placeholder="Your activity"></textarea></p>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<p>5. What is your expectation from BCC ? </p>
									<p><textarea cols="30" rows="5" name="question_6" placeholder="Your Answer"></textarea></p>
								</div>
							</div>
							<div class="submit-form">
								<button class="submit-btn" type="submit" name="Submit">Submit <i class="fa fa-paper-plane-o"></i></button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>