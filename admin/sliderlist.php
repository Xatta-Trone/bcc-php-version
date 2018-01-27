<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Slider.php'; ?>
<?php $Slider = new Slider(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteSlideById = $Slider->deleteSlideById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Slider List</li>
</ol>
<?php if (isset($deleteSlideById)) {
	echo $deleteSlideById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Slider List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Image</th>
                  <th>Programme</th>
                  <th>Caption</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Image</th>
                  <th>Programme</th>
                  <th>Caption</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllSlides = $Slider->getAllSlides(); ?>
<?php if ($getAllSlides):
		$i=1;
		foreach ($getAllSlides as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td>
                    <img style="height: auto;width: 250px;" src="../file/img/<?php echo $value['image'];?>">
                  </td>
                  <td><?php echo $value['programmename']; ?></td>
                  <td><?php echo $value['caption']; ?></td>
                  <td>
                  	<a href="slideredit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                  	|| 
                  	<a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Slider Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>