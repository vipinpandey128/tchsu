<!doctype html>
<html>
<head>
<?php $this->load->view('front/layout/head'); ?>
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Change Profile Picture</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Change Profile Picture</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                    <div class="block-content">
                        <ul>
                        	<?php $this->load->view('front/account/left-menu'); ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <div class="page-title">
                            <h2>My Change Profile Picture</h2></div>
                    	<div class="row">
							<div class="col-md-12">
								<div class="welcome-msg dashboard">
									<?php echo $this->session->flashdata('msg'); ?>	
									<div class="avatar-pic">
										<img src="<?php echo check_profile_pic('uploads/profile_pic/',$RESULT[0]->image); ?>" style='max-width:140px;'>
									</div>
									<form class="avtar-form form-inline" method="post" action="profile_picture" enctype="multipart/form-data">
										<div class="file-upload">
											<div class="file-select">
												
												<input type="file" name="picture" id="chooseFile">
											</div>
										</div>                
										<input type="submit" id="base-input" name="uploadpicture" class=" btn btn-solid" value="Change Photo">
									</form>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- End Header -->

<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>