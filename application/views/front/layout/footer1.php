<?php $link = $this->setting_model->get_all_setting();?>


<script>
    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>


<section class="footer-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-md-8 col-xl-3 col-sm-6">
        <div class="widget footer-about mb-5 mb-lg-0">
          <h5 class="widget-title text-gray">About us</h5>
          <ul class="list-unstyled footer-info">
            <li><span>Ph:</span><a href="tel:<?php echo $link[0]->phone; ?>"><?php echo $link[0]->phone; ?></a> </li>
            <li><span>Email:</span><a href="mail-to:<?php echo $link[0]->email; ?>"><?php echo $link[0]->email; ?></a> </li>
            <li><span>Location:</span>  <?php echo $link[0]->address_content; ?> </li>
          </ul>
          <ul class="list-inline footer-socials">
            <li class="list-inline-item">Follow us :</li>

              <li  class="list-inline-item"><a href="<?php echo $link[0]->facebook_link; ?>" target ="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
              <li  class="list-inline-item"><a href="<?php echo $link[0]->google_link; ?>"><i class="fab fa-pinterest" aria-hidden="true"></i></a></li>
              <li  class="list-inline-item"><a href="<?php echo $link[0]->twitter_link; ?>" target ="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li  class="list-inline-item"><a href="<?php echo $link[0]->linkedin_link; ?>" target ="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>


        
          </ul>
        </div>
      </div>

      
      <div class="col-xl-7 ml-auto col-lg-7 col-md-12 col-sm-12">
        <div class="row">
          <div class="col-lg-4 col-xl-4 col-sm-4 col-md-4  col-6">
            <div class="footer-widget mb-5 mb-lg-0">
              <h5 class="widget-title text-gray">Explore</h5>
              <ul class="list-unstyled footer-links">
                  <li><a href="#">Home</a></li>
                                <li><a href="<?php echo base_url() ?>about">About Us</a></li>
                                <li><a href="<?php echo base_url() ?>contact">Contact Us</a></li>
                              
                                  
                                   
            </div>
          </div>

          <div class="col-lg-4 col-xl-4 col-sm-4 col-md-4 col-6">
            <div class="footer-widget mb-5 mb-lg-0">
              <h5 class="widget-title text-gray">Courses</h5>
              <ul class="list-unstyled footer-links">
                  <?php $parent = $this->board_model->get_board_by_parent('0');?>
                                <?php foreach($parent as $parents){ ?>

                              <li><a href="<?php echo base_url() ?><?php echo $parents->url_slug;?>.html"><?php echo $parents->code;?></a></li>

                                <?php  }  ?>
                              
              
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-xl-4 col-sm-4 col-md-4 col-12">
            <div class="footer-widget mb-5 mb-lg-0">
              <h5 class="widget-title text-gray">Legal</h5>
              <ul class="list-unstyled footer-links">
                 <li><a href="<?php  echo base_url() ?>terms-conditions">Terms & Conditions</a></li>
                <li><a href="<?php  echo base_url() ?>terms-conditions">Privacy policy</a></li>
               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-btm">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-6 col-lg-4 col-md-12">
          <div class="footer-logo text-lg-left text-center mb-4 mb-lg-0">
             <p> <?php echo $link[0]->copyright; ?></p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-8 col-md-12">
          <div class="copyright text-lg-right text-center">
            <p> &nbsp; Crafted by <a href="https://www.chahartechnologies.com/">Chahar Technologies</a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer section End -->











<div class="fixed-btm-top">
  <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>

    <script src="<?php echo base_url('assets/front/'); ?>/vendors/jquery/jquery.js"></script>
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
 
    <!-- Bootstrap 4.5 -->
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/counterup/waypoint.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/jquery.isotope.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/imagesloaded.html"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/owl/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/js/script.js"></script>
    
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/customjs/plugins.js"></script>
    <script src="<?php echo base_url('assets/front/'); ?>/vendors/customjs/main.js"></script>
   
    <script type="text/javascript">
   $(document).ready(function()
   {
    
      $(".add-to-cart").on('click',function(){

            var course_id = $(this).attr('data');
             
            $(this).removeClass('buybutton').removeClass('add-to-cart').addClass('addedbutton').html('Added');
             
             
              $.ajax({
                url: "<?php echo base_url('cart/add_to_cart')?>",
                data:{course_id:course_id,qty:'1'},
                type: "POST",
                success: function(data) {
                      $('.cart-label').html(data);

                     
                       
                  }
                });
              return false ;  

          
      });
      
      
      
      $(".subscribe-form").on('submit',function(){


              $.ajax({
                url: "<?php echo base_url('welcome/subscription') ?>",
                data: $(this).serialize(),
                type: "POST",
                success: function(data) {
                     
                     alert(data);

                     
                       
                  }
                });
              return false ;  

          
      });
      
        $(".subscribe-form-2").on('submit',function(){


              $.ajax({
                url: "<?php echo base_url('welcome/subscription') ?>",
                data: $(this).serialize(),
                type: "POST",
                success: function(data) {
                     
                     $('#msg').html(data);
                     $('.subscribe-form-2').css('display','none')

                     
                       
                  }
                });
              return false ;  

          
      });


    });


</script>



</body>

</html>
<!-- Button trigger modal -->

