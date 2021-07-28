<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add Page</title>
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
                        <h1>Add New Page</h1>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li><a href="<?php echo base_url('admin/Page/listing'); ?>">All Page</a></li>
                            <li class="active">Add New Page</li>
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
                                          
                                              <div class="form-group">
                                              <label for="exampleInputEmail1">Title</label>
                                              <input type="text" class="form-control" name="title" onkeyup="return set_slug(this.value);" required placeholder="Enter Title">         
                                              <?php echo form_error('title'); ?>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Url Slug</label>
                                              <input type="text" class="form-control" name="url_key" id="url_slug" readonly >
                                              
                                                    </div>

                                           
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Description</label>
                                              <textarea class="form-control" name="description" value="" placeholder="Enter description"></textarea>
                                            </div>       
                                         
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta Title</label>
                                                <input type="text" class="form-control" name="meta_title" value=""  placeholder="Enter Meta Title">
                                                <?php echo form_error('meta_title'); ?>
                                            </div> 
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta canonical</label>
                                                <input type="text" class="form-control" name="canonical" value=""  placeholder="Enter Meta canonical">
                                                <?php echo form_error('canonical'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta Keyword</label>
                                                <input type="text" class="form-control" name="meta_keyword"  placeholder="Enter meta Keywords" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Meta description</label>
                                                <input type="text" class="form-control" name="meta_description"  placeholder="Enter meta description" value="">
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
                                            <button type="submit" class="btn btn-primary" name="submitform">Add Page</button>
                                            <a href="<?php echo base_url()?>admin/Page/listing"> <button type="button" class="btn btn-primary" name="submitform">Cancel </button></a>
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

    <script class="example">
$(document).ready(function(){
  $('#form').parsley();
  
});


function set_slug(VALUE)
{
  //alert(VALUE);
  $("#url_slug").val(string_to_slug(VALUE));
}

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes
    return str;
}
</script>

</body>

</html>