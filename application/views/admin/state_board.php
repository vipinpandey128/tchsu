<!DOCTYPE html>
<html>

<head>
    <?php $all_boards = $this->State_model->get_AllBoard(); ?>
    <title>State Registration</title>
    <link href="<?php echo base_url('assets/front/'); ?>Content/bootstrap.min.css" rel="stylesheet" />

</head>


<body class="bg-light">

    <div class="container -fluid">
        <div class="card shadow-sm p-3 mb-4 bg-white rounded">
            <div class="card-header">
                <h5 class="card-title">State Board</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h6 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">All Board Name</span>
                        </h6>
                        <ul class="list-group mb-3">
                            <?php foreach ($all_boards as $board) { ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?php echo $board->BoardName; ?></h6>
                                        <small class="text-muted"><?php echo $board->TitleName; ?></small>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1 shadow-sm p-3 mb-5 bg-white rounded">
                        <h4 class="mb-3">Board Details</h4>
                        <form id="form2 class=" needs-validation" method="post" action="<?= base_url() ?>Admin/StateBoard/savedata" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="boardimage">Board Image </label>
                                    <input type="file" name="boardimage" class="form-control" id="boardimage" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="titlename">Title Name</label>
                                    <input type="text" class="form-control" name="titlename" id="titlename" placeholder="Title Name" value="" autocomplete="off" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="boardname">Board Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="boardname" id="boardname" placeholder="Board Name" autocomplete="off" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="url">URL</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="url" id="url" readonly value="School_Course" autocomplete="off" placeholder="URL">
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">

                                    <div class="input-group">
                                        <input type="submit" name="save" value="Save Data" class="btn btn-outline-primary" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm p-3 mb-4 bg-white rounded">
            <div class="card-header">
                <h5 class="card-title">State Board classes</h5>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h6 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">All Board Classes</span>
                        </h6>
                        <ul class="list-group mb-3" id="boardClassDiv">

                        </ul>

                    </div>
                    <div class="col-md-8 order-md-1 shadow-sm p-3 mb-5 bg-white rounded">
                        <h4 class="mb-3">Class Details</h4>
                        <form id="form2" class="needs-validation" method="post" action="<?= base_url() ?>Admin/StateBoard/saveclass" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="select_board">Select State Board </label>
                                    <select class="form-control" id="select_board" name="select_board" required>
                                        <option>Select Board</option>
                                        <?php foreach ($all_boards as $board) { ?>
                                            <option value="<?php echo $board->SCID; ?>"><?php echo $board->BoardName; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="iconname">Upload Class Icon</label>
                                    <input type="file" name="iconname" class="form-control" id="iconname" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="classname">Class Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="classname" id="classname" placeholder="Class Name" autocomplete="off" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="url">URL</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="url" id="url" readonly value="Board_Course" autocomplete="off" placeholder="URL">
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">

                                    <div class="input-group">
                                        <input type="submit" name="save" value="Save Data" class="btn btn-outline-primary" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var baseURL = "<?php echo base_url(); ?>";
        $(document).ready(function() {
            $('#select_board').change(function() {
                $('#boardClassDiv').text('');
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>index.php/Admin/StateBoard/getBoardClass',
                    data: {
                        scid: $('#select_board option:selected').val()
                    },
                    dataType: 'json', //return type expected as json
                    success: function(response) {
                        $.each(response, function(key, val) {

                            var opt = $(`<li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">${val.ClassName}</h6>
                                    </div>
                                </li>`);
                            $('#boardClassDiv').append(opt);
                        });
                    },
                });
            });
        });
    </script>


</body>

</html>