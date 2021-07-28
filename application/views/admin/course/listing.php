<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | All Course Package</title>
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
                <h1>All Course Package</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">All Course Package</li>
                </ol>
            </section>
            <div class="box-footer">
                <a href="add_new">
                    <button type="submit" class="btn btn-primary" name="submitform">Add New Course</button>
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
                                    <th>Title</th>
                               
                                    <th>Class/Board</th>
                                    <th>Subject</th>
                                    
                                 
                                    <th>Charges Type</th>
                                    <th>Price</th>
                                    <th>S-Price</th>
                                       <th>Tutor</th>
                                    <th>Status</th>
                                    <th>Course Session</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if(count($RESULT)>0){ ?>
                            <tbody>
                                <?php $no=0; foreach($RESULT as $record){ $no++; ?>
                                <tr>
                                    <td>
                                        <?php echo $no; ?>
                                    </td>
                                    <td>
                                        <?php echo $record->title; ?>
                                        <br>
                                        <?php echo $record->sku; ?></td>
                                  
                                 
                                    <td>
                                        <?php echo $record->class;?>/ <?php echo $record->board_name;?> </td>
                                    <td> <?php echo $record->subject;?> </td>
                                   
                                  
                                     <td> <?php echo $record->charges_type;?> </td>
                                    <td>Rs.
                                        <?php echo $record->price; ?></td>
                                    <td>Rs.
                                        <?php echo $record->special_price; ?></td>
                                      <td> <?php echo $record->tutor_name;?> </td>    

                                    <td>
                                        <?php if($record->status==1){ ?> <span class="label label-success">Active</span>
                                        <?php }else{ ?> <span class="label label-danger">Inactive</span>
                                        <?php }?> </td>
                                    <td> <a href="<?php echo base_url('admin/course/add_course_chapter/'.$record->id); ?>" class="btn  btn-warning  btn-xs" title="Add Course Chapter"><i class="fa fa-video-camera"></i>  &nbsp; Add Chapter  </a>
                                        <br> <a href="<?php echo base_url('admin/course/course_chapter/'.$record->id); ?>" class="btn  btn-info  btn-xs" title="View Course Chapter List"><i class="fa fa-video-camera"></i>  &nbsp;    All Chapter ( 
			                               	<?php echo $this->course_model->count_course_chapter_by_course_id($record->id) ;  ?> )</a> </td>
                                    <td width=""> <a type="button" onclick="ViewEnquiry('<?php echo $record->id ?>')" class="Enquiry btn btn-success btn-xs" data-id="<?php echo $record->id ?>" data-toggle="modal" data-target="#enquiry-modal-lg" title="Edit Enquiry"><i class="fa fa-eye
                                		" aria-hidden="true"></i></a> <a href="<?php echo base_url('admin/course/edit/'.$record->id); ?>" class="btn  btn-info btn-xs" title="Edit"><i class="fa fa-fw fa-edit"></i>  &nbsp; </a> <a href="<?php echo base_url('admin/course/prodelete/'.$record->id); ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-fw fa-trash"></i>   &nbsp; </a> </td>
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
    <script type="text/javascript">
        function ViewEnquiry(courseId) {
            var courseId = courseId;
            $.ajax({
                url: "<?php echo base_url("admin/course/getcourseDetails/") ?>",
                type: "POST",
                data: {
                    courseId: courseId
                },
                success: function(output) {
                    $('#EnquiryModel')
                        .html(output);
                }
            });
            return false;
        }

    </script>
    <div class="modal fade " tabindex="-1" role="dialog" id="enquiry-modal-lg" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body" id="EnquiryModel"> </div>
            </div>
        </div>
    </div>
</body>

</html>
