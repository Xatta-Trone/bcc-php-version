
<div class="footer-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-widget">
					<h1>BCC</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis tempora nulla soluta animi nemo quidem enim voluptas nihil rem modi!</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-widget">
					<h2>Links</h2>
					<ul>
						<li><a href="team.php">Team</a></li>
						<li><a href="alumni.php">Alumni</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="register.php">Join</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="news-events.php">News</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-widget">
					<h2>Follow</h2>
					<div class="social-icons">
<?php $getAllSocialLinks = $utilities->getAllData(); ?>
<?php if ($getAllSocialLinks):while($links = $getAllSocialLinks->fetch_assoc()): ?>
						<a target="_blank" href="<?= $links['fb']; ?>"><i class="fa fa-facebook"></i></a>
						<a target="_blank" href="<?= $links['twitter']; ?>"><i class="fa fa-twitter"></i></a>
						<a target="_blank" href="<?= $links['linkedin']; ?>"><i class="fa fa-linkedin"></i></a>
						<a target="_blank" href="<?= $links['youtube']; ?>"><i class="fa fa-youtube"></i></a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="minifooter">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<!-- &copy; all rights reserved BCC-2017 -->
				<?= htmlspecialchars_decode($links['footer_text']); ?>
			</div>
			<div class="col-md-6 text-md-right">
				Developed By <a target="_blank" href="https://www.facebook.com/monzurul.islam1112">Monzurul Islam</a> &amp; <a target="_blank" href="https://www.facebook.com/kinjol.barua">Kinjol Barua</a>
			</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>

<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>