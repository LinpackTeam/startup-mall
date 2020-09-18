<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Start-up Mall</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- meterilazed css-->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Favicons -->
  <link href="{{url('home_images/favicon.png')}}" rel="icon">
  <link href="{{url('home_images/apple-touch-icon.png')}}" rel="apple-touch-icon">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public/css/css_for_admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">   

 
  
  
  <link href="{{url('public/css/css_for_admin/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('public/css/css_for_admin/style.css')}}" rel="stylesheet">

<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  bottom: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 100%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
    /* css for Search bar */
    .search form {
  margin-top: 10px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  text-align: left;
}
 .search form input[type="text"] {
  border: 0;
  padding: 4px 4px;
  width: calc(100% - 100px);
}
 .search form input[type="submit"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #eb5d1e;
  color: #fff;
  transition: 0.3s;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.search form input[type="submit"]:hover {
  background: #c54811;
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      
        <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="logo mr-auto">
        <h1 class="text-light"><img src="{{url('home_images/Logo.png')}}" alt="Italian Trulli"></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
        </div>
	  <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="col"></div>
           <div class="search hidden-xs"><form><input type="text" name="search" placeholder="Type here"><input type="submit" value="Search"></form></div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <nav class="nav-menu d-none d-lg-block">
          
	  <ul>
      <li class="drop-down"><a href="">Services</a>
            <ul>
              <li><a href="#">Legal Services</a></li>
              <li><a href="#">Mentor Support</a></li>
            <!--  <li><a href="#"></a></li>-->
              <li><a href="#">Financial Services</a></li>
            </ul>
      </li>
      <li><a href=""><i class='bx bx-notification' style="font-size:18px"></i></a></li>
      <li class="drop-down"><a href=""><i class='bx bx-user' style="font-size:18px"></i></a>
            <ul>
              <li><a href="login/login.html">User Login</a></li>
              <li><a href="https://start-upmall.com/startup_login/registration.php">Startup Login</a></li>
            </ul>
      </li>
	  </ul>
	  </nav>
        </div>
    <!--  <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!--   <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
       <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li>

          <li class="get-started"><a href="#" data-target="#login" data-toggle="modal">Login</a></li>-->
		  
		  
		  <!--ee6e73

    </ul>
      </nav>.nav-menu -->
       
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section >

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{url('home_images/slider01.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('home_images/slider02.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('home_images/slider03.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </section><!-- End Hero -->

  <main id="main" >

    <!-- ======= About Section ======= -->
    <div id="about" class="about" style="padding:10px">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="{{url('home_images/About.png')}}" class="img-fluid hidden-xs" alt="" data-aos="zoom-in" >
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">One platform for startups</h3>
            <p data-aos="fade-up" data-aos-delay="100" style="text-align:justify">
              We are just like you all people. We are trying to do something
that can help our country and our fellow entrepreneurs gain
some momentum in the business.
We started with a feedback from small business persons,
newly established MSMEs, Idea stage start-ups, go to market
start-ups about the biggest challenges they face in their
journey of being an Entrepreneur.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>What we do</h4>
                <p style="text-align:justify">We, at Start-up Mall, have decided to provide a platform for start-ups in all stages, to
showcase and sell their products directly to customers and getting a feedback from them.</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>What it is</h4>
                <h6><p style="text-align:justify">Start-up Mall is an online platform for customers to see and buy innovative products. It is a
platform for start-ups to build their products. It is a platform for start-ups to receive
mentorship from the business in the field. We are bringing innovation close to people.</p></h6>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
            <!---  <div class="icon"><i class="bx bxl-dribbble"></i></div>-->
              <h4 class="title"><a href="">Idea Stage Start-Ups </a></h4>
              <p class="description">Get your ideas validated and your product developed with the help of an expert team in product.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
             <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
              <h4 class="title"><a href="">Go to Market Start-ups</a></h4>
              <p class="description">For start-ups who have
developed products and
services, we have an e-
commerce platform to
help them gain a market
share.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
             <!-- <div class="icon"><i class="bx bx-tachometer"></i></div>-->
              <h4 class="title"><a href="">The Big leap</a></h4>
              <p class="description">Start-ups with a turnover of
over 50 lakh can now have
an opportunity of getting a
V.C investment from the
most reputed
organisations.	</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <!---<div class="icon"><i class="bx bx-world"></i></div> -->
              <h4 class="title"><a href="">Legal services for Start-ups</a></h4>
              <p class="description">Get your CA/ CS/
Lawyer related jobs
done at affordable
prices for start-ups.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <!--<section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
       
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">AGRI</li>
              <li data-filter=".filter-card">Manufacturers</li>
              <li data-filter=".filter-web">IOT</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox" title="App 2"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox" title="Card 2"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox" title="Web 2"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox" title="App 3"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox" title="Card 1"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox" title="Card 3"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= 
    <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <ul class="faq-list">

          <li data-aos="fade-up" data-aos-delay="100">
            <a data-toggle="collapse" class="" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse show" data-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="200">
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="icofont-simple-up"></i></a>
            <div id="faq2" class="collapse" data-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="300">
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="400">
            <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="icofont-simple-up"></i></a>
            <div id="faq4" class="collapse" data-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="500">
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="icofont-simple-up"></i></a>
            <div id="faq5" class="collapse" data-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="600">
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="icofont-simple-up"></i></a>
            <div id="faq6" class="collapse" data-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->
      
      <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team Details</h2>
         <!-- <p>Check out our beautifull portfolio</p>-->
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/dimpesh.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
                
                <a href="https://www.linkedin.com/in/dimpesh-gupta-09a19847/" ><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Mr. Dimpesh Gupta</h4>
                <p>Chief Executive Officer</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/kalpan.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="https://www.linkedin.com/in/kalpan-kachhadiya-83942712a"><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Mr. Kalpan Kachhadiya</h4>
                <p>COO</p>
              </div>
            </div>
          </div>
            
            <div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/sanket.JPG')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
               
                <a href="https://www.linkedin.com/in/sanket-kedar-bb406352"><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4> Mr. Sanket Kedar</h4>
                <p>CMO & CIO </p>
              </div>
            </div>
          </div>
            <div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/bhavin.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
               
                <a href="#"><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Dr. Bhavin Pandya</h4>
                <p>Advisory Board </p>
              </div>
            </div>
          </div>
            <div class="col-lg-3 col-md-3 portfolio-item">
            
          </div>
            <div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/Santosh.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
               
                <a href="https://www.linkedin.com/in/santhosh-kumar-b352a3a2"><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Mr. Santhosh Bethi</h4>
                <p>CTO</p>
              </div>
            </div>
          </div>
<div class="col-lg-3 col-md-3 portfolio-item">
            <div class="portfolio-wrap">
              <img src="{{url('home_images/team/raj.jpg')}}" class="img-fluid" alt="">
              <div class="portfolio-links">
                
                <a href="https://www.linkedin.com/in/raj-kumavat-2242b2144/"><i class="icofont-linkedin"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>Mr. Raj Kumavat</h4>
                <p>CTO</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Section -->
      
      
      
      
      
      
      
      
    <!-- ======= Team Section =======
    <section id="team" class="team" style="margin-left: 150px;">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Our team is always here to help</p>
        </div>

        <div class="row">

          <div class="col-xl-2 col-lg-4 col-md-6 " data-aos="zoom-in" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/team/dimpesh.jpg" class="img-fluid " alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mr. Dimpesh Gupta</h4>
                  <span>Chief Executive Officer</span>
                </div>
                <div class="social">
                  
                  <a href="https://www.linkedin.com/in/dimpesh-gupta-09a19847" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/team/kalpan.jpg" class="img-fluid"  alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mr. Kalpan Kachhadiya</h4>
                  <span>COO</span>
                </div>
                <div class="social">
               
                  <a href="https://www.linkedin.com/in/kalpan-kachhadiya-83942712a" target="_blank"> <i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/team/raj.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mr. Raj </h4>
                  <span>CTO</span>
                </div>
                <div class="social">
                  <!-- <a href="https://twitter.com/RajKumavat111" target="_blank"><i class="icofont-twitter"></i></a>
                 <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>-->
              <!--      <a href="https://www.linkedin.com/in/raj-kumavat-2242b2144/" target="_blank"><i class="icofont-linkedin"></i></a>
              </div>
              </div>
            </div>
          </div> -->

          <!--   <div class="col-xl-2 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/team/bhavin.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Dr. Bhavin Pandya</h4>
                  <span>Advisory Board </span>
                </div>
             <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>-->
		  
		  
		<!--  <div class="col-xl-2 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/team/sanket.JPG" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4> Mr. Sanket Kedar </h4>
                  <span>CMO & CIO </span>
                </div>
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>-->
              <!--    <a href="https://www.linkedin.com/in/sanket-kedar-bb406352/" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
		  
		  
		  
		  

        </div>

      </div>
    </section> End Team Section -->

    <!-- ======= Clients Section ======= 
    <section id="clients" class="clients section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Clients</h2>
          <p>They trusted us</p>
        </div>

        <div class="owl-carousel clients-carousel" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/clients/client-1.png" alt="">
          <img src="assets/img/clients/client-2.png" alt="">
          <img src="assets/img/clients/client-3.png" alt="">
          <img src="assets/img/clients/client-4.png" alt="">
          <img src="assets/img/clients/client-5.png" alt="">
          <img src="assets/img/clients/client-6.png" alt="">
          <img src="assets/img/clients/client-7.png" alt="">
          <img src="assets/img/clients/client-8.png" alt="">
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
          <p>We value Our Partners</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Gujarat</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@start-upmall.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+91 97251 48432</p>
              </div>

              <iframe frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>For latest information on start-ups and promotional offers, subscribe to our newsletter</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>Start-up Mall</h3>
            <p>
             Gujarat<br><br>
              <strong>Phone:</strong> +91 97251 48432<br>
              <strong>Email:</strong> info@start-upmall.com<br>
            </p>
          </div>
          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
           <!-- <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>-->
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Get Us on Social Media</h4>
           <!-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>-->
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('public/css/css_for_admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('public/css/css_for_admin/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public/css/css_for_admin/vendor/main.js')}}"></script>

</body>

</html>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
