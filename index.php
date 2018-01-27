<?php include 'inc/header.php'; ?>

<?php include 'inc/hero-slider.php'; ?>

<div class="next-big-event section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<h1 class="">Gear Up, Next Big Event In</h1>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="clock-wrapper">
					<div id="clock">
						<div class="counter-container"><div class="counter-box first"><div class="number">100</div><span>Day</span></div>
				<div class="counter-box"><div class="number">50</div><span>Hours</span></div>
				<div class="counter-box"><div class="number">70</div><span>Minutes</span></div>
				<div class="counter-box last"><div class="number">44</div><span>Seconds</span></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="section-padding oh">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-12">
				<h1 class="header-text">Recent Events</h1>
			</div>
			<div class="col-md-10 col-sm-12">
				
<?php $getAllPost = $post->getPostByType(3); ?>
<?php if ($getAllPost): ?>
				<div class="recent-news-slide">
<?php foreach($getAllPost as $singlePost): ?>
					<div class="single-recent-news-slides">
						<div class="news-img" style="background-image: url(file/img/<?php echo $singlePost['image']; ?>);"></div>
						<div class="news-meta">
							<p><?php echo $singlePost['programmename']; ?></p>
							<h2><a href="post.php?id=<?php echo $singlePost['id']; ?>"><?php echo $fm->textShorten($singlePost['title'],25); ?></a></h2>
							<span class=""><i class="fa fa-calendar"></i> <?php echo $fm->formatDatePost($singlePost['created_at']); ?></span>
							<a href="post.php?id=<?php echo $singlePost['id']; ?>" class="readmore-btn float-right">Read More <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
<?php endforeach; ?>
				</div>
<?php else: ?>
			<div class="row h-100">
				<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Post Found</h1></div>
			</div>

<?php  endif; ?>
			</div>
		</div>
	</div>
</div>
<div class="membership-area">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>Join Buet Career Club</h2>
			</div>
			<div class="col-md-3">
				<a href="register.php" class="bcc-btn">Join US</a>
			</div>
		</div>
	</div>
</div>

<div class="section-padding grey-bg oh">
	<div class="container">
		<div class="row mh250">
			<div class="col-md-2">
				<h1 class="header-text">Upcoming Events</h1>
			</div>
			<div class="col-md-10">
				
<?php $getAllPost = $post->getPostByType(2); ?>
<?php if ($getAllPost): ?>
				<div class="upcoming-news-slide">
<?php foreach($getAllPost as $singlePost):  ?>
					<div class="single-recent-news-slides">
						<div class="news-img" style="background-image: url(file/img/<?php echo $singlePost['image']; ?>);"></div>
						<div class="news-meta">
							<p><?php echo $singlePost['programmename']; ?></p>
							<h2><a href="post.php?id=<?php echo $singlePost['id']; ?>"><?php echo $fm->textShorten($singlePost['title'],25); ?></a></h2>
							<span class=""><i class="fa fa-calendar"></i> <?php echo $fm->formatDatePost($singlePost['created_at']); ?></span>
							<a href="post.php?id=<?php echo $singlePost['id']; ?>" class="readmore-btn float-right">Read More <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
<?php endforeach;  ?>
				</div>
<?php else: ?>
	<div class="row h-100">
		<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Post Found</h1></div>
	</div>
<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="compay-area oh">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h1 class="header-text">Our Partners</h1>
			</div>
			<div class="col-md-10">
				<div class="company-logo-wrapper">
					<div class="company-logo">
						<img src="file/img/eco.png">
					</div>
					<div class="company-logo">
						<img src="img/company-1.png">
					</div>
					<div class="company-logo">
						<img src="img/company-2.png">
					</div>
					<div class="company-logo">
						<img src="img/company-3.png">
					</div>
					<div class="company-logo">
						<img src="img/company-4.png">
					</div>
					<div class="company-logo">
						<img src="img/company-1.png">
					</div>
					<div class="company-logo">
						<img src="img/company-2.png">
					</div>
					<div class="company-logo">
						<img src="img/company-3.png">
					</div>
					<div class="company-logo">
						<img src="img/company-4.png">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="membership-area">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>Become a volunteer</h2>
			</div>
			<div class="col-md-3">
				<a href="voulenteer.php" class="bcc-btn">Join US</a>
			</div>
		</div>
	</div>
</div>


<div class="section-padding contact-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="header-text">
					<h2>Get in Touch</h2>
				</div>
			</div>
		</div>
		<div class="form-wrapper">
			<div class="row">
				<div class="col-md-12">
					<?php if (isset($sendMessage)) {
						echo $sendMessage;
					} ?>
				</div>
			</div>
			<form method="POST">
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
	</div>
</div>
<?php include 'inc/footer.php'; ?>