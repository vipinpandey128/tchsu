<!DOCTYPE html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_board_class($_GET['scid']);?>
    <?php $cms_page_title = $this->cms_model->get_board_class_title($_GET['scid']);?>
    <meta charset="utf-8" />
    <title></title>
    <link href="<?php echo base_url('assets/front/'); ?>Content/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/Site.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/tchsu.css" rel="stylesheet" />
    <?php $this->load->view('front/layout/head.php') ?>
 <style>
    .rounded {
        border-radius: 1.25rem!important;
    }
    
    .card {
        padding-bottom: 10px;
    }
    
    .float-left {
        margin: 9px;
    }
    
    #th-0 {
        padding-bottom: 1px;
        background-color: #42a5f5;
        margin-right: -12px;
    }
    
    .media {
        margin-top: 15px;
    }
    
    .media,
    .media-body {
        zoom: 1;
        overflow: hidden;
    }
    
    .media-body {
        width: 10000px;
    }
    
    .media-object {
        display: block;
    }
    
    .media-right,
    .media>.pull-right {
        padding-left: 10px;
    }
    
    .media-left,
    .media>.pull-left {
        padding-right: 10px;
    }
    
    .media-left,
    .media-right,
    .media-body {
        display: table-cell;
        vertical-align: top;
    }
    
    .media-middle {
        vertical-align: middle;
    }
    
    .media-bottom {
        vertical-align: bottom;
    }
    
    .media-heading {
        margin-top: 0;
        margin-bottom: 5px;
    }
    
    .media-list {
        padding-left: 0;
        list-style: none;
    }
</style>
</head>
<body>
    
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb alert alert-secondary">
            <li class="breadcrumb-item"><a href="https://tchsu.in">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Online Cources</a></li>
            <li class="breadcrumb-item active" aria-current="page">School</li>
        </ol>
    </nav>
</div>


<div class="container shadow p-3 mb-5 bg-white rounded">

    <h2 id="ContentPlaceHolder1_h1_Title" class="spn_Title text-center"><?php echo $cms_page_title[0]->TitleName ?></h2>
    <p id="ContentPlaceHolder1_p_CategoryDesc" class="exam-des p_CategoryDesc text-center"><?php echo $cms_page_title[0]->Description ?></p>


    <div class="row">
        <?php foreach($cms_page as $cms_pages){ ?>
            <div class="col-md-4 col-sm-4 col-lg-4">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">
                    <a class="media exam-icon-box" href="<?php echo base_url() ?><?php echo $cms_pages->URL ?>?BCID=<?php echo $cms_pages->BCID ?>">
                        <div class="media-left"><img src="<?php echo base_url("uploads/school_course/");?><?php echo $cms_pages->IconName ?>" class="rounded float-left"></div>
                        <div class="media-body text-center align-middle">
                            <h4 class="align-middle"><?php echo $cms_pages->ClassName ?></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="container shadow p-3 mb-5 bg-white rounded">

    <h2 id="ContentPlaceHolder1_h1_Title" class="spn_Title text-center">NCERT CBSE Study Materials</h2>
    <p id="ContentPlaceHolder1_p_CategoryDesc" class="exam-des p_CategoryDesc text-center">Boost your Preparation</p>


    <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3">
                <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                    <div class="body">
                        <div class="text-center"><img src="<?php echo base_url("uploads/school_course/video.png ");?>" class="rounded float-left">
                            <h4 class="align-middle">Video Courses</h4>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center">
                        <img src="<?php echo base_url("uploads/school_course/idea.png ");?>" class="rounded float-left">
                        <h4 class="align-middle">Notes</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/education.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">Solutions</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/essay.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">Practice Test</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/practice.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">Olympiad</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/star.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">Sample Papers</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/timetable.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">NCERT eBooks</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3">
            <div class="card mb-4 shadow p-3 mb-5 bg-white rounded">
                <div class="body">

                    <div class="text-center"><img src="<?php echo base_url("uploads/school_course/globe.png ");?>" class="rounded float-left">

                        <h4 class="align-middle">Report Analyzer</h4>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<br><br><br>
<div class="row m-50">

    <?php $this->load->view('front/layout/footer.php') ?>
</div>
    
</body>

</html>