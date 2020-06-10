<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css"}>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets/login_register_css/login-register.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/ekko-lightbox.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('mdbootstrap/css/mdb.css')); ?>">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />


  </head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <div class="site-wrap"  id="home-section">
  <div class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div>
        <div class="row align-items-center">
        <div class="col-3 col-md-3 col-xl-4  d-block">
            <h1 class="mb-0 site-logo" style="padding-left: 20px"><a href="#" class="text-black h2 mb-0">
            Sahakari Sastha<span class="text-primary">.</span> </a></h1>
        </div>
          <div class="col-10 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#program-services-section" class="nav-link">Program & Services</a></li>
                <li class="has-children">
                  <a href="#about-section" class="nav-link">About Us</a>
                  <ul class="dropdown arrow-top">
                    <li><a href="#our-team-section" class="nav-link">Our Team</a></li>
                    <li class="has-children">
                      <a href="#">More Links</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                <li><a href="#blog-section" class="nav-link">Gallery</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                  <?php if(auth()->guard()->check()): ?>
                      <li><a href="<?php echo e(url('/home')); ?>">Home</a></li>
                  <?php else: ?>
                      <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                  <?php endif; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="site-blocks-cover" style="overflow: hidden;">
      <div class="container">
        <div class="row align-items-center justify-content-center">

          <div class="col-md-12" style="position: relative;" data-aos="fade-up" data-aos-delay="200">

            <img src="images/undraw_investing_7u74.svg" alt="Image" class="img-fluid img-absolute">

            <div class="row mb-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6 mr-auto">
                <h1>Make Your Business More Profitable</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo cupiditate facere deleniti fuga officia.</p>
                <div>
                  <a href="#" class="btn btn-primary mr-2 mb-2">Get Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/layouts/frontend/header.blade.php ENDPATH**/ ?>