<?php include 'inc/header.php'; ?>	

	<div class="team-section">
		<div class="page-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span>Home / Team</span>
						<h2>Meet The Team</h2>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php $getAllArea = $area->areaList('ASC'); ?>
<?php if ($getAllArea): foreach ($getAllArea as $singleArea): ?>
	<div class="single-team-group">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<h1 class="header-text"><?= $singleArea['areaname'];  ?></h1>
				</div>
				<div class="col-md-10">
					<div class="row h-100">
<?php $area_id = $singleArea['id']; ?>
<?php $getAllMembers = $member->getMemberByArea($area_id); ?>
<?php if ($getAllMembers): foreach ($getAllMembers as $singleMember): ?>
						<div class="col-md-6 col-lg-4 col-sm-6">
							<div class="single-team-member">
								<div class="team-member-img" style="background-image: url(file/img/<?= $singleMember['image']; ?>);">
									<div class="contact-links">
										<a target="_blank" href="<?= $singleMember['fb']; ?>"><i class="fa fa-facebook"></i></a>
										<a target="_blank" href="<?= $singleMember['linkedin']; ?>"><i class="fa fa-linkedin"></i></a>
										<a target="_blank" href="<?= $singleMember['email']; ?>"><i class="fa fa-envelope"></i></a>
									</div>
								</div>
								<div class="member-meta">
									<div class="member-name">
										<h3><?= $singleMember['name']; ?></h3>
									</div>
									<p><?= $singleMember['positionname']; ?></p>
								</div>
							</div>
						</div>
<?php endforeach; else: ?>
<div class="col-md-12 my-auto"><h1 class="text-center text-muted">No Member Found</h1></div>
<?php endif; ?>


				
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; endif; ?>
	



<?php include 'inc/footer.php'; ?>