<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!doctype html>
<html lang="en">
<head>

 <title>  404 Error</title>
    
 
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8">
        <div class="title-block">
          <h1> 404 Error </h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
             <li class="list-inline-item">/</li>
         
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- breadcrumb end -->
<section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        <h1>404</h1>
                        <h2>page not found</h2>
                        <a href="index.html" class="btn btn-solid">back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- about section end -->
<!-- about section end -->
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>
