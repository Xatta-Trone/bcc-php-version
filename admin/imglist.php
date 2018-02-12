<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Alumni.php'; ?>
<?php $Alumni = new Alumni(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteMemberById = $Alumni->deleteMemberById($_GET['delid']);
} ?>
<?php 
  $dir = '../file/img/';
  //$allImg = scandir($dir);
  $allImg = array_diff(scandir($dir), array('.', '..'));

  //var_dump($allImg);
  //exit();



 ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Img List</li>
</ol>
<?php if (isset($deleteMemberById)) {
	echo $deleteMemberById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Img List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>preview</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>preview</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllMembers = $Alumni->getAllMembers(); ?>
<?php if ($allImg):
		$i=1;
		foreach ($allImg as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value; ?></td>
                  <td><img height="100px" src="../file/img/<?php echo $value; ?>"></td>
                  <td><button class="btn btn-xs btn-primary copytoclip" style="cursor: pointer;" data-clipboard-text="http://buetcareerclub.org/file/img/<?php echo $value; ?>">Copy Link</button></td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Img Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>