<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Website; ?> | All Sliders</title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>">
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
		<h1>All Tutor</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Tutor</li>
		</ol>
    </section>
    
      <div class="box-footer">
              <a href="add_new">  <button type="submit" class="btn btn-primary" name="submitform">Add New Tutor</button></a>
              </div>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
			<?php echo $this->session->flashdata('msg'); ?>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
						<th></th>
						<th>UniqueI</th>
						<th>Tutor</th>
						<th>Picture</th>
						<th>Phone</th>
						<th>Email</th>
						<th>City</th>
						<th>Specialization</th>  
						<th>Qualification</th>  
						<th>Status</th>  
						<th>Reg Date</th>  
						<th>Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>			
					<tr>
						<td width="5%"><?php echo $no; ?></td>
						<td>Tut-<?php echo $record->id; ?></td>
						<td><?php echo $record->name; ?><br><?php echo $record->gender; ?> (<?php echo $record->age; ?>) </td>
						<td>  <?php if(!empty($record->profile_pic)){ ?>
                                        <img src="<?php echo base_url('uploads/tutor/').$record->profile_pic; ?>" width="80px">
                                        <?php } ?></td>
						<td><?php echo $record->phone; ?></td>
						<td><?php echo $record->email; ?></td>
						<td><?php echo $record->city; ?></td>
						<td><?php echo $record->specialization; ?></td>
						<td><?php echo $record->qualification; ?></td>
					
						<td width="7%">
							<?php if($record->status==1){ ?>
							<span class="label label-success">Active</span>
							<?php }else{ ?>
							<span class="label label-danger">Inactive</span>
							<?php }?>	
						</td>
						<td><?php echo date( 'd-M-Y', strtotime($record->create_date)); ?><br><?php echo date( ' h:i A', strtotime($record->create_date)); ?></td>
						<td >
							<a href="<?php echo base_url('admin/tutor/edit/'.$record->id); ?>" class="btn  btn-success btn-xs" title="Edit Profile"><i class="fa fa-fw fa-edit"></i></a>
							<a href="<?php echo base_url('admin/tutor/delete_tutor/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" title="Delete Profile"><i class="fa fa-fw fa-trash"></i></a>
						</td>	
					</tr>
				<?php } ?>	
                </tbody> 
				<?php } ?>	
            </table>
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
<script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable();    
  });
</script>
</body>
</html>
