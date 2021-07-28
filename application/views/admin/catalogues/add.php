<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Website; ?> | Add New Catalogues</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <?php $this->load->view('admin/layout/tiny-mce'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('admin/layout/sidebar'); ?>	
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Add New Catalogues</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo base_url('admin/Catalogues/listing'); ?>">All Catalogues</a></li>
        <li class="active">All Catalogues</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="box">
     <div class="box-body">
            <div class="box box-primary">            
            <!-- /.box-header -->
            <?php echo $this->session->flashdata('msg'); ?>
            <!-- form start -->
            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
              <div class="box-body">				
                <div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" required placeholder="Enter Title">				  
					<?php echo form_error('title'); ?>
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Image</label>
					<input type="file" class="form-control" name="image" required>				  
				</div>
					 <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                </div>      
				
               
                
                <div class="form-group">
					<label for="exampleInputPassword1">Status</label>
					<select class="form-control" name="status" required>
						<option value='1'>Active</option>
						<option value='0'>Inactive</option>
					</select>
					<?php echo form_error('status'); ?>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submitform">Submit</button>
              </div>
            </form>
          </div>
            </div>
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
<?php $this->load->view('admin/layout/footer'); ?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/layout/footer_js'); ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#form').parsley();
});
</script>
</body>
</html>
