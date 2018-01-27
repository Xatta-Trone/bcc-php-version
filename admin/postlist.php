<?php $filepath = realpath(dirname(__FILE__));?>
<?php include $filepath.'/inc/header.php'; ?>
<?php include $filepath.'/inc/nav.php'; ?>
<?php include $filepath.'/../classes/Post.php'; ?>
<?php $Post = new Post(); ?>
<?php if (isset($_GET['delid'])) {
	$deletePostById = $Post->deletePostById($_GET['delid']);
} ?>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Post List</li>
</ol>
<?php if (isset($deletePostById)) {
	echo $deletePostById;
} ?>
<hr>

<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Post List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Title</th>
                  <th>programme</th>
                  <th>post type</th>
                  <th>body</th>
                  <th>tags</th>
                  <th>author</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>serial</th>
                  <th>Title</th>
                  <th>programme</th>
                  <th>post type</th>
                  <th>body</th>
                  <th>tags</th>
                  <th>author</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
<?php $getAllPost = $Post->getAllPost(); ?>
<?php if ($getAllPost):
		$i=1;
		foreach ($getAllPost as $value): ?>

                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value['title']; ?></td>
                  <td><?php echo $value['programmename']; ?></td>
                  <td>
                    <?php //echo $value['posttype']; 
                      if ($value['posttype']=='1') {
                        echo "Blog";
                      }elseif ($value['posttype']=='2') {
                        echo "News & Event(Upcoming)";
                      }elseif ($value['posttype']=='3') {
                        echo "News & Event(Past)";
                      }else{
                        echo "Unkonwn Type";
                      }
                    ?>
                  </td>
                  <td><?php echo htmlspecialchars_decode($Post->fm->textShorten($value['body'],100)); ?></td>
                  <td><?php echo $value['tags']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td>
                    <img src="../file/img/<?php echo $value['image']; ?>" style="height: 150px; width: 150px;">
                    </td>
                  <td>
                  	<a href="postedit.php?id=<?php echo $value['id'];?>" class="btn btn-xs btn-primary">Edit</a> 
                    || 
                    <a href="?delid=<?php echo $value['id'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                  	|| 
                  	<a href=#"?postid=<?php echo $value['id'];?>" class="btn btn-success btn-xs" >View</a>
                  </td>
                </tr>

<?php endforeach; else: ?>
				<tr>
                  <td colspan="4">No Post Found :(</td>
                </tr>

<?php endif; ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>






<?php include 'inc/footer.php'; ?>