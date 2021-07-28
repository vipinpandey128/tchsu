<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo Website; ?> | Edit Setting</title>
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
      <h1>Edit Setting</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/slider/listing'); ?>">All Setting</a></li>
        <li class="active">Edit Setting</li>
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
            
            <form role="form" method="post" id="form" autocomplete="off"  enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
					<label for="exampleInputEmail1">Website Logo</label>
					<input type="file" class="form-control" name="image">
					
                    
					<?php if(!empty($RESULT[0]->logo)){ ?>
					<img src="<?php echo base_url('uploads/').$RESULT[0]->logo; ?>" width="100px">
					<?php } ?>
                    
				</div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $RESULT[0]->email; ?>"
                     required placeholder="Enter Email ">
                  <?php echo form_error('title'); ?> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $RESULT[0]->phone; ?>"
                     required placeholder="Enter Phone ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Address Content</label>
                  <input type="text" class="form-control" name="address_content" value="<?php echo $RESULT[0]->address_content; ?>"
                     required placeholder="Enter Address Content ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Facebook Link</label>
                  <input type="text" class="form-control" name="facebook_link" value="<?php echo $RESULT[0]->facebook_link; ?>"
                     required placeholder="Enter Facebook Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Twitter Link</label>
                  <input type="text" class="form-control" name="twitter_link" value="<?php echo $RESULT[0]->twitter_link; ?>"
                     required placeholder="Enter Twitter Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Instagram Link</label>
                  <input type="text" class="form-control" name="linkedin_link" value="<?php echo $RESULT[0]->linkedin_link; ?>"
                     required placeholder="Enter Linkedin Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Pinterest Link</label>
                  <input type="text" class="form-control" name="google_link" value="<?php echo $RESULT[0]->google_link; ?>"
                     required placeholder="Enter Google+ Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Youtube Link</label>
                  <input type="text" class="form-control" name="youtube_link" value="<?php echo $RESULT[0]->youtube_link; ?>"
                     required placeholder="Enter Youtube Link ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Whatsapp Number</label>
                  <input type="text" class="form-control" name="whatapp" value="<?php echo $RESULT[0]->whatapp; ?>"
                     required placeholder="Enter whatapp Number ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Top Content</label>
                  <input type="text" class="form-control" name="about_content" value="<?php echo $RESULT[0]->about_content; ?>"
                     required placeholder="Enter Address Content ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Copyright</label>
                  <input type="text" class="form-control" name="copyright" value="<?php echo $RESULT[0]->copyright; ?>"
                     required placeholder="Enter Copyright ">
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
