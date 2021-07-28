<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add New board</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>


<script type="text/javascript">
  
    function show_preview()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();

        var allowed_exts = ['jpg','jpeg' ,'png'];

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
                alert("Height and width can be 300 * 300 or less only !");
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
                <h1>Add New board</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/board/listing'); ?>">All board</a>
                    </li>
                    <li class="active">All board</li>
                </ol>
            </section>



            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="box">
                    <div class="box-body">
                        <div class="box box-primary">
                            <?php echo $this->session->flashdata('msg'); ?>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="box-body row">
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputPassword1">Parent board*</label>
                                        <select class="form-control" name="parent_id" required>
                                            <option value='0'>Root</option>
                                            <?php echo $this->board_model->get_all_child_board(0); ?>
                                        </select>
                                        <?php echo form_error( 'parent_id'); ?>
                                    </div>

                                   


                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Title *</label>
                                        <input type="text" class="form-control" name="title" onkeyup="return set_slug(this.value);" value="<?php echo set_value('title'); ?>" required placeholder="Enter Title">
                                        <?php echo form_error( 'title'); ?>
                                                 <input type="hidden" class="form-control" name="url_slug" id="url_slug" readonly value="<?php echo set_value('url_slug'); ?>" required>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Code *</label>
                                        <input type="text" class="form-control" name="code" value="<?php echo set_value('code'); ?>" required placeholder="Enter code">
                                        <?php echo form_error( 'code'); ?>
                                    </div>
                                  
                               
                                   
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image * </label>
                                        <input type="file" class="form-control" value="<?php echo set_value('image'); ?>"  id="logo"  name="image" onchange="show_preview();">
                                        <?php echo form_error( 'image'); ?>
                                            <div class="" id="logo_preview"></div>
                                         <p class="error" style="color: red">Note: use  image  between 300-300 px to  600 * 600 px width-height</p>  
                                    </div>



                                       <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Image Alt*</label>
                                        <input type="text" class="form-control" name="img_tag" id="img_tag" required>
                                        <?php //echo form_error( 'url_slug'); ?>
                                    </div>
                                   

                                  







                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
                                    </div>





                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo set_value('meta_title'); ?>" required placeholder="Enter Meta Title">
                                        <?php echo form_error( 'meta_title'); ?>
                                    </div> 
                         
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keyword" value="<?php echo set_value('meta_keywords'); ?>" placeholder="Enter Meta Keywords">
                                        <?php echo form_error( 'meta_keywords'); ?>

                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Meta Description</label>
                                        <input type="text" class="form-control" name="meta_description" value="<?php echo set_value('meta_description'); ?>" placeholder="Enter Meta Description">
                                        <?php echo form_error( 'meta_description'); ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Home Display</label>
                                        <select class="form-control" name="home_display" required>
                                            <option value='1'>Yes</option>
                                            <option value='0'>No</option>
                                        </select>
                                        <?php echo form_error( 'home_display'); ?>
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


        function set_slug(VALUE) {
            //alert(VALUE);
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
    </script>

    <script>
        function append_system() {
                $('#system').append('<span class="fille_group"><div class="col-md-10" class="div1"><label>Ring System Name</label><select class="form-control" name="system[]" ><?php foreach($certificate as $result){ ?> < option value = "<?php echo $result->title; ?>" > <?php echo $result->title; ?> < /option><?php }?></select > < /div><div class="col-md-3" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i > < /a></div > < /div><span>');
                }


                function addcat() {
                        $('#append_image').append('<span class="fille_group"><div class="col-md-5" class="div1"><label>Certification board</label><select class="form-control" name="certificate[]" ><?php foreach($certificate as $result){ ?> < option value = "<?php echo $result->title; ?>" > <?php echo $result->title; ?> < /option><?php }?></select > < /div><div class="col-md-3"><label>Certification Price</label > < input type = "text" class = "form-control" name = "price_tow[]" > < /div><span>');
                        }

                        function addpooja() {
                            $('#append_image_pooja').append('<span class="fille_group"><div class="col-md-5" class="div1"><label>Pooja board</label><select class="form-control"  name="pooja_cat[]" ><?php foreach($pooja as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div><div class="col-md-3"><label> Price</label><input type="text"  class="form-control" name="price[]" ></div><span>');
                        }

                        function append_type() {
                            $('#type').append('<span class="fille_group"><div class="col-md-10" class="div1"><label>Type Name</label><select class="form-control"  name="type_name[]" ><?php foreach($type as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div></div><span>');
                        }



                        function append_country() {
                            $('#country').append('<span class="fille_group"><div class="col-md-5" class="div1"><label>Select Country Name</label><select class="form-control" name="country[]" ><?php foreach($country as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div><div class="col-md-3"><label> Price</label><input type="text"  class="form-control" name="price[]" ><div class="col-md-3" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></a></div></div><span>');
                        }

                        function append_ring_size() {
                            $('#ring_size').append('<span class="fille_group"><div class="col-md-8" class="div1"><label>Select Ring Size</label><select class="form-control"  name="ring_size[]" ><?php foreach($ring_size as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div></div><span>');
                        }

                        function append_diamond() {
                            $('#diamond').append('<span class="fille_group"><div class="col-md-5" class="div1"><label>Select Diamond Substitute</label><select class="form-control"  name="diamond[]" ><?php foreach($diamond as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div><div class="col-md-3"><label> Price</label><input type="text" class="form-control"  name="price[]" ></div></div><span>');
                        }

                        function append_design() {
                            $('#design').append('<span class="fille_group"><div class="col-md-2" class="div1"><label>Select Type</label><select class="form-control"  name="type[]" ><?php foreach($type as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div><div class="col-md-2" class="div1"><label>Select Metal</label><select class="form-control" name="metal[]" ><?php foreach($metal as $result){ ?><option value="<?php echo $result->title ?>"><?php echo $result->title; ?></option><?php }?></select></div><div class="col-md-2"><label> Design Name</label><input type="text" class="form-control"  name="design_name[]" ></div><div class="col-md-2"><label> Price</label><input type="text" class="form-control"  name="price[]" ></div><div class="col-md-3"><label> Add Design</label><input type="file"  class="form-control" name="image_metal[]" ></div></a></div></div><span>');
                        }





                        $(document).ready(function() {
                            $(".chosen-control").chosen();
                        });
    </script>
</body>

</html>