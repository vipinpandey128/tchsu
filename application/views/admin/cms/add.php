<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo Website; ?> | Add New Deal</title>

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

      <h1>Add New Deal</h1>

      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Add New Deal</li>

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

            <form role="form"   method="post" id="form" enctype="multipart/form-data">

              <div class="box-body">

			  

			    <div class="form-group">

                  <label for="exampleInputPassword1">board</label>

                  <select class="form-control" name="board" required>

					<option value=''>Select board</option>

					<option value='1'>Astrology</option>

					<option value='2'>Vastu</option>

					<option value='3'>Numerology</option>

					<option value='4'>Spritiual Sadna</option>

				  </select>

                </div> 

			  

                <div class="form-group">

                  <label for="exampleInputEmail1">Title</label>

                  <input type="text" class="form-control" name="title" required placeholder="Enter Title">				  

                </div>

				<div class="form-group">

                  <label for="exampleInputEmail1">Image</label>

                  <input type="file"  class="form-control" name="image" required >				  

                </div>

				<div class="form-group">

                  <label for="exampleInputEmail1">Description</label>

				  <textarea class="form-control" name="description" placeholder="Enter description" ></textarea>                  				  

                </div>

              <div class="form-group">

                  <label for="exampleInputEmail1">Tab One Title</label>

                  <input type="text" class="form-control" name="tab_first" required placeholder="Enter  Tab One Title" value="">         

             </div>    

                <div class="form-group">

                  <label for="exampleInputEmail1">Tab One Description</label>

          <textarea class="form-control" name="perfect_groom" placeholder="Enter description" ></textarea>                            

                </div>



            <div class="form-group">

                  <label for="exampleInputEmail1">Tab Two Title</label>

                  <input type="text" class="form-control" name="tab_second" required placeholder="Enter Title Two" value="">         

                </div>


                <div class="form-group">

                  <label for="exampleInputEmail1">Tab Two Description</label>

          <textarea class="form-control" name="fear_comes" placeholder="Tab Two Description" ></textarea>                            

                </div>


              <div class="form-group">

                  <label for="exampleInputEmail1">Tab Third Title</label>

                  <input type="text" class="form-control" name="tab_third" required placeholder="Enter Title" value="">         

                </div>
                


                <div class="form-group">

                  <label for="exampleInputEmail1">Tab Third Description</label>

          <textarea class="form-control" name="health_issue" placeholder="Enter description" ></textarea>                            

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Status</label>

                  <select class="form-control" name="status" required>

					<option value=''>Select Status</option>

					<option value='1'>Active</option>

					<option value='0'>Inactive</option>

				  </select>

                </div> 

              </div>

              <!-- /.box-body -->

              <div class="box-footer">

                <button type="submit" class="btn btn-primary" name="submitform">Submit8</button>

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

