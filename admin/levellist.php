<?php $filepath = realpath(dirname(__FILE__));?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
<?php include '../classes/UserLevel.php'; ?>
<?php $userlevel = new UserLevel(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteLevelById = $userlevel->deleteLevelById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Level List</li>
</ol>
<?php if (isset($deleteLevelById)) {
	echo $deleteLevelById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Level List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>power</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>power</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllLevel = $userlevel->levelList(); ?>
<?php if ($getAllLevel):
		$i=1;
		foreach ($getAllLevel as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['power']; ?></td>
                  <td>
                  	<a href="leveledit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                  	|| 
                  	<a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No level Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>