<?php include 'inc/header.php'; ?>
	
	<div class="contact-page-area contact-area">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
					<div class="header-text">
						<h1>Talk to a human</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ipsam iusto sunt perspiciatis facere, voluptate enim quisquam reprehenderit nihil eum, fugit maiores, nam molestias minima?</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-lg-8 mx-auto">
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
								<div class="col-md-6">
									<input type="text" name="fname" placeholder="First Name...">
								</div>
								<div class="col-md-6">
									<input type="text" name="lname" placeholder="Last Name...">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="email" placeholder="Email address..">
								</div>
								<div class="col-md-6">
									<input type="text" name="subject" placeholder="Subject">
								</div>
							</div>
							<p><textarea cols="30" rows="5" name="message" placeholder="Your Message"></textarea></p>
							<div class="submit-form">
								<button class="submit-btn" type="submit" name="sendMessage">Send Message <i class="fa fa-paper-plane-o"></i></button>
							</div>

						</form>
					</div>

					<div class="other-contact-area">
						<h2>Other ways to reach</h2>
<?php $getAllSocialLinks = $utilities->getAllData(); ?>
<?php if ($getAllSocialLinks):while($links = $getAllSocialLinks->fetch_assoc()): ?>
						<ul>
							<li><i class="fa fa-envelope"></i><?= htmlspecialchars_decode($links['email']); ?></li>
							<li><i class="fa fa-phone"></i><?= htmlspecialchars_decode($links['phone']); ?></li>
							<li><i class="fa fa-facebook"></i><a href="<?= htmlspecialchars_decode($links['fb']); ?>">Buet Career Club</a></li>
							<li><i class="fa fa-map-marker"></i><?= htmlspecialchars_decode($links['address']); ?></li>
						</ul>
<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>