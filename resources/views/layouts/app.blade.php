<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />-->

        <title>
            LearnerPlanet.com - Leading Learning Platform
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('vendors/fontawesome/css/all.min.css') }}" rel="stylesheet"/>
        
        <link href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
        
        @stack('pluginCss')

        <link href="{{ asset('css/styles.css') }}?v=1" rel="stylesheet">

        @stack('css')
        
    </head>
    <body>
      @include('layouts.navigation')

      <!-- Top Banner -->
      <section id="home">
        <div class="container-fluid px-0 top-banner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <h1>Online Learning Platform</h1>
                        <p>
                          Join the world’s most powerful online platform for continuous momentum, growth and success.
                        </p>
                        <div class="mt-4">
                            <button class="main-btn">
                              Register Now
                              <i class="fas fa-angle-right ps-3"></i>
                            </button>
                            <button class="white-btn ms-lg-4 mt-4">Learn More
                              <i class="fas fa-angle-right ps-3"></i>
                          </button>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                      <div class="home-top-banner">
                        <img src="{{ asset('images/home-top-banner.jpg') }}" class="img-fluid">
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!--Section 2: Counter-->
      <section id="counter">
        <section class="counter-section">
          <div class="container">
            <div class="row text-center">
              <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                <h2>
                  <span id="count1"></span>+
                </h2>
                <p>On Demand
                  Courses & Trainings</p>
              </div>
              <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                <h2>
                  <span id="count2"></span>+
                </h2>
                <p>Hours of
                  Knowledge</p>
              </div>
              <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                <h2>
                  <span id="count3"></span>+
                </h2>
                <p>Live Monthly
                  Training Events</p>
              </div>
              <div class="col-md-3 mb-lg-0 mb-md-0 mb-5">
                <h2>
                  <span id="count4"></span>+
                </h2>
                <p>Active Learners</p>
              </div>
            </div>
          </div>
        </section>
      </section>

       <!--Section 5: Explore Foods-->
       <section id="explore-course">
        <div class="explore-course wrapper">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h2>Our Popular Courses</h2>
              </div>
            </div>
            <div class="row pt-5">
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="card">
                  <img src="{{ asset('images/top-course1.jpg') }}" class="img-fluid top-course-image">
                  <div class="pt-3">
                    <h4>Become A Better Photographer</h4>
                    <p>By <b>John Doe</b></p>
                    <span>$10.50 <del>$11.70</del></span>
                    <button class="mt-4 main-btn">Buy Now</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="card">
                  <img src="{{ asset('images/top-course2.jpg') }}" class="img-fluid top-course-image">
                  <div class="pt-3">
                    <h4>Business Communication Skills</h4>
                    <p>By <b>Harry</b></p>
                    <span>$10.50 <del>$11.70</del></span>
                    <button class="mt-4 main-btn">Buy Now</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-lg-0 mb-5">
                <div class="card">
                  <img src="{{ asset('images/top-course3.png') }}" class="img-fluid top-course-image">
                  <div class="pt-3">
                    <h4>Entrepreneurial Skills</h4>
                    <p>By  <b>Robert</b></p>
                    <span>$10.50 <del>$11.70</del></span>
                    <button class="mt-4 main-btn">Buy Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Section 6: Testominial-->
      <section id="testomonials">
        <div class="wrapper testimonial-section">
          <div class="container text-center">
            <div class="text-center pb-4">
              <h2>Testimonial</h2>
            </div>
            <div class="row">
              <div class="col-sm-12 col-lg-10 offset-lg-1">
                <div id="carouselExampleDark" class="carousel slide">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <div class="carousel-caption">
                        <img src="{{ asset('images/testimonial-male.jpeg') }}">
                        <p>Excellent up to date Courses</p>
                        <h5>John Doe</h5>
                      </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                      <div class="carousel-caption">
                        <img src="{{ asset('images/testimonial-female.jpeg') }}">
                        <p>Good Courses</p>
                        <h5>Marry Jane</h5>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="carousel-caption">
                        <img src="{{ asset('images/testimonial-male.jpeg') }}">
                        <p>On demand Courses</p>
                        <h5>Brandon Murphy</h5>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Section 7: Faq-->
      <section id="faq">
        <section class="faq wrapper">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="text-center pb-4">
                  <h2>Frequently Asked Questions</h2>
                </div>
              </div>
            </div>
            <div class="row pt-5">
              <div class="col-sm-6 mb-4">
                <h4>How can I take the online course?</h4>
                <p>Firstly, you need to create an account, choose the course you want to take, buy the course by choosing the payment methods. After you have paid for the course, you can start learning easily. There is no fixed time to access the course. You can learn anytime, anywhere on any device.</p>
              </div>
              <div class="col-sm-6 mb-4">
                <h4>Which courses are available?</h4>
                <p>We have a variety of courses covering different subject matters.</p>
              </div>
              <div class="col-sm-6 mb-4">
                <h4>What is included in the course?</h4>
                <p>The courses include videos and additional course materials, such as PDF documents, which are free to download.</p>
              </div>
              <div class="col-sm-6 mb-4">
                <h4>Are courses Free?</h4>
                <p>We offer both free courses and paid ones. However, there are always discounts or ongoing offers on our courses. </p>
              </div>
            </div>
          </div>
        </section>
      </section>

       <!--Section 9: Newsletter-->
       <section id="newsletter">
        <div class="container wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="text-content text-center pb-4">
                <h2>Subscribe our newsletter.</h2>
                <p>Hurry up! Subscribe our newsletter to get notifications about latest deals and offers.</p>
              </div>
              <form class="newsletter">
                <div class="row">
                  <div class="col-md-8 col-12">
                    <input class="form-control" placeholder="Email Address here" name="email" type="email">
                  </div>
                  <div class="col-md-4 col-12">
                    <button class="main-btn" type="submit">Subscribe</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- ======================
        Contact Section Start
    ============================ -->
    <section id="contact">
      <div class="contact ptb_100">
          <div class="container">
              <div class="mb-5 text-center">
                  <h2 class="fw-bold">Contact Us</h2>
              </div>
          </div>
          <div class="mobile_px_20">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-5 col-md-5">
                          <h4 class="fw-bold">Contact Info</h4>
                          <ul class="info list-unstyled">
                              <li class="d-flex align-items-center">
                                  <p>
                                    9330 Baseline Road, Suite 103 <br/>
                                    Rancho Cucamonga, CA 91707
                                  </p>
                              </li>
                              <li class="d-flex align-items-center">
                                  <i class="fa fa-phone fs-6 me-2"></i>
                                  <p><a href="tel:+1 (620) 227-3311">+1 (620) 227-3311</a></p>
                              </li>
                              <li class="d-flex align-items-center">
                                  <i class="fa fa-envelope fs-6 me-2"></i>
                                  <p><a href="mailto:info@learnerplanet.com">info@learnerplanet.com</a></p>
                              </li>
                          </ul>
                      </div>
                      <div class="col-lg-7 col-md-7 pt-lg-0 pt-md-0 pt-4">
                          <form>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Your Name"/>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <input type="email" class="form-control" placeholder="Email Address"/>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <textarea class="textarea" cols="30" rows="4" placeholder="Enter Your Message"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <button class="main-btn"><span class="ti-rocket pe-2 fs-5"></span>Send Message</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

      <!--Section 10: Footer-->
      <footer id="footer">
        <div class="footer py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <a href="#" class="footer-link">FAQ</a>
                <a href="#" class="footer-link">Privacy Statement</a>
                <a href="#" class="footer-link">Terms and Service</a>
                <a href="#" class="footer-link">Contact Us</a>
                <div class="footer-social pt-4 text-center">
                  <a href=""><i class="fab"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-youtube"></i></a>
                  <a href=""><i class="fab fa-linkedin"></i></a>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="footer-copy">
                  <div class="copy-right text-center pt-5">
                    <p class="text-light">&copy; {{ date('Y') }}, {{ config('app.name') }}. All rights reserved.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>


      <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('js/jquery.validate-additional-methods.min.js') }}"></script>
        
      @stack('pluginScripts')

      <script src="{{ asset('js/main.js') }}"></script>

      @stack('scripts')
    </body>
</html>

