<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Alumni.php'; ?>
<?php $Alumni = new Alumni(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteMemberById = $Alumni->deleteMemberById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Alumni List</li>
</ol>
<?php if (isset($deleteMemberById)) {
	echo $deleteMemberById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Alumni List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>batch_dept</th>
                  <th>Email</th>
                  <th>FB</th>
                  <th>Linkedin</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>batch_dept</th>
                  <th>Email</th>
                  <th>FB</th>
                  <th>Linkedin</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllMembers = $Alumni->getAllMembers(); ?>
<?php if ($getAllMembers):
		$i=1;
		foreach ($getAllMembers as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['batch_dept']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $value['fb']; ?></td>
                  <td><?php echo $value['linkedin']; ?></td>
                  <td>
                  	<a href="alumniedit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                  	|| 
                  	<a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Member Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>