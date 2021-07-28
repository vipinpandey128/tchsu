<?php error_reporting(0) ;  ?> 
<!doctype html>

<html  lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <?php $cms_page = $this->cms_model->get_cms_by_id(29);?>
<title><?php  echo $cms_page[0]->meta_title ; ?></title>
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">

      
    
   <?php $this->load->view('front/layout/head'); ?>
<style>

    #summary1 {
  font-size: 14px;
  line-height: 1.5;
}

#summary1 p.collapse:not(.show) {
    height: 82px !important;
    overflow: hidden;
  
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
}

#summary1 p.collapsing {
    min-height: 42px !important;
}

#summary1 a.collapsed:after  {
    content: '+ Read More';
}

#summary1 a:not(.collapsed):after {
    content: '- Read Less';
}


</style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>

<!-- Banner Section Start -->
<section class="banner-2 section-padding">
    <div class="container">
         <?php $slider = $this->slider_model->get_all_active_slider();?>
        <div class="row align-items-center">
            <div class="col-md-7 col-xl-7 col-lg-7">
                <div class="banner-content">
                    <span class="subheading"></span>
                    <h1 class="white"><?php echo $slider[0]->title ?></h1>
                    <?php echo $slider[0]->description ?>
                    <a href="<?php echo base_url('course') ?>" class="btn btn-main"><?php echo $slider[0]->button_title ?></a>  
                </div>
            </div>

            <div class="col-md-5 col-xl-5 col-lg-5">
                <div class="video-block">
                    <img src="<?php echo base_url();?>uploads/slider/<?php echo $slider[0]->image?>" alt="<?php echo $slider[0]->img_tag    ?>" alt="" class="img-fluid">
                   
               </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
<!-- Banner Section End -->

<!-- Clients logo Section Start -->
<section class="clients-2">
    <div class="container">
        <div class="row mx-auto justify-content-center">

              <?php $parent = $this->board_model->get_board_by_parent(0, 6);?>
                   <?php foreach($parent as $parents){  ?>
             
                     <!--<div class="col-lg-3 col-sm-6 col-xl-2">
                        <div class="client-logo">
                            <a href="<?php echo $parents->url_slug;?>.html"><img src="<?php echo base_url('uploads/board/');?><?php echo $parents->image;?>" alt="" class="img-fluid"></a>
                        </div>
                    </div>-->
             <?php }?>
        </div>
    </div>
</section>
<!-- Clients logo Section End -->
<!-- About Section Start -->
<section class="about about-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <!--<div class="col-xl-6 col-lg-6 col-md-12  col-sm-12 hidden-sm hidden-xs">
                <div class="row ">
                    <div class="col-xl-6 col-lg-6  col-md-6 col-sm-6">
                        <div class="about-imgbox">
                            <img src="<?php echo base_url('assets/front/'); ?>/images/about/about1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="about-imgbox">
                            <img src="<?php echo base_url('assets/front/'); ?>/images/about/about2.jpeg" alt="" class="img-fluid">
                        </div>
                    </div>

                     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="about-imgbox mt-5">
                            <img src="<?php echo base_url('assets/front/'); ?>/images/about/about3.png" alt="" class="img-fluid">
                        </div>
                        <div class="about-imgbox">
                            <img src="<?php echo base_url('assets/front/'); ?>/images/about/about4.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>-->
             
            <div class="col-xs-12 col-md-6 offset col-md-6 col-sm-6 offset col-sm-6 col-lg-6 offset col-lg-6">
                <h3 class="card-title text-center" style=margin-top:0.75rem>Students Learning Zone</h3>
                <p class="text-center">A students go to blog for the latest stories,discoveries,fun activities, exam tips and more</p>
                <div class="section-heading pl-lg-5">
     <div class="card">
    <img src="https://tchsu.in/images/star.jpg" class="card-img-top" alt="">
    <div class="card-body">
        <p class="card-text">
            <div id="summary1">
                <p class="collapse" id="collapseSummary1">
                    <strong>What is lightning, and how does it strike?</strong><br>
                    Lightning is a very rapid — and massive — discharge of electricity in the atmosphere, some of which is directed towards the Earth’s surface. These discharges are generated in giant moisture-bearing clouds that are 10-12 km tall. The base of these clouds
                    typically lies within 1-2 km of the Earth’s surface, while their top is 12-13 km away. Temperatures towards the top of these clouds are in the range of minus 35 to minus 45 degrees Celsius. As water vapour moves upward in the cloud,
                    the falling temperature causes it to condense. Heat is generated in the process, which pushes the molecules of water further up.<br> As they move to temperatures below zero degrees celsius, the water droplets change
                    into small ice crystals. They continue to move up, gathering mass — until they are so heavy that they start to fall to Earth.<br> This leads to a system in which, simultaneously, smaller ice crystals are moving up and bigger crystals
                    are coming down. Collisions follow, and trigger the release of electrons — a process that is very similar to the generation of sparks of electricity. As the moving free electrons cause more collisions and more electrons, a chain reaction
                    ensues.
                    <br> This process results in a situation in which the top layer of the cloud gets positively charged, while the middle layer is negatively charged. The electrical potential difference between the two layers is huge — of the order of
                    a billion to 10 billion volts. In very little time, a massive current, of the order of 100,000 to a million amperes, starts to flow between the layers.<br> An enormous amount of heat is produced, and this leads to the heating of the
                    air column between the two layers of the cloud. This heat gives the air column a reddish appearance during lightning. As the heated air column expands, it produces shock waves that result in thunder.<br>

                <strong>How does this current reach the Earth from the cloud?</strong><br>
                    While the Earth is a good conductor of electricity, it is electrically neutral. However, in comparison to the middle layer of the cloud, it becomes positively charged. As a result, about 15%-20% of the current gets directed towards the Earth as well.
                    It is this flow of current that results in damage to life and property on Earth.<br> There is a greater probability of lightning striking tall objects such as trees, towers or buildings. Once it is about 80-100
                    m from the surface, lightning tends to change course towards these taller objects. This happens because air is a poor conductor of electricity, and electrons that are travelling through air seek both a better conductor and the shortest
                    route to the relatively positively charged Earth’s surface.<br>
                    <strong>What precautions should be taken against lightning?</strong><br>
                    Lightning rarely hits people directly — but such strikes are almost always fatal.<br> People are most commonly struck by what are called “ground currents”. The electrical energy, after hitting a large object (such as a tree) on Earth,
                    spreads laterally on the ground for some distance, and people in this area receive electrical shocks.<br> It becomes more dangerous if the ground is wet (which it frequently is because of the accompanying rain), or if there is metal
                    or other conducting material on it. Water is a conductor, and many people are struck by lightning while standing in flooded paddy fields.<br> The Met office routinely issues warnings for thunderstorms. But this is a very generic advisory,
                    and for locations that are very large in area.<br> Predicting a thunderstorm over a pinpointed location is not possible. Nor is it possible to predict the exact time of a likely lightning strike.<br> For reasons given above, taking
                    shelter under a tree is dangerous. Lying flat on the ground too, can increase risks. People should move indoors in a storm; however, even indoors, they should avoid touching electrical fittings, wires, metal and water.
                    
                </p>
                <a class="collapsed" data-toggle="collapse" href="#collapseSummary1" aria-expanded="false" aria-controls="collapseSummary1"></a>
            </div>

        </p>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
<!-- Feature section start -->
<section class="feature  section-padding ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <span class="subheading">Maximize your potentials</span>
                    <h3>Learn the secrets to Life Success</h3>
                    <p>The ultimate planning solution for
                        student who want to reach their  goals</p>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="flaticon-flag"></i>
                    </div>
                    <div class="feature-text">
                        <h4>PLAN A SCHEDULE, SAY YES TO SMART WORK:</h4>
                        <p>This is the foremost point that needs to be well chalked out. While planning the schedule, you have to keep in mind your school hours too. Further, your plan should not be over planned which means that your daily schedule or routine should help yourself out instead of making you overburdened. So, work hardly but smartly! At Tch-Su we guide students how to smartly plan their schedule.</p>
                    </div>
                </div>
            </div>
             <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="flaticon-layers"></i>
                    </div>
                    <div class="feature-text">
                        <h4>REVISE, REVISE AND REVISE:</h4>
                        <p>Board exams focus more on theoretical knowledge and when JEE/ NEET approach, move towards practical applications. Revise theoretical concepts first and then try to focus on their applications part. Solve the test series, key questions, and workbooks as much as you can. Learn from your previous mistakes and make a note of important formulas and diagrams. At Tch-Su through Pomodoro technique, we help the students to plan their revision schedule in proper and an efficient manner..</p>
                    </div>
                </div>
            </div>
             <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="flaticon-video-camera"></i>
                    </div>
                    <div class="feature-text">
                        <h4>MAKE MOCK TESTS A HABIT</h4>
                        <p>Take mock tests regularly and analyse your performance. It will help you to delineate your weak areas, thereby strengthening your preparations all the more. Also, giving such tests will help you in increasing your speed and confidence levels. At Tch-Su explore our Mock test, which will keep you result oriented.</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="flaticon-help"></i>
                    </div>
                    <div class="feature-text">
                        <h4>FOCUS</h4>
                        <p>Focus on one thing at a time. If you are through your board exams put all your efforts into that or if you are preparing for JEE/ NEET exams, then concentrate all on that. Don’t shuffle between the two at the same time. Devote yourself in preparation one at a time. At Teach-su, our regular counselling sessions help the child to stay focused and prepare accordingly.  </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center mt-3">
                    <a href="<?php echo base_url('course') ?>" class="btn btn-solid-border">Explore Courses</a>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature section End -->

<!--course section start-->
<section class="section-padding course-grid bg-gray" >
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <span class="subheading">Trending Courses</span>
                    <h3>Explore Our Courses</h3>
                    <p>Expand your knowledge at any level and propel your career.</p>
                </div>
            </div>
        </div>
        <div class="row course-gallery justify-content-center">
            <?php foreach ($latest_course as $key => $value) { ?>
            <?php 
            $data['record'] = $value;
            $this->load->view('front/course/course-list' , $data); ?>
            <?php } ?>         
        </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="text-center mt-5">
                Take the control of their life back and start doing things to make their dream come true. <a href="<?php echo base_url('course') ?>" class="font-weight-bold text-underline">View all courses </a>
            </div>
        </div>
    </div>
    </div>
</section>
<!--course section end-->

<!-- Testimonial section start -->
<!-- Testimonial section start -->
<section class="testimonial-2 section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-7">
                <div class="section-heading center-heading">
                    <span class="subheading">TCH-Su-an E-Learning Portal</span>
                    <h5>Here are 10 keys to online learnig:</h5>
                    
                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-md-4 col-sm-4">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">1-Work from anywhere, anytime: </h6>
            <p class="card-text">It is one of the most attractive aspects of online education for students, with many obligations to balance. Since everything is available online, it is very convenient to access class content and submit work. It is up to the student when and where it will happen until the assignment is completed by the due dates.</p>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-4">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">2-Review the lecture instantly:  </h6>
            <p class="card-text">It is easy to get distracted during lectures. Jonathan Shuller, a psychologist at the University of California, found that students lost focus 5 times during a 45-minute class session. However, in many online programs, students can quickly review professors’ words by rewinding audio or video or reading a transcript accompanying the lecture.he student when and where it will happen until the assignment is completed by the due dates.</p>
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-4">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">3- Reduce fear :   </h6>
            <p class="card-text">Many students do not feel comfortable speaking in public in a classroom environment. In an online environment, it is easy to share ideas with others. According to the National Institute of Mental Health, 74% of people with speech anxiety experience online education and promote better classroom participation.</p>
        </div>
    </div>
</div>
<!--<div class="col-md-4 col-sm-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">More time to think before sharing:    </h5>
            <p class="card-text">Often there is still a discussion element for online schooling in forums or discussion boards. Students on campus need to choose a situation or quickly formulate an idea in class, and speak before examining everything thoroughly. In an online environment, students can spend as much time as they want to understand and respect their ideas. This will lead to more attraction and more serious discussion.</p>
        </div>
    </div>
</div> -->   
       </div>

       <!-- <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="testimonials-slides-2 owl-carousel owl-theme">
                    <?php foreach ($review as $key => $value) { ?>

                    <div class="testimonial-item testimonial-style-2">
                        <div class="row">
                            <div class="col-sm-7">
                             <i class="fa fa-quote-right"></i>
                        
                                <div class="testimonial-info-title">
                                    <h4> <?php echo $value->title ?></h4>
                                </div>

                                <div class="testimonial-info-desc">
                                    <?php echo $value->review    ?>
                                </div>
                                    <div class="client-info">
                                     
                                        <div class="testionial-author"> <?php echo $value->name    ?></div>
                                    </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="client-info">
                                    <div class="client-img">
                                         <?php if(!empty($value->image)){ ?>
                                            <img src="<?php echo base_url('uploads/review/').$value->image; ?>" alt="" class="img-fluid">
                                            <?php } ?>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                  
                 <?php   } ?>
                  
                 </div>
            </div>
        </div> -->
    </div>
</section>
<!-- Testimonial section End -->
<!-- Testimonial section End -->



<!-- Blog Section Start -->
<section class="about section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 ">
                <div class="section-heading ">
                    <span class="subheading">Self Development Course</span>
                    <h3>Salient Features</h3>
               
                </div>
 <ul class="list-group list-group-flush">
        <li class="list-group-item li-radius">Study Anytime, Anywhere and on Any device. Best Quality Recorded Videos using interesting PowerPoint presentations.</li>
        <li class="list-group-item li-radius">Flowcharts, tables and diagrams are used in videos for better understanding.</li>
        <li class="list-group-item li-radius">Short tips and tricks videos for enhancing learning Speed. Unlimited Views of all lectures to ensure that student grasps all the concepts.
        </li>
        <li class="list-group-item li-radius">Technical assistance for using online/ offline classes Complete End to End courses for all subjects.
        </li>
        <li class="list-group-item li-radius">Focused teachers to provide best learning to students.</li>
        <li class="list-group-item li-radius">Affordable price.</li>
        <li class="list-group-item li-radius">“Ekdum School Jaisi Feeling.”</li>
    </ul>
    </div>
  </div>
 </div>
 </section>
<!-- Blog Section End -->
<!-- CTA Sidebar start -->
<!-- COunter Section start -->
<!--<section class="counter-block ">
    <div class="container">
        <div class="row" >
            <div class="col-xl-12 bg-black counter-inner">
                <div class="row  align-items-center justify-content-center">
                   
                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                        <div class="counter-item text-center">
                            <i class="flaticon-layers"></i>
                            <div class="count">
                                <span class="counter">132</span>
                            </div>
                            <h6>Total Pupils</h6>
                            <p>Our Strength </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-6">         
                        <div class="counter-item text-center">
                            <i class="flaticon-flag"></i>
                            <div class="count">
                                <span class="counter">235</span>
                            </div>
                            <h6>Teaching Hours</h6>
                            <p> Till now, we taught </p>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="counter-item text-center border-0">
                            <i class="flaticon-help"></i>
                            <div class="count">
                                <span class="counter">100</span>%
                            </div>
                            <h6>Satisfied Parents</h6>   
                            <p>we have full accuracy deliver rate content to the student</p>  
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</section>-->
<!-- COunter Section End -->
<!-- CTA Sidebar end -->
<!-- Footer section start -->


<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>




    <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                       <div class="row">
                           <div class="col-12">
                                <div class="modal-bg">
                                     
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            
                                    <h2 id="msg" style="color:black" >newsletter</h2>
                                    <form class="subscribe-form-2 auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                        <div class="form-group mx-sm-3">
                                            <input type="email" class="form-control" name="email" id="mce-EMAIL" placeholder="Enter your email" required="required">
                                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
    <script>
    $(document).ready(function() {
   

   
});
    
    $(window).on('load',function(){
       
            
    if(localStorage.getItem('popState') != 'shown'){
        $("#exampleModal").delay(2000).fadeIn().modal('show');;
        localStorage.setItem('popState','shown')
    } 
    
     $('#popup-close').click(function(e) // You are clicking the close button
    {
    $('#exampleModal').fadeOut(); // Now the pop up is hiden.
    });
    $('#exampleModal').click(function(e) 
    {
    $('#exampleModal').fadeOut(); 
    });
        
  
    });
  
    </script>