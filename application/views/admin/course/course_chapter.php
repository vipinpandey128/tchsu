<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> |<?php echo $course[0]->title ?> Course Chapter</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.css'); ?>"> </head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><?php echo $course[0]->title ?> </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li ><a href="<?php echo base_url('admin/course/listing'); ?>">All Course </a>
                    </li> <li class="active"><a href="">  Course Chapter</a>
                    </li>
                </ol>
            </section>
            <div class="box-footer">
                <a href="<?php echo base_url('admin/course/add_course_chapter/'.$course[0]->id); ?>">
                    <button type="submit" class="btn btn-primary" name="submitform">Add New Chapter</button>
                </a>
            </div>
            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#.</th>
                                    <th>Unqiue Id</th>
                                    <th>Title</th>
                                    <th> Video</th>
                                    <th> Documents</th>
                                    <th>Images</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if(count($course_chapter)>0){ ?>
                            <tbody>
                                <?php $no=0; foreach($course_chapter as $record){ $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?php echo $record->unique_id; ?> </td>
                                    <td> <?php echo $record->title; ?> </td>
                                    <td> 
                                        <a href="<?php echo base_url('admin/course/add_course_chapter_video/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Add Course Chapter Video"> &nbsp;Add Video </a> 
                                        <a href="<?php echo base_url('admin/course/all_course_chapter_video/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Course Chapter Video"> &nbsp;All Video  (<?php echo $this->course_model->count_course_chapter_session_by_course_id($course[0]->id,$record->id,'Video') ?>)</a>
                                    </td>
                                    <td> 
                                        <a href="<?php echo base_url('admin/course/add_course_chapter_documents/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Add Course Chapter Documents"> &nbsp;Add documents </a> 
                                        <a href="<?php echo base_url('admin/course/all_course_chapter_documents/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Course Chapter Documents"> &nbsp;All Documents  (<?php echo $this->course_model->count_course_chapter_session_by_course_id($course[0]->id,$record->id,'Documents') ?>)</a>
                                    </td>

                                    <td> 
                                        <a href="<?php echo base_url('admin/course/add_course_chapter_image/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Add Course Chapter Image"> &nbsp;Add Image </a> 
                                        <a href="<?php echo base_url('admin/course/all_course_chapter_image/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Course Chapter Image"> &nbsp;All Image  (<?php echo $this->course_model->count_course_chapter_session_by_course_id($course[0]->id,$record->id,'Image') ?>)</a>
                                    </td>


                                  
                                    <td>
                                        <?php if($record->status==1){ ?> <span class="label label-success">Active</span>
                                        <?php }else{ ?> <span class="label label-danger">Inactive</span>
                                        <?php }?> </td>
                                    <td width=""> <a href="<?php echo base_url('admin/course/edit_course_chapter/'.$course[0]->id.'/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Edit Session"><i class="fa fa-fw fa-edit"></i>  &nbsp; </a>
                                        <!--  <a href="<?php echo base_url('admin/course/prodelete/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-fw fa-trash"></i>   &nbsp; </a>
                              -->
                                    </td>
                                </tr>
                                <?php } ?> </tbody>
                            <?php } ?> </table>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('admin/layout/footer'); ?> </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script>
        $(function() {
            $("#example1")
                .DataTable();
        });

    </script>
</body>

</html>
