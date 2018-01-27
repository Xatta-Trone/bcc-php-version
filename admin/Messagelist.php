<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Contact.php'; ?>
<?php $Contact = new Contact(); ?>
<?php if (isset($_GET['delid'])) {
	$deleteMessageById = $Contact->deleteMessageById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Contact List</li>
</ol>
<?php if (isset($deleteMessageById)) {
	echo $deleteMessageById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Unseen</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllUnseenMessage = $Contact->getAllUnseenMessage(); ?>
<?php if ($getAllUnseenMessage):
    $i=1;
    foreach ($getAllUnseenMessage as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['fname'].' '.$value['lname']; ?></td>
                  <td><?php echo $value['subject']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $Contact->fm->textShorten($value['body'],40); ?></td>
                  <td>
                    <a href="viewMessage.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">View</a> 
                    || 
                    <a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
        <tr>
                  <td colspan="4">No Message Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <hr>


<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Seen</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllSeenMessage = $Contact->getAllSeenMessage(); ?>
<?php if ($getAllSeenMessage):
		$i=1;
		foreach ($getAllSeenMessage as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['fname'].' '.$value['lname']; ?></td>
                  <td><?php echo $value['subject']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo $Contact->fm->textShorten($value['body'],40); ?></td>
                  <td>
                  	<a href="viewMessage.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">View</a> 
                  	|| 
                  	<a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Message Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>