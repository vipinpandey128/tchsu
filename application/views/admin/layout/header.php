<header class="main-header"> 
  <!-- Logo --> 
  <?php $link = $this->setting_model->get_all_setting();?>
  <a href="<?php echo base_url('admin/dashboard'); ?>" class="logo" style="background-color:#1e282c;"> 
    <span class="logo-mini" >
           <?php if(!empty($link[0]->logo)){ ?>
                    <img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" title="<?php echo $link[0]->title ?>" style="width:100px"  class="img-fluid">
                    <?php } ?>
  </span> 
  <span class="logo-lg"  width="30%">       <?php if(!empty($link[0]->logo)){ ?>

<img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" title="<?php echo $link[0]->title ?>" style="width:100px"  class="img-fluid">
                    <?php } ?>
                  </span> </a> 
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top"> 
    <!-- Sidebar toggle button--> 
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a> 
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less --> 
        <!--   <li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <i class="fa fa-bell-o"></i>
					  <span class="label label-warning">10</span>
					</a>

				  </li> --> 
        <!-- Tasks: style can be found in dropdown.less --> 
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url('assets/admin/dist/img/avatar5.png'); ?>" class="user-image" alt="User Image"> <span class="hidden-xs">Welcome Admin</span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header"> <img src="<?php echo base_url('assets/admin/dist/img/avatar5.png'); ?>" class="img-circle" alt="User Image"> </li>
            <!-- Menu Body --> <!-- Menu Footer-->
            <li class="user-footer">
              <!--<div class="pull-left"> <a href="<?php echo base_url('admin/change_password'); ?>" class="btn btn-default btn-flat">Change Password</a> </div>-->
              <div class="pull-right"> <a href="<?php echo base_url('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>
