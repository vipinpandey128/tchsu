<?php $first_level = $this->board_model->get_board_by_parent(0); ?>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $link = $this->setting_model->get_all_setting();?>
<?php $userdata = $this->user_model->get_user_by_id($user_id);?>
<header> 
    <div class="header-top ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 text-center text-md-left ">
                    <p><span>Ph:</span> &nbsp;<a href="tel:<?php echo $link[0]->phone; ?>"><?php echo $link[0]->phone; ?></a> &nbsp; &nbsp;  &nbsp;<span>Email:</span> &nbsp;<a href="mail-to:<?php echo $link[0]->email; ?>"><?php echo $link[0]->email; ?></a></p>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="header-right float-md-right text-center">
                        <div class="header-socials">
                            <?php if(empty($user_id)){ ?>
                                <a href="<?php echo base_url('user/login'); ?>" >Log In</a>
                                <a href="<?php echo base_url('user/register'); ?>" >sign up</a>
                                <?php }else{ ?>
                                   <a href="<?php echo base_url('user/profile'); ?>" >Hello,  
                                  <?php echo ucwords($userdata[0]->fname).' '.ucwords($userdata[0]->lname) ?> </a>
                                   
                                    <a href="<?php echo base_url('user/logout'); ?>">Logout</a>
                                 <?php } ?>


                        </div>
                    </div>
                </div>

                 <div class="col-lg-2 col-md-2">
                    <div class="header-right float-md-right text-center">
                        <div class="header-socials">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-style-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
               <a class="navbar-brand" href="<?php echo base_url()?>">

                     <?php if(!empty($link[0]->logo)){ ?>
                    <img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" title="<?php echo $link[0]->title ?>" width="100px"  class="img-fluid">
                    <?php } ?>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link " href="<?php echo base_url()?>" id="navbar3" role="button" >
                                Home
                            </a>
                          
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo base_url('about-us')?>" class="nav-link js-scroll-trigger">
                                About us
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses<i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                   <?php $parent = $this->board_model->get_board_by_parent('0');?>
                                <?php foreach($parent as $parents){ ?>

                                    <a class="dropdown-item " href="<?php echo base_url() ?><?php echo $parents->url_slug;?>.html"><?php echo $parents->code;?></a>

                                <?php  }  ?>
                              
                            </div>
                        </li>
                           <li class="nav-item ">
                            <a href="<?php echo base_url('All-Board')?>" class="nav-link js-scroll-trigger">
                                
                                All Board
                            </a>
                        </li>

                  
                  
                        <li class="nav-item ">
                            <a href="<?php echo base_url('contact-us')?>" class="nav-link">
                                Contact Us
                            </a>
                        </li>

    

                    </ul>
                    
                    <div class="header-login">

                      
                            <a href="<?php echo base_url('cart'); ?>" class="btn btn-main btn-sm">My Cart</a>
                    
                    </div>
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>