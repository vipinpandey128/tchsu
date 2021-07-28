<!DOCTYPE html>
<html>

<head>
    <?php $cms_page = $this->cms_model->get_class_subject($_GET['BCID']); ?>
    <?php $cms_learning_reports = $this->cms_model->get_learning_report($_GET['BCID']); ?>
    <?php $cms_learning_reports_submenus = $this->cms_model->get_submenu_learningrp($_GET['BCID']); ?>
    <meta charset="utf-8" />
    <title></title>
    <link href="<?php echo base_url('assets/front/'); ?>Content/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/Site.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/tchsu.css" rel="stylesheet" />
    <?php $this->load->view('front/layout/head.php') ?>
    <style>
        .rounded {
            border-radius: .75rem !important;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading {
            display: block;
        }
    </style>


</head>


<body>
    <div id="wait" style="position:absolute;top:50%;left:50%;padding:2px;"><img src="<?php echo base_url('uploads/loader/loader.gif') ?>" width="64" height="64" /><br>Loading..</div>
    <div class="container-fluid shadow-sm p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text text-center">CBSE Solutions for Class 5 All Subjects</h2>
                <p class="text2 ">The CBSE Class 5 syllabus is vast and needs a thorough study of each and every concept. The subjects covered in CBSE Class 5 are Math, English and Hindi and EVS. Edubull.com believes in engaging students through its multimedia based approach
                    to studies. Students can clarify and learn about various important concepts of CBSE class 5 and explore each concept thoroughly using our concept videos. Take a test at Edubull.com and students of CBSE Class 5 can know their preparation
                    level. We help in the self assessment of students to score good marks. One can take a test of Class 5 subjects like Math, Hindi, Social Science, English and EVS.</p>
                <a href="#learnigreport" class="btn btn-primary ">Ranking : 1</a>
                <a href="#learnigreport" class="btn btn-secondary">Your Learning Report</a>
            </div>
        </div>
    </div>
    <div class="container-fluid shadow-sm p-3 mb-5 bg-body rounded">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group shadow-sm p-3 mb-4 bg-body rounded"><a href="#" class="active list-group-item">Subjects</a></div>
                <div class="list-group" id="submenuId">
                    <?php $buttonActive = "";
                    $i = 0;
                    foreach ($cms_page as $cms_pages) {
                        if ($i < 1)
                            $buttonActive = "active";
                        else
                            $buttonActive = ""; ?>

                        <button onclick='getSubjectMenu(<?php echo $cms_pages->SBID ?>)' class="list-group-item list-group-item-action <?php echo $buttonActive; ?>"><?php echo $cms_pages->Subject_Menu ?></button>

                    <?php $i++;
                    } ?>


                </div>

            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 shadow-sm p-3 mb-4 bg-body rounded" id="sub_menuId">
                    </div>
                    <!-- <div class="col-sm-3 shadow-sm p-3 mb-4 bg-body rounded">
                        <img width="100%" height="100%" src="https://tchsu.in/uploads/course/maxresdefault.jpg">
                    </div> -->
                </div>

            </div>

        </div>

    </div>
    <div class="container-fluid shadow-sm p-3 mb-5 bg-body rounded">

        <h3 id="learnigreport" class="heading text-center">Your Learnig Report</h3>
        <p id="learnigreport" class="paragragh text-center"> Ranking: 1/249</p>
        <div class="row">

            <div class="col-sm-3">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
                <a href="#" class="active list-group-item "><i class="fa fa-file" aria-hidden="true"></i> Learning Report</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-compress-wide"></i></i> Compare with Topper</a>
            </div>


            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12  shadow-sm p-3 mb-5 bg-body rounded">
                        <?php $active = "active ";
                        foreach ($cms_learning_reports_submenus as $cms_learning_reports_submenu) { ?>
                            <button type="button" class="<?php echo $active; ?>btn btn-outline-primary border-radius"><?php echo $cms_learning_reports_submenu->MenuName ?> (0.00%)</button>
                        <?php $active = "";
                        } ?>
                    </div>

                    <?php foreach ($cms_learning_reports as $cms_learning_report) { ?>
                        <div class="col-sm-6">
                            <div class="shadow p-3 mb-5 bg-white rounded">
                                <div class="row">
                                    <div class="col-sm-3 media-left">
                                        <img src="<?php echo base_url('uploads/school_course/report_icon/'); ?><?php echo $cms_learning_report->IconName ?>" class="rounded float-left">
                                    </div>
                                    <div class="col-sm-9 text-left">
                                        <p class=""><?php echo $cms_learning_report->ItemName ?><br><b>7/7</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Load Exteral script file (Remove the comment if you want send AJAX request from external script file ) -->
    <!--<script src='<?php echo base_url(); ?>script/script.js' type='text/javascript' ></script>-->
    <script type='text/javascript'>
        // baseURL variable
        var baseURL = "<?php echo base_url(); ?>";

        function getSubjectMenu(sbid) {

            $.ajax({
                url: '<?= base_url() ?>index.php/Board_Class/subjectMenu',
                method: 'post',
                data: {
                    sbid: sbid
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#sub_menuId").text('');
                    if (len > 0) {
                        let text = "";
                        let buttonActive = "";
                        for (let i = 0; i < len; i++) {
                            if (i < 1)
                                buttonActive = "active";
                            else
                                buttonActive = "";

                            text += `<button type="button" onclick()="getItem(${response[i].SBMID})" class="btn btn-outline-primary border-radius ${buttonActive}">${response[i].Sub_Menu}</button> `;
                        }

                        document.getElementById('sub_menuId').innerHTML = text;
                        registerMethod();

                    }
                }
            });
        }
    </script>
    <script>
        registerActive();
        // Add active class to the current button (highlight it)
        function registerMethod() {
            var header = document.getElementById("sub_menuId");
            var btns = header.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var header = document.getElementById("sub_menuId");
                    var current = header.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        }

        function registerActive() {
            var header = document.getElementById("submenuId");
            var btns = header.getElementsByClassName("list-group-item");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                    var header = document.getElementById("submenuId");
                    var current = header.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        }

        $(document).on({
            ajaxStart: function() {
                $("body").addClass("loading");
            },
            ajaxStop: function() {
                $("body").removeClass("loading");
            }
        });
    </script>

</body>

</html>