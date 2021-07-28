<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo Website; ?> | Add New Tutor</title>
    <?php $this->load->view('admin/layout/head_css'); ?>
    <?php $this->load->view('admin/layout/tiny-mce'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/layout/header'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php $this->load->view('admin/layout/sidebar'); ?>



<script type="text/javascript">
  
    function show_preview()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();
        var allowed_exts = ['jpg','jpeg'];
        if (allowed_exts.indexOf(ext)==-1) {

            alert('invalid image file');
            $('#logo').val('');
            return false;

        }

        var img = new Image();
        img.onload = function()
        {
            if(this.width > 400 || this.height > 400)
            {
                alert("Height and width can be less than 400 * 400");
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
<script type="text/javascript">
  
    function show_preview2()
    {
        var _URL = window.URL || window.webkitURL;
        var file = event.target.files[0];
        var ext = file.name.split('.').pop();

        var allowed_exts = ['jpg','jpeg'];

        if (allowed_exts.indexOf(ext)==-1) {

            alert('invalid image file');
            $('#logo2').val('');
            return false;

        }

        var img = new Image();
        img.onload = function()
        {
            
                $('#logo_preview2').html("");
                $('#edited_image').css('display', 'none');
                $('#logo_preview2').append("<img style='height:auto; width:250px; margin-left:2%;' src='"+this.src+"'/>");
           
        }
        img.src = _URL.createObjectURL(file);
    }
</script>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Add New Tutor</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/tutor/listing'); ?>">All Tutor</a>
                    </li>
                    <li class="active">All Tutor</li>
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
                                <div class="box-body row">
                        
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Name <span class="error"> * </span></label>
                                        <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" required placeholder="Enter Name">
                                        <?php echo form_error( 'name'); ?>
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Gender <span class="error"> * </span></label>
                                        <select class="form-control" name="gender" required>
                                            <option value="">--Select--</option>
                                            <option >Male</option>
                                            <option >Female</option>
                                        </select>
                                        <?php echo form_error( 'status'); ?>
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Adhaar Card Id</label>
                                        <input type="text" class="form-control" name="adhaarno" value="<?php echo set_value('adhaarno'); ?>"  placeholder="Enter Adhaar Card Id">
                                        <?php echo form_error( 'adhaarno'); ?>
                                    </div>
                                     <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Age <span class="error"> * </span></label>
                                        <input type="number" class="form-control" name="age" value="<?php echo set_value('age'); ?>" required placeholder="Enter Age">
                                        <?php echo form_error( 'age'); ?>
                                    </div>


                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Email <span class="error"> * </span></label>
                                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" required placeholder="Enter Email">
                                        <?php echo form_error( 'email'); ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Phone <span class="error"> * </span></label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" required placeholder="Enter Phone">
                                        <?php echo form_error( 'phone'); ?>
                                    </div> 
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Alt Phone  </label>
                                        <input type="text" class="form-control" name="alt_phone" value="<?php echo set_value('alt_phone'); ?>"  placeholder="Enter Alt Phone">
                                        <?php echo form_error( 'alt_phone'); ?>
                                    </div>
                                       <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">City <span class="error"> * </span></label>
                                        <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>" required placeholder="Enter City">
                                        <?php echo form_error( 'city'); ?>
                                    </div>
                                       <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">State <span class="error"> * </span></label>
                                        <input type="text" class="form-control" name="state" value="<?php echo set_value('state'); ?>" required placeholder="Enter State">
                                        <?php echo form_error( 'state'); ?>
                                    </div>

                                       <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>" required placeholder="Enter Address">
                                        <?php echo form_error( 'address'); ?>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Experience In years  </label>
                                        <input type="text" class="form-control" name="experience" value="<?php echo set_value('experience'); ?>"  placeholder="Enter experience">
                                        <?php echo form_error( 'experience'); ?>
                                    </div> 
                                    <div class="form-group col-sm-3">
                                        <label for="exampleInputEmail1">Preferred _board    </label>
                                        <input type="text" class="form-control" name="preferred_board" value="<?php echo set_value('preferred_board'); ?>" required placeholder="Enter preferred _board   ">
                                        <?php echo form_error( 'preferred_board'); ?>
                                    </div>    
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Specialization   <span class="error"> * </span>  </label>
                                        <input type="text" class="form-control" name="specialization"  required="" value="<?php echo set_value('specialization'); ?>"  placeholder="Enter Specialization">
                                        <?php echo form_error( 'specialization'); ?>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Qualification   <span class="error"> * </span>  </label>
                                        <input type="text" class="form-control" name="qualification"  required="" value="<?php echo set_value('qualification'); ?>"  placeholder="Enter Qualification">
                                        <?php echo form_error( 'qualification'); ?>
                                    </div>                                    
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1"> Tutor  Profile  <span class="error"> * </span> </label>
                                        <input type="file" class="form-control" name="profile_pic"  id="logo"  onchange="show_preview();">
                                       
                                         <p class="error" style="color: red">Note: Upload Image Only Jpeg and jpg format and less than  400*400 px width-height</p> 
                                    </div> 
                                     <div class="form-group col-sm-6">
                                       <div class="" id="logo_preview">
                                          
                                         </div>
                                     </div>

                                    <div class="form-group col-sm-12">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="details" placeholder="Enter details    "></textarea>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value='1'>Active</option>
                                            <option value='0'>Inactive</option>
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
    </script>
</body>

</html>