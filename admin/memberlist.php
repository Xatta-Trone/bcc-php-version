<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Member.php'; ?>
<?php $member = new Member(); ?>
<?php if (isset($_GET['delid'])) {$deleteMemberById = $member->deleteMemberById($_GET['delid']);} ?>
<?php if (isset($_GET['action']) && isset($_GET['id'])) {
    if ($_GET['action']=='remove') {
        $result = $member->removeAdmin($_GET['id']);
    }elseif ($_GET['action']=='add') {
        $result = $member->makeAdmin($_GET['id']);
    }else{
      
    }
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Member List</li>
</ol>
<?php if (isset($deleteMemberById)) {echo $deleteMemberById;} ?>
<?php if (isset($result)) {echo $result;} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Member List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>Area</th>
                  <th>Position</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th>Admin</th>
                  <th>FB</th>
                  <th>Linkedin</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Dept</th>
                  <th>Area</th>
                  <th>Position</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th>Admin</th>
                  <th>FB</th>
                  <th>Linkedin</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllMembers = $member->getAllMembers(); ?>
<?php if ($getAllMembers):
		$i=1;
		foreach ($getAllMembers as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['dept']; ?></td>
                  <td><?php echo $value['areaname']; ?></td>
                  <td><?php echo $value['positionname']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td>
                    <a href="memberedit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                    || 
                    <a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                  <td>
                    <?php if ($value['is_admin']=='1'): ?>
                      <a href="?action=remove&&id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Remove</a> 
                    <?php else: ?>
                      <a href="?action=add&&id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Make</a> 
                    <?php endif; ?>
                  </td>
                  <td><?php echo $value['fb']; ?></td>
                  <td><?php echo $value['linkedin']; ?></td>
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