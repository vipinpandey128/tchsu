<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        <?php echo Website; ?> | edit coupon</title>

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

                <h1>Edit coupon</h1>

                <ol class="breadcrumb">

                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>

                    <li><a href="<?php echo base_url('admin/coupon/listing'); ?>">All coupon</a>
                    </li>

                    <li class="active">Edit coupon</li>

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


                                     <div class="form-group col-sm-6">

                                        <label for="exampleInputEmail1">Title</label>

                                        <input type="text" class="form-control" name="title" maxlength="15" minlength="4"  value="<?php echo $RESULT[0]->title; ?>" required placeholder="Enter Title">

                                        <?php echo form_error( 'title'); ?>

                                    </div>


                               

                                   
                                   
                                  


                                    <div class="form-group col-sm-6">

                                        <label for="exampleInputEmail1">Price</label>

                                        <input type="number" class="form-control" name="amount" id="price" value="<?php echo $RESULT[0]->amount; ?>">

                                        <?php echo form_error( 'amount'); ?>

                                    </div>


                                      <div class="form-group col-sm-6">

                                            <label for="exampleInputEmail1">Enable Date</label>

                                            <input type="date" class="form-control" name="enableDate"
                                             value="<?php echo  date( 'Y-m-d',strtotime($RESULT[0]->enableDate)); ?>" required>

                                            <?php echo form_error('enableDate'); ?> 

                                        </div>

                                       
                                       
                                       <div class="form-group col-sm-6">

                                            <label for="exampleInputEmail1">Disable Date</label>

                                            <input type="date" class="form-control" name="disableDate"  
                                            value="<?php echo  date( 'Y-m-d', strtotime($RESULT[0]->disableDate)); ?>" required>

                                            <?php echo form_error('disableDate  '); ?>  

                                        </div>




                       


                             

                                    <div class="form-group col-sm-12">

                                        <label for="exampleInputEmail1">Description</label>

                                        <textarea class="form-control" name="description" placeholder="Enter description">
                                            <?php echo $RESULT[0]->description; ?></textarea>

                                    </div>

                                 
                                <div class="form-group col-sm-6 ">

                                    <label for="exampleInputPassword1">Status</label>

                                    <select class="form-control" name="status" required>

                                        <option value='1' <?php echo($RESULT[0]->status==1)?'selected':''; ?> >Active</option>

                                        <option value='0' <?php echo($RESULT[0]->status==0)?'selected':''; ?>>Inactive</option>

                                    </select>

                                    <?php echo form_error( 'status'); ?>

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
<script>
$('#select_cat').val('<?php echo $RESULT[0]->board_id; ?>').change();
</script>
    <!-- /.content-wrapper -->

    <?php $this->load->view('admin/layout/footer'); ?>

    </div>

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

     

        function set_slug(VALUE)

        {

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



        function remove_image(IMG_ID, IMG, TYPE)

        {

            var confirm_event = confirm('are you sure you want to delete this image?');
            if (confirm_event == true) {
                $.ajax({

                    url: '<?php echo base_url('admin/coupon/image_delete'); ?>',

                    type: 'POST',

                    data: {
                        'id': IMG_ID,
                        'image': IMG
                    },

                    success: function(response)

                    {

                        if (response == 1)

                        {

                            $(".pro_img" + IMG_ID).fadeOut(300, function() {
                                $(this).remove();
                            });

                        }

                        if (response == 0)

                        {

                            alert('oops somthing wrong!');

                        }

                    }

                });

            }

        }
    </script>
    <script>

 
function addImage()
{ 
	$('#append_image').append('<span class="fille_group"><div class="col-md-3"><input type="file" class="form-control" name="image[]" required></div><div class="col-md-3"><input type="text" class="form-control" name="img_tag[]" required placeholder="Alt Tag"></div><div class="col-md-3"><input type="number" class="form-control" name="position[]" required placeholder="Position"></div><div class="col-md-3" style="padding-bottom:5px"><a class="btn btn-danger removedata"><i class="fa fa-fw fa-trash"></i></a></div><span>');
}


$(document).ready(function(){
$(".chosen-control").chosen();
});
</script>

</body>

</html>