<?php include 'inc/header.php'; ?>
	
	<div class="team-section">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span>Home / Alumni</span>
						<h2>Alumni</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="single-team-group">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row h-100">
<?php $getAllAlumni = $alumni->getAllMembers(); ?>
<?php if ($getAllAlumni): foreach ($getAllAlumni as $singleAlumni): ?>
						<div class="col-md-4 col-lg-3 col-sm-6">
							<div class="single-team-member">
								<div class="team-member-img" style="background-image: url(file/img/<?= $singleAlumni['image']; ?>);">
									<div class="contact-links">
										<a target="_blank" href="<?= $singleAlumni['fb']; ?>"><i class="fa fa-facebook"></i></a>
										<a target="_blank" href="<?= $singleAlumni['linkedin']; ?>"><i class="fa fa-linkedin"></i></a>
										<a target="_blank" href="<?= $singleAlumni['email']; ?>"><i class="fa fa-envelope"></i></a>
									</div>
								</div>
								<div class="member-meta">
									<div class="member-name">
										<h3><?= $singleAlumni['name']; ?></h3>
									</div>
									<p><?= $singleAlumni['batch_dept']; ?></p>
								</div>
							</div>
						</div>
<?php endforeach; else:  ?>
<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Alumni Found</h1></div>
<?php endif; ?>		
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include 'inc/footer.php'; ?>