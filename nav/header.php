  <header class="main-header">
    <!-- URL -->
    <?php $url="http://localhost/birthday";?> <!-- Change this URL to change path -->

    <a href='<?php echo $url;?>' class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>BDAY</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src='<?php echo $url."/dist/img/logo.png";?>' style="border-radius: 5px" height="50px" width="100%" alt="Techmion Birthday Blaster"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='<?php echo $url."/dist/img/user2-160x160.png";?>' class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='<?php echo $url."/dist/img/user2-160x160.png";?>' class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["name"]; ?>
                  
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href='<?php echo $url."/api/logout.php";?>' class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src='<?php echo $url."/dist/img/user2-160x160.png";?>' class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["name"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href='<?php echo $url."/index.php";?>'>
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i>
            <span>Message</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href='<?php echo $url."/pages/msg/view_wish.php";?>'><i class="fa fa-circle-o"></i>View Message</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-birthday-cake"></i>
            <span>Birthday</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href='<?php echo $url."/pages/bir/add_bir.php"?>'><i class="fa fa-circle-o"></i>Add Birthdays</a></li>
            <li><a href='<?php echo $url."/pages/bir/view_bir.php"?>'><i class="fa fa-circle-o"></i>View Birthdays</a></li>
            <li><a href='<?php echo $url."/pages/bir/view_bir.php"?>'><i class="fa fa-circle-o"></i>Edit Birthdays</a></li>
          </ul>
        </li>
		    <li>
          <a href='<?php echo $url."/report.php"?>'>
            <i class="fa fa-file-o"></i> <span>Report</span>
            <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>