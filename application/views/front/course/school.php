<!DOCTYPE html>
<html>
<head>
      <?php $cms_page = $this->cms_model->get_all_courses();?>
    <meta charset="utf-8" />
    <title>School Courses</title>
    
    <link href="<?php echo base_url('assets/front/'); ?>Content/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/Site.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/tchsu.css" rel="stylesheet" />
    <?php $this->load->view('front/layout/head.php') ?>
    
    <style>
        #th-0 {
            padding-bottom: 1px;
            background-color: #42a5f5;
            margin-right: -12px;
        }
        .img-cource{
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 60%;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb alert alert-secondary">
                    <li class="breadcrumb-item"><a href="https://tchsu.in">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Online Cources</a></li>
                    <li class="breadcrumb-item active" aria-current="page">School</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-lg-6">
                <img src="https://tchsu.in/uploads/school/students.jpg" height="100%" width="100%">
            </div>

            <div class="col-md-12 col-sm-6 col-lg-6 bcCource">
                <h1 class="text-center text-white" id="mt-0">Class V to XII</h1>
                <p class="text-center text-white" id="cp-0">
                    An innovative way of learning through animations,
                    video tools, project-based activities, sample papers,
                    quiz, ebooks, worksheets and reports from India's best teachers.
                </p>
            </div>
        </div>

        <div class="row m-50">
            <h2 class="text-center">Select Your Board</h2>
            <p class="text-center">
                There are different types of education boards in India. All schools and administration follow the board according to their state. The common boards in India are CBSE (Central Board of Secondary Education) and ICSE (Indian Certificate of Secondary Education).
                Edubull offer content of various State Boards the list is given below.
            </p>
        </div>

        <div class="row m-50">
            <?php 
                foreach ($cms_page as $cms_pages) {?>
                      <div class="col-md-12 col-sm-3 col-lg-3">
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded text-center">
                            <img class="img-cource" src="<?php echo base_url();?><?php echo $cms_pages->IconName ?>">
                            <div class="card-body">
                                <p class="card-text text-center"><?php echo $cms_pages->TitleName ?></p>
                                <a href="<?php echo base_url();?><?php echo $cms_pages->URL ?>?scid=<?php echo $cms_pages->SCID ?>" class="btn btn-primary btn-lg btn-block"><?php echo $cms_pages->BoardName ?></a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            
            <!--<div class="col-md-12 col-sm-3 col-lg-3">
                <div class="card">
                    <img src="https://tchsu.in/uploads/school/icse-board-logo.jpg">
                    <div class="card-body">

                        <p class="card-text text-center">Indian Certificate of Secondary Education</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary btn-lg btn-block">ICSE Board</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-3 col-lg-3">
                <div class="card">
                    <img src="https://tchsu.in/uploads/school/msbshse-board-logo.jpg">
                    <div class="card-body">

                        <p class="card-text text-center">Maharashtra State Board of S. & H. Sec. Education</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block"> MSBSHSE Board</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-3 col-lg-3">
                <div class="card">
                    <img src="https://tchsu.in/uploads/school/rbse-board-logo.jpg">
                    <div class="card-body">

                        <p class="card-text text-center">Rajasthan Board of Secondary Education</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block">RBSE Board</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-3 col-lg-3">
                <div class="card">
                    <img src="https://tchsu.in/uploads/school/upmsp-board-logo.jpg">
                    <div class="card-body">

                        <p class="card-text text-center">Uttar Pradesh Madh. Shiksha Parishad.</p>
                        <a href="#" class="btn btn-primary btn-lg btn-block">UPMSP Board</a>
                    </div>
                </div>
            </div>-->

        </div>
        
    </div>
    <div class="row m-50">
            <?php $this->load->view('front/layout/footer.php') ?>
        </div>
    
</body>

</html>