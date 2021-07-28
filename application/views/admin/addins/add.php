<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Website; ?> | Add Add-Ins</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <?php $this->load->view('admin/layout/tiny-mce'); ?>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.css'); ?>">  
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datepicker/datepicker3.css'); ?>">
  <!-- bootstrap datepicker -->
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
      <h1>Add New Add-Ins</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="<?php echo base_url('admin/scents/listing'); ?>">All Add-Ins</a></li>
        <li class="active">Add New Add-Ins</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
				<div class="box box-primary">            
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" id="form" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Title</label>
								<input type="text" class="form-control" name="title" required placeholder="Enter Title" value="">				  
							</div>				
							<div class="form-group">
								<label for="exampleInputPassword1">Status</label>
								<select class="form-control" name="status" required>
									<option value='1' >Active</option>
									<option value='0' >Inactive</option>
								</select>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" name="submitform">Update</button>
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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/admin/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<!-- bootstrap datepicker -->

<script src="http://localhost/forum/assets/admin/parsley/parsley.js"></script>
<script class="example">
$(document).ready(function(){
	$('#form').parsley();
	$('.datepicker').datepicker({format: 'yyyy-mm-dd',  autoclose: true });
});
</script>
</body>
</html>
