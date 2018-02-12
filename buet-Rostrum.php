<?php include 'inc/header.php'; ?>


	<div class="team-section">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span>Home / Programs / BUET Rostrum</span>
						<h2>BUET Rostrum</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="single-programe-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="programe-slides">
						<!--Enter slider programme number here-->
						<?php $getAllSlides = $slider->getSlideByProgramme(3); ?>
						<?php if ($getAllSlides): foreach($getAllSlides as $singleSlideItem): ?>
						<div class="single-slide-item">
							<div class="img-continer" style="background-image: url(file/img/<?php echo $singleSlideItem['image']; ?>);"></div>
							<p><?php if (!empty($singleSlideItem['caption'])) {echo $singleSlideItem['caption'];} ?></p>
						</div>
						<?php endforeach; endif; ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="single-event-summery-content">
<?php $getProgrammeDescription = $programme->getProgrammeById(3) ?>
<?php $getProgrammeDescription = $getProgrammeDescription->fetch_assoc(); ?>
						<h2>Next session starts on <span>5th Jan 2018</span></h2>
						<span>
							<button type="button" class="btn bcc-btn" data-toggle="modal" data-target="#exampleModal">Register</button>
						</span>

						<div class="user-edit-modal">
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <form>
							          <div class="form-group">
							            <label for="recipient-name" class="form-control-label">Name:</label>
							            <input type="text" class="form-control" id="recipient-name" placeholder="Xatta Trone">
							          </div>
							          <div class="form-group">
							            <label for="recipient-name" class="form-control-label">Email:</label>
							            <input type="text" class="form-control" id="recipient-name" placeholder="xatta@xatta.xatta">
							          </div>
							          <div class="form-group">
							            <label for="recipient-name" class="form-control-label">Mobile:</label>
							            <input type="text" class="form-control" id="recipient-name" placeholder="+880 000 000 000">
							          </div>
							          <div class="form-group">
							            <label for="recipient-name" class="form-control-label">Trasnsaction Id:</label>
							            <input type="text" class="form-control" id="recipient-name" placeholder="123456789446" >
							          </div>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-danger">Submit</button>
							      </div>
							    </div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="fr-view">
					<?php echo htmlspecialchars_decode($getProgrammeDescription['programmedescription']); ?>
				</div>
				<div class="user-posts text-center section-padding">
					<h1>Recent Events on BUET Rostrum</h1>
					<div class="row no-gutters h-100">

<?php $getAllPost = $post->getAllPostByProgramme(3); ?>
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
				</div>
			</div>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>