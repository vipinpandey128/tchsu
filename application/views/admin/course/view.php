
                            <!-- /.box-header -->

                            <!-- form start -->
                            <h2><?php echo $RESULT[0]->title; ?> </h2>

                            <form role="form" method="post" id="form" autocomplete="off" enctype="multipart/form-data" action="<?php echo base_url('admin/course/editcourseProcess') ;  ?>">

                                <div class="box-body row">



                                    <input type="hidden" name="course_id" value="<?php echo $RESULT[0]->id; ?>">


                                    <div class="form-group col-sm-6">

                                        <label for="exampleInputEmail1">Price</label>

                                        <input type="number" class="form-control" name="price" id="price" value="<?php echo $RESULT[0]->price; ?>">

                                        <?php echo form_error( 'price'); ?>

                                    </div>


                                    <div class="form-group col-sm-6">

                                        <label for="exampleInputEmail1">Special Price</label>

                                        <input type="number" class="form-control" name="special_price" id="special_price" value="<?php echo $RESULT[0]->special_price; ?>">

                                        <?php echo form_error( 'special_price'); ?>

                                    </div>



                                <div class="form-group col-sm-6 ">

                                    <label for="exampleInputPassword1">Home Latest Display</label>

                                    <select class="form-control" name="is_latest" required>

                                        <option value='yes' <?php echo($RESULT[0]->is_latest=='yes')?'selected':''; ?> >Yes</option>

                                        <option value='no' <?php echo($RESULT[0]->is_latest=='no')?'selected':''; ?>>No</option>

                                    </select>

                                    <?php echo form_error( 'status'); ?>

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

                        </div>

                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button type="Submit" class="btn btn-primary" name="submitform">Submit</button>

                        </div>

                        </form>


