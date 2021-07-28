<?php $all_users = $this->user_model->get_all_users_by_ststus('all'); ?>
<?php $module =$this->uri->segment(2); ?>

<aside class="main-sidebar">

  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="active treeview"> <a href="<?php echo base_url('admin/dashboard'); ?>"> <i class="fa fa-home"></i> <span>Dashboard</span> </a> </li>
      <?php   $ADMIN_AUTH = $this->session->userdata('ADMIN_AUTH'); 
              $subadminauthority=  explode('@',$ADMIN_AUTH ); ?>
     
     
        <li class="treeview <?php echo($module=='user')?'active':'' ?>"> <a href="#"> <i class="fa fa-users"></i> <span>Users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user/all'); ?>"><i class="fa fa-circle-o"></i>All Users  &nbsp;&nbsp;&nbsp;<small class="label label-primary"><?php echo count($all_users); ?></small></a> </li>
            <li><a href="<?php echo base_url('admin/user/all_mail'); ?>"><i class="fa fa-circle-o"></i>All Mail</a></li>
            <!-- <li><a href="<?php echo base_url('admin/user/subscriber'); ?>"><i class="fa fa-circle-o"></i>All subscriber</a></li>

 -->
          </ul>
        </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Orders </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/orders/listing'); ?>"><i class="fa fa-circle-o"></i>All Orders</a></li>
        </ul>
      </li>

      <li class="treeview <?php echo($module=='slider')?'active':'' ?>"> <a href="#"> <i class="fa fa-image"></i> <span>Manage Home Page </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/slider/listing'); ?>"><i class="fa fa-circle-o"></i>All Slider</a></li>
            
        </ul>
      </li>
     
      <li class="treeview"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Board </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/board/listing'); ?>"><i class="fa fa-circle-o"></i>All  Board</a></li>
        <li><a href="<?php echo base_url('admin/board/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Board</a></li>
         
        </ul>
      </li>  
      <li class="treeview"> <a href="#"> <i class="fa fa-wrench" aria-hidden="true"></i>
       <span>Manage Testimonials </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/review/listing'); ?>"><i class="fa fa-circle-o"></i>All  Testimonials</a></li>
        <li><a href="<?php echo base_url('admin/review/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Testimonial</a></li>
         
        </ul>
      </li>  

      <li class="treeview"> <a href="#"> <i class="fa fa-product-hunt"></i> <span>Subject</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/subject/listing'); ?>"><i class="fa fa-circle-o"></i>All Subject</a></li>
          <li><a href="<?php echo base_url('admin/subject/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New Subject</a></li> 
        </ul>
      </li>

      <li class="treeview"> <a href="#"> <i class="fa fa-user" aria-hidden="true"></i>
       <span>Manage Tutor </span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
        <li><a href="<?php echo base_url('admin/tutor/listing'); ?>"><i class="fa fa-circle-o"></i>All  Tutor</a></li>
        <li><a href="<?php echo base_url('admin/tutor/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New  Tutor</a></li>
         
        </ul>
      </li>
      
      <li class="treeview"> <a href="#"> <i class="fa fa-product-hunt"></i> <span>Course Package</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/course/listing'); ?>"><i class="fa fa-circle-o"></i>All Course Package</a></li>
          <li><a href="<?php echo base_url('admin/course/add_new'); ?>"><i class="fa fa-circle-o"></i>Add New Course</a></li> 
        </ul>
      </li>

       <li class="treeview"> <a href="#"> <i class="fa fa-product-hunt"></i> <span>CMS</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/page/listing'); ?>"><i class="fa fa-circle-o"></i>All </a></li>
        </ul>
        
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-product-hunt"></i> <span>Manage Video</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/page/listing'); ?>"><i class="fa fa-circle-o"></i>All </a></li>
        </ul>
        
      </li>
 
    

	

  
      <li class="treeview"> <a href="#"> <i class="fa fa-cog" aria-hidden="true"></i><span>Setting</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
      
          <li><a href="<?php echo base_url('admin/setting/listing'); ?>"><i class="fa fa-circle-o"></i>All Setting</a></li>
           
        </ul>
      </li>
    </ul>
  </section>
</aside>
