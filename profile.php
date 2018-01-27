<?php include 'inc/header.php'; ?>
<?php if (isset($_GET['uid']) && !empty($_GET['uid'])) {
	$id= $_GET['uid'];
}elseif (Session::get('userId') != false) {
	$id=Session::get('userId');
}else{
	header("Location:404.php");
}
?>



<?php $getMemberData = $member->getMemberAllDataById($id); ?>
<?php if ($getMemberData): while($data = $getMemberData->fetch_assoc()):?>
	
	<div class="user-profile-area">

		<div class="user-profile-img">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-avatar-area">
							<div class="profile-avatar">
								<img src="file/img/<?= $data['image']; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="profile-details-area">
						<h1><?= $data['name']; ?></h1>
						<p><span><?= $data['positionname']; ?></span> @ <?= $data['areaname']; ?></p>
						<span>
							<?php if (Session::get('isLoggedIn') != false): ?>
							<a href="editptofile.php" title="Edit Profile"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<?php endif; ?>
						</span>
					</div>

					<div class="user-contact-section">
						<div class="row">
							<div class="col-4"><a target="_blank" href="<?= $data['fb']; ?>"><i class="fa fa-facebook"></i></a></div>
							<div class="col-4"><a target="_blank" href="<?= $data['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></div>
							<div class="col-4"><a target="_blank" href="<?= $data['email']; ?>"><i class="fa fa-envelope"></i></a></div>
						</div>
					</div>

					<div class="user-posts text-center section-padding">
						<h1>Posts by <?= $data['name']; ?></h1>
						<div class="row no-gutters h-100">


						<?php $getAllPost = $post->getAllPostById($id); ?>
						<?php if ($getAllPost): foreach($getAllPost as $singlePost): ?>
						<div class="col-md-6 col-lg-4">
							<div class="single-news-item-wrapper">
								<div class="news-img-container" style="background-image:url(file/img/<?php echo $singlePost['image']; ?>);"></div>
								<p><?php echo $singlePost['programmename']; ?></p>
								<div class="news-meta">
									<h3><?php echo $fm->textShorten($singlePost['title'],25); ?></h3>
									<span><i class="fa fa-user-o"></i> <?= $data['name']; ?></span>
									<span><i class="fa fa-clock-o"></i> <?php echo $fm->formatDatePost($singlePost['created_at']); ?></span>
								</div>
								<a href="post.php?id=<?= $singlePost['id']; ?>" class="news-link"></a>
							</div>
						</div>
						<?php endforeach;else: ?>
						<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Post Found</h1></div>
						<?php endif; ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php endwhile;endif; ?>

<?php include 'inc/footer.php'; ?>
