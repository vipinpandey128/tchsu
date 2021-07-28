<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Course </title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
     <script type="text/javascript">
        function show_preview() {
            var _URL = window.URL || window.webkitURL;
            var file = event.target.files[0];
            var ext = file.name.split('.')
                .pop();
            var allowed_exts = ['pdf'];
            if (allowed_exts.indexOf(ext) == -1) {
                alert('invalid image file');
                $('#logo')
                    .val('');
                return false;
            }
            
             img.src = _URL.createObjectURL(file);
        }
    </script>

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
                <h1><?php echo $course[0]->title; ?>  </h1>
                <h4><?php echo $course_chapter[0]->title; ?>  </h4>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/listing'); ?>">All Course </a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/course_chapter/'.$course[0]->id); ?>">Course Chapter</a>
                    </li>
               
                    <li class="active"> Add Course Documents</li>
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
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1"> Chapter<span> * </span></label>
                                        <input type="text" class="form-control"  value="<?php echo $course_chapter[0]->title; ?>" readonly>
                                        <?php echo form_error( 'title'); ?> </div>
                                   <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Documents Title <span> * </span></label>
                                        <input type="text" class="form-control"  value=""  name="title" placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
                                   </div>
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image * </label>
                                        <input type="file" class="form-control" value="<?php echo set_value('image'); ?>" id="logo" name="image" onchange="show_preview();">
                                        <?php echo form_error( 'image'); ?>
                                        <div class="" id="logo_preview"></div>
                                       
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        <?php echo form_error( 'description'); ?> </div>

                                        <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status<span> * </span></label>
                                        <select class="form-control" name="status" required>
                                           
                                            <option value='0'>Inactive</option>
                                             <option value='1'>Active</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?> 
                                    </div>
                                     <div class="form-group col-sm-6"></div>
                               
                                
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
        <?php $this->load->view('admin/layout/footer'); ?> </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
    <script class="example">
        $(document)
            .ready(function() {
                $('#form')
                    .parsley();
            });

        function remove_image(IMG_ID) {
            var confirm_event = confirm('are you sure you want to delete this image?');
            if (confirm_event == true) {
                $.ajax({
                    url: '<?php echo base_url('admin/course/course_chapter_thumbnail_delete'); ?>',
                    type: 'POST',
                    data: {
                        'id': IMG_ID
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        }


    </script>
</body>

</html>
