<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Course Chapter</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?> </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><?php echo $RESULT[0]->title; ?> Course Chapter  (<?php echo $RESULT[0]->subject; ?> ) </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/listing'); ?>">All Course </a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/course_chapter/').$RESULT[0]->id; ?>"> Course Chapter</a>
                    </li>
                    <li class="active"> Add Chapter</li>
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
                              <input type="hidden" name="course_id"  value="<?php echo $RESULT[0]->id; ?>">
                              <input type="hidden" name="unique_id"  value="<?php echo time(); ?>">
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Chapter <span> * </span></label>
                                        <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?> </div>
                                   
                        
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description">
                                            <?php echo set_value( 'description'); ?> </textarea>
                                        <?php echo form_error( 'description'); ?>
                                    </div>
                                    
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
      <script>

 
            function addVideoLinks()
            { 
                $('#append_video_links').append('<span class="row"><div class="col-md-1"><input type="text" class="form-control" name="videopostion[]" required placeholder="Position"></div><div class="col-md-6"><input type="text" class="form-control" name="videotitle[]" required placeholder="Video Title "></div><div class="col-md-4"><input type="text" class="form-control" name="videoLinks[]"  placeholder="Video Link" required></div><div class="col-md-1" style="padding-bottom:5px"><button class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></button></div> <div class="col-sm-12" > <textarea  class="form-control" name="videoDescription[]"  placeholder="Video Link"  ></textarea></div><span>');
            } 
            function addDocuments()
            { 
                $('#append_documents_links').append('<span class="row"><div class="col-md-3"><input type="file" class="form-control" name="image[]" required></div><div class="col-md-4"><input type="text" class="form-control" name="imagetitle[]" required></div><div class="col-md-3" style="padding-bottom:5px"><button class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></button></div><span>');
            } 
            function addImage()
            { 
                $('#append_image_links').append('<span class="row"><div class="col-md-3"><input type="file" class="form-control" name="image[]" required></div><div class="col-md-4"><input type="text" class="form-control" name="imagetitle[]" required></div><div class="col-md-3" style="padding-bottom:5px"><button class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></button></div><span>');
            }


            </script>


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
                    url: '<?php echo base_url('
                    admin / course / video_thumbnail_delete '); ?>',
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

        function remove_video(IMG_ID) {
            var confirm_event = confirm('are you sure you want to delete this image?');
            if (confirm_event == true) {
                $.ajax({
                    url: '<?php echo base_url('
                    admin / course / video_delete '); ?>',
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
