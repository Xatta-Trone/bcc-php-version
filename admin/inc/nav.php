<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">BCC Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#team" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="team">
            <li>
              <a href="memberedit.php?id=<?php echo Session::get('userId'); ?>">Profile Edit</a>
            </li>
            <li>
              <a href="changepassword.php">Change Password</a>
            </li>
          </ul>
        </li>
<!--         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Level">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#team" data-parent="#exampleAccordion">
    <i class="fa fa-fw fa-user"></i>
    <span class="nav-link-text">User Level</span>
  </a>
  <ul class="sidenav-second-level collapse" id="team">
    <li>
      <a href="leveladd.php">Add New</a>
    </li>
    <li>
      <a href="levellist.php">Level list</a>
    </li>
  </ul>
</li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Join Requests">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Join" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-joomla"></i>
            <span class="nav-link-text">Join Requests</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Join">
            <li>
              <a href="Joinsubmission.php">Join Submission</a>
            </li>
            <li>
              <a href="volunteersubmission.php">Volunteer Submission</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Programme">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Programme" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-product-hunt"></i>
            <span class="nav-link-text">Programme</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Programme">
            <li>
              <a href="programmeadd.php">Add New</a>
            </li>
            <li>
              <a href="programmelist.php">Programme list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Area">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#area" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-snowflake-o"></i>
            <span class="nav-link-text">Area</span>
          </a>
          <ul class="sidenav-second-level collapse" id="area">
            <li>
              <a href="areaadd.php">Add New</a>
            </li>
            <li>
              <a href="arealist.php">Area list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Position">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#position" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user-secret"></i>
            <span class="nav-link-text">Position</span>
          </a>
          <ul class="sidenav-second-level collapse" id="position">
            <li>
              <a href="positionadd.php">Add New</a>
            </li>
            <li>
              <a href="positionlist.php">Position list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Member">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#member" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Members</span>
          </a>
          <ul class="sidenav-second-level collapse" id="member">
            <li>
              <a href="memberadd.php">Add New</a>
            </li>
            <li>
              <a href="memberlist.php">Member list</a>
            </li>
            <li>
              <a href="alumniadd.php"> Add Alumni</a>
            </li>
            <li>
              <a href="alumnilist.php">Alumni list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Post">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Post" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-th"></i>
            <span class="nav-link-text">Post</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Post">
            <li>
              <a href="postadd.php">Add New</a>
            </li>
            <li>
              <a href="postlist.php">Post list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Slider">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Slider" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file-image-o"></i>
            <span class="nav-link-text">Slider</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Slider">
            <li>
              <a href="slideradd.php">Add New</a>
            </li>
            <li>
              <a href="sliderlist.php">Slider list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Messages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-commenting-o"></i>
            <span class="nav-link-text">Messages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Messages">
            <li>
              <a href="Messagelist.php">Messages list</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Utilities">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Utilities" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-usb"></i>
            <span class="nav-link-text">Utilities</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Utilities">
            <li>
              <a href="logo.php">Logo</a>
            </li>
            <li>
              <a href="header-footer.php">Header Footer</a>
            </li>
            <li>
              <a href="social-links.php">Social Links</a>
            </li>
            <li>
              <a href="contact-data.php">Contact Data</a>
            </li>
          </ul>
        </li>
   <!--      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
     <a class="nav-link" href="tables.php">
       <i class="fa fa-fw fa-table"></i>
       <span class="nav-link-text">Tables</span>
     </a>
   </li>
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
     <a class="nav-link" href="aaa.php">
       <i class="fa fa-fw fa-table"></i>
       <span class="nav-link-text">Blank</span>
     </a>
   </li>
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
     <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
       <i class="fa fa-fw fa-wrench"></i>
       <span class="nav-link-text">Components</span>
     </a>
     <ul class="sidenav-second-level collapse" id="collapseComponents">
       <li>
         <a href="navbar.php">Navbar</a>
       </li>
       <li>
         <a href="cards.php">Cards</a>
       </li>
     </ul>
   </li>
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
     <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
       <i class="fa fa-fw fa-file"></i>
       <span class="nav-link-text">Example Pages</span>
     </a>
     <ul class="sidenav-second-level collapse" id="collapseExamplePages">
       <li>
         <a href="login.php">Login Page</a>
       </li>
       <li>
         <a href="register.php">Registration Page</a>
       </li>
       <li>
         <a href="forgot-password.php">Forgot Password Page</a>
       </li>
       <li>
         <a href="blank.php">Blank Page</a>
       </li>
     </ul>
   </li>
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
     <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
       <i class="fa fa-fw fa-sitemap"></i>
       <span class="nav-link-text">Menu Levels</span>
     </a>
     <ul class="sidenav-second-level collapse" id="collapseMulti">
       <li>
         <a href="#">Second Level Item</a>
       </li>
       <li>
         <a href="#">Second Level Item</a>
       </li>
       <li>
         <a href="#">Second Level Item</a>
       </li>
       <li>
         <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
         <ul class="sidenav-third-level collapse" id="collapseMulti2">
           <li>
             <a href="#">Third Level Item</a>
           </li>
           <li>
             <a href="#">Third Level Item</a>
           </li>
           <li>
             <a href="#">Third Level Item</a>
           </li>
         </ul>
       </li>
     </ul>
   </li>
   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
     <a class="nav-link" href="#">
       <i class="fa fa-fw fa-link"></i>
       <span class="nav-link-text">Link</span>
     </a>
   </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <p class="text-white" style="line-height: 38px;
    margin: 0 5px;">Hi <?php echo Session::get('Name');?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
</nav>
  
<div class="content-wrapper">
<div class="container-fluid">