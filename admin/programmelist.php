<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Programme.php'; ?>
<?php $Programme = new Programme(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteProgrammeById = $Programme->deleteProgrammeById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Programme List</li>
</ol>
<?php if (isset($deleteProgrammeById)) {
	echo $deleteProgrammeById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Programme List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Desc</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Desc</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllProgramme = $Programme->ProgrammeList(); ?>
<?php if ($getAllProgramme):
		$i=1;
		foreach ($getAllProgramme as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['programmename']; ?></td>
                  <td><?php echo $value['programmedescription']; ?></td>
                  <td>
                  	<a href="programmeedit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                  	|| 
                  	<a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Programme Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>