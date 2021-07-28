<?php $act = $this->uri->segment(2); ?>

<div class="blog-sidebar ">

<div class="widget widget_categories">
	<h4 class="widget-title">My Account</h4>
	<br>

<ul>
	<li class="<?php echo($act=='my_orders')?'active':'' ?> cat-item "><i class="fa fa-angle-right"></i> <a href="<?php echo base_url('user/your_course'); ?>">Your Course</a></li>
	
	<li class="<?php echo($act=='my_orders')?'active':'' ?> cat-item "><i class="fa fa-angle-right"></i> <a href="<?php echo base_url('user/my_orders'); ?>">Orders History</a></li>
<li class="<?php echo($act=='edit_profile')?'active':'' ?> cat-item "><i class="fa fa-angle-right"></i> <a href="<?php echo base_url('user/edit_profile'); ?>">Edit Profile</a></li>

	<li class="<?php echo($act=='change_password')?'active':'' ?> cat-item "><i class="fa fa-angle-right"></i> <a href="<?php echo base_url('user/change_password'); ?>">Change Password</a></li>

</ul>
</div>



</div>