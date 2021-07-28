<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add New Review</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view('admin/layout/sidebar'); ?>



<script type="text/javascript">
  
    function show_preview()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();
        var allowed_exts = ['jpg','jpeg'];
        if (allowed_exts.indexOf(ext)==-1) {

            alert('invalid image file');
            $('#logo').val('');
            return false;

        }

        var img = new Image();
        img.onload = function()
        {
            if(this.width > 600 || this.height > 600)
            {
                alert("Height and width can be greater than 600 * 600");
                $("#logo").val("");
                $('#logo_preview').html("");
                return false;
            }
            else
            {
                $('#logo_preview').html("");
                $('#edited_image').css('display', 'none');
                $('#logo_preview').append("<img style='height:auto; width:250px; margin-left:2%;' src='"+this.src+"'/>");
            }
        }
        img.src = _URL.createObjectURL(file);
    }
</script>
<script type="text/javascript">
  
    function show_preview2()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();

        var allowed_exts = ['jpg','jpeg'];

        if (allowed_exts.indexOf(ext)==-1) {

            alert('invalid image file');
            $('#logo2').val('');
            return false;

        }

        var img = new Image();
        img.onload = function()
        {
            
                $('#logo_preview2').html("");
                $('#edited_image').css('display', 'none');
                $('#logo_preview2').append("<img style='height:auto; width:250px; margin-left:2%;' src='"+this.src+"'/>");
           
        }
        img.src = _URL.createObjectURL(file);
    }
</script>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add New Review</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/Review/listing'); ?>">All Review</a>
                    </li>
                    <li class="active">All Review</li>
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
                            <form role="form" method="post" id="form" autocomplete="off"  enctype="multipart/form-data">
                                  <div class="box-body">                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name"  value="" required placeholder="Enter name">               
                                        <?php echo form_error('name'); ?>
                                    </div>      
                                     <div class="form-group">
                                      <label for="exampleInputEmail1">Title</label>
                                      <input type="text" class="form-control" name="title"  value="" required placeholder="Enter title">         
                                      <?php echo form_error('title'); ?>
                                    </div>   

                                    <div class="form-group ">
                                            <label for="exampleInputEmail1">Profile Pic</label>
                                            <input type="file" class="form-control" name="image"  id="logo" onchange="show_preview();">
                                        
                                             <p class="error" style="color: red">Note: use image  400 * 400 px px width-height</p>     
                                    </div>  

                                    <div class="form-group">
                              <label for="exampleInputEmail1">Comment</label>
                              <textarea class="form-control" name="review" placeholder="Enter description"></textarea>
                                    </div>  
                                  
                                                
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Status</label>
                                      <select class="form-control" name="status" required>
                                        <option value='1'  >Active</option>
                                        <option value='0' >Inactive</option>
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
        $(document).ready(function() {
            $('#form').parsley();
        });
    </script>
</body>

</html>