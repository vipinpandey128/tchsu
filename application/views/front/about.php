<!doctype html>
<html lang="en">

<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(1);?>
    <title>
        <?php  echo $cms_page[0]->meta_title; ?> </title>

    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
    <link rel="canonical" href="<?php  echo $cms_page[0]->canonical; ?>">
      <link href="<?php echo base_url('assets/front/'); ?>Content/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/Site.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/front/'); ?>Content/tchsu.css" rel="stylesheet" />
    <?php $this->load->view('front/layout/head.php') ?>
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  
 <style>/* Click the image one by one to see the different layout */


/* Owl Carousel */

.owl-prev {
    background: url('https://res.cloudinary.com/milairagny/image/upload/v1487938188/left-arrow_rlxamy.png') left center no-repeat;
    height: 54px;
    position: absolute;
    top: 50%;
    width: 27px;
    z-index: 1000;
    left: 2%;
    cursor: pointer;
    color: transparent;
    margin-top: -27px;
}

.owl-next {
    background: url('https://res.cloudinary.com/milairagny/image/upload/v1487938220/right-arrow_zwe9sf.png') right center no-repeat;
    height: 54px;
    position: absolute;
    top: 50%;
    width: 27px;
    z-index: 1000;
    right: 2%;
    cursor: pointer;
    color: transparent;
    margin-top: -27px;
}

.owl-prev:hover,
.owl-next:hover {
    opacity: 0.5;
}


/* Owl Carousel */


/* Popup Text */

.white-popup-block {
    background: #FFF;
    padding: 20px 30px;
    text-align: left;
    max-width: 650px;
    margin: 40px auto;
    position: relative;
}

.popuptext {
    display: table;
}

.popuptext p {
    margin-bottom: 10px;
}

.popuptext span {
    font-weight: bold;
    float: right;
}


/* Popup Text */


/* Icon CSS */

.item {
    position: relative;
}

.item i {
    display: none;
    font-size: 4rem;
    color: #FFF;
    opacity: 1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
}

.item a {
    display: block;
    width: 100%;
}

.item a:hover:before {
    content: "";
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 1;
}

.item a:hover i {
    display: block;
    z-index: 2;
}

.flip-card {
            background-color: transparent;
            width: 300px;
            height: 300px;
            perspective: 1000px;
        }
        
        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }
        
        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        
        .flip-card-front {
            background-color: #bbb;
            color: black;
        }
        
        .flip-card-back {
            background-color: #2980b9;
            color: white;
            transform: rotateY(180deg);
        }
</style>
<script>
$(document).ready(function(){
	$(".wish-icon i").click(function(){
		$(this).toggleClass("fa-heart fa-heart-o");
	});
});	
</script>


</head>

<body>
     <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact
                            information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>Album</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            </div>
        </div>
    </header>

    <main role="main">
           <section class="jumbotron text-center">
            <div class="container-fluid">
                <div class="row">
                <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                        <img src="https://tchsu.in/uploads/aboutus/About-us.jpg" style="width: 100%;">
                    </div>
                </div>
            </div>
        </section>
        <section class="jumbotron text-center">
            <div class="container-fluid">
                <div class="row">
                 
                <h2 style="color: #3f7bba;font-size: 40px;" class="jumbotron-heading text-decoration-underline">TCH-SU LEARNING CENTER</h2>
                <br>
                
            <br>
            <br>
                <p style="font-size: 20px;" class="fst-normal font-sans-serif">Tch-Su Learning Center is a leading online learning platform that helps anyone llearn Mathematics, Physics, Chemestry and verious other subjects to achieve their goals through individual subscriptions, member have access to the TchSu.com vedio library of enganging, top quality cources thaught by recognized industry experts.
               
               
               <br>
               
               We are leaders in online learning platform assisting students to learn and understand core concepts of Mathematics, Physics, Chemistry and many other subjects. Through subscription options, students have access to our unmatched library of engaging videos, top-quality courses taught by recognised subject experts.
               <br>
               We offer subject knowledge for boards like CBSE, ICSE, RBSE, MSBHSE, BHSIEUP. We believe in bottom up approach of learning wherein learning is a result of continuous development with respect to feedbach and suggestions from out students.
               <br>
               
               At TCH-SU, learning is a never-ending process both for learning and educators.
               </p>
               <i><h3 style="color: #3f7bba;font-size: 40px;" class = "text-decoration-underline"> Our Mission</h3></i>
               <p style="font-size: 20px;" class="fst-normal font-sans-serif">
                   
                   To help you enjoy learning. We aim to accomplish this by being part of your learning curve and continually developing ourselves to keep you updated.
                   <br>
                   To create a generation of skilled learners who are market ready and are contributors to the nation and society.
                   <br>
                   We forsee ourselves as a catalyst or change agent in one's personal development and growth.
                   
                   
               </p>
               
               <i><h4 style="color: #3f7bba;font-size: 40px;" class = "text-decoration-underline"> Our Vision</h4></i>
               <p style="font-size: 20px;" class="fst-normal font-sans-serif"">
                   
                  To develop a cost-effective platform making learning accessible for all and bridge the gap between the keen learners and dedicated aducators by following its mantra of "Learning Never Stops!"
                   
               </p>
               
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                 
        

    </main>
    
     <div class="owl-carousel">
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Itikanew.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Itika.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Ishitanew.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Ishita.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Bipulnew.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Bipul.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Apurva.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Apurva.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/SKjha.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/SKJha.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Kavya.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Kavya.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
        <div class="card">
          <div class="item">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Abhishekh.jpg">
                    </div>
                    <div class="flip-card-back">
                        <video width="300" height="300" controls>
                            <source src="https://tchsu.in/assets/front/images/tutor/videos/Abhishekh.mp4" type="video/mp4">
                          </video>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
    
    
    <!--<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Itika.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Itika.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Ishita.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Ishita.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Bipul.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Bipul.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Apurva.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Apurva.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-34">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/SKjha.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/SKJha.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Kavya.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Kavya.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img height="300" width="300" src="https://tchsu.in/assets/front/images/tutor/images/Abhishekh.jpg">
                                </div>
                                <div class="flip-card-back">
                                    <video width="300" height="300" controls>
                                        <source src="https://tchsu.in/assets/front/images/tutor/videos/Abhishekh.mp4" type="video/mp4">
                                      </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->


    
     <script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js'></script>
  
   <script>
       $('.owl-carousel').owlCarousel({
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  loop: true,
  margin: 50,
  responsiveClass: true,
  nav: true,
  loop: true,
  stagePadding: 100,
  responsive: {
    0: {
      items: 1
    },
    568: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
})
$(document).ready(function() {
  $('.popup-youtube').magnificPopup({
    disableOn: 320,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true
  });
});
$('.item').magnificPopup({
  delegate: 'a',
});
   </script>
     
</body>
</html>