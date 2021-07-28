<!doctype html>
<html lang="en">
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(19);?>
 <title>   <?php  echo @$cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo @$cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo @$cms_page[0]->meta_keyword; ?>">

    

<?php $this->load->view('front/layout/head'); ?>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script>
    window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
<style>
       #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
</style>
</head>
<body id="top-header">
<?php $coupon = $this->session->userdata('coupon_data'); ?>
<?php //print_r($coupon); ?>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<?php $link = $this->setting_model->get_all_setting();?>


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8">
        <div class="title-block">
          <h1>Who we are</h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
                <?php echo $cms_page[0]->title; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Contact section start -->
<section class="contact section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-xl-7">
                <div class="section-heading center-heading">
                    <span class="subheading">contact</span>
                    <h3>For more information about our courses, get in touch</h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Email Us</p>
                            <h4><a href="mail-to:<?php echo $link[0]->email; ?>"><?php echo $link[0]->email; ?></a></h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Make a Call</p>
                            <h4><?php echo $link[0]->phone; ?></h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Corporate Office</p>
                            <h4><?php echo $link[0]->address_content; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="contact__form form-row " method="post" action="" id="contactForm">
                      <?php echo $this->session->flashdata('msg');?>
                    <div class="row">
                       <div class="col-12">
                           <div class="alert alert-success contact__msg" style="display: none" role="alert">
                               <?php echo $this->session->flashdata('msg');?>
                           </div>
                       </div>
                   </div>

                   <div class="row">
                       <div class="col-lg-12">
                           <div class="form-group">
                               <input type="text"  id="name" name="name" class="form-control"  placeholder="Enter Your name" required="">
                           </div>
                       </div>
                       
                       <div class="col-lg-6">
                           <div class="form-group">
                               <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                           </div>
                       </div>  

                       <div class="col-lg-6">
                           <div class="form-group">
                               <input type="text" name="mobile"  class="form-control"  maxlength="10" minlength="10" id="phone" placeholder="Enter your number" required="">
                           </div>
                       </div>
                   
                       <div class="col-lg-12">
                           <div class="form-group">
                               <textarea  name="message" placeholder="Write Your Message" id="exampleFormControlTextarea1" rows="6" class="form-control" placeholder="Your Message"></textarea>    
                           </div>
                       </div>
                         <div class="col-md-12">
                             <div class="col-lg-12">
                                <div class="g-recaptcha" data-sitekey="6LeTVfMUAAAAAGVnsnujwlG4acMf7oVSkctCgu0L"></div>
                            </div>

                        </div>
                   </div>

                   <div class="col-lg-12">
                       <div class="mt-4 ">
                           <button class="btn btn-main" type="submit" name="submit">Send Message</button>
                       </div>
                   </div>
               </form> 
            </div>
        </div>
    </div>
</section>

<!-- Contact section End -->


<?php $this->load->view('front/layout/footer.php') ?>


<script type="text/javascript">

$(document).ready(function(){

   $('#tel-msg').empty(); 
    $('#phone').keypress(validateNumber);
   
    $('#phone').keyup(function () {
        if ($('#phone').val().length != 10) {

             $('#tel-msg').html('Enter 10 Digits Phone Number.'); 
             return false ; 
        }else{

              $('#tel-msg').empty(); 
        }

          
    });
});  


function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};



</script>
</body>
</html>
