<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EventUp - Event and Conference Template</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/css/bootstrap.min.css') }}">
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/fonts/line-icons.css') }}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/css/nivo-lightbox.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/css/animate.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('event-home/css/responsive.css') }}">

</head>
<body>

<!-- Header Area wrapper Starts -->
<header id="header-wrap">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-inverse fixed-top scrolling-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a href="index.html" class="navbar-brand"><img src="{{ asset('event-home/img/logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link" href="#header-wrap">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedules">
                            schedules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">
                            Speakers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">
                            Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">
                            pricing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sponsors">
                            Sponsors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#google-map-area">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-sm-12">
                    <div class="contents text-center">
                        <div class="icon">
                            <i class="lni-mic"></i>
                        </div>
                        <p class="banner-info">15, Oct 2020 - Maria Hall, NY, United states</p>
                        <h2 class="head-title">Developers Conference</h2>
                        <p class="banner-desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, nobis nesciunt atque
                            perferendis, ipsa doloremque deserunt cum qui.</p>
                        <div class="banner-btn">
                            <a href="#" class="btn btn-common">Get Ticket</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

</header>
<!-- Header Area wrapper End -->

<!-- Count Bar Start -->
<section id="count">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="count-wrapper text-center">
                    <div class="time-countdown wow fadeInUp" data-wow-delay="0.2s">
                        <div id="clock" class="time-count"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Count Bar End -->

<!-- About Section Start -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="img-thumb">
                    <img class="img-fluid" src="{{ asset('event-home/img/about/img1.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="about-content">
                    <div>
                        <div class="about-text">
                            <h2>About The Conference</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ncididunt ametfh
                                consectetur dolore magna aliqua. Ut enim ad minim veniam dolor sitame magnaelit ate
                                consectetur adipisicing. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                                eiusmod.</p>
                        </div>
                        <ul class="stylish-list mb-3">
                            <li><i class="lni-check-mark-circle"></i>Networking Sessions</li>
                            <li><i class="lni-check-mark-circle"></i>Meet New Professional Faces</li>
                            <li><i class="lni-check-mark-circle"></i>Get Inspired by Amazing Speakers</li>
                            <li><i class="lni-check-mark-circle"></i>Lorem ipsum dolor sit ameterib</li>
                            <li><i class="lni-check-mark-circle"></i>Lorem ipsum dolor sit ameterib quodsi</li>
                        </ul>
                        <a class="btn btn-common" href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Video Section Start -->
<div class="ready-to-play">
    <video id="bgvid" class="stop" loop>
        <source src="{{ asset('event-home/video/event.webm') }}" type="video/mp4">
    </video>
    <div id="polina" class="video-text">
        <div class="tb-t">
            <div class="tb-c">
                <div class="polina">
                    <button><i class='lni-play'></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Section End -->

<!-- Information Bar Start -->
<section id="information-bar">
    <div class="container">
        <div class="row inforation-wrapper">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-map-marker"></i>
                    </li>
                    <li><span><b>Location</b> Maria Hall, NY, USA</span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-calendar"></i>
                    </li>
                    <li><span><b>Date & Time</b> 10am - 7pm, 15th Oct</span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-mic"></i>
                    </li>
                    <li><span><b>Speakers</b> 25 Professionals</span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-user"></i>
                    </li>
                    <li><span><b>Seats</b> 100 People</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Information Bar End -->

<!-- intro Section Start -->
<section id="intro" class="intro section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Why You Should Join?</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row intro-wrapper">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                    <i class="lni-microphone"></i>
                    <h3>Great Speakers</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">01</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text">
                    <i class="lni-users"></i>
                    <h3 class="ts-title">New People</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">02</span>
                </div>
                <div class="border-shap left"></div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                    <i class="lni-bullhorn"></i>
                    <h3>Global Event</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">03</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                    <i class="lni-heart"></i>
                    <h3>Get Inspired</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">04</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                    <i class="lni-cup"></i>
                    <h3>Networking Session</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">05</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="single-intro-text mb-70">
                    <i class="lni-gallery"></i>
                    <h3>Meet New Faces</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus mollitia, excepturi.
                    </p>
                    <span class="count-number">06</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- intro Section End -->

<!-- Counter Area Start-->
<section class="counter-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Counter Item -->
            <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                <div class="counter">
                    <div class="icon">
                        <i class="lni-mic"></i>
                    </div>
                    <div class="counter-content">
                        <div class="counterUp">42</div>
                        <p>Spekers</p>
                    </div>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                <div class="counter">
                    <div class="icon">
                        <i class="lni-bulb"></i>
                    </div>
                    <div class="counter-content">
                        <div class="counterUp">800</div>
                        <p>Seats</p>
                    </div>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                <div class="counter">
                    <div class="icon">
                        <i class="lni-briefcase"></i>
                    </div>
                    <div class="counter-content">
                        <div class="counterUp">24</div>
                        <p>Sponsors</p>
                    </div>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-lg-3 col-md-6 col-xs-12 work-counter-widget">
                <div class="counter">
                    <div class="icon">
                        <i class="lni-coffee-cup"></i>
                    </div>
                    <div class="counter-content">
                        <div class="counterUp">56</div>
                        <p>Sessions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Area End-->

<!-- Schedule Section Start -->
<section id="schedules" class="schedule section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Event Schedules</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5 text-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="monday-tab" data-toggle="tab" href="#monday" role="tab"
                           aria-controls="monday" aria-expanded="true">
                            <div class="item-text">
                                <h4>Day 01</h4>
                                <h5>14 February 2020</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab"
                           aria-controls="tuesday">
                            <div class="item-text">
                                <h4>Day 02</h4>
                                <h5>15 February 2020</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#wednesday" role="tab"
                           aria-controls="wednesday">
                            <div class="item-text">
                                <h4>Day 03</h4>
                                <h5>16 February 2020</h5>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab"
                           aria-controls="thursday">
                            <div class="item-text">
                                <h4>Day 04</h4>
                                <h5>17 February 2020</h5>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12">
                <div class="schedule-area row wow fadeInDown" data-wow-delay="0.3s">
                    <div class="schedule-tab-content col-12 clearfix">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="monday" role="tabpanel"
                                 aria-labelledby="monday-tab">
                                <div id="accordion">
                                    <div class="card">
                                        <div id="headingOne">
                                            <div class="schedule-slot-time">
                                                <span> 9.30 - 10.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne" aria-expanded="false"
                                                 aria-controls="collapseOne">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-1.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo">
                                            <div class="schedule-slot-time">
                                                <span> 10.30 - 11.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseTwo" aria-expanded="false"
                                                 aria-controls="collapseTwo">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-2.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>15 Free Productive Design Tools</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingThree">
                                            <div class="schedule-slot-time">
                                                <span> 11.30 - 12.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseThree" aria-expanded="false"
                                                 aria-controls="collapseThree">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-3.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Getting Started With SketchApp</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                                <div id="accordion2">
                                    <div class="card">
                                        <div id="headingOne1">
                                            <div class="schedule-slot-time">
                                                <span> 1.30 - 2.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseTwo2" aria-expanded="false"
                                                 aria-controls="collapseTwo2">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-2.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1"
                                             data-parent="#accordion2">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo2">
                                            <div class="schedule-slot-time">
                                                <span> 9.30 - 10.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne1" aria-expanded="false"
                                                 aria-controls="collapseOne1">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-1.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo2"
                                             data-parent="#accordion2">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                                <div id="accordion3">
                                    <div class="card">
                                        <div id="headingOne3">
                                            <div class="schedule-slot-time">
                                                <span> 10.30 - 11.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne3" aria-expanded="false"
                                                 aria-controls="collapseOne3">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-1.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseOne3" class="collapse show" aria-labelledby="headingOne3"
                                             data-parent="#accordion3">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo3">
                                            <div class="schedule-slot-time">
                                                <span> 11.30 - 12.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseTwo3" aria-expanded="false"
                                                 aria-controls="collapseTwo3">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-2.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo3"
                                             data-parent="#accordion3">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingThree3">
                                            <div class="schedule-slot-time">
                                                <span> 1.30 - 2.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseThree3" aria-expanded="false"
                                                 aria-controls="collapseThree3">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-3.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3"
                                             data-parent="#accordion3">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                                <div id="accordion4">
                                    <div class="card">
                                        <div id="headingOne">
                                            <div class="schedule-slot-time">
                                                <span> 9.30 - 10.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne4" aria-expanded="false"
                                                 aria-controls="collapseOne4">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-2.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseOne4" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion4">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo">
                                            <div class="schedule-slot-time">
                                                <span> 10.30 - 11.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseTwo4" aria-expanded="false"
                                                 aria-controls="collapseTwo4">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-1.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseTwo4" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordion4">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingThree4">
                                            <div class="schedule-slot-time">
                                                <span> 11.30 - 12.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseThree4" aria-expanded="false"
                                                 aria-controls="collapseThree4">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-3.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseThree4" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordion4">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                                <div id="accordion">
                                    <div class="card">
                                        <div id="headingOne">
                                            <div class="schedule-slot-time">
                                                <span> 9.30 - 10.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseTwo" aria-expanded="false"
                                                 aria-controls="collapseTwo">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-2.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingTwo">
                                            <div class="schedule-slot-time">
                                                <span> 10.30 - 11.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseOne" aria-expanded="false"
                                                 aria-controls="collapseOne">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-1.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div id="headingThree">
                                            <div class="schedule-slot-time">
                                                <span> 11.30 - 12.30 AM</span>
                                                Workshop
                                            </div>
                                            <div class="collapsed card-header" data-toggle="collapse"
                                                 data-target="#collapseThree" aria-expanded="false"
                                                 aria-controls="collapseThree">
                                                <div class="images-box">
                                                    <img class="img-fluid"
                                                         src="{{ asset('event-home/img/speaker/speakers-3.jpg') }}"
                                                         alt="">
                                                </div>
                                                <h4>Web Design Principles and Best Practices</h4>
                                                <h5 class="name">David Warner</h5>
                                            </div>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet minima
                                                    dolores rerum maiores qui at commodi quas, reprehenderit eius
                                                    consectetur quae magni molestias veniam, provident illum facere iure
                                                    libero asperiores! Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Veniam earum nihil ex ipsa magni eligendi fugiat
                                                    assumenda suscipit, accusantium, necessitatibus reiciendis odit sed,
                                                    vero amet blanditiis?</p>
                                                <div class="location">
                                                    <span>Location:</span> Hall 1 , Building A, Golden Street,
                                                    Southafrica
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Schedule Section End -->

<!-- Team Section Start -->
<section id="team" class="section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Our Speakers</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-bt">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-01.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">JONATHON DOE</a></h3>
                        <p>Product Designer, Tesla</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-02.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Patric Green</a></h3>
                        <p>Front-end Developer</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-03.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Paul Kowalsy</a></h3>
                        <p>Lead Designer, TNW</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-04.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Jhon Doe</a></h3>
                        <p>Back-end Developer, ASUS</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="1s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-05.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Daryl Dixon</a></h3>
                        <p>Full-stack Developer, Google</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="1.2s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-06.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Chris Adams</a></h3>
                        <p>UI Designer, Apple</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="1.4s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-07.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Paul Kowalsy</a></h3>
                        <p>Lead Designer, TNW</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <!-- Team Item Starts -->
                <div class="team-item wow fadeInUp" data-wow-delay="1.6s">
                    <div class="team-img">
                        <img class="img-fluid" src="{{ asset('event-home/img/team/team-08.jpg') }}" alt="">
                        <div class="team-overlay">
                            <div class="overlay-social-icon text-center">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="lni-twitter-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-google" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-facebook-filled" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="lni-pinterest" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="info-text">
                        <h3><a href="#">Jhon Doe</a></h3>
                        <p>Back-end Developer, ASUS</p>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>
        </div>
        <a href="#" class="btn btn-common mt-30 wow fadeInUp" data-wow-delay="1.9s">Meet all speakers</a>
    </div>
</section>
<!-- Team Section End -->

<!-- Gallary Section Start -->
<section id="gallery" class="section-padding">
    <div class="container-fluid">
        <div class="contact-block">
            <div class="text-center">
                <h2>You are using Free Version</h2>
                <h4>Please, purchase full version to get all features and pages</h4><br>
                <b>Including:</b>
                <p>- Different Homepage Variations</p>
                <p>- All Elements and Features</p>
                <p>- Documentation File</p>
                <p>- Quick Support</p>
                <p>- Permission to Use in Commercial Projects</p>
                <p>- Footer Credit Removal</p>
                <p>- Working Contact Form</p>
                <br>
                <a href="https://rebrand.ly/eventup-gg" target="_blank" class="btn btn-common btn-lg">Purchase Now</a>
            </div>
        </div>
    </div>
</section>
<!-- Gallary Section End -->

<!-- Event Slides Section Start -->
<section id="event-up" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Upcoming Events</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                    <img class="img-fluid" src="{{ asset('event-home/img/event/img1.jpg') }}" alt="">
                    <div class="overlay-text">
                        <div class="content">
                            <h3>Business Confrence</h3>
                            <a href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                    <img class="img-fluid" src="{{ asset('event-home/img/event/img2.jpg') }}" alt="">
                    <div class="overlay-text">
                        <div class="content">
                            <h3>Designer Confrence</h3>
                            <a href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                    <img class="img-fluid" src="{{ asset('event-home/img/event/img3.jpg') }}" alt="">
                    <div class="overlay-text">
                        <div class="content">
                            <h3>Marketer Confrence</h3>
                            <a href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="event-item">
                    <img class="img-fluid" src="{{ asset('event-home/img/event/img4.jpg') }}" alt="">
                    <div class="overlay-text">
                        <div class="content">
                            <h3>JS Confrence</h3>
                            <a href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <button id="more-events" class="btn btn-common" onclick="getLocation()">Events by your geolocalization</button>
            </div>
        </div>
    </div>
</section>
<!-- Event Slides Section End -->

<!-- Ticket Pricing Area Start -->
<section id="pricing" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Ticket Pricing</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-xa-12 mb-3">
                <div class="price-block-wrapper wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="colmun-title">
                        <h5>Basic Pass</h5>
                    </div>
                    <div class="price">
                        <h2>$29</h2>
                        <span>Per Day</span>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Lunch on all days</span></li>
                            <li><i class="lni-close"></i><span class="text">Access to all areas</span></li>
                            <li><i class="lni-close"></i><span class="text">Certificate</span></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-common">Buy Ticket</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xa-12 mb-3">
                <div class="price-block-wrapper active wow fadeInUp" data-wow-delay="0.3s">
                    <div class="colmun-title">
                        <h5>Standard Pass</h5>
                    </div>
                    <div class="price">
                        <h2>$40</h2>
                        <span>Per Day</span>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Lunch on all days</span></li>
                            <li><i class="lni-close"></i><span class="text">Access to all areas</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Certificate</span></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-common">Buy Ticket</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xa-12 mb-3">
                <div class="price-block-wrapper wow fadeInRight" data-wow-delay="0.4s">
                    <div class="colmun-title">
                        <h5>Premium Pass</h5>
                    </div>
                    <div class="price">
                        <h2>$68</h2>
                        <span>Per Day</span>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Entrance</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Coffee Break</span></li>
                            <li><i class="lni-close"></i><span class="text">Lunch on all days</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Access to all areas</span></li>
                            <li><i class="lni-check-mark-circle"></i><span class="text">Certificate</span></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-common">Buy Ticket</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Ticket Pricing Area End -->

<!-- Blog Section Start -->
<section id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Latest News</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                    <div class="blog-image">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('event-home/img/blog/img-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="descr">
                        <div class="icon">
                            <i class="lni-image"></i>
                        </div>
                        <h3 class="title">
                            <a href="#">
                                Learn Something New
                            </a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et
                            dolore</p>
                    </div>
                    <div class="meta-tags">
                        <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                        <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                    <div class="blog-image">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('event-home/img/blog/img-2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="descr">
                        <div class="icon">
                            <i class="lni-arrow-right"></i>
                        </div>
                        <h3 class="title">
                            <a href="#">
                                Call for sponsors
                            </a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et
                            dolore</p>
                    </div>
                    <div class="meta-tags">
                        <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                        <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="blog-item">
                    <div class="blog-image">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset('event-home/img/blog/img-3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="descr">
                        <div class="icon">
                            <i class="lni-camera"></i>
                        </div>
                        <h3 class="title">
                            <a href="#">
                                Elon Musk joining the event
                            </a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipsing elit, sed do eiusmodincididunt ut labore et
                            dolore</p>
                    </div>
                    <div class="meta-tags">
                        <span class="date"><i class="lni-calendar"></i> Jan 20, 2020</span>
                        <span class="comments"><i class="lni-comment-alt"></i> <a href="#"> 0 Comment</a></span>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="#" class="btn btn-common">View all Blog</a>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Sponsors Section Start -->
<section id="sponsors" class="section-padding">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Sponsors</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row mb-30 text-center wow fadeInDown" data-wow-delay="0.3s">
            <div class="col-lg-12">
                <div class="sponsors-logo text-center">
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-1.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-2.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-3.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-4.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-5.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-6.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-7.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-8.png') }}" alt=""></a>
                    <a href=""><img src="{{ asset('event-home/img/sponsors/logo-9.png') }}" alt=""></a>
                </div><!-- sponsors logo end-->
            </div>
        </div>
    </div>
</section>
<!-- Sponsors Section End -->

<!-- Contact Us Section -->
<section id="contact-map" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title wow fadeInUp" data-wow-delay="0.2s">Contact Us</h2>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">Lorem ipsum dolor sit amet, in quodsi vulputate pro.
                        Ius illum vocent mediocritatem an <br> cule dicta iriure at phaedrum.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="container-form wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="form-wrapper">
                        <form role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6 form-line">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="email"
                                               placeholder="First Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-line">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" required data-error="Please enter your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-line">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" id="msg_subject" name="subject"
                                               placeholder="Subject" required
                                               data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" id="message" name="message" required
                                                  data-error="Write your message"></textarea>
                                    </div>
                                    <div class="form-submit">
                                        <button type="submit" class="btn btn-common" id="form-submit"><i
                                                    class="fa fa-paper-plane" aria-hidden="true"></i> Send Message
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Section End -->

<!-- Map Section Start -->
<section id="google-map-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <object style="border:0; height: 450px; width: 100%;"
                        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15864.15480778837!2d-77.44908382752939!3d38.953293865566366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6775cb22a9fa1341!2sThe+Firkin+%26+Fox!5e0!3m2!1sen!2sbd!4v1543773685573"></object>
            </div>
        </div>
    </div>
</section>
<!-- Map Section End -->

<!-- Contact text Start -->
<section id="contact-text">
    <div class="container">
        <div class="row contact-wrapper">
            <div class="col-lg-4 col-md-5 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-home"></i>
                    </li>
                    <li><span>Cesare Rosaroll, 118 80139 Eventine</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-3 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-phone"></i>
                    </li>
                    <li><span>+789 123 456 79</span></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-3 col-xs-12">
                <ul>
                    <li>
                        <i class="lni-envelope"></i>
                    </li>
                    <li><span>Support@example.com</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Contact text End -->

<footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="subscribe-inner wow fadeInDown" data-wow-delay="0.3s">
                    <h2 class="subscribe-title">To Get Nearly Updates</h2>
                    <form class="text-center form-inline">
                        <input class="mb-20 form-control" name="email" placeholder="Enter Your Email Here">
                        <button type="submit" class="btn btn-common sub-btn" data-style="zoom-in" data-spinner-size="30"
                                name="submit" id="submit">
                            <span class="ladda-label"><i class="lni-check-box"></i> Subscribe</span>
                        </button>
                    </form>
                </div>
                <div class="footer-logo">
                    <img src="{{ asset('event-home/img/logo.png') }}" alt="">
                </div>
                <div class="social-icons-footer">
                    <ul>
                        <li class="facebook"><a target="_blank" href="3"><i class="lni-facebook-filled"></i></a></li>
                        <li class="twitter"><a target="_blank" href="3"><i class="lni-twitter-filled"></i></a></li>
                        <li class="pinterest"><a target="_blank" href="3"><i class="lni-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="site-info">
                    <p>Designed and Developed by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Go to Top Link -->
<a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
</a>

<div id="preloader">
    <div class="sk-circle">
        <div class="sk-circle1 sk-child"></div>
        <div class="sk-circle2 sk-child"></div>
        <div class="sk-circle3 sk-child"></div>
        <div class="sk-circle4 sk-child"></div>
        <div class="sk-circle5 sk-child"></div>
        <div class="sk-circle6 sk-child"></div>
        <div class="sk-circle7 sk-child"></div>
        <div class="sk-circle8 sk-child"></div>
        <div class="sk-circle9 sk-child"></div>
        <div class="sk-circle10 sk-child"></div>
        <div class="sk-circle11 sk-child"></div>
        <div class="sk-circle12 sk-child"></div>
    </div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('event-home/js/jquery-min.js') }}"></script>
<script src="{{ asset('event-home/js/popper.min.js') }}"></script>
<script src="{{ asset('event-home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('event-home/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('event-home/js/waypoints.min.js') }}"></script>
<script src="{{ asset('event-home/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('event-home/js/jquery.nav.js') }}"></script>
<script src="{{ asset('event-home/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('event-home/js/wow.js') }}"></script>
<script src="{{ asset('event-home/js/nivo-lightbox.js') }}"></script>
<script src="{{ asset('event-home/js/video.js') }}"></script>
<script src="{{ asset('event-home/js/main.js') }}"></script>

</body>

</html>
