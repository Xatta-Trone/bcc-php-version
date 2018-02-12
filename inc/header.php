<?php session_start(); ob_start(); ?>
<?php ini_set( 'display_errors', 1 ); error_reporting( E_ALL ); ?>
<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php include $filepath.'/../config/constant.php'; ?>
<?php include $filepath.'/../lib/Database.php'; ?>
<?php include $filepath.'/../lib/Session.php'; ?>
<?php include $filepath.'/../helper/Format.php'; ?>
<?php spl_autoload_register(function($class){include __DIR__."/../classes/".$class.".php";}); ?>
<?php $db = new Database(); ?>
<?php $fm = new Format(); ?>
<?php $alumni = new Alumni(); ?>
<?php $area = new Area(); ?>
<?php $activity = new Activity(); ?>
<?php $contact = new Contact(); ?>
<?php $member = new Member(); ?>
<?php $position = new Position(); ?>
<?php $post = new Post(); ?>
<?php $programme = new Programme(); ?>
<?php $slider = new Slider(); ?>
<?php $submission = new Submission(); ?>
<?php $utilities = new Utilities(); ?>
<?php $moderator = new Moderator(); ?>
<?php $activity->insertSession(session_id(),basename($_SERVER['PHP_SELF'],'.php')); ?>
<?php $allUtildata = $utilities->getAllData(); $utildata = $allUtildata->fetch_assoc(); ?>
<?php if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sendMessage'])) {$sendMessage = $contact->InsertMessage($_POST);} ?>
<?php if (isset($_GET['action']) && $_GET['action']=='logout') {Session::destroy();}?>
<?php $path  = $_SERVER['SCRIPT_FILENAME']; $currentpage = basename($path,'.php'); ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");

?>




<!DOCTYPE html>
<html>
<head>
<?php if (isset($_GET['id'])):?>
<?php $postData = $post->getPostById($_GET['id']) ?>
<?php if ($postData): while ($postTitle = $postData->fetch_assoc()): ?>
	<title><?php echo $postTitle['title']." : Buet Career Club" ?></title>
	<meta name="og:title" content="<?= $postTitle['title']; ?>"/>
	<meta name="og:image" content="https://www.buetcareerclub.org/file/img/<?= $postTitle['image']; ?>"/>
<?php endwhile; ?>
<?php endif; ?>
<?php else: ?>
	<title><?php echo $utilities->title($currentpage)." : Buet Career Club" ?></title>
	<meta name="og:title" content="BUET Career Club"/>
	<meta name="og:image" content="https://www.buetcareerclub.org/file/img/bcc-logo.png"/>
<?php endif; ?>

	<meta charset="UTF-8">
	<meta name="description" content="BUET Career Club">
  	<meta name="keywords" content="BUET, Career Club, BCC, BUET Career Club">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,800,900|Oswald:400,700" rel="stylesheet">

	 <link rel="icon" href="https://www.buetcareerclub.org/file/img/bcc-logo.png" > 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  	<link rel="stylesheet" href="admin/css/codemirror.min.css">
  	<link rel="stylesheet" href="admin/css/froala_editor.pkgd.min.css">
  	<link rel="stylesheet" href="admin/css/froala_style.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.min.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<?= $utildata['header_text']; ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=490905307961191';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $utildata['google_analytics']; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?= $utildata['google_analytics']; ?>');
</script>


<!-- nav start -->
	<nav class="navbar navbar-expand-md fixed-top bcc-nav-bg" id="sticker">
		<div class="container">
			<!-- put your logo here -->
			<a href="index.php" class="navbar-brand bcc-nav-brand"><img src="file/img/<?= $utildata['primarylogo']; ?>" title="BUET Career Club" alt="BUET Career Club">BCC</a>

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle Navigation">
				<i class="fa fa-bars"></i>
			</button>
			<!-- nav-links -->
			<div class="collapse navbar-collapse navbar-expand-md" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="index.php" class="nav-link <?php if($currentpage=='index'){echo 'active';} ?>">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" id="Programs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Programs</a>
						<div class="dropdown-menu" aria-labelledby="Programs">
				          <a class="dropdown-item" href="higher-study.php">Higher Study</a>
				          <a class="dropdown-item" href="buet-Rostrum.php">BUET Rostrum</a>
				          <a class="dropdown-item" href="Duke-of-Edinburghs.php">Duke of Edinburgh's Award</a>
				          <a class="dropdown-item" href="women-wing.php">Women Wing</a>
				          <a class="dropdown-item" href="public-private-job.php">Public &amp; Private job</a>
				        </div>
					</li>
					<li class="nav-item">
						<a href="alumni.php" class="nav-link <?php if($currentpage=='alumni'){echo 'active';} ?>">Alumni</a>
					</li>
					<li class="nav-item">
						<a href="moderator.php" class="nav-link <?php if($currentpage=='moderator'){echo 'active';} ?>">Moderator</a>
					</li>
					<li class="nav-item">
						<a href="team.php" class="nav-link <?php if($currentpage=='team'){echo 'active';} ?>">Team</a>
					</li>
					<li class="nav-item">
						<a href="news-events.php" class="nav-link <?php if($currentpage=='news-events'){echo 'active';} ?>">News</a>
					</li>
					<li class="nav-item">
						<a href="blog.php" class="nav-link <?php if($currentpage=='blog'){echo 'active';} ?>">Blog</a>
					</li>

<?php if (Session::get('isLoggedIn')):?>
				<!-- 	<li class="nav-item">
					<a href="profile.php" class="nav-link"><?php //echo ucwords(strtolower(Session::get('Name'))); ?></a>
				</li>
				 -->
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle " id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $utilities->nameShorten(ucwords(strtolower(Session::get('Name')))); ?></a>
						<div class="dropdown-menu" aria-labelledby="profile">
				          <a class="dropdown-item" href="profile.php">Profile</a>
				          <a class="dropdown-item" href="editptofile.php">Edit Profile</a>
				          <?php if (Session::get('isAdmin') == true):?>
				          	<a class="dropdown-item" href="admin/index.php">Admin Panel</a>
				          <?php endif; ?>
				          <a class="dropdown-item" href="?action=logout">Logout</a>
				        </div>
					</li>
				<!-- 	<li class="nav-item">
					<a href="?action=logout" class="nav-link">Logout</a>
				</li> -->
<?php else: ?>		

					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" id="Programs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Join</a>
						<div class="dropdown-menu" aria-labelledby="Programs">
				          <a class="dropdown-item" href="register.php">Join BCC</a>
				          <a class="dropdown-item" href="voulenteer.php">Become a volunteer</a>
				        </div>
					</li>
					<li class="nav-item">
						<a href="login.php" class="nav-link">Login</a>
					</li>
<?php endif; ?>
					<li class="nav-item">
						<a href="contact.php" class="nav-link <?php if($currentpage=='contact'){echo 'active';} ?>">Contact</a>
					</li>
				</ul>
			</div>
			<!-- nav-links -->
		</div>
	</nav>
	<!-- nav end -->