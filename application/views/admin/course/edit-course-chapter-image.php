<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Course Chapter image</title>
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
                <h1><?php echo $course[0]->title; ?>  </h1>
                <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/listing'); ?>">All Course </a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/course_chapter/').$course[0]->id; ?>"> Course Chapter</a>
                    </li>
                    <li class="active"> Edit Chapter image</li>
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
                                        <?php echo form_error( 'title'); ?> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">image Title <span> * </span></label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $course_chapter_image[0]->title; ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
                                    </div>
                                            <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <input type="hidden" name="old_file" value="<?php echo $course_chapter_image[0]->image; ?>">
                                        <?php if(!empty($course_chapter_image[0]->file)){ ?> <img src="<?php echo base_url('uploads/course/image/').$course_chapter_image[0]->file; ?>" width="20%">
                                        <?php } ?> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description"><?php echo $course_chapter_image[0]->description; ?> </textarea>
                                        <?php echo form_error( 'description'); ?> </div>
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status<span> * </span></label>
                                        <select class="form-control" name="status" required>
                                            <option value='1' <?php echo($course_chapter_image[0]->status==1)?'selected':''; ?> >Active</option>
                                            <option value='0' <?php echo($course_chapter_image[0]->status==0)?'selected':''; ?>>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?> </div>
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
