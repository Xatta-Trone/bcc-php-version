<?php include 'inc/header.php'; ?>


	<div class="team-section">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span>Home / Programs / Cracking GRE</span>
						<h2>Cracking GRE</h2>
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
<?php $getAllSlides = $slider->getSlideByProgramme(); ?>
<?php if ($getAllSlides): foreach($getAllSlides as $singleSlideItem): ?>
		<div class="single-slide-item">
			<div class="img-continer" style="background-image: url(file/img/<?php echo $singleSlideItem['image']; ?>);"></div>
			<p><?php if (!empty($singleSlideItem['caption'])) {echo $singleSlideItem['caption'];} ?></p>
			
		</div>
<?php endforeach;endif; ?>
						<!-- <div class="single-slide-item">
							<div class="img-continer" style="background-image: url(img/2.jpg);"></div>
							<p>Lorem ipsum dolor sit amet.</p>
						</div> -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="single-event-summery-content">
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
				<div class="user-posts text-center section-padding">
					<h1>Recent Events on GRE</h1>
					<div class="row no-gutters">

<?php $getAllPost = $post->getAllPost(); ?>
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
								<a href="single-news-post.html" class="news-link"></a>
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