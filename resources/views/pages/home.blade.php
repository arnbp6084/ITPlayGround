@extends('layouts.default')

@section('content')
<style type="text/css">

.carou .container {
    margin-top: 20px;
}

/* Carousel Styles */
.carou .carousel-indicators .active {
    background-color: #2980b9;
}

.carou .carousel-inner img {
    width: 100%;
    max-height: 460px
}

.carou .carousel-control {
    width: 0;
}

.carou .carousel-control.left,
.carou .carousel-control.right {
    opacity: 1;
    filter: alpha(opacity=100);
    background-image: none;
    background-repeat: no-repeat;
    text-shadow: none;
}

.carou .carousel-control.left span {
    padding: 15px;
}

.carou .carousel-control.right span {
    padding: 15px;
}

.carou .carousel-control .glyphicon-chevron-left, 
.carou .carousel-control .glyphicon-chevron-right, 
.carou .carousel-control .icon-prev, 
.carou .carousel-control .icon-next {
    position: absolute;
    top: 45%;
    z-index: 5;
    display: inline-block;
}

.carou .carousel-control .glyphicon-chevron-left,
.carou .carousel-control .icon-prev {
    left: 0;
}

.carou .carousel-control .glyphicon-chevron-right,
.carou .carousel-control .icon-next {
    right: 0;
}

.carou .carousel-control.left span,
.carou .carousel-control.right span {
    background-color: #000;
}

.carou .carousel-control.left span:hover,
.carou .carousel-control.right span:hover {
    opacity: .7;
    filter: alpha(opacity=70);
}

/* Carousel Header Styles */
.carou .header-text {
    position: absolute;
    top: 20%;
    left: 1.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #fff;
}

.carou .header-text h2 {
    font-size: 40px;
}

.carou .header-text h2 span {
    background-color: #2980b9;
    padding: 10px;
}

.carou .header-text h3 span {
    background-color: #000;
    padding: 15px;
}

.carou .btn-min-block {
    min-width: 170px;
    line-height: 26px;
}

.carou .btn-theme {
    color: #fff;
    background-color: transparent;
    border: 2px solid #fff;
    margin-right: 15px;
}

.carou .btn-theme:hover {
    color: #000;
    background-color: #fff;
    border-color: #fff;
}   

@media only screen and (max-width:400px) {
  
  .home-content__main {
    padding: 0 0px !important;
  }
  .row { padding-right: 2rem; padding-left: 2rem; }   
}
@media only screen and (max-width:600px) {

  .home-content__main {
    padding: 0 0px !important;
  }
  .row { padding-right: 2rem; padding-left: 2rem; }
}
.carou span { opacity: 0.7; border-radius: 10px 10px 10px 10px; }
.join_now { display: none; }
</style>
  <!-- home
    ================================================== -->
    <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="images/hero-bg.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="grid-overlay">
            <div></div>
        </div>

        <div class="home-content">
            
            @if (session('status'))
                        <div id="siteMsg" class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            @php Session::forget(['status']) @endphp
            @if ($errors->has('email'))
                <div id="siteMsg" class="alert alert-success" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
            @if ($errors->has('password'))
                <div id="siteMsg" class="alert alert-success" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
            @if ($errors->has('name'))
                <div id="siteMsg" class="alert alert-success" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
            <script type="text/javascript">
                $("#siteMsg").show().delay(10000).fadeOut();    
            </script>
            
            <div class="row home-content__main">



                <div class="carou">
                    <div class="">
                        <div class="row">
                            <!-- Carousel -->
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @php
                                    foreach($sliderinfo as $slider){
                                      if($slider['id']=='1'){ @endphp
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $slider['id'] }}" class="active"></li>
                                      @php
                                      }else{ @endphp
                                    <li data-target="#carousel-example-generic" data-slide-to="{{ $slider['id'] }}"></li>
                                      @php } } @endphp                                    
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @php
                                    foreach($sliderinfo as $slider){
                                      
                                        $sliderimg=$slider['image'];
                                        $slidertext1=$slider['text1'];
                                        $slidertext2=$slider['text2'];
                                        $sliderpid=$slider['pid'];
                                        $sliderstatus=$slider['status'];
                                       @endphp
                                    @php if($slider['id']=='1'){ @endphp
                                    <div class="item active">
                                    @php }else{ @endphp
                                    <div class="item">
                                    @php } @endphp
                                        <img src="{{ URL::asset('upload/'.$sliderimg) }}" alt="First slide">
                                        <!-- Static Header -->
                                        <div class="header-text">
                                            <div class="col-md-12 text-center">
                                                <div class=" hidden-xs">
                                                @if($slidertext1)
                                                <h2>
                                                    <span>{{ $slidertext1 }}</span>
                                                </h2>
                                                <br>
                                                @else
                                                 <br><br><br><br>
                                                @endif
                                                @if($slidertext2)
                                                <h3>
                                                    <span>{{ $slidertext2 }}</span>
                                                </h3>
                                                <br>
                                                @else
                                                 <br><br><br><br>
                                                @endif
                                                </div>
                                                <div class="joinnow hidden-xs" id="">
                                                    <a style="background-color: #4CAF50;box-shadow: 0px 0px 60px 10px grey;" class="btn btn-theme btn-sm btn-min-block" href="{{ URL::to('business/' . $sliderpid) }}">Join Business</a>
                                                </div>
                                            </div>
                                        </div><!-- /header-text -->
                                        <div class="join_now" id="">
                                                    <a style="background-color: #4CAF50;box-shadow: 0px 0px 60px 10px grey;" class="btn btn-theme btn-sm btn-min-block" href="{{ URL::to('business/' . $sliderpid) }}">Join Business</a>
                                        </div>
                                    </div>                                    
                                    @php } @endphp
                                    
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div><!-- /carousel -->
                        </div>
                    </div>
                </div>


                <h1>
                Click IT PlayGround
                </h1>

                <h3>
                We build beautiful experiences
                </h3>

                <div class="home-content__video">
                    <a class="video-link" href="https://player.vimeo.com/video/106388449?color=01aef0&title=0&byline=0&portrait=0" data-lity>
                        <span class="video-icon"></span>
                        <span class="video-text">Watch Video</span>
                    </a>
                </div>

                <div class="home-content__button">
                    <a href="#about" class="smoothscroll btn btn--primary btn--large">
                        More About Us
                    </a>
                    <a href="#contact" class="smoothscroll btn btn--large">
                        Let's Talk
                    </a>
                </div>

            </div> <!-- end home-content__main -->

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    Scroll
                </a>
            </div>

        </div> <!-- end home-content -->

        <!-- <ul class="home-social">
            <li>
                <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
            </li>
        </ul> --> <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">

        <div class="row section-header bit-narrow" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Who We Are</h3>
                <h1 class="display-1">
                
                We provide PHP training for candidates to help them jump start their career in the IT sector. Whether you come from the technical field or not, whether you are a student or a professional, you can easily take up our courses and get ahead with your career in the field of your choice - PHP.
                </h1>
                <h1 class="display-1">
                    Give a man a fish and you feed him for a day. Teach a man to fish and you feed him for a lifetime.'
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow" data-aos="fade-up">
            <div class="col-full">
                <p class="lead">
                We, at IT Playground offer services to enhance your bussiness and fulfill all your requirements and help your bussiness attain market pace. We know your bussiness needs and help acheive it with utmost care!
                </p>
                <p class="lead">
                We, also offer services in buiding career. We don't guarantee jobs. Instead, we help you learn what you need to for a successful career in this field. And then we arrange unlimited interviews for you, so that you can find your job on your own, with just a bit of help from us! We are a PHP Training Institute with a difference.
                </p>
                <p class="lead">
                We don't guarantee jobs; but we do make sure you get the opportunity to get one on your own!
                </p>


            </div>
        </div> <!-- end about-desc -->

        <div class="row bit-narrow">
                
            <div class="about-process process block-1-2 block-tab-full">

                <div class="col-block item-process" data-aos="fade-up">
                    <div class="item-process__text">
                        <h4 class="item-title">Define</h4>
                        <p>
                        We define our services as creating skills on boosting IT upgradation and apply, needed to survive and thus creating real impression on IT Market.
                        </p>
                    </div>
                </div>
                <div class="col-block item-process" data-aos="fade-up">
                    <div class="item-process__text">
                        <h4 class="item-title">Design</h4>
                        <p>
                        We have projects with design implementation needed on IT based demanding market and focus on nitty-gritty to create root impulse on IT market and suit bussiness needs.
                        </p>
                    </div>
                </div>
                <div class="col-block item-process" data-aos="fade-up">
                    <div class="item-process__text">
                        <h4 class="item-title">Build</h4>
                        <p>
                        We enhance skills and grab new technologies adding more strengths in building talents. IT Playground offers ample amount of talent acumulation with streams of innovity and creativity. 
                        </p>
                    </div>
                </div>
                <div class="col-block item-process" data-aos="fade-up">
                    <div class="item-process__text">
                        <h4 class="item-title">Launch</h4>
                        <p>
                        We are at prone state to launch our interesting offers, for students have always dreamt of, while starting new carrer and for those with their bussiness who wants it to be competitive in market. We give students oppurtunity with spark and help them create a bright future ahead.
                        </p>
                    </div>
                </div>

            </div> <!-- end process -->

        </div> <!-- end row -->

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <section id='services' class="s-services target-section darker">

        <div class="row section-header bit-narrow" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">What we do</h3>
                <h1 class="display-1">
                We take pride in what we do. Our services are designed to help 
                your business stand out and turn your ideas into digital realities.
                We also provide services in building talent start new bright career.
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row bit-narrow services block-1-2 block-tab-full">

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="icon-star"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title">Build Bussiness</h3>
                    <p>We deliver services on enhancing your bussiness on creating websites implementing latest platform like Laravel, CodeIgneitor with mysql. We know the needs and implement the latest with utmost care!
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="icon-group"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title">Training</h3>
                    <p>We build career and help students grow with bright future ahead. We are equiped with powerfull IT skills which would fullfill IT needs to survive in the competitive market.
                    </p>
                </div>
            </div>

            <!-- <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="icon-pie-chart"></i>
                </div>  
                <div class="item-service__text">
                    <h3 class="item-title">Marketing</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div>

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="icon-image"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title">Photography</h3>
                    <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                    Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                    Sunt suscipit voluptas ipsa in tempora esse soluta sint.
                    </p>
                </div>
            </div> -->

            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon">
                    <i class="icon-cube"></i>
                </div>
                <div class="item-service__text">
                    <h3 class="item-title">UI/UX Design</h3>
                    <p>We help in customizing your bussiness with designs UI/UX Designs and help make your website look more attractive and drive more attention.
                    </p>
                </div>
            </div>
    
            <div class="col-block item-service" data-aos="fade-up">
                <div class="item-service__icon"><i class="icon-lego-block"></i></div>
                <div class="item-service__text">
                    <h3 class="item-title">Personality Developement</h3>
                    <p>We give service in providing skills on developing personality to face interview sessions and offer best to convey your opinions in the smartest way.
                    </p>
                </div>
            </div>

        </div> <!-- end services -->

    </section> <!-- end s-services -->


    <!-- works
    ================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row section-header has-bottom-sep narrow target-section" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Our Works</h3>
                <h1 class="display-1">
                We create products, and experiences that people love. We work on devastating platforms.
                </h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row masonry-wrap">

            <div class="masonry">
    
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="{{ URL::asset('images/php.jpg') }}" class="thumb-link" title="Shutterbug" data-size="1050x700">
                                <img src="{{ URL::asset('images/php.jpg') }}" 
                                     srcset="images/php.jpg 1x, images/php.jpg 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                PHP
                            </h3>
                            <p class="item-folio__cat">
                                PHP Core
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a> -->

                        <!-- <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
    
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="images/CodeIgniter.jpg" class="thumb-link" title="Woodcraft" data-size="1050x700">
                                <img src="images/CodeIgniter.jpg" 
                                     srcset="images/CodeIgniter.jpg 1x, images/CodeIgniter.jpg 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                CodeIgniter
                            </h3>
                            <p class="item-folio__cat">
                                PHP Framework
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
        
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="images/Laravel.jpg" class="thumb-link" title="The Beetle Car" data-size="1050x700">
                                <img src="images/Laravel.jpg"
                                     srcset="images/Laravel.jpg 1x, images/Laravel.jpg 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                Laravel
                            </h3>
                            <p class="item-folio__cat">
                                PHP Framework web development
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
        
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="images/mysql.png" class="thumb-link" title="Grow Green" data-size="1050x700">
                                <img src="images/mysql.png" 
                                     srcset="images/mysql.png 1x, images/mysql.png 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                Mysql
                            </h3>
                            <p class="item-folio__cat">
                                Database Management
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
    
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="images/javascript.png" class="thumb-link" title="Guitarist" data-size="1050x700">
                                <img src="images/javascript.png" 
                                     srcset="images/javascript.png 1x, images/javascript.png 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                Javascript
                            </h3>
                            <p class="item-folio__cat">
                                Web Design
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
        
                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                            
                        <div class="item-folio__thumb">
                            <a href="images/git.jpeg" class="thumb-link" title="Palmeira" data-size="1050x700">
                                <img src="images/git.jpeg"
                                     srcset="images/git.jpeg 1x, images/git.jpeg 2x" alt="">
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                Git
                            </h3>
                            <p class="item-folio__cat">
                                Version control system
                            </p>
                        </div>

                        <!-- <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                            <i class="icon-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde dolorem corrupti neque nisi.</p>
                        </div> -->

                    </div>
                </div> <!-- end masonry__brick -->
    
            </div> <!-- end masonry -->

        </div> <!-- end masonry-wrap -->

    </section> <!-- end s-works -->


    <!-- clients
    ================================================== -->
    <!-- <section id="clients" class="s-clients target-section darker">

        <div class="grid-overlay">
            <div></div>
        </div>

        <div class="row section-header text-center narrow" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Our Clients</h3>
                <h1 class="display-1">Who we have work with</h1>
            </div>
        </div> 

        <div class="row clients-wrap" data-aos="fade-up">
            <div class="col-twelve">
                <ul class="clients">
                    <li><a href="#0">Uber</a></li>
                    <li><a href="#0">Spotify</a></li>
                    <li><a href="#0">Grab</a></li>
                    <li><a href="#0">Dropbox</a></li>
                    <li><a href="#0">IBM</a></li>
                    <li><a href="#0">Microsoft</a></li>
                    <li><a href="#0">Xiaomi</a></li>
                    <li><a href="#0">Adidas</a></li>
                    <li><a href="#0">Mozilla</a></li>
                    <li><a href="#0">Apple</a></li>
                    <li><a href="#0">Google</a></li>
                    <li><a href="#0">Asus</a></li>
                </ul>
            </div>
        </div>

    </section> -->


    <!-- testimonies
    ================================================== -->
    <!--<section class="s-testimonials">

        <div class="testimonials__icon" data-aos="fade-up"></div>

        <div class="row testimonials narrow">

            <div class="col-full testimonials__slider" data-aos="fade-up">

                <div class="testimonials__slide">
                    <p>Qui ipsam temporibus quisquam vel. Maiores eos cumque distinctio nam accusantium ipsum. 
                    Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium quos qui praesentium corpori.</p>
                    <div class="testimonials__author">
                        Tim Cook
                        <span>CEO, Apple</span>
                    </div>
                </div> 

                <div class="testimonials__slide">
                    <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                    Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>
                    <div class="testimonials__author">
                        Sundar Pichai
                        <span>CEO, Google</span>
                    </div>
                </div> 

                <div class="testimonials__slide">
                    <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                    Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>
                    <div class="testimonials__author">
                        Satya Nadella
                        <span>CEO, Microsoft</span>
                    </div>
                </div> 
                
            </div> 

        </div> 

    </section> --> <!-- end s-testimonials -->

@stop