<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Edit Course Package</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .users-list>li {
            width: auto;
            position: relative;
        }
        .users-list>li img {
            border-radius: 1%;
            max-width: 100px;
            height: auto;
            border: 3px solid #bfbfbf;
        }
        .users-list-name {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #f4f4f4;
            border-radius: 0px;
        }

    </style>
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
                <h1>Edit Course</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a> </li>
                    <li><a href="<?php echo base_url('admin/course/listing'); ?>">All Course</a> </li>
                    <li class="active">Edit Course</li>
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
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select board<span> * </span></label>
                                        <select class="form-control " name="board_refid" required id="board_refid">
                                            <option value=''>Select board</option>
                                            <?php echo $this->board_model->get_all_child_board(0); ?> </select>
                                        <?php echo form_error( 'board_refid'); ?> 
                                    </div>
                                    <div class="form-group col-sm-3 ">
                                        <label for="exampleInputPassword1">Select Subject  Type<span> * </span>
                                        </label>
                                        <select class="form-control" name="type" required>

                                            <option value='All Subject' <?php echo($RESULT[0]->type=='All Subject')?'selected':''; ?> >All Subject</option>
                                            <option value='Particular Subject' <?php echo($RESULT[0]->type=='Particular Subject')?'selected':''; ?>>Particular Subject</option>
                                        </select>
                                        <?php echo form_error( 'type'); ?>
                                    </div>


                                 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select Tutor<span> * </span></label>
                                        <select class="form-control " name="tutor_refid" required>
                                            <option value=''>Select Tutor</option>
                                            <?php foreach ($tutor as $key=> $value) { ?>
                                                <option <?php echo($RESULT[0]->tutor_refid==$value->id)?'selected':''; ?> value="<?php echo $value->id ?>"> <?php echo $value->name ?> (Tut-<?php echo $value->id ?>)</option>
                                            <?php } ?> 
                                        </select>
                                        <?php echo form_error( 'tutor'); ?>
                                         </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputPassword1">Select Class<span> * </span></label>
                                        <select class="form-control " name="class" required>
                                            <option value=''>Select class</option>
                                            <?php for ($i=1; $i <=12 ; $i++) { ?>
                                            <option <?php echo($RESULT[0]->class==$i)?'selected':''; ?> >
                                                <?php echo $i ?> </option>
                                            <?php } ?> </select>
                                        <?php echo form_error( 'class'); ?> 
                                    </div>

                                    <div class="col-sm-12 form-group">
                                          <label for="exampleInputEmail1">Select Subject  </label>
                                          <br>

                                          <?php $subjectArray  =  explode(',', $RESULT[0]->subject) ;  ?>
                                          <?php foreach ($subject as $key => $value) { ?>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="subject[]" value="<?php echo $value->title ?> " <?php echo (in_array($value->title, $subjectArray))?" checked" :"" ; ?>>
                                                    <?php echo $value->title ?>

                                               </label>
                                         <?php   }  ?>  

                                        </div>


                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Title<span> * </span></label>
                                        <input type="text" class="form-control" name="title" onkeyup="return set_slug(this.value);" value="<?php echo $RESULT[0]->title; ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
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
                                        <label for="exampleInputEmail1">Price<span> * </span></label>
                                        <input type="number" class="form-control" name="price" id="price" value="<?php echo $RESULT[0]->price; ?>">
                                        <?php echo form_error( 'price'); ?> </div>
                                    <div class="form-group col-sm-4">
                                        <label for="exampleInputEmail1">Special Price</label>
                                        <input type="number" class="form-control" name="special_price" id="special_price" value="<?php echo $RESULT[0]->special_price; ?>">
                                        <?php echo form_error( 'special_price'); ?> </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <input type="hidden" name="old_file" value="<?php echo $RESULT[0]->image; ?>">
                                        <?php if(!empty($RESULT[0]->image)){ ?> <img src="<?php echo base_url('uploads/course/').$RESULT[0]->image; ?>" width="20%">
                                        <?php } ?> </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image Alt*</label>
                                        <input type="text" class="form-control" name="img_tag" id="img_tag" value="<?php echo $RESULT[0]->img_tag; ?>" required>
                                        <?php //echo form_error( 'url_slug'); ?> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description">
                                            <?php echo $RESULT[0]->description; ?></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Meta Title <span> * </span></label>
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $RESULT[0]->meta_title; ?>" placeholder="Enter Meta Title">
                                        <?php echo form_error( 'meta_title'); ?> </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords" value="<?php echo $RESULT[0]->meta_keywords; ?>" placeholder="Enter Meta Keywords">
                                        <?php echo form_error( 'meta_keywords'); ?> </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description" value="<?php echo $RESULT[0]->meta_description; ?>" placeholder="Enter Meta Description"> </div>
                                </div>
                                <div class="form-group col-sm-6 ">
                                    <label for="exampleInputPassword1">Home Latest Display</label>
                                    <select class="form-control" name="is_latest" required>
                                        <option value='yes' <?php echo($RESULT[0]->is_latest=='yes')?'selected':''; ?> >Yes</option>
                                        <option value='no' <?php echo($RESULT[0]->is_latest=='no')?'selected':''; ?>>No</option>
                                    </select>
                                    <?php echo form_error( 'status'); ?> </div>
                                <div class="form-group col-sm-6 ">
                                    <label for="exampleInputPassword1">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value='1' <?php echo($RESULT[0]->status==1)?'selected':''; ?> >Active</option>
                                        <option value='0' <?php echo($RESULT[0]->status==0)?'selected':''; ?>>Inactive</option>
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
    <script>
        $('#board_refid').val('<?php echo $RESULT[0]->board_refid; ?>').change();

    </script>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/layout/footer'); ?> </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/layout/footer_js'); ?>
    <script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
    <script class="example">
        $(document).ready(function() {
            $('#form').parsley();
            $("form").on('click', '.removedata', function() {
                $(this).parents(".fille_group").remove();
            });
        });

        function set_slug(VALUE) {
            $("#url_slug").val(string_to_slug(VALUE));
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

        function remove_image(IMG_ID, IMG, TYPE) {
            var confirm_event = confirm('are you sure you want to delete this image?');
            if (confirm_event == true) {
                $.ajax({
                    url: '<?php echo base_url('
                    admin / course / image_delete '); ?>',
                    type: 'POST',
                    data: {
                        'id': IMG_ID,
                        'image': IMG
                    },
                    success: function(response) {
                        if (response == 1) {
                            $(".pro_img" + IMG_ID).fadeOut(300, function() {
                                $(this).remove();
                            });
                        }
                        if (response == 0) {
                            alert('oops somthing wrong!');
                        }
                    }
                });
            }
        }

    </script>
    <script>
        function addImage() {
            $('#append_image').append('<span class="fille_group"><div class="col-md-3"><input type="file" class="form-control" name="image[]" required></div><div class="col-md-3"><input type="text" class="form-control" name="img_tag[]" required placeholder="Alt Tag"></div><div class="col-md-3"><input type="number" class="form-control" name="position[]" required placeholder="Position"></div><div class="col-md-3" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></a></div><span>');
        }
        $(document).ready(function() {
            $(".chosen-control").chosen();
        });

    </script>
</body>

</html>
