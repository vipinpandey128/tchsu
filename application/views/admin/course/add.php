<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add New Course Package</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
    <script type="text/javascript">
        function show_preview() {
            var _URL = window.URL || window.webkitURL;
            var file = event.target.files[0];
            var ext = file.name.split('.')
                .pop();
            var allowed_exts = ['jpg', 'jpeg', 'png'];
            if (allowed_exts.indexOf(ext) == -1) {
                alert('invalid image file');
                $('#logo')
                    .val('');
                return false;
            }
            var img = new Image();
            img.onload = function() {
                if (this.width > 600 || this.height > 600) {
                    alert("Height and width can be 600 * 600 or less only !");
                    $("#logo")
                        .val("");
                    $('#logo_preview')
                        .html("");
                    return false;
                } else {
                    $('#logo_preview')
                        .html("");
                    $('#edited_image')
                        .css('display', 'none');
                    $('#logo_preview')
                        .append("<img style='height:auto; width:250px; margin-left:2%;' src='" + this.src + "'/>");
                }
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
                <h1>Add New Course Package</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/course/listing'); ?>">All Course Package</a>
                    </li>
                    <li class="active">All Course Package</li>
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
                            <?php echo $this->session->flashdata('msg'); ?>
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select Board <span> * </span>
                                        </label>
                                        <select class="form-control " name="board_refid" required>
                                            <option value=''>Select board</option>
                                            <?php echo $this->board_model->get_all_child_board(0); ?> </select>
                                        <?php echo form_error( 'board_refid'); ?> 
                                      </div>

                                    <div class="form-group col-sm-3 ">
                                        <label for="exampleInputPassword1">Select Subject Type <span> * </span>
                                        </label>
                                        <select class="form-control" name="type" required>
                                            <option value='All Subject'>All Subject</option>
                                            <option value='Particular Subject'>Particular Subject</option>
                                        </select>
                                        <?php echo form_error( 'type'); ?>
                                    </div>


                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select Class<span> * </span>
                                        </label>
                                        <select class="form-control " name="class" required>
                                            <option value=''>Select class</option>
                                            <?php for ($i=1; $i <=12 ; $i++) { echo "<option>".$i. "</option>"; } ?> </select>
                                        <?php echo form_error( 'class'); ?> 
                                    </div>
                                 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select Tutor<span> * </span>
                                        </label>
                                        <select class="form-control " name="tutor_refid" required>
                                            <option value=''>Select Tutor</option>
                                            <?php foreach ($tutor as $key=> $value) { ?>
                                            <option value="<?php echo $value->id ?>">
                                                <?php echo $value->name ?> (Tut-
                                                <?php echo $value->id ?>)</option>
                                            <?php } ?> </select>
                                        <?php echo form_error( 'tutor'); ?>
                                   </div>


                                        <div class="col-sm-12 form-group">
                                          <label for="exampleInputEmail1">Select Subject  </label>
                                          <br>
                                      

                                          <?php foreach ($subject as $key => $value) { ?>
                                                <label class="checkbox-inline"><input type="checkbox" name="subject[]" value="<?php echo $value->title ?> "><?php echo $value->title ?> </label>
                                         <?php   }  ?>  

                                        </div>





                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Title<span> * </span>
                                        </label>
                                        <input type="text" class="form-control" name="title" onkeyup="return set_slug(this.value);" value="<?php echo set_value('title'); ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?> 
                                  </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Url Slug<span> * </span>
                                        </label>
                                        <input type="text" class="form-control" name="url_slug" id="url_slug" readonly value="<?php echo set_value('url_slug'); ?>">
                                        <?php echo form_error( 'url_slug'); ?>
                                    </div>
                                      <div class="form-group col-sm-4 ">
                                        <label for="exampleInputPassword1">Charges Type <span> * </span>
                                        </label>
                                        <select class="form-control" name="charges_type" required>
                                            <option value='Monthly'>Monthly</option>
                                            <option value='Yearly'>Yearly</option>
                                        </select>
                                        <?php echo form_error( 'charges_type'); ?>
                                    </div>


                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1">Price<span> * </span>
                                        </label>
                                        <input type="number" class="form-control" name="price" id="price" value="<?php echo set_value('price'); ?>" required>
                                        <?php echo form_error( 'price'); ?> </div>
                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1">Special Price</label>
                                        <input type="number" class="form-control" name="special_price" id="special_price" value="<?php echo set_value('special_price'); ?>">
                                        <?php echo form_error( 'special_price'); ?>
                                   </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image * </label>
                                        <input type="file" class="form-control" value="<?php echo set_value('image'); ?>" id="logo" name="image" onchange="show_preview();">
                                        <?php echo form_error( 'image'); ?>
                                        <div class="" id="logo_preview"></div>
                                        <p class="error" style="color: red">Note: use image between 300-300 px to 600 * 600 px width-height</p>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image Alt*</label>
                                        <input type="text" class="form-control" name="img_tag" id="img_tag" required>
                                        <?php //echo form_error( 'url_slug'); ?> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Title<span> * </span>
                                        </label>
                                        <input type="text" class="form-control" name="meta_title" required="" value="<?php echo set_value('meta_title'); ?>" placeholder="Enter Meta Title">
                                        <?php echo form_error( 'meta_title'); ?> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords" value="<?php echo set_value('meta_keywords'); ?>" placeholder="Enter Meta Keywords"> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description" value="<?php echo set_value('meta_description'); ?>" placeholder="Enter Meta Description"> </div>
                                    <div class="form-group col-sm-6 ">
                                        <label for="exampleInputPassword1">Home Latest Display <span> * </span>
                                        </label>
                                        <select class="form-control" name="is_latest" required>
                                            <option value='no'>No</option>
                                            <option value='yes'>Yes</option>
                                        </select>
                                        <?php echo form_error( 'is_latest'); ?> </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status <span> * </span>
                                        </label>
                                        <select class="form-control" name="status" required>
                                            <option value='0'>Inactive</option>
                                            <option value='1'>Active</option>
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
                $("form")
                    .on('click', '.removedata', function() {
                        $(this)
                            .parents(".fille_group")
                            .remove();
                    });
            });

        function set_slug(VALUE) {
            //alert(VALUE);
            $("#url_slug")
                .val(string_to_slug(VALUE));
        }

        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
            return str;
        }

    </script>
    <?php if(isset($inclusions[ 'js'])) : foreach($inclusions[ 'js'] as $script) { echo "<script type='text/javascript' src='".base_url($script. '.js'). "'></script>\n"; } endif; ?>
    <script>
        function addImage() {
            $('#append_image')
                .append('<span class="fille_group"><div class="col-md-3"><input type="file" class="form-control" name="image[]" required></div><div class="col-md-3"><input type="text" class="form-control" name="img_tag[]" required placeholder="Alt Tag"></div><div class="col-md-3"><input type="number" class="form-control" name="position[]" required placeholder="Position"></div><div class="col-md-3" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></a></div><span>');
        }
        $(document)
            .ready(function() {
                $(".chosen-control")
                    .chosen();
            });

    </script>
</body>

</html>
