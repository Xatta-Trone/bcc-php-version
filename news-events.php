<?php include 'inc/header.php'; ?>
<?php if (isset($_GET['page'])) {
	$page = $_GET['page'];
}else{
	$page = 1;
} 
$start_from = ($page-1)*12;
?>
	
	<div class="team-section">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span>Home / News &amp; Events</span>
						<h2>News &amp; Events</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="news-event-wrapper section-padding">
		<div class="container">
			<div class="row no-gutters h-100">
<?php $getAllPost = $post->getLimitedPostByType(12,$start_from); ?>
<?php if ($getAllPost): foreach($getAllPost as $singlePost): ?>
				<div class="col-md-6 col-lg-4">
					<div class="single-news-item-wrapper">
						<div class="news-img-container" style="background-image:url(file/img/<?php echo $singlePost['image']; ?>);"></div>
						<p><?php echo $singlePost['programmename']; ?></p>
						<div class="news-meta">
							<h3><?php echo $fm->textShorten($singlePost['title'],25); ?></h3>
							<span><i class="fa fa-user-o"></i> <?php echo $singlePost['name']; ?></span>
							<span><i class="fa fa-clock-o"></i> <?php echo $fm->formatDatePost($singlePost['created_at']); ?></span>
						</div>
						<a href="post.php?id=<?php echo $singlePost['id']; ?>" class="news-link"></a>
					</div>
				</div>
<?php endforeach;else: ?>
<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Post Found</h1></div>
<?php endif; ?>
			</div>


			<div class="row">
				<div class="col-md-12">
<?php $pagination =  $post->Pagaination(); ?>
					<ul class="pagination justify-content-center">
						<li><a href="news-events.php?page=1"><i class="fa fa-chevron-left"></i></a></li>
<?php for ($i=1; $i <=$pagination; $i++): ?>
						<li><a href="news-events.php?page=<?= $i ;?>" <?php if ($page==$i) {echo "class='active'";} ?>><?= $i; ?></a></li>
<?php endfor; ?>
						<li><a href="news-events.php?page=<?=$pagination ?>"><i class="fa fa-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>