<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Submission.php'; ?>
<?php $Submission = new Submission(); ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Submission List</li>
</ol>
<?php if (isset($deletePostById)) {
	echo $deletePostById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Submission List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>SID</th>
                  <th>FB</th>
                  <th>Email</th>
                  <th>linkedin.</th>
                  <th>Contact 1</th>
                  <th>Contact 2</th>
                  <th>Q 1</th>
                  <th>Q 2</th>
                  <th>Q 3</th>
                  <th>Q 4</th>
                  <th>Q 5</th>
                  <th>Q 6</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>SID</th>
                  <th>FB</th>
                  <th>Email</th>
                  <th>linkedin.</th>
                  <th>Contact 1</th>
                  <th>Contact 2</th>
                  <th>Q 1</th>
                  <th>Q 2</th>
                  <th>Q 3</th>
                  <th>Q 4</th>
                  <th>Q 5</th>
                  <th>Q 6</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllVolunteerSubmission = $Submission->getAllVolunteerSubmission(); ?>
<?php if ($getAllVolunteerSubmission):
		$i=1;
		foreach ($getAllVolunteerSubmission as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['dept']; ?></td>
                  <td><?php echo $value['student_id']; ?></td>
                  <td><?php echo $value['fb_id']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $value['linkedin_id']; ?></td>
                  <td><?php echo $value['contact_1']; ?></td>
                  <td><?php echo $value['contact_2']; ?></td>
                  <td><?php echo $value['question_1']; ?></td>
                  <td><?php echo $value['question_2']; ?></td>
                  <td><?php echo $value['question_3']; ?></td>
                  <td><?php echo $value['question_4']; ?></td>
                  <td><?php echo $value['question_5']; ?></td>
                  <td><?php echo $value['question_6']; ?></td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Submission Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>