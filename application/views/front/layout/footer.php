<html>
    <head>
        <?php $link = $this->setting_model->get_all_setting();?>

    </head>
    <body>

    <div class="footer-bottom">
        <div class="wrapper">
            <div class="row">
                <div class="top">
                    <div class="quick-links">
                        <ul>
                            <li>
                                <a href="/about-us/index">About Us</a>
                            </li>
                            <li>
                                <a href="/blog">Blog</a>
                            </li>
                            <li>
                                <a onclick="window.open('/htmls/termsandcondition','name','height=500,width=800,screenX=200,screenY=100,scrollbars=yes,resizable=no,status=no,location=no'); return false;" id="tncBtn" title="Terms &amp; Conditions" href="javascript:void(0)">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a href="/wall-of-success">Our Results</a>
                            </li>
                            <li>
                                <a href="/about-us/join-us">Jobs</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bottom">
                    <ul>
                        <!-- <li>
                            <a href="mailto:?subject=Help regarding your mobile website">
                            <i class="mn-email"></i>
                                                        </a>
                        </li> -->
                        <li>
                            <a href="tel:<?php echo $link[0]->phone; ?>"><?php echo $link[0]->phone; ?></a>
                        </li>
                        <li class="social-media">
                            <span>Follow Us On: </span>
                            <a target="_blank" href="https://www.facebook.com/meritnation">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a target="_blank" href="https://www.linkedin.com/company/707873">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a target="_blank" href="https://www.youtube.com/meritnation">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a target="_blank" href=" https://www.instagram.com/meritnation/?hl=en">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="company-logo">
                        <div class="copyright-txt">
                            <span>Tch-Su Online classes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    
    </div>
</body>
</html>