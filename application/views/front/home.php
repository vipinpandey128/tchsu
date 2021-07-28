<html class="scroll-effects">
<head>
 <?php $this->load->view('front/layout/head.php') ?>
       
    <style>
        .img_radius{
            border-radius: 10px;
        }
        .background1{
            background-color: #808080;
        }
        .background2{
            
            background-color: #076f5d;
        }
        .background3{
           background-color: #c19307; 
        }
        
    </style>
    
</head>
<body id="mnapp" class="">
   
   
        <?php $cms_page = $this->cms_model->get_cms_by_id(1);?>
    <?php $first_level = $this->board_model->get_board_by_parent(0); ?>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<?php $userdata = $this->user_model->get_user_by_id($user_id);?>
    <!-- top header  -->
    <header class="main-header">
        <div class="wrapper">
            <div class="row">
                <nav class="navbar">
                    <div class="main-logo">
                        <div class="menu-toggle" id="mobile-menu" onclick="openNav()">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                        <img src="https://tchsu.in/uploads/214212046153.png" class="logo-img" alt="">
                    </div>

                    <div class="btns-mobile">
                        <a href="/products/purchase" class="btn btn-primary buy-course">Buy a Course</a>
                        <a href="javascript:void(0)" onclick="trackGaEvent('Homepage_New1','Login_Header','Login');" class="btn btn-primary signup login-btn mnLoginPopup">Sign Up</a>
                    </div>
                    <!-- <a href="javascript:void(0)" class="login-btn mnLoginPopup" onclick="trackGaEvent('Homepage_New1','Login_Header','Login');">
                        <span class="visible-xs">SIGN UP</span>
                    </a> -->

                    <div class="overlay" id="myNav">
                        <ul class="nav overlay-content">

                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
           <a href="tel:<?php echo $link[0]->phone; ?>" class="phone"><img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/phone.png" alt=""> <?php echo $link[0]->phone; ?></a>
                            <li class="nav-item hidden">
                                <!-- <a href="javascript:void(0);" onclick ="demopageRedirection1();">Buy a course</a> -->
                                <a href="<?php echo base_url() ?>about-us" class="explore">About Us</a>
                            </li>
                            <li class="nav-item has-sub">
                                <a href="<?php echo base_url() ?>about-us" class="explore">Courses</a>
                                <ul class="sub-menu">
                                    <li class="has-sub">
                                        <a href="<?php echo base_url() ?>school">
                                            School
                                        </a>
                                    </li>
                                    <li class="has-sub">
                                        <a href="/cbse" class="dropBtn2">
                                            CBSE
                                        </a>
                                        <span class="plus-minus-toggle collapsed"></span>
                                        <div class="board-menu">
                                            <!-- class lists  -->
                                            <span class="first-half">
                                                <a href="/junior/grade-1">Class 1</a>
                                                <a href="/junior/grade-2">Class 2</a>
                                                <a href="/junior/grade-3">Class 3</a>
                                                <a href="/junior/grade-4">Class 4</a>
                                                <a href="/junior/grade-5">Class 5</a>
                                                <a href="/cbse-class-6/8">Class 6</a>
                                                <a href="/cbse-class-7/9">Class 7</a>
                                                <a href="/cbse-class-8/10">Class 8</a>
                                                <a href="/cbse-class-9/11">Class 9</a>
                                                <a href="/cbse-class-10/12">Class 10</a>
                                            </span>
                                            <span class="second-half">
                                                <a href="/cbse-class-11-science/41">Class 11-Science</a>
                                                <a href="/cbse-class-11-commerce/161">Class 11-Commerce</a>
                                                <a href="/cbse-class-11-humanities/69">Class 11-Humanities</a>
                                                <a href="/cbse-class-12-science/46">Class 12-Science</a>
                                                <a href="/cbse-class-12-commerce/59">Class 12-Commerce</a>
                                                <a href="/cbse-class-12-humanities/71">Class 12-Humanities</a>
                                                <!-- <a href="/testprep" class="half">JEE</a>
                                                <a href="testprep" class="half">AIPMT</a>
                                                <a href="/bba" class="half">BBA</a>
                                                <a href="/cpt" class="half">CPT</a>
                                                <a href="/nda" class="half">NDA</a> -->
                                            </span>
                                        </div>
                                    </li>
                                    <li class="has-sub">
                                        <a href="/icse">
                                            ICSE
                                        </a>
                                        <span class="plus-minus-toggle collapsed"></span>
                                        <div class="board-menu">
                                            <!-- class lists  -->
                                            <span class="first-half">
                                                <a href="/junior/grade-1">Class 1</a>
                                                <a href="/junior/grade-2">Class 2</a>
                                                <a href="/junior/grade-3">Class 3</a>
                                                <a href="/junior/grade-4">Class 4</a>
                                                <a href="/junior/grade-5">Class 5</a>
                                                <a href="/icse-class-6/77">Class 6</a>
                                                <a href="/icse-class-7/78">Class 7</a>
                                                <a href="/icse-class-8/79">Class 8</a>
                                                <a href="/icse-class-9/80">Class 9</a>
                                                <a href="/icse-class-10/81">Class 10</a>
                                            </span>
                                            <span class="second-half">
                                                <a href="/icse-class-11-science/82">Class 11-Science</a>
                                                <a href="/icse-class-11-commerce/84">Class 11-Commerce</a>
                                                <a href="/icse-class-12-science/83">Class 12-Science</a>
                                                <a href="/icse-class-12-commerce/86">Class 12-Commerce</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="has-sub">
                                        <a href="/tamilnadu" class="dropBtn2">
                                            Tamil Nadu
                                        </a>
                                        <span class="plus-minus-toggle collapsed"></span>
                                        <div class="board-menu">
                                            <!-- class lists  -->
                                            <span class="first-half">
                                                <a href="/junior/grade-1">Class 1</a>
                                                <a href="/junior/grade-2">Class 2</a>
                                                <a href="/junior/grade-3">Class 3</a>
                                                <a href="/junior/grade-4">Class 4</a>
                                                <a href="/junior/grade-5">Class 5</a>
                                                <a href="/tamilnadu-class-6/108">Class 6</a>
                                                <a href="/tamilnadu-class-7/109">Class 7</a>
                                                <a href="/tamilnadu-class-8/110">Class 8</a>
                                                <a href="/tamilnadu-class-9/111">Class 9</a>
                                                <a href="/tamilnadu-class-10/112">Class 10</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="has-sub">
                                        <a href="/karnataka" class="dropBtn2">
                                            Karnataka
                                        </a>
                                        <span class="plus-minus-toggle collapsed"></span>
                                        <div class="board-menu">
                                            <!-- class lists  -->
                                            <span class="first-half">
                                                <a href="/junior/grade-1">Class 1</a>
                                                <a href="/junior/grade-2">Class 2</a>
                                                <a href="/junior/grade-3">Class 3</a>
                                                <a href="/junior/grade-4">Class 4</a>
                                                <a href="/junior/grade-5">Class 5</a>
                                                <a href="/karnataka-class-6/96">Class 6</a>
                                                <a href="/karnataka-class-7/97">Class 7</a>
                                                <a href="/karnataka-class-8/98">Class 8</a>
                                                <a href="/karnataka-class-9/99">Class 9</a>
                                                <a href="/karnataka-class-10/100">Class 10</a>
                                            </span>
                                            <span class="second-half">
                                                <a href="/karnataka-class-11-science/172">Class 11-Science</a>
                                                <a href="/karnataka-class-11-commerce/101">Class 11-Commerce</a>
                                                <a href="/karnataka-class-12-science/173">Class 12-Science</a>
                                                <a href="/karnataka-class-12-commerce/102">Class 12-Commerce</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="has-sub">
                                        <a href="/kerala" class="dropBtn2">
                                            Kerala
                                        </a>
                                        <span class="plus-minus-toggle collapsed"></span>
                                        <div class="board-menu">
                                            <!-- class lists  -->
                                            <span class="first-half">
                                                <a href="/junior/grade-1">Class 1</a>
                                                <a href="/junior/grade-2">Class 2</a>
                                                <a href="/junior/grade-3">Class 3</a>
                                                <a href="/junior/grade-4">Class 4</a>
                                                <a href="/junior/grade-5">Class 5</a>
                                                <a href="kerala-class-6/103">Class 6</a>
                                                <a href="kerala-class-7/104">Class 7</a>
                                                <a href="kerala-class-8/105">Class 8</a>
                                                <a href="kerala-class-9/106">Class 9</a>
                                                <a href="kerala-class-10/107">Class 10</a>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="/ncert-solutions">
                                            NCERT Solutions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/testprep">
                                            Entrance Exams
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item hidden">
                                <a href="javascript:void(0)" class="login-btn mnLoginPopup" onclick="trackGaEvent('Homepage_New1','Login_Header','Login');">login</a>
                            </li>
                           
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- top banner  -->
    <section class="top-banner">
        <a class="btn-modal" href="javascript:void(0)" data-target="#callMeBox" data-toggle="modal">
            <div class="call-me">
                call me
                <br>
                <i class="mn-arrow-right"></i>
            </div>
        </a>
        <div class="wrapper">
            <div class="row">
                <div class="left-content">
                    <div class="heading1">India’s most loved online class with</div>
                    <h1 class="main-heading">School Jaisi Feeling</h1>
                    <div class="color-bars"></div>
                    <div class="sub-heading"></div>
                    <ul class="section-points">
                        <li>
                            Interactive classes with the best teachers
                        </li>
                        <li>
                            Concept videos, Interactive games &amp; downloadable revision notes
                        </li>
                        <li>
                            Chapter tests, sample papers, board papers and smart reports
                        </li>
                        <li>
                            24X7 doubt resolution with experts via chat
                        </li>
                    </ul>
                        <div class="app-logo">
                        <h4>India's best learning app</h4>
                        <div class="app-icons">
                            <a href="https://play.google.com/store/apps/details?id=com.meritnation.school" class="" target="_blank" onclick="trackGaEvent('Homepage_New1','App','Android');">
                                <img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/google-playstore.png?v=1" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="main-banner">
                   <picture>
                        <source media="(min-width: 1920px)" srcset="https://tchsu.in/uploads/banner/banner5.jpg">
                        <source media="(min-width: 1600px)" srcset="https://tchsu.in/uploads/banner/banner4.jpg">
                        <source media="(min-width: 768px)" srcset="https://tchsu.in/uploads/banner/banner1.jpg">
                        <source media="(min-width: 320px)" srcset="https://tchsu.in/uploads/banner/banner3.jpg">
                        <img class="to_fade_up fade_up" alt="tchsu" src="https://tchsu.in/uploads/banner/banner2.jpg">
                    </picture>
                   
                </div>
            </div>
        </div>
    </section>


    <!-- online tutions  -->
    <section class="online-tutions">
        <div class="wrapper">
            <div class="row">
                <div class="section-title to_fade_up fade_up">
                    <div class="heading">Robust Online Classes</div>
                    <div class="sub-heading">Beat the Pandemic and excellence in your academics</div>
                </div>
                <!-- three -blocks  -->
                <div class="three-block">
                    <!-- block item  -->
                    <div class="block-item to_fade_up fade_up background1 text-white">
                        <img class="img_radius" src="https://tchsu.in/uploads/home_images/image1.jpg" alt="">
                        <div class="content ">Build a strong foundational <br>and conceptual understanding</div>
                    </div>
                    <!-- item end  -->
                    <!-- block item  -->
                    <div class="block-item to_fade_up fade_up background2 text-white">
                        <img class="img_radius" src="https://tchsu.in/uploads/home_images/image2.jpg" alt="">
                        <div class="content">School Jaisi Feeling</div>
                    </div>
                    <!-- item end  -->
                    <!-- block item  -->
                    <div class="block-item to_fade_up fade_up background3 text-white">
                        <img class="img_radius" src="https://tchsu.in/uploads/home_images/image3.jpg" alt="">
                        <div class="content">Excellent Teachers.</div>
                    </div>
                    <!-- item end  -->
                </div>
                <!-- three block end  -->
                <div class="bottom-txt to_fade_up fade_up">Tch-Su unique blend of features developed after years of research, to help you excel</div>
            </div>
        </div>
    </section>

    <!-- live online classes  -->
    <section class="live-online-classes">
        <div class="wrapper">
            <div class="row">
                <!-- section title  -->
                <div class="section-title">
                    <div class="heading ">Learn with School Jaisi feeling</div>
                </div>
                <!-- section title end  -->
                <!-- left right block  -->
                <div class="left-right-block">
                    <div class="left-block">
                        <div class="desc-txt">
                            Curriculum aligned, structured Live Class session to give you a
                            complete learning experience. You have the option to choose a schedule that
                            suits you the most
                        </div>
                       <img class="image" src="https://tchsu.in/uploads/home_images/home_img1.jpg" alt="">

                      
                    </div>
                    <div class="right-block">
                        <!-- live class lists  -->
                        <div class="live-class-lists">

                            <!-- class item  -->
                            <div class="class-list to_fade_up fade_up">
                                <span class="item-arrow green-bg">
                                    <i class="mn-arrow-right"></i>
                                </span>
                                <h2>Pre Live Class</h2>
                                <p>You will be prompted to go through the videos and notes before the class to grasp the concepts better during live class</p>
                            </div>
                            <!-- class item end -->
                            <!-- class item  -->
                            <div class="class-list to_fade_up fade_up">
                                <span class="item-arrow blue-bg">
                                    <i class="mn-arrow-right"></i>
                                </span>
                                <h2>In Live Class</h2>
                                <p>Concepts are taught in the live class by Expert Teacher using rich multimedia content such as 3D Models, Videos &amp; Gifs to ensure complete mastery.</p>
                                <p>Live chat option with teachers to ensure 2-way communication</p>
                                <p>Live quizzes &amp; analytics to further sharpen your learning</p>
                            </div>
                            <!-- class item end -->
                            <!-- class item  -->
                            <div class="class-list to_fade_up fade_up">
                                <span class="item-arrow yellow-bg">
                                    <i class="mn-arrow-right"></i>
                                </span>
                                <h2>Post Live Class</h2>
                                <p>A class test after every live class to help you fortify your learning.</p>
                                <p>In case you miss a live class or would like to revise, you can watch the recording</p>
                            </div>
                            <!-- class item end -->
                        </div>
                        <!-- live class list end  -->


                      

                        <!-- teacher connect app  -->
                        <div class="teacher-connect-app to_fade_up fade_up">
                            <h4>Teacher Connect App</h4>
                            <p>A dedicated messaging app to help you stay connect with your live class teachers, even beyond the 'Class'</p>
                            <img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/live-class-img2.png?v=1" alt="">
                        </div>

                    </div>
                </div>
                <!-- left right block end -->
            </div>
        </div>
    </section>

    <!-- better than tutions  -->
    <section class="better-than-tutions">
        <div class="wrapper">
            <div class="row">
                <!-- section title  -->
                <div class="section-title">
                    <div class="sub-heading"><h2>Why Tch-Su</h2></div>
                </div>
                <!-- section title end  -->
                <div class="tutions-five-block">
                    <div class="card-box to_fade_up fade_up">
                        <div class="inner">
                           <img class="img_radius" src="https://tchsu.in/uploads/home_images/image5.jpg" alt="">
                            <p>School Jaisi Feeling</p>
                        </div>
                    </div>
                    <div class="card-box to_fade_up fade_up">
                        <div class="inner">
                            <img class="img_radius" src="https://tchsu.in/uploads/home_images/image6.jpeg" alt="">
                            <p>Attend classes from the comfort of your home</p>
                        </div>
                    </div>
                    <div class="card-box to_fade_up fade_up">
                        <div class="inner">
                            <img class="img_radius" src="https://tchsu.in/uploads/home_images/image7.jpg" alt="">
                            <p>Unique Teachers Students connect Program</p>
                        </div>
                    </div>
                    <div class="card-box to_fade_up fade_up">
                        <div class="inner">
                           <img class="img_radius" src="https://tchsu.in/uploads/home_images/image8.jpg" alt="">
                            <p>Best Quality Recorded Videos using interesting PowerPoint presentations. Flowcharts, tables and diagrams are used in videos for better understanding</p>
                        </div>
                    </div>
                    <div class="card-box to_fade_up fade_up">
                        <div class="inner">
                            <img class="img_radius" src="https://tchsu.in/uploads/home_images/image9.jpg" alt="">
                            <p>Unlimited Views of all lectures to ensure that student grasps all the concepts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- better than tutions end  -->
    <!-- better than tutions  -->
    <section class="study-resources">
        <div class="wrapper">
            <div class="row">
                <!-- section title  -->
                <div class="section-title">
                    <div class="heading">TCH-SU Resource centre</div>
                    <p>Learn at your pace and as per your convenience. Our scientifically designed
                        learning resources are geared to help you pack more punch into your study
                         time</p>
                </div>
                <!-- section title end  -->

                <div class="content-img-blocks">
                    <div class="block-item to_fade_up fade_up bc">
                        <!--<img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/study-resource-1.png?v=1" alt="">-->
                        <img class="img_radius" src="https://tchsu.in/uploads/home_images/homepage1.jpg" alt="">
                        <div class="points-area">
                            <div class="block-heading">Videos &amp; Notes</div>
                            <ul>
                                <li>
                                    Short &amp; Crisp videos for better concept clarity
                                </li>
                                <li>
                                    Chapter-wise downloadable Revision Notes for last minute preparation
                                </li>
                                <li>
                                    NCERT &amp; Other reference books solutions for quick homework completion
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block-item to_fade_up fade_up">
                        <div class="points-area">
                            <div class="block-heading">Tch Su Connect Program</div>
                            <ul>
                                <li>
                                    Chapter-wise tests for strengthening concepts
                                </li>
                                <li>
                                    Live Test Series to benchmark your performance against your peers
                                </li>
                                <li>
                                    Smart reports to identify your weak areas
                                </li>
                            </ul>
                        </div>
                        <!--<img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/study-resource-2.png?v=1" alt="">-->
                                                <img class="img_radius" src="https://tchsu.in/uploads/home_images/homepage2.png" alt="">
                    </div>
                    <div class="block-item to_fade_up fade_up">
                        <!---<img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/doubt-resolutions.png?v=1" alt="">-->
                                                <img class="img_radius" src="https://tchsu.in/uploads/home_images/homepage3.jpg" alt="">
                        <div class="points-area">
                            <div class="block-heading">Doubts Clearing Session</div>
                            <ul>
                                <li>
                                    Clear your doubts via chat and stay doubtfree
                                </li>
                                <li>
                                    Ask your question anytime - 24x7 availability
                                </li>
                                <li>
                                    Connect with our experts within 10 seconds
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- counter register know more  -->
              
                <!-- counter register know more end -->
            </div>
        </div>
    </section>

    <!-- our result section  -->
  
    <!-- download app  -->
    <section class="download-app-section">
        <div class="wrapper">
            <div class="row">
                <div class="dwnl-app-img">
                    <img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/app-img.png?v=1" alt="">
                </div>
                <div class="dwnl-app-content">
                    <h2>To Get Notified Every Time There is a Class</h2>
                    <p class="install-txt">Install the Tch-Su App <br> Get a link to download the app on your phone</p>
                    <form action="" id="applinkbox" method="get" accept-charset="utf-8" class="pt10 pb10 hidden-xs applinkbox">
                        <div class="phone-input-group">
                            <div class="custom-dropdown">
                                <img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/india.svg?v=1" width="15" alt=""> +91
                            </div>
                            <input type="text" id="UserDetailMobile" name="data[UserDetail][mobile]" maxlength="10" onblur="validateRegForm1(this,'Mobile','d')" placeholder="Enter phone number">
                            <button type="button" id="sendLink" onclick="sendAppLink('UserDetailMobile', 'applinkbox')">

                                Text App link
                            </button>
                        </div>
                        <p class="msg">Thank you for your interest. You will receive sms shortly.</p>
                        <p id="resErrorMsg" class="errorMsg">Oops somthing went wrong, please try again after some time.</p>
                    </form>
                    <div class="app-badge">
                        <a href="https://play.google.com/store/apps/details?id=com.meritnation.school" class="" target="_blank" onclick="trackGaEvent('Homepage_New1','App','Android');">
                            <img src="https://img-nm.mnimgs.com/img/site_content/meritnation/newHome/homepage/google-playstore.png?v=1" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end download app  -->
    <!-- header new  -->
    <!-- footer  -->
   <?php $this->load->view('front/layout/footer.php') ?>
    
    
    
    <link rel="stylesheet" href="https://css-nm.mnimgs.com/css/homepagenew/homePageCombinedCss.min.css?version=1507042021">
    <script src="https://js-nm.mnimgs.com/js/homepagenew/homePageCombinedJs.min.js?version=1507072021"></script>
    <script src="/js/callMe.js?version=1507072021" async=""></script>
    <div id="callMeBox" class="modalBox" data-dismiss="#callMeBox">
        <div class="modalBox-content">
            <div class="modalBox-title">
                <div class="callTitle">Call me</div>
                <span class="close-btn btn-modal-close" data-dismiss="#callMeBox"></span>
            </div>
            <div class="modalBox-body">
                <div class="heading">Have a Query? We will call you right away.</div>
                <div class="input-group">
                    <div class="group-addon">
                        <span><em class="ind-flag"></em> +91</span>
                    </div>
                    <input class="form-control" type="text" placeholder="Enter phone number" id="phone_number">
                    <input type="hidden" id="source" name="source" value="1">
                    <button class="group-btn" type="button" onclick="callMe.click2Call(); trackGaEvent('Homepage_New1','Click-to-call','Call Now');">Call Now</button>
                </div>
                <p class="example"><span>E.g: 9876543210, <a href="tel:<?php echo $link[0]->phone; ?>"><?php echo $link[0]->phone; ?></a></span></p>
                <p class="thanksmsg text-center">We will give you a call shortly, Thank You</p>
                <p class="timings">Office hours: 9:00 am to 9:00 pm IST (7 days a week)</p>
            </div>
        </div>
    </div><!-- full screen video player -->
    <div id="hero-video-player" class="fullscreen-video-player" aria-hidden="false" tabindex="-1">
        <div class="video-container">
            <div class="video-row">
                <video class="loading" preload="none" id="myVideo" controls="true" controlslist="nodownload">
                    <source src="" type="video/mp4">
                    <source src="" type="video/ogg">
                </video>
                <button id="close-fullscreen-hero" class="remove-btn link-reset"><i class="icon-remove"></i></button>
            </div>
        </div>
    </div>
   

    <script>

        // scroll effects
        var root = document.getElementsByTagName('html')[0];
        root.setAttribute('class', 'scroll-effects');

        $(".to_fade_up").waypoint(function () {
            $(this[0, 'element']).addClass("fade_up");
        }, {
            triggerOnce: true,
            offset: '75%'
        });
        $(".to_fade_from_left").waypoint(function () {
            $(this[0, 'element']).addClass("fade_from_left");
        }, {
            triggerOnce: true,
            offset: '75%'
        });
        $(".to_fade_from_right").waypoint(function () {
            $(this[0, 'element']).addClass("fade_from_right");
        }, {
            triggerOnce: true,
            offset: '75%'
        });

        // number count
        $('.counter').countUp();
    </script>



 
    </div>
</body>
</html>