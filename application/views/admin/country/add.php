<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add scents</title>
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
                        <h1>Add New Country</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url('admin/Country/listing'); ?>">All Country </a></li>
                            <li class="active">Add New Country</li>
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
                                           <!--  <div class="form-group">
                                                <label for="exampleInputPassword1">Select board</label>
                                                <select class="form-control " name="parent_id" required>
                                                    <option value=''>Select board</option>
                                                    <?php echo $this->board_model->get_all_child_board(0); ?>
                                                </select>
                                                <?php echo form_error('parent_id'); ?>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country Title</label>
                                                <input type="text" class="form-control" name="title" required placeholder="Enter Title" value="">
                                            </div>
                                         
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta Title</label>
                                                <input type="text" class="form-control" name="meta_title" value="" required placeholder="Enter Meta Title">
                                                <?php echo form_error('meta_title'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta Keyword</label>
                                                <input type="text" class="form-control" name="meta_keywords" required placeholder="Enter meta Keywords" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta description</label>
                                                <input type="text" class="form-control" name="meta_description" required placeholder="Enter meta description" value="">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Status</label>
                                                <select class="form-control" name="status" required>
                                                    <option value='1'>Active</option>
                                                    <option value='0'>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary" name="submitform">Add Country</button>
                                            <a href="<?php echo base_url()?>admin/Country/listing"> <button type="button" class="btn btn-primary" name="submitform">Cancel </button></a>
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

</body>

</html>