<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name')}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{asset('dashboard-assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">

  <link rel="stylesheet" href="{{asset('home-assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">

  <link href="{{asset('home-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('home-assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('home-assets/css/style.css')}}" rel="stylesheet">
 
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>{{ config('app.name')}}</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
       </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">

        <div class="col-lg-12 order-2 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <img src="{{asset('home-assets/img/home.png')}}" class="img-fluid animated" alt="">
          <div class="text-center  mt-3">
          <a href="{{route('login')}}" class="mt-3  btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-12 pt-5 pt-lg-0 order-1 order-lg-1  ">
            <div data-aos="zoom-out">
              <h3 class="text-center text-white mb-5">Focus on your core business & we will take care of monitoring your website</h3>              
            </div>
          </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container-fluid">
  
          <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
            <img src="{{asset('home-assets/img/remote-management-distant-work-isometric-icons-composition-with-man-computer-table-with-avatars-distant-workers_1284-63071.jpg')}}">
            </div>
  
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
            <h3>{{ config('app.name')}}</h3>
              <p>
                is an uptime monitor, We send out notifications when something's wrong. Be the first to know that your website is down! Reliable monitoring warns you of any significant trouble and saves you money.
              </p>
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon"><i class="fas fa-globe"></i></div>
                <h4 class="title"><a href="">Link Management</a></h4>
                <p class="description">
                  Easily you can add a new link and we start our monitoring task from there.
                </p>
              </div>
  
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon"><i class="fa fa-users"></i></div>
                <h4 class="title"><a href="">Team Management</a></h4>
                <p class="description">As a human being sure we love working in teams for that we offer you a team management feature out of the box.</p>
              </div>
              <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon"><i class="fa fa-history"></i></div>
                <h4 class="title"><a href="">Scan Logs</a></h4>
                <p class="description">We try to provide full searchable logs to help to make decisions data-driven.</p>
              </div>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
      
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('home-assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('home-assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('home-assets/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('home-assets/js/main.js')}}"></script>

</body>

</html>