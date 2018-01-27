<?php include 'inc/header.php'; ?>
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {$id = $_GET['id'];}else{header("Location:404.php");}?>
<?php //$post->updatePostviewById($id); ?>
<?php $getBlogData = $post->getSinglePostById($id);  ?>
<?php if ($getBlogData): while ($value = $getBlogData->fetch_assoc()):?>


	<div class="team-section blog-bg" style="background-image: url(file/img/<?= $value['image']; ?>);">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2><?= $value['title']; ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="blog-content-wrapper">
		<div class="container">
			<div class="blog-content-top-margin">
				
				<div class="row">


					<div class="col-md-8">
						<div class="blog-meta-content">
							<!-- <div class="blog-header">
								<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, est.</h2>
							</div>
							<hr> -->
							<p><span><i class="fa fa-clock-o"></i><?= $fm->formatDatePost($value['created_at']); ?></span> | <span><i class="fa fa-eye"></i><?= $value['views']; ?></span> <!-- |
							<span><i class="fa fa-comments"></i>520</span> --></p>
							<hr>
							<p>
								<span><a href="profile.php?uid=<?= $value['user']; ?>"><i class="fa fa-user"></i><?= $value['name']; ?></a></span> | 
								<span><i class="fa fa-tags"></i>
									<?php $tags = explode(',',$value['tags']) ?>
									<?php if ($tags): foreach($tags as $tag): ?>
										<a href=""><?= $tag ?></a>
									<?php endforeach;endif; ?>
								</span></p>
							<hr>
						</div>
						<div class="blog-detail fr-view">
							<?= htmlspecialchars_decode($value['body']); ?>
						</div>
<div class="fb-comments" data-href="" data-numposts="5" data-width="100%"></div>

					</div>

<?php endwhile; else: { header("Location:404.php");} endif; ?>

					<div class="col-md-4">
						<div class="blog-sidebar">
							<h4>Recent Posts</h4>
							<ul>
<?php $getRecentPost = $post->getRecentPost(); ?>
<?php if ($getRecentPost): foreach($getRecentPost as $singleRecentPost): ?>

								<li>
									<a href="post.php?id=<?= $singleRecentPost['id']; ?>">
										<img src="file/img/<?= $singleRecentPost['image']; ?>">
										<h4><?= $singleRecentPost['title']; ?></h4>
									</a>
								</li>
<?php endforeach;else: ?>
								<li>
									<a href="404.php">
										<img src="img/ne1.jpg">
										<h4 class="text-muted">No Post Found</h4>
									</a>
								</li>
<?php endif; ?>


							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include 'inc/footer.php'; ?>