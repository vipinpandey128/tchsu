<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Website; ?> | Orders Listing</title>
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
		<h1>AllOrders</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Orders</li>			
		</ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
			<div class="box-body">
			<?php echo $this->session->flashdata('msg'); ?>
			<table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					    <th>#</th>						
						<th>Order ID</th>
						<th>User</th>
					
						<th>Date</th> 
						<th>Time</th> 
						<th>Total Amount</th>
						<th>Order Status</th>
                        <th>Payment Status</th>						
                     					
						<th>Action</th>	
					</tr>
                </thead>
				<?php if(count($RESULT)>0){ ?>
                <tbody>
				<?php $no=0; foreach($RESULT as $record){ $no++; ?>		
				<?php 
				$user = $this->user_model->get_user_by_id($record->user_id); 
				$shipping = $this->order_model->get_shipping_data($record->id); 
				?>	
					<tr>
						<td><?php echo $no; ?></td>
						<td>Order-<?php echo $record->id; ?></td>
						<td>
							<?php if($user){ ?>
							<a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>" target="_blank">
							<?php 
								echo @$user[0]->fname.' '.@$user[0]->lname;
								?>
								</a></td>
								<?php 
							}
							 ?>
					
								
						
						<td   style="width:10%"><?php echo date('d-M-Y ',strtotime($record->create_date)); ?> </td>
						<td><?php echo date('h:i A',strtotime($record->create_date)); ?> </td>
						<td><?php echo CURRENCY_SYMBOL."  ".$record->final_amount; ?></td>
						<td>
							<?php if($record->status=='pending'){ ?>
							<span class="label label-warning"><?php echo ucfirst($record->status); ?></span>
							<?php }elseif($record->status=='cancelled'){ ?>
							<span class="label label-danger"><?php echo ucfirst($record->status); ?></span>
							<?php }else{ ?>
							<span class="label label-success"><?php echo ucfirst($record->status); ?></span>
							<?php  } ?>
						</td>	
                        <td>
                            <?php if($record->payment_status=='Pending'){ ?>
							<span class="label label-warning"><?php echo ucfirst($record->payment_status); ?></span>
							<?php }elseif($record->payment_status=='Aborted'){ ?>
							<span class="label label-danger"><?php echo ucfirst($record->payment_status); ?></span>
							
							<?php }elseif($record->payment_status=='Failure'){ ?>
							<span class="label label-danger"><?php echo ucfirst($record->payment_status); ?></span>
							
							<?php }elseif($record->payment_status=='Initiated'){ ?>
							<span class="label label-warning"><?php echo ucfirst($record->payment_status); ?></span>
							<?php }else{ ?>
							<span class="label label-success"><?php echo ucfirst($record->payment_status); ?></span>
							<?php  } ?>
                           </td>					
                      		
						<td width="15%">
							<a href="<?php echo base_url('admin/orders/view/'.$record->id); ?>" class="btn  btn-primary btn-xs"><i class="fa fa-fw fa-eye"></i> View</a><br>
						
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
